<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function customer($customer_id,$name,$address)
    {
      return view('customer',compact('customer_id','name','address'));
    }
    public function item($item_no,$name,$price)
    {
      return view('item',compact('item_no','name','price'));
    }
    public function order($customer_id,$name,$order_no,$date)
    {
      return view('order',compact('customer_id','name','order_no','date'));
    }
    public function orderdetails($trans_no,$order_no,$item_id,$name,$price,$qty)
    {
      return view('orderdetails',compact('trans_no','order_no','item_id','name','price','qty'));
    }
    public function master()
    {
      return view('master');
    }
}
