@extends('layouts/donor-layout')
@section('main-section')
       <div class="pagetitle">
      <h1>Home</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/donor/home">Donors</a></li>
          <li class="breadcrumb-item active">All Donations</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
{{-- resources/views/donor/all-donation.blade.php --}}
@extends('layouts/donor-layout')

@section('main-section')
    <div class="pagetitle">
        <h1>Home</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/donor/home">Donors</a></li>
                <li class="breadcrumb-item active">All Donations</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    {{-- All recent donations --}}
    <div class="col-12">
        <div class="card recent-sales overflow-auto">
            <div class="card-header">
                <h5 class="card-title">My Donations</h5>
            </div>
            <div class="card-body">
                <table class="table table-sm table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Donor Name</th>
                            <th scope="col">Donation_Date</th>
                            <th scope="col">Next Donation</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($my_donations) > 0)
                            @foreach ($my_donations as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->donation_date)->format('Y-m-d H:i:s') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->donation_date)->addMonths(6)->format('Y-m-d H:i:s') }}</td>
                                    <td>
                                        @if ($item->status == 1)
                                            <span class="badge bg-danger">missed</span>
                                        @else
                                            <span class="badge bg-success">donated</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5">No data found!</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- End Recent Sales -->
@endsection
