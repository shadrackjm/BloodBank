@extends('layouts/admin-layout')

@section('main-section')
<div class="pagetitle">
      <h1>Users</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
          <li class="breadcrumb-item active">Users</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
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
                  <h5 class="card-title">Manage Users</h5>

                  <table class="table table-sm table-bordered">
                    <thead>

                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Emails</th>
                        <th scope="col">Roles</th>
                        <th scope="col">Registration Date</th>
                        <th scope="col">Status</th>
                        <th colspan="2">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                       @if (count($all_users) > 0)
                          @foreach ($all_users as $item)
                              <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                @if ($item->role == 0)
                                    <td>Donor</td>
                                @endif
                                 @if ($item->role == 1)
                                    <td>Admin</td>
                                @endif
                                 @if ($item->role == 2)
                                    <td>Blood bank</td>
                                @endif
                                <td>{{$item->created_at}}</td>
                                 @if ($item->status == 0)
                                  <td><span class="badge bg-danger">inactive</span></td>
                                @endif
                                 @if ($item->status == 1)
                                  <td><span class="badge bg-success">active</span></td>
                                @endif
                                <td><a href="/admin/edit/user/{{$item->id}}" class="btn btn-primary btn-sm">Edit</a></td>
                                <td><a href="/admin/delete/user/{{$item->id}}" onclick="return confirm('Are you sure you want to delete this?')" class="btn btn-danger btn-sm">Delete</a></td>
                              </tr>
                          @endforeach
                      @else
                          <tr>
                            <td>No data found!</td>
                          </tr>
                      @endif

                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->
    </section>
@endsection
