<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Reset cached roles and permissions
         app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        // Create permissions

        $permissions = [
            "dashboard",
            // Blog Category Permission
            "blog-category-list",
            "blog-category-create",
            "blog-category-edit",
            "blog-category-delete",
            // Blog Sub Category Permission
            "blog-sub-category-list",
            "blog-sub-category-create",
            "blog-sub-category-edit",
            "blog-sub-category-delete",
            // Blog Tag Permission
            "blog-tag-list",
            "blog-tag-create",
            "blog-tag-edit",
            "blog-tag-delete",
            // Blog Permission
            "blog-list",
            "blog-create",
            "blog-edit",
            "blog-delete",
            // Blog Comment Permission
            "blog-comment-list",
            'blog-comment-approve',
            "blog-comment-reject",
            "blog-comment-delete",

            //course category permission
            "course-category-list",
            "course-category-create",
            "course-category-edit",
            "course-category-delete",
            //course sub category permission
            "course-sub-category-list",
            "course-sub-category-create",
            "course-sub-category-edit",
            "course-sub-category-delete",
            //course tag permission
            "course-tag-list",
            "course-tag-create",
            "course-tag-edit",
            "course-tag-delete",
            //language permission
            "course-language-list",
            "course-language-create",
            "course-language-edit",
            "course-language-delete",
            //course permission
            "course-list",
            "course-create",
            "course-edit",
            "course-delete",
            "course-approve",
            "course-reject",
            "course-pending",
            "course-status",
            //course resourse permission
            "course-resourse-list",
            "course-resourse-create",
            "course-resourse-edit",
            "course-resourse-delete",
            //course quiz permission
            "course-quiz-list",
            "course-quiz-create",
            "course-quiz-edit",
            "course-quiz-delete",
            // course assignment permission
            "course-assignment-list",
            "course-assignment-create",
            "course-assignment-edit",
            "course-assignment-delete",
            // course review permission
            "course-review-list",
            "course-review-create",
            "course-review-edit",
            "course-review-delete",
            // course coupon permission
            "course-coupon-list",
            "course-coupon-create",
            "course-coupon-edit",
            "course-coupon-delete",
            

            //order permission
            "order-list",
            "order-edit",
            "order-delete",
            //order status permission
            "order-status-list",
            "order-status-create",
            "order-status-edit",

            //user permission
            "user-list",
            "user-create",
            "user-edit",
            "user-delete",
            //role permission
            "role-list",
            "role-create",
            "role-edit",
            "role-delete",
            // instructor permission
            "instructor-list",
            "instructor-create",
            "instructor-edit",
            "instructor-delete",
            // prending instructor permission
            "pending-instructor-list",
            "pending-instructor-approve",
            "pending-instructor-reject",
            "pending-instructor-delete",
            // withdraw permission
            "withdraw-list",
            "withdraw-approve",
            "withdraw-reject",
            "withdraw-delete",
            // pages 
            "page-list",
            "page-create",
            "page-edit",
            "page-delete",
            'page-show',
            //apperance
            "home-page",
            'hero-section',
            'category-section',
            'banner-section',
            'find-course-section',
            "event-section",
            "price-section",
            "about-page",
            "about-section",
            "brand-section",
            "testimonial-section",

            //menu
            "menu-list",
            "menu-create",
            "menu-edit",
            "menu-delete",

            //newsletter
            'subscriber-list',
            'subscriber-delete',
            'bulk-email-list',
            'bulk-email-create',

            //event 
            "event-list",
            "event-create",
            "event-edit",
            "event-delete",

            //setting permission
            "profile",
            'update-admin-info',
            "update-admin-password",
            "general-setting",
            "smtp-setting",
            "sidebar-setting",
            'payout-setting',
            'withdrow-create',
            'clear-cache',
            'language-change',
            'currency-change',
            'notification-show',
            'commission-setting',
            "payment-method-list",
        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        

        // Create a admin role and assign all permissions
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());

        // Create a admin user and assign the admin role
        $user = \App\Models\User::create([
            'first_name' => 'Admin',
            'last_name' => ' ',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'usertype' => 'admin',
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
        ]);
        $user->assignRole('admin');
        
        $instrutor = Role::create(['name' => 'instructor']);
        $instrutor->givePermissionTo([
            "dashboard",
            //course category permission
            "course-category-list",
            "course-category-create",
            "course-category-edit",
            "course-category-delete",
            //course sub category permission
            "course-sub-category-list",
            "course-sub-category-create",
            "course-sub-category-edit",
            "course-sub-category-delete",
            //course tag permission
            "course-tag-list",
            "course-tag-create",
            "course-tag-edit",
            "course-tag-delete",
            //language permission
            "course-language-list",
            "course-language-create",
            "course-language-edit",
            "course-language-delete",
            //course permission
            "course-list",
            "course-create",
            "course-edit",
            "course-delete",
            //course resourse permission
            "course-resourse-list",
            "course-resourse-create",
            "course-resourse-edit",
            "course-resourse-delete",
            //course quiz permission
            "course-quiz-list",
            "course-quiz-create",
            "course-quiz-edit",
            "course-quiz-delete",
            // course assignment permission
            "course-assignment-list",
            "course-assignment-create",
            "course-assignment-edit",
            "course-assignment-delete",
            // course review permission
            "course-review-list",
            'payout-setting',
            'withdraw-list',
            'withdrow-create',
            "profile",

        ]);

        $instrutor = \App\Models\User::where('usertype', 'instructor')->first();
        $instrutor->assignRole('instructor');
    }
}
