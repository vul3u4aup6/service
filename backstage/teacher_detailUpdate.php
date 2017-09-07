<?php
include_once ('../database.php');
include_once ('function.php');
$show = TRUE;
if (isset($_POST['updateBtn'])) {
	$id = $_POST['id'];
	// 撈該筆資料
	$sql = 'SELECT * FROM teacher_detail WHERE `td_id` = "'.$id.'"';
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$id=$row["td_id"];
			$class = $row["td_class"];
			$name = $row["td_name"];
			$position = $row["td_position"];
			$phone = $row["td_phone"];
			$mail = $row["td_mail"];
			$space = $row["td_space"];
			
			
			
			
		}
	}
}

if(isset($_POST['saveBtn'])){
	$id=$_POST['id'];
	$class = $_POST['class'];
		$name = $_POST['name'];
		$position = $_POST['position'];
		$phone = $_POST['phone'];
		$mail = $_POST['mail'];
		$space = $_POST['space'];
	
	
	
			$sql = 'UPDATE teacher_detail SET `td_class` = "'.$class.'", `td_name` = "'.$name.'", `td_position` = "'.$position.'", `td_phone` = "'.$phone.'", `td_mail` = "'.$mail.'", `td_space` = "'.$space.'" WHERE `td_id` = "'.$id.'"';
			$result = mysqli_query($conn, $sql);
		
		
	
	$conn->close();
	$show = FALSE;
	header('Location: teacher_detail.php');
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
						<h1>修改師資陣容(細項)</h1>
					</div>
					<ol class="breadcrumb">
						<li><a href="classList.php">首頁</a></li>
						<li><a href="teacher_detail.php">師資陣容(細項)</a></li>
						<li class="active">修改師資陣容(細項)</li>
					</ol>
					<div>
						<form action="#" method="post" enctype="multipart/form-data">
							<input type="hidden" value="<?=$id?>" name="id">
							<div class="form-group">
								<label>系所</label>
								<input type="text" class="form-control" placeholder="系所" name="class" value="<?=$class?>" required >
							</div>
							
							
							
							<div class="form-group">
								<label>姓名</label>
								<input type="text" class="form-control" placeholder="姓名" name="name" value="<?=$name?>" id="class" required >
							</div>
							<div class="form-group">
								<label>職稱</label>
								<input type="text" class="form-control" placeholder="職稱" name="position" value="<?=$position?>" id="class" required >
							</div>
							<div class="form-group">
								<label>校內電話</label>
								<input type="text" class="form-control" placeholder="校內電話" name="phone" value="<?=$phone?>" id="class" required >
							</div>
							<div class="form-group">
								<label>信箱</label>
								<input type="text" class="form-control" placeholder="信箱" name="mail" value="<?=$mail?>" id="class" required >
							</div>
							<div class="form-group">
								<label>上課時間/上課地點</label>
								<input type="text" class="form-control" placeholder="上課時間/上課地點" name="space" value="<?=$space?>" id="class" required >
							</div>
							
						
							<div>
								<button type="submit" class="btn btn-default" name="saveBtn">修改</button>
								<a onclick="javascript:window.location='teacher_detail.php'" class="btn btn-default">取消</a>

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