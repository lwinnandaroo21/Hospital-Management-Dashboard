@extends('layout')


@section("title","All room record")
    @section('main')
                <div class="detailstatus">
                    <div class="status">
                        <div class="title colorprimary bgsecondary">
                            <ion-icon name="bed-outline"></ion-icon><span id="roomTitle"> </span>
                        </div>
                        <table class="table" id="room">
                            @forelse ($allRooms as $allRoom)
                            <tr>
                                <td>{{ $allRoom -> room_no }}</td>
                                <td>{{ $allRoom -> status }}</td>
                                <td>{{ $allRoom -> quantity }}</td>
                                <td class="price">{{ $allRoom -> price }}</td>
                                <td colspan="2"><a href="{{ route('room.edit',$allRoom->id) }}">Edit</a></td>
                                <td>
                                    <form action="{{ route("room.destroy",$allRoom->id) }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn-link text-danger buttonSize">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <div>No room found</div>
                            @endforelse
                            
                        </table>
                    </div>
                </div>
    @endsection
