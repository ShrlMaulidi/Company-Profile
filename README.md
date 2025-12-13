#### Pastikan versi php di atas 8.2.0

### 1. Install Dependency Laravel
```bash
composer install
```
### 2. Install Dependency React
```bash
npm install
```
### 3. Copy dan Setup Environment File
```bash
cp .env.example .env
```

## Buat Database di phpmyadmin, lalu atur konfigurasi database di file .env:
```bash
DB_DATABASE=pt_mms
DB_USERNAME=root
DB_PASSWORD=<password database kamu>
```

### 4. Generate App Key
```bash
php artisan key:generate
```
### 5. Migrasi Database
```bash
php artisan migrate
```
### 7. Jalankan Vite dan Laravel
## Terminal 1 jalankan Laravel
```bash
php artisan serve
```
## Terminal 2 jalankan react js
```bash
npm run dev
```

### 8. Untuk Link Storage
```bash
php artisan storage:link
```

### 9. Perintah Untuk Running
```bash
php artisan serve
npm run dev
```
