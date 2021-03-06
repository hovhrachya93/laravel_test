@extends('layouts.mainapp')

@section('title-block')
    rename company
@endsection()

@section('content')
    <h1>Company table with <span style="color: darkred"> {{$company->id}} </span> id</h1>
    <form action="{{ route('company-update', $company->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Logo</th>
                <th scope="col">Website</th>
                <th scope="col">Rename</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><input type="text" placeholder="{{$company->name}}" name="name" value="{{$company->name}}"></td>
                <td><input type="text" placeholder="{{$company->email}}" name="email" value="{{$company->email}}"></td>
                <td><input type="file"  name="logo" ></td>
                <td><input type="text" placeholder="{{$company->website}}" name="website" value="{{$company->website}}"></td>
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




