@extends('layouts.mainapp')

@section('title-block')
    rename employee
@endsection()

@section('content')
    <h1>Employee table with <span style="color: darkred"> {{$employee->id}} </span> id</h1>
    <form action="{{ route('employee-update', $employee->id) }}" method="post">
        @csrf
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">First name</th>
                <th scope="col">last name</th>
                <th scope="col">Company</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Rename</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" placeholder="{{$employee->first_name}}" name="first_name" value="{{$employee->first_name}}"></td>
                    <td><input type="text" placeholder="{{$employee->last_name}}" name="last_name" value="{{$employee->last_name}}"></td>
                    <td><input type="text" placeholder="{{$employee->company}}" name="company" value="{{$employee->company}}"></td>
                    <td><input type="text" placeholder="{{$employee->email}}" name="email" value="{{$employee->email}}"></td>
                    <td><input type="text" placeholder="{{$employee->phone}}" name="phone"  value="{{$employee->phone}} "></td>
                    <td><button class="btn btn-warning">save</button></td>
                </tr>
            </tbody>
        </table>
    </form>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}<li>
                @endforeach()

            </ul>
        </div>
    @endif


@endsection()




