<?php

namespace Database\Seeders;

use App\Common\Definition\UserAuthority;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DefaultDataSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();
        try {
            DB::table('users')->insert([
                'name' => 'Admin',
                'email' => env('DEFAULT_ADMIN_EMAIL'),
                'password' => Hash::make(env('DEFAULT_ADMIN_PASSWORD')),
                'user_authority_code' => UserAuthority::Administrator->value,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::commit();
        } catch (\Exception $e) {
            $this->command->error($e->getMessage());
            DB::rollBack();
        }
    }
}
