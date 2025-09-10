<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Provider\Person;

class BiodataMahasiswaSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        $data = [];

        for ($i = 0; $i < 20; $i++) {
            $jenis_kelamin = $faker->randomElement(['L', 'P']);

            $nama = $jenis_kelamin === 'L' ?
                $faker->firstNameMale() . ' ' . $faker->firstNameMale() :
                $faker->firstNameFemale() . ' ' . $faker->firstNameFemale();

            $data[] = [
                'nim' => $faker->unique()->numerify('24#######'),
                'nama' => $nama,
                'jenis_kelamin' => $jenis_kelamin,
                'tanggal_lahir' => $faker->dateTimeBetween('2003-01-01', '2005-12-31')->format('Y-m-d'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }

        $this->db->table('biodata_mahasiswa')->insertBatch($data);
    }
}
