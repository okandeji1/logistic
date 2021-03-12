@extends('layouts.page')
@section('content')
    <div class="main-content">
        @include('partials.user.messages')
        <section class="section">
            <ul class="breadcrumb breadcrumb-style ">
                <li class="breadcrumb-item">
                    <h4 class="page-title m-b-0">All Orders</h4>
                </li>
            </ul>
            {{-- Admin Table --}}
            @can('isAdmin')
                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                </div>
                                @if (count($orders) > 0)
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
                                                        <th>Amount Paid</th>
                                                        <th>Delivery Area</th>
                                                        <th>Order Date</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($orders as $key => $order)
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
                                                            @if ($order->customer)
                                                                <td>{{ $order->customer->fullname }}</td>
                                                            @elseif($order->user)
                                                                <td>{{ $order->user->fullname }}</td>
                                                            @else
                                                                <td>
                                                                    <div class="badge badge-danger badge-shadow">Customer dosn't
                                                                        exist again</div>
                                                                </td>
                                                            @endif
                                                            <td>{{ $order->amountPaid }}</td>
                                                            <td>{{ $order->deliveryRegion }}</td>
                                                            <td>{{ $order->created_at->format('F j, Y') }}</td>
                                                            <td>
                                                                @switch($order->status)
                                                                    @case('Picked-Up')
                                                                    <div class="badge badge-primary badge-shadow">
                                                                        {{ $order->status }}
                                                                    </div>
                                                                    @break
                                                                    @case('in-transit')
                                                                    <div class="badge badge-secondary badge-shadow">
                                                                        {{ $order->status }}
                                                                    </div>
                                                                    @break
                                                                    @case('Pending')
                                                                    <div class="badge badge-warning badge-shadow">
                                                                        {{ $order->status }}
                                                                    </div>
                                                                    @break
                                                                    @case('Cancelled')
                                                                    <div class="badge badge-danger badge-shadow">
                                                                        {{ $order->status }}
                                                                    </div>
                                                                    @break
                                                                    @case('Completed')
                                                                    <div class="badge badge-success badge-shadow">
                                                                        {{ $order->status }}
                                                                    </div>
                                                                    @break
                                                                    @default
                                                                    <div class="badge badge-danger badge-shadow">No Order</div>
                                                                @endswitch
                                                            </td>
                                                            <td><a href="/order-details/{{ $order->uuid }}"
                                                                    class="btn btn-primary">Order Details</a></td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        {{-- {{ $orders->links() }}
                                        --}}
                                    </div>
                                @else
                                    <h3>No Order</h3>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
            {{-- End of admin table --}}

            {{-- Customer Table --}}
            @can('isCustomer')
                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                </div>
                                @if (count($scOrders) > 0)
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
                                                        <th>Order ID</th>
                                                        <th>Tracking ID</th>
                                                        <th>category</th>
                                                        <th>Amount Paid</th>
                                                        <th>Payment Type</th>
                                                        <th>Delivery Area</th>
                                                        <th>Order Date</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($orders as $key => $order)
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
                                                            <td>{{ $order->uuid }}</td>
                                                            <td>{{ $order->trackingId }}</td>
                                                            <td>{{ $order->orderCategory }}</td>
                                                            <td>{{ $order->amountPaid }}</td>
                                                            <td>{{ $order->paymentType }}</td>
                                                            <td>{{ $order->deliveryRegion }}</td>
                                                            <td>{{ $order->created_at->format('F j, Y') }}</td>
                                                            <td>
                                                                @switch($order->status)
                                                                    @case('Picked-Up')
                                                                    <div class="badge badge-primary badge-shadow">
                                                                        {{ $order->status }}
                                                                    </div>
                                                                    @break
                                                                    @case('in-transit')
                                                                    <div class="badge badge-secondary badge-shadow">
                                                                        {{ $order->status }}
                                                                    </div>
                                                                    @break
                                                                    @case('Pending')
                                                                    <div class="badge badge-warning badge-shadow">
                                                                        {{ $order->status }}
                                                                    </div>
                                                                    @break
                                                                    @case('Cancelled')
                                                                    <div class="badge badge-danger badge-shadow">
                                                                        {{ $order->status }}
                                                                    </div>
                                                                    @break
                                                                    @case('Completed')
                                                                    <div class="badge badge-success badge-shadow">
                                                                        {{ $order->status }}
                                                                    </div>
                                                                    @break
                                                                    @default
                                                                    <div class="badge badge-danger badge-shadow">No Order</div>
                                                                @endswitch
                                                            </td>
                                                            <td><a href="/order-details/{{ $order->uuid }}"
                                                                    class="btn btn-primary">Order Details</a></td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        {{-- {{ $orders->links() }}
                                        --}}
                                    </div>
                                @else
                                    <h3>No Order</h3>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
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
@endsection
