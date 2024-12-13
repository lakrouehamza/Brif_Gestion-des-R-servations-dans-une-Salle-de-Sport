<?php
$connect=  mysqli_connect("localhost","root","12345","bibloiteque");
if(mysqli_connect_errno()){
    die("cannot connect to database field:". mysqli_connect_error());
    
}
 else {
     // echo 'Database is connected';  
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add activite </title>

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
                <label for="nom" class="block text-gray-700 font-semibold">Nom de l'activité</label>
                <input type="text" id="nom" name="nom" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="descriptionA" class="block text-gray-700 font-semibold">Description</label>
                <textarea id="descriptionA" name="descriptionA" rows="4" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required></textarea>
            </div>

 
            <div class="mb-4">
                <label for="capacite" class="block text-gray-700 font-semibold">Capacité</label>
                <input type="text" id="capacite" name="capacite" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
            </div>

     
            <div class="mb-4">
                <label for="date_fin" class="block text-gray-700 font-semibold">Date de fin</label>
                <input type="date" id="date_fin" name="date_fin" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
            </div>

=
            <div class="mb-6">
                <label for="disponibilite" class="block text-gray-700 font-semibold">Disponibilité</label>
                <select id="disponibilite" name="disponibilite" class="w-full px-4 py-2 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                    <option value="1">Disponible</option>
                    <option value="0">Indisponible</option>
                </select>
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
  $descriptionA=$_POST['descriptionA'];
  $capacite =$_POST['capacite'];
  // $date_debu =$_POST['date_debu'];
  $date_fin =$_POST['date_fin'];
  $disponibilite =$_POST['disponibilite'];
   $query="insert into activite(nom,descriptionA,capacite,date_debu,date_fin,disponibilite) values('$nom','$descriptionA','$capacite', now(),'$date_fin','$disponibilite');";
        $result=  mysqli_query($connect, $query);
    
        if( $result){
            // echo '</br>Data is inerted';
        } 
 else {
die("Database query failed. " . mysqli_error($connection));
 }
}
       
?>


</body>
</html>
<?php
//5 close connection
mysqli_close($connect);
?>