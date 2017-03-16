<!-- @extends('layouts.app') -->

@section('title', $hospital->hospitalid)

@php
  $link = '/hospital/'.$hospital->id
@endphp

@section('content')
  <div class="container">
    <h1 class="title is-1">{{ $hospital->hospitaldescription }}</h1>
    <h1 class="subtitle">
      {{ $hospital->hospitalid }}
      <span class="tag is-success">{{ $hospital->status }}</span>
    </h1>
    <div class="columns hospital-menu">
      <div class="column">
        <div class="box has-text-centered">
          <img src="/img/patient-male.png" alt="">
          <a href="{{ $link }}/patients">Patients</a>
        </div>
      </div>
      <div class="column">
        <div class="box has-text-centered">
          <img src="/img/inventory.jpg" alt="">
          <a href="{{ $link }}/inventory">Inventory</a>
        </div>
      </div>
      <div class="column">
        <div class="box has-text-centered">
          <img src="/img/payment.png" alt="">
          <a href="{{ $link }}/payments">Payments</a>
        </div>
      </div>
      <div class="column">
        <div class="box has-text-centered">
          <img src="/img/doctor.png" alt="">
          <a href="{{ $link }}/doctors">Doctors</a>
        </div>
      </div>
      <div class="column">
        <div class="box has-text-centered">
          <img src="/img/nurse.png" alt="">
          <a href="{{ $link }}/nurses">Nurses</a>
        </div>
      </div>
    </div>
    <section class="section">
      <h2 class="is-title is-2">Stats</h2>
      <canvas id="patientChart" width="300" height="100"></canvas>
    </section>
  </div>

@endsection

@push('scripts')
<script src="/bower_components/chart.js/dist/Chart.min.js"></script>
<script>
  $(document).ready( function() {
    var ctx = 'patientChart';
    var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [
          '02/01','02/02','02/03','02/04','02/05','02/06','02/07','02/08',
          '02/09','02/10','02/11','02/12','02/13'
        ],
        datasets: [{
          label: '# of patients per day. (February)',
          data: [12, 19, 9, 10, 2, 8, 12, 19, 6, 8, 9, 6, 12 , 4, 10],
          backgroundColor: [
              'rgba(99, 255, 115, 0.41)',
          ],
          borderColor: [
              'rgba(70, 207, 76, 1)',
          ],
          borderWidth: 1
        }]
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero:true
                  }
              }]
          }
      }
    });
    $('.hospital-menu .box').on('click', function() {
      window.location.href = $(this).find('a').attr('href');
    });
  });
</script>
@endpush
