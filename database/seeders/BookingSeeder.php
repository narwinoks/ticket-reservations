<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=Booking::create([
            'ticket_data_id' =>1,
            'name' =>'winarno',
            'email' =>'winarno@gmail.com',
            'status' =>1
        ]);
    }
}
