@extends('layouts.app')

@section('content')
    <div class="container" >
        <h1>Edit From</h1>
        <form method ="POST" action="{{route('todo_update',[$todoArr->id])}}">
            @csrf
            <table class="table">
                <tr>
                    <td>Name</td>
                    <td><input type="textname" name="name" required value="{{$todoArr->name}}"/></td>
                    <td><input type="submit" name="Submit"/></td>
                </tr>

            </table>

        </form>

    </div>
@endsection
