@extends('layouts.app')

@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="left-sidebar">
                <h2>Account History</h2>
                <h5>Balance: ${{$account->balance}}</h5>
                <a href="{{route('account-refill', $account->id) }}" class="btn btn-primary">Refill or withdrawal balance</a>
            
            <br></br>
            <h4>Last transactions</h4>
            </div>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Operation</th>
                        <th scope="col">Date</th>
                        <th scope="col">Sum, $</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($histories as $key => $value)
                    <tr>
                        <td><p class="card-title">{{ $value->id }}</p></td>
                        <td><p class="card-title font-weight-bold">{{ $value->title }}</p></td>
                        <td><p class="card-title">{{ $value->created_at }}</p></td>
                        <td><p class="card-title">{{ $value->sum }}</p></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$histories->links()}}
        </div>
    </div>
    @endsection