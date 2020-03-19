@extends('layouts.mainapp')

@section('title-block')
    employees
@endsection()

@section('content')
    <h1>Employees table</h1>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">id</th>
            <th scope="col">First name</th>
            <th scope="col">last name</th>
            <th scope="col">Company</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Rename</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
            
        @foreach($employers as $employee)
        <tr>
            <th scope="row">{{$employee->id}}</th>
            <td> {{$employee->first_name}} </td>
            <td> {{$employee->last_name}} </td>
            <td>
                {{$employee->company}}
            </td>
            <td> {{$employee->email}} </td>
            <td> {{$employee->phone}} </td>
                <td><a href="{{ route('employees.edit', $employee->id)}}"><button class="btn btn-warning">rename</button></a></td>
                <form action="{{ route('employees.destroy', $employee->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <td><button type="submit" class="btn btn-danger">delete</button></td>
                </form>
            </tr>
        @endforeach
        
        <form action="{{ route('employees.store') }}" method="post">
            @csrf
            <tr >
                <th scope="row"><p>add fields</p></th>
                <td>First Name: <input type="text"  name="first_name"></td>
                <td>Last Name: <input type="text" name="last_name"></td>
                <td>Company: <select name="company" id="">
                        <option value="">Choose Company</option>
                        @foreach($companies as $company)
                            <option value={{ $company->name }}>{{ $company->name }}</option>
                        @endforeach
                    </select></td>
                <td>Email: <input type="text" name="email"></td>
                <td>Phone: <input type="text" name="phone"></td>
                <td><button type="submit" class="btn btn-primary">send fields</button></td>
            </tr>
        </form>
        </tbody>
    </table>

    <ul class="pagination">
        {{ $employers->links() }}
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



