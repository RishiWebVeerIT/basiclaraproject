@extends('layouts.admin')
@section('section')

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">

        <!-- Sales Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card sales-card">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Enquiry <span>| Today</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                  <a href="{{Route('admin.enquiry')}}"><h6>{{$total_enquiry}}</h6></a>
                  <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">{{Session::get('UserName');}}</span> -->

                </div>
              </div>
            </div>

          </div>
        </div><!-- End Sales Card -->

        <!-- Revenue Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card revenue-card">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Revenue <span>| This Month</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-currency-dollar"></i>
                </div>
                <div class="ps-3">
                  <h6>₹ {{number_format($Total_revenue,2)}}</h6>
                  <!-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                </div>
              </div>
            </div>

          </div>
        </div><!-- End Revenue Card -->

        <!-- Customers Card -->
        <div class="col-xxl-4 col-xl-12">

          <div class="card info-card customers-card">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Members<span>| This Year</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                  <a href="{{Route('admin.all_member')}}"><h6>{{$totalMembers}}</h6></a>
                  <!-- <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span> -->

                </div>
              </div>

            </div>
          </div>

        </div><!-- End Customers Card -->



        <!-- Recent Sales -->
        <div class="col-12">
          <div class="card recent-sales overflow-auto">

            <div class="card-body">
              <h5 class="card-title">Upcoming Expiries</h5>

              <table class="table table-borderless datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Member</th>
                    <th scope="col">Plan</th>
                    <th scope="col">Due Date</th>
                    <th scope="col">Expired in</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  @foreach($accounts as $a)
                  <?php
                  $date1=date_create($a->join_date);
                  $date2=date_create($a->due_date);
                  $diff=date_diff($date1,$date2);
                  $days =  $diff->format("%a");
                  ?>

                @if(($days > 0) && ($days <= 10))
                  <tr>
                    <th scope="row"><a href="#">{{$i++}}</a></th>
                    <td>{{$a->name}}</td>
                    <td>{{$a->package}}</td>
                    <td>{{$a->due_date}}</td>
                    <td>{{$days}} Days</td>
                  </tr>
                  @endif
                  @endforeach
                </tbody>
              </table>

            </div>

          </div>
        </div><!-- End Recent Sales -->

                <!-- Reports -->
                <div class="col-12">
          <div class="card">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Members Statistics <span>/2024</span></h5>

              <!-- Line Chart -->
              <div id="reportsChart"></div>

              <!-- End Line Chart -->

            </div>

          </div>
        </div><!-- End Reports -->


      </div>
    </div><!-- End Left side columns -->



  </div>
</section>

@endsection

@push('script')
<script>
          document.addEventListener("DOMContentLoaded", () => {

                  $.ajax({
            url: '{{ route('admin.get_dashbord_data') }}',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
      console.log(data.months);
              new ApexCharts(document.querySelector("#reportsChart"), {
                    series: [{
                      name: 'Female',
                      data: data.girls,
                    }, {
                      name: 'Male',
                      data: data.boys,
                    }, {
                      name: 'Other',
                      data: data.other,
                    }],
                    chart: {
                      height: 350,
                      type: 'area',
                      toolbar: {
                        show: true
                      },
                      zoom: {
                        enabled: false
                      },
                    },
                    colors: ['#4154f1', '#2eca6a','#ffc107'],
                    fill: {
                      type: "gradient",
                      gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.3,
                        opacityTo: 0.4,
                        stops: [0, 90, 100]
                      }
                    },
                    dataLabels: {
                      enabled: true
                    },
                    stroke: {
                      curve: 'smooth',
                      width: 2
                    },
                    xaxis: {
                      categories: data.months,
                    },


                  }).render();
            },
            error: function(xhr) {
                console.error(xhr.responseText);
            }
        });

                });
              </script>
@endpush
