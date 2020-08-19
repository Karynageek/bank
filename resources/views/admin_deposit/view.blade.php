@extends('layouts.app_admin')

@section('content')
<section>
    <div class="container">
        <div class="row">
                <div class="left-sidebar">
                    <h2>List of deposits</h2>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Date start</th>
                                <th scope="col">Date finish</th>
                                <th scope="col">Interest rate, %</th>
                                <th scope="col">Sum, $</th>
                                <th scope="col">User id</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($deposits as $key => $value)
                                <tr>
                                    <td><p class="card-title">{{ $value->id }}</p></td>
                                    <td><p class="card-title">{{ $value->created_at }}</p></td>
                                    <td><p class="card-title">{{ $value->finished_at }}</p></td>
                                    @if ($value->interest_rate == 0)<td><p class="card-title">5</p></td>@endif
                                    @if ($value->interest_rate == 1)<td><p class="card-title">7</p></td>@endif
                                    @if ($value->interest_rate == 2)<td><p class="card-title">9</p></td>@endif
                                    <td><p class="card-title">{{ $value->sum }}</p></td>
                                    <td><p class="card-title">{{ $value->user_id }}</p></td>
                                    <td><a href="{{route('admin-deposit-edit', $value->id) }}" class="btn btn-primary">Edit</a></td>
                                    <td><a href="{{route('admin-deposit-delete', $value->id) }}" class="btn btn-danger">Delete</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection