<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use function Laravel\Prompts\password;

class HashPassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:hash-pass';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Generate a hashed password...');
        $password = password('Enter the password');
        $this->info('Hashed password: ' . password_hash($password, PASSWORD_DEFAULT));
    }
}
