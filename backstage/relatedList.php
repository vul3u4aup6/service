<?php
session_start();
include_once ('../database.php');

$sql = 'SELECT * FROM related';
$result = mysqli_query($conn, $sql);

$relatedArray = array();
if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		$tmp = array();
		$tmp["id"] = $row["id"];
		$tmp["name"] = $row["name"];
		$tmp["img"] = $row["img"];
		$tmp["website"] = $row["website"];
		$relatedArray[] = $tmp;
	}
}
$conn->close();
?>
<html>
<!DOCTYPE html>
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
					<h1>關係企業管理</h1>
					<form method="post" action="relatedCreate.php" style="display: inline;">
						<button type="submit" class="optionBtn btn btn-default">新增關係企業</button>
					</form>
				</div>
				<ol class="breadcrumb">
					<li><a href="/clc/backstage/classList.php">首頁</a></li>
					<li class="active">關係企業管理</li>
				</ol>
				<table class="table table-striped">
					<thead>
						<th>#</th>
						<th>企業名稱</th>
						<th>圖片</th>
						<th>管理</th>
					</thead>
					<tbody>
						<?php
						foreach ($relatedArray as $key => $value) {
							?>
							<tr class="bk_list">
								<td><?=$key+1?></td>
								<td><a href="<?=$value['website']?>" target="_blank"><?=$value['name']?></a></td>
								<td><img src="<?=$value['img']?>" style="width:200px;"></img></td>
								<td>
									<form method="post" action="relatedUpdate.php" style="display: inline;">
										<input type="hidden" value="<?=$value['id']?>" name="id">
										<input type="submit" value="修改" class="btn btn-default" name="updateBtn">
									</form>
									<form method="post" action="relatedDelete.php" style="display: inline;" onsubmit="return confirm('確定刪除?');">
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
			</div>
		</div>
	</div>
</body>
</html>
