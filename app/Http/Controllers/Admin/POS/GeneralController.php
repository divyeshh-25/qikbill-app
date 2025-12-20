<?php

namespace App\Http\Controllers\Admin\POS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function cashRegister(Request $request)
    {
        return view('admin.POS.modals.cash-registry');
    }

    public function printReceipt(Request $request)
    {
        return view('admin.POS.modals.print-receipt');
    }

    public function todaySale(Request $request)
    {
        return view('admin.POS.modals.sales');
    }
    
    public function orderDiscount(Request $request)
    {
        return view('admin.POS.modals.order-discount');
    }

    public function orderTax(Request $request)
    {
        return view('admin.POS.modals.order-tax');
    }

    public function shippingCost(Request $request)
    {
        return view('admin.POS.modals.shipping-cost');
    }

    public function holdOrder(Request $request)
    {
        return view('admin.POS.modals.hold-order');
    }

    public function createCustomer(Request $request)
    {
        return view('admin.POS.modals.customer');
    }

    public function resetOrder(Request $request)
    {
        return view('admin.POS.modals.reset-order');
    }

    public function viewOrders(Request $request)
    {
        return view('admin.POS.modals.view-orders');
    }

    public function showProduct(Request $request)
    {
        return view('admin.POS.modals.show-product');
    }

    public function editProduct(Request $request)
    {
        return view('admin.POS.modals.edit-product');
    }

    public function deleteProduct(Request $request)
    {
        return view('admin.POS.modals.delete-product');
    }

    public function recentTransaction(Request $request)
    {
        return view('admin.POS.modals.recent-transaction');
    }
}
