@extends('layouts.app')

@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>My team</h2>

            </div>
            <div class="container mt-5">
                <div class="alert alert-info mt-2 col-md-6">
                    <p>{!! $teamView !!}</p>
                </div>
            </div>
        </div>
    </div>
    @endsection