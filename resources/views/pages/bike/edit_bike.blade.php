@extends('layouts.page')
@section('content')
    <style>
        .checkbox {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

    </style>
    <div class="main-content">
        <section class="section">
            <ul class="breadcrumb breadcrumb-style ">
                <li class="breadcrumb-item">
                    <h4 class="page-title m-b-0">Edit Bike</h4>
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
                                <form method="POST" action="/update-bike/{{ $bike->id }}" id="wizard_with_validation"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <h3>Update Details</h3>
                                    @include('partials.user.messages')
                                    <fieldset>
                                        <div class="row">
                                            <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-line">
                                                    <label class="form-label">Name</label>
                                                    <input type="text" value="{{ $bike->name }}"
                                                        class=" form-control :class=" { 'is-invalid' :
                                                        form.errors.has('name') }" name="name" id="name">
                                                    <has-error :form="form" field="name"></has-error>
                                                </div>
                                            </div>
                                            <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-line">
                                                    <label class="form-label">Date Of Purchase</label>
                                                    <input type="date" value="{{ $bike->dateOfPurchase }}" class="
                                                                                            form-control :class="
                                                        { 'is-invalid' : form.errors.has('dateOfPurchase') }"
                                                        name="dateOfPurchase" id="dateOfPurchase">
                                                    <has-error :form="form" field="dateOfPurchase"></has-error>
                                                </div>
                                            </div>
                                            <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-line">
                                                    <label class="form-label">Place Of Purchase</label>
                                                    <input type="text" value="{{ $bike->placeOfPurchase }}" class="
                                                                                            form-control :class="
                                                        { 'is-invalid' : form.errors.has('placeOfPurchase') }"
                                                        name="placeOfPurchase" id="placeOfPurchase">
                                                    <has-error :form="form" field="placeOfPurchase"></has-error>
                                                </div>
                                            </div>
                                            <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-line">
                                                    <label class="form-label">Cost Of Bike</label>
                                                    <input type="text" value="{{ $bike->cost }}"
                                                        class=" form-control :class=" { 'is-invalid' :
                                                        form.errors.has('cost') }" name="cost" id="cost">
                                                    <has-error :form="form" field="cost"></has-error>
                                                </div>
                                            </div>
                                            <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-line">
                                                    <label class="form-label">Bike Branding Cost</label>
                                                    <input type="text" value="{{ $bike->brandingCost }}" class=" form-control
                                                                                            :class=" { 'is-invalid' :
                                                        form.errors.has('brandingCost') }" name="brandingCost"
                                                        id="brandingCost">
                                                    <has-error :form="form" field="brandingCost"></has-error>
                                                </div>
                                            </div>
                                            <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-line">
                                                    <label class="form-label">Bike Plate Number</label>
                                                    <input type="text" value="{{ $bike->plateNumber }}" class=" form-control
                                                                                            :class=" { 'is-invalid' :
                                                        form.errors.has('plateNumber') }" name="plateNumber"
                                                        id="plateNumber">
                                                    <has-error :form="form" field="plateNumber"></has-error>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <h3>Check the following boxes if available:</h3>
                                    <p class="text-danger text-center">NB: Please upload should not be greater than 2mb</p>
                                    <fieldset>
                                        <div>
                                            <div class="checkbox">
                                                <p>Ark Insurance</p>
                                                <input type="checkbox" name="" id="ark" onchange="arkControl();">
                                            </div>
                                            <div class="row ark d-none">
                                                <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-line">
                                                        <label class="form-label">Registration Date</label>
                                                        <input type="date" value="{{ $bike->arkRegDate }}" class="
                                                                                                form-control :class="
                                                            { 'is-invalid' : form.errors.has('arkRegDate') }"
                                                            name="arkRegDate" id="arkRegDate">
                                                        <has-error :form="form" field="arkRegDate"></has-error>
                                                    </div>
                                                </div>
                                                <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-line">
                                                        <label class="form-label">Upload file</label>
                                                        <input type="file" class="form-control :class=" { 'is-invalid' :
                                                            form.errors.has('arkUpload') }" name="arkUpload" id="arkUpload">
                                                        <has-error :form="form" field="arkUpload"></has-error>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="checkbox">
                                                <p>Nipost</p>
                                                <input type="checkbox" name="" id="nipost" onchange="nipostControl();">
                                            </div>
                                            <div class="row nipost d-none">
                                                <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-line">
                                                        <label class="form-label">Registration Date</label>
                                                        <input type="date" value="{{ $bike->nipostRegDate }}"
                                                            class="form-control :class=" { 'is-invalid' :
                                                            form.errors.has('nipostRegDate') }" name="nipostRegDate"
                                                            id="nipostRegDate">
                                                        <has-error :form="form" field="nipostRegDate"></has-error>
                                                    </div>
                                                </div>
                                                <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-line">
                                                        <label class="form-label">Upload file</label>
                                                        <input type="file" class="form-control :class=" { 'is-invalid' :
                                                            form.errors.has('nipostUpload') }" name="nipostUpload"
                                                            id="nipostUpload">
                                                        <has-error :form="form" field="nipostUpload"></has-error>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="checkbox">
                                                <p>LASAA</p>
                                                <input type="checkbox" name="" id="lasaa" onchange="lasaaControl();">
                                            </div>
                                            <div class="row lasaa d-none">
                                                <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-line">
                                                        <label class="form-label">Registration Date</label>
                                                        <input type="date" value="{{ $bike->lasaaRegDate }}"
                                                            class="form-control :class=" { 'is-invalid' :
                                                            form.errors.has('lasaaRegDate') }" name="lasaaRegDate"
                                                            id="lasaaRegDate">
                                                        <has-error :form="form" field="lasaaRegDate"></has-error>
                                                    </div>
                                                </div>
                                                <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-line">
                                                        <label class="form-label">Upload file</label>
                                                        <input type="file" class="form-control :class=" { 'is-invalid' :
                                                            form.errors.has('lasaaUpload') }" name="lasaaUpload"
                                                            id="lasaaUpload">
                                                        <has-error :form="form" field="lasaaUpload"></has-error>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="checkbox">
                                                <p>MOT</p>
                                                <input type="checkbox" name="" id="mot" onchange="motControl();">
                                            </div>
                                            <div class="row mot d-none">
                                                <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-line">
                                                        <label class="form-label">Registration Date</label>
                                                        <input type="date" value="{{ $bike->motRegDate }}"
                                                            class="form-control :class=" { 'is-invalid' :
                                                            form.errors.has('motRegDate') }" name="motRegDate"
                                                            id="motRegDate">
                                                        <has-error :form="form" field="motRegDate"></has-error>
                                                    </div>
                                                </div>
                                                <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-line">
                                                        <label class="form-label">Upload file</label>
                                                        <input type="file" class="form-control :class=" { 'is-invalid' :
                                                            form.errors.has('motUpload') }" name="motUpload" id="motUpload">
                                                        <has-error :form="form" field="motUpload"></has-error>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="checkbox">
                                                <p>Vehicle License</p>
                                                <input type="checkbox" name="" id="license" onchange="licenseControl();">
                                            </div>
                                            <div class="row license d-none">
                                                <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-line">
                                                        <label class="form-label">Registration Date</label>
                                                        <input type="date" value="{{ $bike->licenseRegDate }}"
                                                            class="form-control :class=" { 'is-invalid' :
                                                            form.errors.has('licenseRegDate') }" name="licenseRegDate"
                                                            id="licenseRegDate">
                                                        <has-error :form="form" field="licenseRegDate"></has-error>
                                                    </div>
                                                </div>
                                                <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-line">
                                                        <label class="form-label">Upload file</label>
                                                        <input type="file" class="form-control :class=" { 'is-invalid' :
                                                            form.errors.has('licenseUpload') }" name="licenseUpload"
                                                            id="licenseUpload">
                                                        <has-error :form="form" field="licenseUpload"></has-error>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="checkbox">
                                                <p>Hackney Permit</p>
                                                <input type="checkbox" name="" id="hackney" onchange="hackneyControl();">
                                            </div>
                                            <div class="row hackney d-none">
                                                <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-line">
                                                        <label class="form-label">Registration Date</label>
                                                        <input type="date" value="{{ $bike->hackneyRegDate }}"
                                                            class="form-control :class=" { 'is-invalid' :
                                                            form.errors.has('hackneyRegDate') }" name="hackneyRegDate"
                                                            id="hackneyRegDate">
                                                        <has-error :form="form" field="hackneyRegDate"></has-error>
                                                    </div>
                                                </div>
                                                <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-line">
                                                        <label class="form-label">Upload file</label>
                                                        <input type="file" class="form-control :class=" { 'is-invalid' :
                                                            form.errors.has('hackneyUpload') }" name="hackneyUpload"
                                                            id="hackneyUpload">
                                                        <has-error :form="form" field="hackneyUpload"></has-error>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="checkbox">
                                                <p>LGA Paper</p>
                                                <input type="checkbox" name="" id="lga" onchange="lgaControl();">
                                            </div>
                                            <div class="row lga d-none">
                                                <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-line">
                                                        <label class="form-label">Registration Date</label>
                                                        <input type="date" value="{{ $bike->lgaRegDate }}"
                                                            class="form-control :class=" { 'is-invalid' :
                                                            form.errors.has('lgaRegDate') }" name="lgaRegDate"
                                                            id="lgaRegDate">
                                                        <has-error :form="form" field="lgaRegDate"></has-error>
                                                    </div>
                                                </div>
                                                <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-line">
                                                        <label class="form-label">Upload file</label>
                                                        <input type="file" class="form-control :class=" { 'is-invalid' :
                                                            form.errors.has('lgaUpload') }" name="lgaUpload" id="lgaUpload">
                                                        <has-error :form="form" field="lgaUpload"></has-error>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="checkbox">
                                                <p>Road Worthiness Lagos</p>
                                                <input type="checkbox" name="" id="lagos" onchange="lagosControl();">
                                            </div>
                                            <div class="row lagos d-none">
                                                <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-line">
                                                        <label class="form-label">Registration Date</label>
                                                        <input type="date" value="{{ $bike->lagosRegDate }}"
                                                            class="form-control :class=" { 'is-invalid' :
                                                            form.errors.has('lagosRegDate') }" name="lagosRegDate"
                                                            id="lagosRegDate">
                                                        <has-error :form="form" field="lagosRegDate"></has-error>
                                                    </div>
                                                </div>
                                                <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-line">
                                                        <label class="form-label">Upload file</label>
                                                        <input type="file" class="form-control :class=" { 'is-invalid' :
                                                            form.errors.has('lagosUpload') }" name="lagosUpload"
                                                            id="lagosUpload">
                                                        <has-error :form="form" field="lagosUpload"></has-error>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="checkbox">
                                                <p>Road Worthiness Ogun</p>
                                                <input type="checkbox" name="" id="ogun" onchange="ogunControl();">
                                            </div>
                                            <div class="row ogun d-none">
                                                <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-line">
                                                        <label class="form-label">Registration Date</label>
                                                        <input type="date" value="{{ $bike->ogunRegDate }}"
                                                            class="form-control :class=" { 'is-invalid' :
                                                            form.errors.has('ogunRegDate') }" name="ogunRegDate"
                                                            id="ogunRegDate">
                                                        <has-error :form="form" field="ogunRegDate"></has-error>
                                                    </div>
                                                </div>
                                                <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-line">
                                                        <label class="form-label">Upload file</label>
                                                        <input type="file" class="form-control :class=" { 'is-invalid' :
                                                            form.errors.has('ogunUpload') }" name="ogunUpload"
                                                            id="ogunUpload">
                                                        <has-error :form="form" field="ogunUpload"></has-error>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="checkbox">
                                                <p>Lasaa Sticker</p>
                                                <input type="checkbox" name="" id="lasaaSticker"
                                                    onchange="lasaaStickerControl();">
                                            </div>
                                            <div class="row lasaaSticker d-none">
                                                <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-line">
                                                        <label class="form-label">Registration Date</label>
                                                        <input type="date" class="form-control :class=" { 'is-invalid' :
                                                            form.errors.has('lasaaStickerRegDate') }"
                                                            name="lasaaStickerRegDate" id="lasaaStickerRegDate">
                                                        <has-error :form="form" field="lasaaStickerRegDate"></has-error>
                                                    </div>
                                                </div>
                                                <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-line">
                                                        <label class="form-label">Upload file</label>
                                                        <input type="file" class="form-control :class=" { 'is-invalid' :
                                                            form.errors.has('lasaaStickerUpload') }"
                                                            name="lasaaStickerUpload" id="lasaaStickerUpload">
                                                        <has-error :form="form" field="lasaaStickerUpload"></has-error>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="checkbox">
                                                <p>National freight and haulage</p>
                                                <input type="checkbox" name="" id="freight" onchange="freightControl();">
                                            </div>
                                            <div class="row freight d-none">
                                                <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-line">
                                                        <label class="form-label">Registration Date</label>
                                                        <input type="date" class="form-control :class=" { 'is-invalid' :
                                                            form.errors.has('freightRegDate') }" name="freightRegDate"
                                                            id="freightRegDate">
                                                        <has-error :form="form" field="freightRegDate"></has-error>
                                                    </div>
                                                </div>
                                                <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="form-line">
                                                        <label class="form-label">Upload file</label>
                                                        <input type="file" class="form-control :class=" { 'is-invalid' :
                                                            form.errors.has('freightUpload') }" name="freightUpload"
                                                            id="freightUpload">
                                                        <has-error :form="form" field="freightUpload"></has-error>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="row">
                                            <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12 col-6">
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
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script>
        function arkControl() {
            let ark = document.getElementById('ark')
            if (ark.checked) {
                $('.ark').removeClass('d-none');
            } else {
                $('.ark').addClass('d-none');
            }
        }

        function nipostControl() {
            let nipost = document.getElementById('nipost')
            if (nipost.checked) {
                $('.nipost').removeClass('d-none');
            } else {
                $('.nipost').addClass('d-none');
            }
        }

        function lasaaControl() {
            let lasaa = document.getElementById('lasaa')
            if (lasaa.checked) {
                $('.lasaa').removeClass('d-none');
            } else {
                $('.lasaa').addClass('d-none');
            }
        }

        function motControl() {
            let mot = document.getElementById('mot')
            if (mot.checked) {
                $('.mot').removeClass('d-none');
            } else {
                $('.mot').addClass('d-none');
            }
        }

        function licenseControl() {
            let license = document.getElementById('license')
            if (license.checked) {
                $('.license').removeClass('d-none');
            } else {
                $('.license').addClass('d-none');
            }
        }

        function hackneyControl() {
            let hackney = document.getElementById('hackney')
            if (hackney.checked) {
                $('.hackney').removeClass('d-none');
            } else {
                $('.hackney').addClass('d-none');
            }
        }

        function lgaControl() {
            let lga = document.getElementById('lga')
            if (lga.checked) {
                $('.lga').removeClass('d-none');
            } else {
                $('.lga').addClass('d-none');
            }
        }

        function lagosControl() {
            let lagos = document.getElementById('lagos')
            if (lagos.checked) {
                $('.lagos').removeClass('d-none');
            } else {
                $('.lagos').addClass('d-none');
            }
        }

        function ogunControl() {
            let ogun = document.getElementById('ogun')
            if (ogun.checked) {
                $('.ogun').removeClass('d-none');
            } else {
                $('.ogun').addClass('d-none');
            }
        }

        function lasaaStickerControl() {
            let lasaaSticker = document.getElementById('lasaaSticker')
            if (lasaaSticker.checked) {
                $('.lasaaSticker').removeClass('d-none');
            } else {
                $('.lasaaSticker').addClass('d-none');
            }
        }

        function freightControl() {
            let freight = document.getElementById('freight')
            if (freight.checked) {
                $('.freight').removeClass('d-none');
            } else {
                $('.freight').addClass('d-none');
            }
        }

    </script>
@endsection
