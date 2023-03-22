@extends('tickets.layout')

@section('header')
<h1>Tickets</h1>
@endsection

@section('content')
<form>
    @csrf
    <button type="submit" formaction="{{ route('tickets.create') }}">Create a ticket</button>
</form>
<table>
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th>id</th>
        <th>title</th>
        <th>creator</th>
        <th>priority</th>
        <th>created_at</th>
    </tr>
    @foreach ($tickets as $ticket)
    <tr>
        <td>
            <form method="GET">
                @csrf
                <button type="submit" formaction="{{ route('tickets.show', $ticket) }}">Details</button>
            </form>
        </td>
        <td>
            <form method="GET">
                @csrf
                <button type="submit" formaction="{{ route('tickets.edit', $ticket) }}">Edit</button>
            </form>
        </td>
        <td>
            <form method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" formaction="{{ route('tickets.destroy', $ticket) }}">Delete</button>
            </form>
        </td>
        <td>{{ $ticket->id }}</td>
        <td>{{ $ticket->title }}</td>
        <td>{{ $ticket->creator }}</td>
        <td>{{ $ticket->priority }}</td>
        <td>{{ $ticket->created_at }}</td>
    </tr>
    @endforeach
</table>
@endsection