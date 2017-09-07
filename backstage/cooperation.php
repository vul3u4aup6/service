<?php
include_once ('../database.php');
include_once ('function.php');

$sql = 'SELECT * FROM cooperation';
$result = mysqli_query($conn, $sql);

$data_nums = mysqli_num_rows($result);
$per = 10;
$pages = ceil($data_nums/$per);
if (!isset($_GET["page"])){ 
	$page=1;
} else {  
	$page = intval($_GET["page"]);
}
$start = ($page-1)*$per;
$result = mysqli_query($conn, $sql.' LIMIT '.$start.', '.$per) or die("Error");  

$newsArray = array();
if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		$tmp = array();
		$tmp["n_id"] = $row["cp_id"];
		$tmp["n_number"] = $row["cp_number"];
		$tmp["n_date"] = $row["cp_phone"];
		$tmp["n_title"] = $row["cp_title"];
		$tmp["n_address"] = $row["cp_address"];
		$newsArray[] = $tmp;
	}
}
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
	<title>PUSLC後臺管理</title>
	<meta charset="UTF-8">
	<link href="images/favicon.ico" rel="Shortcut Icon" type="image/x-icon">
</head>
<body>
	<?php include("header.php");?>
	<div class="container-fluid" style="margin-top:70px;">
		<div class="row">
			<?php include("sideNav.php");?>
			<div class="col-md-9">
				<div class="option">
					<h1>機構簡介</h1>
					<form method="post" action="cooperationCreate.php" style="display: inline;">
						<button type="submit" class="optionBtn btn btn-default">新增機構簡介</button>
					</form>
				</div>
				<ol class="breadcrumb">
					<li><a href="/service/backstage/classList.php">首頁</a></li>
					<li class="active">機構簡介</li>
				</ol>
				<?php
				$success_msg = get_flash('success_msg');
				if($success_msg != FALSE){
					echo '<div class="alert-success alert alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>'.$success_msg.'</div>';
				}
				?>
				<table class="table table-striped">
					<thead>
						<th>#</th>
						<th>機構編號</th>
						<th>機構簡介</th>
						<th>機構電話</th>
						<th>機構住址</th>
					</thead>
					<tbody>
						<?php
						foreach ($newsArray as $key => $value) {
							?>
							<tr class="bk_list">
								<td><?=(($page-1)*$per)+$key+1?></td>
								<td><a ><?=$value['n_number']?></a></td>
								<td><a ><?=$value['n_title']?></a></td>
								<td><?=$value['n_date']?></td>
								<td><?=$value['n_address']?></td>
								<td>
									<form method="post" action="cooperationUpdate.php" style="display: inline;">
										<input type="hidden" value="<?=$value['n_id']?>" name="id">
										<input type="submit" value="修改" class="btn btn-default" name="updateBtn">
									</form>
									<form method="post" action="cooperationDelete.php" style="display: inline;" onsubmit="return confirm('確定刪除?');">
										<input type="hidden" value="<?=$value['n_id']?>" name="id">
										<input type="submit" value="刪除" class="btn btn-default" name="deleteBtn">
									</form>
								</td>
							</tr>
							<?php
						}
						?>
					</tbody>
				</table>
				<center>
					<nav>
						<ul class="pagination">
							<li>
								<a href="?page=1" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
								</a>
							</li>
							<?php  
							for( $i=1 ; $i<=$pages ; $i++ ) {  
								if ( $page-3 < $i && $i < $page+3 ) {  
									echo "<li><a href=?page=".$i.">".$i."</a></li>";  
								}  
							}   
							?>
							<li>
								<a href="?page=<?=$pages?>" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
								</a>
							</li>
						</ul>
					</nav>
				</center>
			</div>
		</div>
	</div>
</body>
</html>
