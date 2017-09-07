<!DOCTYPE html>
<?php
include_once ('../database.php');
include_once ('function.php');
$classDate = getClass($conn);
// 進入修改頁面，先撈該筆資料
if (isset($_POST['id']) || isset($_SESSION['produce_id'])) {

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$_SESSION['produce_id'] = $id;
	}else{
		$id = $_SESSION['produce_id'];
	}

	$produce_data = get_produce($id, $conn);
	
	// 確定修改後，進行資料庫更新
	if(isset($_POST['saveBtn'])){
		// 表單驗證
		$formError = 0;
		// 上傳圖片驗證
		if ($_FILES["catalog"]["error"] > 0){
			$error[] = upload_error_list($_FILES["catalog"]["error"]);
			$formError++;
		}

		if($formError == 0){
			$id = $_POST['id'];
			$origin_catalog = $_POST['origin_catalog'];

			// 上傳圖片
			$catalog_name = $_FILES["catalog"]["name"];
			$catalog = upload_file_by_catalog();
			if($catalog != FALSE){
				$sql = 'UPDATE produce SET `catalog` = "'.$catalog.'", `catalog_name` = "'.$catalog_name.'" WHERE `id` = "'.$id.'"';

				$result = mysqli_query($conn, $sql);
				// 移除舊檔案	
				unlink($origin_catalog);
				
				$_SESSION['success_msg'] = '修改檔案成功';				
				header('Location: produceUpdateFile.php');
				exit;
			}
		}
	}
}else{
	header('Location: produceList.php');
	exit;
}
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
				<h1>修改產品</h1>
				<ol class="breadcrumb">
					<li><a href="#">首頁</a></li>
					<li><a href="#">產品管理</a></li>
					<li class="active">修改產品</li>
				</ol>
				<div>
					<?php
					if (!empty($error)) {
						foreach ($error as $key => $value) {
							echo '<div class="alert-danger alert alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>'.$value.'</div>';
						}
					}
					$success_msg = get_flash('success_msg');
					if($success_msg != FALSE){
						echo '<div class="alert-success alert alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>'.$success_msg.'</div>';
					}
					?>
					<form action="#" method="post" enctype="multipart/form-data">
						<input type="hidden" value="<?=$id?>" name="id">
						<label>目前型錄</label>
						<div class="form-group">
							<div class="alert alert-info" role="alert">
								<a href="<?=$produce_data["catalog"]?>" target="_blank"><?=$produce_data["catalog_name"]?></a>
							</div>
							<input type="hidden" value="<?=$produce_data["catalog"]?>" name="origin_catalog">
						</div>

						<div class="form-group">
							<label>更換型錄</label>
							<input type="file" name="catalog">
						</div>
					</div>			
					<div>
						<button type="submit" class="btn btn-default" name="saveBtn">送出</button>
						<a onclick="javascript:window.location='produceList.php'" class="btn btn-default">取消</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>
