<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

use function Laravel\Prompts\password;
use function Laravel\Prompts\text;

class SetupApp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set up the Laravel application (install dependencies, configure environment, and migrate database)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting Laravel application setup...');

        // Set up git hooks path
        shell_exec('git config core.hooksPath .git-hooks');

        // Install Composer dependencies
        $this->info('Installing Composer dependencies...');
        shell_exec('composer install');

        // Install NPM dependencies
        $this->info('Installing NPM dependencies...');
        shell_exec('npm install');

        // Copy .env.example to .env if not exists
        if (! File::exists(base_path('.env'))) {
            File::copy(base_path('.env.example'), base_path('.env'));
            $this->info('.env file created.');

            // Generate application key
            Artisan::call('key:generate');
            $this->info('Application key generated.');
        }

        // Get database credentials from user input
        $dbDatabase = text('Enter the database name');
        $dbUsername = text('Enter the database username');
        $dbPassword = password('Enter the database password');

        // Update .env file with database credentials
        $envPath = base_path('.env');
        $envContent = File::get($envPath);
        $envContent = preg_replace('/DB_DATABASE=.*/', "DB_DATABASE=$dbDatabase", $envContent);
        $envContent = preg_replace('/DB_USERNAME=.*/', "DB_USERNAME=$dbUsername", $envContent);
        $envContent = preg_replace('/DB_PASSWORD=.*/', "DB_PASSWORD=$dbPassword", $envContent);
        File::put($envPath, $envContent);

        $this->info('Database credentials updated.');

        // Create the database if it does not exist
        try {
            DB::connection()->statement("CREATE DATABASE IF NOT EXISTS `$dbDatabase`");
            $this->info("Database '$dbDatabase' created (if not existed).");
        } catch (Exception $e) {
            $this->error('Failed to create database. Please check your credentials.'.PHP_EOL.$e->getMessage());

            return 1;
        }

        // Run migrations
        $this->info('Running migrations...');
        Artisan::call('migrate', [], $this->getOutput());

        // Build assets
        $this->info('Building frontend assets...');
        shell_exec('npm run build');

        $this->info('Setup completed successfully!');
        $this->info("Run 'php artisan serve' to start the server or 'composer run dev' to start the server and watch for changes.");

        return 0;
    }
}
