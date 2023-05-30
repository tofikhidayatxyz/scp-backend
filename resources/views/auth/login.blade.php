<x-auth-layout>
    <div class="text-center mb-4">
        <a href="/" class="navbar-brand navbar-brand-autodark"><img src="{{ asset('images/logo.png') }}" height="50" alt=""></a>
    </div>
      <form class="card card-md" method="POST" action="{{ route('login') }}">
        @csrf
        
        <div class="card-body">
          <h2 class="card-title text-center mb-4">Login to your account</h2>
          <div class="mb-3">
            <label class="form-label">Email address</label>
            <input id="email" type="email" placeholder="yourmain@gmail.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="mb-2">
            <label class="form-label">
              Password
              <span class="form-label-description">
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
              </span>
            </label>
            <div class="input-group input-group-flat">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="*****">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
          </div>
          <div class="mb-2 mt-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                <label class="form-check-label" for="remember">
                    {{ __('Remember This Device') }}
                </label>
            </div>
          </div>
          <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100">Sign in</button>
          </div>
        <a href="{{ route('register') }}" style="margin-top: 10px; display: block;">I dont have an account</a>
        </div>
        
      </form>
</x-auth-layout>