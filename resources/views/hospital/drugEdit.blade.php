@extends('layout')


@section('title', 'Drug Add')

@section('main')
<div class="container">
<div class="row">
    <div class="col-8">
    <form action="{{route("drug.update",$drugs->id)}}" method="POST">
        @csrf
        @method("PUT")
        <div class="text-center display-6">Add Drug</div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="{{ $drugs->name }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Gram</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="gram" value="{{ $drugs->gram }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Quantity</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="quantity" value="{{ $drugs->quantity }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Price</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="price" value="{{ $drugs->price }}">
        </div>
        
        <button type="submit" class="btn btn-primary">{{__('message.update')}}</button>
    </form>
</div>
</div>
</div>
@endsection
