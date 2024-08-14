<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Backend\User;
use App\Models\Backend\Kategori;
use App\Models\Backend\Subkategori;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat pengguna
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'nama' => 'Administrator',
                'is_admin' => 1,
                'password' => bcrypt('P@55word'),
            ]
        );
        
        User::updateOrCreate(
            ['email' => 'ramasahid@gmail.com'],
            [
                'nama' => 'Rama Sahid',
                'is_admin' => 1,
                'password' => bcrypt('P@55word'),
            ]
        );
        
        User::updateOrCreate(
            ['email' => 'teammiemie-brownie@gmail.com'],
            [
                'nama' => 'Team Miemie Brownie',
                'is_admin' => 0,
                'password' => bcrypt('P@55word'),
            ]
        );
        
        // Buat kategori
        Kategori::create([
            'nama_kategori' => 'Bolen Pisang',
        ]);

        Kategori::create([
            'nama_kategori' => 'Brownies Box',
        ]);

        Kategori::create([
            'nama_kategori' => 'Cofee',
        ]);

        Kategori::create([
            'nama_kategori' => 'Fresh Drink',
        ]);

        Kategori::create([
            'nama_kategori' => 'Cookies',
        ]);

        Kategori::create([
            'nama_kategori' => 'Dessert Box',
        ]);

        Kategori::create([
            'nama_kategori' => 'Souvenir',
        ]);

        Kategori::create([
            'nama_kategori' => 'Birthday Cake',
        ]);

        Kategori::create([
            'nama_kategori' => 'Meals',
        ]);
    }
}

