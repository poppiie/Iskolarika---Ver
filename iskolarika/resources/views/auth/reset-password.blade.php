<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Change Password</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

    .swal2-popup.swal2-rounded {
  border-radius: 16px;
  padding: 2rem 2rem 1.5rem;
  max-width: 420px;
}

.swal2-confirm.swal2-confirm-custom {
  background-color: #0F6FC5 !important;
  color: white !important;
  font-weight: 600;
  font-size: 14px;
  border-radius: 6px;
  padding: 0.625rem 1.5rem;
  width: 100%;
}
  </style>
</head>
<body>
  <div class="reset-wrapper">
    <div class="reset-box text-center">
      <img src="{{ asset('images/header-logo.jpg') }}" alt="Bicol University Logo">
      <h4 class="mb-2">Change Password</h4>
      <p class="text-muted">Set the new password for your account so you can login and access all features</p>

      <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <input type="hidden" name="email" value="{{ $request->email }}">

        <div class="mb-3 text-start">
          <label class="form-label">Enter new password</label>
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
          <!-- @error('password')
            <span class="text-danger small">{{ $message }}</span>
          @enderror -->
        </div>

        <div class="mb-3 text-start">
          <label class="form-label">Confirm password</label>
          <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Update Password</button>
      </form>
    </div>
  </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @if (session('status'))
<script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
Swal.fire({
  icon: 'success',
  title: `<div style="font-size: 28px; font-weight: 600; color: #0F2B5B; margin-top: 20px;">Successfully</div>`,
  html: `
    <div style="color: #6c757d; font-size: 15px; margin-top: 8px;">
      Your password has been reset successfully
    </div>
  `,
  showConfirmButton: true,
  confirmButtonText: 'CONTINUE',
  confirmButtonColor: '#0F6FC5',
  allowOutsideClick: false,
  customClass: {
    popup: 'swal2-rounded swal2-padding',
    confirmButton: 'swal2-confirm-custom'
  }
}).then(() => {
  window.location.href = "{{ route('login') }}";
});
</script>
@endif

</body>
</html>
