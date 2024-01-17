<?php
$title ="Cash0124";

ob_start();
?>
<?php include '../cash0124/include/navInscription.php';?>

<form action="connexion.php" method="post" oninput="clear_alert()">

  <label class="form-label">Login</label>
  <input type="text" class="form-control" name="login">

  <label class="form-label">Password</label>
  <input type="password" class="form-control" name="password">

  <input type="submit" value="Connexion" class="btn btn-primary my-2" name="connexion" onfocus="myFunction()">
  
</form>


<script>
  function clear_alert(){       
    document.getElementById("incorrects").style.display = "none";
    document.getElementById("obligatoires").style.display = "none";
  }
</script>


<?php $content = ob_get_clean(); ?>
<?php include_once 'layout.php'?>

<?php
/*
echo "<pre>";
var_dump($_POST);
echo "</pre>";
*/
?>



