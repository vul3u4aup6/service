<?php
include_once ('../database.php');
include_once ('function.php');
$show = TRUE;
if (isset($_POST['updateBtn'])) {
	$id = $_POST['id'];
	// 撈該筆資料
	$sql = 'SELECT * FROM cooperation WHERE `cp_id` = "'.$id.'"';
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$name = $row["cp_title"];
			$address = $row["cp_address"];
			$content = $row["cp_content"];
			$phone=$row["cp_phone"];
			$number=$row["cp_number"];
		}
	}
}
if(isset($_POST['saveBtn'])){
	$id = $_POST['id'];
	$N_title = $_POST['newsTitle'];
	$N_address = $_POST['address'];
	$N_person = $_POST['phone'];
	$N_unit = $_POST['number'];
	$N_content = $_POST['content'];
	
	

	$sql = 'UPDATE cooperation SET `cp_title` = "'.$N_title.'", `cp_content` = "'.$N_content.'", `cp_phone` = "'.$N_person.'", `cp_number` = "'.$N_unit.'", `cp_address` = "'.$N_address.'" WHERE `cp_id` = "'.$id.'"';
	$result = mysqli_query($conn, $sql);
	$conn->close();
	$show = FALSE;
	header('Location: cooperation.php');
	exit;
}
if($show){
	?>
	<html ng-app="pimsApp">
	<head>
	<title>PUSLC後臺管理</title>
	<meta charset="UTF-8">
	<link href="images/favicon.ico" rel="Shortcut Icon" type="image/x-icon">
	</head>
	<body ng-controller="MainCtrl as ctrl">
		<?php include("header.php");?>
		<div class="container-fluid" style="margin-top:70px;">
			<div class="row">
				<?php include("sideNav.php");?>
				<div class="col-md-9">
					<div class="option">
						<h1>修改機構簡介</h1>
					</div>
					<ol class="breadcrumb">
						<li><a href="classList.php">首頁</a></li>
						<li><a href="cooperation.php">機構簡介</a></li>
						<li class="active">修改機構簡介</li>
					</ol>
					<div>
						<form action="#" method="post" enctype="multipart/form-data">
							<input type="hidden" value="<?=$id?>" name="id">
							<div class="form-group">
								<label>機構編號</label>
								<input type="text" class="form-control" placeholder="機構編號" name="number" value="<?=$number?>" required >
							</div>
							<div class="form-group">
								<label>機構標題</label>
								<input type="text" class="form-control" placeholder="機構標題" name="newsTitle" value="<?=$name?>" required >
							</div>
							
							<div class="form-group">
								<label>機構住址</label>
								<input type="text" class="form-control" placeholder="機構住址" name="address" value="<?=$address?>" required >
							</div>
							<div class="form-group">
								<label>機構電話</label>
								<input type="text" class="form-control" placeholder="機構電話" name="phone" value="<?=$phone?>" required >
							</div>
							<div class="form-group">
								<label>機構內容</label>
								<textarea rows="10" class="form-control" id ="charArea" name="content"><?=(isset($content))?$content:''?></textarea>
							</div>
							<div>
								<button type="submit" class="btn btn-default" name="saveBtn">修改</button>
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
	function rechange(){
		$('#rechangeArea').toggle();
	}
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