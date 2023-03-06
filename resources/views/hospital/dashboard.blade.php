@extends('layout')


@section("title","dashboard")
    @section('main')
        
    
    <div class="main">
        <div class="header">
            <span id="logo"><img src="logo.png" alt="" /></span>
            <span class="contact">{{__('message.care')}}
                <p id="phone">
                    <ion-icon name="call"></ion-icon>
                </p>
            </span>
            
            <div class="dropdown language">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    {{ __('message.language') }}
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/locale/en">English</a></li>
                    <li><a class="dropdown-item" href="/locale/jp">Japan</a></li>
                    <li><a class="dropdown-item" href="/locale/mm">Myanmar</a></li>
                </ul>
            </div>

            <a href="/logout" class="btn btn-danger logoutBtn">{{__('message.logout')}}</a>
        </div>
        <div class="mainbody">
            <div class="nav">
                <div class="systemname">{{ __('message.welcome1') }}
                <p class="text-white fs-5">{{ __('message.welcomeName') }} {{ session("username") }}</p>
            </div>
                <ul class="menu">
                    <li class="active">
                        <ion-icon name="apps"></ion-icon> {{ __('message.dashboard') }}
                    </li>
                    <a href="./doctorlist.html">
                        <li>
                            <ion-icon name="git-network"></ion-icon> {{__('message.doctorList')}}
                        </li>
                    </a>
                </ul>
                
                <hr>
                <ul class="menu">

                </ul>
            </div>
            <div class="body">
                <p class="dashboard">{{__('message.status')}}</p>
                <div class="h_status">
                    <div class="doctor">
                        <ion-icon name="git-network"></ion-icon>
                        <p class="name">{{__('message.doctor')}}</p>
                        <p class="count" id="dcount"></p>
                    </div>
                    <div class="nurse">
                        <ion-icon name="people-outline"></ion-icon>
                        <p class="name">{{__('message.nurse')}}</p>
                        <p class="count" id="ncount"></p>
                    </div>
                    <div class="room">
                        <ion-icon name="bed-outline"></ion-icon>
                        <p class="name">{{__('message.bed')}}</p>
                        <p class="count" id="bcount"></p>
                    </div>
                </div>
                <div class="detailstatus">
                    <div class="status">
                        <div class="title colorprimary bgsecondary">
                            <ion-icon name="bed-outline"></ion-icon><span id="roomTitle"> </span>
                        </div>
                        <table class="table" id="room">
                            @forelse ($rooms as $room)
                            <tr>
                                <td>{{ $room -> room_no }}</td>
                                <td>{{ $room -> status }}</td>
                                <td>{{ $room -> quantity }}</td>
                                <td class="price">{{ $room -> price }}</td>
                                <td><a href="{{ route('room.edit',$room->id) }}">Edit</a></td>
                                <td>
                                    <form action="{{ route("room.destroy",$room->id) }}" method="POST">
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
                        <a href="/room" class="btn btnroom"> {{__('message.seeall')}}</a>
                        <a href="/room/create" class="btn btnroom">{{__('message.add')}}</a>
                        {{-- <button class="btn btnroom">Add Room</button> --}}
                    </div>
                    <div class="status">
                        <div class="title bgthird">
                            <ion-icon name="mail-unread-outline"></ion-icon><span id="messageTitle"> </span>
                        </div>
                        <table class="table" id="message">
                            @forelse ($mails as $mail)
                            <tr>
                                <td>{{ $mail -> message}}</td>
                                <td>{{ $mail -> time }}</td>
                                <td><a href="{{ route("mail.edit",$mail->id) }}">Edit</a></td>
                                <td>
                                    <form action="{{ route('mail.destroy',$mail->id) }}" method="POST">
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
                        <a href="/mail" class="btn btnmessage"> {{__('message.seeall')}}</a>
                        <a href="/mail/create" class="btn btnmessage">{{__('message.add')}}</a>
                    </div>
                </div>
                <div class="detailstatus">
                    <div class="status">
                        <div class="title colorprimary bgfouth">
                            <ion-icon name="medkit"></ion-icon><span id="drugTitle"> {{__('message.drugStore')}}</span>
                        </div>
                        <table class="table">
                            @forelse ($drugs as $drug)
                            <tr>
                                <td>{{ $drug -> name }}</td>
                                <td>{{ $drug -> gram }}</td>
                                <td>{{ $drug -> quantity }}</td>
                                <td class="price">{{ $drug -> price }}</td>
                                <td><a href="{{ route('drug.edit',$drug->id) }}">Edit</a></td>
                                <td>
                                    <form action="{{ route("drug.destroy",$drug->id) }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button class="btn btn-link text-danger buttonSize">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <div>No drug found</div>
                            @endforelse
                        </table>
                        <a href="/drug" class="btn btndrug bgfouth">{{__('message.seeall')}}</a>
                        <a href="/drug/create" class="btn btndrug bgfouth"><ion-icon name="add-circle"></ion-icon>{{__('message.add')}}</a>
                        {{-- <a href="/drug/create" class="btn btndrug bgfouth">Add</a> --}}
                            {{-- <ion-icon name="add-circle"></ion-icon> Add Drug --}}
                        
                    </div>
                    <div class="status">
                        <div class="title colorprimary btnappointment">
                            <ion-icon name="calendar"></ion-icon><span id="appointmentTitle"> {{__('message.appointment')}} </span>
                        </div>
                        <table class="table">
                            @forelse ($apps as $app)
                            <tr>
                                <td>{{ $app -> doctor_name }}</td>
                                <td>{{ $app -> room_no }}</td>
                                <td class="price">{{ $app -> date }}</td>
                                <td class="price">{{ date('h:i:s', strtotime($app->time))}}</td>
                                <td><a href="{{ route('appointment.edit',$app->id) }}">Edit</a></td>
                                <td>
                                    <form action="{{ route("appointment.destroy",$app->id) }}" method="POST">
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
                        <a href="/appointment" class="btn btndrug btnappointment">{{__('message.seeall')}}</a>
                        <a href="/appointment/create" class="btn btndrug btnappointment"><ion-icon name="add-circle"></ion-icon>{{__('message.add')}}</a>
                    
                        {{-- <button class="btn btndrug btnappointment">
                            <ion-icon name="add-circle"></ion-icon> Add
                        </button> --}}
                    </div>
                </div>
            </div>
        </div>
    @endsection
