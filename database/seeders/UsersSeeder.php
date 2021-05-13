<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Pegawai;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'nama' => 'Bendahara',
            'username' => 'bend',
            'password' => bcrypt('bend'),
            'level' => 'Bendahara',
        ]);

        Pegawai::create([
            'nama' => 'Bendahara',
            'jk' => 'Laki-Laki',
            'alamat' => 'Panjer',
            'hp' => '08153346545',
            'user_id' => $user->id,
        ]);
    }
}
