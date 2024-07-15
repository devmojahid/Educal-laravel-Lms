<?php

namespace App\Supports\Update;

use Illuminate\Support\Facades\Artisan;

class DatabaseHandler
{
    public function runDatabaseMigrations()
    {
        // Run the database migrations
        Artisan::call('migrate', ['--force' => true]);
    }
}
