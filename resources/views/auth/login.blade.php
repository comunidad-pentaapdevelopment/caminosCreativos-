@extends('layouts.app')

@section('content')
 @section('content')
   <form class="form" method="post" action="{{ url('/login') }}">
   {{ csrf_field() }}

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
      <p class="field">
        <input id="email" type="email"name="name" placeholder="Email" value="{{ old('email') }}" required/>
        @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
      </p>
      </div>
      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
      <p class="field">
        <input id="password"type="password" name="password" placeholder="Password" required/>
        @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
      </p>
    </div>
      <p class="submit"><input type="submit" name="sent" value="Login"></p>


    </form>
  </div> <!--/ Login-->
@endsection
