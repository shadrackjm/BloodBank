@extends('layouts/admin-layout')
@section('main-section')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Add New Blood Bank stock</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('add-blood-bank-stock')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Blood Bank name</label>
                        <select name="blood_bank_id" id="" class="form-select">
                            <option value="">choose blood bank</option>
                            @foreach ($bloodBank as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        @error('blood_bank_id')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Blood Bank address</label>
                        <select name="blood_group_id" id="" class="form-select">
                            <option value="">choose blood Group</option>
                            @foreach ($bloodGroup as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        @error('blood_group_id')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Amount</label>
                        <input type="number" class="form-control" name="amount" value="{{ old('amount')}}">
                        @error('amount')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <input type="submit" value="Save" class="btn btn-primary my-3">
                </form>
            </div>
        </div>
    </div>
@endsection