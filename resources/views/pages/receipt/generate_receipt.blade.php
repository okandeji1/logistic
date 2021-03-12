@extends('layouts.page')
@section('content')
    <div class="main-content">
        <section class="section">
            <ul class="breadcrumb breadcrumb-style ">
                <li class="breadcrumb-item">
                    <h4 class="page-title m-b-0">Receipts</h4>
                </li>
            </ul>
            <div class="section-body">
                <div class="invoice">
                    <div class="invoice-print">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="invoice-title">
                                    <h2>Receipt</h2>
                                    <div class="invoice-number">Reference #{{ $transaction->reference }}</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <address>
                                            <strong>Billed To:</strong><br>
                                            @if ($transaction->order->customer)
                                                {{ $transaction->order->customer->fullname }},<br>
                                            @elseif($transaction->order->user)
                                                {{ $transaction->order->user->fullname }},<br>
                                            @else
                                                <p>This customer doesn't exit</p>
                                            @endif
                                            @if ($transaction->order)
                                                {{ $transaction->order->pickupAddress }},<br>
                                                {{ $transaction->order->pickupRegion }}.
                                        </address>
                                    </div>
                                    <div class="col-md-6 text-md-right">
                                        <address>
                                            <strong>Delivered To:</strong><br>
                                            {{ $transaction->order->deliveryContactName }}<br>
                                            {{ $transaction->order->deliveryAddress }}<br>
                                        </address>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <address>
                                            <strong>Payment Method:</strong><br>
                                            {{ $transaction->paymentType }}<br>
                                            {{ $transaction->order->customerEmail }}
                                        </address>
                                    </div>
                                    <div class="col-md-6 text-md-right">
                                        <address>
                                            <strong>Order Date:</strong><br>
                                            {{ $transaction->created_at->format('F j, Y') }}<br><br>
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="section-title">Order Summary</div>
                                <p class="section-lead">All items here cannot be deleted.</p>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-md">
                                        <tr>
                                            <th data-width="40">#</th>
                                            <th>Item</th>
                                            <th class="text-center">Delivery Adress</th>
                                            <th class="text-center">Price</th>
                                            <th>Pick up Contact</th>
                                            <th class="text-right">Totals</th>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>{{ $transaction->order->orderCategory }}</td>
                                            <td>Delivery from {{ $transaction->order->pickupRegion }} to
                                                {{ $transaction->order->deliveryRegion }}
                                            </td>
                                            <td class="text-center">{{ $transaction->amount }}</td>
                                            <td class="text-right">{{ $transaction->order->deliveryContactName }}</td>
                                            <td class="text-right">{{ $transaction->amount }}</td>
                                        </tr>

                                    </table>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-lg-8">
                                        {{-- <div class="section-title">Payment Method</div>
                                        --}}
                                        {{-- <p class="section-lead">The payment method that
                                            we provide is to make it easier for you to pay
                                            invoices.</p>
                                        <div class="images">
                                            <img src="assets/img/cards/visa.png" alt="visa">
                                            <img src="assets/img/cards/jcb.png" alt="jcb">
                                            <img src="assets/img/cards/mastercard.png" alt="mastercard">
                                            <img src="assets/img/cards/paypal.png" alt="paypal">
                                        </div> --}}
                                    </div>
                                    @endif
                                    <div class="col-lg-4 text-right">
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">Subtotal</div>
                                            <div class="invoice-detail-value">{{ $transaction->amount }}</div>
                                        </div>
                                        {{-- <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">Shipping</div>
                                            <div class="invoice-detail-value">#15</div>
                                        </div> --}}
                                        <hr class="mt-2 mb-2">
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">Total</div>
                                            <div class="invoice-detail-value invoice-detail-value-lg">
                                                {{ $transaction->amount }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h3>Terms and Conditions</h3>
                            <ul>
                                <li>You must disclose to us the content of the delivery at the time of making your order.
                                    You
                                    shall not change the content disclosed to us when our dispatch gets to your premises.
                                </li>
                                <li>You agree to ensure that the information you supply in the Order Schedule is complete
                                    and
                                    accurate</li>
                                <li>The coach express may reject your order where the KG is bigger than our carriers. In
                                    this
                                    instance, you will be entitled only to a refund of payments made. It is important to
                                    know
                                    that we will only be doing deliveries for items that can be carried by our bikes</li>
                                <li>You shall not keep our dispatcher for more than 10minutes, anything after that will be
                                    N65
                                    for every 5minutes of delay after the initial 10minutes</li>
                                <li>The Coach Express dispatcher shall not provide any equipment or labor to you or your
                                    representative aside from picking up items already confirmed at the time of making the
                                    order. You must not give our dispatcher any item not disclosed to our representative at
                                    the
                                    time of making the order. </li>
                                <li>Our dispatch will make one attempt to deliver goods/items during normal working hours,
                                    where
                                    we can’t reach the receiver, we will notify you and the order will be brought back to
                                    our
                                    office or delivered back to you. If you wish for us to try the delivery again, you will
                                    need
                                    to pay again or have the receiver pick up from our office.</li>
                                <li>If there is a delay in delivery, we will try delivering your order the next day without
                                    any
                                    cost to you. </li>
                                <li>If your order is made after 10am and the locations are far we might not be able to
                                    deliver
                                    the item until the next day</li>
                                <li>You agree not to use the coach to carry any illegal substance, hard drugs, firearms,
                                    pyrotechnics, corrosive, flammable items, oxidizing or radioactive materials and any
                                    good
                                    considered as contrabands under the laws of the Federal Republic of Nigeria. </li>
                                <li>You are responsible for providing insurance coverage of your goods. The coach will
                                    ensure
                                    the items given to us is delivered in the same condition it was given to us.</li>
                                <li>The Rider and The Coach Express reserves the right to refuse to carry any parcels where
                                    there is suspicion of the content. In such situation you are to confirm the content of
                                    the
                                    parcel to the rider. </li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <div class="text-md-right">
                        <div class="float-lg-left mb-lg-0 mb-3">
                            {{-- <button class="btn btn-primary btn-icon icon-left"><i
                                    class="fas fa-credit-card"></i> Process
                                Payment</button> --}}
                            <button class="btn btn-danger btn-icon icon-left" onclick="history.back();"><i
                                    class="fas fa-times"></i>
                                Cancel</button>
                        </div>
                        <button class="btn btn-warning btn-icon icon-left" onclick="printReceipt();"><i
                                class="fas fa-print"></i>
                            Print</button>
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

    <script>
        function printReceipt() {
            var printContent = document.querySelector('.invoice-print');
            var WinPrint = window.open('', '', 'left=0,top=0,width=900,height=900,toolbar=0,scrollbars=0,status=0');
            WinPrint.document.write(printContent.innerHTML);
            WinPrint.document.close();
            WinPrint.focus();
            WinPrint.print();
            WinPrint.close();
        }

    </script>
@endsection
