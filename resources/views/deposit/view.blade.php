@extends('layouts.app')

@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="left-sidebar">
                <h2>My Deposits</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID</th>
                            <th scope="col">Date start</th>
                            <th scope="col">Date finish</th>
                            <th scope="col">Interest rate, %</th>
                            <th scope="col">Sum, $</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($deposits as $key => $value)
     
                        <tr>
                            <td><p class="card-title">{{ $loop->index+1 }}</p></td>
                            <td><p class="card-title">{{ $value->id }}</p></td>
                            <td><p class="card-title">{{ $value->created_at }}</p></td>
                            <td><p class="card-title">{{ $value->finished_at }}</p></td>
                            @if ($value->interest_rate == 0)<td><p class="card-title">5</p></td>@endif
                            @if ($value->interest_rate == 1)<td><p class="card-title">7</p></td>@endif
                            @if ($value->interest_rate == 2)<td><p class="card-title">9</p></td>@endif
                            <td><p class="card-title">{{ $value->sum }}</p></td>
                        </tr>
     
                        @endforeach
                    </tbody>
                </table>
                {{$deposits->links()}}
            </div>
        </div>
    </div>
    @endsection