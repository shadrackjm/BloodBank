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
                <h3 class="card-title"> Blood Request</h3>
            </div>
            <div class="card-body">

                <form action="{{ route('admin.edit-request')}}" method="post">
                    @csrf
                    <input type="hidden" name="request_id" value="{{$request->id}}">
                    <div class="row">
                        <h6 class="text-secondary my-3">Patient Details</h6>

                        <div class="form-group col-md-6">
                        <label for="">Patient Full Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $request->Name}}">
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                     <div class="form-group col-md-6">
                        <label for="">Patient Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $request->email}}">
                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                     <div class="form-group col-md-6">
                        <label for="">Gender</label>
                        <select name="gender" id="" class="form-select">
                            <option value="{{$request->gender}}">{{$request->gender}}</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                        </select>
                        @error('blood_group_id')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                        <div class="form-group col-md-6">
                        <label for="">Patient Age</label>
                        <input type="number" class="form-control" name="age" value="{{ $request->age}}">
                        @error('age')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Patient Phone Number</label>
                        <input type="number" class="form-control" name="phone" value="{{ $request->phone_number}}">
                        @error('phone')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Permanent address</label>
                        <input type="text" class="form-control" name="address" value="{{ $request->address}}">
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
                                    <option value="{{$request->blood_group_id}}">{{$request->blood_group}}</option>
                                    @foreach ($blood_groups as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('blood_group_id')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Amount</label>
                                <input type="number" name="amount" id="amount" class="form-control" value="{{$request->amount}}">
                                @error('amount')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Price</label>
                                <input type="text" name="price" id="price" class="form-control" readonly value="{{$request->price}}">
                                @error('price')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Status</label>
                                <select name="status" id="" class="form-select">
                                    @if ($request->status == 0)
                                        <option value="0" selected>Pending</option>
                                        <option value="1">approved</option>
                                        <option value="2">failed</option>
                                    @endif
                                    @if ($request->status == 1)
                                        <option value="0" >Pending</option>
                                        <option value="1" selected>approved</option>
                                        <option value="2">failed</option>
                                    @endif
                                    @if ($request->status == 2)
                                        <option value="0" >Pending</option>
                                        <option value="1" >approved</option>
                                        <option value="2" selected>failed</option>
                                    @endif
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
                const blood_request_price = 1000Tzs;

                var price = blood_request_price * value;

                $('#price').val(price);
                console.log(price);
            });
        });
    </script>
@endsection
