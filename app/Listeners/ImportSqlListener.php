<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use RachidLaasri\LaravelInstaller\Events\LaravelInstallerFinished;

class ImportSqlListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(LaravelInstallerFinished $event): void
    {
        $this->importDatabase();
    }

    protected function importDatabase(){
        try{
			$path = public_path('educal.sql');
            if(!File::exists($path)){
                Log::error('Database import failed: File not found');
                abort(500, 'Failed to import database.');
            }

            $sql = file_get_contents($path);
            
            $connection = DB::connection();
            DB::purge($connection->getName());
            
            DB::connection($connection->getName());
            DB::getSchemaBuilder()->dropAllTables();
            DB::unprepared($sql);
        }catch(\Exception $e){
            Log::error('Database import failed: ' . $e->getMessage());
            abort(500, 'Failed to import database.');
            return $e->getMessage();
            
        }
    }
}