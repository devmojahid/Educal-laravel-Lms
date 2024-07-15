<?php

namespace Database\Seeders;

use App\Models\Pages;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pages::create([
            'title' => 'terms and conditions',
            'slug' => 'terms-and-conditions',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis libero in dui lacinia, nec aliquet',
            'meta_title' => 'Terms and Conditions',
            'meta_description' => 'Terms and Conditions',
            'meta_keywords' => 'Terms and Conditions',
            'status' => 'active',
        ]);

        Pages::create([
            'title' => 'privacy policy',
            'slug' => 'privacy-policy',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis libero in dui lacinia, nec aliquet',
            'meta_title' => 'Privacy Policy',
            'meta_description' => 'Privacy Policy',
            'meta_keywords' => 'Privacy Policy',
            'status' => 'active',
        ]);
        
    }
}