
<?php
$connection=mysqli_connect('localhost','root','mysql','laboratory');

if(isset($_GET['id'])){
		$getid=$_GET['id'];
            
	       $query3=mysqli_query($connection,"DELETE FROM user WHERE id='$getid'");

            header('Location: all_users.php');
			exit;
            }?>