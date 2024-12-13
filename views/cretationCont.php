<?php
$connect=  mysqli_connect("localhost","root","12345","bibloiteque");
if(mysqli_connect_errno()){
    die("cannot connect to database field:". mysqli_connect_error());
    
}
 else {
     echo 'Database is connected';  
}
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
                id="nom" type="text" placeholder="Enter your name" name="nom">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="prenom">
               laste Name
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="prenom"  name="prenom" type="text" placeholder="Enter your name">
        </div>

        <div class="mb-4"> 
            <label class="block text-gray-700 font-bold mb-2" for="email">
                Email
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="email" type="email" name="email" placeholder="Enter your email">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="phone">
                Phone Number
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="phone" type="tel" name="phone" placeholder="Enter your phone number">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="activite">
                activite
            </label>
            <select
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="activite" name="activite">
                <option value="">Select a service</option>
                <option value="haircut">Haircut</option>
                <option value="coloring">Coloring</option>
                <option value="styling">Styling</option>
                <option value="facial">Facial</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="date">
                Date
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="date" type="date" name="dateR" placeholder="Select a date">
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
            echo '</br>Data is inerted';
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

 $nom=$_POST['nom'];
  $prenom=$_POST['prenom'];
  $email =$_POST['email'];
  $phone =$_POST['phone'];
  $dateR =$_POST['dateR'];
   $query="insert into  reservation(id_client,id_activite,date_resevation,statut)
           values(1,1,'01/01/2025','active');";
        $result=  mysqli_query($connect, $query);
    
        if( $result){
            echo '</br>Data is inerted';
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