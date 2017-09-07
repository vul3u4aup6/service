<?php
include_once ('../database.php');
include_once ('function.php');
$show = TRUE;
if (isset($_POST['updateBtn'])) {
	$id = $_POST['id'];
	// 撈該筆資料
	$sql = 'SELECT * FROM service_result WHERE `sr_id` = "'.$id.'"';
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$name = $row["sr_introduction"];
			$img = $row["sr_img"];
			$catagory = $row["sr_catagory"];
			
		}
	}
	// 撈class資料夾下的資料
	$dir = "../service_result_image/";
	$imgArray = getDirFile($dir);
}
if(isset($_GET['id'])){
	$id = $_GET['id'];
	// 撈該筆資料
	$sql = 'SELECT * FROM service_result WHERE `sr_id` = "'.$id.'"';
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$name = $row["sr_introduction"];
			$img = $row["sr_img"];
			$catagory = $row["sr_catagory"];
			
		}
	}
	// 撈class資料夾下的資料
	$dir = "../service_result_image/";
	$imgArray = getDirFile($dir);
}
if(isset($_POST['saveBtn'])){
	if($_POST['className'] != ''){
		$id = $_POST['id'];
		$name = $_POST['className'];
		if(isset($_POST['optionsRadios'])){
			$optionsRadios = $_POST['optionsRadios'];
			$catagory=$_POST['catagory'];
			echo $optionsRadios;
			$sql = 'UPDATE service_result SET `sr_introduction` = "'.$name.'", `sr_img` = "'.$optionsRadios.'", `sr_catagory` = "'.$catagory.'" WHERE `sr_id` = "'.$id.'"';
		}else{
			$sql = 'UPDATE service_result SET `sr_introduction` = "'.$name.'", `sr_catagory` = "'.$catagory.'" WHERE `sr_id` = "'.$id.'"';
		}
		

		
		$result = mysqli_query($conn, $sql);
		$conn->close();
		$show = FALSE;
		header('Location: service_result.php');
		exit;
	}else{
		echo 'error';
	}
}
if(isset($_POST['inserImgBtn'])){
	if ($_FILES["imgFile"]["error"] > 0){
		$error[] = upload_error_list($_FILES["imgFile"]["error"]);
	}else{
		$name = $_POST['name'];
		$img = upload_file_by_sr();
		if($img != FALSE){
			$_SESSION['success_msg'] = '上傳圖片成功';
			$_SESSION['tmp_class_name'] = $name;
			$show = FALSE;
			header('Location: service_resultUpdate.php?id='.$_POST[id].'');
			exit();
		}
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
						<h1>修改內容</h1>
					</div>
					<ol class="breadcrumb">
						<li><a href="classList.php">首頁</a></li>
						<li><a href="classList.php">大一服務成果</a></li>
						<li class="active">修改內容</li>
					</ol>
					<div>
						<form action="#" method="post" enctype="multipart/form-data">
							<input type="hidden" value="<?=$id?>" name="id">
							<div class="form-group">
								<label>簡介</label>
								<input type="text" class="form-control" placeholder="簡介" name="className" id="class_name" value="<?=$name?>" required >

							</div>
							<div class="form-group">
								<label>分類</label>
								<select class="form-control" name="catagory" >
								<option selectes hidden value="<?=$catagory?>"><?php echo $catagory ?></option>
								<option value="學生服務人力與時數">學生服務人力與時數</option>
								<option value="參與服務學習教師人力">參與服務學習教師人力</option>
								<option value="校內外機構服務比例">校內外機構服務比例</option>
								<option value="服務學習課程合作單位">服務學習課程合作單位</option>
								<option value="課程前後測成效分析">課程前後測成效分析</option>
							
							</select>
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
									<div class="col-md-3 col-sm-4 col-xs-12 classImg" onClick="tmpName()">
									<div id="addBtn" data-toggle="modal" data-target="#myModal1">
										<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
									</div>
								</div>									
								</div>	
								
							</div>	
							<div>
								<button type="submit" class="btn btn-default" name="saveBtn">修改</button>
								<a onclick="javascript:window.location='service_result.php'" class="btn btn-default">取消</a>

							</div>
						</form>
						<form action="#" method="post" enctype="multipart/form-data">
			<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
							<input type="hidden" value="<?=$id?>" name="id">
													
						</div>
						<div class="modal-footer">
												
							<button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
							<button type="submit" class="btn btn-primary" name="inserImgBtn">新增</button>
						</div>
					</div>
				</div>
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