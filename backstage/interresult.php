<?php
include_once ('../database.php');
include_once ('function.php');

$sql = 'SELECT * FROM interresult';
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
		$tmp["n_id"] = $row["ir_id"];
		$tmp["n_date"] = $row["ir_time"];
		$tmp["n_title"] = $row["ir_title"];
		$tmp["n_member"] = $row["ir_member"];
		$newsArray[] = $tmp;
	}
}

$sql1 = 'SELECT * FROM resultint';
$result1 = mysqli_query($conn, $sql1);

$data_nums1 = mysqli_num_rows($result1);
$per = 10;
$pages1 = ceil($data_nums1/$per);
if (!isset($_GET["page1"])){ 
	$page1=1;
} else {  
	$page1 = intval($_GET["page1"]);
}
$start1 = ($page1-1)*$per;
$result1 = mysqli_query($conn, $sql1.' LIMIT '.$start1.', '.$per) or die("Error");  

$newsArray1 = array();
if (mysqli_num_rows($result1) > 0) {
	while($row1 = mysqli_fetch_assoc($result1)) {
		$tmp1 = array();
		$tmp1["n_id"] = $row1["re_id"];
		
		$tmp1["n_content"] = $row1["re_content"];
		$newsArray1[] = $tmp1;
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
					<h1>國際志工成果</h1>
					<form method="post" action="interresultCreate.php" style="display: inline;">
						<button type="submit" class="optionBtn btn btn-default">新增成果</button>
					</form>
				</div>
				<ol class="breadcrumb">
					<li><a href="/service/backstage/classList.php">首頁</a></li>
					<li class="active">國際志工成果</li>
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
						<th>成果簡介</th>
					
					</thead>
					<tbody>
						<?php
						
						foreach ($newsArray1 as $key => $value) {
							?>
							<tr class="bk_list">
								<td><?=(($page-1)*$per)+$key+1?></td>
								<td><a ><?=$value['n_content']?></a></td>
								
								<td>
									<form method="post" action="introductionUpdate.php" style="display: inline;">
										<input type="hidden" value="<?=$value['n_id']?>" name="id">
										<input type="submit" value="修改" class="btn btn-default" name="updateBtn">
									</form>
									
								</td>
							</tr>
							<?php
						}
						?>
					</tbody>
				</table>
				<table class="table table-striped">
					<thead>
						<th>#</th>
						<th>成果標題</th>
						<th>服務期間</th>
						<th>參與成員</th>
					</thead>
					<tbody>
						<?php
						foreach ($newsArray as $key => $value) {
							?>
							<tr class="bk_list">
								<td><?=(($page-1)*$per)+$key+1?></td>
								<td><a ><?=$value['n_title']?></a></td>
								<td><?=$value['n_date']?></td>
								<td><?=$value['n_member']?></td>
								<td>
									<form method="post" action="interresultUpdate.php" style="display: inline;">
										<input type="hidden" value="<?=$value['n_id']?>" name="id">
										<input type="submit" value="修改" class="btn btn-default" name="updateBtn">
									</form>
									<form method="post" action="interresultDelete.php" style="display: inline;" onsubmit="return confirm('確定刪除?');">
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
