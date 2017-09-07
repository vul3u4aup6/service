<?php
include_once ('../database.php');
include_once ('function.php');
$show = TRUE;
if (isset($_POST['updateBtn'])) {
	$id = $_POST['id'];
	// 撈該筆資料
	$sql = 'SELECT * FROM lecture WHERE `le_id` = "'.$id.'"';
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$name = $row["le_title"];
			$img = $row["le_image"];
		}
	}
	// 撈class資料夾下的資料
	$dir = "../lecture/";
	$imgArray = getDirFile($dir);
}
if(isset($_POST['saveBtn'])){
	if($_POST['className'] != ''){
		$id = $_POST['id'];
		$name = $_POST['className'];
		if(isset($_POST['optionsRadios'])){
			$optionsRadios = $_POST['optionsRadios'];
			echo $optionsRadios;
			$sql = 'UPDATE lecture SET `le_title` = "'.$name.'", `le_image` = "'.$optionsRadios.'" WHERE `le_id` = "'.$id.'"';
		}else{
			$sql = 'UPDATE lecture SET `le_title` = "'.$name.'" WHERE `le_id` = "'.$id.'"';
		}
		

		
		$result = mysqli_query($conn, $sql);
		$conn->close();
		$show = FALSE;
		header('Location: lecture.php');
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
						<h1>修改講座</h1>
					</div>
					<ol class="breadcrumb">
						<li><a href="classList.php">首頁</a></li>
						<li><a href="lecture.php">講座場次</a></li>
						<li class="active">修改講座</li>
					</ol>
					<div>
						<form action="#" method="post" enctype="multipart/form-data">
							<input type="hidden" value="<?=$id?>" name="id">
							<div class="form-group">
								<label>講座名稱</label>
								<input type="text" class="form-control" placeholder="分類名稱" name="className" value="<?=$name?>" required >

							</div>
							<div class="row">
								<div class="col-md-2">
									<div>
										<label>代表圖片</label>
										<div onClick="rechange()" type="button" class="btn btn-default">重新選擇</div>
									</div>
									<img src="<?=$img?>" style="width:100%">	
								</div>
								<div id="rechangeArea" style="display:none" class="col-md-10">
									<label>重新選擇</label>
									<div class="form-group col-md-12 ">
										<?php
										foreach ($imgArray as $key => $value) {
											?>
											<div class="col-md-3 col-sm-4 col-xs-12 classImg">
												<div class="classArea">
													<div class="img" style="background-image:url('<?=$value?>')"></div>
													<input type="radio" name="optionsRadios" value="<?=$value?>"  id="c<?=$key+1?>">
													<label for="c<?=$key+1?>" class="checkLabel"><span></span></label>
													<button type="button" class="close" onClick="delete_class_img('<?=$value?>')">
														<span aria-hidden="true">
															&times;
														</span>
													</button>
												</div>
											</div>
											<?php
										}
										?>
										<!-- <input type="file" name="imgFile"> -->
									</div>	
								</div>	
							</div>	
							<div>
								<button type="submit" class="btn btn-default" name="saveBtn">修改</button>
								<a onclick="javascript:window.location='lecture.php'" class="btn btn-default">取消</a>

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