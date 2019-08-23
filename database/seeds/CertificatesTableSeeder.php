<?php

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
        Certificates::create([

            'certificate' => 'Associates',
        ]);

        Certificates::create([

            'certificate' => 'Bachelors',
        ]);

        Certificates::create([

            'certificate' => 'Masters',
        ]);

        Certificates::create([

            'certificate' => 'JD',
        ]);

        Certificates::create([

            'certificate' => 'MBA',
        ]);

        Certificates::create([

            'certificate' => 'MD',
        ]);

        Certificates::create([

            'certificate' => 'DDS',
        ]);

        Certificates::create([

            'certificate' => 'PHD',
        ]);

        Certificates::create([

            'certificate' => 'PharmD',
        ]);
    }
}
