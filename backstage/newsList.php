<?php
include_once ('../database.php');
include_once ('function.php');

$sql = 'SELECT * FROM billboard';
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
		$tmp["n_id"] = $row["b_id"];
		$tmp["n_date"] = $row["b_posttime"];
		$tmp["n_title"] = $row["b_title"];
		$tmp["n_address"] = $row["b_class"];
		$tmp["starttime"] = $row["b_starttime"];
		$tmp["endtime"] = $row["b_endtime"];
		$tmp["hot"] = $row["b_hot"];
		
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
					<h1>公佈欄管理</h1>
					<form method="post" action="newsCreate.php" style="display: inline;">
						<button type="submit" class="optionBtn btn btn-default">新增消息</button>
					</form>
				</div>
				<ol class="breadcrumb">
					<li><a href="/service/backstage/classList.php">首頁</a></li>
					<li class="active">消息管理</li>
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
						<th>消息標題</th>
						<th>置頂</th>
						
						<th>開始時間</th>
						<th>結束時間</th>
						
						<th>消息分類</th>
					</thead>
					<tbody>
						<?php
						foreach ($newsArray as $key => $value) {
							?>
							<tr class="bk_list">
								<td><?=(($page-1)*$per)+$key+1?></td>
								<td><?=$value['n_title']?></td>
								<td><?=$value['hot']?></td>
								
								<td><?=$value['starttime']?></td>
								<td><?=$value['endtime']?></td>
								
								<td><?=$value['n_address']?></td>
								<td>
									<form method="post" action="newsdetail.php?id=<?=$value['n_id']?>" style="display: inline;">
										<input type="hidden" value="<?=$value['n_id']?>" name="id">
										<input type="submit" value="修改" class="btn btn-default" name="updateBtn">
									</form>
									<form method="post" action="newsDelete.php" style="display: inline;" onsubmit="return confirm('確定刪除?');">
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
