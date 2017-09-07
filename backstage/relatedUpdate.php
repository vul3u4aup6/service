<?php
include_once ('../database.php');
include_once ('function.php');
$show = TRUE;
$classDate = getClass($conn);
// 進入修改頁面，先撈該筆資料
if (isset($_POST['updateBtn'])) {
	$id = $_POST['id'];
	$related_data = get_related($id, $conn);
	$name = $related_data["name"];
	$website = $related_data["website"];
	$img = $related_data['img'];
}
// 確定修改後，進行資料庫更新
if(isset($_POST['saveBtn'])){
		// 表單驗證
	$formError = 0;
	$name = $_POST["name"];
	$website = $_POST["website"];
	$img = $_POST['img'];

	
	if($formError == 0){

		$img = upload_file_by_related();

		$id = $_POST['id'];
		$sql = 'UPDATE related SET ';
		$sql .= '`name` = "'.$name.'", ';
		$sql .= '`website` = "'.$website.'"';
		

		if ($_FILES["imgFile"]["error"] == 0){
			$sql .= ', `img` = "'.$img.'"';
		}else{
			$img = get_related($id, $conn)['img'];
		}

		$sql .=' WHERE `id` = "'.$id.'"';

		$result = mysqli_query($conn, $sql);
		$conn->close();
		$success = '修改內文成功';		
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
					<h1>修改產品</h1>
					<ol class="breadcrumb">
						<li><a href="../index.html">首頁</a></li>
						<li><a href="relatedList.php">產品管理</a></li>
						<li class="active">修改產品</li>
					</ol>
					<div>
						<?php
						if (!empty($error)) {
							foreach ($error as $key => $value) {
								echo '<div class="alert-danger alert alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>'.$value.'</div>';
							}
						}
						if(isset($success)){
							echo '<div class="alert-success alert alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>'.$success.'</div>';
						}
						?>
						<form action="#" method="post" enctype="multipart/form-data">
							<input type="hidden" value="<?=$id?>" name="id">
							<div class="form-group">
								<label>企業名稱</label>
								<input type="text" class="form-control" placeholder="企業名稱" name="name" value="<?=$name?>" required>

							</div>
							<div class="form-group">
								<label>企業網站網址</label>
								<input type="text" class="form-control" placeholder="企業網站網址" name="website" value="<?=$website?>" required>
							</div>
							<div class="form-group">
								<label>企業圖片</label>
								<img src="<?=$img?>" style="width:200px;"></img>
							</div>
							<label>重新上傳企業圖片</label>
							<div class="form-group">
								<input type="file" name="imgFile" id="imgInp">
							</div>

						</div>			
						<div>
							<button type="submit" class="btn btn-default" name="saveBtn">Submit</button>
							<a onclick="javascript:window.location='relatedList.php'" class="btn btn-default">取消</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
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
</script>
<?php
}
?>