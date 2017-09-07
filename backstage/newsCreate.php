<!DOCTYPE html>
<?php
include_once ('../database.php');
include_once ('function.php');
$show = TRUE;
$error = array();

if (isset($_POST['createBtn'])) {
	if($_POST['newsTitle'] != '' && $_POST['newsAddress'] != ''){
		$newsTitle = $_POST['newsTitle'];
		$newsAddress = $_POST['newsAddress'];
		$newsperson = $_POST['newsperson'];
		$newsunit = $_POST['newsunit'];
		$newscontent = $_POST['newscontent'];
		$position = $_POST['position'];
		$starttime= $_POST['starttime'];
		$endtime = $_POST['endtime'];
		$phone = $_POST['phone'];
		$hot = $_POST['newshot'];
		
		$date = date("Y-m-d");
if ($_FILES["catalog"]["error"] > 0){
		$error[] = upload_error_list($_FILES["catalog"]["error"]);
		$sql = 'INSERT INTO billboard(b_title, b_class,b_presenter,b_unit,b_content,b_position,b_starttime,b_endtime,b_phone,b_posttime,b_pdfpath,b_hot) VALUES ("'.$newsTitle.'", "'.$newsAddress.'", "'.$newsperson.'", "'.$newsunit.'", "'.$newscontent.'", "'.$position.'", "'.$starttime.'", "'.$endtime.'", "'.$phone.'", "'.$date.'", "'.$pdf.'", "'.$hot.'")';
		$result = mysqli_query($conn, $sql);
		$show = FALSE;
		$_SESSION['success_msg'] = '新增成功';
		header('Location: newsList.php');
		exit;	
	}else{
		if ($_FILES["catalog1"]["error"] > 0){
		$pdf = upload_file_by_bill();
		
		
			if($pdf != FALSE){
				
		$sql = 'INSERT INTO billboard(b_title, b_class,b_presenter,b_unit,b_content,b_position,b_starttime,b_endtime,b_phone,b_posttime,b_pdfpath,b_hot) VALUES ("'.$newsTitle.'", "'.$newsAddress.'", "'.$newsperson.'", "'.$newsunit.'", "'.$newscontent.'", "'.$position.'", "'.$starttime.'", "'.$endtime.'", "'.$phone.'", "'.$date.'", "'.$pdf.'","'.$hot.'")';
		$result = mysqli_query($conn, $sql);
		$show = FALSE;
		$_SESSION['success_msg'] = '新增成功';
		header('Location: newsList.php');
		exit;	
			}
		}else{
			if ($_FILES["catalog2"]["error"] > 0){
			$pdf = upload_file_by_bill();
				$pdf1 = upload_file_by_bill1();
				if($pdf!=FALSE&&$pdf1 != FALSE){
				
					$sql = 'INSERT INTO billboard(b_title, b_class,b_presenter,b_unit,b_content,b_position,b_starttime,b_endtime,b_phone,b_posttime,b_pdfpath,b_pdfpath_1,b_hot) VALUES ("'.$newsTitle.'", "'.$newsAddress.'", "'.$newsperson.'", "'.$newsunit.'", "'.$newscontent.'", "'.$position.'", "'.$starttime.'", "'.$endtime.'", "'.$phone.'", "'.$date.'", "'.$pdf.'", "'.$pdf1.'","'.$hot.'")';
					$result = mysqli_query($conn, $sql);
					$show = FALSE;
					$_SESSION['success_msg'] = '新增成功';
					header('Location: newsList.php');
					exit;	
				}
			}else{
					$pdf = upload_file_by_bill();
				$pdf1 = upload_file_by_bill1();
				$pdf2 = upload_file_by_bill2();
				if($pdf!=FALSE&&$pdf1 != FALSE&&$pdf2 != FALSE){
				
					$sql = 'INSERT INTO billboard(b_title, b_class,b_presenter,b_unit,b_content,b_position,b_starttime,b_endtime,b_phone,b_posttime,b_pdfpath,b_pdfpath_1,b_pdfpath_2,b_hot) VALUES ("'.$newsTitle.'", "'.$newsAddress.'", "'.$newsperson.'", "'.$newsunit.'", "'.$newscontent.'", "'.$position.'", "'.$starttime.'", "'.$endtime.'", "'.$phone.'", "'.$date.'", "'.$pdf.'", "'.$pdf1.'", "'.$pdf2.'","'.$hot.'")';
					$result = mysqli_query($conn, $sql);
					$show = FALSE;
					$_SESSION['success_msg'] = '新增成功';
					header('Location: newsList.php');
					exit;	
				}
				}
			}		
		}
		
	
	

	}else{
		echo 'error';
	}
}

if($show){
	?>
	<html>
	<head>
	<title>PUSLC後臺管理</title>
	<meta charset="UTF-8">
	<link href="images/favicon.ico" rel="Shortcut Icon" type="image/x-icon">

		<script type="text/javascript" src="../js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="../js/tinymce/jquery.tinymce.min.js"></script>
	</head>
	<body>
		<?php include("header.php");?>
		
		<div class="container-fluid" style="margin-top:70px;">
			<div class="row">
				<?php include("sideNav.php");?>
				<div class="col-md-9">
					<div class="option">
						<h1>新增消息</h1>
					</div>
					<ol class="breadcrumb">
						<li><a href="/service/backstage/classList.php">首頁</a></li>
						<li><a href="newsList.php">消息管理</a></li>
						<li class="active">新增消息</li>
					</ol>
					<div>
						<form action="#" method="post"  enctype="multipart/form-data">
							<div class="form-group">
								<label>消息名稱</label>
								<input type="text" class="form-control" placeholder="消息名稱" name="newsTitle" id="class_name" required>
							</div>
							<div class="form-group">
								<label>消息分類</label>
								
							<select class="form-control" name="newsAddress" id="class_name">
								<option value="課程/行政">課程/行政</option>
								<option value="志工/活動">志工/活動</option>
								<option value="研討/計畫">研討/計畫</option>
							</select>
							</div>
							<div class="form-group">
								<label>活動地點</label>
								<input type="text" class="form-control" placeholder="活動地點" name="position" id="class_name" >
							</div>
							<div class="form-group">
								<label>活動開始時間</label>
								<input type="date" class="form-control" placeholder="活動開始時間" name="starttime" id="class_name" required>
							</div>
							<div class="form-group">
								<label>活動結束時間</label>
								<input type="date" class="form-control" placeholder="活動結束時間" name="endtime" id="class_name" required>
							</div>
							<div class="form-group">
								<label>發布者</label>
								<input type="text" class="form-control" placeholder="發布者" name="newsperson" value="" required >
							</div>
							<div class="form-group">
								<label>發布單位</label>
								<input type="text" class="form-control" placeholder="發布單位" name="newsunit" value="" required >
							</div>
							<div class="form-group">
								<label>連絡電話</label>
								<input type="text" class="form-control" placeholder="連絡電話" name="phone" value="" required >
							</div>
							<div class="form-group">
								<label>置頂</label>
								
							<select class="form-control" name="newshot" id="class_name">
								<option value="否">否</option>
								<option value="是">是</option>

							</select>
							</div>
							<div class="form-group">
							<label>檔案上傳</label>
							<input type="file" name="catalog" id="imgInp">
							<input type="hidden" name="caname" id="tmp_name">
							</div>
							<div class="form-group">
							<label>檔案上傳</label>
							<input type="file" name="catalog1" id="imgInp">
							<input type="hidden" name="caname" id="tmp_name">
							</div>
							<div class="form-group">
							<label>檔案上傳</label>
							<input type="file" name="catalog2" id="imgInp">
							<input type="hidden" name="caname" id="tmp_name">
							</div>
							<div class="form-group">
								<label>消息內容</label>
								<textarea rows="10" class="form-control" id ="charArea" name="newscontent"></textarea>
							</div>
							<div>
								<button type="submit" class="btn btn-default" name="createBtn">新增</button>
								<a onclick="javascript:window.location='newsList.php'" class="btn btn-default">取消</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
	</html>

	<script>
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