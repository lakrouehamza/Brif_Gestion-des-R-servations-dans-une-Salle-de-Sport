<?php
$connect=  mysqli_connect("localhost","root","12345","bibloiteque");
if(mysqli_connect_errno()){
    die("cannot connect to database field:". mysqli_connect_error());
    
}
 else {
     // echo 'Database is connected';  
}
?>

<?php 
$messag_nom=$messag_prernom=$messag_email=$messag_phone=$messag_date=$messag_acticite="";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<header class="lg:px-16 px-4 bg-white flex flex-wrap items-center py-4 shadow-md">
    <div class="flex-1 flex justify-between items-center">
        <a href="#" class="text-xl">Company</a>
    </div>

    <label for="menu-toggle" class="pointer-cursor md:hidden block">
      <svg class="fill-current text-gray-900"
        xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
        <title>menu</title>
        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
      </svg>
    </label>
    <input class="hidden" type="checkbox" id="menu-toggle" />

    <div class="hidden md:flex md:items-center md:w-auto w-full" id="menu">
        <nav>
            <ul class="md:flex items-center justify-between text-base text-gray-700 pt-4 md:pt-0">
                <li><a class="md:p-4 py-3 px-0 block" href="cretationCont.php">Add reservation</a></li>
                <li><a class="md:p-4 py-3 px-0 block" href="listeResrvate.php">Les réservations</a></li>
                <li><a class="md:p-4 py-3 px-0 block" href="creatActivite.php">Add Activite</a></li>
            </ul>
        </nav>
    </div>
</header>



    <section class="">
        <div class="flex flex-wrap">
    <div class="w-full sm:w-8/12 mb-10">
      <div class="container mx-auto h-full sm:p-10">
        <nav class="flex px-4 justify-between items-center">
          
          
        </nav>
        <div class="max-w-md mx-auto mt-10 bg-white shadow-lg rounded-lg overflow-hidden">
    <div class="text-2xl py-4 px-6 bg-gray-900 text-white text-center font-bold uppercase">
        Book an Appointment
    </div>
    <form class="py-4 px-6" action="" method="POST">
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="nom">
                Name
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="nom" type="text" placeholder="Enter your name" name="nom"/>
                <?php echo $messag_nom; ?>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="prenom">
               laste Name
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="prenom"  name="prenom" type="text" placeholder="Enter your name" />
                 <?php echo $messag_prernom; ?>
        </div>

        <div class="mb-4"> 
            <label class="block text-gray-700 font-bold mb-2" for="email">
                Email
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="email" type="email" name="email" placeholder="Enter your email"/>
                <?php echo $messag_email; ?>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="phone">
                Phone Number
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="phone" type="tel" name="phone" placeholder="Enter your phone number"/>
                <?php echo $messag_phone; ?>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="activite">
                activite
            </label>
            <select
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="activite" name="activite">
                <option value="Select a service">Select a service</option>
                <?php 
                $commande = " select  * from activite ;";
                $resultE = mysqli_query($connect ,$commande);
                while($row=mysqli_fetch_assoc($resultE)){
                    echo '<option value="' . $row['nom'] . '">' . $row['nom'] . '</option>';

                }
                ?>
                

            </select>
            <?php echo $messag_acticite; ?>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="date">
                Date
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="date" type="date" name="dateR" placeholder="Select a date"/>
                <?php echo $messag_date; ?>
        </div>

        <div class="flex items-center justify-center mb-4">
            <button
                class="bg-gray-900 text-white py-2 px-4 rounded hover:bg-gray-800 focus:outline-none focus:shadow-outline"
                type="submit" name="conservation">
                conservation
            </button>
        </div>

    </form>
</div>
      </div>
    </div>
    <img src="https://images.unsplash.com/photo-1536147116438-62679a5e01f2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80" alt="Leafs" class="w-full h-48 object-cover sm:h-screen sm:w-4/12">
  </div>
    </section>
     <?php
        //2- insert from database
        
          // button click  
if (isset($_POST['conservation'])) { 

 $nom=$_POST['nom'];
  $prenom=$_POST['prenom'];
  $email =$_POST['email'];
  $phone =$_POST['phone'];
  $dateR =$_POST['dateR'];
   $query="insert into  client(nom,prenom,email,telephone) values('$nom','$prenom','$email','$phone');";
        $result=  mysqli_query($connect, $query);
    
        if( $result){
            // echo '</br>Data is inerted';
        } 
 else {
die("Database query failed. " . mysqli_error($connection));
 }
}
       
?>

             <?php
        //2- insert from database
        
          // button click  
if (isset($_POST['conservation'])) { 
    $valide = true;
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $email =$_POST['email'];
    $phone =$_POST['phone'];
    $dateR =$_POST['dateR'];
    $activite = $_POST['activite'];
    $valide =true;
//     if (!preg_match("/^[a-zA-Z\s]{5,30}$/", $nom)) {
//     $messag_nom = "Error in nom format";
//     $valide = false;
// }

//     if(!preg_match("/^[a-zA-Z\s]{5,30}$/", $prenom)){
//         $messag_prernom = "error prenom ";
//         $valide =false;
//     }
//     if(!preg_match("/^[a-zA-Z1-9\._]{5,30}+gmail.com$/", $email)){
//        $messag_email ="erore en";
//         $valide =false;
//     }
//     if(!preg_match("/^[0-9]{10}$/", $phone)){
//        $messag_phone ="eror";
//         $valide =false;
//     }


//     if($activite=="Select a service"){
//        $messag_acticite="erore ";
//         $valide =false;
//     }
  
// if($valide){
  $commandeIdClient = "select * from client where nom = '$nom' and prenom = '$prenom'";
  $arrayIDcleint = mysqli_query($connect ,$commandeIdClient);
  $rowIDCleint = mysqli_fetch_assoc($arrayIDcleint); 
  $commandeIdActivite ="select * from activite where nom = '$activite';";
  $arrayActivite = mysqli_query($connect , $commandeIdActivite);
  $rowActivite = mysqli_fetch_assoc($arrayActivite);
 $query = "insert into  reservation(id_client,id_activite,date_resevation,statut) 
          values ('" . $rowIDCleint['id'] . "', '" . $rowActivite['id'] . "', '" . $dateR . "', 'confirmée');";


        $result=  mysqli_query($connect, $query);
    
        if( $result){
            // echo '</br>Data is inerted';
        } 
 else {
die("Database query failed. " . mysqli_error($connection));
 }
}
// }
        ?>
</body>
</html>
<?php
//5 close connection
mysqli_close($connect);
?>