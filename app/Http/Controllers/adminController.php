<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\order;
use App\orderitem;
use App\item;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;
class adminController extends Controller
{
    public function pendingorders(){
        if(Auth::user()->email=="admin@apexpizza.com"){
            $orders=order::select('id','user_id','total','status','created_at')->where('status','pending')->paginate(1);
            $data=[];
            foreach($orders as $order){
            $tmp=[];
            $tmp['id']=$order['id'];
            $tmp['user_id']=$order['user_id'];
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
            return view('pendingorders',['orders'=>$data,'ord'=>$orders]);
        }
        else return redirect('/');
    }
    public function deliveredorders(){
        if(Auth::user()->email=="admin@apexpizza.com"){
            $orders=order::select('id','user_id','total','status','created_at')->where('status','delivered')->orderBy('id','DESC')->paginate(1);
            $data=[];
            foreach($orders as $order){
            $tmp=[];
            $tmp['id']=$order['id'];
            $tmp['user_id']=$order['user_id'];
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
            return view('deliveredorders',['orders'=>$data,'ord'=>$orders]);
        }
        else return redirect('/');
    }
    public function cancelledorders(){
        if(Auth::user()->email=="admin@apexpizza.com"){
            $orders=order::select('id','user_id','total','status','created_at')->where('status','cancelled')->orderBy('id','DESC')->paginate(1);
            $data=[];
            foreach($orders as $order){
            $tmp=[];
            $tmp['id']=$order['id'];
            $tmp['user_id']=$order['user_id'];
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
            return view('cancelledorders',['orders'=>$data,'ord'=>$orders]);
        }
        else return redirect('/');
    }
    public function dispatchorder($id){
        if(Auth::user()->email=="admin@apexpizza.com"){
            $order = order::find($id);
            if($order->status=="pending")
                $order->status="delivered";
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
            Mail::to($email)->send(new OrderShipped($tmp));
            return response()->json(['success' => true]);
        }
        else return response()->json(['success' => false]);
    }
}
