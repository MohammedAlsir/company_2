<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->get();
        $id = 1;
        return view('dashboard.orders.index', compact('orders', 'id'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        //
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

    public function accepted()
    {
        $orders = Order::where('status', 1)->orderBy('id', 'desc')->get();
        $id = 1;
        return view('dashboard.orders.accepted', compact('orders', 'id'));
    }

    public function rejected()
    {
        $orders = Order::where('status', 2)->orderBy('id', 'desc')->get();
        $id = 1;
        return view('dashboard.orders.rejected', compact('orders', 'id'));
    }

    public function pending()
    {
        $orders = Order::where('status', 0)->orderBy('id', 'desc')->get();
        $id = 1;
        return view('dashboard.orders.pending', compact('orders', 'id'));
    }

    public function accepted_order($id)
    {
        $order = Order::find($id);
        $order->status = 1;
        $order->save();

        return redirect()->route('orders.accepted');
    }

    public function rejected_order($id)
    {
        $order = Order::find($id);
        $order->status = 2;
        $order->save();

        return redirect()->route('orders.rejected');
    }
}