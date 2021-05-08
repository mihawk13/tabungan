<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Database\Seeder;

class Users extends Seeder
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
