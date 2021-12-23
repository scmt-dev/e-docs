<?php
require_once '../config/config.php';
require_once '../config/db.php';

// sql select
$sql = 'SELECT * FROM departments order by id desc';
// run sql
$results = $db->query($sql);
// get all data to $rows 
$rows = $results->fetch_all(MYSQLI_ASSOC);
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
  <select>
    <?php
    foreach ($rows as $row) {
      echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
    }
    ?>
  </select>
   
  <textarea name="address"  name=""  placeholder="Address"></textarea>
  
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
