@extends('layouts/blood-bank-layout')
@section('main-section')
       <div class="pagetitle">
      <h1>Donations</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/blood-bank/home">Home</a></li>
          <li class="breadcrumb-item active">Donations</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
            @if (Session::has('success'))
            <div class="alert alert-success p-2">{{Session::get('success')}}</div>
            @endif
            @if (Session::has('fail'))
                <div class="alert alert-danger p-2">{{Session::get('fail')}}</div>
            @endif
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
                  <h5 class="card-title">Donations</h5>

                  <table class="table table-sm table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Donor Name</th>
                        <th scope="col">Age</th>
                        <th scope="col">Blood Group</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Last Donation</th>
                        <th scope="col">Next Donation</th>
                        <th scope="col">Status</th>
                        <th scope="col" >Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if (count($all_donors) > 0)
                          @foreach ($all_donors as $item)
                              <tr>
                                <th scope="row"><a href="#">{{$loop->iteration}}</a></th>
                                <td>{{$item->name}}</td>
                                <td>{{$item->age}}</td>
                                <td>{{$item->blood_group}}</td>
                                <td>{{$item->phone}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->address}}</td>
                                <td></td>
                                <td></td>
                                <td>@if ($item->status == 1)
                                     <span class="badge bg-danger">inactive</span>
                                @endif
                                @if ($item->status == 0)
                                <span class="badge bg-success">active</span></td>
                                @endif
                                <td><a href="/admin/edit-donor/{{$item->id}}" class="btn btn-primary btn-sm">Add Donation</a></td>
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