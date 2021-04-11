@extends('layouts.auth')

@section('content')
    <container class="container">
        <row>
            <grid :size="3"></grid>
            <grid :size="6">
                <card>
                    <div class="card-header">{{ __('Login') }}</div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <row>
                            <grid>
                                <ui-field label="Email" placeholder="Email address" name="email"></ui-field>
                                <ui-field label="Password" placeholder="Password" type="password"
                                          name="password"></ui-field>
                            </grid>
                        </row>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember"
                                           id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember" style="display: inline-block">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                            </div>
                        </div>
                    </form>

                </card>
            </grid>
        </row>
    </container>
@endsection
