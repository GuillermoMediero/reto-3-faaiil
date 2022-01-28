<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Facade\FlareClient\Time\SystemTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Ascensor;
use App\Models\Incidencia;
use App\Models\Modelo;
use App\Models\Zona;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Modelo::factory()->count(10)->create();   
        Zona::factory()->count(10)->create();
        Ascensor::factory()->count(10)->create();
    
        Incidencia::factory()->count(10)->create();
        //Carbon::now()->format('Y-m-d H:i:s') == Carbon::now()
            DB::table('users')->insert([
                'name'=>'Julen',
                'email' => 'julen@gmail.com',
                'password' =>Hash::make('adminadmin'),
                'created_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'updated_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'rol'=> 'admin'
            ]);

            DB::table('users')->insert([
                'name'=>'jefe',
                'email' => 'jefe@gmail.com',
                'password' =>Hash::make('jefejefe'),
                'created_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'updated_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'rol'=> 'jefe'
            ]);

            DB::table('users')->insert([
                'name'=>'operador',
                'email' => 'operador@gmail.com',
                'password' =>Hash::make('operador'),
                'created_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'updated_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'rol'=> 'operador'
            ]);
            
            DB::table('users')->insert([
                'name'=>'tecnico',
                'email' => 'tecnico@gmail.com',
                'password' =>Hash::make('tecnicotecnico'),
                'created_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'updated_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'rol'=> 'tecnico'
            ]);
            
            
             
    }
}
