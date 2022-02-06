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
use App\Models\Role;
use App\Models\User;
use App\Models\Zona;
use Database\Factories\RoleUserFactory;

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
        
        
       
        //Carbon::now()->format('Y-m-d H:i:s') == Carbon::now()

           
            
            DB::table('users')->insert([
                'name'=>'Julen',
                'email' => 'julen@gmail.com',
                'password' =>Hash::make('adminadmin'),
                'created_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'updated_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'rol'=> 'Admin',
            ]);

            DB::table('users')->insert([
                'name'=>'jefe',
                'email' => 'jefe@gmail.com',
                'password' =>Hash::make('jefejefe'),
                'created_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'updated_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'rol'=> 'Jefe',
                'zona'=>'Arriaga',
            ]);
            DB::table('users')->insert([
                'name'=>'Lourdes',
                'email' => 'lourdes@gmail.com',
                'password' =>Hash::make('jefejefe'),
                'created_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'updated_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'rol'=> 'Jefe',
                'zona'=>'Lakua',
            ]);
            DB::table('users')->insert([
                'name'=>'Sean',
                'email' => 'sean@gmail.com',
                'password' =>Hash::make('jefejefe'),
                'created_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'updated_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'rol'=> 'Jefe',
                'zona'=>'Sansomendi',
            ]);
            DB::table('users')->insert([
                'name'=>'Ibai',
                'email' => 'ibai@gmail.com',
                'password' =>Hash::make('jefejefe'),
                'created_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'updated_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'rol'=> 'Jefe',
                'zona'=>'Ibaiondo',
            ]);
            DB::table('users')->insert([
                'name'=>'Zoe',
                'email' => 'zoe@gmail.com',
                'password' =>Hash::make('jefejefe'),
                'created_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'updated_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'rol'=> 'Jefe',
                'zona'=>'Zabalgana',
            ]);
            DB::table('users')->insert([
                'name'=>'operador',
                'email' => 'operador@gmail.com',
                'password' =>Hash::make('operador'),
                'created_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'updated_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'rol'=> 'Operador',
            ]);

            DB::table('users')->insert([
                'name'=>'Orn',
                'email' => 'orn@gmail.com',
                'password' =>Hash::make('operador'),
                'created_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'updated_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'rol'=> 'Operador',
            ]);

            DB::table('users')->insert([
                'name'=>'Orianna',
                'email' => 'orianna@gmail.com',
                'password' =>Hash::make('operador'),
                'created_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'updated_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'rol'=> 'Operador',
            ]);

            DB::table('users')->insert([
                'name'=>'Omanyte',
                'email' => 'omanyte@gmail.com',
                'password' =>Hash::make('operador'),
                'created_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'updated_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'rol'=> 'Operador',
            ]);
            
            DB::table('users')->insert([
                'name'=>'tecnico',
                'email' => 'tecnico@gmail.com',
                'password' =>Hash::make('tecnicotecnico'),
                'created_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'updated_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'rol'=> 'Tecnico',
                'zona'=>'Arriaga',
            ]);

            DB::table('users')->insert([
                'name'=>'Aizea',
                'email' => 'aizea@gmail.com',
                'password' =>Hash::make('tecnicotecnico'),
                'created_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'updated_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'rol'=> 'Tecnico',
                'zona'=>'Arriaga',
            ]);

            DB::table('users')->insert([
                'name'=>'Aingueru',
                'email' => 'aingueru@gmail.com',
                'password' =>Hash::make('tecnicotecnico'),
                'created_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'updated_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'rol'=> 'Tecnico',
                'zona'=>'Arriaga',
            ]);

            DB::table('users')->insert([
                'name'=>'Aker',
                'email' => 'aker@gmail.com',
                'password' =>Hash::make('tecnicotecnico'),
                'created_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'updated_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'rol'=> 'Tecnico',
                'zona'=>'Arriaga',
            ]);

            DB::table('users')->insert([
                'name'=>'Lux',
                'email' => 'lux@gmail.com',
                'password' =>Hash::make('tecnicotecnico'),
                'created_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'updated_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'rol'=> 'Tecnico',
                'zona'=>'Lakua',
            ]);

            DB::table('users')->insert([
                'name'=>'Leiba',
                'email' => 'leiba@gmail.com',
                'password' =>Hash::make('tecnicotecnico'),
                'created_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'updated_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'rol'=> 'Tecnico',
                'zona'=>'Lakua',
            ]);

            DB::table('users')->insert([
                'name'=>'Samus',
                'email' => 'samus@gmail.com',
                'password' =>Hash::make('tecnicotecnico'),
                'created_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'updated_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'rol'=> 'Tecnico',
                'zona'=>'Sansomendi',
            ]);

            DB::table('users')->insert([
                'name'=>'Salieva',
                'email' => 'salieva@gmail.com',
                'password' =>Hash::make('tecnicotecnico'),
                'created_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'updated_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'rol'=> 'Tecnico',
                'zona'=>'Sansomendi',
            ]);
            DB::table('users')->insert([
                'name'=>'Sergio',
                'email' => 'sergio@gmail.com',
                'password' =>Hash::make('tecnicotecnico'),
                'created_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'updated_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'rol'=> 'Tecnico',
                'zona'=>'Sansomendi',
            ]);
            DB::table('users')->insert([
                'name'=>'Sofia',
                'email' => 'sofia@gmail.com',
                'password' =>Hash::make('tecnicotecnico'),
                'created_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'updated_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'rol'=> 'Tecnico',
                'zona'=>'Sansomendi',
            ]);
            DB::table('users')->insert([
                'name'=>'Idoia',
                'email' => 'idoia@gmail.com',
                'password' =>Hash::make('tecnicotecnico'),
                'created_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'updated_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'rol'=> 'Tecnico',
                'zona'=>'Ibaiondo',
            ]);
            DB::table('users')->insert([
                'name'=>'Iker',
                'email' => 'iker@gmail.com',
                'password' =>Hash::make('tecnicotecnico'),
                'created_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'updated_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'rol'=> 'Tecnico',
                'zona'=>'Ibaiondo',
            ]);
            DB::table('users')->insert([
                'name'=>'Imanol',
                'email' => 'imanol@gmail.com',
                'password' =>Hash::make('tecnicotecnico'),
                'created_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'updated_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'rol'=> 'Tecnico',
                'zona'=>'Ibaiondo',
            ]);

            DB::table('users')->insert([
                'name'=>'Zyra',
                'email' => 'zyra@gmail.com',
                'password' =>Hash::make('tecnicotecnico'),
                'created_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'updated_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'rol'=> 'Tecnico',
                'zona'=>'Zabalgana',
            ]);

            DB::table('users')->insert([
                'name'=>'Zacarias',
                'email' => 'zacarias@gmail.com',
                'password' =>Hash::make('tecnicotecnico'),
                'created_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'updated_at'=>  Carbon::now()/*->format('Y-m-d H:i:s')*/,
                'rol'=> 'Tecnico',
                'zona'=>'Zabalgana',
            ]);

        
            $ascensores = Ascensor::all()->toArray();
            $tecnicos = User::where('rol','tecnico')->get()->toArray();
            foreach ($tecnicos as $tecnico) {
                foreach ($ascensores as $ascensor) {
                    if ($ascensor['zona_id'] == $tecnico['zona'])
                    Incidencia::factory()->create([
                        'tecnico_id' => $tecnico['id'],
                        'as_serie' => $ascensor['n_serie'] ,
                    ]);
                }
            }
        
        }
}
