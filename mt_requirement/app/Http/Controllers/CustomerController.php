<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
  
    public function insertForm()
    {
        return view('customer_create');
    }

    public function insert(Request $request)
    {
        $customerId = DB::table('customers')->insertGetId([
            'name' => $request->input('name'),
            'phone_number' => $request->input('phone_number'),
            'address' => $request->input('address'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        if ($request->input('product_service_name')) {
            $orderId = DB::table('deals')->insertGetId([
                'customer_id' => $customerId, 
                'product_service_name' => $request->input('product_service_name'),
                'quantity' => $request->input('quantity'),
                'price' => $request->input('price'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('activities')->insert([
                'order_id' => $orderId,
                'status' => $request->input('status', 'Ordered'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect('customers/view')->with('success', 'Customer and deal added successfully!');
    }

    public function index(Request $request)
{
    $search = $request->input('search');

    $customers = DB::table('customers')
        ->leftJoin('deals', 'customers.id', '=', 'deals.customer_id')
        ->select(
            'customers.id',
            'customers.name',
            'customers.phone_number',
            'customers.address',
            'customers.created_at',
            'customers.updated_at',
            DB::raw('COUNT(DISTINCT deals.id) as total_orders')
        )
        ->when($search, function ($query, $search) {
            return $query->where('customers.name', 'like', '%' . $search . '%');
        })
        ->groupBy(
            'customers.id',
            'customers.name',
            'customers.phone_number',
            'customers.address',
            'customers.created_at',
            'customers.updated_at'
        )
        ->orderByDesc('customers.id')
        ->paginate(5);

    return view('customer_view', compact('customers'));
}

    public function details($id)
    {
        $customer = DB::table('customers')->where('id', $id)->first();
        if (!$customer) {
            return redirect('customers/view')->with('error', 'Customer not found!');
        }
        $deals = DB::table('deals')
            ->leftJoin('activities', 'activities.order_id', '=', 'deals.id')
            ->where('deals.customer_id', $id)
            ->select(
                'deals.id',  
                'deals.product_service_name',
                'deals.price',
                'deals.quantity',
                'deals.created_at',
                'deals.updated_at',
                'activities.status'
            )
            ->get();
        return view('customer_details', compact('customer', 'deals'));
    }
 
    public function edit($id)
    {
        $customer = DB::table('customers')->where('id', $id)->first();
        if (!$customer) {
            return redirect('customers/view')->with('error', 'Customer not found!');
        }
   
        $deal = DB::table('deals')->where('customer_id', $id)->first();
        $activity = $deal ? DB::table('activities')->where('order_id', $deal->id)->first() : null;
        if (!$deal || !$activity) {
          $status = null; 
        } else {
            $status = $activity->status;
        }
    
        return view('customer_edit', compact('customer', 'deal', 'activity', 'status'));
    }

public function update(Request $request, $id)
{
    $customer = DB::table('customers')->where('id', $id)->first();
    if (!$customer) {
        return redirect('customers/view')->with('error', 'Customer not found!');
    }
    DB::table('customers')->where('id', $id)->update([
        'name' => $request->input('name'),
        'phone_number' => $request->input('phone_number'),
        'address' => $request->input('address'),
        'updated_at' => now(),
    ]);

    return redirect('customers/view')->with('success', 'Customer information updated successfully!');
}

    public function destroy($id)
    {
        DB::table('activities')->whereIn('order_id', function ($query) use ($id) {
            $query->select('id')->from('deals')->where('customer_id', $id);
        })->delete();

        DB::table('deals')->where('customer_id', $id)->delete();

        DB::table('customers')->where('id', $id)->delete();

        return redirect('customers/view')->with('success', 'Customer deleted successfully!');
    }

    public function addProductForm($id)
{
    $customer = DB::table('customers')->where('id', $id)->first();
    if (!$customer) {
        return redirect('customers/view')->with('error', 'Customer not found!');
    }

    return view('add_product_form', compact('customer'));
}

public function storeProduct(Request $request, $id)
{
    $request->validate([
        'product_service_name' => 'required|string',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
        'status' => 'required|in:Ordered,In Progress,Completed', 
    ]);

    $orderId = DB::table('deals')->insertGetId([
        'customer_id' => $id,
        'product_service_name' => $request->product_service_name,
        'price' => $request->price,
        'quantity' => $request->quantity,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    DB::table('activities')->insert([
        'order_id' => $orderId,
        'status' => $request->status,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect('customers/details/' . $id)->with('success', 'Product/Service added successfully.');
}

public function showOrders(Request $request)
{
    $search = $request->input('search');

    $query = DB::table('deals')
        ->leftJoin('customers', 'deals.customer_id', '=', 'customers.id')
        ->leftJoin('activities', 'activities.order_id', '=', 'deals.id')
        ->select(
            'deals.id',
            'deals.product_service_name',
            'deals.quantity',
            'deals.price',
            'deals.created_at',
            'deals.updated_at',
            'activities.status',
            'customers.name as customer_name'
        );

    if ($search) {
        $query->where('deals.product_service_name', 'like', '%' . $search . '%');
    }

    $orders = $query->orderByDesc('deals.created_at')->paginate(5);

    $orders->appends(['search' => $search]);

    return view('order_list', compact('orders', 'search'));
}

public function editProduct($orderId)
{
    $deal = DB::table('deals')->where('id', $orderId)->first();

    if (!$deal) {
        return redirect('customers/view')->with('error', 'Order not found!');
    }

    $activity = DB::table('activities')->where('order_id', $orderId)->first();

    return view('edit_product_form', compact('deal', 'activity'));
}

public function updateProduct(Request $request, $orderId)
{
    $request->validate([
        'product_service_name' => 'required|string',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
        'status' => 'required|in:Ordered,In Progress,Completed',
    ]);
    DB::table('deals')->where('id', $orderId)->update([
        'product_service_name' => $request->product_service_name,
        'price' => $request->price,
        'quantity' => $request->quantity,
        'updated_at' => now(),
    ]);

    DB::table('activities')->where('order_id', $orderId)->update([
        'status' => $request->status,
        'updated_at' => now(),
    ]);
    return redirect('customers/details/' . $request->customer_id)->with('success', 'Product/Service updated successfully!');
}

public function deleteProduct($orderId)
{
    DB::table('activities')->where('order_id', $orderId)->delete();
    DB::table('deals')->where('id', $orderId)->delete();
    return redirect()->route('customers.details', ['id' => $orderId])
                     ->with('success', 'Product/Service deleted successfully!');
}


}
