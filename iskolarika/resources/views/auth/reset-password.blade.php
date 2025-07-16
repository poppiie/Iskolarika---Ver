<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Change Password</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', sans-serif;
    }
    .reset-wrapper {
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 1rem;
    }
    .reset-box {
      background: white;
      padding: 2rem;
      border-radius: 1rem;
      box-shadow: 0 0 25px rgba(0, 0, 0, 0.08);
      max-width: 420px;
      width: 100%;
    }
    .reset-box img {
      max-height: 70px;
      margin-bottom: 1rem;
    }
    .form-control:focus {
      box-shadow: none;
    }
  </style>
</head>
<body>
  <div class="reset-wrapper">
    <div class="reset-box text-center">
      <img src="{{ asset('images/header-logo.jpg') }}" alt="Bicol University Logo">
      <h4 class="mb-2">Change Password</h4>
      <p class="text-muted">Set the new password for your account so you can login and access all features</p>

      @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
      @endif

      <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <input type="hidden" name="email" value="{{ $request->email }}">

        <div class="mb-3 text-start">
          <label class="form-label">Enter new password</label>
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
          @error('password')
            <span class="text-danger small">{{ $message }}</span>
          @enderror
        </div>

        <div class="mb-3 text-start">
          <label class="form-label">Confirm password</label>
          <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Update Password</button>
      </form>
    </div>
  </div>
</body>
</html>
