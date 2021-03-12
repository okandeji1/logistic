@extends('site.layouts.site')
@section('content')
    <div class="page-title">
        <div class="container">
            <div class="padding-tb-120px">
                <h1 class="text-success">My Orders</h1>
            </div>
        </div>
    </div>
    @if (count($myOrders) > 0)
        <div class="container margin-tb-100px">
            <div class="row margin-bottom-30px">
                <p class="col-md-9 padding-top-5px">showing 1-5 of 5 results</p>
                <div class="col-md-3 text-right">
                    <select class="custom-select" id="inlineFormCustomSelect">
                        <option selected="">Filter by</option>
                        <option value="1">All Orders</option>
                        <option value="2">Completed Orders</option>
                        <option value="3">Uncompleted Orders</option>
                    </select>
                </div>
            </div>
            <div class="row">


                <div class="col-lg-10">

                    <table id="cart" class="nile-cart table table-hover table-condensed">
                        <thead class="nile-cart-title">
                            <tr>
                                <th style="width:25%">S/N</th>
                                <th style="width:25%">Date</th>
                                <th style="width:25%">Pickup Location</th>
                                <th style="width:25%">Delivery Location</th>
                                <th style="width:25%" class="text-center">Amount</th>
                                <th style="width:25%" class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($myOrders as $key => $order)
                                <tr class="product-item">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $order->created_at->format('F j, Y') }}</td>
                                    <td>{{ $order->pickupRegion }}</td>
                                    <td>{{ $order->deliveryRegion }}</td>
                                    <td>{{ $order->estimatedAmount }}</td>
                                    <td>
                                        @switch($order->status)
                                            @case('Picked-Up')
                                            <div class="btn btn-primary btn-sm">
                                                {{ $order->status }}</div>
                                            @break
                                            @case('in-transit')
                                            <div class="btn btn-secondary btn-sm">
                                                {{ $order->status }}</div>
                                            @break
                                            @case('Pending')
                                            <div class="btn btn-warning btn-sm">
                                                {{ $order->status }}</div>
                                            @break
                                            @case('Cancelled')
                                            <div class="btn btn-danger btn-sm">
                                                {{ $order->status }}</div>
                                            @break
                                            @case('Completed')
                                            <div class="btn btn-success btn-sm">
                                                {{ $order->status }}</div>
                                            @break
                                            @default
                                            <div class="btn btn-danger btn-sm">No Order</div>
                                        @endswitch
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td><a href="#" class="nile-bottom md dark"><i class="fa fa-angle-left"></i> Previous</a>
                                </td>
                                <td colspan="2" class="hidden-xs"></td>
                                <td class="hidden-xs text-center"><strong>Total {{ number_format($sum) }}</strong></td>
                                <td class="hidden-xs text-center"><a href="#" class="nile-bottom md">Next </a></td>
                            </tr>
                        </tfoot>
                    </table>
                    {{ $myOrders->links() }}
                </div>

                <div class="col-md-2">

                    <table id="cart" class="nile-cart2 table table-hover table-condensed">
                        <thead class="nile-cart-title">
                            <tr>
                                <th style="width:25%" class="text-center">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="product-item">
                                <td data-th="Subtotal" class="text-center"><a href="/my-orders">My Orders</a></td>
                            </tr>
                            <tr class="product-item">
                                <td data-th="Subtotal" class="text-center"><a href="/my-transactions">My Transactions</a>
                                </td>
                            </tr>
                            <tr class="product-item">
                                <td data-th="Subtotal" class="text-center"><a href="#">Complaints</a></td>
                            </tr>
                        </tbody>
                    </table>



                </div>
                <!-- // column -->

            </div>

        </div>
    @else
        <h3>No Order</h3>
    @endif
@endsection
