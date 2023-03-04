<?php

namespace App\Console\Commands;

use App\Models\Mp3User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class MakePassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'MakePassword';

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
        Mp3User::getPlaylistInfo();
        die();
        $pass = 'Manhhung1992';
        echo Hash::make($pass);
    }
}
