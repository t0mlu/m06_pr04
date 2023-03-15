@extends('tickets.layout')

@section('header')
<h1>Tickets</h1>
@endsection

@section('content')
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
            <a href="{{ route('tickets.show', $ticket) }}">details</a>
        </td>
        <td>
            <a href="{{ route('tickets.edit', $ticket) }}">edit</a>
        </td>
        <td>
            <a href="{{ route('tickets.destroy', $ticket) }}">delete</a>
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