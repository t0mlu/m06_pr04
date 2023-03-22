@extends('tickets.layout')

@section('header')
<h1>Ticket details</h1>
@endsection

@section('content')
<div class="ticket-show-container">
    <div>
        <table>
        @foreach ($ticket->getAttributes() as $key => $value)
            <tr>
                <td><strong>{{ ucfirst($key) }}:</strong></td>
                <td>{{ $value }}</td>
            </tr>
        @endforeach
        </table>
        <br>
        <div>
            <a href="{{ route('tickets.edit', $ticket) }}">Edit</a>
        </div>
        <br>
        <form method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" formaction="{{ route('tickets.destroy', $ticket) }}">Delete</button>
        </form>
    </div>
    <div>
        <img class="ticket-show-img" src="{{ Storage::url($ticket->screenshot) }}">
    </div>
</div>
@endsection
