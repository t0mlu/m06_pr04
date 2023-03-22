@extends('tickets.layout')

@section('header')
<h1>All tickets</h1>
@endsection

@section('content')
<table class="tickets-index-table">
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
            <a href="{{ route('tickets.show', $ticket) }}">Details</a>
        </td>
        <td>
            <a href="{{ route('tickets.edit', $ticket) }}">Edit</a>
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