@extends('layouts.app')

@section('content')
    <div class="container" >
        <h1>
        {{session('msg')}}</h1>
        <br>
        <a href="todo_create">Create</a>
        <table class="table table-striped">
            <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Price</td>
            <td>Quantity</td>
            <td>Net Price</td>
            <td>Create at</td>
            <td>Action</td>
            <td>Action</td>
            </tr>
        @foreach($todoArr as $todo)
            <tr>
                <td>{{$todo->id}}</td>
                <td>{{$todo->name}}</td>
                <td>{{$todo->price}}</td>
                <td>{{$todo->quantity}}</td>
                <td>{{$todo->price}}</td>
                <td>{{$todo->created_at}}</td>
                <td><a href="todo_delete/{{$todo->id}}"> Delete</a></td>
                <td><a href="todo_edit/{{$todo->id}}"> Edit</a></td>

            </tr>
        @endforeach
        </table>
        <br>
        <h3 align="center">Deleted</h3>
        <br>
        <table class="table table-striped">
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Create at</td>
                <td>Action</td>
                <td>Action</td>
            </tr>
            @foreach($deleted as $todo)
                <tr>
                    <td>{{$todo->id}}</td>
                    <td>{{$todo->name}}</td>
                    <td>{{$todo->created_at}}</td>
                    <td><a href="todo_destroy/{{$todo->id}}"> Delete Forever</a></td>
                    <td><a href="todo_restore/{{$todo->id}}"> Restore</a></td>

                </tr>
            @endforeach
        </table>

    </div>
@endsection
