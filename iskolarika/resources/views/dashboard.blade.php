<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard | Iskolarika</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
  @include('layouts.partials.header')

  <div class="container mt-5">
    <div class="alert alert-success">
      Welcome, {{ Auth::user()->name }}!
    </div>

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Dashboard</h5>
        <p class="card-text">You have successfully logged in. Start managing your scholarship system here.</p>
        
        <a href="#" class="btn btn-danger" onclick="confirmLogout()">Logout</a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </div>
    </div>
  </div>

  @include('layouts.partials.footer')

  <script>
    function confirmLogout() {
      Swal.fire({
        title: 'Are you sure?',
        text: "You will be logged out from the session.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, logout',
        cancelButtonText: 'Cancel'
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById('logout-form').submit();
        }
      });
    }
  </script>
</body>
</html>
