<?php
include_once ('../database.php');
include_once ('function.php');
$show = TRUE;
if (isset($_POST['updateBtn'])) {
	$id = $_POST['id'];
	// 撈該筆資料
	$sql = 'SELECT * FROM interresult WHERE `ir_id` = "'.$id.'"';
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$name = $row["ir_title"];
			$time = $row["ir_time"];
			$member = $row["ir_member"];
			$pdf=$row["ir_pdfpath"];
			$img=$row["ir_image"];
			$link=$row["ir_link"];
			
			
		}
	}
}
	$dir = "../interresultimage/";
	$imgArray = getDirFile($dir);
if(isset($_POST['saveBtn'])){
	$id = $_POST['id'];
	$title = $_POST['title'];
	$time = $_POST['time'];
	$member = $_POST['member'];
	$link = $_POST['link'];
	
	if(isset($_POST['optionsRadios'])){
	$optionsRadios = $_POST['optionsRadios'];
	
	if ($_FILES["catalog"]["error"] > 0){
	$sql = 'UPDATE interresult SET `ir_title` = "'.$title.'", `ir_time` = "'.$time.'", `ir_member` = "'.$member.'", `ir_image` = "'.$optionsRadios.'", `ir_link` = "'.$link.'" WHERE `ir_id` = "'.$id.'"';
	$result = mysqli_query($conn, $sql);
	}else{
		$name1 = $_FILES["catalog"]["name"];
		$pdf = upload_file_by_interresultpdf();
		if($pdf != FALSE){
			$sql = 'UPDATE interresult SET `ir_title` = "'.$title.'", `ir_time` = "'.$time.'", `ir_member` = "'.$member.'",`ir_pdfpath` = "'.$pdf.'", `ir_image` = "'.$optionsRadios.'", `ir_link` = "'.$link.'" WHERE `ir_id` = "'.$id.'"';
			$result = mysqli_query($conn, $sql);
		}
	}
	}else{
		if ($_FILES["catalog"]["error"] > 0){
			$sql = 'UPDATE interresult SET `ir_title` = "'.$title.'", `ir_time` = "'.$time.'", `ir_member` = "'.$member.'", `ir_link` = "'.$link.'" WHERE `ir_id` = "'.$id.'"';
			$result = mysqli_query($conn, $sql);
			}else{
				$name1 = $_FILES["catalog"]["name"];
			$pdf = upload_file_by_interresultpdf();
			if($pdf != FALSE){
			$sql = 'UPDATE interresult SET `ir_title` = "'.$title.'", `ir_time` = "'.$time.'", `ir_member` = "'.$member.'", `ir_pdfpath` = "'.$pdf.'", `ir_link` = "'.$link.'" WHERE `ir_id` = "'.$id.'"';
			$result = mysqli_query($conn, $sql);
		}
	}
	}
	$conn->close();
	$show = FALSE;
	header('Location: interresult.php');
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
						<h1>修改成果</h1>
					</div>
					<ol class="breadcrumb">
						<li><a href="classList.php">首頁</a></li>
						<li><a href="interresult.php">國際志工成果</a></li>
						<li class="active">修改成果</li>
					</ol>
					<div>
						<form action="#" method="post" enctype="multipart/form-data">
							<input type="hidden" value="<?=$id?>" name="id">
							<div class="form-group">
								<label>成果標題</label>
								<input type="text" class="form-control" placeholder="成果標題" name="title" value="<?=$name?>" required >
							</div>
							
							<div class="form-group">
								<label>服務期間</label>
								<input type="text" class="form-control" placeholder="服務期間" name="time" value="<?=$time?>" required >
							</div>
							<div class="form-group">
								<label>參與成員</label>
								<input type="text" class="form-control" placeholder="參與成員" name="member" value="<?=$member?>" required >
							</div>
							<div class="form-group">
								<label>檔案名稱：<?php echo $pdf;?></label><br/><br/>
								<label>重新選擇檔案：</label>
								<input type="file" name="catalog" id="imgInp">
								<input type="hidden" name="caname" id="tmp_name"><br/>
							</div>
							<div class="form-group">
								<label>影片網址</label>
								<input type="text" class="form-control" placeholder="影片網址" name="link" value="<?=$link?>" required >
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
								<a onclick="javascript:window.location='interresult.php'" class="btn btn-default">取消</a>

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