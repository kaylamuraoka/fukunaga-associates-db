<!-- Include the page header -->
<?php
  include('layouts/header.php');
?>

<!-- This Page renders the Login Form content below -->
  <section id="login">
    <div class="row m-0">
        <div class="col-lg-12">
          <div class="text-center pb-5">
            <h1 class="login-title text-dark">Login</h1>
            <p class="p-1 m-0 font-ubuntu text-black-50">Login and enjoy additional features</p>
            <span class="font-ubuntu text-black-50">Create an <a href="register.php">account</a></span>
          </div>
          <!-- Upload Photo Section -->
          <div class="upload-profile-image d-flex justify-content-center pb-5">
            <div class="text-center">
              <img src="../assets/images/profile/default_avatar.png" style="width:200px; height:200px"
                class="img rounded-circle" alt="profile">
            </div>
          </div>
          <div class="d-flex justify-content-center">
            <!-- Login Form -->
            <form action="https://fukunaga-associates-db.herokuapp.com/login.php" method="POST" enctype="multipart/form-data" id="log-form">

              <div class="form-row my-4">
                <div class="col">
                  <input type="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" required name="email" id="email" class="form-control" placeholder="Email">
                </div>
              </div>

              <div class="form-row my-4">
                <div class="col">
                  <input type="password" required name="password" id="password" class="form-control"
                    placeholder="Password">
                  <small id="pwd-strength" class="text-danger">
                    <ul>
                      <!-- Insert any errors here -->
                    </ul>
                  </small>
                </div>
              </div>

              <div class="submit-btn text-center my-5">
                <button type="submit" class="btn btn-warning rounded-pill text-dark px-5">Login</button>
              </div>

            </form>
          </div>
        </div>
      </div>

  </section>

  <div class="modal-dialog text-center">
    <div class="col-sm-8 main-section">
      <div class="modal-content">
        <div class="col-12 user-img">
          <img src="./../images/user-avatar.jpg">
        </div>
        <form action = "" class="col-12" method="POST">
          <!-- Email Input Fields -->
          <div class="form-group">
            <i class="fas fa-user"></i>
            <input type="text" name="email" class="form-control" placeholder="Enter Email" required>
          </div>
          <!-- Password Input Fields -->
          <div class="form-group">
            <i class="fas fa-lock"></i>
            <input type="text" name="password" class="form-control" placeholder="Enter Password" required>
          </div>
          <!-- Login Button -->
          <button type="submit" name="login-btn" class="btn"><i class="fas fa-sign-in-alt icon"></i>Login</button>
          <!-- Forgot Password Link -->
          <div class="col-12 forgot">
            <a>Forgot Password?</a>
          </div>
        </form>
      </div>
    </div>
  </div>

<!-- Include page footer -->
<?php
  include("layouts/footer.php");
?>