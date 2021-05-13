<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class WaliSeeder extends Seeder
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

            $user = User::create([
                'nama' => $faker->name,
                'username' => 'wali' . $i,
                'password' => bcrypt('wali' . $i),
                'level' => 'Wali Kelas',
            ]);

            Pegawai::create([
                'nama' => $faker->name,
                'jk' => 'Laki-Laki',
                'alamat' => $faker->address,
                'hp' => $faker->phoneNumber,
                'user_id' => $user->id,
            ]);
        }
    }
}
