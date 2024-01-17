<?php
$title ="Inscription";
ob_start();
?>

<?php include '../include/navConnexion.php';?>

<?php

    if(isset($_POST['add'])){

      $login= $_POST['login'];
      $pwd= $_POST['password'];

      $date = date( format:'Y-m-d');

      if(!empty($login) && !empty($pwd)){

      require_once '../include/database.php';

      $sql ="CREATE TABLE IF NOT EXISTS users (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        login VARCHAR(30) NOT NULL,
        password  VARCHAR(30) NOT NULL,      
        created_at DATETIME  
           )";

      $pdo -> exec($sql);

      $sql =" INSERT INTO users (login, password,created_at)
        VALUES (?,?,?);    
            ";      

      $sqlstm = $pdo -> prepare($sql);
                                
      $sqlstm -> execute([$login,$pwd,$date]);

      //Redirection 
       header('location:..\index.php');
        
      } else
      {
      ?>      

      <div class="alert alert-danger" role="alert">
        Login et mot de passe sont obligatoires
      </div>

      <?php      
      }
    }

?>   

  <form method="post">

    <label class="form-label">Login</label>
    <input type="text" class="form-control" name="login">

    <label class="form-label">Password</label>
    <input type="password" class="form-control" name="password">

    <input type="submit" value="Inscription" class="btn btn-primary my-2" name="add">

  </form>    


<?php $content = ob_get_clean(); ?>
<?php include_once '../layout.php'?>