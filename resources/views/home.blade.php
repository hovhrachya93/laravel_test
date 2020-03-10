@extends('layouts.mainapp')

@section('content')

    <h1>Laravel task</h1>
    <p>1. Basic Laravel Auth: ability to log in as administrator</p>
    <p>2. Use database seeds to create first user with email admin@admin.com and password “password” </p>
    <p>3. CRUD functionality (Create / Read / Update / Delete) for two menu items: Companies and Employees. </p>
    <p>4. Companies DB table consists of these fields: Name (required), email, logo (minimum 100×100), website </p>
    <p>5. Employees DB table consists of these fields: First name (required), last name (required), Company (foreign key to Companies), email, phone </p>
    <p>6. Use database migrations to create those schemas above </p>
    <p>7. Store companies logos in storage/app/public folder and make them accessible from public </p>
    <p>8. Use basic Laravel resource controllers with default methods – index, create, store etc. </p>
    <p>9. Use Laravel’s validation function, using Request classes</p>
    <p>10. Use Laravel’s pagination for showing Companies/Employees list, 10 entries per page</p>
    <p>11. Use Laravel make:auth as default Bootstrap-based design theme, but remove ability to register</p>

@endsection
