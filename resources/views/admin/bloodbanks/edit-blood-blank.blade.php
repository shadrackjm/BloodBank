@extends('layouts/admin-layout')
@section('main-section')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add New Blood Group</h3>
            </div>
            <div class="card-body">
                @if (Session::has('success'))
                      <div class="alert alert-success p-2">{{Session::get('success')}}</div>
                      @endif
                      @if (Session::has('fail'))
                          <div class="alert alert-danger p-2">{{Session::get('fail')}}</div>
                      @endif
                <form action="{{ route('admin.edit-blood-bank')}}" method="post">
                    @csrf
                    <input type="hidden" name="blood_bank_id" value="{{$bloodBank->id}}">
                    <div class="form-group">
                        <label for="">Blood Bank Name</label>
                        <input type="text" value="{{$bloodBank->name}}" name="name" class="form-control">
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" value="{{$bloodBank->email}}">
                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Blood Bank Address</label>
                        <input type="text" value="{{$bloodBank->address}}" name="address" class="form-control">
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