<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $arr_plans=[
            'plan_1'=>[
                'name'=>'yearly',
                'plan_id'=>25870,
                'price'=>300.00,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            'plan_2'=>[
                'name'=>'monthly',
                'plan_id'=>25869,
                'price'=>20.00,
                'created_at'=>now(),
                'updated_at'=>now()
            ]
        ];
        foreach($arr_plans as $plan){
            $plan =    DB::table('plans')->insert($plan);
        }

    }
}

