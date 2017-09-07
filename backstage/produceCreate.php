<?php
$show = TRUE;
include_once ('function.php');
include_once ('../database.php');
// 抓取產品分類代碼及名稱
$classDate = getClass($conn);
$error = array();

if (isset($_POST['createBtn'])) {
	// 表單驗證
	$formError = 0;
	if($_POST['class_id'] != ''){
		$class_id = $_POST['class_id'];
	}else{
		$error[] = '產品分類必須選擇';
		$formError++;
	}

	if($_POST['name'] != ''){
		$name = $_POST['name'];
	}else{
		$error[] = '產品名稱必須填值';
		$formError++;
	}
	
	if($_POST['introduction'] != ''){
		$introduction = $_POST['introduction'];
	}else{
		$error[] = '產品簡介必須填值';
		$formError++;
	}

	if($_POST['characteristic'] != ''){
		$characteristic = $_POST['characteristic'];
	}else{
		$error[] = '產品特徵必須填值';
		$formError++;
	}

	// 上傳圖片驗證
	if ($_FILES["imgFile"]["error"] > 0){
		$error[] = upload_error_list($_FILES["imgFile"]["error"]);
	}

	// 上傳檔案驗證
	/*if ($_FILES["catalog"]["error"] > 0){
		$error[] = upload_error_list($_FILES["catalog"]["error"]);
	}*/

	if($formError == 0){
		// 上傳檔案
		$catalog_name = $_FILES["catalog"]["name"];
		$catalog = upload_file_by_catalog();
		//if($catalog != FALSE){
			// 上傳圖片
			$img = upload_file_by_img();
			
			if($img != FALSE){
				// 插入資料庫
				$sql = 'INSERT INTO produce(`class_id`, `name`, `introduction`, `characteristic`, `img`, `catalog`, `catalog_name`) VALUES ("'.$class_id.'", "'.$name.'", "'.$introduction.'", "'.mysql_real_escape_string($characteristic).'", "'.$img.'", "'.$catalog.'", "'.$catalog_name.'")';
				$result = mysqli_query($conn, $sql);
				
				$conn->close();
				$show = FALSE;

				$success = '新增成功';
				header('Location: produceList.php');
				exit;
			}
		//}
	}else{

	}
}
if($show){
	?>
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
					<h1>新增產品</h1>
					<ol class="breadcrumb">
						<li><a href="/clc/backstage/classList.php">首頁</a></li>
						<li><a href="#">產品管理</a></li>
						<li class="active">新增產品</li>
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
								<label>產品分類</label>
								<select class="form-control" name="class_id" id="class_id">
									<?php
									$key = 0;
									foreach ($classDate as $key => $value) {
										?>
										<option value="<?=$value['id']?>" 
											<?php
											if(isset($class_id) && $class_id == $value['id'])
												echo'selected';
											?>
											>
											<?=$value['name']?>
										</option>
										<?php
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<label>產品名稱</label>
								<input type="text" class="form-control" id="name" placeholder="產品名稱" name="name" value="<?=(isset($name))?$name:''?>">
							</div>
							<div class="form-group">
								<label>產品簡介</label>
								<textarea class="form-control" id="introduction" name="introduction"><?=(isset($introduction))?$introduction:''?></textarea>
							</div>
							<div class="form-group">
								<label>產品特徵</label>
								<textarea class="form-control" id ="charArea" name="characteristic" rows="10"><?=(isset($characteristic))?$characteristic:''?></textarea>
							</div>
							<label>代表圖片</label>
							<div class="form-group">
								<input type="file" name="imgFile" id="imgInp">
								<img id="blah" src="#" style="display:none;width:100px;">
							</div>
							<div class="form-group">
								<label>型錄上傳</label>
								<input type="file" name="catalog">
							</div>
							<div>
								<button type="submit" class="btn btn-default" name="createBtn">送出</button>
								<a onclick="javascript:window.location='produceList.php'" class="btn btn-default">取消</a>
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
	tinymce.init({
		selector: "#charArea",
		mode : "textareas",
		theme: "modern",
		plugins: [
		"advlist autolink lists link image charmap print preview hr anchor pagebreak",
		"searchreplace wordcount visualblocks visualchars code fullscreen",
		"insertdatetime media nonbreaking save table contextmenu directionality",
		"emoticons template paste textcolor colorpicker textpattern"
		],
		toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
		toolbar2: "print preview media | forecolor backcolor emoticons",
		image_advtab: true,
	});

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