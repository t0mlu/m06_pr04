@extends('tickets.layout')

@section('header')
<h1>Ticket creation</h1>
@endsection

@section('content')
<form action="{{ route('tickets.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <table>
        <tr>
            <td>Title:</td>
            <td>
                <input type="text" name="title"/>
            </td>
        </tr>
        <tr>
            <td>Description:</td>
            <td>
                <textarea name="description"></textarea>
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
                <input type="text" name="creator"/>
            </td>
        </tr>
        <tr>
            <td>Priority:</td>
            <td>
                <select type="text" name="priority">
                    <option value="low">Low</option>
                    <option value="mid">Mid</option>
                    <option value="high">High</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="submit"/>
            </td>
        </tr>
    </table>
</form>
@endsection