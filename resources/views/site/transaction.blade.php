@extends('site.layouts.site')
@section('content')
    <div class="page-title">
        <div class="container">
            <div class="padding-tb-120px">
                <h1>My Transactions</h1>
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
                    <td><a href="/paid-orders" class="nile-bottom md dark" style=" background-color:#2098d1;"> Generate
                            Invoice</a>
                    </td>
                    &nbsp
                    <td><a href="#" class="nile-bottom md dark" style=" background-color:#28a745;" data-toggle="modal"
                            data-target="#paymentModal"> Make Payment</a></td>
                    &nbsp
                    <br>
                    <br>
                    <table id="cart" class="nile-cart table table-hover table-condensed">
                        <thead class="nile-cart-title">
                            <tr>
                                <th style="width:25%">S/N</th>
                                <th style="width:25%">Date</th>
                                <th style="width:25%">Pickup Region</th>
                                <th style="width:25%">Delivery</th>
                                <th style="width:25%" class="text-center">Amount</th>
                                <th style="width:25%" class="text-center">Payment status</th>
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
                                        @if ($order->is_paid)
                                            <button class="btn btn-success btn-sm">Completed</button>
                                        @else
                                            <button class="btn btn-danger btn-sm">Not completed</button>

                                        @endif
                                    </td>
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

    <!-- Payment Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Select Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" novalidate="" id="orderForm">
                        <script src="https://js.paystack.co/v1/inline.js"></script>
                        <input type="hidden" name="" id="userId" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="" id="userEmail" value="{{ Auth::user()->email }}">
                        <input type="hidden" name="" id="userName" value="{{ Auth::user()->fullname }}">
                        <input type="hidden" name="" id="userPhone" value="{{ Auth::user()->phoneNumber }}">
                        <div class="form-group">
                            <label for="order">Order</label>
                            @if (count($unPaidOrders) > 0)
                                <select name="order" class="form-control" id="y" required>
                                    <option value="">Select order</option>
                                    @foreach ($unPaidOrders as $order)
                                        <option value="{{ $order->id }}">{{ $order->estimatedAmount }} for
                                            {{ $order->category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            @else
                                <h3>No order unpaid</h3>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-success btn-lg btn-block" tabindex="4" id="pay">
                                Make Payment
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('/assets/js/jquery.min.js') }}"></script>
    <script>
        var orderId;
        var paid
        let orderForm = document.getElementById('orderForm')
        orderForm.addEventListener('submit', selected, false);

        function selected(e) {
            e.preventDefault();
            var x = document.getElementById('y').value
            if (x === "" || typeof x === "undefined") {
                return alert("Non selected")
            }
            let request = $.ajax({
                url: " {{ url('/payment') }}",
                type: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": x,
                },
            });
            request.done(function(data) {
                paid = data.estimatedAmount
                orderId = data.id;
                payWithPaystack();
            });
            request.fail(function(err) {
                console.log(err)
            })
        }

        function payWithPaystack() {
            // Replace with your public key
            // var key = 'pk_test_ad11304f43dd83da7426ebc49e193cd6a033bcd4';
            // Live key
            var key = "pk_live_8788024222fd48d6fcda8f823fc74ce8ff50faa0";
            var handler = PaystackPop.setup({
                amount: paid *
                    100, // the amount value is multiplied by 100 to convert to the lowest currency unit
                key: key, // Replace with your public key
                // email: document.getElementById('customerEmail').value,
                email: document.getElementById('userEmail').value,
                currency: 'NGN', // Use GHS for Ghana Cedis or USD for US Dollars
                customerName: document.getElementById('userName').value,
                customerPhone: document.getElementById('userPhone').value,
                ref: '' + Math.floor((Math.random() * 1000000000) + 1), // Replace with a reference you generated
                metadata: {
                    custom_fields: [{
                            display_name: "Customer ID",
                            variable_name: "customerId",
                            value: document.getElementById('userId').value
                        },
                        {
                            display_name: "Order ID",
                            variable_name: "orderId",
                            value: orderId
                        },
                    ]
                },
                callback: function(response) {
                    //this happens after the payment is completed successfully
                    console.log(response)
                    var ref = response.reference;
                    alert('You have successfully paid for an order!');
                    window.location.href = '/customer-transactions/' + ref
                },
                onClose: function() {
                    alert('Transaction was not completed.');
                },
            });
            handler.openIframe();
        }

    </script>
@endsection
