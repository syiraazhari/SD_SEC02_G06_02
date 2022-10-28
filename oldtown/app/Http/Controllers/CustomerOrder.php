<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        DB::table('customer_order')
            ->where('customer_id', $id)
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

    public function editCurrentStatus(Request $request, $id)
    {
        $id = $request->dataid;

        DB::table('customer_order')
            ->where('customer_id', $id)
            ->update([
                'status' => 'Completed',
            ]);
        return redirect()
            ->route('current-order')
            ->with('status', 'Status Updated');
    }

    public function showOrderHistory()
    {
        $receiveOrder = DB::table('customer_order')
            ->where('status', 'Completed')
            ->oldest('ordered_at')
            ->paginate(10);

        return view('order.view-order-history', compact('receiveOrder'));
    }

    public function viewSingleOrderHistory($id)
    {
        $orderID = DB::table('customer_order')
                            ->where('customer_id', $id)
                                ->first();

        $menu_name = explode(", ", $orderID->menu_name);
        $quantity  = explode(", ", $orderID->quantity);
        return view('order.view-single-history-order', compact('orderID', 'menu_name', 'quantity'));
    }
}