<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $i=1;
        DB::table('items')->insert([
            'id'=>$i,
            'category_id'=> 1,
            'name'=>'Margherita',
            'price'=>120,
            'image'=>'Margherit.jpg',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        $i++;
        DB::table('items')->insert([
            'id'=>$i,
            'category_id'=> 1,
            'name'=>'Double Cheese Margherita',
            'price'=>180,
            'image'=>'Double_Cheese_Margherita.jpg',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);$i++;
        DB::table('items')->insert([
            'id'=>$i,
            'category_id'=> 1,
            'name'=>'Farmhouse',
            'price'=>180,
            'image'=>'Farmhouse.jpg',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);$i++;
        DB::table('items')->insert([
            'id'=>$i,
            'category_id'=> 1,
            'name'=>'Deluxe Veggie',
            'price'=>220,
            'image'=>'Deluxe_Veggie.jpg',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);$i++;
        DB::table('items')->insert([
            'id'=>$i,
            'category_id'=> 1,
            'name'=>'Mexican Green Wave',
            'price'=>220,
            'image'=>'Mexican_Green_Wave.jpg',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);$i++;

        DB::table('items')->insert([
            'id'=>$i,
            'category_id'=> 1,
            'name'=>'Peppy Paneer',
            'price'=>250,
            'image'=>'Peppy_Paneer.jpg',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);$i++;
        DB::table('items')->insert([
            'id'=>$i,
            'category_id'=> 2,
            'name'=>'Chicken Golden Delight',
            'price'=>200,
            'image'=>'Chicken_Golden_Delight.jpg',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);$i++;
        DB::table('items')->insert([
            'id'=>$i,
            'category_id'=> 2,
            'name'=>'Dominator',
            'price'=>220,
            'image'=>'Dominator.jpg',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);$i++;
        DB::table('items')->insert([
            'id'=>$i,
            'category_id'=> 2,
            'name'=>'Chicken Sausage',
            'price'=>220,
            'image'=>'Chicken_Sausage.jpg',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);$i++;
        DB::table('items')->insert([
            'id'=>$i,
            'category_id'=> 2,
            'name'=>'Pepper Barbeque',
            'price'=>220,
            'image'=>'Pepper_Barbeque.jpg',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);$i++;
        DB::table('items')->insert([
            'id'=>$i,
            'category_id'=> 2,
            'name'=>'Pepper Barbeque & Onion',
            'price'=>250,
            'image'=>'Pepper_Barbeque_&_Onion.jpg',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);$i++;
        DB::table('items')->insert([
            'id'=>$i,
            'category_id'=> 2,
            'name'=>'Non-Veg Supreme',
            'price'=>300,
            'image'=>'Non-Veg_Supreme.jpg',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);$i++;
        DB::table('items')->insert([
            'id'=>$i,
            'category_id'=> 3,
            'name'=>'Grilled Vegetable Wrap',
            'price'=>80,
            'image'=>'Grilled-Vegetable-Wrap.jpg',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);$i++;
        DB::table('items')->insert([
            'id'=>$i,
            'category_id'=> 3,
            'name'=>'Italian Veg Pinwheels',
            'price'=>120,
            'image'=>'Italian-Veg-Pinwheels.jpg',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);$i++;
        DB::table('items')->insert([
            'id'=>$i,
            'category_id'=> 3,
            'name'=>'Italian Chicken Wrap',
            'price'=>160,
            'image'=>'Italian-Chicken-Wrap.jpg',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);$i++;
        DB::table('items')->insert([
            'id'=>$i,
            'category_id'=> 4,
            'name'=>'Italian Penne Pasta',
            'price'=>100,
            'image'=>'Italian_Penne_Pasta.jpg',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);$i++;
        DB::table('items')->insert([
            'id'=>$i,
            'category_id'=> 4,
            'name'=>'Fettuccine Alfredo',
            'price'=>140,
            'image'=>'Fettuccine_Alfredo.jpg',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);$i++;
        DB::table('items')->insert([
            'id'=>$i,
            'category_id'=> 4,
            'name'=>'Italian Herb Chicken Penne Pasta',
            'price'=>180,
            'image'=>'Italian_Herb_Chicken_Penne_Pasta.jpg',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);$i++;
        DB::table('items')->insert([
            'id'=>$i,
            'category_id'=> 5,
            'name'=>'Coca Cola',
            'price'=>50,
            'image'=>'Coca_Cola.jpg',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);$i++;
        DB::table('items')->insert([
            'id'=>$i,
            'category_id'=> 5,
            'name'=>'Fanta',
            'price'=>50,
            'image'=>'Fanta.jpg',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);$i++;
        DB::table('items')->insert([
            'id'=>$i,
            'category_id'=> 5,
            'name'=>'Sprite',
            'price'=>50,
            'image'=>'Sprite.jpg',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
    }
}
