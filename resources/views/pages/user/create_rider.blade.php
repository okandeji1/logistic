@extends('layouts.page')
@section('content')
    <div class="main-content">
        <section class="section">
            <ul class="breadcrumb breadcrumb-style ">
                <li class="breadcrumb-item">
                    <h4 class="page-title m-b-0">Register Rider</h4>
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
                                <form method="POST" action="/create-rider" id="wizard_with_validation">
                                    {{ csrf_field() }}
                                    <h3>Personal Details</h3>
                                    @include('partials.user.messages')
                                    <fieldset>
                                        <div class="row">
                                            <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-line">
                                                    <label class="form-label">Full Name</label>
                                                    <input type="text" class="form-control :class=" { 'is-invalid' :
                                                        form.errors.has('fullname') }" name="fullname" id="fullname"
                                                        required>
                                                    <has-error :form="form" field="fullname"></has-error>
                                                </div>
                                            </div>
                                            <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-line">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" class="form-control :class=" { 'is-invalid' :
                                                        form.errors.has('email') }" name="email" id="email" required>
                                                    <has-error :form="form" field="email"></has-error>
                                                </div>
                                            </div>
                                            <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-line">
                                                    <label class="form-label">Staff ID</label>
                                                    <input type="text" class="form-control :class=" { 'is-invalid' :
                                                        form.errors.has('staffId') }" name="staffId" id="staffId" required>
                                                    <has-error :form="form" field="staffId"></has-error>
                                                </div>
                                            </div>
                                            <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-line">
                                                    <label class="form-label">Gender</label>
                                                    <select class="form-control :class=" { 'is-invalid' :
                                                        form.errors.has('gender') }" name="gender" id="gender" required>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                    <has-error :form="form" field="gender"></has-error>
                                                </div>
                                            </div>
                                            <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-line">
                                                    <label class="form-label">Phone Number</label>
                                                    <input type="number" class="form-control :class=" { 'is-invalid' :
                                                        form.errors.has('phoneNumber') }" name="phoneNumber"
                                                        id="phoneNumber" required>
                                                    <has-error :form="form" field="phoneNumber"></has-error>
                                                </div>
                                            </div>
                                            <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-line">
                                                    <label class="form-label">Date Of Birth</label>
                                                    <input type="date" class="form-control :class=" { 'is-invalid' :
                                                        form.errors.has('dob') }" name="dob" id="dob" required>
                                                    <has-error :form="form" field="dob"></has-error>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <h3>Employment Details</h3>
                                    <fieldset>
                                        <div class="row">
                                            <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-line">
                                                    <label class="form-label">Designation</label>
                                                    <input type="text" class="form-control :class=" { 'is-invalid' :
                                                        form.errors.has('designation') }" name="designation"
                                                        id="designation" required>
                                                    <has-error :form="form" field="designation"></has-error>
                                                </div>
                                            </div>
                                            <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-line">
                                                    <label class="form-label">Employment Status</label>
                                                    <select class="form-control :class=" { 'is-invalid' :
                                                        form.errors.has('employmentStatus') }" name="employmentStatus"
                                                        id="employmentStatus" required>
                                                        <option value="">Select Employment Status</option>

                                                        <option value="Full Time"> Full Time </option>
                                                        <option value="Part Time">Part Time </option>
                                                        <option value="Contract"> Contract </option>
                                                    </select>
                                                    <has-error :form="form" field="employmentStatus"></has-error>
                                                </div>
                                            </div>
                                            <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-line">
                                                    <label class="form-label">Location</label>
                                                    <input type="text" class="form-control :class=" { 'is-invalid' :
                                                        form.errors.has('location') }" name="location" id="location"
                                                        required>
                                                    <has-error :form="form" field="location"></has-error>
                                                </div>
                                            </div>
                                            <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-line">
                                                    <label class="form-label">Employment Date</label>
                                                    <input type="date" class="form-control :class=" { 'is-invalid' :
                                                        form.errors.has('employmentDate') }" name="employmentDate"
                                                        id="employmentDate" required>
                                                    <has-error :form="form" field="employmentDate"></has-error>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <h3>Emergency Details</h3>
                                    <fieldset>
                                        <div class="row">
                                            <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-line">
                                                    <label class="form-label">Emergency Contact Name</label>
                                                    <input type="text" class="form-control :class=" { 'is-invalid' :
                                                        form.errors.has('emergencyContactName') }"
                                                        name="emergencyContactName" id="emergencyContactName" required>
                                                    <has-error :form="form" field="emergencyContactName"></has-error>
                                                </div>
                                            </div>
                                            <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-line">
                                                    <label class="form-label">Emergency Contact Number</label>
                                                    <input type="text" class="form-control :class=" { 'is-invalid' :
                                                        form.errors.has('emergencyContactNumber') }"
                                                        name="emergencyContactNumber" id="emergencyContactNumber" required>
                                                    <has-error :form="form" field="emergencyContactNumber"></has-error>
                                                </div>
                                            </div>
                                            <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-line">
                                                    <label class="form-label">Emergency Contact Name 2</label>
                                                    <input type="text" class="form-control :class=" { 'is-invalid' :
                                                        form.errors.has('emergencyContactNameTwo') }"
                                                        name="emergencyContactNameTwo" id="emergencyContactNameTwo"
                                                        required>
                                                    <has-error :form="form" field="emergencyContactNameTwo"></has-error>
                                                </div>
                                            </div>
                                            <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-line">
                                                    <label class="form-label">Emergency Contact Number 2</label>
                                                    <input type="text" class="form-control :class=" { 'is-invalid' :
                                                        form.errors.has('emergencyContactNumberTwo') }"
                                                        name="emergencyContactNumberTwo" id="emergencyContactNumberTwo"
                                                        required>
                                                    <has-error :form="form" field="emergencyContactNumberTwo"></has-error>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <h3>Next Of Kin</h3>
                                    <fieldset>
                                        <div class="row">
                                            <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-line">
                                                    <label class="form-label">Next of kin name</label>
                                                    <input type="text" class="form-control :class=" { 'is-invalid' :
                                                        form.errors.has('NOKName') }" name="NOKName" id="NOKName" required>
                                                    <has-error :form="form" field="NOKName"></has-error>
                                                </div>
                                            </div>
                                            <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-line">
                                                    <label class="form-label">Next of kin address</label>
                                                    <input type="text" class="form-control :class=" { 'is-invalid' :
                                                        form.errors.has('NOKAddress') }" name="NOKAddress" id="NOKAddress"
                                                        required>
                                                    <has-error :form="form" field="NOKAddress"></has-error>
                                                </div>
                                            </div>
                                            <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-line">
                                                    <label class="form-label">Next of kin phone</label>
                                                    <input type="text" class="form-control :class=" { 'is-invalid' :
                                                        form.errors.has('NOKPhone') }" name="NOKPhone" id="NOKPhone"
                                                        required>
                                                    <has-error :form="form" field="NOKPhone"></has-error>
                                                </div>
                                            </div>
                                            <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-line">
                                                    <label class="form-label">Guarantor Name</label>
                                                    <input type="text" class="form-control :class=" { 'is-invalid' :
                                                        form.errors.has('guarantorName') }" name="guarantorName"
                                                        id="guarantorName" required>
                                                    <has-error :form="form" field="guarantorName"></has-error>
                                                </div>
                                            </div>
                                            <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-line">
                                                    <label class="form-label">Guarantor Address</label>
                                                    <input type="text" class="form-control :class=" { 'is-invalid' :
                                                        form.errors.has('guarantorAddress') }" name="guarantorAddress"
                                                        id="guarantorAddress" required>
                                                    <has-error :form="form" field="guarantorAddress"></has-error>
                                                </div>
                                            </div>
                                            <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-line">
                                                    <label class="form-label">Guarantor Phone</label>
                                                    <input type="text" class="form-control :class=" { 'is-invalid' :
                                                        form.errors.has('guarantorPhone') }" name="guarantorPhone"
                                                        id="guarantorPhone" required>
                                                    <has-error :form="form" field="guarantorPhone"></has-error>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <h3>Bank Details</h3>
                                    <fieldset>
                                        <div class="row">
                                            <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-line">
                                                    <label class="form-label">Bank Name</label>
                                                    <input type="text" class="form-control :class=" { 'is-invalid' :
                                                        form.errors.has('bankName') }" name="bankName" id="bankName"
                                                        required>
                                                    <has-error :form="form" field="bankName"></has-error>
                                                </div>
                                            </div>
                                            <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-line">
                                                    <label class="form-label">Staff Salary</label>
                                                    <input type="text" class="form-control :class=" { 'is-invalid' :
                                                        form.errors.has('staffSalary') }" name="staffSalary"
                                                        id="staffSalary" required>
                                                    <has-error :form="form" field="staffSalary"></has-error>
                                                </div>
                                            </div>
                                            <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-line">
                                                    <label class="form-label">Bank Account Number</label>
                                                    <input type="text" class="form-control :class=" { 'is-invalid' :
                                                        form.errors.has('bankAccNumber') }" name="bankAccNumber"
                                                        id="bankAccNumber" required>
                                                    <has-error :form="form" field="bankAccNumber"></has-error>
                                                </div>
                                            </div>

                                        </div>
                                    </fieldset>
                                    <h3>Additional Info</h3>
                                    <fieldset>
                                        <div class="row">
                                            <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-line">
                                                    <label class="form-label">Riders Permit Number</label>
                                                    <input type="text" class="form-control :class=" { 'is-invalid' :
                                                        form.errors.has('driversLicense') }" name="driversLicense"
                                                        id="driversLicense" required>
                                                    <has-error :form="form" field="driversLicense"></has-error>
                                                </div>
                                            </div>
                                            <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-line">
                                                    <label class="form-label">Insuance Date</label>
                                                    <input type="date" class="form-control :class=" { 'is-invalid' :
                                                        form.errors.has('insuranceDate') }" name="insuranceDate"
                                                        id="insuranceDate" required>
                                                    <has-error :form="form" field="insuranceDate"></has-error>
                                                </div>
                                            </div>
                                            <div class="form-group form-float col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-line">
                                                    <label class="form-label">Expiry Date</label>
                                                    <input type="date" class="form-control :class=" { 'is-invalid' :
                                                        form.errors.has('expiryDate') }" name="expiryDate" id="expiryDate"
                                                        required>
                                                    <has-error :form="form" field="expiryDate"></has-error>
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
@endsection
