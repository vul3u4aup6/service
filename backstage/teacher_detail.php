<?php
include_once ('../database.php');
include_once ('function.php');

$sql = 'SELECT * FROM teacher_detail ';
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
		$tmp["n_id"] = $row["td_id"];
		$tmp["class"] = $row["td_class"];
		$tmp["name"] = $row["td_name"];
		$tmp["position"] = $row["td_position"];
		$tmp["phone"] = $row["td_phone"];
		$tmp["mail"] = $row["td_mail"];
		$tmp["space"] = $row["td_space"];
		
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
					<h1>師資陣容(細項)</h1>
					<form method="post" action="teacher_detailCreate.php" style="display: inline;">
						<button type="submit" class="optionBtn btn btn-default">新增師資陣容(細項)</button>
					</form>
				</div>
				<ol class="breadcrumb">
					<li><a href="/service/backstage/classList.php">首頁</a></li>
					<li class="active">師資陣容(細項)</li>
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
						<th>系所</th>
						<th>姓名</th>
						<th>職稱</th>
						<th>校內電話</th>
						<th>信箱</th>
						<th>上課時間/上課地點</th>
						
						<th>管理</th>
						
					</thead>
					<tbody>
						<?php
						foreach ($newsArray as $key => $value) {
							?>
							<tr class="bk_list">
								<td><?=(($page-1)*$per)+$key+1?></td>
								<td><?=$value['class']?></td>
								
								<td><?=$value['name']?></td>
								<td><?=$value['position']?></td>
								<td><?=$value['phone']?></td>
								<td><?=$value['mail']?></td>
								<td><?=$value['space']?></td>
							
								
								<td>
									<form method="post" action="teacher_detailUpdate.php" style="display: inline;">
										<input type="hidden" value="<?=$value['n_id']?>" name="id">
										<input type="submit" value="修改" class="btn btn-default" name="updateBtn">
									</form>
									<form method="post" action="teacher_detailDelete.php" style="display: inline;" onsubmit="return confirm('確定刪除?');">
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
