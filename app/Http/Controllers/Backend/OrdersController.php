<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use PDF;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->get();
        return view('backend.admin.pages.order.index', compact('orders'));
    }

    public function show($id)
    {
    	$order = Order::find($id);
        $order->is_seen_by_admin = 1;
        $order->save();
    	return view('backend.admin.pages.order.show', compact('order'));
    }

    public function completed($id)
    {
        $order = Order::find($id);
        if ($order->is_completed) {
            $order->is_completed = 0;

            $order->save();
            session()->flash('error', 'Order has been canceled!!');
            return back();
        } else {
            $order->is_completed = 1;

            $order->save();
            session()->flash('success', 'Order has been completed!!');
            return back();
        }

        /* $order->save();
        session()->flash('success', 'Order has been completed!!');
        return back(); */
    }

    public function chargeUpdate(Request $request, $id)
    {
        $order = Order::find($id);

        $order->shipping_charge = $request->shipping_charge;
        $order->custom_discount = $request->custom_discount;
        $order->save();

        session()->flash('success', 'Order charge and discount has been changed!');
        return back();
    }

    /*
    * generate invoice for PDF
    *
    * @param 
    */
    public function generateInvoice(Request $request, $id)
    {
        $order = Order::find($id);

        //return view('backend.admin.pages.order.invoice', compact('order'));
        $pdf = PDF::loadView('backend.admin.pages.order.invoice', compact('order'));
        
        return $pdf->stream('invoice.pdf');
        //return $pdf->download('invoice.pdf');
    }

    public function paid($id)
    {
        $order = Order::find($id);
        if ($order->is_paid) {
            $order->is_paid = 0;

            $order->save();
            session()->flash('error', 'Order has not Paid!!');
            return back();
        } else {
            $order->is_paid = 1;

            $order->save();
            session()->flash('success', 'Order has been Paid!!');
            return back();
        }

        
    }
}
