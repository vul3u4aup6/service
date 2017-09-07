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
        <div class="article">
          <p style="font-size:20px"><strong>課程申請/評估表格</strong></p><div class="clr"></div><p/>
		  <hr>
		  
		   <p style="font-size:16px"><strong>1.申請表格下載：</strong></p><div class="clr"></div><p/>
		  <table class="customer_table" style="background-color:	#ff7575;">
		  <thead>
			<th>項次</th>
			<th style="width:50%;text-align:center">內容</th>
			<th style="width:40%;text-align:center">檔案下載</th>
			
			</thead>
			<tbody>
			<?php 
			$i=1;
			$sql="Select * from applytable where at_title='專業服務學習補助辦法' ";
			$result=mysqli_query($conn,$sql);
			$row=mysqli_fetch_assoc($result);?>
				<tr>
				<td><?php echo $i++;?></td>
				<td><?php echo $row['at_title'];?></td>
				
				<td><a href="<?php echo $row['at_pdfpath'];?>" download="<?php echo $row['at_title'];?>_課程">課程</a>
				<?php 
				$sql="Select * from applytable where at_title='專業服務學習補助辦法' and at_catagory='制度'";
			$result=mysqli_query($conn,$sql);
			$row=mysqli_fetch_assoc($result);?>
				<a href="<?php echo $row['at_pdfpath'];?>" style="margin-left:20%" download="<?php echo $row['at_title'];?>_制度">制度</a>
			<?php
			$sql="Select * from applytable where at_title='專業服務學習補助辦法' and at_catagory='團隊'";
			$result=mysqli_query($conn,$sql);
			$row=mysqli_fetch_assoc($result);?>
				<a href="<?php echo $row['at_pdfpath'];?>" style="margin-left:20%" download="<?php echo $row['at_title'];?>_團隊" >團隊</a></td>
				
				</tr>
				
				<?php 
			
			$sql="Select * from applytable where at_title='專業服務學習申請計劃書' ";
			$result=mysqli_query($conn,$sql);
			$row=mysqli_fetch_assoc($result);?>
				<tr>
				<td><?php echo $i++;?></td>
				<td><?php echo $row['at_title'];?></td>
				
				<td><a href="<?php echo $row['at_pdfpath'];?>" download="<?php echo $row['at_title'];?>_課程">課程</a>
				<?php 
				$sql="Select * from applytable where at_title='專業服務學習申請計劃書' and at_catagory='制度'";
			$result=mysqli_query($conn,$sql);
			$row=mysqli_fetch_assoc($result);?>
				<a href="<?php echo $row['at_pdfpath'];?>" style="margin-left:20%" download="<?php echo $row['at_title'];?>_制度">制度</a>
			<?php
			$sql="Select * from applytable where at_title='專業服務學習申請計劃書' and at_catagory='團隊'";
			$result=mysqli_query($conn,$sql);
			$row=mysqli_fetch_assoc($result);?>
				<a href="<?php echo $row['at_pdfpath'];?>" style="margin-left:20%" download="<?php echo $row['at_title'];?>_團隊">團隊</a></td>
				
				</tr>
				
				<?php 
			
			$sql="Select * from applytable where at_title='專業服務學習計劃書範本' ";
			$result=mysqli_query($conn,$sql);
			$row=mysqli_fetch_assoc($result);?>
				<tr>
				<td><?php echo $i++;?></td>
				<td><?php echo $row['at_title'];?></td>
				
				<td><a href="<?php echo $row['at_pdfpath'];?>" download="<?php echo $row['at_title'];?>_課程">課程</a>
				<?php 
				$sql="Select * from applytable where at_title='專業服務學習計劃書範本' and at_catagory='制度'";
			$result=mysqli_query($conn,$sql);
			$row=mysqli_fetch_assoc($result);?>
				<a href="<?php echo $row['at_pdfpath'];?>" style="margin-left:20%" download="<?php echo $row['at_title'];?>_制度">制度</a>
			<?php
			$sql="Select * from applytable where at_title='專業服務學習計劃書範本' and at_catagory='團隊'";
			$result=mysqli_query($conn,$sql);
			$row=mysqli_fetch_assoc($result);?>
				<a href="<?php echo $row['at_pdfpath'];?>" style="margin-left:20%" download="<?php echo $row['at_title'];?>_團隊">團隊</a></td>
				
				</tr>
				<?php 
				$sql="Select * from applytable where at_title!='專業服務學習補助辦法' and at_title!='專業服務學習申請計劃書' and at_title!='專業服務學習計劃書範本'";
				$result=mysqli_query($conn,$sql);
				while($row=mysqli_fetch_assoc($result)){
				?>
				<tr>
				<td><?php echo $i++;?></td>
				<td><?php echo $row['at_title'];?></td>
				
				<td style="text-align:center"><a href="<?php echo $row['at_pdfpath'];?>" download="<?php echo $row['at_title'];?>" >Download</a>
				</tr>
				<?php }?>
				
				
				
				
			</tbody>
			</table>
			<p style="font-size:16px;margin-top:5%"><strong>2.評估表格下載：</strong></p><div class="clr"></div><p/>
			<table class="customer_table" style="background-color:	#ff7575">
		  <thead>
			<th >項次</th>
			<th style="width:20%">類別</th>
			<th style="text-align:center">項目</th>
			
			<th style="text-align:center">WORD檔</th>
			<th style="text-align:center">備註</th>
			
			</thead>
			<tbody>
			<?php 
			$i=1;
			$sql="Select * from evaluation";
			$result=mysqli_query($conn,$sql);
			while($row=mysqli_fetch_assoc($result)){?>
				<tr>
				<td><?php echo $i++;?></td>
				<td><?php echo $row['e_title'];?></td>
				<td><?php echo $row['e_content'];?></td>
				
				
				<td style="text-align:center"><a href="<?php echo $row['e_pdfpath'];?>" download="<?php echo $row['e_title'];?>_課程">Download</a></td>
				<td><?php echo $row['e_remarks'];?></td>
				
				</tr>
				
				
				
			<?php }?>
			</tbody>
			</table>
			 <p style="text-align:right"><a href="PST.php">(TOP)</a></p>
				
        </div>
      </div>
      <div class="sidebar">
     
         
        <div class="gadget">
         <p style="font-size:28px;color:#6C6C6C">專業服學</p>
          <div class="clr"></div>
          <ul class="sb_menu" style="list-style:circle">
            <li><a href="PSLS.php">課程簡介</a></li>
            <li><a href="PSR.php">實施辦法</a></li>
            <li><a href="PSF.php">申請作業</a></li>
            <li><a href="PSLST.php">運作流程</a></li>
            <li><a href="PST.php">課程申請/評估表格</a></li>
            
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

