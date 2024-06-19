@extends('layouts/admin-layout')
@section('main-section')
    <div class="container">
         @if (Session::has('success'))
                      <div class="alert alert-success p-2">{{Session::get('success')}}</div>
                      @endif
                      @if (Session::has('fail'))
                          <div class="alert alert-danger p-2">{{Session::get('fail')}}</div>
                      @endif
        <div class="card">

            <div class="card-header">
                <h3 class="card-title">Add New Donor Bank</h3>
            </div>
            <div class="card-body">

                <form action="{{ route('admin.edit-donor')}}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{$donor->user_id}}">
                    <input type="hidden" name="donor_id" value="{{$donor->id}}">
                    <div class="form-group">
                        <label for="">Donor Full Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $donor->name }}">
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                     <div class="form-group">
                        <label for="">Donor Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $donor->email}}">
                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                     <div class="form-group">
                        <label for="">Gender</label>
                        <select name="gender" id="" class="form-select">
                            <option value="{{$donor->gender}}">{{$donor->gender}}</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                        </select>
                        @error('blood_group_id')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Blood Group</label>
                        <select name="blood_group_id" id="" class="form-select">
                            <option value="{{$donor->group_id}}">{{$donor->group_name}}</option>
                            @foreach ($bloods as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        @error('blood_group_id')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Donor Age</label>
                        <input type="number" class="form-control" name="age" value="{{ $donor->age}}">
                        @error('age')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Donor Phone Number</label>
                        <input type="number" class="form-control" name="phone" value="{{ $donor->phone }}">
                        @error('phone')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Permanent address</label>
                        <input type="text" class="form-control" name="address" value="{{ $donor->address}}">
                        @error('address')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Active/Inactive</label>
                        <select name="status" id="" class="form-select">
                            <option value="{{$donor->status}}">
                                @if ($donor->status == 0)
                                    active
                                @endif
                                @if($donor->status == 1)
                                    inactive
                                @endif
                            </option>
                                <option value="0">active</option>
                                <option value="1">Inactive</option>
                        </select>
                        @error('status')
P                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <input type="submit" value="Save" class="btn btn-primary my-3">
                </form>
            </div>
        </div>
    </div>
@endsection
