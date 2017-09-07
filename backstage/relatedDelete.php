<?php
include_once ('../database.php');
include_once ('function.php');
if (isset($_POST['deleteBtn'])) {
	$id = $_POST['id'];
	$related_data = get_related($id, $conn);

	unlink($related_data["img"]);

	$sql = 'DELETE FROM related WHERE `id`="'.$id.'"';
	$result = mysqli_query($conn, $sql);
}
header('Location: relatedList.php');
exit;
?>