<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SidebarInfo;

class SidebarInfoSedder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SidebarInfo::create([
            'search' => 'on',
            'category' => 'on',
            'tag' => 'on',
            'recent_post' => 'on',
            'popular_post' => 'off',
            'recent_comment' => 'off',
            'archives' => 'off',
            'banner' => 'on',
            'category_title' => 'Category',
            'category_count' => '5',
            'tag_title' => 'Tag',
            'tag_count' => '8',
            'recent_post_title' => 'Recent Post',
            'recent_post_count' => '5',
            'popular_post_title' => 'Popular Post',
            'popular_post_count' => '5',
            'recent_comment_title' => 'Recent Comment',
            'recent_comment_count' => '5',
            'banner_title' => 'Banner',
            'banner_image' => 'uploads/banner/banner.jpg',
            'banner_link' => '#',
        ]);
    }
}
