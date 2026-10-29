<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PartnerSeeder extends Seeder
{
    public function run(): void
    {
        $partners = [
            ['name' => 'Telkom Indonesia', 'logo' => 'Telkom.png', 'category' => 'metro'],
            ['name' => 'Indosat Ooredoo', 'logo' => 'Indosat.png', 'category' => 'metro'],
            ['name' => 'Lintasarta', 'logo' => 'Lintas.webp', 'category' => 'metro'],
            ['name' => 'iForte', 'logo' => 'Iforte.png', 'category' => 'metro'],
            ['name' => 'FiberStar', 'logo' => 'Fiber.png', 'category' => 'metro'],
            ['name' => 'MV.Net', 'logo' => 'mvnetlogo.png', 'category' => 'corporate'],
            ['name' => 'CBN', 'logo' => 'cbn.png', 'category' => 'corporate'],
            ['name' => 'Aprin', 'logo' => 'aprin.jpg', 'category' => 'corporate'],
        ];

        foreach ($partners as $partner) {
            // Logo disalin dari public/partners ke disk public agar bisa dikelola dari admin
            $path = 'partners/' . $partner['logo'];
            Storage::disk('public')->put($path, file_get_contents(public_path($path)));

            Partner::updateOrCreate(['name' => $partner['name']], [
                'logo' => $path,
                'category' => $partner['category'],
            ]);
        }
    }
}
