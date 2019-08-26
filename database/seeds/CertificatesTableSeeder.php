<?php

use App\Certificate;
use Illuminate\Database\Seeder;


class CertificatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Certificate::create([

            'certificate' => 'Associates',
        ]);

        Certificate::create([

            'certificate' => 'Bachelors',
        ]);

        Certificate::create([

            'certificate' => 'Masters',
        ]);

        Certificate::create([

            'certificate' => 'JD',
        ]);

        Certificate::create([

            'certificate' => 'MBA',
        ]);

        Certificate::create([

            'certificate' => 'MD',
        ]);

        Certificate::create([

            'certificate' => 'DDS',
        ]);

        Certificate::create([

            'certificate' => 'PHD',
        ]);

        Certificate::create([

            'certificate' => 'PharmD',
        ]);
    }
}
