@extends('layouts.page')
@section('content')
    <div class="main-content">
        <section class="section">
            <ul class="breadcrumb breadcrumb-style ">
                <li class="breadcrumb-item">
                    <h4 class="page-title m-b-0">Create Order</h4>
                </li>
                <!--  -->
            </ul>
            <div class="section-body">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <form method="POST" action="/create-order" id="wizard_with_validation">
                                    {{ csrf_field() }}
                                    <h3>Account Information</h3>
                                    @include('partials.user.messages')
                                    <fieldset>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label class="form-label">Customer Name</label>
                                                @if (count($customers) > 0)
                                                    <input list="customers" class="form-control :class=" { 'is-invalid' :
                                                        form.errors.has('customerName') }" name="customerName"
                                                        id="customerName" onchange="showPhone()" required>
                                                    <datalist id="customers">
                                                        @foreach ($customers as $customer)
                                                            <option value="{{ $customer->fullname }}" />
                                                        @endforeach
                                                    </datalist>
                                                @else
                                                    <h3 class="text-danger">Please register a customer and continue</h3>
                                                @endif
                                                <has-error :form="form" field="customerName"></has-error>
                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label class="form-label">Customer Email</label>
                                                <input type="email" class="form-control :class=" { 'is-invalid' :
                                                    form.errors.has('customerEmail') }" name="customerEmail"
                                                    id="customerEmail">
                                                <has-error :form="form" field="customerEmail"></has-error>
                                            </div>
                                        </div>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label class="form-label">Customer Phone</label>
                                                <input type="text" class="form-control :class=" { 'is-invalid' :
                                                    form.errors.has('customerPhone') }" name="customerPhone"
                                                    id="customerPhone" required>
                                                <has-error :form="form" field="customerPhone"></has-error>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <h3>Order Information</h3>
                                    <fieldset>
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <label class="form-label">Order Category</label>
                                                @if (count($categories) > 0)
                                                    <input list="categories" name="orderCategory"
                                                        class="form-control :class=" { 'is-invalid' :
                                                        form.errors.has('orderCategory') }" id="orderCategory" required>
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
                                                    <input list="regions" id="pickupRegion" name="pickupRegion"
                                                        class="form-control :class=" { 'is-invalid' :
                                                        form.errors.has('pickupRegion') }" placeholder="Select Region"
                                                        required>
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
                                                    <input type="text" name="pickupAddress" class="form-control :class="
                                                        { 'is-invalid' : form.errors.has('pickupAddress') }"
                                                        id="pickupAddress" required>
                                                    <has-error :form="form" field="pickupAddress"></has-error>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group form-float col-lg-6 col-md-12 col-sm-12">
                                                <div class="form-line">
                                                    <label class="form-label">Delivery Region</label>
                                                    <input list="regions" id="deliveryRegion" name="deliveryRegion"
                                                        class="form-control :class=" { 'is-invalid' :
                                                        form.errors.has('deliveryRegion') }" placeholder="Select  Region"
                                                        required>
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
                                                    <input type="text" name="deliveryAddress" class="form-control :class="
                                                        { 'is-invalid' : form.errors.has('deliveryAddress') }"
                                                        id="deliveryAddress" required>
                                                    <has-error :form="form" field="deliveryAddress"></has-error>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group form-float col-lg-6 col-md-12 col-sm-12">
                                                <div class="form-line">
                                                    <label class="form-label">Delivery Contact name*</label>
                                                    <input type="text" name="deliveryContactName" id="deliveryContactName"
                                                        class="form-control :class=" { 'is-invalid' :
                                                        form.errors.has('deliveryContactName') }" required>
                                                    <has-error :form="form" field="deliveryContactName"></has-error>
                                                </div>
                                            </div>
                                            <div class="form-group form-float col-lg-6 col-md-12 col-sm-12">
                                                <div class="form-line">
                                                    <label class="form-label">Delivery Contact Phone*</label>
                                                    <input type="text" name="deliveryContactPhone"
                                                        class="form-control no-resize :class=" { 'is-invalid' :
                                                        form.errors.has('deliveryContactPhone') }" id="deliveryContactPhone"
                                                        required>
                                                    <has-error :form="form" field="deliveryContactPhone"></has-error>
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
                                                    <input type="hidden" name="estimatedAmount" class="form-control :class="
                                                        { 'is-invalid' : form.errors.has('estimatedAmount') }"
                                                        id="estimatedAmount" required>
                                                    <has-error :form="form" field="estimatedAmount"></has-error>
                                                </div>
                                                <input type="text" id="cost" class="form-control d-none" disabled>
                                                <button class="btn btn-danger form-control" id="estimate">Get estimated
                                                    amount</button>
                                                <div class="text-danger" id="msg"></div>
                                            </div>
                                            <div class="form-group form-float col-lg-6 col-md-12 col-sm-12">
                                                <div class="form-line">
                                                    <label class="form-label">Amount Paid</label>
                                                    <input type="text" name="amountPaid"
                                                        class="form-control no-resize :class=" { 'is-invalid' :
                                                        form.errors.has('amountPaid') }" id="amountPaid" required>
                                                    <has-error :form="form" field="amountPaid"></has-error>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                <label>Payment Type</label>
                                                <select class="form-control" name="paymentType">
                                                    <option value="Transfer">Transfer</option>
                                                    <option value="Card">Card</option>
                                                    <option value="Cash">Cash</option>
                                                </select>
                                            </div>
                                            <div class="form-group form-float col-lg-6 col-md-12 col-sm-12">
                                                <div class="form-line">
                                                    <label class="form-label">Assign a Rider</label>
                                                    <input list="riders" name="assignedRider" class="form-control :class="
                                                        { 'is-invalid' : form.errors.has('assignedRider') }"
                                                        id="assignedRider" required>
                                                    <datalist id="riders">
                                                        @foreach ($riders as $rider)
                                                            <option value="{{ $rider->fullname }}" />
                                                        @endforeach
                                                    </datalist>
                                                    <has-error :form="form" field="assignedRider"></has-error>
                                                </div>
                                            </div>
                                        </div>
                                        <input id="acceptTerms-2" name="acceptTerms" type="checkbox" required
                                            data-toggle="modal" data-target="#exampleModal">
                                        <label for="acceptTerms-2">I agree with the Terms and Conditions.</label>
                                        <div class="form-group form-float col-6">
                                            <div class="form-line">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- T&C Modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Terms and Conditions</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <ul>
                            <li>You must disclose to us the content of the delivery at the time of making your order.
                                You
                                shall not change the content disclosed to us when our dispatch gets to your premises.
                            </li>
                            <li>You agree to ensure that the information you supply in the Order Schedule is complete
                                and
                                accurate</li>
                            <li>The coach express may reject your order where the KG is bigger than our carriers. In
                                this
                                instance, you will be entitled only to a refund of payments made. It is important to
                                know
                                that we will only be doing deliveries for items that can be carried by our bikes</li>
                            <li>You shall not keep our dispatcher for more than 10minutes, anything after that will be
                                N65
                                for every 5minutes of delay after the initial 10minutes</li>
                            <li>The Coach Express dispatcher shall not provide any equipment or labor to you or your
                                representative aside from picking up items already confirmed at the time of making the
                                order. You must not give our dispatcher any item not disclosed to our representative at
                                the
                                time of making the order. </li>
                            <li>Our dispatch will make one attempt to deliver goods/items during normal working hours,
                                where
                                we can’t reach the receiver, we will notify you and the order will be brought back to
                                our
                                office or delivered back to you. If you wish for us to try the delivery again, you will
                                need
                                to pay again or have the receiver pick up from our office.</li>
                            <li>If there is a delay in delivery, we will try delivering your order the next day without
                                any
                                cost to you. </li>
                            <li>If your order is made after 10am and the locations are far we might not be able to
                                deliver
                                the item until the next day</li>
                            <li>You agree not to use the coach to carry any illegal substance, hard drugs, firearms,
                                pyrotechnics, corrosive, flammable items, oxidizing or radioactive materials and any
                                good
                                considered as contrabands under the laws of the Federal Republic of Nigeria. </li>
                            <li>You are responsible for providing insurance coverage of your goods. The coach will
                                ensure
                                the items given to us is delivered in the same condition it was given to us.</li>
                            <li>The Rider and The Coach Express reserves the right to refuse to carry any parcels where
                                there is suspicion of the content. In such situation you are to confirm the content of
                                the
                                parcel to the rider. </li>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Script --}}
    <script>
        var customers = <?php echo json_encode(
        $customers); ?> ; //get all customers from database query

        var customerPhone = document.getElementById('customerPhone'); //phone field
        var customerEmail = document.getElementById('customerEmail'); //email field


        const showPhone = () => {
            let customerName = document.getElementById('customerName').value;

            let customer = (customers.filter((customer) => customer.fullname === customerName));
            customerEmail.value = (customer[0].email); // fill email
            customerPhone.value = customer[0].phoneNumber; // fill phone
        }


        // Quick order
        var estimateAmount = document.getElementById('estimate');
        estimateAmount.addEventListener('click', quickOrderCalc, false);

        function quickOrderCalc() {
            let pickupRegion = document.getElementById('pickupRegion').value;
            let pickupAddress = document.getElementById('pickupAddress').value;
            let deliveryRegion = document.getElementById('deliveryRegion').value;
            let deliveryAddress = document.getElementById('deliveryAddress').value;

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
            // Enter source and destination city
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
                $('#estimate').addClass('d-none')
                $('#cost').removeClass('d-none')
                let response = data.rows[0].elements[0].distance.value;
                const payment = 200 + Math.ceil(response / 1000) * (65);
                let convert = payment.toLocaleString()
                let price = document.getElementById('cost')
                price.value = 'NGN ' + convert;
                let estimatedAmount = document.getElementById('estimatedAmount')
                estimatedAmount.value = payment;
                console.log(estimatedAmount)
            });
            request.fail(function(err) {
                console.log(err)
            })
        }

    </script>
@endsection
