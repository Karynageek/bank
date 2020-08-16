@extends('layouts.app')

@section('content')
<section>
    <div class="container">
        <div class="row">
            <br/>
            <h4>Create deposit</h4>
            <br/>
        </div>
        <div class="col-lg-4">
            <div class="login-form">

                <form action="{{route('form-deposit-create')}}" method="post" 
                      enctype="multipart/form-data">
                    @csrf
                    <p>Date finish</p>
                    <input id="finished_at" type="date" class="form-control 
                           @error('finished_at') is-invalid @enderror" 
                           name="finished_at" value="{{ old('finished_at') }}" 
                           required="">
                    @error('finished_at')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <p>Status</p>
                    <select id="status" class="form-control 
                            @error('status') is-invalid @enderror" 
                            name="status" value="{{ old('status') }}" 
                            required="">
                        <option value="1" selected="selected">Open</option>
                        <option value="0">Close</option>
                    </select>

                    <p>Interest rate</p>
                    <select id="interest_rate" class="form-control 
                            @error('interest_rate') is-invalid @enderror" 
                            name="interest_rate" value="{{ old('interest_rate') }}" 
                            required="">
                        <option value="2" selected="selected">9</option>
                        <option value="1">7</option>
                        <option value="0">5</option>
                    </select>
                    @error('interest_rate')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <p>Sum deposit</p>
                    <input id="sum" type="number" class="form-control 
                           @error('sum') is-invalid @enderror" 
                           name="sum" value="{{ old('sum') }}" 
                           required="" placeholder="Sum deposit">
                    @error('sum')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <br/>
                    <input type="submit" name="submit" class="btn btn-primary" value="Save">
                    <br/><br/>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection