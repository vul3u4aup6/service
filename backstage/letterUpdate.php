<?php
include_once ('../database.php');
include_once ('function.php');
$show = TRUE;
if (isset($_POST['updateBtn'])) {
	$id = $_POST['id'];
	// 撈該筆資料
	$sql = 'SELECT * FROM newsletter WHERE `n_id` = "'.$id.'"';
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$name = $row["n_title"];
			$address = $row["n_class"];
			$date = $row["n_posttime"];
		}
	}
}
if(isset($_POST['saveBtn'])){
	$id = $_POST['id'];
	$N_title = $_POST['newsTitle'];
	$N_address = $_POST['newsAddress'];

	$sql = 'UPDATE newsletter SET `n_title` = "'.$N_title.'", `n_class` = "'.$N_address.'" WHERE `n_id` = "'.$id.'"';
	$result = mysqli_query($conn, $sql);
	$conn->close();
	$show = FALSE;
	header('Location: letterList.php');
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
						<h1>修改電子報</h1>
					</div>
					<ol class="breadcrumb">
						<li><a href="classList.php">首頁</a></li>
						<li><a href="letterlist.php">電子報管理</a></li>
						<li class="active">修改電子報</li>
					</ol>
					<div>
						<form action="#" method="post" enctype="multipart/form-data">
							<input type="hidden" value="<?=$id?>" name="id">
							<div class="form-group">
								<label>電子報標題</label>
								<input type="text" class="form-control" placeholder="消息名稱" name="newsTitle" value="<?=$name?>" required >
							</div>
							<div class="form-group">
								<label>電子報分類</label>
								<select class="form-control" name="newsAddress" id="class_name">
								<option selectes hidden value="<?=$address?>"><?php echo $address ?></option>
								<option value="教師心得">教師心得</option>
								<option value="學生心得">學生心得</option>
							</select>
							</div>
							<div>
								<button type="submit" class="btn btn-default" name="saveBtn">修改</button>
								<a onclick="javascript:window.location='letterlist.php'" class="btn btn-default">取消</a>

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
	function rechange(){
		$('#rechangeArea').toggle();
	}
	</script>
	<?php
}
?>