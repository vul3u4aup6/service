<?php
include_once ('../database.php');
include_once ('function.php');
$show = TRUE;
if (isset($_POST['updateBtn'])) {
	$id = $_POST['id'];
	// 撈該筆資料
	$sql = 'SELECT * FROM runtext WHERE `rt_id` = "'.$id.'"';
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$title = $row["rt_title"];
			
			
			
			
			
		}
	}
}

if(isset($_POST['saveBtn'])){
	$id = $_POST['id'];
	$N_title = $_POST['title'];
	
	


	
	

	$sql = 'UPDATE runtext SET `rt_title` = "'.$N_title.'" WHERE `rt_id` = "'.$id.'"';
	$result = mysqli_query($conn, $sql);
	
	$conn->close();
	$show = FALSE;
	header('Location: runtext.php');
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
						<h1>修改訊息</h1>
					</div>
					<ol class="breadcrumb">
						<li><a href="classList.php">首頁</a></li>
						<li><a href="runtext.php">跑馬燈</a></li>
						<li class="active">修改訊息</li>
					</ol>
					<div>
						<form action="#" method="post" enctype="multipart/form-data">
							<input type="hidden" value="<?=$id?>" name="id">
							<div class="form-group">
								<label>訊息</label>
								<input type="text" class="form-control" placeholder="標題" name="title" value="<?=$title?>" required >
							</div>
							
							
							<div>
								<button type="submit" class="btn btn-default" name="saveBtn">修改</button>
								<a onclick="javascript:window.location='runtext.php'" class="btn btn-default">取消</a>

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
tinymce.init({
	selector: "#charArea1",
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