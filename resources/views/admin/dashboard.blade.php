@extends('layouts/admin-layout')

@section('main-section')
<div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
                <a href="/admin/donor/list">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Donor List</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$donorCount}}</h6>

                    </div>
                  </div>
                </div>

              </div>
              </a>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
                <a href="/blood-requests">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">Total Blood Requests</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-card-checklist"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$bloodRequest}}</h6>

                    </div>
                  </div>
                </div>

              </div>
              </a>
            </div><!-- End Revenue Card -->

            <!-- Reports -->
            {{-- <div class="col-12">
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
                </div> --}}

                {{-- <div class="card-body">
                  <h5 class="card-title">Reports <span>/Today</span></h5>

                  <!-- Line Chart -->
                  <div id="reportsChart"></div>

                  <script>
                    // document.addEventListener("DOMContentLoaded", () => {
                    //   new ApexCharts(document.querySelector("#reportsChart"), {
                    //     series: [{
                    //       name: 'Sales',
                    //       data: [31, 40, 28, 51, 42, 82, 56],
                    //     }, {
                    //       name: 'Revenue',
                    //       data: [11, 32, 45, 32, 34, 52, 41]
                    //     }, {
                    //       name: 'Customers',
                    //       data: [15, 11, 32, 18, 9, 24, 11]
                    //     }],
                    //     chart: {
                    //       height: 350,
                    //       type: 'area',
                    //       toolbar: {
                    //         show: false
                    //       },
                    //     },
                    //     markers: {
                    //       size: 4
                    //     },
                    //     colors: ['#4154f1', '#2eca6a', '#ff771d'],
                    //     fill: {
                    //       type: "gradient",
                    //       gradient: {
                    //         shadeIntensity: 1,
                    //         opacityFrom: 0.3,
                    //         opacityTo: 0.4,
                    //         stops: [0, 90, 100]
                    //       }
                    //     },
                    //     dataLabels: {
                    //       enabled: false
                    //     },
                    //     stroke: {
                    //       curve: 'smooth',
                    //       width: 2
                    //     },
                    //     xaxis: {
                    //       type: 'datetime',
                    //       categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                    //     },
                    //     tooltip: {
                    //       x: {
                    //         format: 'dd/MM/yy HH:mm'
                    //       },
                    //     }
                    //   }).render();
                    // });
                  </script>

                
                </div>--}}

              </div> 
            </div>
          </div>
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
                <a href="/blood-groups">
              <div class="card info-card customers-card">
                <div class="card-body">
                  <h5 class="card-title">Blood Groups</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-droplet-fill"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$bloodGroupsCount}}</h6>

                    </div>
                  </div>
                </div>

              </div>
              </a>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
                <a href="/blood-bank">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">Blood Banks</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-bank2"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$bloodBankCount}}</h6>

                    </div>
                  </div>
                </div>

              </div>
              </a>
            </div><!-- End Revenue Card -->

            <!-- Reports -->
            {{-- <div class="col-12">
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
                </div> --}}

                {{-- <div class="card-body">
                  <h5 class="card-title">Reports <span>/Today</span></h5>

                  <!-- Line Chart -->
                  <div id="reportsChart"></div>

                  <script>
                    // document.addEventListener("DOMContentLoaded", () => {
                    //   new ApexCharts(document.querySelector("#reportsChart"), {
                    //     series: [{
                    //       name: 'Sales',
                    //       data: [31, 40, 28, 51, 42, 82, 56],
                    //     }, {
                    //       name: 'Revenue',
                    //       data: [11, 32, 45, 32, 34, 52, 41]
                    //     }, {
                    //       name: 'Customers',
                    //       data: [15, 11, 32, 18, 9, 24, 11]
                    //     }],
                    //     chart: {
                    //       height: 350,
                    //       type: 'area',
                    //       toolbar: {
                    //         show: false
                    //       },
                    //     },
                    //     markers: {
                    //       size: 4
                    //     },
                    //     colors: ['#4154f1', '#2eca6a', '#ff771d'],
                    //     fill: {
                    //       type: "gradient",
                    //       gradient: {
                    //         shadeIntensity: 1,
                    //         opacityFrom: 0.3,
                    //         opacityTo: 0.4,
                    //         stops: [0, 90, 100]
                    //       }
                    //     },
                    //     dataLabels: {
                    //       enabled: false
                    //     },
                    //     stroke: {
                    //       curve: 'smooth',
                    //       width: 2
                    //     },
                    //     xaxis: {
                    //       type: 'datetime',
                    //       categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                    //     },
                    //     tooltip: {
                    //       x: {
                    //         format: 'dd/MM/yy HH:mm'
                    //       },
                    //     }
                    //   }).render();
                    // });
                  </script>

                
                </div>--}}

              </div> 
            </div>

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">This Week</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Recent Blood Requests <span>| Week</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Patient Name</th>
                        <th scope="col">Blood Group</th>
                        <th scope="col">Request Date</th>
                        <th scope="col">Blood Bank</th>
                        <th scope="col">Price</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row"><a href="#">#2457</a></th>
                        <td>Brandon Jacob</td>
                        <td><a href="#" class="text-primary">At praesentium minu</a></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><span class="badge bg-success">Approved</span></td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2147</a></th>
                        <td>Bridie Kessler</td>
                        <td><a href="#" class="text-primary">Blanditiis dolor omnis similique</a></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><span class="badge bg-warning">Pending</span></td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2049</a></th>
                        <td>Ashleigh Langosh</td>
                        <td><a href="#" class="text-primary">At recusandae consectetur</a></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><span class="badge bg-success">Approved</span></td>
                      </tr>
                      
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->

          </div>
        </div><!-- End Left side columns -->
        

      </div>
    </section>
@endsection
