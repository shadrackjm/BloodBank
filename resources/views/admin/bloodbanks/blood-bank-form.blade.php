@extends('layouts/admin-layout')
@section('main-section')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add New Blood Bank</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.add-blood-bank')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Blood Bank name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name')}}">
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email')}}">
                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Blood Bank address</label>
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