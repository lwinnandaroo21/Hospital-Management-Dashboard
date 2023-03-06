@extends('layout')


@section('title', 'Room Add')

@section('main')
<div class="container">
<div class="row">
    <div class="col-8">
    <form action="{{route("room.store")}}" method="POST">
        @csrf
        <div class="text-center display-6">{{__('message.addRoom')}}</div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Room Number</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="room">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Status</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="status">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Quantity</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="quantity">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Price</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="price">
        </div>
        
        <button type="submit" class="btn btn-primary">{{__('message.add')}}</button>
    </form>
</div>
</div>
</div>
@endsection
