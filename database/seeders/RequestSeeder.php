<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Request;

class RequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Insert dummy requests
         $stateIds = DB::table('request_state')->pluck('id')->toArray();
         $typeIds = DB::table('request_type')->pluck('id')->toArray();
 
         for ($i = 0; $i < 10; $i++) {
             Request::create([
                 'email' => Str::random(10) . '@example.com',
                 'message' => Str::random(50),
                 'state_id' => $stateIds[array_rand($stateIds)],
                 'type_id' => $typeIds[array_rand($typeIds)],
                 'turndate' => Carbon::now()->addDays(rand(1, 30)),
             ]);
         }
    }
}
