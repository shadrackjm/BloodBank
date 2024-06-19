@extends('layouts/blood-bank-layout')
@section('main-section')
    <div class="container">
        @if (Session::has('success'))
            <div class="alert alert-success p-2">{{ Session::get('success') }}</div>
        @endif
        @if (Session::has('fail'))
            <div class="alert alert-danger p-2">{{ Session::get('fail') }}</div>
        @endif
        <div class="card">

            <div class="card-header">
                <h3 class="card-title">Add New Blood Request</h3>
            </div>
            <div class="card-body">

                <form action="{{ route('add-donation') }}" method="post">
                    @csrf
                    <div class="row">
                        <h6 class="text-secondary my-3">Donor Details</h6>

                        <div class="form-group col-md-6">
                            <label for="">Patient Full Name</label>
                            <select name="name" id="" class="form-select">
                                <option value="">Choose Donor Name</option>
                                @foreach ($donors as $item)
                                   <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Amount (ml)</label>
                            <input type="number" name="amount" id="amount" class="form-control">
                            @error('amount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Notes</label>
                            <textarea name="notes" id="" cols="10" rows="5" class="form-control"></textarea>
                            @error('notes')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <input type="submit" value="Save" class="btn btn-primary my-3">
                </form>
            </div>
        </div>
    </div>
@endsection
