<?php
$title ="Cash0124";
ob_start();

include '../cash0124/include/navConnexion.php';

if(isset($_POST['connexion'])){

     $login = $_POST['login'];
       $pwd = $_POST['password'];

  if(!empty($login) && !empty($pwd)) { 

    require_once '/cash0124/include/database.php';
    
    $sqlstmt = $pdo -> prepare("SELECT * FROM users
                                WHERE login = ?
                                and password = ? ");

    $sqlstmt -> execute([$login,$pwd]);

    $user=$sqlstmt -> fetch(PDO::FETCH_ASSOC);

    $find=$sqlstmt->rowCount()>0;

    if($find){

      session_start();

      $_SESSION['user']= $user ; 
      
      //redirection vers front end ou admin
      header('location:../include/admin.php');    
            
    } else {
?>
    <div class="alert alert-danger" id="incorrects" role="alert">
          Login ou mot de passe incorrects
    </div>    
<?php
           }
   } else { 
?>
    <div class="alert alert-danger" id="obligatoires" role="alert">     
      Login et mot de passe sont obligatoires
    </div>
<?php
  }      
}
?>

<?php $content = ob_get_clean(); ?>
<?php include_once 'layout.php'?>