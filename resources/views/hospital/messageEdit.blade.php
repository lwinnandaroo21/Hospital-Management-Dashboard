@extends('layout')


@section('title', 'Message Edit')

@section('main')
<div class="container">
<div class="row">
    <div class="col-8">
    <form action="{{route("mail.update",$mails->id)}}" method="POST">
        @csrf
        @method("PUT")
        <div class="text-center display-6">Edit Message</div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Message</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="message" value="{{ $mails->message }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Time</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="time" value="{{ $mails->time }}">
        </div>
        
        <button type="submit" class="btn btn-primary">{{__('message.update')}}</button>
    </form>
</div>
</div>
</div>
@endsection
