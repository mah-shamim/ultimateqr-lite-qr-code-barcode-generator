@extends('admin.layouts.app')

@section('content')
    <div class="page-wrapper">
        <div class="container-xl">
            <!-- Page title -->
            <div class="page-header d-print-none">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="page-pretitle">
                            {{ __('Overview') }}
                        </div>
                        <h2 class="page-title">
                            {{ __('Payment Methods') }}
                        </h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-body">
            <div class="container-xl">

                {{-- Failed --}}
                @if (Session::has('failed'))
                    <div class="alert alert-important alert-danger alert-dismissible" role="alert">
                        <div class="d-flex">
                            <div>
                                {{ Session::get('failed') }}
                            </div>
                        </div>
                        <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
                    </div>
                @endif

                {{-- Success --}}
                @if (Session::has('success'))
                    <div class="alert alert-important alert-success alert-dismissible" role="alert">
                        <div class="d-flex">
                            <div>
                                {{ Session::get('success') }}
                            </div>
                        </div>
                        <a class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="close"></a>
                    </div>
                @endif

                <div class="row row-deck row-cards">
                    {{-- Payment methods --}}
                    <div class="col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="table-responsive">
                                <table class="table table-vcenter card-table" id="table">
                                    <thead>
                                        <tr>
                                            <th>{{ __('#') }}</th>
                                            <th>{{ __('Payment Method') }}</th>
                                            <th>{{ __('Installed') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th class="w-1">{{ __('Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($payment_methods as $payment_method)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <div class="d-flex py-1 align-items-center">
                                                        <img src="" alt="">
                                                        <span class="avatar me-2"
                                                            style="background-image: url({{ asset($payment_method->payment_gateway_logo) }})"></span>
                                                        <div class="flex-fill">
                                                            <div class="font-weight-medium">
                                                                {{ __($payment_method->payment_gateway_name) }}</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="">
                                                    @if ($payment_method->is_status == 'disabled')
                                                        {{ __('Not Installed Yet') }}
                                                    @else
                                                        {{ __('Installed') }}
                                                    @endif
                                                </td>
                                                <td class="">
                                                    @if ($payment_method->status == 0)
                                                        <span class="badge bg-red text-white">{{ __('Inactive') }}</span>
                                                    @else
                                                        <span class="badge bg-green text-white">{{ __('Active') }}</span>
                                                    @endif
                                                </td>
                                                <td class="text-start">
                                                    <span class="dropdown">
                                                        <button class="btn dropdown-toggle align-text-top small-btn"
                                                            data-bs-boundary="viewport" data-bs-toggle="dropdown"
                                                            aria-expanded="false">{{ __('Actions') }}</button>
                                                        <div class="dropdown-menu dropdown-menu-end" style="">
                                                            @if ($payment_method->status == 0)
                                                                <a class="dropdown-item" href="#"
                                                                    onclick="getPaymentMethod('{{ $payment_method->id }}'); return false;">{{ __('Activate') }}</a>
                                                            @else
                                                                <a class="dropdown-item" href="#"
                                                                    onclick="getPaymentMethod('{{ $payment_method->id }}'); return false;">{{ __('Deactivate') }}</a>
                                                            @endif
                                                        </div>
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Footer --}}
        @include('admin.includes.footer')
    </div>

    {{-- Payment gateway modal --}}
    <div class="modal modal-blur fade" id="delete-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-title">{{ __('Are you sure?') }}</div>
                    <div>{{ __('If you proceed, you will active/deactivate this payment method data.') }}</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary me-auto"
                        data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                    <a class="btn btn-danger" id="payment_gateway_id">{{ __('Yes, proceed') }}</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Custom JS --}}
@section('custom-js')
    <script>
        function getPaymentMethod(parameter) {
            "use strict";
            $("#delete-modal").modal("show");
            var link = document.getElementById("payment_gateway_id");
            link.getAttribute("href");
            link.setAttribute("href", "/admin/delete-payment-method?id=" + parameter);
        }
    </script>
@endsection
@endsection
