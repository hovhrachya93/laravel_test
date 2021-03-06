@extends('layouts.mainapp')

@section('title-block')
    companies
@endsection()

@section('content')
    <h1>Companies table</h1>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Logo</th>
            <th scope="col">Website</th>
            <th scope="col">Rename</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($companies as $company)
        <tr>
            <th scope="row">{{$company->id}}</th>
            <td> {{$company->name}} </td>
            <td> {{$company->email}} </td>
            <td> <img src="{{ asset('storage/'.$company->logo) }}"  height="42" width="42"> </td>
            <td> {{$company->website}} </td>
            
            <td><a href="{{ route('companies.edit', $company->id)}}"><button class="btn btn-warning">rename</button></a></td>
                <form action="{{ route('companies.destroy', $company->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <td><button type="submit" class="btn btn-danger">delete</button></td>
                </form>
            </tr>
        @endforeach
        <form action="{{ route('companies.store') }}" method="post" enctype="multipart/form-data">
            @csrf
        <tr>
            <th scope="row"><p>add fields</p></th>
            <td>Name: <input type="text" name="name"></td>
            <td>Email: <input type="text" name="email"></td>
            <td>Logo: <input type="file" name="logo"></td>
            <td>Website: <input type="text" name="website"></td>
            <td><button class="btn btn-primary">send fields</button></td>
        </tr>
        </form>
        </tbody>
    </table>
    <ul class="pagination">
        {{ $companies->links() }}
    </ul>

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
