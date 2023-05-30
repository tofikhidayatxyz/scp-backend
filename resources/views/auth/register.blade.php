<x-auth-layout>
    <div class="text-center mb-4">
        <a href="/" class="navbar-brand navbar-brand-autodark"><img src="{{ asset('images/logo.png') }}" height="50" alt=""></a>
    </div>
      <form class="card card-md" method="POST" action="{{ route('register') }}">
        @csrf
        
        <div class="card-body">
          <h2 class="card-title text-center mb-4">Login to your account</h2>
          <div class="mb-3">
            <label class="form-label">Name</label>
            <input id="name" type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>

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

          <div class="mb-2">
            <label class="form-label">
              Password confirmation
            </label>
            <div class="input-group input-group-flat">
                <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password" placeholder="*****">
                @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
          </div>
          <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100">Sign up</button>
          </div>
        <a href="{{ route('login') }}" style="margin-top: 10px; display: block;">Already have an account</a>
        </div>
        
      </form>
</x-auth-layout>
