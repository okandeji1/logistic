<?php

namespace App\Http\Controllers;

use App\Order;
use App\Customer;
use App\Transaction;
use Paystack;
use Auth;
use App\Charts\CoachChart;

use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guest()) {
            //is a guest so redirect
            return redirect('/auth-login');
        }
        try {
            //code...
            $status = "Pending";
            $completedStatus = "Completed";
            $today = Carbon::today();
            $pendingOrders = Order::where('status', $status)->whereDate('created_at', Carbon::today())->get()->count();
            $completedOrders = Order::where('status', $completedStatus)->whereDate('created_at', Carbon::today())->get()->count();
            $orders = Order::whereDate('created_at', Carbon::today())->orderBy('created_at', 'desc')->paginate(20);
            $customers = Customer::whereDate('created_at', Carbon::today())->get()->count();
            // Today transaction
            $transactionsToday = Transaction::whereDate('created_at', Carbon::today())
                ->get()
                ->sum('amount');

            // Monthly transactions
            $monthlyTransactions = Transaction::whereMonth('created_at', Carbon::today())
                ->get()
                ->sum('amount');

            // Totatal transactions
            $totalTransactions = Transaction::all()
                ->sum('amount');
            // All orders
            $allOrders = Order::all()
                ->count();
            // Today orders
            $ordersToday = Order::whereDate('created_at', Carbon::today())->get()->count();
            // Monthly Order
            $monthlyOrders = Order::whereMonth('created_at', Carbon::today())
                ->get()
                ->count();
            // dd($ordersToday);

            return view(
                'pages.user.dashboard',
                compact(
                    [
                        'orders', $orders,
                        'pendingOrders', $pendingOrders,
                        'completedOrders', $completedOrders,
                        'customers', $customers,
                        'transactionsToday', $transactionsToday,
                        'totalTransactions', $totalTransactions,
                        'monthlyTransactions', $monthlyTransactions,
                        'monthlyOrders', $monthlyOrders,
                        'ordersToday', $ordersToday,
                        'allOrders', $allOrders,
                    ]
                )
            );
        } catch (\Throwable $th) {
            throw $th;
        }
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
    public function show()
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function order()
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
}