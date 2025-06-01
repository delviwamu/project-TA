@extends('layouts.app')

@section('additionalHeadScripts')
    <!-- ApexChart JS -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
@endsection

@section('content')

        <!-- main content -->
        <div class="container">
            <div class="page-inner">

                <x-page-header 
                    :pageTitle="$pageTitle" 
                    :pageDescription="$pageDescription" 
                />

                <div class="page-category">

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <p class="fs-1">Selamat datang!</p>
                                    <p class="fs-4 text-muted">{{ $siteDescription }}</p>
                                    <p class="fs-4 text-muted">
                                        <img src="{{ asset($siteLogo) }}" class="w-25 rounded-circle" />
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- .row end -->


                </div>

            </div>
            <!-- end page-inner -->
        </div>
        <!-- end container -->

@stop

@push('scripts')



@endpush
