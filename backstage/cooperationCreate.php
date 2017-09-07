<!DOCTYPE html>
<?php
include_once ('../database.php');
include_once ('function.php');
$show = TRUE;
$error = array();

if (isset($_POST['createBtn'])) {
	if($_POST['title'] != '' && $_POST['address'] != ''){
		$title = $_POST['title'];
		$address = $_POST['address'];
		$pgone = $_POST['phone'];
		$number = $_POST['number'];
		$content = $_POST['content'];
		$date = date("Y-m-d");

		$sql = 'INSERT INTO cooperation(cp_title, cp_address,cp_phone,cp_content,cp_number) VALUES ("'.$title.'", "'.$address.'", "'.$phone.'", "'.$content.'", "'.$number.'")';
		$result = mysqli_query($conn, $sql);
		$show = FALSE;
		$_SESSION['success_msg'] = '新增成功';
		header('Location: cooperation.php');
		exit;
	}else{
		echo 'error';
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
					<div class="option">
						<h1>新增機構</h1>
					</div>
					<ol class="breadcrumb">
						<li><a href="/service/backstage/classList.php">首頁</a></li>
						<li><a href="cooperation.php">機構簡介</a></li>
						<li class="active">新增機構</li>
					</ol>
					<div>
						<form action="#" method="post">
							<div class="form-group">
								<label>機構編號</label>
								<input type="text" class="form-control" placeholder="機構編號" name="number" id="class_name" required>
							</div>
							<div class="form-group">
								<label>機構名稱</label>
								<input type="text" class="form-control" placeholder="機構名稱" name="title" id="class_name" required>
							</div>
							<div class="form-group">
								<label>機構住址</label>
								<input type="text" class="form-control" placeholder="機構住址" name="address" value="" required >
							</div>
							<div class="form-group">
								<label>機構電話</label>
								<input type="text" class="form-control" placeholder="機構電話" name="phone" value="" required >
							</div>
							<div class="form-group">
								<label>機構內容</label>
								<textarea rows="10" class="form-control" id ="charArea" name="content"></textarea>
							</div>
							<div>
								<button type="submit" class="btn btn-default" name="createBtn">新增</button>
								<a onclick="javascript:window.location='cooperation.php'" class="btn btn-default">取消</a>
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
	<script>
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