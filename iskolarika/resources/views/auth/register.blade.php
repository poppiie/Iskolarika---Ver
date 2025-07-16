<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Bicol University Scholarship Management System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet"/>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    
    html, body {
  height: 100%;
  overflow-y: auto;
}

.main-wrapper {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: calc(100vh - 160px); /* Use min-height instead */
  padding: 2rem 1rem;
  width: 100%;
  flex-grow: 1;
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

/* Fixed Footer */
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
    .panel-container {
      display: flex;
      flex-direction: row;
      max-width: 960px; /* ⬅️ Wider panel */
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
    }

    .btn-google img {
      height: 20px;
      margin-right: 10px;
    }

    @media (max-width: 768px) {
      .panel-container {
        flex-direction: column;
        box-shadow: none;
        border-radius: 0;
      }

      .left-panel,
      .right-panel {
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

<!-- Main Wrapper -->
<div class="main-wrapper">
  <div class="panel-container">
    <!-- Left Panel -->
    <div class="left-panel">
      <img src="{{ asset('images/iskolarika-panel.jpg') }}" alt="Iskolarika Panel" class="left-image">
    </div>

    <!-- Right Panel -->
    <div class="right-panel">
      <div class="auth-card">
        <h3 class="mb-2">Create an Account</h3>
        <p class="text-muted mb-4">Enter your details below</p>

        <form method="POST" action="/register">
  @csrf
  <!-- <div class="mb-3">
    <input type="text" class="form-control" name="name" placeholder="Full Name" required>
  </div> -->
  <div class="mb-3">
    <input type="email" class="form-control" name="email" placeholder="Email Address" required>
  </div>
  <div class="mb-3 input-group">
    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
    <span class="input-group-text" onclick="togglePassword()">
      <i class="bi bi-eye" id="toggleIcon"></i>
    </span>
  </div>
  <div class="mb-3 input-group">
    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
  </div>
  <button type="submit" class="btn btn-primary w-100 mb-3">Sign Up</button>
  <!-- <a href="{{ route('login') }}" class="btn btn-outline-secondary w-100">Already have an account? Sign in</a> -->
    <button type="button" class="btn btn-outline-secondary w-100 btn-google">
            <img src="https://developers.google.com/identity/images/g-logo.png" alt="Google logo">
            Sign in with Google
          </button>
</form>

@if (session('success'))
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Success!',
      text: '{{ session('success') }}',
      confirmButtonColor: '#3085d6',
      timer: 5000, // Auto-close after 5 seconds
      timerProgressBar: true,
    }).then((result) => {
      // Redirect whether they clicked OK or let it auto-close
      window.location.href = "{{ route('login') }}";
    });
  </script>
@endif


@if ($errors->any())
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Registration Failed',
      html: `{!! implode('<br>', $errors->all()) !!}`,
      confirmButtonColor: '#dc3545'
    });
  </script>
@endif


      </div>
    </div>
  </div>
</div>

<!-- Footer -->
@include('layouts.partials.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<script>
function togglePassword() {
  const password = document.getElementById('password');
  const icon = document.getElementById('toggleIcon');

  if (password.type === 'password') {
    password.type = 'text';
    icon.classList.remove('bi-eye');
    icon.classList.add('bi-eye-slash');
  } else {
    password.type = 'password';
    icon.classList.remove('bi-eye-slash');
    icon.classList.add('bi-eye');
  }
}
</script>

