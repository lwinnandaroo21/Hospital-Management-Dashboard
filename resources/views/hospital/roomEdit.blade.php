@extends('layout')


@section('title', 'Room Edit')

@section('main')
<div class="container">
<div class="row">
    <div class="col-8">
    <form action="{{route("room.update",$rooms->id)}}" method="POST">
        @csrf
        @method("PUT")
        <div class="text-center display-6">Edit Room</div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Room Number</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="room" value="{{ $rooms->room_no }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Status</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="status" value="{{ $rooms->status }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Quantity</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="quantity" value="{{ $rooms->quantity }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Price</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="price" value="{{ $rooms->price }}">
        </div>
        
        <button type="submit" class="btn btn-primary">{{__('message.update')}}</button>
    </form>
</div>
</div>
</div>
@endsection
