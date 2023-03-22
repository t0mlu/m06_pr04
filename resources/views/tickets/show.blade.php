@extends('tickets.layout')

@section('header')
<h1>Ticket</h1>
@endsection

@section('content')
<table>
    @foreach ($ticket->getAttributes() as $key => $value)
    <tr>
        <td><strong>{{ ucfirst($key) }}:</strong></td>
        <td>{{ $value }}</td>
    </tr>
    @endforeach
    <img src="{{ Storage::url($ticket->screenshot) }}">
</table>
@endsection
