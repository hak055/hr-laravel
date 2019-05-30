<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Order;
use App\OrderProduct;
use App\Partner;
use App\Product;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

   public function index()
   {
   		return view('order_all');
   }


   public function create()
   {
   	   return Datatables::of(Order::query()->with('partner', 'products'))
            ->editColumn('status', function($row) {
                return $row->statusWord();
            })->editColumn('id', function($row) {
                return '<a href="/orders/show/'.$row->id.'">'.$row->id.'</a>'.' '.
                '<a href="/orders/edit/'.$row->id.'" onclick="editForm('.$row->id.')" class="btn btn-info""><span
                            class="glyphicon glyphicon-pencil"></span></a>';
            })->rawColumns(['id'])
            ->editColumn('client_email', function($row)  {
                return $row->partner->name;
            })->addColumn('products_cost', function($row) {
                return $row->totalsOeder();
            })->addColumn('product_list', function($row) {
                return $row->listProduct();
            })->make(true);
          
   }

   public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('orders.show', compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        return view('orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'client_email' => 'required|email',
            'partners_name' => 'required|min:5'
        ]);


        $order = Order::find($id);
        if($order){
            $order->update($request->all());
            $order->partner->update(['name' => $request['partners_name']]);
        }

            return redirect('/orders/index');
        


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	//
    }
}
