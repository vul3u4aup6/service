<?php
if (isset($_POST['deleteBtn'])) {
	include_once ('../database.php');
	$id = $_POST['id'];
	$sql = 'DELETE FROM teacher_detail WHERE `td_id`="'.$id.'"';
	$result = mysqli_query($conn, $sql);
	$conn->close();
}
header('Location: teacher_detail.php');
exit;
?>