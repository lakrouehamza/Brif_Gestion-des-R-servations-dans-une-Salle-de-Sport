<?php
$connect=  mysqli_connect("localhost","root","12345","bibloiteque");
if(mysqli_connect_errno()){
    die("cannot connect to database field:". mysqli_connect_error());
    
}
 else {
     echo 'Database is connected';  
}
?>

$dateActi = "update   activite  set  disponibilite = 1 WHERE date_debu = date_fin;";
while(true){
mysqli_qeury($connect,$dateActi);
}
<?php 

while (true) {
	
}

?>


<?php
//5 close connection
mysqli_close($connect);
?>

<!-- 

create procedure  update_disponibiliteActivite()
begin
   update   activite  set  disponibilite = 1 WHERE date_debu = date_fin;
end; 
 -->
