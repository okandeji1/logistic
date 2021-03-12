@extends('layouts.page')
@section('content')
    <div class="main-content">
        <section class="section">
            <ul class="breadcrumb breadcrumb-style ">
                <li class="breadcrumb-item">
                    <h4 class="page-title m-b-0">Bike details</h4>
                </li>
            </ul>
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col col-lg-6 col-md-12 col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3>Rider Details</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                        <label>Name</label>
                                                        <input type="text" value="{{ $bike->rider->fullname }}" disabled
                                                            class="form-control">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                        <label>Phone Number</label>
                                                        <input type="text" value="{{ $bike->rider->phoneNumber }}" disabled
                                                            class="form-control">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                        <label>Email</label>
                                                        <input type="text" value="{{ $bike->rider->email }}" disabled
                                                            class="form-control">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                        <label>Location</label>
                                                        <input type="text" value="{{ $bike->rider->location }}" disabled
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col col-lg-6 col-md-12 col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3>Mailtenance Details</h3>
                                            </div>
                                            <div class="card-body">
                                                @if ($bike->maintenance)
                                                    <div class="row">
                                                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                            <label>Service Date</label>
                                                            <input type="text"
                                                                value="{{ $bike->maintenance->dateOfService }}" disabled
                                                                class="form-control">
                                                        </div>
                                                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                            <label>Cost Of Service</label>
                                                            <input type="text"
                                                                value="{{ $bike->maintenance->costOfService }}" disabled
                                                                class="form-control">
                                                        </div>
                                                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                            <label>Description Of maintenance</label>
                                                            <textarea class="form-control" disabled>
                                                            {{ $bike->maintenance->description }}
                                                            </textarea>
                                                        </div>
                                                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                                            <label>Mechanic Name</label>
                                                            <input type="text"
                                                                value="{{ $bike->maintenance->mechanicName }}" disabled
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                @else
                                                    <h3>No maintenance for this bike</h3>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                        <label>Bike Name</label>
                                        <input type="text" value="{{ $bike->name }}" disabled class="form-control">
                                    </div>
                                    <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                        <label>Plate Number</label>
                                        <input type="text" value="{{ $bike->plateNumber }}" disabled class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                        <label>Date Of Purchase</label>
                                        <input type="text" value="{{ $bike->dateOfPurchase }}" disabled
                                            class="form-control">
                                    </div>
                                    <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                        <label>Place of Purchase</label>
                                        <input type="text" value="{{ $bike->placeOfPurchase }}" disabled
                                            class="form-control">
                                    </div>
                                    <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                        <label>Cost Of Bike</label>
                                        <input type="text" value="{{ $bike->cost }}" disabled class="form-control">
                                    </div>
                                    <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                        <label>Branding Cost</label>
                                        <input type="text" value="{{ $bike->brandingCost }}" disabled class="form-control">
                                    </div>
                                    @if ($bike->arkRegDate)
                                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                            <label>Ark Registration Date</label>
                                            <input type="text" value="{{ $bike->arkRegDate }}" disabled
                                                class="form-control">
                                        </div>
                                    @endif
                                    @if ($bike->nipostRegDate)
                                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                            <label>Nipost Registration Date</label>
                                            <input type="text" value="{{ $bike->nipostRegDate }}" disabled
                                                class="form-control">
                                        </div>
                                    @endif
                                    @if ($bike->lasaaRegDate)
                                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                            <label>LASAA Registration Date</label>
                                            <input type="text" value="{{ $bike->lasaaRegDate }}" disabled
                                                class="form-control">
                                        </div>
                                    @endif
                                    @if ($bike->motRegDate)
                                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                            <label>MOT Registration Date</label>
                                            <input type="text" value="{{ $bike->motRegDate }}" disabled
                                                class="form-control">
                                        </div>
                                    @endif
                                    @if ($bike->licenseRegDate)
                                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                            <label>Vehicle License Registration Date</label>
                                            <input type="text" value="{{ $bike->licenseRegDate }}" disabled
                                                class="form-control">
                                        </div>
                                    @endif
                                    @if ($bike->hackneyRegDate)
                                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                            <label>hackney Permit Registration Date</label>
                                            <input type="text" value="{{ $bike->hackneyRegDate }}" disabled
                                                class="form-control">
                                        </div>
                                    @endif
                                    @if ($bike->lgaRegDate)
                                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                            <label>LGA Paper Registration Date</label>
                                            <input type="text" value="{{ $bike->lgaRegDate }}" disabled
                                                class="form-control">
                                        </div>
                                    @endif
                                    @if ($bike->lagosRegDate)
                                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                            <label>Road Worthiness Lagos Registration Date</label>
                                            <input type="text" value="{{ $bike->lagosRegDate }}" disabled
                                                class="form-control">
                                        </div>
                                    @endif
                                    @if ($bike->ogunRegDate)
                                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                            <label>Road Worthiness Ogun Registration Date</label>
                                            <input type="text" value="{{ $bike->ogunRegDate }}" disabled
                                                class="form-control">
                                        </div>
                                    @endif
                                    @if ($bike->lasaaStickerRegDate)
                                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                            <label>Lasaa Sticker Registration Date</label>
                                            <input type="text" value="{{ $bike->lasaaStickerRegDate }}" disabled
                                                class="form-control">
                                        </div>
                                    @endif
                                    @if ($bike->freightRegDate)
                                        <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                            <label>National freight and haulage Registration Date</label>
                                            <input type="text" value="{{ $bike->freightRegDate }}" disabled
                                                class="form-control">
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-danger" type="reset" onclick="history.back();">Cancel</button>
                                <a href="/bike-uploads/{{ $bike->uuid }}" class="btn btn-primary mr-1" type="button">View
                                    Uploaded Files</a>
                                <a href="/edit-bike/{{ $bike->uuid }}" class="btn btn-success mr-1" type="button">Edit
                                    Bike</a>
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
@endsection
