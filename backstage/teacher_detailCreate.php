<!DOCTYPE html>
<?php
include_once ('../database.php');
include_once ('function.php');
$show = TRUE;
$error = array();

if (isset($_POST['createBtn'])) {
	
	if($_POST['class'] != ''||$_POST['member'] != ''){
		$class = $_POST['class'];
		$name = $_POST['name'];
		$position = $_POST['position'];
		$phone = $_POST['phone'];
		$mail = $_POST['mail'];
		$space = $_POST['space'];
		
		
		
		
		$sql = 'INSERT INTO teacher_detail(td_class, td_name,td_position,td_phone,td_mail,td_space) VALUES ("'.$class.'", "'.$name.'", "'.$position.'", "'.$phone.'", "'.$mail.'", "'.$space.'")';
		$result = mysqli_query($conn, $sql);
		$show = FALSE;
		$_SESSION['success_msg'] = '新增成功';
		header('Location: teacher_detail.php');
		exit;
		
	
	}else{
		$error[] = '請先新增代表圖片';
	}
	
}
if(isset($_POST['inserImgBtn'])){
	if ($_FILES["imgFile"]["error"] > 0){
		$error[] = upload_error_list($_FILES["imgFile"]["error"]);
	}else{
		$name = $_POST['name'];
		$img = upload_file_by_interresult();
		if($img != FALSE){
			$_SESSION['success_msg'] = '上傳圖片成功';
			$_SESSION['tmp_class_name'] = $name;
			$show = FALSE;
			header('Location: interresultCreate.php');
			exit();
		}
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
						<h1>新增師資陣容(細項)</h1>
					</div>
					<ol class="breadcrumb">
						<li><a href="/service/backstage/classList.php">首頁</a></li>
						<li><a href="teacher_detail.php">師資陣容(細項)</a></li>
						<li class="active">新增師資陣容(細項)</li>
					</ol>
					<div>
						<form action="#" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label>系所</label>
								<input type="text" class="form-control" placeholder="系所" name="class" id="class_name" required>
							</div>
							
						
							<div class="form-group">
								<label>姓名</label>
								<input type="text" class="form-control" placeholder="姓名" name="name" value="" required >
							</div>
							<div class="form-group">
								<label>職稱</label>
								<input type="text" class="form-control" placeholder="職稱" name="position" value="" required >
							</div>
							<div class="form-group">
								<label>校內電話</label>
								<input type="text" class="form-control" placeholder="校內電話" name="phone" value="" required >
							</div>
							<div class="form-group">
								<label>信箱</label>
								<input type="text" class="form-control" placeholder="信箱" name="mail" value="" required >
							</div>
							<div class="form-group">
								<label>上課時間/上課地點</label>
								<input type="text" class="form-control" placeholder="上課時間/上課地點" name="space" value="" required >
							</div>
							
							
							
							<div>
								<button type="submit" class="btn btn-default" name="createBtn">新增</button>
								<a onclick="javascript:window.location='teacher_detail.php'" class="btn btn-default">取消</a>
							</div>
						</form>
					</div>
				</div>
				<!-- 彈跳視窗 -->
		<form action="#" method="post" enctype="multipart/form-data">
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">新增圖片</h4>
						</div>
						<div class="modal-body">
							<div class="form-group">
								<input type="file" name="imgFile" id="imgInp">
								<input type="hidden" name="name" id="tmp_name">
								<img id="blah" src="#" style="display:none;width:100%;">
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
							<button type="submit" class="btn btn-primary" name="inserImgBtn">新增</button>
						</div>
					</div>
				</div>
			</div>
		</form>
		<!-- 彈跳視窗 -->
			</div>
		</div>
	</body>
	</html>
		<script type="text/javascript" src="../js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="../js/tinymce/jquery.tinymce.min.js"></script>
	<script>
	
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
	
	// 暫存名字，不然重整會不見
	function tmpName(){
		$('#tmp_name').val($('#class_name').val());
	}

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