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
		if ($_FILES["imgFile"]["error"] > 0){
			$error[] = upload_error_list($_FILES["imgFile"]["error"]);
			$formError++;
		}

		if($formError == 0){
			$id = $_POST['id'];
			$origin_img = $_POST['origin_img'];

			// 上傳圖片
			$img = upload_file_by_img();
			if($img != FALSE){
				$sql = 'UPDATE produce SET `img` = "'.$img.'" WHERE `id` = "'.$id.'"';

				$result = mysqli_query($conn, $sql);
				$_SESSION['success_msg'] = '修改圖片成功';	
				// 移除舊檔案	
				unlink($origin_img);
				header('Location: produceUpdateImg.php');
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
						<label>目前圖片</label>

						<div class="form-group">
							<img src="<?=$produce_data["img"]?>">
							<input type="hidden" value="<?=$produce_data["img"]?>" name="origin_img">
						</div>

						<div class="form-group">
							<label>更換圖片</label>
							<input type="file" name="imgFile" id="imgInp">
							<img id="blah" src="#" style="display:none;width:500px;">
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
<script type="text/javascript">
	// 即時預覽
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#blah').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	$("#imgInp").change(function(){
		readURL(this);
		$('#blah').show();
	});
	
	</script>
