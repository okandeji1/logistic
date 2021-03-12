<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.radixtouch.in/templates/logicswave/jiva/source/light/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Jun 2020 12:51:54 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ config('app.name', 'Coach-Admin') }}</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/bootstrap-social/bootstrap-social.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel='shortcut icon' type='image/x-icon' href='{{ asset('site/images/favicon.ico') }}' />
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Register</h4>
                            </div>
                            <div class="card-body">
                                <form class="needs-validation" novalidate="" action="/auth-register-customer"
                                    method="POST">
                                    @csrf
                                    @include('partials.user.messages')
                                    <div class="form-group">
                                        <label for="fullname">Full Name</label>
                                        <input id="fullname" type="text" class="form-control :class=" { 'is-invalid' :
                                            form.errors.has('fullname') }" name="fullname" tabindex="1" required
                                            autofocus>
                                        <has-error :form="form" field="fullname"></has-error>
                                        <div class="invalid-feedback">
                                            Please fill in your full name
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control :class=" { 'is-invalid' :
                                            form.errors.has('email') }" name="email" tabindex="1" required autofocus>
                                        <has-error :form="form" field="email"></has-error>
                                        <div class="invalid-feedback">
                                            Please fill in your email
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                        </div>
                                        <input id="password" type="password" class="form-control :class=" { 'is-invalid'
                                            : form.errors.has('password') }" name="password" tabindex="2" required>
                                        <has-error :form="form" field="password"></has-error>
                                        <div class="invalid-feedback">
                                            please fill in your password
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="cpassword" class="control-label">Confirm Password</label>
                                        </div>
                                        <input id="password" type="password" class="form-control :class=" { 'is-invalid'
                                            : form.errors.has('cpassword') }" name="cpassword" tabindex="2" required>
                                        <has-error :form="form" field="cpassword"></has-error>
                                        <div class="invalid-feedback">
                                            please confirm your password
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="phone" class="control-label">Phone Number</label>
                                        </div>
                                        <input id="phone" type="text" class="form-control :class=" { 'is-invalid' :
                                            form.errors.has('phone') }" name="phone" tabindex="2" required>
                                        <has-error :form="form" field="phone"></has-error>
                                        <div class="invalid-feedback">
                                            Please input phone number
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="address" class="control-label">Address</label>
                                        </div>
                                        <textarea id="address" class="form-control :class=" { 'is-invalid' :
                                            form.errors.has('address') }" name="address" tabindex="2" required>
                                        </textarea>
                                        <has-error :form="form" field="address"></has-error>
                                        <div class="invalid-feedback">
                                            please input address
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="state" class="control-label">State</label>
                                        </div>
                                        <input id="state" type="text" class="form-control :class=" { 'is-invalid' :
                                            form.errors.has('state') }" name="state" tabindex="2" required>
                                        <has-error :form="form" field="state"></has-error>
                                        <div class="invalid-feedback">
                                            please input your state
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="country" class="control-label">Country</label>
                                        </div>
                                        <input id="country" type="text" class="form-control :class=" { 'is-invalid' :
                                            form.errors.has('country') }" name="country" tabindex="2" required>
                                        <has-error :form="form" field="country"></has-error>
                                        <div class="invalid-feedback">
                                            please input your country
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Register
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- General JS Scripts -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <!-- JS Libraies -->
    <!-- Page Specific JS File -->
    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <!-- Custom JS File -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>


<!-- Mirrored from www.radixtouch.in/templates/logicswave/jiva/source/light/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Jun 2020 12:51:54 GMT -->

</html>
