@extends('layout')


@section('title', 'All Message record')
@section('main')
<div class="detailstatus">
    <div class="status">
        <div class="title bgthird">
            <ion-icon name="mail-unread-outline"></ion-icon><span id="messageTitle"> </span>
        </div>
        <table class="table" id="message">
            @forelse ($allMessages as $allMessage)
            <tr>
                <td>{{ $allMessage -> message}}</td>
                <td>{{ $allMessage -> time }}</td>
                <td><a href="{{ route("mail.edit",$allMessage->id) }}">Edit</a></td>
                <td>
                    <form action="{{ route('mail.destroy',$allMessage->id) }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-link text-danger buttonSize">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <div>No message found</div>
            @endforelse
        </table>
    </div>
</div>
@endsection