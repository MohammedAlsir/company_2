<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Section;
use App\Models\Service;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $sections = Section::with('services')->get();
        // return response()->json($sections);
        $services = Service::all();
        return view('welcome', compact('sections', 'services'));
    }

    public function services()
    {
        return view('services');
    }

    public function cart_store(Request $request)
    {
        // $service = Service::findOrfail($request->input('service_id'));
        // Cart::add($service->id, $service->name, $request->input('quantity'), $service->price);

        // return redirect()->route('services');
    }

    public function cart_show()
    {
        // $services = Cart::total();
        // $services = Cart::content();

        return view('cart');
    }

    public function cart_update(Request $request, $rowId)
    {
        // Cart::update($rowId, $request->quantity + 1);
        // return $rowId;
    }

    public function cart_request()
    {

        $random_number = time() . rand(
            1111,
            9999
        );

        $services = Cart::content();


        foreach ($services as $service) {
            $order = new Order();
            $order->random_number = $random_number;
            $order->name_service = $service->name;
            $order->price_service = $service->price;
            $order->amount_service = $service->qty;
            $order->total = Cart::subtotal();
            $order->save();
        }

        Cart::destroy();

        return redirect()->route('cart.show')->with(['succss' => 'تم تقديم الطلب بنجاح', 'rand' => $random_number]);
        // return redirect()->route('home');
    }

    public function orders()
    {
        return view('orders');
    }

    public function orders_with_id(Request $request)
    {
        $id = 1;
        $order = Order::where('random_number', $request->order_id)->get();

        if ($order->count() > 0) {
            return view('your_order', compact('order', 'id'));
        } else {
            return redirect()->route('orders')->with('error', 'عفوا رقم الطلب غير صحيح');
        }
        return abort(404);
    }

    // public function cart_done()
    // {
    // }
}