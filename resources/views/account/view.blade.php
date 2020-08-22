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
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Operation</th>
                        <th scope="col">Date</th>
                        <th scope="col">Sum, $</th>
                        <th scope="col">Balance, $</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><p class="card-title">New deposit</p></td>
                        <td><p class="card-title">22.12.2020</p></td>
                        <td><p class="card-title">100</p></td>
                        <td><p class="card-title">2828</p></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @endsection