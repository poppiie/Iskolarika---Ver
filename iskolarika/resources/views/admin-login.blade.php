<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Login | Bicol University Scholarship Management System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet"/>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    html, body { height: 100%; overflow-y: auto; }

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

    .main-wrapper {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: calc(100vh - 160px);
      padding: 2rem 1rem;
      width: 100%;
      flex-grow: 1;
    }

    .panel-container {
      display: flex;
      flex-direction: row;
      max-width: 960px;
      width: 100%;
      background-color: white;
      border-radius: 16px;
      box-shadow: 0 0 25px rgba(0,0,0,0.08);
      overflow: hidden;
    }

    .left-panel {
      background-color: #e9ecef;
      display: flex;
      align-items: center;
      justify-content: center;
      width: 50%;
    }

    .left-image {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }

    .right-panel {
      padding: 2.5rem 2rem;
      background-color: #ffffff;
      display: flex;
      align-items: center;
      justify-content: center;
      width: 50%;
    }

    .auth-card {
      width: 100%;
      max-width: 340px;
    }

    .auth-card h3 {
      font-weight: 600;
    }

    .form-control::placeholder {
      font-size: 0.95rem;
    }

    .input-group-text {
      background-color: white;
      cursor: pointer;
    }

    .forgot-link {
      display: block;
      text-align: right;
      font-size: 0.875rem;
      margin-top: -0.5rem;
      margin-bottom: 1rem;
    }

    .forgot-link:hover {
      color: #0d6efd;
      font-weight: 600;
      text-decoration: underline;
    }

    .footer {
      background: #f8f9fa;
      padding: 30px 0 10px;
      border-top: 1px solid #dee2e6;
      font-size: 14px;
      position: fixed;
      bottom: 0;
      width: 100%;
      z-index: 1000;
    }

    @media (max-width: 768px) {
      .panel-container {
        flex-direction: column;
        box-shadow: none;
        border-radius: 0;
      }

      .left-panel, .right-panel {
        width: 100%;
      }

      .left-image {
        max-height: 300px;
      }

      .auth-card {
        max-width: 100%;
      }
    }
  </style>
</head>
<body>

<!-- Header -->
@include('layouts.partials.header')

<!-- Main Content -->
<div class="main-wrapper">
  <div class="panel-container">
    <!-- Left Panel -->
    <div class="left-panel">
      <img src="{{ asset('images/iskolarika-panel.jpg') }}" alt="Iskolarika Panel" class="left-image">
    </div>

    <!-- Right Panel -->
    <div class="right-panel">
      <div class="auth-card">
        <h3 class="mb-2">Admin Access Only</h3>
        <p class="text-muted mb-4">Enter your admin credentials</p>

        <form method="POST" action="{{ route('admin.login.submit') }}">
          @csrf
          <div class="mb-3">
            <input type="text" class="form-control" placeholder="Admin Email or Username" name="email" required>
          </div>

          <div class="mb-3 input-group">
            <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
            <span class="input-group-text" onclick="togglePassword()">
              <i class="bi bi-eye" id="toggleIcon"></i>
            </span>
          </div>

          <!-- <a href="#" class="forgot-link" style="text-decoration: none;">Forgot password?</a> -->

          <button type="submit" class="btn btn-primary w-100 mb-3">Login</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Footer -->
@include('layouts.partials.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  function togglePassword() {
    const passwordField = document.getElementById("password");
    const icon = document.getElementById("toggleIcon");

    if (passwordField.type === "password") {
      passwordField.type = "text";
      icon.classList.remove("bi-eye");
      icon.classList.add("bi-eye-slash");
    } else {
      passwordField.type = "password";
      icon.classList.remove("bi-eye-slash");
      icon.classList.add("bi-eye");
    }
  }
</script>

@if (session('success'))
<script>
  let successMessage = "{{ session('success') }}";

  Swal.fire({
    icon: 'success',
    title: 'Success!',
    text: successMessage,
    confirmButtonColor: '#3085d6',
    timer: 3000,
    timerProgressBar: true,
    @if (session('success') === 'Welcome Admin!')
    willClose: () => {
      window.location.href = 'dashboard-admin';
    }
    @endif
  });
</script>
@endif

@if (session('error'))
<script>
  Swal.fire({
    icon: 'error',
    title: 'Login Failed',
    text: '{{ session('error') }}',
    confirmButtonColor: '#d33'
  });
</script>
@endif

</body>
</html>
