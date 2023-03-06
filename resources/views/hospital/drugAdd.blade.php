@extends('layout')


@section('title', 'Drug Add')

@section('main')
<div class="container">
<div class="row">
    <div class="col-8">
    <form action="{{route("drug.store")}}" method="POST">
        @csrf
        <div class="text-center display-6">{{__('message.addDrug')}}</div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Gram</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="gram">
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
