<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        $packages = [
            // Internet Rumah
            [
                'name' => 'Home Basic',
                'type' => 'residential',
                'speed' => '20 Mbps',
                'price' => 175000,
                'features' => [
                    'Unlimited tanpa FUP',
                    'Ideal untuk 2-4 perangkat',
                    'Gratis instalasi',
                    'Gratis modem WiFi',
                ],
                'is_popular' => false,
            ],
            [
                'name' => 'Home Family',
                'type' => 'residential',
                'speed' => '50 Mbps',
                'price' => 275000,
                'features' => [
                    'Unlimited tanpa FUP',
                    'Ideal untuk 5-8 perangkat',
                    'Lancar streaming HD',
                    'Gratis instalasi & modem WiFi',
                    'Support teknis 24/7',
                ],
                'is_popular' => true,
            ],
            [
                'name' => 'Home Premium',
                'type' => 'residential',
                'speed' => '100 Mbps',
                'price' => 375000,
                'features' => [
                    'Unlimited tanpa FUP',
                    'Ideal untuk 10+ perangkat',
                    'Streaming 4K & gaming online',
                    'Gratis modem WiFi dual band',
                    'Support teknis 24/7',
                ],
                'is_popular' => false,
            ],
            [
                'name' => 'Home Ultra',
                'type' => 'residential',
                'speed' => '200 Mbps',
                'price' => 550000,
                'features' => [
                    'Unlimited tanpa FUP',
                    'Cocok untuk smart home & WFH',
                    'Gratis modem WiFi 6',
                    'Prioritas penanganan gangguan',
                    'Support teknis 24/7',
                ],
                'is_popular' => false,
            ],

            // Solusi Bisnis
            [
                'name' => 'Biz Starter',
                'type' => 'business',
                'speed' => '30 Mbps',
                'price' => 500000,
                'features' => [
                    'Rasio 1:2 (broadband)',
                    'Cocok untuk UMKM & kafe',
                    'Gratis instalasi',
                    'Support teknis 24/7',
                ],
                'is_popular' => false,
            ],
            [
                'name' => 'Biz Pro',
                'type' => 'business',
                'speed' => '75 Mbps',
                'price' => 1250000,
                'features' => [
                    'Rasio 1:1 (simetris)',
                    '1 IP Public statis',
                    'SLA 99%',
                    'Monitoring jaringan',
                    'Support teknis 24/7',
                ],
                'is_popular' => true,
            ],
            [
                'name' => 'Biz Enterprise',
                'type' => 'business',
                'speed' => '150 Mbps',
                'price' => 3500000,
                'features' => [
                    'Dedicated 1:1',
                    'Blok IP Public /29',
                    'SLA 99.5%',
                    'Account manager khusus',
                    'Prioritas penanganan gangguan',
                ],
                'is_popular' => false,
            ],
            [
                'name' => 'Biz Dedicated',
                'type' => 'business',
                'speed' => '500 Mbps',
                'price' => 9500000,
                'features' => [
                    'Dedicated 1:1 full fiber',
                    'Blok IP Public /28',
                    'SLA 99.9%',
                    'Redundant link',
                    'Account manager khusus',
                ],
                'is_popular' => false,
            ],
        ];

        foreach ($packages as $package) {
            Package::updateOrCreate(['name' => $package['name']], $package);
        }
    }
}
