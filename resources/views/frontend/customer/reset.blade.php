@extends('layouts.frontend')

@section('title', 'login here')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Reset new Password</div>

                    <div class="panel-body">
                        @include('includes.flash')

                        <form class="form-horizontal" method="POST" action="{{ route('customer.resetpassword') }}">
                            @csrf
                            <input type="hidden" name="reset_code" value="{{$code}}"/>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" required autofocus>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Confirm Password</label>

                                    <div class="col-md-6">
                                        <input id="password_confirmation " type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation ') }}" required autofocus>

                                        @if ($errors->has('password_confirmation '))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation ') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>




                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-danger">
                                            Change Password
                                        </button>
                                        <hr>



                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection