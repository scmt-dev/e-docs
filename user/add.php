<?php
require_once '../config/config.php';
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
  <textarea name="address"  name=""  placeholder="Address"></textarea>
  <a href="<?php echo BASE_URL ?>/user">Cancel</a>
  <button type="submit"  name="submit" value="Add user">submit</button>
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
