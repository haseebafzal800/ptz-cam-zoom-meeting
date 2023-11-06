<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AppSettingsModel;


class AppSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AppSettingsModel::create([
            'title' => 'Nindeo-Software',
            'email' => 'admin@gmail.com',
            'phone' => '+1234567890',
            'address' => 'Fake Address, Fake City, fake State, Fake Country',
            'zoomClientId' => 'yopD5RPIRXaizWXx6jUGA',
            'zoomClientSecret' => 'TAEPrBn5i5cGK1Xp13E65NVYGbw5V4qO',
            'zoomRedirectUrl' => 'http://127.0.0.1:8000/zoom-token',
            'zoomToken' => ''
        ]);
    }
}