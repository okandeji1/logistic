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
                                    data-target="#updateBikeMaintenance"><i class="fa fa-plus text-white m-3"> Update
                                        maintenance schedule</i></button>
                            </div>
                            @if (count($maintenances) > 0)
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
                                                    <th>Plate Number</th>
                                                    <th>Service Date</th>
                                                    <th>Cost of Service</th>
                                                    <th>Updated By</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($maintenances as $key => $maintenance)
                                                    <tr>
                                                        <td class="text-center pt-2">
                                                            <div class="custom-checkbox custom-control">
                                                                <input type="checkbox" data-checkboxes="mygroup"
                                                                    class="custom-control-input" id="checkbox-1">
                                                                <label for="checkbox-1"
                                                                    class="custom-control-label">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        @if($maintenance->bike)
                                                        <td>{{ $maintenance->bike->plateNumber }}</td>
                                                        @endif
                                                        <td>{{ $maintenance->dateOfService }}</td>
                                                        <td>{{ $maintenance->costOfService }}</td>
                                                        <td>{{ $maintenance->user->fullname }}</td>
                                                        <td>{{ $maintenance->created_at->format('F j, Y') }}</td>
                                                        <td><a href="/edit-bike-maintenance/{{ $maintenance->uuid }}"
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
                    <h5 class="modal-title" id="bikeMaintenanceModalLabel">Update Bike Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/update-bike-maintenance" method="post">
                    {{ csrf_field() }}
                    <div class="form-group form-float col-12">
                        <div class=" form-line">
                            <label class="form-label">Date Of Service<span class="text-danger">*</span></label>
                            <input type="date" class="form-control :class=" { 'is-invalid' :
                                form.errors.has('dateOfService') }" name="dateOfService" id="dateOfService" required
                                placeholder="Date Of Service">
                            <has-error :form="form" field="dateOfService"></has-error>
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
                            <label class="form-label">Cost Of Service<span class="text-danger">*</span></label>
                            <input type="text" class="form-control :class=" { 'is-invalid' :
                                form.errors.has('costOfService') }" name="costOfService" id="costOfService" required
                                placeholder="Cost of service">
                            <has-error :form="form" field="costOfService"></has-error>
                        </div>
                    </div>
                    <div class="form-group form-float col-12">
                        <div class=" form-line">
                            <label class="form-label">Description Of Maintenance<span class="text-danger">*</span></label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control :class="
                                { 'is-invalid' : form.errors.has('description') }" required></textarea>
                            <has-error :form="form" field="description"></has-error>
                        </div>
                    </div>
                    <div class="form-group form-float col-12">
                        <div class=" form-line">
                            <label class="form-label">Insurance Claim (Optional)</label>
                            <input type="text" class="form-control :class=" { 'is-invalid' :
                                form.errors.has('insuranceClaim') }" name="insuranceClaim" id="insuranceClaim"
                                placeholder="Insurance claim">
                            <has-error :form="form" field="insuranceClaim"></has-error>
                        </div>
                    </div>
                    <div class="form-group form-float col-12">
                        <label>Bike</label>
                        <div class="input-group">
                            @if (count($bikes) > 0)
                                <input list="bikes" class="form-control :class=" { 'is-invalid' :
                                    form.errors.has('bikeName') }" name="bikeName" id="bikeName" onchange="showBikeInfo()"
                                    placeholder="Select bike for update" required>
                                <datalist id="bikes">
                                    @foreach ($bikes as $bike)
                                        <option value="{{ $bike->name }}" />
                                    @endforeach
                                </datalist>
                            @else
                                <h3 class="text-danger">Please register a bike and continue</h3>
                            @endif
                            <has-error :form="form" field="bikeName"></has-error>
                        </div>
                    </div>
                    <div class="form-group form-float col-12">
                        <div class=" form-line">
                            <label class="form-label">Plate Number<span class="text-danger">*</span></label>
                            <input type="text" class="form-control :class=" { 'is-invalid' : form.errors.has('plateNumber')
                                }" name="plateNumber" id="plateNumber" required placeholder="Plate number">
                            <has-error :form="form" field="plateNumber"></has-error>
                        </div>
                    </div>
                    <div class="form-group form-float col-12">
                        <div class=" form-line">
                            <label class="form-label">Bike Accessories purchased<span class="text-danger">*</span></label>
                            <input type="text" class="form-control :class=" { 'is-invalid' :
                                form.errors.has('bikeAccessoryOne') }" name="bikeAccessoryOne" id="bikeAccessoryOne"
                                placeholder="Bike accessory" required>
                            <has-error :form="form" field="bikeAccessoryOne"></has-error>
                            <button type="button" class="btn btn-success mt-2 add" onclick="addFields();"><i
                                    class="fa fa-plus text-white"></i></button>
                        </div>
                    </div>
                    <div class="d-none accessories">
                        <div class="form-group form-float col-12">
                            <div class=" form-line">
                                <label class="form-label">Bike Accessories purchased</label>
                                <input type="text" class="form-control :class=" { 'is-invalid' :
                                    form.errors.has('bikeAccessoryTwo') }" name="bikeAccessoryTwo" id="bikeAccessoryTwo"
                                    placeholder="Bike accessory">
                                <has-error :form="form" field="bikeAccessoryTwo"></has-error>
                            </div>
                        </div>
                        <div class="form-group form-float col-12">
                            <div class=" form-line">
                                <label class="form-label">Bike Accessories purchased</label>
                                <input type="text" class="form-control :class=" { 'is-invalid' :
                                    form.errors.has('bikeAccessoryThree') }" name="bikeAccessoryThree"
                                    id="bikeAccessoryThree" placeholder="Bike accessory">
                                <has-error :form="form" field="bikeAccessoryThree"></has-error>
                            </div>
                        </div>
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

    <script>
        var bikes = <?php echo json_encode($bikes); ?> ; //get all bikes from database query

        var plateNumber = document.getElementById('plateNumber');

        const showBikeInfo = () => {
            let bikeName = document.getElementById('bikeName').value;
            let bike = (bikes.filter((bike) => bike.name === bikeName));
            plateNumber.value = bike[0].plateNumber; // fill plate number
        }

        // Add more input fields on button clicked
        function addFields() {
            $('.accessories').removeClass('d-none');
            $('.add').addClass('d-none');
        }

    </script>
@endsection
