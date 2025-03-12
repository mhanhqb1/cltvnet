<?php

namespace App\Console\Commands;

use App\Models\Admin;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CaLaTV:CreateAdmin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'CreateAdmin';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $mail = env('ADMIN_MAIL');
        $pass = env('ADMIN_PASS');
        Admin::create([
            'name' => 'admin',
            'email' => $mail,
            'password' => Hash::make($pass),
        ]);
    }
}
