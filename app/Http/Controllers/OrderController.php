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
                return '<a href="/HR-php-test/orders/edit/'.$row->id.'">'.$row->id.'</a>'.' '.
                '<a onclick="editForm('.$row->id.')" class="btn btn-sm btn-info">Edit</a>';
            })->rawColumns(['id'])
            ->addColumn('partner_name', function($row) {
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('order_edit');
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
        //
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
