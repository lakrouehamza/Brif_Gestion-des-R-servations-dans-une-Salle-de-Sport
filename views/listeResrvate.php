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






<table class="min-w-full divide-y divide-gray-200">
    <thead>
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Reservation Date</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">

<?php 
$commandlistRes = "select concat(c.nom, ' ', c.prenom) as nomPrenom, c.email, r.statut, r.date_resevation
                   from client c, reservation r
                   where c.id = r.id_client
                   group by r.id_client";
$liste = mysqli_query($connect, $commandlistRes);

while($row = mysqli_fetch_assoc($liste)) {
?>
    <tr>
        <td class="px-6 py-4 whitespace-nowrap"><?php echo $row['nomPrenom']; ?></td>
        <td class="px-6 py-4 whitespace-nowrap"><?php echo $row['email']; ?></td>
        <td class="px-6 py-4 whitespace-nowrap"><?php echo $row['date_resevation']; ?></td>
        <td class="px-6 py-4 whitespace-nowrap">
            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"><?php echo $row['statut']; ?></span>
        </td>
        <td class="px-6 py-4 whitespace-nowrap">
            <button class="px-4 py-2 font-medium text-white bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue active:bg-blue-600 transition duration-150 ease-in-out" name="edit_<?php echo $row['nomPrenom']; ?>">Edit</button>
            <button class="ml-2 px-4 py-2 font-medium text-white bg-red-600 rounded-md hover:bg-red-500 focus:outline-none focus:shadow-outline-red active:bg-red-600 transition duration-150 ease-in-out" name="delete_<?php echo $row['nomPrenom']; ?>">Delete</button>
        </td>
    </tr>
<?php } ?>

    </tbody>
</table>

</body>
</html>
<?php
//5 close connection
mysqli_close($connect);
?>