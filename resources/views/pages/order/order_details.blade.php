@extends('layouts.page')
<style>
/* The Modal (background) */
.modal {
    display: none;
    /* Hidden by default */
    position: fixed;
    /* Stay in place */
    z-index: 1;
    /* Sit on top */
    padding-top: 100px;
    /* Location of the box */
    left: 0;
    top: 0;
    /* width: 50%; Full width */
    height: 100%;
    /* Full height */
    overflow: auto;
    /* Enable scroll if needed */
    background-color: rgb(0, 0, 0);
    /* Fallback color */
    background-color: rgba(0, 0, 0, 0.4);
    /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 70px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>
@section('content')
<div class="main-content">
    @include('partials.user.messages')
    <div class="alert alert-success d-none" id="msg"></div>
    <section class="section">
        <ul class="breadcrumb breadcrumb-style ">
            <li class="breadcrumb-item">
                <h4 class="page-title m-b-0">Order details</h4>
            </li>
        </ul>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            @can('isAdmin')
                            <button class="btn btn-success mr-1" id="status" value="{{ $order->id }}" type="button">Mark
                                as
                                Completed</button>
                            <button class="btn btn-info mr-1" type="reset" data-toggle="modal"
                                data-target="#editStatusModal">Edit
                                Status</button>
                            <button class="btn btn-danger" type="reset" id="deleteOrder" onclick="deleteModal();">Cancel
                                Order</button>
                            @endcan
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                    <label>Order ID</label>
                                    <input type="text" value="{{ $order->uuid }}" disabled class="form-control">
                                </div>
                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                    <label>Order Date</label>
                                    <input type="text" value="{{ $order->created_at->format('F j, Y') }}" disabled
                                        class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                    <label>Pickup Area</label>
                                    <input type="text" value="{{ $order->pickupRegion }}" disabled class="form-control">
                                </div>
                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                    <label>Pickup Address</label>
                                    <input type="text" value="{{ $order->pickupAddress }}" disabled
                                        class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                    <label>Delivery Area</label>
                                    <input type="text" value="{{ $order->deliveryRegion }}" disabled
                                        class="form-control">
                                </div>
                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                    <label>Delivery Address</label>
                                    <input type="text" value="{{ $order->deliveryAddress }}" disabled
                                        class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                @if ($order->customer)
                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                    <label>Customer Name</label>
                                    <input type="text" value="{{ $order->customer->fullname }}" disabled
                                        class="form-control">
                                </div>
                                @elseif($order->user)
                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                    <label>Customer Name</label>
                                    <input type="text" value="{{ $order->user->fullname }}" disabled
                                        class="form-control">
                                </div>
                                @else
                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                    <label>Customer Name</label>
                                    <input type="text" value="Customer doesn't exist again" disabled
                                        class="form-control text-danger">
                                </div>
                                @endif
                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                    <label>Customer Phone</label>
                                    <input type="text" value="{{ $order->customerPhone }}" disabled
                                        class="form-control">
                                </div>
                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                    <label>Estimated Amount</label>
                                    <input type="text" value="{{ $order->estimatedAmount }}" disabled
                                        class="form-control">
                                </div>
                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                    <label>Amount Paid</label>
                                    <input type="text" value="{{ $order->amountPaid }}" disabled class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                    <label>Delivery Contact Name</label>
                                    <input type="text" value="{{ $order->deliveryContactName }}" disabled
                                        class="form-control">
                                </div>
                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                    <label>Delivery Contact Phone</label>
                                    <input type="text" value="{{ $order->deliveryContactPhone }}" disabled
                                        class="form-control">
                                </div>
                                @can('isAdmin')
                                @if ($order->rider)
                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                    <label>Driver Assigned</label>
                                    <input type="text" value="{{ $order->rider->fullname }}" disabled
                                        class="form-control">
                                </div>
                                @else
                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                    <label>Driver Assigned</label>
                                    <input type="text" value="Rider doesn/'t exist again" disabled class="form-control">
                                </div>
                                @endif
                                @endcan
                                <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                    <label>Status</label>
                                    <input type="text" value="{{ $order->status }}" disabled class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-danger" type="reset" onclick="history.back();">Cancel</button>
                            @can('isAdmin')
                            <a href="/generate-transaction/{{ $order->uuid }}" class="btn btn-primary mr-1"
                                type="submit">Generate
                                Transaction</a>
                            @endcan
                        </div>
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

<!-- Delete Modal -->
<div id="deleteModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <form action="/delete-order/{{ $order->id }}" method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                    <label>Reasons</label>
                    <textarea class="form-control :class=" { 'is-invalid' : form.errors.has('comment') }"
                        name="comment"></textarea>
                    <has-error :form="form" field="comment"></has-error>
                </div>
                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                    <input id="acceptTerms-2" name="acceptTerms" type="checkbox" required>
                    <label for="acceptTerms-2">l have informed the customer before canceling this order</label>
                </div>
            </div>
            <div>
                <button class="btn btn-success" type="submit">Submit</button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Status  Modal -->
<div class="modal fade" id="editStatusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Order Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/update-status/{{ $order->id }}" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <label class="form-label">Order Status</label>
                            <select class="form-control :class=" { 'is-invalid' : form.errors.has('status') }"
                                name="status" id="status" required>
                                <option value="Picked-Up">Picked UP</option>
                                <option value="in-transit">in-transit</option>
                            </select>
                            <has-error :form="form" field="status"></has-error>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>



<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script>
function deleteModal() {
    // Get the modal for delete
    var modal = document.getElementById("deleteModal");
    // When the user clicks the button, open the modal 
    modal.style.display = "block";
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
}

// Set order status to successful
$('#status').on('click', (e) => {
    if (confirm('Are you sure you want to mark this order as completed?')) {
        e.preventDefault();
        let id = $('#status').val()
        $.ajax({
            url: "{{ url('/complete-order') }}",
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id
            },
            success: function(data) {
                alert(data)
                window.location.replace('/all-order');
            },
            error: function(error) {
                console.log(error)
            }
        });
    } else {
        close()
    }
})
</script>
@endsection