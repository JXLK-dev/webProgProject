<?php

namespace Database\Seeders;

use App\Models\usercredential;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\map;

class MaiBoutiqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // DB::table('usercredentials')->insert([
        //     'username' => 'admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => bcrypt('admin'),
        //     'phone_number' => '08123456789',
        //     'address' => 'Tangerang',
        //     'role' => 'admin'
        // ]);
        $insert = new usercredential();
        $insert->username = 'admin';
        $insert->email = 'admin@gmail.com';
        $insert->password = bcrypt('admin');
        $insert->phone_number = '08123456789';
        $insert->address = 'Tangerang';
        $insert->role = 'admin';
        $insert->save();

        $insert = new usercredential();
        $insert->username = 'Jerry';
        $insert->email = 'jerry@gmail.com';
        $insert->password = bcrypt('testing');
        $insert->phone_number = '08123456789';
        $insert->address = 'Tangerang';
        $insert->role = 'member';
        $insert->save();
    }
}
