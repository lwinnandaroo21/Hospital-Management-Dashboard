@extends('layout')


@section('title', 'Appointment Add')

@section('main')
<div class="container">
<div class="row">
    <div class="col-8">
    <form action="{{route("appointment.store")}}" method="POST">
        @csrf
        <div class="text-center display-6">{{__('message.addAppointment')}}</div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Doctor Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Room Number</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="room">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Date</label>
            <input type="date" class="form-control" id="exampleInputPassword1" name="date">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Time</label>
            <input type="time" class="form-control" id="exampleInputPassword1" name="time">
        </div>
        
        <button type="submit" class="btn btn-primary">{{__('message.add')}}</button>
    </form>
</div>
</div>
</div>
@endsection
