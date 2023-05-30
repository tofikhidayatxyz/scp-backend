<?php

namespace Database\Seeders;

use App\Models\BookCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BookCategory::create(
            [
                'name' => 'Buku Pendidikan',
                'description' => 'Buku Pendidikan',
                'featured' => 1
            ]    
        );

        BookCategory::create(
            [
                'name' => 'Buku Agama',
                'description' => 'Buku Agama',
                'featured' => 1
            ]    
        );

        BookCategory::create(
            [
                'name' => 'Buku Umum',
                'description' => 'Buku Umum',
                'featured' => 1
            ]    
        );
    }
}
