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

                                    <div id="statistikCaseBerdasarkanBulan"></div>

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

<script>
    // Panggil data dari endpoint
    fetch('/statistik/api/case')
      .then(response => response.json())
      .then(data => {
        const bulan = [
          'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun',
          'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'
        ];

        // Ubah object response menjadi array sesuai urutan bulan
        const values = [];
        for (let i = 1; i <= 12; i++) {
          values.push(data[i] || 0);
        }

        const options = {
          chart: {
            type: 'bar',
            height: 350
          },
          series: [{
            name: 'Jumlah Kasus',
            data: values
          }],
          xaxis: {
            categories: bulan
          },
          title: {
            text: 'Statistik Kasus per Bulan - Tahun Ini',
            align: 'center'
          },
          dataLabels: {
            enabled: true
          }
        };

        const statistikCaseBerdasarkanBulan = new ApexCharts(document.querySelector("#statistikCaseBerdasarkanBulan"), options);
        statistikCaseBerdasarkanBulan.render();
      })
      .catch(error => console.error('Gagal mengambil data:', error));
  </script>

@endpush
