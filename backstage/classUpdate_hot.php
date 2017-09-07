<?php
include_once ('../database.php');
include_once ('function.php');
if(isset($_POST['id'])){
	$id = $_POST['id'];
	$hot = $_POST['hot'];
	if(isset($_POST['hot'])){
		$sql = 'UPDATE image SET `I_hot` = 1 WHERE `I_id` = "'.$id.'"';
	}else{
		$sql = 'UPDATE image SET `I_hot` = 0 WHERE `I_id` = "'.$id.'"';
	}
	$result = mysqli_query($conn, $sql);
	$conn->close();
	header('Location: classList.php');
    exit;
}
?>