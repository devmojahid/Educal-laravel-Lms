<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'first_name' => 'Instuctor',
                'last_name' => ' ',
                'email' => 'teacher@gmail.com',
                'password' => bcrypt('12345678'),
                'usertype' => 'instructor',
                'image' => 'uploads/users/default.png',
                'phone' => '123456789',
                'country' => 'Bangladesh',
                'address' => 'Dhaka',
                'city' => 'Dhaka',
                'postal_code' => '1200',
                'status' => '1',
                'facebook' => 'https://www.facebook.com/',
                'twitter' => 'https://twitter.com/',
                'linkedin' => 'https://www.linkedin.com/',
                'youtube' => 'https://www.youtube.com/',
                'vimeo' => 'https://vimeo.com/',
                'instagram' => 'https://www.instagram.com/',
                'website' => 'https://www.google.com/',
                'bio' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
                'designation' => 'Web Developer',
                'experience' => '5 Years',
            ],
            [
                'first_name' => 'Student',
                'last_name' => ' ',
                'email' => 'student@gmail.com',
                'password' => bcrypt('12345678'),
                'usertype' => 'user',
                'image' => 'uploads/users/default.png',
                'phone' => '123456789',
                'country' => 'Bangladesh',
                'address' => 'Dhaka',
                'city' => 'Dhaka',
                'postal_code' => '1200',
                'status' => '1',
                'facebook' => 'https://www.facebook.com/',
                'twitter' => 'https://twitter.com/',
                'linkedin' => 'https://www.linkedin.com/',
                'youtube' => 'https://www.youtube.com/',
                'vimeo' => 'https://vimeo.com/',
                'instagram' => 'https://www.instagram.com/',
                'website' => 'https://www.google.com/',
                'bio' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
                'designation' => 'Web Developer',
                'experience' => '5 Years',
            ]
            ]);
    }
}
