@extends('site.layouts.site')
@section('content')

    <div id="rev_slider_3_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="nile-logistics-1"
        data-source="gallery" style="margin:0px auto;background:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
        <!-- START REVOLUTION SLIDER 5.4.8 fullwidth mode -->
        <div id="rev_slider_3_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.8">
            <ul>
                @include('partials.user.messages')
                <div class="msg text-success"></div>
                <!-- SLIDE  -->
                <li>
                    <!-- MAIN IMAGE -->
                    <img src="{{ asset('site/images/homepage_coach.png') }}">
                    <!-- LAYERS -->
                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption   tp-resizeme" id="slide-3-layer-1" data-x="['left','left','left','center']"
                        data-hoffset="['0','41','45','0']" data-y="['middle','middle','middle','middle']"
                        data-voffset="['-111','-143','-186','-36']" data-width="461" data-height="173"
                        data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
                        data-frames='[{"delay":10,"speed":1140,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                        data-textAlign="['inherit','inherit','inherit','center']" data-paddingtop="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                        style="z-index: 5; min-width: 461px; max-width: 461px; max-width: 173px; max-width: 173px; white-space: nowrap; font-size: 50px; line-height: 59px;background: rgba(0,0,0,.10); font-weight: 400; color: white; letter-spacing: -4px;font-family:Poppins;">
                        <span>Making<br> Logistics <br> Fast & Efficient</span>
                    </div>
                    <!-- LAYER NR. 2 -->
                    @if (!Auth::user())
                        <div class="tp-caption rev-btn " id="slide-3-layer-2" data-x="['left','left','left','center']"
                            data-hoffset="['0','41','45','0']" data-y="['top','top','top','top']"
                            data-voffset="['453','372','435','471']" data-width="none" data-height="none"
                            data-whitespace="nowrap" data-toggle="modal" data-target=".bd-example-modal-lg"
                            data-type="button" data-responsive_offset="on" data-responsive="off"
                            data-frames='[{"delay":640,"speed":1120,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(255,255,255);bg:transparent;bc:rgb(255,255,255);"}]'
                            data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[12,12,12,12]"
                            data-paddingright="[35,35,35,35]" data-paddingbottom="[12,12,12,12]"
                            data-paddingleft="[35,35,35,35]"
                            style="z-index: 6; white-space: nowrap; font-size: 14px; line-height: 17px; font-weight: 500; color: rgba(255,255,255,1); letter-spacing: 0px;font-family:Poppins;background-color:green;border-color:green;border-style:solid;border-width:2px 2px 2px 2px;border-radius:30px 30px 30px 30px;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;">
                            Book a Delivery Now
                        </div>
                    @endif
                </li>
                <!-- SLIDE  -->
            </ul>
            <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
        </div>
    </div>
    <!-- END REVOLUTION SLIDER -->

    <!--============= About Us =============-->
    <div class="padding-tb-100px">
        <div class="container">
            <div class="row">

                <br>
                <div class="col-lg-4">

                    <img src="{{ asset('site/images/cover.png') }}" style="height: 100%; width: 150%; border-radius: 10px"
                        alt="">
                </div>
                <div class="col-lg-8">
                    <div class="contact-modal">
                        <div class="background-main-color" style="border-radius: 15px;">
                            <div class="padding-30px">
                                <h3 class="padding-bottom-15px">Quick Order Quote</h3>
                                <form id="quickOrderForm">
                                    <div class="form-row">
                                        <div class="form-group col-md-5">
                                            <label>Pickup Area</label>
                                            <input list="regions" name="pickupRegion" class="form-control :class="
                                                { 'is-invalid' : form.errors.has('pickupRegion') }"
                                                placeholder="Select Region" id="pickupArea" required>
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
                                            <has-error :form="form" field="pickupArea"></has-error>
                                        </div>
                                        <div class="form-group col-md-7">
                                            <label>Pickup Address</label>
                                            <input type="text" class="form-control" id="pickupStreet"
                                                style="background-color: white" placeholder="Pickup Address" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-5">
                                            <label>Delivery Area</label>
                                            <input list="delRegions" name="deliveryArea" class="form-control :class="
                                                { 'is-invalid' : form.errors.has('deliveryArea') }"
                                                placeholder="Select Region" id="deliveryArea" required>
                                            <datalist id="delRegions">
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
                                            <has-error :form="form" field="deliveryArea"></has-error>
                                        </div>
                                        <div class="form-group col-md-7">
                                            <label>Delivery Address</label>
                                            <input type="text" class="form-control" id="deliveryStreet"
                                                style="background-color: white" placeholder="Delivery Address" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <center><label>Delivery Estimate</label></center>
                                        <center style="font-size: 24px; font-weight: 500;" class="pricePaid">
                                        </center>
                                    </div>
                                    <center>
                                        <button type="submit"
                                            class=" btn-lg background-dark text-white text-center  text-uppercase">
                                            SUBMIT
                                        </button>
                                    </center>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
            <!-- // row -->
        </div>
        <!-- // container -->

    </div>
    <!--============= //About Us =============-->

    <div class="section padding-tb-100px section-ba-1" style="background-color: #f7f5f5;">
        <div class="container">
            <!-- Title -->
            <div class="section-title margin-bottom-40px">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="icon"><i class="fa fa-ravelry" style="color: green;"></i></div>
                        <br>
                        <div class="h2">Steps to Request a Delivery</div>
                        <div class="des">Requesting a coach Delivery is fast and easy. </div>
                    </div>
                </div>
            </div>
            <!-- // End Title -->

            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="service-icon-box">
                        <div class="icon"><i class="fa fa-file-text fa-3x" style="color: green;"></i></div>
                        <a href="#" class="title h2" style="color: green;">Request your delivery</a>
                        <div class="des">Fill the form online to request with all required details.</div>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6">
                    <div class="service-icon-box">
                        <div class="icon"><i class="fa fa-motorcycle fa-3x" style="color: green;"></i></div>
                        <a href="#" class="title h2" style="color: green;">Rider Pickup</a>
                        <div class="des">The closest rider in your area is prompted and assigned to pickup your order.</div>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6">
                    <div class="service-icon-box">
                        <div class="icon"><i class="fa fa-archive fa-3x" style="color: green;"></i></div>
                        <a href="#" class="title h2" style="color: green;">Delivery</a>
                        <div class="des">Your Order is delivered in the shortest possible and you get prompted instantly.
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6">
                    <div class="service-icon-box">
                        <div class="icon"><i class="fa fa-mobile-phone fa-3x" style="color: green;"></i></div>
                        <a href="#" class="title h2" style="color: green;">Tracking</a>
                        <div class="des">Track your order in real-time with the the Tracking ID provided upon request.</div>
                    </div>
                </div>
            </div>


            <div class="text-center">
                <a href="/what-we-offer" class="nile-bottom md">Our Services <i class="fa fa-arrow-right"></i> </a>
            </div>

        </div>
    </div>

    {{-- Page load modal --}}
    <div id="pageLoad" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <img src="{{ asset('site/images/promo1.jpeg') }}" width="700" height="400">
                        </div>
                        <div class="col">
                            <img src="{{ asset('site/images/promo2.jpeg') }}" width="700" height="400">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--============= Script =============-->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script>
        // Page load modal
        $(document).ready(function() {
            $("#pageLoad").modal('hide');
        });
        // Quick order
        var quickOrderForm = document.getElementById('quickOrderForm');
        quickOrderForm.addEventListener('submit', quickOrderCalc, false);

        function quickOrderCalc() {
            let originRegion = document.getElementById('pickupArea').value;
            let destinationRegion = document.getElementById('deliveryArea').value;

            // Enter source and destination city
            let origin = document.getElementById('pickupStreet').value + originRegion;
            let destination = document.getElementById('deliveryStreet').value + destinationRegion;

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
                const payment = 200 + Math.ceil(response / 1000) * (65);
                let convert = payment.toLocaleString()
                let price = document.querySelector('.pricePaid')
                price.innerHTML = 'NGN ' + convert;
                setTimeout(() => {
                    document.getElementById('quickOrderForm').reset();
                    price.innerHTML = '';
                }, 5000)
                return
            });
            request.fail(function(err) {})
        }

    </script>
@endsection
