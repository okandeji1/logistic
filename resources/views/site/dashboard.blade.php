@extends('site.layouts.site')
@section('content')
    <div class="page-title">
        <div class="container">
            @include('partials.user.messages')
            <div class="padding-tb-120px">
                <h1>Dashboard</h1>

            </div>
        </div>
    </div>


    <div class="container padding-tb-100px">

        <!-- Title -->
        <div class="section-title margin-bottom-40px">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <!-- <div class="icon text-main-color"> 01</div> -->
                    <div class="h2">Home</div>
                </div>
            </div>
        </div>
        <!-- // End Title -->

        <div class="row">
            <div class="col-md-2">
                <table id="cart" class="nile-cart2 table table-hover table-condensed">
                    <thead class="nile-cart-title">
                        <tr>
                            <th style="width:25%" class="text-center">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="product-item " style="background:#e9ecef">
                            <td class="text-center"><a href="/dashboard">Home</a></td>
                        </tr>
                        <tr class="">
                            <td class="text-center"><a href="#" data-toggle="modal" data-target="#exampleModal">create
                                    Order</a></td>
                        </tr>
                        <tr class="">
                            <td class="text-center"><a href="/my-orders">My Orders</a></td>
                        </tr>
                        <tr class="product-item">
                            <td class="text-center"><a href="/my-transactions">My Transactions</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- <div class="col-md-10"> -->
            <div class="col-lg-3 col-sm-6">
                <div class="cart-counters background-main-color">
                    <div class="icon"><i class="fa fa-archive fa-3x"></i></div>
                    <br>
                    <h2>N{{ number_format($sum) }}</h2>
                    <hr>
                    <div class="text">All Orders </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="cart-counters background-main-color">
                    <div class="icon"><i class="fa fa-money fa-3x"></i></div>
                    <br>
                    <h2>N{{ number_format($balance) }}</h2>
                    <hr>
                    <div class="text">Total Amount Owed</div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="cart-counters background-main-color">
                    <div class="icon"><i class="fa fa-credit-card fa-3x"></i></div>
                    <br>
                    <h2>N{{ number_format($amountPaid) }}</h2>
                    <hr>
                    <div class="text">Total Amount Paid</div>
                </div>
            </div>
            <!-- </div> -->
        </div>


    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clearForm()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="section-body">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card">
                                    <div class="card-header">
                                    </div>
                                    <div class="card-body">
                                        <form id="orderForm">
                                            <h3>Order Information</h3>
                                            <fieldset>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label class="form-label">Order Category</label>
                                                        @if (count($categories) > 0)
                                                            <input list="categories" name="orderCategory"
                                                                class="form-control :class=" { 'is-invalid' :
                                                                form.errors.has('orderCategory') }" id="siteOrderCategory"
                                                                required>
                                                            <datalist id="categories">
                                                                @foreach ($categories as $category)
                                                                    <option value="{{ $category->name }}" />
                                                                @endforeach
                                                            </datalist>
                                                        @else
                                                            <h3>Please add order category</h3>
                                                        @endif
                                                        <has-error :form="form" field="orderCategory"></has-error>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group form-float col-lg-6 col-md-12 col-sm-12">
                                                        <div class="form-line">
                                                            <label class="form-label">Select Region</label>
                                                            <input list="regions" id="sitePickupRegion" name="pickupRegion"
                                                                class="form-control :class=" { 'is-invalid' :
                                                                form.errors.has('pickupRegion') }"
                                                                placeholder="Select Region" required>
                                                            <datalist id="regions">
                                                                <option value="Abraham Adesanya Estate (Lagos)" />
                                                                <option value="Abule Egba (Lagos)" />
                                                                <option value="Ago (Lagos)" />
                                                                <option value="Ajah market (Lagos)" />
                                                                <option value="Akoka-unilag (Lagos)" />
                                                                <option value="Akoka (Lagos)" />
                                                                <option value="Alimosho" />
                                                                <option value="Alapere" /> 
                                                                <option value="Owoshooki" /> 
                                                                <option value="Awoyaya" />
                                                                <option value="Lagos Island (Idumota)"   />
                                                                <option value="Ojota" />
                                                                <option value="Ojo" />
                                                                <option value="Iyanapaja" />
                                                                <option value="Merian " />
                                                                <option value="Shasha" />
                                                                <option value="Egbeda " />
                                                                <option value="Amuwo odofin (Lagos)" />
                                                                <option value="Anthony (Lagos)" />
                                                                <option value="Anthony village (Lagos)" />
                                                                <option value="Apapa (Lagos)" />
                                                                <option value="Badore (Lagos)" />
                                                                <option value="Banana island (Lagos)" />
                                                                <option value="Dolphin Estate (Lagos)" />
                                                                <option value="Dopemu (Lagos)" />
                                                                <option value="E-centre Food Court (Lagos)" />
                                                                <option value="Eko Atlantic City (Lagos)" />
                                                                <option value="Fadeyi (Lagos)" />
                                                                <option value="Festac Town (Lagos)" />
                                                                <option value="Gbagada (Lagos)" />
                                                                <option value="Gowon Estate (Lagos)" />
                                                                <option value="Idimu 2 (Lagos)" />
                                                                <option value="Igbo Efon (Lagos)" />
                                                                <option value="Ijegun (Lagos)" />
                                                                <option value="Ikeja-Alausa (Lagos)" />
                                                                <option value="Ikeja-GRA (Lagos)" />
                                                                <option value="Ikeja-Oba Akran (Lagos)" />
                                                                <option value="Ikeja-Opebi (Lagos)" />
                                                                <option value="Ikeja Allen Avenue (Lagos)" />
                                                                <option value="Ikeja Local Airport (Lagos)" />
                                                                <option value="Ikeja Maryland (Lagos)" />
                                                                <option value="Ikeja Mobolaji Bank Anthony (Lagos)" />
                                                                <option value="Ikorodu-Central (Lagos)" />
                                                                <option value="Ikota (Lagos)" />
                                                                <option value="Ikota Shopping Complex (Lagos)" />
                                                                <option value="Ikotun (Lagos)" />
                                                                <option value="Ikoyi-Awolowo (Lagos)" />
                                                                <option value="Ikoyi-Bourdillon (Lagos)" />
                                                                <option value="Ikoyi (Lagos)" />
                                                                <option value="Ilupeju (Lagos)" />
                                                                <option value="Isolo (Lagos)" />
                                                                <option value="Jibowu-Fadeyi (Lagos)" />
                                                                <option value="Jumia ikeja (Lagos)" />
                                                                <option value="Ketu (Lagos)" />
                                                                <option value="Lagos Island (Lagos)" />
                                                                <option value="LCC (Lagos)" />
                                                                <option value="Lekki-Chevron (Lagos)" />
                                                                <option value="Lekki-Elegushi (Lagos)" />
                                                                <option value="Lekki 4th and 5th Roundabout (Lagos)" />
                                                                <option value="Lekki Elf (Lagos)" />
                                                                <option value="Lekki Phase 1 (Lagos)" />
                                                                <option value="Magodo Phase 1 (Lagos)" />
                                                                <option value="Magodo Phase 2 (Lagos)" />
                                                                <option value="Marina (Lagos)" />
                                                                <option value="Marina Express (Lagos)" />
                                                                <option value="Novare Lekki Mall (Lagos)" />
                                                                <option value="Obalende (Lagos)" />
                                                                <option value="Obanikoro (Lagos)" />
                                                                <option value="Ogba (Lagos)" />
                                                                <option value="Ogudu (Lagos)" />
                                                                <option value="Okota (Lagos)" />
                                                                <option value="Oluwaninshola (Lagos)" />
                                                                <option value="Omole Phase 1 (Lagos)" />
                                                                <option value="Onike (Lagos)" />
                                                                <option value="Oniru (Lagos)" />
                                                                <option value="Orile-Iganmu (Lagos)" />
                                                                <option value="Oshodi Isolo (Lagos)" />
                                                                <option value="Sangotedo-Abijo (Lagos)" />
                                                                <option value="Sangotedo-Lagoonside (Lagos)" />
                                                                <option value="Satellite Town (Lagos)" />
                                                                <option value="Surulere-Aguda (Lagos)" />
                                                                <option value="Surulere-Bode Thomas (Lagos)" />
                                                                <option value="Surulere Idi Araba (Lagos)" />
                                                                <option value="Surulere - Ojuelegba (Lagos)" />
                                                                <option value="Surulere-Stadium (Lagos)" />
                                                                <option value="VGC (Lagos)" />
                                                                <option value="Victoria Island (Lagos)" />
                                                                <option value="Yaba-Abule Ijesha (Lagos)" />
                                                                <option value="Yaba-Alagomeji (Lagos)" />
                                                                <option value="Yaba-Ebute Meta (Lagos)" />
                                                                <option value="Yaba-Makoju (Lagos)" />
                                                                <option value="Yaba-Sabo (Lagos)" />
                                                            </datalist>
                                                            <has-error :form="form" field="pickupRegion"></has-error>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-float col-lg-6 col-md-12 col-sm-12">
                                                        <div class="form-line">
                                                            <label class="form-label">Pickup Address</label>
                                                            <input type="text" name="pickupAddress"
                                                                class="form-control :class=" { 'is-invalid' :
                                                                form.errors.has('pickupAddress') }" id="sitePickupAddress"
                                                                required>
                                                            <has-error :form="form" field="pickupAddress"></has-error>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group form-float col-lg-6 col-md-12 col-sm-12">
                                                        <div class="form-line">
                                                            <label class="form-label">Delivery Region</label>
                                                            <input list="regions" id="siteDeliveryRegion"
                                                                name="deliveryRegion" class="form-control :class="
                                                                { 'is-invalid' : form.errors.has('deliveryRegion') }"
                                                                placeholder="Select  Region" required>
                                                            <datalist id="regions">
                                                                <option value="Abraham Adesanya Estate (Lagos)" />
                                                                <option value="Abule Egba (Lagos)" />
                                                                <option value="Ago (Lagos)" />
                                                                <option value="Ajah market (Lagos)" />
                                                                <option value="Akoka-unilag (Lagos)" />
                                                                <option value="Akoka (Lagos)" />
                                                                <option value="Alimosho" />
                                                                <option value="Alapere" /> 
                                                                <option value="Owoshooki" /> 
                                                                <option value="Awoyaya" />
                                                                <option value="Lagos Island (Idumota)"   />
                                                                <option value="Ojota" />
                                                                <option value="Ojo" />
                                                                <option value="Iyanapaja" />
                                                                <option value="Merian " />
                                                                <option value="Shasha" />
                                                                <option value="Egbeda " />
                                                                <option value="Amuwo odofin (Lagos)" />
                                                                <option value="Anthony (Lagos)" />
                                                                <option value="Anthony village (Lagos)" />
                                                                <option value="Apapa (Lagos)" />
                                                                <option value="Badore (Lagos)" />
                                                                <option value="Banana island (Lagos)" />
                                                                <option value="Dolphin Estate (Lagos)" />
                                                                <option value="Dopemu (Lagos)" />
                                                                <option value="E-centre Food Court (Lagos)" />
                                                                <option value="Eko Atlantic City (Lagos)" />
                                                                <option value="Fadeyi (Lagos)" />
                                                                <option value="Festac Town (Lagos)" />
                                                                <option value="Gbagada (Lagos)" />
                                                                <option value="Gowon Estate (Lagos)" />
                                                                <option value="Idimu 2 (Lagos)" />
                                                                <option value="Igbo Efon (Lagos)" />
                                                                <option value="Ijegun (Lagos)" />
                                                                <option value="Ikeja-Alausa (Lagos)" />
                                                                <option value="Ikeja-GRA (Lagos)" />
                                                                <option value="Ikeja-Oba Akran (Lagos)" />
                                                                <option value="Ikeja-Opebi (Lagos)" />
                                                                <option value="Ikeja Allen Avenue (Lagos)" />
                                                                <option value="Ikeja Local Airport (Lagos)" />
                                                                <option value="Ikeja Maryland (Lagos)" />
                                                                <option value="Ikeja Mobolaji Bank Anthony (Lagos)" />
                                                                <option value="Ikorodu-Central (Lagos)" />
                                                                <option value="Ikota (Lagos)" />
                                                                <option value="Ikota Shopping Complex (Lagos)" />
                                                                <option value="Ikotun (Lagos)" />
                                                                <option value="Ikoyi-Awolowo (Lagos)" />
                                                                <option value="Ikoyi-Bourdillon (Lagos)" />
                                                                <option value="Ikoyi (Lagos)" />
                                                                <option value="Ilupeju (Lagos)" />
                                                                <option value="Isolo (Lagos)" />
                                                                <option value="Jibowu-Fadeyi (Lagos)" />
                                                                <option value="Jumia ikeja (Lagos)" />
                                                                <option value="Ketu (Lagos)" />
                                                                <option value="Lagos Island (Lagos)" />
                                                                <option value="LCC (Lagos)" />
                                                                <option value="Lekki-Chevron (Lagos)" />
                                                                <option value="Lekki-Elegushi (Lagos)" />
                                                                <option value="Lekki 4th and 5th Roundabout (Lagos)" />
                                                                <option value="Lekki Elf (Lagos)" />
                                                                <option value="Lekki Phase 1 (Lagos)" />
                                                                <option value="Magodo Phase 1 (Lagos)" />
                                                                <option value="Magodo Phase 2 (Lagos)" />
                                                                <option value="Marina (Lagos)" />
                                                                <option value="Marina Express (Lagos)" />
                                                                <option value="Novare Lekki Mall (Lagos)" />
                                                                <option value="Obalende (Lagos)" />
                                                                <option value="Obanikoro (Lagos)" />
                                                                <option value="Ogba (Lagos)" />
                                                                <option value="Ogudu (Lagos)" />
                                                                <option value="Okota (Lagos)" />
                                                                <option value="Oluwaninshola (Lagos)" />
                                                                <option value="Omole Phase 1 (Lagos)" />
                                                                <option value="Onike (Lagos)" />
                                                                <option value="Oniru (Lagos)" />
                                                                <option value="Orile-Iganmu (Lagos)" />
                                                                <option value="Oshodi Isolo (Lagos)" />
                                                                <option value="Sangotedo-Abijo (Lagos)" />
                                                                <option value="Sangotedo-Lagoonside (Lagos)" />
                                                                <option value="Satellite Town (Lagos)" />
                                                                <option value="Surulere-Aguda (Lagos)" />
                                                                <option value="Surulere-Bode Thomas (Lagos)" />
                                                                <option value="Surulere Idi Araba (Lagos)" />
                                                                <option value="Surulere - Ojuelegba (Lagos)" />
                                                                <option value="Surulere-Stadium (Lagos)" />
                                                                <option value="VGC (Lagos)" />
                                                                <option value="Victoria Island (Lagos)" />
                                                                <option value="Yaba-Abule Ijesha (Lagos)" />
                                                                <option value="Yaba-Alagomeji (Lagos)" />
                                                                <option value="Yaba-Ebute Meta (Lagos)" />
                                                                <option value="Yaba-Makoju (Lagos)" />
                                                                <option value="Yaba-Sabo (Lagos)" />
                                                            </datalist>
                                                            <has-error :form="form" field="deliveryRegion"></has-error>

                                                        </div>
                                                    </div>
                                                    <div class="form-group form-float col-lg-6 col-md-12 col-sm-12">
                                                        <div class="form-line">
                                                            <label class="form-label">Delivery Address</label>
                                                            <input type="text" name="deliveryAddress"
                                                                class="form-control :class=" { 'is-invalid' :
                                                                form.errors.has('deliveryAddress') }"
                                                                id="siteDeliveryAddress" required>
                                                            <has-error :form="form" field="deliveryAddress"></has-error>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group form-float col-lg-6 col-md-12 col-sm-12">
                                                        <div class="form-line">
                                                            <label class="form-label">Delivery Contact name*</label>
                                                            <input type="text" name="deliveryContactName"
                                                                id="siteDeliveryContactName" class="form-control :class="
                                                                { 'is-invalid' : form.errors.has('deliveryContactName') }"
                                                                required>
                                                            <has-error :form="form" field="deliveryContactName"></has-error>
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-float col-lg-6 col-md-12 col-sm-12">
                                                        <div class="form-line">
                                                            <label class="form-label">Delivery Contact Phone*</label>
                                                            <input type="text" name="deliveryContactPhone"
                                                                class="form-control no-resize :class=" { 'is-invalid' :
                                                                form.errors.has('deliveryContactPhone') }"
                                                                id="siteDeliveryContactPhone" required>
                                                            <has-error :form="form" field="deliveryContactPhone">
                                                            </has-error>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <h3>Payment Information</h3>
                                            <fieldset>
                                                <div class="row">
                                                    <div class="form-group form-float col-lg-6 col-md-12 col-sm-12">
                                                        <div class="form-line">
                                                            <label class="form-label">Estimated Amount for Delivery</label>
                                                            <input type="hidden" name="estimatedAmount" class="form-control"
                                                                id="siteEstimatedAmount" required>
                                                        </div>
                                                        <input type="text" id="siteCost" class="form-control d-none"
                                                            disabled>
                                                        <button class="btn btn-danger form-control" id="siteEstimate">Get
                                                            estimated
                                                            amount</button>
                                                        <div class="text-danger" id="msg"></div>
                                                    </div>
                                            </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        onclick="clearForm();">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('/assets/js/jquery.min.js') }}"></script>
    <script>
        // Clear form
        function clearForm() {
            let resetOrder = document.getElementById('orderForm')
            // Reset form
            resetOrder.reset()
            // setTimeout(() => {
            //     window.location.reload(true)
            // }, 1000)

        }
        var amount;
        // Quick order
        var estimateAmount = document.getElementById('siteEstimate');
        estimateAmount.addEventListener('click', getAmount, false);

        function getAmount(e) {
            e.preventDefault(e)
            let pickupRegion = document.getElementById('sitePickupRegion').value;
            let pickupAddress = document.getElementById('sitePickupAddress').value;
            let deliveryRegion = document.getElementById('siteDeliveryRegion').value;
            let deliveryAddress = document.getElementById('siteDeliveryAddress').value;

            // Validation
            if (pickupRegion === '' || typeof pickupRegion === 'undefined') {
                msg = document.getElementById('msg');
                msg.innerHTML = 'All fields are required';
                return
            }

            if (pickupAddress === '' || typeof pickupAddress === 'undefined') {
                msg = document.getElementById('msg');
                msg.innerHTML = 'All fields are required';
                return
            }

            if (deliveryRegion === '' || typeof deliveryRegion === 'undefined') {
                msg = document.getElementById('msg');
                msg.innerHTML = 'All fields are required';
                return
            }

            if (deliveryAddress === '' || typeof deliveryAddress === 'undefined') {
                msg = document.getElementById('msg');
                msg.innerHTML = 'All fields are required';
                return
            }
            // Enter souvrce and destination city
            let origin = pickupAddress + pickupRegion;
            let destination = deliveryAddress + deliveryRegion;

            // make ajax request
            let request = $.ajax({
                url: " {{ url('/distance-matrix') }}",
                type: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "origin": origin,
                    "destination": destination
                },
            });
            request.done(function(data) {
                $('#siteEstimate').addClass('d-none')
                $('#siteCost').removeClass('d-none')
                let response = data.rows[0].elements[0].distance.value;
                const payment = 200 + Math.ceil(response / 1000) * (65);
                amount = 200 + Math.ceil(response / 1000) * (65);
                // console.log(typeof amount)
                let convert = payment.toLocaleString()
                // Display price
                let price = document.getElementById('siteCost')
                price.value = 'NGN ' + convert;
                // Display Amount Paid
                let amountPaid = document.getElementById('amountPaid')
                amountPaid.value = 'NGN ' + convert;
                let estimatedAmount = document.getElementById('siteEstimatedAmount')
                estimatedAmount.value = payment;
            });
            request.fail(function(err) {
                console.log(err)
            })
        }

        var orderForm = document.getElementById('orderForm');
        orderForm.addEventListener('submit', makeOrder, false);

        function makeOrder(e) {
            e.preventDefault();
            // console.log(document.getElementById('siteEstimatedAmount').value)
            // return
            $.ajax({
                url: "{{ url('/make-order') }}",
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "estimatedAmount": document.getElementById('siteEstimatedAmount').value,
                    "pickupRegion": document.getElementById('sitePickupRegion').value,
                    "pickupAddress": document.getElementById('sitePickupAddress').value,
                    "deliveryRegion": document.getElementById('siteDeliveryRegion').value,
                    "deliveryAddress": document.getElementById('siteDeliveryAddress').value,
                    "orderCategory": document.getElementById('siteOrderCategory').value,
                    "deliveryContactPhone": document.getElementById('siteDeliveryContactPhone').value,
                    "deliveryContactName": document.getElementById('siteDeliveryContactName').value,
                },
                success: function(data) {
                    console.log(data)
                    alert(data)
                    // return
                    window.location.reload('/dashboard');
                },
                error: function(error) {
                    console.log(error)
                }
            });
        }

    </script>
@endsection
