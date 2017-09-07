<?php
include_once ('../database.php');
include_once ('function.php');
$show = TRUE;
if (isset($_POST['updateBtn'])) {
	$id = $_POST['id'];
	// 撈該筆資料
	$sql = 'SELECT * FROM supplemethod WHERE `su_id` = "'.$id.'"';
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$name = $row["su_title"];
			
			$pdf = $row["su_pdfpath"];
			$class = $row["su_class"];
			$link = $row["su_link"];
			
		}
	}
	// 撈class資料夾下的資料
	
}
if(isset($_POST['saveBtn'])){
	if($_POST['className'] != ''){
		$id = $_POST['id'];
		$name = $_POST['className'];
		$class = $_POST['class'];
		$link=$_POST['link'];
		if($class=="課程影片"){
			if ($_FILES["catalog"]["error"] > 0){
			$sql = 'UPDATE supplemethod SET `su_title` = "'.$name.'",`su_class` = "'.$class.'",`su_link` = "'.$link.'" WHERE `su_id` = "'.$id.'"';
		}else{
			$name1 = $_FILES["catalog"]["name"];
			$pdf = upload_file_by_supplemethod();
			if($pdf != FALSE){
			$sql = 'UPDATE supplemethod SET `su_title` = "'.$name.'",`su_pdfpath` = "'.$pdf.'",`su_class` = "'.$class.'",`su_link` = "'.$link.'" WHERE `su_id` = "'.$id.'"';
		}
		}
		}else{
			if ($_FILES["catalog"]["error"] > 0){
			$sql = 'UPDATE supplemethod SET `su_title` = "'.$name.'",`su_class` = "'.$class.'" WHERE `su_id` = "'.$id.'"';
		}else{
			$name1 = $_FILES["catalog"]["name"];
			$pdf = upload_file_by_supplemethod();
			if($pdf != FALSE){
			$sql = 'UPDATE supplemethod SET `su_title` = "'.$name.'",`su_pdfpath` = "'.$pdf.'",`su_class` = "'.$class.'" WHERE `su_id` = "'.$id.'"';
		}
		}
		
		}
		

		
		$result = mysqli_query($conn, $sql);
		$conn->close();
		$show = FALSE;
		header('Location: supplemethod.php');
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
						<h1>修改補充資料</h1>
					</div>
					<ol class="breadcrumb">
						<li><a href="classList.php">首頁</a></li>
						<li><a href="supplemethod.php">課程補充資料</a></li>
						<li class="active">修改補充資料</li>
					</ol>
					<div>
						<form action="#" method="post" enctype="multipart/form-data">
							<input type="hidden" value="<?=$id?>" name="id">
							<div class="form-group">
								<label>補充資料名稱</label>
								<input type="text" class="form-control" placeholder="補充資料名稱" name="className" value="<?=$name?>" required >

							</div>
							<div class="form-group">
								<label>補充資料分類</label>
								<select class="form-control" name="class" id="class_name">
								<option selectes hidden value="<?=$class?>"><?php echo $class ?></option>
								<option value="服務學習手冊">服務學習手冊</option>
								<option value="教學資源檔案">教學資源檔案</option>
								<option value="心靈小品">心靈小品</option>
								<option value="課程影片">課程影片</option>
							</select>
							</div>
							<div class="form-group">
								<label>檔案名稱：<?php echo $pdf;?></label><br/><br/>
								<label>重新選擇檔案：</label>
								<input type="file" name="catalog" id="imgInp">
								<input type="hidden" name="caname" id="tmp_name"><br/>
							</div>
							<?php if($class=="課程影片"){?>
							<div class="form-group">
								<label>課程影片連結</label>
								<input type="text" class="form-control" placeholder="課程影片連結" name="link" value="<?=$link?>" >

							</div>
							<?php }?>
							<div>
								<button type="submit" class="btn btn-default" name="saveBtn">修改</button>
								<a onclick="javascript:window.location='supplemethod.php'" class="btn btn-default">取消</a>

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