<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Backend\User;
use App\Models\Backend\Kategori;

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
            ['email' => 'ramasahidramadhan@gmail.com'],
            [
                'nama' => 'Rama Sahid',
                'is_admin' => 1,
                'password' => bcrypt('08164222922'),
            ]
        );
        
        User::updateOrCreate(
            ['email' => 'miemiebrownieofficial@gmail.com'],
            [
                'nama' => 'Team Miemie Brownie',
                'is_admin' => 0,
                'password' => bcrypt('ayosedekah'),
            ]
        );
        
        // Buat kategori
        Kategori::create([
            'nama_kategori' => 'Brownies',
        ]);

        Kategori::create([
            'nama_kategori' => 'Bolen',
        ]);

        Kategori::create([
            'nama_kategori' => 'Kayakue Cake',
        ]);

        Kategori::create([
            'nama_kategori' => 'Dessert',
        ]);

        Kategori::create([
            'nama_kategori' => 'Roti',
        ]);

        Kategori::create([
            'nama_kategori' => 'Cookies',
        ]);

        Kategori::create([
            'nama_kategori' => 'Special Moment',
        ]);

        Kategori::create([
            'nama_kategori' => 'Gift &  Souvenir',
        ]);

        Kategori::create([
            'nama_kategori' => 'Hantaran',
        ]);

        Kategori::create([
            'nama_kategori' => 'Coffe',
        ]);

        Kategori::create([
            'nama_kategori' => 'Non Coffe',
        ]);

        Kategori::create([
            'nama_kategori' => 'Main Course',
        ]);
    }
}

