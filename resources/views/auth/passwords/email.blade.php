<x-auth-layout>
    <div class="text-center mb-4">
        <a href="/" class="navbar-brand navbar-brand-autodark"><img src="{{ asset('images/logo.png') }}" height="50" alt=""></a>
    </div>
      <form class="card card-md" method="POST" action="{{ route('password.email') }}">
        @csrf
        <x-alerts/>
        <div class="card-body">
          <h2 class="card-title text-center mb-4">Forgot password</h2>
          <p class="text-muted mb-4">Enter your email address and your password will be reset and emailed to you.</p>
          <div class="mb-3">
            <div class="row mb-3">
                <label for="email" class=" col-form-label">{{ __('Email Address') }}</label>
    
                <div class="w-100">
                    <input id="email" type="email"  placeholder="yourmain@gmai.com"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
          </div>
          <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="3" y="5" width="18" height="14" rx="2" /><polyline points="3 7 12 13 21 7" /></svg>
              {{ __('Send Password Reset Link') }}
            </button>
          </div>
        </div>
      </form>
      <div class="text-center text-muted mt-3">
        Forget it, <a href="{{ route('login') }}">send me back</a> to the sign in screen.
      </div>
    
</x-auth-layout>