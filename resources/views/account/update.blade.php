@extends('layouts.app')

@section('content')
<section>
    <div class="container">
        <div class="row">
            <br>
            <h4>Change your balance</h4>
            <br/>
        </div>
        <div class="col-lg-4">
            <div class="login-form">

                <form action="{{route('form-account-refill', $account->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <p>Sum of refill</p>
                    <input id="balance" type="number" class="form-control 
                           @error('balance') is-invalid @enderror" 
                           name="balance" value="{{ old('balance') }}" 
                           required="">
                    @error('balance')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <br/><br/>
                    <input type="submit" name="submit" class="btn btn-primary" value="Save">
                    <br/><br/>
                </form>
                <form action="{{route('form-account-withdraw', $account->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <p>Sum of withdrawal</p>
                    <input id="balance" type="number" class="form-control 
                           @error('balance') is-invalid @enderror" 
                           name="balance" value="{{ old('balance') }}" 
                           required="">
                    @error('balance')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <br/><br/>
                    <input type="submit" name="submit" class="btn btn-primary" value="Save">
                    <br/><br/>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection