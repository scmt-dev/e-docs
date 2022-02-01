<?php
session_start();
require_once 'config/db.php';
$ms = '';
// check login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // check email
    $sql = "SELECT * FROM users WHERE email = ? ";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
   
    if ($result->num_rows > 0) {
      $row = $result->fetch_object();
        
        if (password_verify($password, $row->password)) {
            
            $_SESSION['user_id'] = $row->id;
            $_SESSION['user_email'] = $row->email;
            $_SESSION['user_fullname'] = $row->fullname;
            // set user role
            $_SESSION['user_role'] = $row->role;
            // check role admin or user to redirect page
            if($row->role=== 'admin'){
              header('location: admin');
              exit();
            }else{
              header('location: index.php');
              exit();
            }
        } else {
            $ms = '<div class="alert alert-danger">Singin Fail</div>';
        }
    } else {
        $ms = '<div class="alert alert-danger">Singin Fail</div>';
    }
}
include_once 'header.php';

?>
  
  <main class="form-signin">
  <form method="post" action="">
    <img class="mb-4" src="assets/images/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input type="email" name="email"  class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <?php echo $ms; ?>
    <button class="w-100 btn btn-lg btn-primary" value="login" name="login" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
  </form>
</main>
<?php
include_once 'footer.php';
?>
