<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Mail\OrderReceive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CustomerOrder extends Controller
{
    // Received Order View
    public function index()
    {
        $receiveOrder = DB::table('customer_order')
            ->where('status', 'Verifying')
            ->oldest('ordered_at')
            ->paginate(10);

        return view('order.view-receive-order', compact('receiveOrder'));
    }

    //Show Edit Receive Order Form
    public function editReceiveOrder($id)
    {
        $orderID = DB::table('customer_order')
        ->where('customer_id', $id)
        ->first();

        $menu_name = explode(", ", $orderID->menu_name);
        $quantity  = explode(", ", $orderID->quantity);

        return view('order.edit.edit-receive-order', compact(
            'orderID', 'menu_name', 'quantity'
            ));
    }

    // Edit Status Receive Order
    public function editReceiveStatus(Request $request, $id)
    {
        $id = $request->dataid;
        $cus_ID = DB::table('customer_order')
                        ->where('customer_id', $id)
                        ->first();

        $menu_name = explode(", ", $cus_ID->menu_name);
        $quantity  = explode(", ", $cus_ID->quantity);

        Mail::to($cus_ID->email)->send(new OrderReceive($menu_name, $quantity, $cus_ID->total_price));

        DB::table('customer_order')->where('customer_id', $id)
                                        ->update([
                                            'status' => 'Cooking',
                                        ]);

        return redirect()
            ->route('receive-order')
            ->with('status', 'Status Updated');
    }

    // Current Order View
    public function showCurrentOrder()
    {
        $receiveOrder = DB::table('customer_order')
            ->where('status', 'Cooking')
            ->oldest('ordered_at')
            ->paginate(10);

        return view('order.view-current-order', compact('receiveOrder'));
    }

    // Show Edit Current Order Form
    public function showCurrentOrderForm(Request $request, $id)
    {
        $orderID = DB::table('customer_order')
        ->where('customer_id', $id)
        ->first();

        $menu_name = explode(", ", $orderID->menu_name);
        $quantity  = explode(", ", $orderID->quantity);

        return view('order.edit.edit-current-order', compact(
            'orderID', 'menu_name', 'quantity'
            ));
    }

    public function editCurrentStatus(Request $request)
    {
        $id = $request->dataid;

        $cus_ID = DB::table('customer_order')
                    ->where('customer_id', $id)->first();

        DB::table('customer_completed')->insert([
            'customer_id'  => $cus_ID->customer_id,
            'first_name'   => $cus_ID->first_name,
            'last_name'    => $cus_ID->last_name,
            'email'        => $cus_ID->email,
            'sum_cost'     => (int)$cus_ID->sum_cost,
            'phone_number' => $cus_ID->phone_number,
            'total_price'  => (int)$cus_ID->total_price,
            'menu_name'    => $cus_ID->menu_name,
            'quantity'     => $cus_ID->quantity,
            'customer_table' => $cus_ID->customer_table,
            'completed_at'   => Carbon::now()
        ]);

        DB::table('customer_order')->where('customer_id', $id)->delete();

        return redirect()
            ->route('current-order')
            ->with('status', 'Status Updated');
    }

    public function showOrderHistory()
    {
        $receiveOrder = DB::table('customer_completed')
            ->oldest('completed_at')
            ->paginate(10);

        return view('order.view-order-history', compact('receiveOrder'));
    }

    public function viewSingleOrderHistory($id)
    {
        $orderID = DB::table('customer_completed')
                            ->where('customer_id', $id)
                                ->first();

        $menu_name = explode(", ", $orderID->menu_name);
        $quantity  = explode(", ", $orderID->quantity);
        return view('order.view-single-history-order', compact('orderID', 'menu_name', 'quantity'));
    }

    public function destroy(Request $request)
    {
        $id = $request->dataid;
        DB::table('customer_order')->where('customer_id', $id)->delete();
        return redirect()->back()->with('status', 'Customer Deleted');
    }
}
