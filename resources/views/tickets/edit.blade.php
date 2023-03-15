@extends('tickets.layout')

@section('header')
<h1>Ticket editing</h1>
@endsection

@section('content')
<form action="{{ route('tickets.update', $ticket) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div>
        Title: <input type="text" name="title" value="{{ $ticket->title }}"/>
    </div>
    <div>
        Description: <textarea name="description">{{ $ticket->description }}</textarea>
    </div>
    <div>
        File: <input type="file" name="screenshot"/>
    </div>
    <div>
        Creator: <input type="text" name="creator" value="{{ $ticket->creator }}"/>
    </div>
    <div>
        Priority: <select type="text" name="priority">
            <option value="low" {{ ($ticket->priority == "low") ? "selected" : "" }}>Low</option>
            <option value="mid" {{ ($ticket->priority == "mid") ? "selected" : "" }}>Mid</option>
            <option value="high" {{ ($ticket->priority == "high") ? "selected" : "" }}>High</option>
        </select>
    </div>
    <div>
        <input type="submit" name="submit"/>
    </div>
</form>
@endsection