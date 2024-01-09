<?php

namespace App\Console\Commands;

use App\Models\Admin;
use Illuminate\Console\Command;
use App\Models\Movie;
use Illuminate\Support\Facades\Hash;

class GenAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'GenAdmin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $data = [
            'name' => 'Admin',
            'email' => 'admin@digitaltelemundo.com',
            'password' => '123456789',
        ];
        Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
