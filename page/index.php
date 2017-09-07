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
<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
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

</script>

<!-- CuFon ends -->
</head>
<body>
<div class="wrap-content zerogrid">
<div class="main" style="background: url(images/main_bg1.png) top repeat-x;">
  <?php include_once("header.php");
  include_once("database.php");?>
  <div class="clr"></div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar" >
        <div class="article" style="margin-left:1%;width:720px">
        <p style="font-size:20px"><strong>最新公告</strong></p><div class="clr"></div><p/>
		    <div class="menu" style="margin-top:5%;">
			<ul style="width:100%;margin-left:1%">
				<li class="first" style="background-color:#73BF00;width:21%;text-align:center"><a href="index.php">全部類別</a></li>
				<li style="background-color:#73BF00;margin-left:1%"><a href="index.php?class=課程/行政">課程/行政公告</a></li>
				<li class="last" style="background-color:#73BF00;margin-left:1%"><a href="index.php?class=志工/活動">志工/活動公告</a>
					
				</li>
				<li class="last" style="background-color:#73BF00;margin-left:1%"><a href="index.php?class=研討/計畫">研討/計畫方案</a>
					
				</li>
                
			</ul>
		</ul>
	</div>
          
		  <?php
		  
			if(isset($_GET['class'])){
				$class=$_GET['class'];
				 
			?>
			<table style="width:100%;border:1px solid black;margin-top:20%">
		  <thead style="background-color:#73BF00;text-align:center;font-size:20px">
		  <th style="text-align:center;">公告</th>
		  <th>類別</th>
		  <th>公告日期</th>
		  
		  </thead>
		  <tbody style="font-size:16px">
		  <?php
			$sql="Select * from billboard where b_class='$class' and b_hot='是' ORDER BY b_posttime DESC";
			$result=mysqli_query($conn,$sql);
			$data_nums = mysqli_num_rows($result);
			$per = 10;
			$pages = ceil($data_nums/$per);
			if (!isset($_GET["page"])){ 
				$page=1;
			} else {  
				$page = intval($_GET["page"]);
			}
			$start = ($page-1)*$per;
			$result = mysqli_query($conn, $sql.' LIMIT '.$start.', '.$per) or die("Error"); 
				while($row=mysqli_fetch_array($result)){
					?>
					<tr>
					<td><a href="index_detail.php?id=<?php echo $row[0];?>"><?php echo $row[1];?></a></td>
					<td><?php echo $row[2];?></td>
					<td><?php echo $row[7];?></td>
					</tr>
					<?php
				}
				?>
			<?php
			$sql="Select * from billboard where b_class='$class' and b_hot='否' ORDER BY b_posttime DESC";
			$result=mysqli_query($conn,$sql);
			$data_nums = mysqli_num_rows($result);
			$per = 10;
			$pages = ceil($data_nums/$per);
			if (!isset($_GET["page"])){ 
				$page=1;
			} else {  
				$page = intval($_GET["page"]);
			}
			$start = ($page-1)*$per;
			$result = mysqli_query($conn, $sql.' LIMIT '.$start.', '.$per) or die("Error"); 
				while($row=mysqli_fetch_array($result)){
					?>
					<tr>
					<td><a href="index_detail.php?id=<?php echo $row[0];?>"><?php echo $row[1];?></a></td>
					<td><?php echo $row[2];?></td>
					<td><?php echo $row[7];?></td>
					</tr>
					<?php
				}
				?>
				</tbody>
		  </table>
          <center>
					<nav>
						<ul class="pagination">
							<li>
								<a href="?class=<?=$class?>&page=1" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
								</a>
							</li>
							<?php  
							for( $i=1 ; $i<=$pages ; $i++ ) {  
								if ( $page-3 < $i && $i < $page+3 ) {  
									echo "<li><a href=?class=".$class."&page=".$i.">".$i."</a></li>";  
								}  
							}   
							?>
							<!-- <li><a href="#">4</a></li>
							<li><a href="#">5</a></li> -->
							<li>
								<a href="?class=<?=$class?>&page=<?=$pages?>" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
								</a>
							</li>
						</ul>
					</nav>
				</center>
				<?php
			}else{
		  
			?>
			<table style="width:100%;border:1px solid black;margin-top:20%;margin-left:-2%">
		  <thead style="background-color:#73BF00;text-align:center;font-size:20px">
		  <th style="text-align:center">公告</th>
		  <th>類別</th>
		  <th>公告日期</th>
		  
		  </thead>
		  <tbody style="font-size:16px">
			<?php
			$sql="Select * from billboard where b_hot='是' ORDER BY b_posttime DESC";
			$result=mysqli_query($conn,$sql);
			$data_nums = mysqli_num_rows($result);
			$per = 10;
			$pages = ceil($data_nums/$per);
			if (!isset($_GET["page"])){ 
				$page=1;
			} else {  
				$page = intval($_GET["page"]);
			}
			$start = ($page-1)*$per;
			$result = mysqli_query($conn, $sql.' LIMIT '.$start.', '.$per) or die("Error");  
				while($row=mysqli_fetch_array($result)){
					?>
					<tr style="border:1px solid black">
					<td><a href="index_detail.php?id=<?php echo $row[0];?>"><?php echo $row[1];?></a></td>
					<td><?php echo $row[2];?></td>
					<td><?php echo $row[7];?></td>
					</tr>
					<?php
				}
			
			$sql="Select * from billboard where b_hot='否' ORDER BY b_posttime DESC";
			$result=mysqli_query($conn,$sql);
			$data_nums = mysqli_num_rows($result);
			$per = 10;
			$pages = ceil($data_nums/$per);
			if (!isset($_GET["page"])){ 
				$page=1;
			} else {  
				$page = intval($_GET["page"]);
			}
			$start = ($page-1)*$per;
			$result = mysqli_query($conn, $sql.' LIMIT '.$start.', '.$per) or die("Error");  
				while($row=mysqli_fetch_array($result)){
					?>
					<tr style="border:1px solid black">
					<td><a href="index_detail.php?id=<?php echo $row[0];?>"><?php echo $row[1];?></a></td>
					<td><?php echo $row[2];?></td>
					<td><?php echo $row[7];?></td>
					</tr>
					<?php
				}?>
				</tbody>
		  </table>
          <center>
					<nav>
						<ul class="pagination">
							<li>
								<a href="?page=1" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
								</a>
							</li>
							<?php  
							for( $i=1 ; $i<=$pages ; $i++ ) {  
								if ( $page-3 < $i && $i < $page+3 ) {  
									echo "<li><a href=?page=".$i.">".$i."</a></li>";  
								}  
							}   
							?>
							<!-- <li><a href="#">4</a></li>
							<li><a href="#">5</a></li> -->
							<li>
								<a href="?page=<?=$pages?>" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
								</a>
							</li>
						</ul>
					</nav>
				</center>
				<?php
				}
				
		  ?>
		  
        </div>
       <!-- <div class="article" style="margin-left:5%;margin-top:-10%">
          <p style="font-size:20px"><strong>學生影片</strong></p><div class="clr"></div><p/>
		
			<div style="width:100%;collapse:collapse">
			<?php/* $sql="Select * from results";
			$result=mysqli_query($conn,$sql);
			$data_nums = mysqli_num_rows($result);
			$per = 6;
			$pages = ceil($data_nums/$per);
			if (!isset($_GET["page"])){ 
				$page=1;
			} else {  
				$page = intval($_GET["page"]);
			}
			$start = ($page-1)*$per;
			$result = mysqli_query($conn, $sql.' LIMIT '.$start.', '.$per) or die("Error");  

			while($row=mysqli_fetch_assoc($result)){*/?>
				<div style="width:32%;display:inline-block;border:1px solid black;text-align:center;margin-top:1%">
				<a href="<?php// echo $row['r_videourl'];?>" target="_blank"><img src="<?php// echo $row['r_image'];?>"  style="width:180px;height:210px;margin-left:5%"></a><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
				
				<p style="font-size:20px;text-align:center;background-color:#DDDDFF;margin-bottom:0px"><?php// echo $row['r_title'];?></p>
				</div>
			<?php// }?>
				<a href="RV.php"><p  style="margin-left:88%;font-size:16px;color:#666">More...<p></a>
			</div>
		 
        </div>-->
      </div>
      <div class="sidebar">
     
      <!--  <div class="gadget">
        <p style="font-size:20px"><strong>重要訊息</strong></p><div class="clr"></div><p/>
		  <div class="myscroll" style="width:250px">
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
        </div>-->
        <div class="gadget">
         <p style="font-size:20px"><strong>熱門連結</strong></p><div class="clr"></div><p/>
		 <div class="clr"></div>
          <ul class="ex_menu">
		  <?php $sql="Select * from relation";
		  $result=mysqli_query($conn,$sql);
		  while($row=mysqli_fetch_assoc($result)){?>
            <li><a href="<?php echo $row['rel_link'];?>"><img src="<?php echo $row['rel_image'];?>" style="width:300px"></a></li>
          <?php }?>
		  </ul>
        </div>
        
             </div>
      <div class="clr"></div>
    </div>
  </div>
  <?php include_once("footer.php");?>
</div>
</div>

</body>
</html>


