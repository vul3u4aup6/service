<?php
include_once ('../database.php');
include_once ('function.php');
$show = TRUE;
if (isset($_POST['updateBtn'])) {
	$id = $_POST['id'];
	// 撈該筆資料
	$sql = 'SELECT * FROM calendar WHERE `cal_id` = "'.$id.'"';
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$date = $row["cal_date"];
			$time = $row["cal_time"];
			$content = $row["cal_content"];
		
			
		}
	}
	
}

if(isset($_POST['saveBtn'])){
	if($_POST['date'] != ''){
		$id = $_POST['id'];
		$date = $_POST['date'];
		$time = $_POST['time'];
		$content = $_POST['content'];
			$sql = 'UPDATE calendar SET `cal_date` = "'.$date.'",`cal_time` = "'.$time.'",`cal_content` = "'.$content.'" WHERE `cal_id` = "'.$id.'"';
		
		

		
		$result = mysqli_query($conn, $sql);
		$conn->close();
		$show = FALSE;
		header('Location: calendar.php');
		exit;
	}else{
		echo 'error';
	}
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
						<h1>修改行事曆</h1>
					</div>
					<ol class="breadcrumb">
						<li><a href="classList.php">首頁</a></li>
						<li><a href="calendar.php">行事曆</a></li>
						<li class="active">修改行事曆</li>
					</ol>
					<div>
						<form action="#" method="post" enctype="multipart/form-data">
							<input type="hidden" value="<?=$id?>" name="id">
							<div class="form-group">
								<label>日期</label>
								<input type="text" class="form-control" placeholder="日期" name="date" id="class_name" value="<?=$date?>" required >

							</div>
							<div class="form-group">
								<label>時間</label>
								<input type="text" class="form-control" placeholder="時間" name="time" id="class_name" value="<?=$time?>" required >

							</div>
							<div class="form-group">
								<label>內容</label>
								<input type="text" class="form-control" placeholder="內容" name="content" id="class_name" value="<?=$content?>" required >

							</div>
							
							
							<div>
								<button type="submit" class="btn btn-default" name="saveBtn">修改</button>
								<a onclick="javascript:window.location='calendar.php'" class="btn btn-default">取消</a>

							</div>
						</form>
						
					</div>
				</div>
			</div>
		</div>
	</body>
	</html>
	<script type="text/javascript">
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
	</script>
	<?php
}
?>