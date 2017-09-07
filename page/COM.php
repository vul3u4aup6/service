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
  <?php include_once("header.php");
  include_once("database.php");?>
  <div class="clr"></div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar" >
        
        <div class="article" >
          <p style="font-size:20px"><strong>成員介紹</strong></p><div class="clr"></div><p/>
         <hr>
			
			<?php $sql="Select * from member";
			$result=mysqli_query($conn,$sql);
			while($row=mysqli_fetch_assoc($result)){?>
			<div style="width:100%;height:150px;collapse:collapse">
			<div style="width:15%">
				<img src="<?php echo $row['m_photo'];?>"  style="width:120px;height:120px;">
				</div>
				<div style="width:15%;display:inline-block;margin-top:1%">
			
				<a  style="font-size:15px"><?php echo $row['m_name'];?></a><br/>
				<a style="font-size:15px;white-space:nowrap;">職稱：<?php echo $row['m_position'];?></a><br/>
				<a style="font-size:15px;white-space:nowrap;">校內分機：<?php echo $row['m_ext'];?></a><br/>
				<a  style="font-size:15px">信箱：<?php echo $row['m_email'];?></a><br/>
				
				</div>
				<div style="width:60%;display:inline-block;margin-top:1%;margin-left:7.8%">
				<div style="font-size:13px">業務職掌：<?php echo $row['m_content'];?></div>
				
				</div>
				</div>
				<br/>
			<?php }?>
				
			 <p style="text-align:right"><a href="COM.php">(TOP)</a></p>
		  
        </div>
      </div>
        <div class="sidebar">
     
           <div class="gadget">
          <p style="font-size:28px;color:#6C6C6C">聯絡我們</p>
          <div class="clr"></div>
          <ul class="sb_menu" style="list-style:circle">
            <li><a href="COC.php">組織</a></li>
            <li><a href="COM.php">成員</a></li>
            <li><a href="COW.php">工作業務</a></li>
            <li><a href="COP.php">中心位置</a></li>
            
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


