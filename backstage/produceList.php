<?php
session_start();
include_once ('../database.php');
unset($_SESSION['produce_id']);

$sql = 'SELECT * FROM produce';
$result = mysqli_query($conn, $sql);

$data_nums = mysqli_num_rows($result);
$per = 5;
$pages = ceil($data_nums/$per);
if (!isset($_GET["page"])){ 
	$page=1;
} else {  
	$page = intval($_GET["page"]);
}
$start = ($page-1)*$per;
$result = mysqli_query($conn, $sql.' LIMIT '.$start.', '.$per) or die("Error");  

$produceArray = array();
if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		$tmp = array();
		$tmp["id"] = $row["id"];
		$tmp["name"] = $row["name"];
		$tmp["catalog"] = $row["catalog"];
		$tmp["img"] = $row["img"];
		$tmp["introduction"] = $row["introduction"];
		$tmp["characteristic"] = $row["characteristic"];
		$tmp["class_id"] = $row["class_id"];

		$produceArray[] = $tmp;
	}
} else {
	echo "0 results";
}
$conn->close();
?>
<html>
<head>
	<title>後臺管理</title>
	<meta charset="UTF-8">
</head>
<body>
	<?php include("header.php");?>
	<div class="container-fluid" style="margin-top:70px;">
		<div class="row">
			<?php include("sideNav.php");?>
			<div class="col-md-9">
				<div class="option">
					<h1>產品管理</h1>
					<form method="post" action="produceCreate.php" style="display: inline;">
						<input type="submit" value="新增產品" class="optionBtn btn btn-default">
					</form>
				</div>
				<ol class="breadcrumb">
					<li><a href="/clc/backstage/classList.php">首頁</a></li>
					<li class="active">產品管理</li>
				</ol>
				<table class="table table-striped">
					<thead>
						<th>#</th>
						<th>產品名稱</th>
						<th>代表圖片</th>
						<th>管理</th>
					</thead>
					<tbody>
						<?php
						foreach ($produceArray as $key => $value) {
							?>
							<tr class="bk_list">
								<td><?=(($page-1)*$per)+$key+1?></td>
								<td><?=$value['name']?></td>
								<td class="listImg" style="background-image:url('<?=$value['img']?>')"></td>
								<td>
									<form method="post" action="produceUpdate.php" style="display: inline;">
										<input type="hidden" value="<?=$value['id']?>" name="id">
										<input type="submit" value="修改內文" class="btn btn-default" name="updateBtn">
									</form>
									<form method="post" action="produceUpdateImg.php" style="display: inline;">
										<input type="hidden" value="<?=$value['id']?>" name="id">
										<input type="submit" value="重新上傳圖片" class="btn btn-default" name="updateBtn">
									</form>
									<form method="post" action="produceUpdateFile.php" style="display: inline;">
										<input type="hidden" value="<?=$value['id']?>" name="id">
										<input type="submit" value="重新上傳型錄" class="btn btn-default" name="updateBtn">
									</form>
									<form method="post" action="produceDelete.php" style="display: inline;" onsubmit="return confirm('確定刪除?');">
										<input type="hidden" value="<?=$value['id']?>" name="id">
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
