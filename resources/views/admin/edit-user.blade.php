@extends('layouts/admin-layout')
@section('main-section')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit User Details</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.edit-user')}}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{$user_id}}">
                    <div class="form-group">
                        <label for="">Full Name</label>
                        <input type="text" name="name" class="form-control" value="{{$user_data->name}}">
                    </div>
                    <div class="form-group mt-2">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" value="{{$user_data->email}}">
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" class="form-select">
                            <option value="{{$user_data->status}}">{{$user_data->status == 0 ? 'inactive' : 'active'}}</option>
                            <option value="1">active</option>
                            <option value="0">inactive</option>
                        </select>
                    </div>
                    <input type="submit" value="Save" class="btn btn-primary my-3">
                </form>
            </div>
        </div>
    </div>
@endsection
