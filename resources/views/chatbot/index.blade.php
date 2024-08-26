@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="text-center">Chatbot</h3>
    <form action="{{url('/chatbot')}}" method="post">
        @csrf
        <div class="input-group">
            <input type="text" class="form-control" name="massage" placeholder="Type a message..." id="userInput">
            <input class="btn btn-primary" type="submit" value="Send">
            <!-- <button class="btn btn-primary" id="sendBtn">Send</button> -->
        </div>
    </form>
    @if (session('response'))
        <div class="card my-4 bg-white">
            <div class="card-body">
                {{session('response')}}
            </div>
        </div>
    @endif
</div>

@endsection