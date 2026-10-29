# Deploy ke VPS Ubuntu (Nginx + PHP-FPM + MySQL)

Panduan ini untuk **Ubuntu 22.04 / 24.04**. Ganti nilai berikut sesuai milik kamu:

| Placeholder | Contoh |
|---|---|
| `domainkamu.com` | domain website |
| `PASSWORD_DB_KUAT` | password user database |
| `/var/www/company-profile` | folder proyek di server |

> Sebelum mulai: arahkan **A record** domain (dan `www`) ke IP VPS, lalu login ke server via SSH dengan user biasa yang punya akses `sudo` (bukan root).

---

### 1. Install Paket Server
```bash
sudo apt update && sudo apt upgrade -y
sudo apt install -y nginx mysql-server git unzip curl acl composer \
    php8.3-fpm php8.3-cli php8.3-mysql php8.3-mbstring php8.3-xml \
    php8.3-curl php8.3-zip php8.3-bcmath php8.3-intl php8.3-gd
```
> Di Ubuntu 22.04 belum ada PHP 8.3, tambahkan PPA dulu: `sudo add-apt-repository ppa:ondrej/php -y && sudo apt update`

Install Node.js 22 (Vite 7 butuh Node ≥ 20.19, versi dari apt Ubuntu terlalu lama):
```bash
curl -fsSL https://deb.nodesource.com/setup_22.x | sudo -E bash -
sudo apt install -y nodejs
```

### 2. Buat Database MySQL
```bash
sudo mysql
```
```sql
CREATE DATABASE pt_mms CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'pt_mms'@'localhost' IDENTIFIED BY 'PASSWORD_DB_KUAT';
GRANT ALL PRIVILEGES ON pt_mms.* TO 'pt_mms'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

### 3. Clone Proyek
```bash
sudo mkdir -p /var/www/company-profile
sudo chown $USER:www-data /var/www/company-profile
git clone https://github.com/ShrlMaulidi/Company-Profile.git /var/www/company-profile
cd /var/www/company-profile
```

Atur permission agar Nginx/PHP (`www-data`) dan user kamu sama-sama bisa menulis ke `storage` dan cache:
```bash
sudo setfacl -R -m u:www-data:rwX -m u:$USER:rwX storage bootstrap/cache
sudo setfacl -dR -m u:www-data:rwX -m u:$USER:rwX storage bootstrap/cache
```

### 4. Setup File .env
```bash
cp .env.example .env
nano .env
```
Ubah bagian berikut:
```bash
APP_NAME="PT Media Solusi Sukses"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://domainkamu.com

LOG_LEVEL=error

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pt_mms
DB_USERNAME=pt_mms
DB_PASSWORD=PASSWORD_DB_KUAT
```
> `APP_DEBUG` **wajib** `false` di production, kalau `true` detail error (termasuk isi .env) bisa terlihat pengunjung.

### 5. Install Dependency, Build, dan Migrasi
```bash
composer install --no-dev --optimize-autoloader
php artisan key:generate
npm ci
npm run build
php artisan migrate --force
php artisan db:seed --force
php artisan storage:link
php artisan optimize
```

### 6. Konfigurasi PHP (Upload Logo)
Batas upload default PHP hanya 2MB, padahal logo mitra boleh sampai 2MB. Naikkan sedikit:
```bash
sudo sed -i 's/^upload_max_filesize.*/upload_max_filesize = 10M/; s/^post_max_size.*/post_max_size = 10M/' /etc/php/8.3/fpm/php.ini
sudo systemctl restart php8.3-fpm
```

### 7. Konfigurasi Nginx
```bash
sudo nano /etc/nginx/sites-available/company-profile
```
Isi dengan:
```nginx
server {
    listen 80;
    server_name domainkamu.com www.domainkamu.com;
    root /var/www/company-profile/public;
    index index.php;

    client_max_body_size 10M;
    charset utf-8;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ ^/index\.php(/|$) {
        fastcgi_pass unix:/run/php/php8.3-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
        fastcgi_hide_header X-Powered-By;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```
Aktifkan:
```bash
sudo ln -s /etc/nginx/sites-available/company-profile /etc/nginx/sites-enabled/
sudo rm -f /etc/nginx/sites-enabled/default
sudo nginx -t
sudo systemctl reload nginx
```

### 8. Firewall
```bash
sudo ufw allow OpenSSH
sudo ufw allow 'Nginx Full'
sudo ufw enable
```

### 9. Pasang HTTPS (SSL Gratis)
```bash
sudo apt install -y certbot python3-certbot-nginx
sudo certbot --nginx -d domainkamu.com -d www.domainkamu.com
```
Setelah HTTPS aktif, tambahkan di `.env`:
```bash
SESSION_SECURE_COOKIE=true
```
lalu jalankan `php artisan optimize`.

### 10. Ganti Password Admin
Seeder membuat akun admin dengan password yang tertulis di repo (`password123`). **Segera** login di `https://domainkamu.com/login` lalu ganti password lewat menu Profile.

---

## Update Website (Deploy Ulang)
Setiap ada perubahan yang sudah di-push ke GitHub, cukup jalankan di server:
```bash
cd /var/www/company-profile
./deploy.sh
```

## Troubleshooting
| Masalah | Solusi |
|---|---|
| 500 Server Error | Cek `storage/logs/laravel.log`, biasanya permission (ulangi langkah 3) atau `.env` salah |
| Perubahan `.env` tidak berpengaruh | Jalankan `php artisan optimize` (config ter-cache) |
| Logo/gambar upload tidak muncul | Jalankan `php artisan storage:link` dan pastikan `APP_URL` benar |
| Tampilan berantakan / CSS hilang | Jalankan `npm run build` |
| Gagal upload logo | Cek langkah 6 dan `client_max_body_size` di Nginx |
