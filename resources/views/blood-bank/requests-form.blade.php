@extends('layouts/blood-bank-layout')
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
                <h3 class="card-title">Add New Blood Request</h3>
            </div>
            <div class="card-body">
                
                <form action="{{ route('add-request')}}" method="post">
                    @csrf
                    <div class="row">
                        <h6 class="text-secondary my-3">Patient Details</h6>

                        <div class="form-group col-md-6">
                        <label for="">Patient Full Name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name')}}">
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                     <div class="form-group col-md-6">
                        <label for="">Patient Email</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email')}}">
                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                     <div class="form-group col-md-6">
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
                        <div class="form-group col-md-6">
                        <label for="">Patient Age</label>
                        <input type="number" class="form-control" name="age" value="{{ old('age')}}">
                        @error('age')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Patient Phone Number</label>
                        <input type="number" class="form-control" name="phone" value="{{ old('phone')}}">
                        @error('phone')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" class="form-control" name="address" value="{{ old('address')}}">
                        @error('address')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    </div>
                    <div class="row">
                        <h6 class="text-secondary my-3">Blood Request Details</h6>
                            <div class="form-group col-md-6">
                                <label for="">Blood Group</label>
                                <select name="blood_group_id" id="" class="form-select">
                                    <option value="">Choose Blood Group</option>
                                    @foreach ($blood_groups as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('blood_group_id')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Amount (ml)</label>
                                <input type="number" name="amount" id="amount" class="form-control">
                                @error('amount')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Price</label>
                                <input type="text" name="price" id="price" class="form-control" readonly>
                                @error('price')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Status</label>
                                <select name="status" id="" class="form-select">
                                    <option value="0">Pending</option>
                                    <option value="1">approved</option>
                                    <option value="2">failed</option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                    </div>
                    <input type="submit" value="Save" class="btn btn-primary my-3">
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#amount').on('keyup change',function(){
                var value = $(this).val();
                const blood_request_price = 1318;

                var price = blood_request_price * value;

                $('#price').val(price);
                console.log(price);
            });
        });
    </script>
@endsection