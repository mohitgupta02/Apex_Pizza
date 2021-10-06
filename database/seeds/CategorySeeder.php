<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(['id'=>1,'name'=>'Veg Pizza','created_at'=>now(),'updated_at'=>now()]);
        DB::table('categories')->insert(['id'=>2,'name'=>'Non Veg Pizza','created_at'=>now(),'updated_at'=>now()]);
        DB::table('categories')->insert(['id'=>3,'name'=>'Wrap','created_at'=>now(),'updated_at'=>now()]);
        DB::table('categories')->insert(['id'=>4,'name'=>'Pasta','created_at'=>now(),'updated_at'=>now()]);
        DB::table('categories')->insert(['id'=>5,'name'=>'Beverages','created_at'=>now(),'updated_at'=>now()]);
    }
}
