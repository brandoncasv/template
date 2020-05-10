@extends('base::layouts.empty')

@section('content')

<section class="flexbox-container">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                <div class="card-header border-0">
                    <div class="card-title text-center">
                        <img width="80" src="/logo-default.png" alt="branding logo">
                    </div>
                </div>
                <div class="card-content">
                    @if (config('base.hybridauth.enabled'))
                         <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1"><span>{{__('base::app.login.login_social')}}</span></p>
                         <div class="text-center">
                             @if (config('base.hybridauth.facebook.enabled'))
                                 <a href="{{route('social-auth', 'facebook')}}" class="btn btn-social-icon mr-1 mb-1 btn-outline-facebook"><span class="la la-facebook"></span></a>
                             @endif
                             @if (config('base.hybridauth.facebook.twitter'))
                                 <a href="{{route('social-auth', 'twitter')}}" class="btn btn-social-icon mr-1 mb-1 btn-outline-twitter"><span class="la la-twitter"></span></a>
                             @endif
                             @if (config('base.hybridauth.facebook.google'))
                                 <a href="{{route('social-auth', 'google')}}" class="btn btn-social-icon mr-1 mb-1 btn-outline-google"><span class="la la-google font-medium-4"></span></a>
                             @endif
                         </div>
                        <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1"><span>{{__('base::app.login.login_email')}}</span></p>
                    @endif
                    <div class="card-body">
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}" novalidate>
                            @csrf
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="text" class="form-control  @error('email') is-invalid @enderror" name="email" placeholder="{{__('base::app.login.username')}}" value="{{ old('email') }}"  autocomplete="email" autofocus required>
                                <div class="form-control-position">
                                    <i class="ft-user"></i>
                                </div>
                            </fieldset>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="password" class="form-control  @error('password') is-invalid @enderror" name="password" placeholder="{{__('base::app.login.password')}}" autocomplete="current-password" required>
                                <div class="form-control-position">
                                    <i class="la la-key"></i>
                                </div>
                            </fieldset>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="form-group row">
                                <div class="col-sm-6 col-12 text-center text-sm-left pr-0">
                                    <fieldset>
                                        <input type="checkbox" name="remember" class="chk-remember  {{ old('remember') ? 'checked' : '' }}">
                                        <label for="remember-me"> {{__('base::app.login.remember')}}</label>
                                    </fieldset>
                                </div>
                                @if (Route::has('password.request'))
                                    <div class="col-sm-6 col-12 float-sm-left text-center text-sm-right">
                                        <a href="{{ route('password.request') }}" class="card-link">{{__('base::app.login.forgot')}}</a>
                                    </div>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-outline-info btn-block"><i class="ft-unlock"></i> {{__('base::app.login.login')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
