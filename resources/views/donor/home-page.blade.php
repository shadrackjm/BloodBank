@extends('layouts/donor-layout')
@section('main-section')
       <div class="pagetitle">
      <h1>Home</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/donor/home">Donors</a></li>
          <li class="breadcrumb-item active">Home</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        @if (Session::has('success'))
                      <div class="alert alert-success p-2">{{Session::get('success')}}</div>
                      @endif
                      @if (Session::has('fail'))
                          <div class="alert alert-danger p-2">{{Session::get('fail')}}</div>
                      @endif
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            @if (empty(auth()->user()->image))
              <img src="{{asset('images/blood-donor.jpg')}}" alt="Profile" class="rounded-circle">
            @else
              <img src="{{ Storage::url(auth()->user()->image) }}" alt="Profile" class="rounded-circle">
            @endif
              <h2>{{auth()->user()->name}}</h2>
              <h3>Donor</h3>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8">{{auth()->user()->name}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Role</div>
                    <div class="col-lg-9 col-md-8">Donor</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{auth()->user()->email}}</div>
                  </div>

                </div>

                

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
      {{-- all recent donations --}}
      <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-header">
                  <a href="/donor/all/donations" class="btn btn-success btn-sm mx-3 float-end">view all</a>
                  <h5 class="card-title">My Recent Donations </h5>

                </div>

                <div class="card-body">

                  <table class="table table-sm table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Donor Name</th>
                        <th scope="col">Last Donation</th>
                        <th scope="col">Next Donation</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if (count($my_donations) > 0)
                          @foreach ($my_donations as $item)
                              <tr>
                                <th scope="row"><a href="#">{{$loop->iteration}}</a></th>
                                <td>{{$item->name}}</td>
                                <td>{{$item->donation_date}}</td>
                                <td>{{$item->next_donation}}</td>
                                <td>@if ($item->status == 1)
                                     <span class="badge bg-danger">missed</span>
                                @endif
                                @if ($item->status == 0)
                                <span class="badge bg-success">donated</span></td>
                                @endif
                              </tr>
                          @endforeach
                      @else
                          <tr>
                            <td colspan="8">No data found!</td>
                          </tr>
                      @endif
                      
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->
    </section>
@endsection