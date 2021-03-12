@extends('site.layouts.site')
@section('content')
    <div class="page-title">
        <div class="container">
            <div class="padding-tb-120px">
                <h1>Paid Orders</h1>
            </div>
        </div>
    </div>
    @if (count($paidOrders) > 0)
        <div class="container margin-tb-100px">
            <div class="row margin-bottom-30px">
                <p class="col-md-9 padding-top-5px">showing 1-5 of 5 results</p>
                <div class="col-md-3 text-right">
                    <select class="custom-select" id="inlineFormCustomSelect">
                        <option selected="">Filter by</option>
                        <option value="1">All Transactions</option>
                        <option value="2">Completed Orders</option>
                        <option value="3">Pending Orders</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10">
                    <td><a href="#" class="nile-bottom md dark" style="background-color:#f33d10;"> Outstanding Payment :
                            N{{ number_format($balance) }}</a></td>&nbsp
                    <table id="cart" class="nile-cart table table-hover table-condensed">
                        <thead class="nile-cart-title">
                            <tr>
                                <th style="width:25%">S/N</th>
                                <th style="width:25%">Date</th>
                                <th style="width:25%">Pickup Region</th>
                                <th style="width:25%">Delivery</th>
                                <th style="width:25%" class="text-center">Amount</th>
                                <th style="width:25%" class="text-center">Payment status</th>
                                <th style="width:25%" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($paidOrders as $key => $order)
                                <tr class="product-item">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $order->updated_at->format('F j, Y') }}</td>
                                    <td>{{ $order->pickupRegion }}</td>
                                    <td>{{ $order->deliveryRegion }}</td>
                                    <td>{{ $order->estimatedAmount }}</td>
                                    <td>
                                        <button class="btn btn-success btn-sm">Completed</button>
                                    </td>
                                    <td><a href="/receipt/{{ $order->uuid }}" class="btn btn-primary" data-toggle="tooltip"
                                            title="Generate receipt" data-original-title="View receipt"><i
                                                class="fa fa-eye text-white"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td><a href="#" class="nile-bottom md dark"><i class="fa fa-angle-left"></i> Previous</a>
                                </td>
                                <td colspan="2" class="hidden-xs"></td>
                                <td class="hidden-xs text-center"><strong>Total {{ number_format($amountPaid) }}</strong>
                                </td>
                                <td class="hidden-xs text-center"><a href="#" class="nile-bottom md">Next </a></td>
                            </tr>
                        </tfoot>
                    </table>
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
        <h3>No paid order</h3>
    @endif
@endsection
