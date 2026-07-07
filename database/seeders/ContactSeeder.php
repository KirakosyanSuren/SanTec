<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::create([
            'email' => 'info@santech.am',
            'phone' => '+37491648888',
            'address' => [
                'en' => 'Avan, Babajanyan 7/3, Yerevan 0022, Armenia',
                'ru' => 'Аван, Бабаджанян 7/3, Ереван 0022, Армения',
                'hy' => 'Ավան, Բաբաջանյան 7/3, Երևան 0022, ՀՀ',
            ],
        ]);
    }
}
