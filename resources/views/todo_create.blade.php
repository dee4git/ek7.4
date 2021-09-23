@extends('layouts.app')

@section('content')
    <div class="container" >
        <form method ="POST" action="todo_submit">
            @csrf
            <table class="table">
                <tr>
                    <td>Name</td>
                    <td><input type="textname" name="name" required/></td>
                    <td><input type="submit" name="Submit"/></td>
                </tr>

            </table>

        </form>

    </div>
@endsection
