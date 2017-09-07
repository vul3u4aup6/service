<?php
session_start();
include_once ('../database.php');
unset($_SESSION['tmp_class_name']);
$show = TRUE;
$sql = 'SELECT * FROM method';
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

$classArray = array();
if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		$tmp = array();
		$tmp["I_id"] = $row["sm_id"];
		$tmp["I_name"] = $row["sm_title"];
		$tmp["I_img"] = $row["sm_pdfpath"];
		$tmp["class"] = $row["sm_class"];
		
		$classArray[] = $tmp;
	}
}
$conn->close();
?>
<html>
<!DOCTYPE html>
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
					<h1>相關辦法</h1>
					<form method="post" action="scmethodCreate.php" style="display: inline;">
						<button type="submit" class="optionBtn btn btn-default">新增辦法</button>
					</form>
				</div>
				<ol class="breadcrumb">
					<li><a href="/service/backstage/classList.php">首頁</a></li>
					<li class="active">相關辦法</li>
				</ol>
				<table class="table table-striped">
					<thead>
						<th>#</th>
						<th>辦法名稱</th>
						<th>檔案名稱</th>
						<th>辦法分類</th>
						<th>管理</th>
					</thead>
					<tbody>
						<?php
						foreach ($classArray as $key => $value) {
							?>
							<tr class="bk_list">
								<td><?=(($page-1)*$per)+$key+1?></td>
								<td><?=$value['I_name']?></td>
								<td><?=$value['I_img']?></td>
								<td><?=$value['class']?></td>
								
								<td>
									<form method="post" action="scmethodUpdate.php" style="display: inline;">
										<input type="hidden" value="<?=$value['I_id']?>" name="id">
										<input type="submit" value="修改" class="btn btn-default" name="updateBtn">
									</form>
									<form method="post" action="scmethodDelete.php" style="display: inline;" onsubmit="return confirm('確定刪除?');">
										<input type="hidden" value="<?=$value['I_id']?>" name="id">
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
							<!-- <li><a href="#">4</a></li>
							<li><a href="#">5</a></li> -->
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
