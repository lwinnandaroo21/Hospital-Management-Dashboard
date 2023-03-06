@extends('layout')


@section('title', 'All room record')
@section('main')
    <div class="detailstatus">
        <div class="status">
            <div class="title colorprimary bgfouth">
                <ion-icon name="medkit"></ion-icon><span id="drugTitle"> Drug Store</span>
            </div>
            <table class="table">
                @forelse ($allDrugs as $allDrug)
                    <tr>
                        <td>{{ $allDrug->name }}</td>
                        <td>{{ $allDrug->gram }}</td>
                        <td>{{ $allDrug->quantity }}</td>
                        <td class="price">{{ $allDrug->price }}</td>
                        <td><a href="{{ route('drug.edit', $allDrug->id) }}">Edit</a></td>
                        <td>
                            <form action="{{ route('drug.destroy', $allDrug->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-link text-danger buttonSize">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <div>No drug found</div>
                @endforelse
            </table>
        </div>
    </div>
    @endsection
