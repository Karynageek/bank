@extends('layouts.app_admin')

@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="left-sidebar">
                <h2>List of users</h2>
                <a href="{{route('admin-user-create')}}" class="btn btn-success">Create new user</a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Date create</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $key => $value)
                                <tr>
                                    <td><p class="card-title">{{ $value->id }}</p></td>
                                    <td><p class="card-title">{{ $value->created_at }}</p></td>
                                    <td><p class="card-title">{{ $value->name }}</p></td>
                                    <td><p class="card-title">{{ $value->email }}</p></td>
                                    <td><a href="{{route('admin-user-edit', $value->id) }}" class="btn btn-primary">Edit</a></td>
                                    <td><a href="{{route('admin-user-delete', $value->id) }}" class="btn btn-danger">Delete</a></td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection