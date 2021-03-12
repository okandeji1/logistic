@extends('layouts.page')
@section('content')
    <style>
        .profile-pic:hover .edit {
            /* display: block; */
            opacity: 1;
        }

        .edit {
            padding-top: 7px;
            padding-right: 7px;
            text-align: center;
            background-color: red;
            opacity: 0;
            transition: .3s ease;

        }

        .edit a {
            color: white;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            text-align: center;
            margin: .5rem
        }

    </style>
    <div class="d-flex flex-column justify-content-center align-items-center">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center" style="margin-top: 7rem">
            @if ($bike->arkUpload)
                <div class="d-flex flex-column mx-4">
                    <h5 class="text-center">Ark Uploaded file</h5>
                    <div class="profile-pic">
                        <img src="/storage/{{ $bike->arkUpload }}" class="" width="400" height="400"
                            alt="Ark uploaded file">
                        <div class="edit">
                            <a href="/storage/{{ $bike->arkUpload }}" title="View"><i class="fa fa-eye"></i></a>
                            <a href="/storage/{{ $bike->arkUpload }}" title="Download"
                                download="{{ $bike->rider->fullname }} Ark Insurance"><i
                                    class="fa fa-file-download"></i></a>
                        </div>
                    </div>
                </div>
            @endif
            @if ($bike->nipostUpload)
                <div class="d-flex flex-column">
                    <h5 class="text-center">Nipost Uploaded file</h5>
                    <div class="profile-pic">
                        <img src="/storage/{{ $bike->nipostUpload }}" class="" width="400" height="400"
                            alt="Nipost uploaded file">
                        <div class="edit">
                            <a href="/storage/{{ $bike->nipostUpload }}" title="View"><i class="fa fa-eye"></i></a>
                            <a href="/storage/{{ $bike->nipostUpload }}" title="Download"
                                download="{{ $bike->rider->fullname }} Nipost"><i class="fa fa-file-download"></i></a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
            @if ($bike->lasaaUpload)
                <div class="d-flex flex-column mx-4 mt-2">
                    <h5 class="text-center">Lasaa Uploaded file</h5>
                    <div class="profile-pic">
                        <img src="/storage/{{ $bike->lasaaUpload }}" class="" width="400" height="400"
                            alt="Lasaa uploaded file">
                        <div class="edit">
                            <a href="/storage/{{ $bike->lasaaUpload }}" title="View"><i class="fa fa-eye"></i></a>
                            <a href="/storage/{{ $bike->lasaaUpload }}" download="{{ $bike->rider->fullname }} LASAA"
                                title="Download"><i class="fa fa-file-download"></i></a>
                        </div>
                    </div>
                </div>
            @endif
            @if ($bike->motUpload)
                <div class="d-flex flex-column">
                    <h5 class="text-center">MOT Uploaded file</h5>
                    <div class="profile-pic">
                        <img src="/storage/{{ $bike->motUpload }}" class="" width="400" height="400"
                            alt="MOT uploaded file">
                        <div class="edit">
                            <a href="/storage/{{ $bike->motUpload }}" title="View"><i class="fa fa-eye"></i></a>
                            <a href="/storage/{{ $bike->motUpload }}" download="{{ $bike->rider->fullname }} MOT"
                                title="Download"><i class="fa fa-file-download"></i></a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
            @if ($bike->licenseUpload)
                <div class="d-flex flex-column mx-4 mt-2">
                    <h5 class="text-center">Vehicle License</h5>
                    <div class="profile-pic">
                        <img src="/storage/{{ $bike->licenseUpload }}" class="" width="400" height="400"
                            alt="Vehicle License uploaded file">
                        <div class="edit">
                            <a href="/storage/{{ $bike->licenseUpload }}" title="View"><i class="fa fa-eye"></i></a>
                            <a href="/storage/{{ $bike->licenseUpload }}"
                                download="{{ $bike->rider->fullname }} Vehicle License" title="Download"><i
                                    class="fa fa-file-download"></i></a>
                        </div>
                    </div>
                </div>
            @endif
            @if ($bike->hackneyUpload)
                <div class="d-flex flex-column">
                    <h5 class="text-center">Hackney Permit</h5>
                    <div class="profile-pic">
                        <img src="/storage/{{ $bike->hackneyUpload }}" class="" width="400" height="400"
                            alt="Hackney Permit uploaded file">
                        <div class="edit">
                            <a href="/storage/{{ $bike->hackneyUpload }}" title="View"><i class="fa fa-eye"></i></a>
                            <a href="/storage/{{ $bike->hackneyUpload }}"
                                download="{{ $bike->rider->fullname }} Hackney Permit" title="Download"><i
                                    class="fa fa-file-download"></i></a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
            @if ($bike->lgaUpload)
                <div class="d-flex flex-column mx-4 mt-2">
                    <h5 class="text-center">LGA Paper</h5>
                    <div class="profile-pic">
                        <img src="/storage/{{ $bike->lgaUpload }}" class="" width="400" height="400"
                            alt="LGA Paper uploaded file">
                        <div class="edit">
                            <a href="/storage/{{ $bike->lgaUpload }}" title="View"><i class="fa fa-eye"></i></a>
                            <a href="/storage/{{ $bike->lgaUpload }}" download="{{ $bike->rider->fullname }} LGA Paper"
                                title="Download"><i class="fa fa-file-download"></i></a>
                        </div>
                    </div>
                </div>
            @endif
            @if ($bike->lagosUpload)
                <div class="d-flex flex-column">
                    <h5 class="text-center">Road Worthiness Lagos Uploaded file</h5>
                    <div class="profile-pic">
                        <img src="/storage/{{ $bike->lagosUpload }}" class="" width="400" height="400"
                            alt="Road Worthiness Lagos uploaded file">
                        <div class="edit">
                            <a href="/storage/{{ $bike->lagosUpload }}" title="View"><i class="fa fa-eye"></i></a>
                            <a href="/storage/{{ $bike->lagosUpload }}"
                                download="{{ $bike->rider->fullname }} Road Worthiness Lagos" title="Download"><i
                                    class="fa fa-file-download"></i></a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="d-flex flex-column flex-md-row">
            @if ($bike->ogunUpload)
                <div class="d-flex flex-column">
                    <h5 class="text-center">Road Worthiness Ogun Uploaded file</h5>
                    <div class="profile-pic">
                        <img src="/storage/{{ $bike->ogunUpload }}" class="" width="400" height="400"
                            alt="Road Worthiness Ogun uploaded file">
                        <div class="edit">
                            <a href="/storage/{{ $bike->ogunUpload }}" title="View"><i class="fa fa-eye"></i></a>
                            <a href="/storage/{{ $bike->ogunUpload }}"
                                download="{{ $bike->rider->fullname }} Road Worthiness Ogun" title="Download"><i
                                    class="fa fa-file-download"></i></a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="d-flex flex-column flex-md-row">
            @if ($bike->lasaaStickerUpload)
                <div class="d-flex flex-column">
                    <h5 class="text-center">lasaa sticker Uploaded file</h5>
                    <div class="profile-pic">
                        <img src="/storage/{{ $bike->lasaaStickerUpload }}" class="" width="400" height="400"
                            alt="lasaa sticker uploaded file">
                        <div class="edit">
                            <a href="/storage/{{ $bike->lasaaStickerUpload }}" title="View"><i class="fa fa-eye"></i></a>
                            <a href="/storage/{{ $bike->lasaaStickerUpload }}"
                                download="{{ $bike->rider->fullname }} lasaa sticker" title="Download"><i
                                    class="fa fa-file-download"></i></a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="d-flex flex-column flex-md-row">
            @if ($bike->freightUpload)
                <div class="d-flex flex-column">
                    <h5 class="text-center">National freight and haulage Uploaded file</h5>
                    <div class="profile-pic">
                        <img src="/storage/{{ $bike->freightUpload }}" class="" width="400" height="400"
                            alt="National freight and haulage uploaded file">
                        <div class="edit">
                            <a href="/storage/{{ $bike->freightUpload }}" title="View"><i class="fa fa-eye"></i></a>
                            <a href="/storage/{{ $bike->freightUpload }}"
                                download="{{ $bike->rider->fullname }} National freight and haulage" title="Download"><i
                                    class="fa fa-file-download"></i></a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    {{-- Page load modal --}}
    <div id="pageLoad" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <img src="{{ asset('site/images/promo1.jpeg') }}" width="700" height="400">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
