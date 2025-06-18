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
                            {{ __('Plans') }}
                        </h2>
                    </div>
                    <!-- Add plan -->
                    <div class="col-auto ms-auto d-print-none">
                        <a type="button" href="{{ route('admin.add.plan') }}" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24"
                                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                            {{ __('Add Plan') }}
                        </a>
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
                    <div class="col-sm-12 col-lg-12">
                        <div class="card">

                            {{-- Plans --}}
                            <div class="table-responsive">
                                <table class="table table-vcenter card-table" id="table">
                                    <thead>
                                        <tr>
                                            <th>{{ __('S.No') }}</th>
                                            <th>{{ __('Plan Name') }}</th>
                                            <th>{{ __('Plan Price') }}</th>
                                            <th>{{ __('Plan Validity') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th class="w-1">{{ __('Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($plans as $plan)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ __($plan->plan_name) }}</td>
                                                <td class="">
                                                    @if ($plan->plan_price == 0)
                                                        {{ __('Free') }}
                                                    @else
                                                        {{ $currencies[0]->currency }}{{ $plan->plan_price }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($plan->validity == '9999')
                                                        {{ __('Forever') }}
                                                    @endif
                                                    @if ($plan->validity == '31')
                                                        {{ __('Monthly') }}</span>
                                                    @endif
                                                    @if ($plan->validity == '366')
                                                        {{ __('Yearly') }}</span>
                                                    @endif
                                                    @if ($plan->validity >= '1' && $plan->validity != '31' && $plan->validity != '366' && $plan->validity != '9999')
                                                        {{ $plan->validity . ' ' . __('Days') }}
                                                    @endif
                                                </td>
                                                <td class="text-muted">
                                                    @if ($plan->status == 0)
                                                        <span
                                                            class="badge bg-red text-white">{{ __('Discontinued') }}</span>
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
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.edit.plan', $plan->id) }}">{{ __('Edit') }}</a>
                                                            @if ($plan->status == 0)
                                                                <a class="dropdown-item" href="#"
                                                                    onclick="getPlan('{{ $plan->id }}'); return false;">{{ __('Activate') }}</a>
                                                            @else
                                                                <a class="dropdown-item" href="#"
                                                                    onclick="getPlan('{{ $plan->id }}'); return false;">{{ __('Deactivate') }}</a>
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

    {{-- Delete Plan Modal --}}
    <div class="modal modal-blur fade" id="delete-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-title">{{ __('Are you sure?') }}</div>
                    <div>{{ __('If you proceed, you will active/deactivate this plan data.') }}</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary me-auto"
                        data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                    <a class="btn btn-danger" id="plan_id">{{ __('Yes, proceed') }}</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Custom JS --}}
@section('custom-js')
    <script>
        function getPlan(parameter) {
            "use strict";
            $("#delete-modal").modal("show");
            var link = document.getElementById("plan_id");
            link.getAttribute("href");
            link.setAttribute("href", "{{ route('admin.delete.plan') }}?id=" + parameter);
        }
    </script>
@endsection
@endsection
