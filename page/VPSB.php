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
        <div class="article">
          <p style="font-size:20px"><strong>校園出版</strong></p><div class="clr"></div><p/>
		   <hr>
		  <div class="wrap-content zerogrid">
		  <div class="row block01" style="width:100%">
			<?php $sql="Select * from publish";
			$result=mysqli_query($conn,$sql);
			while($row=mysqli_fetch_assoc($result)){?>
				<div  style="width:32%;display:inline-block;border:1px solid black;text-align:center;margin-top:1%">
				<div class="col-2-3" style="text-align:center;height:60px"><a href="#" style="font-size:19px;"><?php echo $row['p_title'];?></div>
				<div class="col-1-3" ><a href="<?php echo $row['p_pdfpath'];?>" download="<?php echo $row['p_title'];?>"><img src="images/adobe_icon.jpg" style="width:30px;float:right"></a></div>
				<img src="<?php echo $row['p_image'];?>"  style="width:180px;height:200px;float:center"></a><br/><br/><br/>
				
				</div>
				
				
				
			<?php }?>
				</div>
			</div>
			 <p style="text-align:right"><a href="VPSB.php">(TOP)</a></p>
        </div>
		
      </div>
      <div class="sidebar">
     
         <div class="gadget">
          <p style="font-size:28px;color:#000000">志工靜宜</p>
          <div class="clr"></div>
          <ul class="sb_menu" style="list-style:circle">
            <li><a href="VPUS.php" style="font-size:16px">緣起</a></li>
            <li><a href="VPS.php" style="font-size:16px">特色</a></li>
            <li><a href="VPG.php" style="font-size:16px">願景</a></li>
            <li><a href="VPSB.php" style="font-size:16px">校園出版</a></li>
            <li><a href="VPM.php" style="font-size:16px">相關辦法</a></li>
            
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

