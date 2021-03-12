@extends('layouts.page')
@section('content')
    <div class="main-content">
        @include('partials.user.messages')
        <section class="section">
            <ul class="breadcrumb breadcrumb-style ">
                <li class="breadcrumb-item">
                    <h4 class="page-title m-b-0">Bike Maintenance</h4>
                </li>

            </ul>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <button class="btn btn-success" type="reset" data-toggle="modal"
                                    data-target="#updateBikeMaintenance"><i class="fa fa-plus text-white m-3">Update Bike
                                        accident</i></button>
                            </div>
                            @if (count($accidents) > 0)
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="table-2">
                                            <thead>
                                                <tr>
                                                    <th class="text-center pt-3">
                                                        <div class="custom-checkbox custom-checkbox-table custom-control">
                                                            <input type="checkbox" data-checkboxes="mygroup"
                                                                data-checkbox-role="dad" class="custom-control-input"
                                                                id="checkbox-all">
                                                            <label for="checkbox-all"
                                                                class="custom-control-label">&nbsp;</label>
                                                        </div>
                                                    </th>
                                                    <th>S/N</th>
                                                    <th>Date of Accident</th>
                                                    <th>Place of accident</th>
                                                    <th>Time of accident</th>
                                                    <th>Cost of repair of bike</th>
                                                    <th>Date of repairs</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($accidents as $key => $accident)
                                                    <tr>
                                                        <td class="text-center pt-2">
                                                            <div class="custom-checkbox custom-control">
                                                                <input type="checkbox" data-checkboxes="mygroup"
                                                                    class="custom-control-input" id="checkbox-1">
                                                                <label for="checkbox-1"
                                                                    class="custom-control-label">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $accident->dateOfAccident }}</td>
                                                        <td>{{ $accident->placeOfAccident }}</td>
                                                        <td>{{ $accident->timeOfAccident }}</td>
                                                        <td>{{ $accident->costOfRepair }}</td>
                                                        <td>{{ $accident->dateOfRepair }}</td>
                                                        <td><a href="/edit-bike-accident/{{ $accident->uuid }}"
                                                                class="btn btn-primary">Detail</a></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @else
                                <h3>No bike maintenance</h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="settingSidebar">
            <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
            </a>
            <div class="settingSidebar-body ps-container ps-theme-default">
                <div class=" fade show active">
                    <div class="setting-panel-header">Setting Panel
                    </div>
                    <div class="p-15 border-bottom">
                        <h6 class="font-medium m-b-10">Select Layout</h6>
                        <div class="selectgroup layout-color w-50">
                            <label class="selectgroup-item">
                                <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout"
                                    checked>
                                <span class="selectgroup-button">Light</span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                                <span class="selectgroup-button">Dark</span>
                            </label>
                        </div>
                    </div>
                    <div class="p-15 border-bottom">
                        <h6 class="font-medium m-b-10">Sidebar Color</h6>
                        <div class="selectgroup selectgroup-pills sidebar-color">
                            <label class="selectgroup-item">
                                <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                                <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                    data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar"
                                    checked>
                                <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                    data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                            </label>
                        </div>
                    </div>
                    <div class="p-15 border-bottom">
                        <h6 class="font-medium m-b-10">Color Theme</h6>
                        <div class="theme-setting-options">
                            <ul class="choose-theme list-unstyled mb-0">
                                <li title="white" class="active">
                                    <div class="white"></div>
                                </li>
                                <li title="cyan">
                                    <div class="cyan"></div>
                                </li>
                                <li title="black">
                                    <div class="black"></div>
                                </li>
                                <li title="purple">
                                    <div class="purple"></div>
                                </li>
                                <li title="orange">
                                    <div class="orange"></div>
                                </li>
                                <li title="green">
                                    <div class="green"></div>
                                </li>
                                <li title="red">
                                    <div class="red"></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="p-15 border-bottom">
                        <div class="theme-setting-options">
                            <label class="m-b-0">
                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                    id="mini_sidebar_setting">
                                <span class="custom-switch-indicator"></span>
                                <span class="control-label p-l-10">Mini Sidebar</span>
                            </label>
                        </div>
                    </div>
                    <div class="p-15 border-bottom">
                        <div class="theme-setting-options">
                            <label class="m-b-0">
                                <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                    id="sticky_header_setting">
                                <span class="custom-switch-indicator"></span>
                                <span class="control-label p-l-10">Sticky Header</span>
                            </label>
                        </div>
                    </div>
                    <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                        <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                            <i class="fas fa-undo"></i> Restore Default
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Update bike maintenance Modal-->
    <div class="modal fade" id="updateBikeMaintenance" tabindex="-1" role="dialog"
        aria-labelledby="bikeMaintenanceModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bikeMaintenanceModalLabel">Update Accident Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/update-accident-info" method="post">
                    {{ csrf_field() }}
                    <div class="form-group form-float col-12">
                        <div class=" form-line">
                            <label class="form-label">Date Of Accident<span class="text-danger">*</span></label>
                            <input type="date" class="form-control :class=" { 'is-invalid' :
                                form.errors.has('dateOfAccident') }" name="dateOfAccident" id="dateOfAccident" required
                                placeholder="Date Of accident">
                            <has-error :form="form" field="dateOfAccident"></has-error>
                        </div>
                    </div>
                    <div class="form-group form-float col-12">
                        <div class=" form-line">
                            <label class="form-label">Place Of Accident<span class="text-danger">*</span></label>
                            <input type="text" class="form-control :class=" { 'is-invalid' :
                                form.errors.has('placeOfAccident') }" name="placeOfAccident" id="placeOfAccident" required
                                placeholder="Place of accident">
                            <has-error :form="form" field="placeOfAccident"></has-error>
                        </div>
                    </div>
                    <div class="form-group form-float col-12">
                        <label class="form-label">Time of Accident<span class="text-danger">*</span></label>
                        <div class="input-group">

                            <input type="time" name="time" class="form-control time :class=" { 'is-invalid' :
                                form.errors.has('time') }" id="time" required>
                            <has-error :form="form" field="time"></has-error>
                            <div class="input-group-append">
                                <select name="moment" class="form-control :class=" { 'is-invalid' :
                                    form.errors.has('moment') }" id="moment" required>
                                    <option value="AM">AM</option>
                                    <option value="PM">PM</option>
                                </select>
                                <has-error :form="form" field="moment"></has-error>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-float col-12">
                        <div class=" form-line">
                            <label class="form-label">Details of impact of accident on bike (e.g what spoilt on the
                                bike)<span class="text-danger">*</span></label>
                            <textarea name="descriptionOfBike" id="" cols="30" rows="10" class="form-control :class="
                                { 'is-invalid' : form.errors.has('descriptionOfBike') }" required></textarea>
                            <has-error :form="form" field="descriptionOfBike"></has-error>
                        </div>
                    </div>
                    <div class="form-group form-float col-12">
                        <div class=" form-line">
                            <label class="form-label">Details of impact of accident on the rider (e.g what happened to the
                                rider)<span class="text-danger">*</span></label>
                            <textarea name="descriptionOfRider" id="" cols="30" rows="10" class="form-control :class="
                                { 'is-invalid' : form.errors.has('descriptionOfRider') }" required></textarea>
                            <has-error :form="form" field="descriptionOfRider"></has-error>
                        </div>
                    </div>
                    <div class="form-group form-float col-12">
                        <div class=" form-line">
                            <label class="form-label">Cost Of Repair Of Bike<span class="text-danger">*</span></label>
                            <input type="text" class="form-control :class=" { 'is-invalid' : form.errors.has('costOfRepair')
                                }" name="costOfRepair" id="costOfRepair" required placeholder="Cost of repair of bike">
                            <has-error :form="form" field="costOfRepair"></has-error>
                        </div>
                    </div>
                    <div class="form-group form-float col-12">
                        <div class=" form-line">
                            <label class="form-label">Mechanic Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control :class=" { 'is-invalid' : form.errors.has('mechanicName')
                                }" name="mechanicName" id="mechanicName" required placeholder="Mechanic name">
                            <has-error :form="form" field="mechanicName"></has-error>
                        </div>
                    </div>
                    <div class="form-group form-float col-12">
                        <div class=" form-line">
                            <label class="form-label">Mechanic Phone Number<span class="text-danger">*</span></label>
                            <input type="text" class="form-control :class=" { 'is-invalid' :
                                form.errors.has('mechanicNumber') }" name="mechanicNumber" id="mechanicNumber" required
                                placeholder="Mechanic phone number">
                            <has-error :form="form" field="mechanicNumber"></has-error>
                        </div>
                    </div>
                    <div class="form-group form-float col-12">
                        <div class=" form-line">
                            <label class="form-label">Mechanic Shop Address<span class="text-danger">*</span></label>
                            <textarea name="mechanicShopAddress" id="" cols="30" rows="10" class="form-control :class="
                                { 'is-invalid' : form.errors.has('mechanicShopAddress') }" required></textarea>
                            <has-error :form="form" field="mechanicShopAddress"></has-error>
                        </div>
                    </div>
                    <div class="form-group form-float col-12">
                        <div class=" form-line">
                            <label class="form-label">Date Of Repairs<span class="text-danger">*</span></label>
                            <input type="date" class="form-control :class=" { 'is-invalid' : form.errors.has('dateOfRepair')
                                }" name="dateOfRepair" id="dateOfRepair" required placeholder="Date of repairs">
                            <has-error :form="form" field="dateOfRepair"></has-error>
                        </div>
                    </div>
                    <div class="form-group form-float col-12">
                        <div class=" form-line">
                            <label class="form-label">Claim from insurance (Optional)<span
                                    class="text-danger">*</span></label>
                            <textarea name="insuranceClaim" id="" cols="30" rows="10" class="form-control :class="
                                { 'is-invalid' : form.errors.has('insuranceClaim') }"></textarea>
                            <has-error :form="form" field="insuranceClaim"></has-error>
                        </div>
                    </div>
                    <div class="form-group form-float col-12">
                        <label>Rider Involved</label>
                        @if (count($riders) > 0)
                            <select class="form-control :class=" { 'is-invalid' : form.errors.has('riderEmail') }"
                                name="riderEmail">
                                @foreach ($riders as $rider)
                                    <option value="{{ $rider->email }}">{{ $rider->fullname }}</option>
                                @endforeach
                            </select>
                            <has-error :form="form" field="riderEmail"></has-error>
                        @else
                            <h3>No registered rider</h3>
                        @endif
                    </div>
                    <div class="form-group form-float col-12">
                        <div class="form-line">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
