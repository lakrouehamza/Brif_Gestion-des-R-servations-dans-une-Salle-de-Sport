<?php
$mysqli = new mysqli("localhost","root","12345","bibloiteque");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    




        <form  method='POST'>
         <label> nom </label>
         <input type="text" name="nom">
         <label> prenom </label>
         <input type="text" name="prenom" >
         <label>email</label>
         <input type="email" name="email"/>
         <label> telephone </label>
         <input type="text" name="telephone">
        <input type="submit" name='submit' value="Submit">
         </form>

</body>
</html>
    <?php 
              // button click  
            if (isset($_POST['prenom'])) { 
              
             $nom=$_POST["nom"];
              $prenom=$_POST['prenom'];
              $email=$_POST['email'];
              $telephone=$_POST['telephone'];
            $sql = "INSERT into client (nom,prenom,email,telephone) values(?,?,?,?)";
            $res = $mysqli->prepare($sql);
            $res->execute([$nom,$prenom,$email,$telephone]);
            $res->close();
              
                 
}
        ?>





