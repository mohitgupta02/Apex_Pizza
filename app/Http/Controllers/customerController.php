<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\item;
use App\cart;
use App\cartitem;
use App\order;
use App\orderitem;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderCancelled;
class customerController extends Controller
{
    public function addtocart($item){
        $id = item::where("name", $item)->get();
        // echo $id;
        $user_id=Auth::user()->id;
        if(count( DB::table('cartitems')->where('user_id', $user_id)->where('item_id', $id[0]['id'])->get())==0){
        $cart= new cartitem;
        $cart->user_id=Auth::user()->id;
        $cart->item_id=$id[0]['id'];
        $cart->qty=1;
        $cart->price=$id[0]['price'];
        $cart->save();}
        // $post=cartitem::create(['item_id'=>$id[0]['id'],'user_id'=>$user_id,'qty'=>1,'price'=>$id[0]['price']]);
        return response()->json(['success' => true,'user_id'=>$user_id]);
    }
    public function removecart($item){
        $id = item::where("name", $item)->get();
        // echo $id;
        $user_id=Auth::user()->id;
        DB::table('cartitems')->where('user_id', $user_id)->where('item_id', $id[0]['id'])->delete();
        // $post=cartitem::create(['item_id'=>$id[0]['id'],'user_id'=>$user_id,'qty'=>1,'price'=>$id[0]['price']]);
        return response()->json(['success' => true,'user_id'=>$user_id]);
    }
    
    public function cart(){
        if(Auth::user()=="")
        return view('cart'); 
        else{
            $cartitems=cartitem::select('item_id','qty','price')->where('user_id',Auth::user()->id)->get();
            $total=count($cartitems);
            $items=[];
            $price=0;
            foreach($cartitems as $it){
                $tmp=item::select('name')->where('id',$it['item_id'])->get();
                $price+=$it['price'];
                $items[]=['name'=>$tmp[0]['name'],'qty'=>$it['qty'],'price'=>$it['price']];

            }
            return view('cart',['total'=>$total,'price'=>$price,'items'=>$items]);
        }
    }
    public function incCart($item){
        $id=item::select('id')->where('name',$item)->first();
        $user_id=Auth::user()->id;
        $details = cartitem::select('id')->where("user_id",$user_id)->where("item_id", $id['id'])->first();
        $it=cartitem::find($details['id']);
        $it->price/=$it->qty;
        $it->qty=($it->qty)+1;
        $it->price*=$it->qty;
        $it->save();
        return response()->json(['success' => true,'it'=>$it]);
    }
    public function decCart($item){
        $id=item::select('id')->where('name',$item)->first();
        $user_id=Auth::user()->id;
        $details = cartitem::select('id')->where("user_id",$user_id)->where("item_id", $id['id'])->first();
        $it=cartitem::find($details['id']);
        if($it->qty==1)
            return response()->json(['success' => true,'it'=>$it]);    
        $it->price/=$it->qty;
        $it->qty=($it->qty)-1;
        $it->price*=$it->qty;
        $it->save();
        return response()->json(['success' => true,'it'=>$it]);
    }
    public function checkout(){
        $user_id=Auth::user()->id;
        $order = new order;
        $order->user_id=$user_id;
        $order->status='pending';
        $order->total=0;
        $order->save();
        $total=0;
        $items = cartitem::select('id','item_id','qty','price')->where('user_id',$user_id)->get();
        foreach($items as $item){
            $orderitem =new orderitem;
            $orderitem->order_id=$order->id;
            $orderitem->item_id=$item['item_id'];
            $orderitem->qty=$item['qty'];
            $orderitem->price=$item['price'];
            $orderitem->save();
            $total+=$item['price'];
            DB::table('cartitems')->where('id',$item['id'])->delete();
        }
        $order->total=$total;
        $order->save();
        return redirect('/orders');
    }
    public function orders(){
        $user_id=Auth::user()->id;
        $cartitems=cartitem::select('price')->where('user_id',Auth::user()->id)->get();
        $total=count($cartitems);
        $price=0;
        foreach($cartitems as $it){
            $price+=$it['price'];
        }
        $orders=order::select('id','total','status','created_at')->where('user_id',$user_id)->orderBy('id','DESC')->paginate(1);
        $data=[];
        foreach($orders as $order){
            $tmp=[];
            $tmp['id']=$order['id'];
            $tmp['total']=$order['total'];
            $tmp['status']=$order['status'];
            $tmp['time']=$order['created_at'];
            $items=orderitem::select('item_id','qty','price')->where('order_id',$order['id'])->get();
            $tmp2=[];
            foreach($items as $item){
                $tmp3=[];
                $itname=item::select('name')->where('id',$item['item_id'])->first();
                $tmp3['name']=$itname['name'];
                $tmp3['qty']=$item['qty'];
                $tmp3['price']=$item['price'];
                $tmp2[]=$tmp3;
            }
            $tmp['items']=$tmp2;
            $data[]=$tmp;
        }
        return view('orders',['total'=>$total,'price'=>$price,'orders'=>$data,'ord'=>$orders]);
    }
    public function account(){
        $user_id=Auth::user()->id;
        $cartitems=cartitem::select('price')->where('user_id',Auth::user()->id)->get();
        $total=count($cartitems);
        $price=0;
        foreach($cartitems as $it){
            $price+=$it['price'];
        }
        return view('account',['total'=>$total,'price'=>$price]);
    }
    public function cancelorder($id){
        $order = order::find($id);
        if($order->status=="pending"){
            $order->status="cancelled";
        $order->save();
        //send email notification

            //for mail
            $userid= order::select('user_id')->where('id',$id)->first();
            $email = User::select('email')->where('id',$userid['user_id'])->first();
            $email=$email['email'];
            $tmp['id'] = $id;
            $tmp['items']=[];
            $tmp['total']=$order->total;
            //end for mail
            $items = orderitem::select('item_id','qty','price')->where('order_id',$id)->get();
            //for mail
            foreach($items as $item){
                $tmp1['name']= item::select('name')->find($item['item_id']);
                $tmp1['price']=$item['price'];
                $tmp1['qty']=$item['qty'];
                $tmp['items'][]=$tmp1;
            }
            Mail::to($email)->send(new OrderCancelled($tmp));}
        return response()->json(['success' => true,'it'=>$order]);
    }
    public function order($orderid){

    }
}
