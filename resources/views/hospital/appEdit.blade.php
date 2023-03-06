@extends('layout')


@section('title', 'Room Edit')

@section('main')
<div class="container">
<div class="row">
    <div class="col-8">
    <form action="{{route("appointment.update",$apps->id)}}" method="POST">
        @csrf
        @method("PUT")
        <div class="text-center display-6">Edit Room</div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Doctor Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="{{ $apps->doctor_name }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Room Number</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="room" value="{{ $apps->room_no }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Date</label>
            <input type="date" class="form-control" id="exampleInputPassword1" name="date" value="{{ $apps->date }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Time</label>
            <input type="time" class="form-control" id="exampleInputPassword1" name="time" value="{{ $apps->time }}">
        </div>
        
        <button type="submit" class="btn btn-primary">{{__('message.update')}}</button>
    </form>
</div>
</div>
</div>
@endsection
