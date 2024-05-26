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
                <form action="{{ route('edit-blood-bank-stock')}}" method="post">
                    @csrf
                    <input type="hidden" name="blood_bank_id" value="{{$bloodBankStock->id}}">
                    <div class="form-group">
                        <label for="">Blood Bank Name</label>
                        <select name="blood_bank_id" id="" class="form-select">
                            <option value="{{$bloodBankStock->id}}">{{$bloodBankStock->name}}</option>
                            @foreach ($bloodBanks as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        @error('blood_bank_id')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Blood Group address</label>
                        <select name="blood_group_id" id="" class="form-select">
                            <option value="{{$bloodBankStock->group_id}}">{{$bloodBankStock->group_name}}</option>
                            @foreach ($bloodGroups as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        @error('blood_group_id')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Amount</label>
                        <input type="number" class="form-control" name="amount" value="{{ $bloodBankStock->amount}}">
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