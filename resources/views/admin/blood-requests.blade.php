@extends('layouts/admin-layout')
@section('main-section')
       <div class="pagetitle">
      <h1>Blood Requests</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/blood-bank/home">Home</a></li>
          <li class="breadcrumb-item active">All Blood Requests</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

      {{-- all recent donations --}}
      <!-- Recent Sales -->
            <div class="col-12">
                @if (Session::has('success'))
                      <div class="alert alert-success p-2">{{Session::get('success')}}</div>
                      @endif
                      @if (Session::has('fail'))
                          <div class="alert alert-danger p-2">{{Session::get('fail')}}</div>
                      @endif
              <div class="card recent-sales overflow-auto">
                <div class="card-header">


                  <h5 class="card-title">Blood Requests <a href="load-request-form" class="btn btn-success btn-sm mx-3 float-end">add new</a></h5>
                </div>
                <div class="card-body">
                  <table class="table table-sm table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Patient Name</th>
                        <th scope="col">Blood Group</th>
                        <th scope="col">Amount (ml)</th>
                        <th scope="col">Price</th>
                        <th scope="col">Status</th>
                        <th scope="col">Request Date</th>
                        <th scope="col" colspan="3" class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if (count($request_details) > 0)
                          @foreach ($request_details as $item)
                              <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$item->Name}}</td>
                                <td>{{$item->blood_group}}</td>
                                <td>{{$item->amount}}</td>
                                <td>{{$item->price}}</td>
                                <td>@if ($item->status == 1)
                                     <span class="badge bg-success">approved</span>
                                @endif
                                @if ($item->status == 0)
                                  <span class="badge bg-warning">pending</span></td>
                                @endif
                                @if ($item->status == 2)
                                  <span class="badge bg-danger">failed</span></td>
                                @endif
                                <td>{{$item->created_at}}</td>
                                <td><a href="/admin/edit/{{$item->id}}" class="btn btn-primary btn-sm">Edit</a></td>
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
