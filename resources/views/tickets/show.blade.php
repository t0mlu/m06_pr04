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
</table>
<form method="GET">
        @csrf
        <button type="submit" formaction="{{ route('tickets.edit', $ticket) }}">Edit</button>
    </form>
    <form method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" formaction="{{ route('tickets.destroy', $ticket) }}">Delete</button>
    </form>
<img src="{{ Storage::url($ticket->screenshot) }}">
@endsection
