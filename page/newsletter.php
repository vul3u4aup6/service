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
        <div class="article" style="margin-left:5%;">
          <p style="font-size:20px"><strong>教師心得</strong></p><div class="clr"></div><p/>
		
			<div style="width:100%;collapse:collapse">
			<?php $sql="Select * from newsletter where n_class='教師心得'";
			$result=mysqli_query($conn,$sql);
			while($row=mysqli_fetch_assoc($result)){?>
				<div style="width:25%;height:120px;display:inline-block;border:1px solid black;text-align:center;margin-top:1%">
				<img src="<?php echo $row['n_absimage'];?>"  style="width:100%;height:120px;">
				</div>
				<div style="width:60%;display:inline-block;text-align:center;margin-top:1%">
				
				<p style="font-size:24px;text-align:center;margin-bottom:0px"><?php echo $row['n_title'];?></p>
				<p style="font-size:18px;text-align:right;margin-bottom:0px"><?php echo $row['n_unit'];?>/<?php echo $row['n_author']?></p>
				
				</div>
				<div style="width:100%;display:inline-block;text-align:center;margin-top:1%">
				
				<p style="font-size:18px;text-align:left;margin-bottom:0px"><?php echo $row['n_abstract'];?></p>
				<a href="newsletter_detail.php?id=<?php echo $row['n_id'];?>" style="font-size:14px;float:right;margin-bottom:0px">Read more</a>
				
				<hr>
				
				</div>
			<?php }?>
				
			</div>
		 
        </div>
      </div>
      <div class="sidebar">
     
         <div class="gadget">
          <p style="font-size:28px;color:#6C6C6C">中心電子報</p>
          <div class="clr"></div>
          <ul class="sb_menu" style="list-style:circle">
            <li><a href="newsletter.php" style="font-size:16px">教師心得</a></li>
            <li><a href="newsletter_student.php" style="font-size:16px">學生心得</a></li>
            <li><a href="newsletter_assistant.php" style="font-size:16px">助理心得</a></li>
            <li><a href="newsletter_internation.php" style="font-size:16px">國際志工</a></li>
            <li><a href="newsletter_other.php" style="font-size:16px">其他報導</a></li>
            
            
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

