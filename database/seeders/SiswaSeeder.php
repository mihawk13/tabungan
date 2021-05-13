<?php

namespace Database\Seeders;

use App\Models\Siswa;
use App\Models\Tabungan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i < 7; $i++) {
            for ($j = 1; $j <= 30; $j++) {

                $user = User::create([
                    'nama' => $faker->name,
                    'username' => 'sw' . $i . $j,
                    'password' => bcrypt('sw' . $i . $j),
                    'level' => 'Siswa',
                ]);

                $siswa = Siswa::create([
                    'nama' => $faker->name,
                    'alamat' => $faker->address,
                    'jk' => 'Laki-Laki',
                    'nama_wali' => $faker->name,
                    'hp' => $faker->phoneNumber,
                    'kelas_id' => $i,
                    'user_id' => $user->id,
                ]);

                Tabungan::create([
                    'saldo' => 0,
                    'siswa_id' => $siswa->id,
                ]);
            }
        }
    }
}
