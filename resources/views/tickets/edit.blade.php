@extends('tickets.layout')

{!! NoCaptcha::renderJs() !!}

@section('header')
<h1>Ticket editing</h1>
@endsection

@section('content')
<div class="ticket-show-container">
    <div>
        <form action="{{ route('tickets.update', $ticket) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <table>
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" value="{{ $ticket->title }}"/>
                    </td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td>
                        <textarea name="description">{{ $ticket->description }}</textarea>
                    </td>
                </tr>
                <tr>
                    <td>File:</td>
                    <td>
                        <input type="file" name="screenshot"/>
                    </td>
                </tr>
                <tr>
                    <td>Creator:</td>
                    <td>
                        <input type="text" name="creator" value="{{ $ticket->creator }}"/>
                    </td>
                </tr>
                <tr>
                    <td>Priority:</td>
                    <td>
                        <select type="text" name="priority">
                            <option value="low" {{ ($ticket->priority == "low") ? "selected" : "" }}>Low</option>
                            <option value="mid" {{ ($ticket->priority == "mid") ? "selected" : "" }}>Mid</option>
                            <option value="high" {{ ($ticket->priority == "high") ? "selected" : "" }}>High</option>
                        </select>
                    </td>
                </tr>
            </table>
            <div class="recaptcha-container">
                {!! NoCaptcha::display() !!}
                @if ($errors->has('g-recaptcha-response'))
                <span>
                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                </span>
                @endif
            </div>
            <input type="submit" name="submit"/>   
        </form>
    </div>
    <div>
        <img class="ticket-show-img" src="{{ Storage::url($ticket->screenshot) }}">
    </div>
</div>
@endsection