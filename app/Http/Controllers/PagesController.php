<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\item;
use App\cartitem;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index(){
        if(Auth::user()=="")
        return view('index'); 
        else{
            $cartitems=cartitem::select('price')->where('user_id',Auth::user()->id)->get();
            $total=count($cartitems);
            $price=0;
            foreach($cartitems as $it){
                $price+=$it['price'];
            }
            // return view('menu',['data'=>$data,'categories'=>$categ,'total'=>$total,'price'=>$price,'items'=>$items]);
            return view('index',['total'=>$total,'price'=>$price]);
        }
    }
    public function menu(){
        $data = [];
        $categories=category::select('id','name')->get();
        $categ=[];
        foreach($categories as $category){
            $tmp = [];
            $items =item::select('name','image','price')->where('category_id',$category['id'])->get();
            foreach($items as $item){
                $tmp1['name']=$item['name'];$tmp1['image']=$item['image'];$tmp1['price']=$item['price'];
                $tmp[]=$tmp1;
            }
            $data[]=$tmp;
            $categ[]=$category['name'];
        }
        if(Auth::user()=="")
        return view('menu',['data'=>$data,'categories'=>$categ]); 
        else{
            $cartitems=cartitem::select('item_id','qty','price')->where('user_id',Auth::user()->id)->get();
            $total=count($cartitems);
            $items=[];
            $price=0;
            foreach($cartitems as $it){
                $tmp=item::select('name')->where('id',$it['item_id'])->get();
                $price+=$it['price'];
                $items[]=$tmp[0]['name'];
            }
            return view('menu',['data'=>$data,'categories'=>$categ,'total'=>$total,'price'=>$price,'items'=>$items]);
        }
    }
}
