<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'templates/assets.php'; ?>
</head>
<body class="d-flex justify-content-center">
  <div class="col-md-3 p-4" style="margin-top: 120px">
    <form action="includes/auth/login.php" method="post">
      <div class="text-center mb-4">
        <h4>Login</h4>
      </div>

      <div class="form-outline mb-4">
        <label class="form-label" for="email">Email</label>
        <input type="email" name="email" class="form-control" required/>
      </div>

      <div class="form-outline mb-4">
        <label class="form-label" for="password">Password</label>
        <input type="password" name="password" class="form-control" required/>
      </div>

      <div class="row mb-4">
        <div class="col d-flex justify-content-center">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="remember" checked/>
            <label class="form-check-label" for="remember"> Remember me </label>
          </div>
        </div>

        <div class="col">
          <a href="#">Lupa Password?</a>
        </div>
      </div>
      
      <button type="submit" class="btn btn-primary btn-block">Login</button>
    </form>
  </div>
</body>
</html>