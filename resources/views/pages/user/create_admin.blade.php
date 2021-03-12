@extends('layouts.page')
@section('content')
<div class="main-content">
  <section class="section">
    <ul class="breadcrumb breadcrumb-style ">
      <li class="breadcrumb-item">
        <h4 class="page-title m-b-0">Register Admin</h4>
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
              <form method="POST" action="/create-admin" id="wizard_with_validation">
                {{ csrf_field() }}
                <h3>Account Information</h3>
                @include('partials.user.messages')
                <fieldset>
                  <div class="form-group form-float">
                    <div class="form-line">
                      <label class="form-label">Admin Full Name<span class="text-danger">*</span></label>
                      <input type="text" class="form-control :class=" { 'is-invalid' : form.errors.has('fullname') }"
                        name="fullname" id="fullname" required>
                      <has-error :form="form" field="fullname"></has-error>
                    </div>
                  </div>
                  <div class="form-group form-float">
                    <div class="form-line">
                      <label class="form-label">Admin Email<span class="text-danger">*</span></label>
                      <input type="email" class="form-control :class=" { 'is-invalid' : form.errors.has('email') }"
                        name="email" id="email" required>
                      <has-error :form="form" field="email"></has-error>
                    </div>
                  </div>
                  <div class="form-group form-float">
                    <div class="form-line">
                      <label class="form-label">Admin Phone<span class="text-danger">*</span></label>
                      <input type="text" class="form-control :class=" { 'is-invalid' : form.errors.has('phoneNumber') }"
                        name="phoneNumber" id="phoneNumber">
                      <has-error :form="form" field="phoneNumber"></has-error>
                    </div>
                  </div>
                </fieldset>
                <h3>Other Information</h3>
                <fieldset>
                  <div class="form-group form-float">
                    <div class="form-line">
                      <label class="form-label">State<span class="text-danger">*</span></label>
                      <select name="state" class="form-control :class=" { 'is-invalid' : form.errors.has('state') }"
                        id="state" required>
                        <option>Lagos</option>
                        <option>Kwara</option>
                        <option>Oyo</option>
                        <option>Abia</option>
                        <option>Cross River</option>
                      </select>
                      <has-error :form="form" field="state"></has-error>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group form-float col-lg-6 col-md-12 col-sm-12">
                      <div class="form-line">
                        <label class="form-label">Country<span class="text-danger">*</span></label>
                        <select name="country" class="form-control :class=" { 'is-invalid' : form.errors.has('country')
                          }" id="country" required>
                          <option>Nigeria</option>
                        </select>
                        <has-error :form="form" field="country"></has-error>
                      </div>
                    </div>
                    <div class="form-group form-float col-lg-6 col-md-12 col-sm-12">
                      <div class="form-line">
                        <label class="form-label">Address<span class="text-danger">*</span></label>
                        <input type="text" name="address" class="form-control :class=" { 'is-invalid' :
                          form.errors.has('address') }" id="address" required>
                        <has-error :form="form" field="address"></has-error>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group form-float col-12">
                      <div class="form-line">
                        <label class="form-label">Password<span class="text-danger">*</span> (Please copy this for login
                          purpose)</label>
                        <input type="text" name="password" class="form-control :class=" { 'is-invalid' :
                          form.errors.has('password') }" value="{{bin2hex(random_bytes(10))}}" id="password" required>
                        <has-error :form="form" field="password"></has-error>
                      </div>
                    </div>
                  </div>
                </fieldset>
                <fieldset>
                  <div class="row">
                    <div class="form-group form-float col-lg-6 col-md-12 col-sm-12">
                      <div class="form-line">
                        <button type="submit" class="btn btn-success">Submit</button>
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
@endsection