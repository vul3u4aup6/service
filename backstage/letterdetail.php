<?php
include_once ('../database.php');
include_once ('function.php');
$show = TRUE;

	$id = $_GET['id'];
	// 撈該筆資料
	$sql = 'SELECT * FROM newsletter WHERE `n_id` = "'.$id.'"';
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$name = $row["n_title"];
			$address = $row["n_class"];
			$date = $row["n_content"];
			$person=$row["n_author"];
			$unit=$row["n_unit"];
			$vol=$row["n_vol"];
			$abs=$row["n_abstract"];
			$img=$row["n_absimage"];
			
			
		}
	}
	$dir = "../letter/";
	$imgArray = getDirFile($dir);
if(isset($_POST['saveBtn'])){
	$id = $_POST['id'];
	$N_title = $_POST['newsTitle'];
	$N_address = $_POST['newsAddress'];
	$N_person = $_POST['newsperson'];
	$N_unit = $_POST['newsunit'];
	$N_content = $_POST['newscontent'];
	$N_vol = $_POST['newsvol'];
	$N_abs = $_POST['newsabs'];
	if(isset($_POST['optionsRadios'])){
	$optionsRadios = $_POST['optionsRadios'];
	
	

	$sql = 'UPDATE newsletter SET `n_title` = "'.$N_title.'", `n_class` = "'.$N_address.'", `n_author` = "'.$N_person.'", `n_unit` = "'.$N_unit.'", `n_content` = "'.$N_content.'", `n_vol` = "'.$N_vol.'", `n_abstract` = "'.$N_abs.'", `n_absimage` = "'.$optionsRadios.'" WHERE `n_id` = "'.$id.'"';
	$result = mysqli_query($conn, $sql);
	}else{
		$sql = 'UPDATE newsletter SET `n_title` = "'.$N_title.'", `n_class` = "'.$N_address.'", `n_author` = "'.$N_person.'", `n_unit` = "'.$N_unit.'", `n_content` = "'.$N_content.'", `n_vol` = "'.$N_vol.'", `n_abstract` = "'.$N_abs.'" WHERE `n_id` = "'.$id.'"';
	$result = mysqli_query($conn, $sql);
	}
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
						<h1>修改內文</h1>
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
								<option value="助理心得">助理心得</option>
								<option value="國際志工">國際志工</option>
								<option value="其他報導">其他報導</option>
								
							</select>
							</div>
							<div class="form-group">
								<label>作者</label>
								<input type="text" class="form-control" placeholder="作者" name="newsperson" value="<?=$person?>" required >
							</div>
							<div class="form-group">
								<label>發布單位</label>
								<input type="text" class="form-control" placeholder="發布單位" name="newsunit" value="<?=$unit?>" required >
							</div>
							<div class="form-group">
								<label>期數</label>
								<input type="text" class="form-control" placeholder="期數" name="newsvol" value="<?=$vol?>" required >
							</div>
							<div class="form-group">
								<label>摘要</label>
								<input type="text" class="form-control" placeholder="摘要" name="newsabs" value="<?=$abs?>" required >
							</div>
							<div class="form-group">
								<label>電子報內容</label>
								<textarea rows="10" class="form-control" id ="charArea" name="newscontent"><?=(isset($date))?$date:''?></textarea>
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
								<a onclick="javascript:window.location='letterlist.php'" class="btn btn-default">取消</a>

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