<?php
require_once '../config/config.php';
require_once '../config/db.php';

// sql select
$sql = 'SELECT id,name FROM departments order by id desc';
// run sql
$results = $db->query($sql);
// get all data to $rows 
$rows = $results->fetch_all(MYSQLI_ASSOC);

// get input from user 
//print_r($_POST);
if(isset($_POST['submit'])){
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $dep_id = $_POST['dep_id'];
  $password = $_POST['password'];
  $role = $_POST['role'];
  $address = $_POST['address'];
  $id = time();

  $password = password_hash($password,PASSWORD_DEFAULT);

  $sql = "INSERT INTO users (id,fullname,email,dep_id,password,role,address) 
   VALUES ($id,'$fullname','$email','$dep_id','$password','$role','$address')";
  echo $sql;
  $db->query($sql);
  echo 'add user success';
  
}
?>


<form action="" method="post">
<h3>Form Add user </h3>
  <input type="text" name="fullname" placeholder="Fullname">
  <input type="text"  name="email"  placeholder="Email">
  <input type="text"  name="password"  placeholder="password">
  <select name="role">
    <option value="user">User</option>
    <option value="manager">Manager</option>
    <option value="admin">Super admin</option>
  </select>
  
  <h5>Department</h5>
  <select name="dep_id">
    <?php
    foreach ($rows as $row) {
      echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
    }
    ?>
  </select>
   
  <textarea name="address"  placeholder="Address"></textarea>
  
  <button type="submit"  name="submit" value="Add user">submit</button>
  <a href="<?php echo BASE_URL ?>/user">Cancel</a>
</form>

<style>
  form {
    max-width: 500px;
    margin:0 auto;
  }
  form input, form select, form textarea{
    display: block;
    margin-bottom: 10px;
  }
</style>
