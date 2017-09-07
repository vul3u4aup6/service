<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>靜宜大學服務學習發展中心</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/produce.css" rel="stylesheet" type="text/css" />
<link href="css/service_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="css/responsiveslides.css" />
<link href="css/zerogrid.css" rel="stylesheet" type="text/css" />
<link href="images/favicon.ico" rel="Shortcut Icon" type="image/x-icon">
<script type="text/javascript" src="js/cufon-yui.js"></script>
<!--<script type="text/javascript" src="js/arial.js"></script>-->
<script type="text/javascript" src="js/cuf_run.js"></script>
<script src="http://cdn.staticfile.org/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="js/scroll.js"></script>
	<script src="js/responsiveslides.js"></script>
	<script src="lib/slick/slick.js"></script>
	<link rel="stylesheet" href="lib/slick/slick.css">
	<link rel="stylesheet" href="lib/slick/slick-theme.css">
<!-- CuFon ends -->
</head>
<body>
<div class="main">
  <?php include_once("header.php");?>
  <div class="clr"></div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
        <div class="article" style="width:700px">
          <p style="font-size:20px"><strong>服務成果</strong></p><div class="clr"></div><p/>
		  <?php 
		  $sql="Select * from service_result where sr_catagory='校內外機構服務比例'";
			$result=mysqli_query($conn,$sql);
			$row=mysqli_fetch_assoc($result);
		  ?>
		  <p style="font-size:20px"><strong><?php echo $row['sr_introduction'];?></strong></p><div class="clr"></div><p/>
		  <img src="<?php echo $row['sr_img'];?>" style="width:659px;height:417px"/>
		
			
				
        </div>
      </div>
      <div class="sidebar">
     
          <div class="gadget">
          <p style="font-size:28px;color:#6C6C6C">服務成果</p>
          <div class="clr"></div>
          <ul class="sb_menu" style="list-style:circle">
            <li><a href="RS.php">大一服務成果</a>
			<ul>
				<li><a href="RS.php">學生服務人力與時數</a>
				<li><a href="RC.php">參與服務學習教師人力</a>
				<li><a href="RU.php">校內外機構服務比例</a>
				<li><a href="RLC.php">服務學習課程合作單位</a>
				<li><a href="RA.php">課程前後測成效分析</a>
				
				</ul>
			</li>
            <li><a href="proresult.php">專業服務成果</a></li>
            <li><a href="RI.php">國際志工成果</a></li>
            <li><a href="RV.php">成果影片</a>
			<ul>
				<li><a href="RV.php">學生團隊</a>
				<li><a href="RVI.php">國際志工</a>
				<li><a href="RVC.php">線上學堂</a>
				</ul>
			</li>
            
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

