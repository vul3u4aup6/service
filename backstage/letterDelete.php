<?php
if (isset($_POST['deleteBtn'])) {
	include_once ('../database.php');
	$id = $_POST['id'];
	$sql = 'DELETE FROM newsletter WHERE `n_id`="'.$id.'"';
	$result = mysqli_query($conn, $sql);
	$conn->close();
}
header('Location: newsList.php');
exit;
?>