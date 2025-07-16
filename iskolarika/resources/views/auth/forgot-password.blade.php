<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password | Iskolarika</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  

  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Poppins', sans-serif;
    }

    .main-wrapper {
      display: flex;
      justify-content: center;
      align-items: center;
      height: calc(100vh - 160px);
      padding: 1rem;
      margin-top: 80px;
    }

    .panel-container {
      max-width: 500px;
      width: 100%;
      background-color: white;
      border-radius: 16px;
      box-shadow: 0 0 25px rgba(0,0,0,0.08);
      padding: 3rem;
    }
    /* Fixed Header */
.top-header {
  padding: 1rem;
  background-color: white;
  display: flex;
  align-items: center;
  border-bottom: 1px solid #dee2e6;
  position: fixed;
  top: 0;
  width: 100%;
  z-index: 1000;
}

    .footer {
      background: #f8f9fa;
      padding: 30px 0 10px;
      border-top: 1px solid #dee2e6;
      font-size: 14px;
      position: fixed;
      bottom: 0;
      width: 100%;
    }


  .btn-primary {
  background-color: #0F6FC5;
  border-color: #0F6FC5;
}

.btn-primary:hover {
  background-color: #0d5fae;
  border-color: #0d5fae;
}

  </style>
</head>
<body>

<!-- @include('layouts.partials.header') -->

<div class="main-wrapper">
  <div class="panel-container">
    <!-- <img src="{{ asset('images/header-logo.jpg') }}" alt="Iskolarika Panel" class="footer-logo mb-2"> -->
     <img src="{{ asset('images/header-logo.jpg') }}" alt="Iskolarika Panel" class="mb-3 d-block mx-auto" style="width: 300px;">

    <h3 class="mb-3">Forgot Password</h3>
    <p class="text-muted mb-4">Enter your user account's verified email address and we will send you a password reset link.</p>

    @if (session('status'))
      <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
      @csrf
      <div class="mb-3">
        <input type="email" class="form-control @error('email') is-invalid @enderror"
               name="email" placeholder="Enter your email" value="{{ old('email') }}" required autofocus>
        @error('email')
          <span class="text-danger small">{{ $message }}</span>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary w-100">SEND PASSWORD RESET LINK</button>
    </form>

    <!-- <a href="{{ route('login') }}" class="btn btn-link w-100 mt-3">Back to login</a> -->
  </div>
</div>


<!-- ...rest of HTML above -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('status'))
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
Swal.fire({
  title: '<img src="{{ asset('images/reset-icon.png') }}" style="width: 80px; margin-bottom: 20px;"><br><span style="font-size: 22px; font-weight: 600; color: #0F2B5B;">Reset your Password</span>',
  html: `
    <p style="color: #333; margin-top: 10px; font-size: 14px;">
      Check your email for link to reset your password. If it doesn’t appear within a few minutes, check your spam folder.
    </p>
  `,
  showConfirmButton: true,
  confirmButtonText: 'RETURN TO SIGN IN',
  confirmButtonColor: '#0F6FC5',
  customClass: {
    popup: 'swal2-padding'
  }
}).then(() => {
  window.location.href = "{{ route('login') }}";
});
</script>
@endif


</body>
</html>

