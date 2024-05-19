@extends('layouts/admin-layout')
@section('main-section')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add New Blood Group</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('add-blood-group')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Blood group name(A,-B ...)</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name')}}">
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <input type="submit" value="Save" class="btn btn-primary my-3">
                </form>
            </div>
        </div>
    </div>
@endsection