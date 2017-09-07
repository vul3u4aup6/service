<?php
include_once ('../database.php');
include_once ('function.php');
$show = TRUE;
if(isset($_POST['saveBtn'])){
	$id = 1;
	$page = $_POST['page'];
	if ($_FILES["catalog"]["error"] > 0){
		// 只是沒選擇檔案而已，還是要上傳page
		if($_FILES["catalog"]["error"] == 4){
			$sql = 'UPDATE education SET `page` = "'.mysqli_real_escape_string($conn,$page).'" WHERE `id` = "'.$id.'"';
			$result = mysqli_query($conn, $sql);
			$_SESSION['success_msg'] = '修改成功';
			$conn->close();
			$show = FALSE;
			header('Location: education.php');
			exit;
		}else{
			$error[] = upload_error_list($_FILES["catalog"]["error"]);
		}
	}else{
		$file = upload_file_by_education();
		$filename = $_FILES["catalog"]["name"];
		$sql = 'UPDATE education SET `page` = "'.mysqli_real_escape_string($conn,$page).'", `file` = "'.$file.'", `filename` = "'.$filename.'" WHERE `id` = "'.$id.'"';
		$result = mysqli_query($conn, $sql);
		$_SESSION['success_msg'] = '修改成功';
		$conn->close();
		$show = FALSE;
		header('Location: education.php');
		exit;
	}
	
}else{
	$id = 1;
	// 撈該筆資料
	$sql = 'SELECT * FROM education WHERE `id` = "1"';
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$page = $row["page"];
			$file = $row["file"];
			$filename = $row["filename"];
		}
	}
}
if($show){
	?>
	<html ng-app="pimsApp">
	<head>
		<title>後臺管理</title>
		<meta charset="UTF-8">
		
	</head>
	<body ng-controller="MainCtrl as ctrl">
		<?php include("header.php");?>
		<div class="container-fluid" style="margin-top:70px;">
			<div class="row">
				<?php include("sideNav.php");?>
				<div class="col-md-9">
					<div class="option">
						<h1>修改教育訓練頁面</h1>
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
					</div>
					<ol class="breadcrumb">
						<li><a href="classList.php">首頁</a></li>
						<li class="active">修改教育訓練頁面</li>
					</ol>
					<div>
						<form action="#" method="post" enctype="multipart/form-data">
							<input type="hidden" value="<?=$id?>" name="id">
							<div class="form-group">
								<label>頁面</label>
								<textarea class="content" rows="20" name="page"><?=$page?></textarea>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label>夾帶檔案</label>
									<?php
									if(isset($file)){
										echo '<div><a href="'.$file.'">'.$filename.'</a></div>';
									}else{
										echo '<div><a href="#">無</a></div>';
									}
									?>
									
								</div>
								<div class="col-md-12">
									<label>重新選擇</label>
									<div class="form-group col-md-12 ">
										<input type="file" name="catalog">
									</div>	
								</div>	
							</div>	
							<div>
								<button type="submit" class="btn btn-default" name="saveBtn">修改</button>
								<a onclick="javascript:window.location='classList.php'" class="btn btn-default">取消</a>

							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
	</html>
	<script type="text/javascript">
		function delete_class_img(img){
			var r=confirm("確定刪除?")
			if (r==true){
				$.ajax({
					type:"POST", 
					data: {img : img},
					url: "classDeleteImg.php",
					dateType:"json",
					error:function(){
						alert("AJAX ERROR!!!");
					},
					success:function(val){
						tmpName();
						location.reload();
					}
				});
			}
		}
		tinyMCE.init({
			mode : "textareas",
			editor_selector : "content",
			plugins: [
			"advlist autolink lists link image charmap print preview hr anchor pagebreak",
			"searchreplace wordcount visualblocks visualchars code fullscreen",
			"insertdatetime media nonbreaking save table contextmenu directionality",
			"emoticons template paste textcolor colorpicker textpattern"
			],
			toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
			toolbar2: "print preview media | forecolor backcolor",
			image_advtab: true,
			menubar:true,
			min_height: 100
		});
	</script>
	<?php
}
?>