<?php
$show = TRUE;
include_once ('function.php');
include_once ('../database.php');
// 抓取產品分類代碼及名稱
$error = array();

if (isset($_POST['createBtn'])) {
	// 表單驗證
	$formError = 0;
	$name = $_POST['name'];
	$website = $_POST['website'];
	// 上傳圖片驗證
	if ($_FILES["imgFile"]["error"] > 0){
		$error[] = upload_error_list($_FILES["imgFile"]["error"]);
	}

	if($formError == 0){
		// 上傳圖片
		$img = upload_file_by_related();

		if($img != FALSE){
				// 插入資料庫
			$sql = 'INSERT INTO related(`name`, `website`, `img`) VALUES ("'.$name.'", "'.$website.'", "'.$img.'")';
			$result = mysqli_query($conn, $sql);

			$conn->close();
			$show = FALSE;

			$success = '新增成功';
			header('Location: relatedList.php');
			exit;
		}
	}else{

	}
}
if($show){
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
					<h1>新增關係企業</h1>
					<ol class="breadcrumb">
						<li><a href="/clc/backstage/classList.php">首頁</a></li>
						<li><a href="#">關係企業管理</a></li>
						<li class="active">新增關係企業</li>
					</ol>
					<div>
						<?php
						if (!empty($error)) {
							foreach ($error as $key => $value) {
								echo '<div class="alert-danger alert alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>'.$value.'</div>';
							}
						}
						?>
						<form action="#" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label>企業名稱</label>
								<input type="text" class="form-control" id="name" placeholder="企業名稱" name="name" required value="<?=(isset($name))?$name:''?>">
							</div>
							<div class="form-group">
								<label>企業網站網址</label>
								<input type="text" class="form-control" id="website" placeholder="企業網站網址" required name="website" value="<?=(isset($name))?$name:''?>">
							</div>
							<label>代表圖片</label>
							<div class="form-group">
								<input type="file" name="imgFile" id="imgInp">
								<img id="blah" src="#" style="display:none;width:100px;">

							</div>
							<div>
								<button type="submit" class="btn btn-default" name="createBtn">送出</button>
								<a onclick="javascript:window.location='relatedList.php'" class="btn btn-default">取消</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
	<script type="text/javascript" src="../js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="../js/tinymce/jquery.tinymce.min.js"></script>
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
	</html>
	<?php
}
?>