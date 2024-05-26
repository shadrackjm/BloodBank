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
                
                <form action="{{ route('add-donor')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Donor Full Name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name')}}">
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                     <div class="form-group">
                        <label for="">Donor Email</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email')}}">
                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                     <div class="form-group">
                        <label for="">Gender</label>
                        <select name="gender" id="" class="form-select">
                            <option value="">Choose Gender</option>
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
                            <option value="">Choose Blood Group</option>
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
                        <input type="number" class="form-control" name="age" value="{{ old('age')}}">
                        @error('age')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Donor Phone Number</label>
                        <input type="number" class="form-control" name="phone" value="{{ old('phone')}}">
                        @error('phone')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Permanent address</label>
                        <input type="text" class="form-control" name="address" value="{{ old('address')}}">
                        @error('address')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <input type="submit" value="Save" class="btn btn-primary my-3">
                </form>
            </div>
        </div>
    </div>
@endsection