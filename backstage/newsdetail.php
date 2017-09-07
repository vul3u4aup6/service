<?php
include_once ('../database.php');
include_once ('function.php');
$show = TRUE;

	$id = $_GET['id'];
	// 撈該筆資料
	$sql = 'SELECT * FROM billboard WHERE `b_id` = "'.$id.'"';
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$name = $row["b_title"];
			$address = $row["b_class"];
			$date = $row["b_content"];
			$person=$row["b_presenter"];
			$unit=$row["b_unit"];
			$position=$row["b_position"];
			$phone=$row["b_phone"];
			$starttime=$row["b_starttime"];
			$endtime=$row["b_endtime"];
			$pdf=$row["b_pdfpath"];
			$pdf1=$row["b_pdfpath_1"];
			$pdf2=$row["b_pdfpath_2"];
			$hot=$row["b_hot"];
			
		}
	}

if(isset($_POST['saveBtn'])){
	$id = $_POST['id'];
	$N_title = $_POST['newsTitle'];
	$N_address = $_POST['newsAddress'];
	$N_person = $_POST['newsperson'];
	$N_unit = $_POST['newsunit'];
	$N_content = $_POST['newscontent'];
	$position = $_POST['position'];
	$phone = $_POST['phone'];
	$starttime = $_POST['starttime'];
	$endtime = $_POST['endtime'];
	$hot = $_POST['hot'];
	
if ($_FILES["catalog"]["error"] > 0){
if ($_FILES["catalog1"]["error"] > 0){

		if ($_FILES["catalog2"]["error"] > 0){

		$sql = 'UPDATE billboard SET `b_title` = "'.$N_title.'", `b_class` = "'.$N_address.'", `b_presenter` = "'.$N_person.'", `b_unit` = "'.$N_unit.'", `b_content` = "'.$N_content.'", `b_position` = "'.$position.'", `b_phone` = "'.$phone.'", `b_starttime` = "'.$starttime.'", `b_endtime` = "'.$endtime.'", `b_hot` = "'.$hot.'" WHERE `b_id` = "'.$id.'"';
		$result = mysqli_query($conn, $sql);
		$conn->close();
		$show = FALSE;
		header('Location: newsList.php');
		exit;
	
			
		}else{
			if ($_FILES["catalog"]["error"] > 0){
				$pdf2 = upload_file_by_bill2();
			if($pdf2 != FALSE){
			$sql = 'UPDATE billboard SET `b_title` = "'.$N_title.'", `b_class` = "'.$N_address.'", `b_presenter` = "'.$N_person.'", `b_unit` = "'.$N_unit.'", `b_content` = "'.$N_content.'", `b_position` = "'.$position.'", `b_phone` = "'.$phone.'", `b_starttime` = "'.$starttime.'", `b_endtime` = "'.$endtime.'", `b_pdfpath_2` = "'.$pdf2.'", `b_hot` = "'.$hot.'" WHERE `b_id` = "'.$id.'"';
			$result = mysqli_query($conn, $sql);
			$conn->close();
			$show = FALSE;
			header('Location: newsList.php');
			exit;
					}
			}else{
				if ($_FILES["catalog1"]["error"] > 0){
					$pdf2 = upload_file_by_bill2();
				$pdf = upload_file_by_bill();
				
					if($pdf != FALSE&&$pdf2 != FALSE){
					$sql = 'UPDATE billboard SET `b_title` = "'.$N_title.'", `b_class` = "'.$N_address.'", `b_presenter` = "'.$N_person.'", `b_unit` = "'.$N_unit.'", `b_content` = "'.$N_content.'", `b_position` = "'.$position.'", `b_phone` = "'.$phone.'", `b_starttime` = "'.$starttime.'", `b_endtime` = "'.$endtime.'", `b_pdfpath` = "'.$pdf.'", `b_pdfpath_2` = "'.$pdf2.'", `b_hot` = "'.$hot.'" WHERE `b_id` = "'.$id.'"';
					$result = mysqli_query($conn, $sql);
					$conn->close();
					$show = FALSE;
					header('Location: newsList.php');
					exit;
					}
				}else{
					$pdf = upload_file_by_bill();
				$pdf1 = upload_file_by_bill1();
				$pdf2 = upload_file_by_bill2();
				
					if($pdf != FALSE&&$pdf1 != FALSE&&$pdf2 != FALSE){
					$sql = 'UPDATE billboard SET `b_title` = "'.$N_title.'", `b_class` = "'.$N_address.'", `b_presenter` = "'.$N_person.'", `b_unit` = "'.$N_unit.'", `b_content` = "'.$N_content.'", `b_position` = "'.$position.'", `b_phone` = "'.$phone.'", `b_starttime` = "'.$starttime.'", `b_endtime` = "'.$endtime.'", `b_pdfpath` = "'.$pdf.'", `b_pdfpath_1` = "'.$pdf1.'", `b_pdfpath_2` = "'.$pdf2.'", `b_hot` = "'.$hot.'" WHERE `b_id` = "'.$id.'"';
					$result = mysqli_query($conn, $sql);
					$conn->close();
					$show = FALSE;
					header('Location: newsList.php');
					exit;
					}
				}
				
			}
			
		}
	
			
		}else{
			if ($_FILES["catalog2"]["error"] > 0){
				$pdf1 = upload_file_by_bill1();
			if($pdf1 != FALSE){
			$sql = 'UPDATE billboard SET `b_title` = "'.$N_title.'", `b_class` = "'.$N_address.'", `b_presenter` = "'.$N_person.'", `b_unit` = "'.$N_unit.'", `b_content` = "'.$N_content.'", `b_position` = "'.$position.'", `b_phone` = "'.$phone.'", `b_starttime` = "'.$starttime.'", `b_endtime` = "'.$endtime.'", `b_pdfpath_1` = "'.$pdf1.'", `b_hot` = "'.$hot.'" WHERE `b_id` = "'.$id.'"';
			$result = mysqli_query($conn, $sql);
			$conn->close();
			$show = FALSE;
			header('Location: newsList.php');
			exit;
					}
			}else{
				if ($_FILES["catalog"]["error"] > 0){
					$pdf1 = upload_file_by_bill1();
				$pdf2 = upload_file_by_bill2();
				
					if($pdf1 != FALSE&&$pdf2 != FALSE){
					$sql = 'UPDATE billboard SET `b_title` = "'.$N_title.'", `b_class` = "'.$N_address.'", `b_presenter` = "'.$N_person.'", `b_unit` = "'.$N_unit.'", `b_content` = "'.$N_content.'", `b_position` = "'.$position.'", `b_phone` = "'.$phone.'", `b_starttime` = "'.$starttime.'", `b_endtime` = "'.$endtime.'", `b_pdfpath_1` = "'.$pdf1.'", `b_pdfpath_2` = "'.$pdf2.'", `b_hot` = "'.$hot.'" WHERE `b_id` = "'.$id.'"';
					$result = mysqli_query($conn, $sql);
					$conn->close();
					$show = FALSE;
					header('Location: newsList.php');
					exit;
					}
				}else{
					$pdf = upload_file_by_bill();
				$pdf1 = upload_file_by_bill1();
				$pdf2 = upload_file_by_bill2();
				
					if($pdf != FALSE&&$pdf1 != FALSE&&$pdf2 != FALSE){
					$sql = 'UPDATE billboard SET `b_title` = "'.$N_title.'", `b_class` = "'.$N_address.'", `b_presenter` = "'.$N_person.'", `b_unit` = "'.$N_unit.'", `b_content` = "'.$N_content.'", `b_position` = "'.$position.'", `b_phone` = "'.$phone.'", `b_starttime` = "'.$starttime.'", `b_endtime` = "'.$endtime.'", `b_pdfpath` = "'.$pdf.'", `b_pdfpath_1` = "'.$pdf1.'", `b_pdfpath_2` = "'.$pdf2.'", `b_hot` = "'.$hot.'" WHERE `b_id` = "'.$id.'"';
					$result = mysqli_query($conn, $sql);
					$conn->close();
					$show = FALSE;
					header('Location: newsList.php');
					exit;
					}
				}
				
			}
			
		}
	
			
		}else{
			if ($_FILES["catalog1"]["error"] > 0){
				$pdf = upload_file_by_bill();
			if($pdf != FALSE){
			$sql = 'UPDATE billboard SET `b_title` = "'.$N_title.'", `b_class` = "'.$N_address.'", `b_presenter` = "'.$N_person.'", `b_unit` = "'.$N_unit.'", `b_content` = "'.$N_content.'", `b_position` = "'.$position.'", `b_phone` = "'.$phone.'", `b_starttime` = "'.$starttime.'", `b_endtime` = "'.$endtime.'", `b_pdfpath` = "'.$pdf.'", `b_hot` = "'.$hot.'" WHERE `b_id` = "'.$id.'"';
			$result = mysqli_query($conn, $sql);
			$conn->close();
			$show = FALSE;
			header('Location: newsList.php');
			exit;
					}
			}else{
				if ($_FILES["catalog2"]["error"] > 0){
					$pdf = upload_file_by_bill();
				$pdf1 = upload_file_by_bill1();
				
					if($pdf != FALSE&&$pdf1 != FALSE){
					$sql = 'UPDATE billboard SET `b_title` = "'.$N_title.'", `b_class` = "'.$N_address.'", `b_presenter` = "'.$N_person.'", `b_unit` = "'.$N_unit.'", `b_content` = "'.$N_content.'", `b_position` = "'.$position.'", `b_phone` = "'.$phone.'", `b_starttime` = "'.$starttime.'", `b_endtime` = "'.$endtime.'", `b_pdfpath` = "'.$pdf.'", `b_pdfpath_1` = "'.$pdf1.'", `b_hot` = "'.$hot.'" WHERE `b_id` = "'.$id.'"';
					$result = mysqli_query($conn, $sql);
					$conn->close();
					$show = FALSE;
					header('Location: newsList.php');
					exit;
					}
				}else{
					$pdf = upload_file_by_bill();
				$pdf1 = upload_file_by_bill1();
				$pdf2 = upload_file_by_bill2();
				
					if($pdf != FALSE&&$pdf1 != FALSE&&$pdf2 != FALSE){
					$sql = 'UPDATE billboard SET `b_title` = "'.$N_title.'", `b_class` = "'.$N_address.'", `b_presenter` = "'.$N_person.'", `b_unit` = "'.$N_unit.'", `b_content` = "'.$N_content.'", `b_position` = "'.$position.'", `b_phone` = "'.$phone.'", `b_starttime` = "'.$starttime.'", `b_endtime` = "'.$endtime.'", `b_pdfpath` = "'.$pdf.'", `b_pdfpath_1` = "'.$pdf1.'", `b_pdfpath_2` = "'.$pdf2.'", `b_hot` = "'.$hot.'" WHERE `b_id` = "'.$id.'"';
					$result = mysqli_query($conn, $sql);
					$conn->close();
					$show = FALSE;
					header('Location: newsList.php');
					exit;
					}
				}
				
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
						<h1>修改內文</h1>
					</div>
					<ol class="breadcrumb">
						<li><a href="classList.php">首頁</a></li>
						<li><a href="newsList.php">消息管理</a></li>
						<li class="active">修改消息</li>
					</ol>
					<div>
						<form action="#" method="post" enctype="multipart/form-data">
							<input type="hidden" value="<?=$id?>" name="id">
							<div class="form-group">
								<label>消息標題</label>
								<input type="text" class="form-control" placeholder="消息名稱" name="newsTitle" value="<?=$name?>" required >
							</div>
							<div class="form-group">
								<label>消息分類</label>
								<select class="form-control" name="newsAddress" id="class_name">
								<option selectes hidden value="<?=$address?>"><?php echo $address ?></option>
								<option value="課程/行政">課程/行政</option>
								<option value="志工/活動">志工/活動</option>
								<option value="研討/計畫">研討/計畫</option>
							</select>
							</div>
							<div class="form-group">
								<label>活動地點</label>
								<input type="text" class="form-control" placeholder="活動地點" name="position" value="<?=$position?>" >
							</div>
							<div class="form-group">
								<label>活動開始時間</label>
								<input type="date" class="form-control" placeholder="活動開始時間" name="starttime" id="class_name" value="<?=$starttime?>" required>
							</div>
							<div class="form-group">
								<label>活動結束時間</label>
								<input type="date" class="form-control" placeholder="活動結束時間" name="endtime" id="class_name" value="<?=$endtime?>" required>
							</div>
							<div class="form-group">
								<label>發布者</label>
								<input type="text" class="form-control" placeholder="發布者" name="newsperson" value="<?=$person?>" required >
							</div>
							<div class="form-group">
								<label>發布單位</label>
								<input type="text" class="form-control" placeholder="發布單位" name="newsunit" value="<?=$unit?>" required >
							</div>
							<div class="form-group">
								<label>連絡電話</label>
								<input type="text" class="form-control" placeholder="連絡電話" name="phone" value="<?=$phone?>" required >
							</div>
							<div class="form-group">
								<label>置頂</label>
								<select class="form-control" name="hot" id="class_name">
								<option selectes hidden value="<?=$hot?>"><?php echo $hot ?></option>
								<option value="否">否</option>
								<option value="是">是</option>
							</select>
							</div>
							<div class="form-group">
								<label>檔案名稱：<?php echo $pdf;?></label><br/><br/>
								<label>重新選擇檔案：</label>
								<input type="file" name="catalog" id="imgInp">
								<input type="hidden" name="caname" id="tmp_name"><br/>
							</div>
							<div class="form-group">
								<label>檔案名稱：<?php echo $pdf1;?></label><br/><br/>
								<label>重新選擇檔案：</label>
								<input type="file" name="catalog1" id="imgInp">
								<input type="hidden" name="caname" id="tmp_name"><br/>
							</div>
							<div class="form-group">
								<label>檔案名稱：<?php echo $pdf2;?></label><br/><br/>
								<label>重新選擇檔案：</label>
								<input type="file" name="catalog2" id="imgInp">
								<input type="hidden" name="caname" id="tmp_name"><br/>
							</div>
							<div class="form-group">
								<label>消息內容</label>
								<textarea rows="10" class="form-control" id ="charArea" name="newscontent"><?=(isset($date))?$date:''?></textarea>
							</div>
							<div>
								<button type="submit" class="btn btn-default" name="saveBtn">修改</button>
								<a onclick="javascript:window.location='newsList.php'" class="btn btn-default">取消</a>

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
	 valid_elements : '*[*]',
    extended_valid_elements : '*[*]',
    entity_encoding : "raw",
    force_br_newlines : false,
    force_p_newlines : false,
    forced_root_block : '',
    paste_word_valid_elements: "b,strong,i,em,h1,h2,u,p,ol,ul,li,a[href],span,color,font-size,font-color,font-family,mark",
    paste_retain_style_properties: "all",
    codemirror: {
        indentOnInit: true, // Whether or not to indent code on init.
        fullscreen: true,   // Default setting is false
        path: 'CodeMirror', // Path to CodeMirror distribution
        config: {           // CodeMirror config object
            mode: 'application/x-httpd-php',
            lineNumbers: true,
            indentUnit: 4,
            //匹配括号
            matchBrackets: true,
            //匹配标签
            matchTags: { bothTags: true },
            indentWithTabs: false,
            foldGutter: true,
            gutters: ["CodeMirror-linenumbers", "CodeMirror-foldgutter"],
            extraKeys: {"Ctrl-Q": function(cm){ cm.foldCode(cm.getCursor()); }}
        },
		 saveCursorPosition: true,
		 init_instance_callback : function(editor) {
        // jw: this code is heavily borrowed from tinymce.jquery.js:12231 but modified so that it will
        //     just remove the escaping and not add it back.
        editor.serializer.addNodeFilter('script,style', function(nodes, name) {
            var i = nodes.length, node, value, type;
 
            function trim(value) {
                /*jshint maxlen:255 */
                /*eslint max-len:0 */
                return value.replace(/(<!--\[CDATA\[|\]\]-->)/g, '\n')
                    .replace(/^[\r\n]*|[\r\n]*$/g, '')
                    .replace(/^\s*((<!--)?(\s*\/\/)?\s*<!\[CDATA\[|(<!--\s*)?\/\*\s*<!\[CDATA\[\s*\*\/|(\/\/)?\s*<!--|\/\*\s*<!--\s*\*\/)\s*[\r\n]*/gi, '\n')
                    .replace(/\s*(\/\*\s*\]\]>\s*\*\/(-->)?|\s*\/\/\s*\]\]>(-->)?|\/\/\s*(-->)?|\]\]>|\/\*\s*-->\s*\*\/|\s*-->\s*)\s*$/g, '\n');
            }
            while (i--) {
                node = nodes[i];
                value = node.firstChild ? node.firstChild.value : '';
 
                if (value.length > 0) {
                    node.firstChild.value = trim(value);
                }
            }
        });
		 }
    },
    setup: function (editor) {
        editor.on('change', function () {
            tinymce.triggerSave();
        });
    },
	plugins: [
	"advlist autolink lists link image charmap print preview hr anchor pagebreak",
	"searchreplace wordcount visualblocks visualchars code fullscreen",
	"insertdatetime media nonbreaking save table contextmenu directionality",
	"emoticons template paste textcolor colorpicker textpattern"
	],
	toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
	toolbar2: "print preview media | forecolor backcolor emoticons",
	image_advtab: true,
	 paste_data_images: true
});

	</script>
	<?php
}
?>