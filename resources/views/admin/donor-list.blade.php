@extends('layouts/admin-layout')

@section('main-section')
<div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Donor List</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
       <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                  <a href="/load-add-donor" class="btn btn-success btn-sm mx-3">add new</a>
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
                  <h5 class="card-title">Donor List</h5>

                  <table class="table table-sm table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Donor Name</th>
                        <th scope="col">Age</th>
                        <th scope="col">Blood Group</th>
                        <th scope="col">Last Donation</th>
                        <th scope="col">Next Donation</th>
                        <th scope="col">Status</th>
                        <th scope="col" colspan="2">Actions</th>
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
                                <td></td>
                                <td></td>
                                <td><span class="badge bg-success">Approved</span></td>
                                <td><a href="/edit-donor/{{$item->id}}" class="btn btn-primary btn-sm">Edit</a></td>
                                <td><a href="/delete-donor/{{$item->id}}" onclick="return confirm('are you sure you want to delete?')" class="btn btn-danger btn-sm">Delete</a></td>
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