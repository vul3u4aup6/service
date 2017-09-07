<?php
include_once ('../database.php');
include_once ('function.php');
if (isset($_POST['deleteBtn'])) {
	$id = $_POST['id'];
	$produce_data = get_produce($id, $conn);

	unlink($produce_data["img"]);
	unlink($produce_data["catalog"]);

	$sql = 'DELETE FROM produce WHERE `id`="'.$id.'"';
	$result = mysqli_query($conn, $sql);
}
header('Location: produceList.php');
exit;
?>