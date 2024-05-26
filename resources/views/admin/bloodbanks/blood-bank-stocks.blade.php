@extends('layouts/admin-layout')

@section('main-section')
<div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Blood Bank Stocks</li>
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
                    <a href="load-blood-bank-stock-form" class="btn btn-success btn-sm mx-3">add new</a>
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
                     
                  <h5 class="card-title">Blood Bank Stocks</h5>

                  <table class="table table-sm table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Blood bank name</th>
                        <th scope="col">address</th>
                        <th scope="col">Blood Group</th>
                        <th scope="col">stock amount</th>
                        <th scope="col" colspan="2">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if (count($all_bloodBanks) > 0)
                          @foreach ($all_bloodBanks as $item)
                              <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$item->name}}</td>
                                <td>{{$item->address}}</td>
                                <td>{{$item->group_name}}</td>
                                <td>{{$item->amount}}</td>
                               <td><a class="btn btn-primary btn-sm" href="/edit-blood-bank-stock/{{$item->id}}">Edit</a></td>
                                <td><a class="btn btn-danger btn-sm" href="/delete-blood-bank-stock/{{$item->id}}" onclick="return confirm('Are you sure you want to delete?')" >Delete</a></td>
                              </tr>
                          @endforeach
                      @else
                          <tr>
                            <td colspan="6">No data found!</td>
                          </tr>
                      @endif
                      
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->
    </section>
@endsection