<style>
  .footer-logo {
  height: 100px;   /* You can adjust the size */
  width: auto;    /* Maintains aspect ratio */
  margin-bottom: 10px;
}
</style>


<footer class="footer">
  <div class="container">
    <div class="row text-center text-md-start">
      <div class="col-md-4 mb-3">
       <img src="{{ asset('images/footer-logo.png') }}" alt="Iskolarika Panel" class="footer-logo">
        <strong>About</strong><br>
        Bicol University Office of Student Affairs and Services (OSAS)
      </div>
      <div class="col-md-4 mb-3">
        <strong>Contact Info</strong><br>
        1F, OSAS Building, Bicol University Main Campus, Legazpi Philippines<br>
        (+63) 9510168807<br>
        bu_osas@bicol-u.edu.ph<br>
        www.bicol-u.edu.ph
      </div>
      <div class="col-md-4 mb-3">
        <strong>Subscribe to our newsletter</strong><br>
        Monthly digest of what's new and exciting from us.<br>
        <form class="d-flex mt-2">
          <input type="email" class="form-control me-2" placeholder="Email address">
          <button type="submit" class="btn btn-primary">Subscribe</button>
        </form>
      </div>
    </div>
    <hr style="border: none; height: 1px; background-color: #ccc; opacity: 0.5;">
    <p class="text-center mt-3 mb-0">&copy; 2025 Bicol University Office of Student Affairs and Services</p>
  </div>
</footer>
