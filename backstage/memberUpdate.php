<?php
include_once ('../database.php');
include_once ('function.php');
$show = TRUE;
if (isset($_POST['updateBtn'])) {
	$id = $_POST['id'];
	// 撈該筆資料
	$sql = 'SELECT * FROM member WHERE `m_id` = "'.$id.'"';
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$name = $row["m_name"];
			$position = $row["m_position"];
			$ext = $row["m_ext"];
			$mail=$row["m_email"];
			$content=$row["m_content"];
			$img=$row["m_photo"];
			
			
			
		}
	}
}
	$dir = "../people/";
	$imgArray = getDirFile($dir);
if(isset($_POST['saveBtn'])){
	$id = $_POST['id'];
	$N_title = $_POST['name'];
	$N_address = $_POST['position'];
	$N_person = $_POST['ext'];
	$N_unit = $_POST['mail'];
	$N_content = $_POST['content'];
	if(isset($_POST['optionsRadios'])){
	$optionsRadios = $_POST['optionsRadios'];
	
	

	$sql = 'UPDATE member SET `m_name` = "'.$N_title.'", `m_position` = "'.$N_address.'", `m_ext` = "'.$N_person.'", `m_email` = "'.$N_unit.'", `m_content` = "'.$N_content.'", `m_photo` = "'.$optionsRadios.'" WHERE `m_id` = "'.$id.'"';
	$result = mysqli_query($conn, $sql);
	}else{
	$sql = 'UPDATE member SET `m_name` = "'.$N_title.'", `m_position` = "'.$N_address.'", `m_ext` = "'.$N_person.'", `m_email` = "'.$N_unit.'", `m_content` = "'.$N_content.'" WHERE `m_id` = "'.$id.'"';
	$result = mysqli_query($conn, $sql);
	}
	$conn->close();
	$show = FALSE;
	header('Location: memberList.php');
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
						<h1>修改成員</h1>
					</div>
					<ol class="breadcrumb">
						<li><a href="classList.php">首頁</a></li>
						<li><a href="memberlist.php">成員管理</a></li>
						<li class="active">修改成員</li>
					</ol>
					<div>
						<form action="#" method="post" enctype="multipart/form-data">
							<input type="hidden" value="<?=$id?>" name="id">
							<div class="form-group">
								<label>姓名</label>
								<input type="text" class="form-control" placeholder="姓名" name="name" value="<?=$name?>" required >
							</div>
							<div class="form-group">
								<label>職稱</label>
								<input type="text" class="form-control" placeholder="職稱" name="position" value="<?=$position?>" required >
							</div>
							<div class="form-group">
								<label>分機號碼</label>
								<input type="text" class="form-control" placeholder="分機號碼" name="ext" value="<?=$ext?>" required >
							</div>
							<div class="form-group">
								<label>信箱</label>
								<input type="text" class="form-control" placeholder="信箱" name="mail" value="<?=$mail?>" required >
							</div>
							<div class="form-group">
								<label>職掌</label>
								<textarea rows="10" class="form-control" id ="charArea" name="content"><?=(isset($content))?$content:''?></textarea>
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
								<a onclick="javascript:window.location='memberlist.php'" class="btn btn-default">取消</a>

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