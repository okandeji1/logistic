<header>
    <div id="fixed-header-dark" class="header-output fixed-header" style="background: rgba(0,0,0,.6);">
        <div class="header-output">
            <div class="container header-in">

                <!-- Up Head -->

                <div class="position-relative">
                    <div class="row">
                        <div class="col-lg-3 col-md-12">
                            <a id="logo" href="/" class="d-inline-block margin-tb-20px"><img
                                    src="{{ asset('site/images/logz.png') }}" alt="Coach Logo" style="width: 50%;"></a>
                            <a class="mobile-toggle padding-15px background-second-color border-radius-3" href="#"><i
                                    class="fa fa-bars"></i></a>
                        </div>
                        <div class="col-lg-7 col-md-12 position-inherit">
                            <ul id="menu-main"
                                class="nav-menu float-xl-left text-lg-center link-padding-tb-25px white-link dropdown-dark">
                                <li class="active"><a href="/">Home</a></li>
                                <li class=""><a href="/about-us">About us</a></li>
                                <li><a href="/what-we-offer">Our Services</a>
                                <li><a data-toggle="modal" href="#" data-target=".trackOrder">Track My Order</a>
                                </li>
                                <li><a href="contact-us">Contact Us</a></li>
                                @if (Auth::user())
                                    <li>@can('isCustomer')
                                            <a href="/dashboard"><i class="fa fa-user text-success"> Dashboard</i></a>
                                            @if (Auth::user()->is_sla)
                                                <div class="text-blue">
                                                    <h5>
                                                        ₦{{ number_format(Auth::user()->sla->balance, 2) }}
                                                    </h5>
                                                </div>
                                            @endif
                                        @endcan
                                    </li>
                                    <li>
                                        <a href="/logout">Logout</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#authModal">Login</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        @if (!Auth::user())
                            <div class="col-lg-2 col-md-12  d-none d-lg-block">
                                <a data-toggle="modal" href="#" style="background-color: green"
                                    data-target=".bd-example-modal-lg"
                                    class="btn btn-sm border-radius-30 margin-tb-20px text-white  background-main-color  box-shadow float-right padding-lr-20px margin-left-30px d-block">
                                    Request a Delivery
                                </a>
                            </div>
                        @endif
                        {{-- <div class="col-lg-2 col-md-12 d-lg-block">
                            <a data-toggle="modal" href="#" style="background-color: green"
                                data-target=".bd-example-modal-lg"
                                class="float-right padding-lr-20px margin-left-30px d-block margin-tb-20px text-white border-radius-30"><i
                                    class="fa fa-key"></i>
                            </a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!--  Get A Quote  -->
<div class="modal contact-modal fade trackOrder" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content margin-top-150px background-main-color">
            <div class="row no-gutters">
                <div class="col-lg-5">
                    <div class="padding-30px">
                        <br>
                        <br>
                        <h3 class="padding-bottom-15px">Enter your tracking ID to get your order status.</h3>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="padding-30px">
                        <form id="searchDelivery">
                            <div class="form-row">
                                <div class="form-group col-lg-12 col-md-12">
                                    <label>Tracking ID</label>
                                    <input type="text" name="q" class="form-control :class=" { 'is-invalid'
                                        :form.errors.has('q') }" id="q" placeholder="">
                                    <has-error :form="form" field="deliveryAddress"></has-error>
                                </div>

                            </div>
                            <div class="error text-danger"></div>
                            <button type="submit"
                                class="btn-sm btn-round background-dark text-white text-center  text-uppercase rounded padding-15px">Search
                            </button>
                        </form>
                        <div class="msg p-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- // Get A Quote  -->

<!-- Get A Quote  -->
<div class="modal contact-modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content margin-top-150px background-main-color">
            <div class="row no-gutters">
                <div class="col-lg-12">
                    <div class="padding-30px">
                        <h3 class="padding-bottom-15px">Request a Delivery</h3>
                        <div class="tab">
                            <button class="tablinks" onclick="openCity(event, 'order')">Order Details</button>
                            {{-- <button class="tablinks"
                                onclick="openCity(event, 'order')">Checkout Out</button>
                            --}}
                        </div>
                        <div id="order" class="tabcontent">
                            <form id="paymentForm">
                                <script src="https://js.paystack.co/v1/inline.js"></script>
                                <div class="closeMe" id="closeMe">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="from-country">Pickup Area</label>
                                            <input list="regions" name="pickupRegion" class="form-control :class="
                                                { 'is-invalid' : form.errors.has('pickupRegion') }"
                                                placeholder="Select Region" id="pickupRegion" required autofocus>
                                            <datalist id="regions">
                                                <option value="Abraham Adesanya Estate (Lagos)" />
                                                <option value="Abule Egba (Lagos)" />
                                                <option value="Ago (Lagos)" />
                                                <option value="Ajah market (Lagos)" />
                                                <option value="Akoka-unilag (Lagos)" />
                                                <option value="Akoka (Lagos)" />
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
                                        <div class="form-group col-md-6">
                                            <label>Pickup Address</label>
                                            <input type="text" name="pickupAddress"
                                                style="border-radius: 7px; background: white;"
                                                class="form-control :class=" { 'is-invalid' :
                                                form.errors.has('pickupAddress') }" id="pickupAddress"
                                                placeholder="Pickup Address" required>
                                            <has-error :form="form" field="pickupAddress"></has-error>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="from-country">delivery Area</label>
                                            <input list="delRegions" name="deliveryRegion" class="form-control :class="
                                                { 'is-invalid' : form.errors.has('deliveryRegion') }"
                                                placeholder="Select Region" id="deliveryRegion" required>
                                            <datalist id="delRegions">
                                                <option value="Abraham Adesanya Estate (Lagos)" />
                                                <option value="Abule Egba (Lagos)" />
                                                <option value="Ago (Lagos)" />
                                                <option value="Ajah market (Lagos)" />
                                                <option value="Akoka-unilag (Lagos)" />
                                                <option value="Akoka (Lagos)" />
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
                                        <div class="form-group col-md-6">
                                            <label>Delivery Address</label>
                                            <input type="text" name="deliveryAddress"
                                                style="border-radius: 7px; background: white;"
                                                class="form-control :class=" { 'is-invalid' :
                                                form.errors.has('deliveryAddress') }" id="deliveryAddress" required>
                                            <has-error :form="form" field="deliveryAddress"></has-error>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="from-country">Item Category</label>
                                            @if (count($categories) > 0)
                                                <select name="orderCategory" class="form-control :class=" { 'is-invalid'
                                                    : form.errors.has('orderCategory') }" id="orderCategory" required>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->name }}">{{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            @else
                                                <h3>Please add order category</h3>
                                            @endif
                                            <has-error :form="form" field="orderCategory"></has-error>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="invoice-id">Customer Contact Name</label>
                                            <input type="text" name="customerName"
                                                style="border-radius: 7px; background: white;"
                                                class="form-control :class=" { 'is-invalid' :
                                                form.errors.has('customerName') }" id="customerName"
                                                placeholder="Customer Contact Name" required>
                                            <has-error :form="form" field="customerName"></has-error>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Pickup Contact Phone</label>
                                            <input type="text" name="customerPhone"
                                                style="border-radius: 7px; background: white;"
                                                class="form-control :class=" { 'is-invalid' :
                                                form.errors.has('customerPhone') }" id="customerPhone"
                                                placeholder="Customer Contact Phone" required>
                                            <has-error :form="form" field="customerPhone"></has-error>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Customer Contact Email</label>
                                            <input type="email" name="customerEmail"
                                                style="border-radius: 7px; background: white;"
                                                class="form-control :class=" { 'is-invalid' :
                                                form.errors.has('customerEmail') }" id="customerEmail"
                                                placeholder="Customer Contact Email">
                                            <has-error :form="form" field="customerEmail"></has-error>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="invoice-id">Delivery Contact Name</label>
                                            <input type="text" name="deliveryContactName"
                                                style="border-radius: 7px; background: white;"
                                                class="form-control :class=" { 'is-invalid' :
                                                form.errors.has('deliveryContactName') }" id="deliveryContactName"
                                                placeholder="Delivery Contact Name" required>
                                            <has-error :form="form" field="deliveryContactName"></has-error>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Delivery Contact Phone</label>
                                            <input type="text" name="deliveryContactPhone"
                                                style="border-radius: 7px; background: white;"
                                                class="form-control :class=" { 'is-invalid' :
                                                form.errors.has('deliveryContactPhone') }" id="deliveryContactPhone"
                                                placeholder="Delivery Contact Phone" required>
                                            <has-error :form="form" field="deliveryContactPhone"></has-error>
                                        </div>
                                        <div id="msg" class="text-danger"></div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <button id="fieldsCancelBTN"
                                                class="btn btn-sm btn-block btn-danger text-white text-center  text-uppercase rounded-0 padding-15px close"
                                                style="border-radius:10px" data-dismiss="modal">Cancel</button>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <button type="button"
                                                class="btn-sm btn-block btn-primary text-white text-center  text-uppercase rounded-0 padding-15px"
                                                style="float: right; border-radius:10px" id="next">Next</button>
                                        </div>
                                    </div>
                                </div>
                                {{-- Amount hidden--}}
                                <div class="checkout d-none">
                                    <p>
                                    <div>
                                        <p>Total Payment</p>
                                        <div class="price"></div>
                                    </div>
                                    </p>
                                    <input type="hidden" name="amountPaid" id="amountPaid">

                                    <!-- </div> -->
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <button id="priceCancelBTN"
                                                class="btn btn-sm btn-block btn-danger text-white text-center  text-uppercase rounded-0 padding-15px close"
                                                style="border-radius:10px" data-dismiss="modal">Cancel</button>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <button type="submit"
                                                class="btn-sm btn-block btn-outline-success text-white text-center  text-uppercase rounded-0 padding-15px"
                                                style="float: right; border-radius:10px"
                                                onclick="payWithPaystack()">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<!-- // Get A Quote  -->
<!-- Auth Modal -->
<div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="resetForm();">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                            aria-controls="home" aria-selected="true">Login</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="signUp-tab" data-toggle="tab" href="#signUp" role="tab"
                            aria-controls="signUp" aria-selected="false">Register</a>

                    </li>
                </ul>
                {{-- Tab content --}}
                <div class="tab-content" id="myTabContent">
                    {{-- Login --}}
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <form class="needs-validation" novalidate="" id="loginForm">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" tabindex="1" required
                                    autofocus>
                                <div class="invalid-feedback">
                                    Please fill in your email
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Password</label>
                                    {{-- <div class="float-right">
                                        <a href="/auth-forgot-password" class="text-small">
                                            Forgot Password?
                                        </a>
                                    </div> --}}
                                </div>
                                <input id="password" type="password" class="form-control" name="password" tabindex="2"
                                    required>
                                <div class="invalid-feedback">
                                    please fill in your password
                                </div>
                            </div>
                            <div class="text-danger" id="msg"></div>
                            <div class="alert alert-primary d-none" id="msg"></div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                    {{-- Register --}}
                    <div class="tab-pane fade" id="signUp" role="tabpanel" aria-labelledby="signUp-tab">
                        <form class="needs-validation" novalidate="" id="registerForm">
                            <div class="form-group">
                                <label for="fullname">Full Name</label>
                                <input id="fullname" type="text" class="form-control" name="fullname" tabindex="1"
                                    required autofocus>
                                <div class="invalid-feedback">
                                    Please fill in your full name
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="regemail" type="email" class="form-control" name="email" tabindex="1"
                                    required autofocus>
                                <div class="invalid-feedback">
                                    Please fill in your email
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Password</label>
                                    {{-- <div class="float-right">
                                        <a href="/auth-forgot-password" class="text-small">
                                            Forgot Password?
                                        </a>
                                    </div> --}}
                                </div>
                                <input id="regpassword" type="password" class="form-control" name="password"
                                    tabindex="2" required>
                                <div class="invalid-feedback">
                                    please fill in your password
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <div class="d-block">
                                    <label for="cpassword" class="control-label">Confirm Password</label>
                                </div>
                                <input id="cpassword" type="password" class="form-control" name="cpassword" tabindex="2"
                                    required>
                                <div class="invalid-feedback">
                                    please confirm your password
                                </div>
                            </div> --}}
                            <div class="form-group">
                                <div class="d-block">
                                    <label for="phone" class="control-label">Phone Number</label>
                                </div>
                                <input id="phone" type="text" class="form-control" name="phone" tabindex="2" required>
                                <div class="invalid-feedback">
                                    Please input phone number
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <div class="d-block">
                                    <label for="address" class="control-label">Address</label>
                                </div>
                                <textarea id="address" class="form-control" name="address" tabindex="2" required>
                                        </textarea>
                                <div class="invalid-feedback">
                                    please input address
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="d-block">
                                    <label for="state" class="control-label">State</label>
                                </div>
                                <input id="state" type="text" class="form-control" name="state" tabindex="2" required>
                                <div class="invalid-feedback">
                                    please input your state
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="d-block">
                                    <label for="country" class="control-label">Country</label>
                                </div>
                                <input id="country" type="text" class="form-control" name="country" tabindex="2"
                                    required>
                                <has-error :form="form" field="country"></has-error>
                                <div class="invalid-feedback">
                                    please input your country
                                </div>
                            </div> --}}
                            <div class="text-danger" id="msg"></div>
                            <div class="alert alert-primary d-none" id="msg"></div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                    Sign Up
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('/assets/js/jquery.min.js') }}"></script>
<script>
    // Search
    var searchDelivery = document.getElementById('searchDelivery');
    searchDelivery.addEventListener('submit', checkOrderStatus, false);

    function checkOrderStatus(e) {
        e.preventDefault();
        searchTearm = document.getElementById('q').value;
        if (searchTearm === '' || typeof searchTearm === 'undefine') {
            let error = document.querySelector('.error')
            error.innerHTML = 'This field is required';
            setTimeout(() => {
                error.innerHTML = '';
            }, 1000)
            return
        }
        $.ajax({
            url: "{{ url('/track-my-order') }}",
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "q": searchTearm
            },
            success: function(data) {
                let response
                for (var i = 0; i < data.length; i++) {
                    response = data[i]
                }
                let status = response.status;
                let message = document.querySelector('.msg')
                message.innerHTML = 'Your delivery is ' + status;
                setTimeout(() => {
                    document.getElementById('searchDelivery').reset();
                    message.innerHTML = '';
                }, 5000)
                return
            },
            error: function(err) {
                console.log(err)
            }
        });
    }

</script>

<script>
    var origin;
    var destination;
    var amount;
    var originRegion
    var destinationRegion
    // Select buttons
    let fieldsCancelBTN = document.querySelector('#fieldsCancelBTN');
    let priceCancelBTN = document.querySelector('#priceCancelBTN');
    // Set time out
    fieldsCancelBTN.addEventListener('click', cancelClicked, false);
    priceCancelBTN.addEventListener('click', cancelClicked, false);
    // Reload page after cancel is clicked
    function cancelClicked() {
        document.getElementById('paymentForm').reset()
        setTimeout(() => {
            window.location.reload(true)
        }, 1000)
    }

    // Display some form fields
    $('#next').on('click', (e) => {

        let pickupRegion = document.getElementById('pickupRegion').value;
        let pickupAddress = document.getElementById('pickupAddress').value;
        let deliveryRegion = document.getElementById('deliveryRegion').value;
        let deliveryAddress = document.getElementById('deliveryAddress').value;
        let orderCategory = document.getElementById('orderCategory').value;
        let customerName = document.getElementById('customerName').value;
        let customerPhone = document.getElementById('customerPhone').value;
        let customerEmail = document.getElementById('customerEmail').value;
        let deliveryContactName = document.getElementById('deliveryContactName').value;
        let deliveryContactPhone = document.getElementById('deliveryContactPhone').value;
        // Validations
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

        if (orderCategory === '' || typeof orderCategory === 'undefined') {
            msg = document.getElementById('msg');
            msg.innerHTML = 'All fields are required';
            return
        }

        if (customerName === '' || typeof customerName === 'undefined') {
            msg = document.getElementById('msg');
            msg.innerHTML = 'All fields are required';
            return
        }

        if (customerPhone === '' || typeof customerPhone === 'undefined') {
            msg = document.getElementById('msg');
            msg.innerHTML = 'All fields are required';
            return
        }

        // if (customerEmail === '' || typeof customerEmail === 'undefined') {
        //     msg = document.getElementById('msg');
        //     msg.innerHTML = 'All fields are required';
        //     return
        // }

        if (deliveryContactName === '' || typeof deliveryContactName === 'undefined') {
            msg = document.getElementById('msg');
            msg.innerHTML = 'All fields are required';
            return
        }

        if (deliveryContactPhone === '' || typeof deliveryContactPhone === 'undefined') {
            msg = document.getElementById('msg');
            msg.innerHTML = 'All fields are required';
            return
        }

        calculateDistances();

        $('.closeMe').addClass('d-none')
        $('.checkout').removeClass('d-none')

    })

    function calculateDistances() {
        originRegion = document.getElementById('pickupRegion').value;
        destinationRegion = document.getElementById('deliveryRegion').value;
        // Enter source and destination city
        origin = document.getElementById('pickupAddress').value + originRegion;
        destination = document.getElementById('deliveryAddress').value + destinationRegion;

        // make ajax request
        let request = $.ajax({
            url: "{{ url('/distance-matrix') }}",
            type: 'post',
            data: {
                "_token": "{{ csrf_token() }}",
                "origin": origin,
                "destination": destination
            },
        });
        request.done(function(data) {
            let response = data.rows[0].elements[0].distance.value;
            amount = 200 + Math.ceil(response / 1000) * (65);
            let price = document.querySelector('.price')
            let convert = amount.toLocaleString()
            price.innerHTML = '₦ ' + convert;
        });
        request.fail(function(err) {
            console.log(err)
        })
    }
    var paymentForm = document.getElementById('paymentForm');
    paymentForm.addEventListener('submit', payWithPaystack, false);

    function payWithPaystack() {
        // var key = 'pk_test_ad11304f43dd83da7426ebc49e193cd6a033bcd4'; // Test
        var key = "pk_live_8788024222fd48d6fcda8f823fc74ce8ff50faa0";
        var handler = PaystackPop.setup({
            amount: amount *
                100, // the amount value is multiplied by 100 to convert to the lowest currency unit
            key: key, // Replace with your public key
            // email: document.getElementById('customerEmail').value,
            email: 'requests@thecoachexpress.com',
            currency: 'NGN', // Use GHS for Ghana Cedis or USD for US Dollars
            customerName: document.getElementById('customerName').value,
            customerPhone: document.getElementById('customerPhone').value,
            ref: '' + Math.floor((Math.random() * 1000000000) + 1), // Replace with a reference you generated
            metadata: {
                custom_fields: [{
                        display_name: "Customer Name",
                        variable_name: "customerName",
                        value: document.getElementById('customerName').value
                    },
                    {
                        display_name: "Customer Email",
                        variable_name: "customerEmail",
                        value: 'requests@thecoachexpress.com'
                    },
                    {
                        display_name: "Customer Phone",
                        variable_name: "customerPhone",
                        value: document.getElementById('customerPhone').value
                    },
                    {
                        display_name: "Pickup Region",
                        variable_name: "pickupRegion",
                        value: document.getElementById('pickupRegion').value
                    },
                    {
                        display_name: "Pickup Address",
                        variable_name: "pickupAddress",
                        value: document.getElementById('pickupAddress').value
                    },
                    {
                        display_name: "Delivery Region",
                        variable_name: "deliveryRegion",
                        value: document.getElementById('deliveryRegion').value
                    },
                    {
                        display_name: "Delivery Address",
                        variable_name: "deliveryAddress",
                        value: document.getElementById('deliveryAddress').value
                    },
                    {
                        display_name: "Order Category",
                        variable_name: "orderCategory",
                        value: document.getElementById('orderCategory').value
                    },
                    {
                        display_name: "Delivery Contact Name",
                        variable_name: "deliveryContactName",
                        value: document.getElementById('deliveryContactName').value
                    },
                    {
                        display_name: "Delivery Contact Phone",
                        variable_name: "deliveryContactPhone",
                        value: document.getElementById('deliveryContactPhone').value
                    },
                ]
            },
            callback: function(response) {
                //this happens after the payment is completed successfully
                var reference = response.reference;
                alert('You have successfully requested an order!');
                window.location.href = '/verify-transactions/' + reference
            },
            onClose: function() {
                alert('Transaction was not completed.');
            },
        });
        handler.openIframe();
    }

</script>
<script>
    function resetForm() {
        let resetLogin = document.getElementById('loginForm')
        let resetReg = document.getElementById('registerForm')
        // Reset form
        resetLogin.reset()
        resetReg.reset()
        // setTimeout(() => {
        //     window.location.reload(true)
        // }, 1000)

    }
    var loginForm = document.getElementById('loginForm')
    loginForm.addEventListener('submit', login, false)

    function login(e) {
        e.preventDefault()
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;
        // Validation
        if (email === '' || typeof email === 'undefined') {
            msg = document.getElementById('msg');
            msg.innerHTML = 'All fields are required';
            return
        }

        if (password === '' || typeof password === 'undefined') {
            msg = document.getElementById('msg');
            msg.innerHTML = 'All fields are required';
            return
        }

        let request = $.ajax({
            url: " {{ url('/site-login') }}",
            type: 'post',
            data: {
                "_token": "{{ csrf_token() }}",
                "email": email,
                "password": password
            },
        });
        request.done(function(data) {
            alert(data)
            window.location.href = '/dashboard';
        });
        request.fail(function(err) {
            console.log(err)
        })
    }

    // Register
    var registerForm = document.getElementById('registerForm')
    registerForm.addEventListener('submit', register, false)

    function register(e) {
        e.preventDefault()
        var fullname = document.getElementById('fullname').value;
        var email = document.getElementById('regemail').value;
        var password = document.getElementById('regpassword').value;
        var phone = document.getElementById('phone').value;
        // Validation
        if (fullname === '' || typeof fullname === 'undefined') {
            msg = document.getElementById('msg');
            msg.innerHTML = 'All fields are required';
            return
        }

        if (email === '' || typeof email === 'undefined') {
            msg = document.getElementById('msg');
            msg.innerHTML = 'All fields are required';
            return
        }

        if (password === '' || typeof password === 'undefined') {
            msg = document.getElementById('msg');
            msg.innerHTML = 'All fields are required';
            return
        }

        if (phone === '' || typeof phone === 'undefined') {
            msg = document.getElementById('msg');
            msg.innerHTML = 'All fields are required';
            return
        }

        let request = $.ajax({
            url: " {{ url('/site-register') }}",
            type: 'post',
            data: {
                "_token": "{{ csrf_token() }}",
                "fullname": fullname,
                "email": email,
                "password": password,
                "phone": phone,
            },
        });
        request.done(function(data) {
            window.location.reload('/dashboard');
        });
        request.fail(function(err) {
            console.log(err)
        })
    }

</script>
