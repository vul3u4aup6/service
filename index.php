<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>靜宜大學服務學習發展中心</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/produce.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="css/responsiveslides.css" />
<link href="css/zerogrid.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/arial.js"></script>
<script type="text/javascript" src="js/cuf_run.js"></script>
<script src="http://cdn.staticfile.org/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="js/scroll.js"></script>
	<script src="js/responsiveslides.js"></script>
	<script src="lib/slick/slick.js"></script>
	<link rel="stylesheet" href="lib/slick/slick.css">
	<link rel="stylesheet" href="lib/slick/slick-theme.css">
<script>
$(function(){
    $('.myscroll').myScroll({
        speed: 40, //数值越大，速度越慢
        rowHeight: 26 //li的高度
    });
});
$(function () {
		$("#slider").responsiveSlides({
			auto: true,
			pager: false,
			nav: true,
			speed: 500,
			maxwidth: 962,
			namespace: "centered-btns"
		});
	});
	$(document).ready(function(){
		$('.itemB').slick({
			infinite: true,
			dots: true,
			slidesToShow: 3,
			slidesToScroll: 3,
			autoplay: true,
			autoplaySpeed: 3000,
			arrows: true,
			responsive: [
			{
				breakpoint: 700,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
			]
		});
	});
</script>

<!-- CuFon ends -->
</head>
<body>
<div class="main">
  <?php include_once("header.php");
  include_once("database.php");?>
  <div class="clr"></div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar" >
        <div class="article" style="margin-left:5%">
          <p style="font-size:28px;color:#6C6C6C">最新公告</p>
		  <div class="menu" style="margin-top:5%">
			<ul>
				<li class="first" style="background-color:		#BBFFBB"><a href="#">全部類別</a></li>
				<li style="background-color:		#BBFFBB;margin-left:1%"><a href="#">課程/行政公告</a></li>
				<li class="last" style="background-color:		#BBFFBB;margin-left:1%"><a href="#">志工/活動公告</a>
					
				</li>
				<li class="last" style="background-color:		#BBFFBB;margin-left:1%"><a href="#">研討/計畫方案</a>
					
				</li>
                
			</ul>
		</ul>
	</div>
          <table style="width:100%;border:1px solid black;margin-top:20%">
		  <thead style="background-color:	#BBFFBB;text-align:center;font-size:20px">
		  <th>公告</th>
		  <th>類別</th>
		  <th>公告日期</th>
		  
		  </thead>
		  <tbody style="font-size:16px">
		  <?php 
		  $sql="Select * from billboard";
			$result=mysqli_query($conn,$sql);
				while($row=mysqli_fetch_array($result)){
					?>
					<tr>
					<td><?php echo $row[1];?></td>
					<td><?php echo $row[2];?></td>
					<td><?php echo $row[5];?></td>
					</tr>
					<?php
				}
		  ?>
		  </tbody>
		  </table>
          
        </div>
        <div class="article" style="margin-left:5%">
          <p style="font-size:28px;color:#6C6C6C">學生影片</p>
          
			<div style="width:100%">
				<div style="width:30%;display:inline-block">
				<img src="../images/gallery_1.jpg" style="width:100%"><br/><br/><br/>
				<a href="#" style="font-size:20px;">iHelp社頭FUN遊趣團隊微電影</a>
				</div>
				<div style="width:30%;display:inline-block">
				<img src="../images/gallery_2.jpg" style="width:100%"><br/><br/><br/>
				<a href="#" style="font-size:20px;">iHelp社頭FUN遊趣團隊微電影</a>
				</div>
				<div style="width:30%;display:inline-block">
				<img src="../images/gallery_3.jpg" style="width:100%"><br/><br/><br/>
				<a href="#" style="font-size:20px;">iHelp社頭FUN遊趣團隊微電影</a>
				</div>
			</div>
		  <p><a href="#">Read more </a></p>
        </div>
      </div>
      <div class="sidebar">
     
        <div class="gadget">
          <p style="font-size:28px;color:#6C6C6C">重要訊息</p>
          <div class="myscroll">
          <ul>
		  <li><a></a></li>
		<li><a></a></li>
		<li><a></a></li>
		<li><a></a></li>
		<li><a></a></li>
		<li><a></a></li>
		<li><a></a></li>
		<li><a></a></li>
		<li><a></a></li>
		<li><a></a></li>
		<li><a></a></li>
		<li><a  style="font-size:20px">承蒙各校對本校服務學習課程教材之肯定與支持，為尊重本校服務學習課程之著作權益，敬請欲援用部分文章之單位，遵守智慧財產權之規定，應徵詢著作財產人同意或授權，並註明出處來源，始得合法使用轉載。靜宜大學服務學習發展中心感謝您的配合！</a></li>
		<li><a></a></li>
		<li><a></a></li>
		<li><a></a></li>
		<li><a></a></li>
		<li><a></a></li>		
		</ul>
		  </div>
        </div>
        <div class="gadget">
          <p style="font-size:28px;color:#6C6C6C">熱門連結</p>
          <div class="clr"></div>
          <ul class="ex_menu">
            <li><a href="#"><img src="../images/npo.jpg" style="width:250px"></a></li>
            <li><a href="#"><img src="../images/form.jpg" style="width:250px"></a></li>
            <li><a href="#"><img src="../images/news.jpg" style="width:250px"></a></li>
            <li><a href="#"><img src="../images/document.jpg" style="width:250px"></a></li>
            <li><a href="#"><img src="../images/ic.jpg" style="width:250px"></a></li>
            <li><a href="#"><img src="../images/edu-plan.jpg" style="width:250px"></a></li>
          </ul>
        </div>
        
             </div>
      <div class="clr"></div>
    </div>
  </div>
  <?php include_once("footer.php");?>
</div>
</body>
</html>


