@extends('layouts.page')
@section('content')
    <div class="main-content">
        @include('partials.user.messages')
        <section class="section">
            <ul class="breadcrumb breadcrumb-style ">
                <li class="breadcrumb-item">
                    <h4 class="page-title m-b-0">Manage SLA Clients</h4>
                </li>

            </ul>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <button class="btn btn-success" type="reset" data-toggle="modal"
                                    data-target="#updateBikeMaintenance"><i class="fa fa-plus text-white m-3">Add new
                                        customer</i></button>
                                <button class="btn btn-primary" type="reset" data-toggle="modal"
                                    data-target="#fundCustomer"><i class="fa fa-plus text-white m-3">Fund customer
                                        account</i></button>
                            </div>
                            @if (count($slas) > 0)
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
                                                    <th>Customer Name</th>
                                                    <th>Customer Phone</th>
                                                    <th>Customer Account ID</th>
                                                    <th>Current Balance (₦)</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($slas as $key => $sla)
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
                                                        <td>{{ $sla->user->fullname }}</td>
                                                        <td>{{ $sla->user->phoneNumber }}</td>
                                                        <td>{{ $sla->accountId }}</td>
                                                        <td>{{ number_format($sla->balance, 2) }}</td>
                                                        <td>{{ $sla->created_at->format('F j, Y') }}</td>
                                                        <td><a href="#" class="btn btn-primary">Detail</a></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @else
                                <h3>No SLA Client added</h3>
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

    <!-- Add new sla client Modal-->
    <div class="modal fade" id="updateBikeMaintenance" tabindex="-1" role="dialog"
        aria-labelledby="bikeMaintenanceModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bikeMaintenanceModalLabel">Add new sla client</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/add-sla-client" method="post">
                    {{ csrf_field() }}
                    <div class="form-group form-float col-12">
                        <label>Customers</label>
                        @if (count($customers) > 0)
                            <select class="form-control :class=" { 'is-invalid' : form.errors.has('customerEmail') }"
                                name="customerEmail" id="customerEmail" onchange="showCustomerInfo()">
                                <option value="">Select customer</option>
                                @foreach ($customers as $user)
                                    <option value="{{ $user->email }}">{{ $user->fullname }}</option>
                                @endforeach
                            </select>
                            <has-error :form="form" field="customerEmail"></has-error>
                        @else
                            <h3>No registered customer</h3>
                        @endif
                    </div>
                    <div class="form-group form-float col-12">
                        <div class=" form-line">
                            <label class="form-label">Customer Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control :class=" { 'is-invalid' :
                                form.errors.has('textOfAccident') }" name="customerName" id="customerName" required
                                placeholder="Customer name" disabled>
                            <has-error :form="form" field="customerName"></has-error>
                        </div>
                    </div>
                    <div class="form-group form-float col-12">
                        <div class=" form-line">
                            <label class="form-label">Customer Phone<span class="text-danger">*</span></label>
                            <input type="text" class="form-control :class=" { 'is-invalid' :
                                form.errors.has('customerPhone') }" name="customerPhone" id="customerPhone" required
                                placeholder="Customer phone number" disabled>
                            <has-error :form="form" field="customerPhone"></has-error>
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

    <!-- Fund customer account Modal-->
    <div class="modal fade" id="fundCustomer" tabindex="-1" role="dialog" aria-labelledby="fundCustomerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fundCustomerModalLabel">Fund custommer account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/fund-customer-account" method="post">
                    {{ csrf_field() }}
                    <div class="form-group form-float col-12">
                        <label>Customers</label>
                        @if (count($clients) > 0)
                            <select class="form-control :class=" { 'is-invalid' : form.errors.has('slaClient') }"
                                name="slaClient" id="slaClient">
                                <option value="">Select customer</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->user->fullname }}</option>
                                @endforeach
                            </select>
                            <has-error :form="form" field="slaClient"></has-error>
                        @else
                            <h3>No registered customer</h3>
                        @endif
                    </div>
                    <div class="form-group form-float col-12">
                        <div class=" form-line">
                            <label class="form-label">Amount<span class="text-danger">*</span></label>
                            <input type="text" class="form-control :class=" { 'is-invalid' : form.errors.has('amount') }"
                                name="amount" id="amount" required placeholder="Amount">
                            <has-error :form="form" field="amount"></has-error>
                        </div>
                    </div>
                    <div class="form-group form-float col-12">
                        <div class=" form-line">
                            <label>Mode of payment<span class="text-danger">*</span></label>
                            <select class="form-control :class=" { 'is-invalid' : form.errors.has('paymentMode') }"
                                name="paymentMode" id="paymentMode" required>
                                <option value="cash">Cash</option>
                                <option value="transfer">Transfer</option>
                            </select>
                            <has-error :form="form" field="paymentMode"></has-error>
                        </div>
                    </div>
                    <div class="form-group form-float col-12">
                        <div class=" form-line">
                            <label class="form-label">Transaction ID<span class="text-danger">*</span></label>
                            <input type="text" class="form-control :class=" { 'is-invalid' :
                                form.errors.has('transactionId') }" name="transactionId" id="transactionId" required
                                placeholder="transaction id">
                            <has-error :form="form" field="transactionId"></has-error>
                        </div>
                    </div>
                    <div class="form-group form-float col-12">
                        <div class=" form-line">
                            <input id="acceptTerms-2" name="acceptTerms" type="checkbox" required>
                            <label for="acceptTerms-2">I agree to have entered all correct information regarding this
                                payment.</label>
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
        var customers = <?php echo json_encode(
        $customers); ?> ; //get all customers from database query

        var customerName = document.getElementById('customerName');
        var customerPhone = document.getElementById('customerPhone');

        const showCustomerInfo = () => {
            let customerEmail = document.getElementById('customerEmail').value;
            let customer = (customers.filter((customer) => customer.email === customerEmail));
            customerName.value = customer[0].fullname; // fill name
            customerPhone.value = customer[0].phoneNumber; // fill phone number
        }

    </script>
@endsection
