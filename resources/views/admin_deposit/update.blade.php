@extends('layouts.app_admin')

@section('content')
<section>
    <div class="container">
        <div class="row">
            <br>
            <h4>Edit deposit #{{$deposit->id}}</h4>
            <br/>
        </div>
        <div class="col-lg-4">
            <div class="login-form">

                <form action="{{route('form-admin-deposit-edit', $deposit->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <p>Date start</p>
                    <input type="text" name="created_at" required="" value="{{$deposit->created_at}}">
                    
                    <p>Date finish</p>
                    <input type="text" @error('finished_at') is-invalid @enderror" name="finished_at" required="" value="{{$deposit->finished_at}}">
                    @error('finished_at')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <p>Sum deposit</p>
                    <input type="number" @error('sum') is-invalid @enderror" name="sum" placeholder="" required="" value="{{$deposit->sum}}">
                    @error('sum')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <p>Interest rate</p>
                    <select name="interest_rate">
                        <option value="2" @if ($deposit->interest_rate == 2) selected="selected" @endif >9</option>
                        <option value="1" @if ($deposit->interest_rate == 1) selected="selected" @endif >7</option>
                        <option value="0" @if ($deposit->interest_rate == 0) selected="selected" @endif >5</option>
                    </select>

                    <p>Status</p>
                    <select name="status">
                        <option value="1" @if ($deposit->status == 1) selected="selected" @endif >Open</option>
                        <option value="0" @if ($deposit->status == 0) selected="selected" @endif >Close</option>
                    </select>
                    <br/><br/>
                    <input type="submit" name="submit" class="btn btn-primary" value="Save">
                    <br/><br/>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection