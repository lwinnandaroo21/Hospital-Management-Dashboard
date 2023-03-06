@extends('layout')


@section("title","All room record")
    @section('main')
    <div class="status">
        <div class="title colorprimary btnappointment">
            <ion-icon name="calendar"></ion-icon><span id="appointmentTitle"> Appointment </span>
        </div>
        <table class="table">
            @forelse ($allApps as $allApp)
            <tr>
                <td>{{ $allApp -> doctor_name }}</td>
                <td>{{ $allApp -> room_no }}</td>
                <td class="price">{{ $allApp -> date }} {{ $allApp -> time }}</td>
                <td><a href="{{ route('appointment.edit',$allApp->id) }}">Edit</a></td>
                <td>
                    <form action="{{ route("appointment.destroy",$allApp->id) }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-link text-danger buttonSize">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
                <div>No Appointment found</div>
            @endforelse
        </table>
        
    </div>
    @endsection
