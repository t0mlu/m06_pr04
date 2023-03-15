@extends('tickets.layout')

@section('header')
<h1>Ticket</h1>
@endsection

@section('content')
<p>{{$ticket->title}}</p>
@endsection