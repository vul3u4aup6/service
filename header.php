<style>
.sub-menu li:hover ul {display: block;}

.sub-menu li ul{
	z-index:1;
	margin-top:1.5%;
  position: absolute;
  width: 150px;
  display: none;
}
.sub-menu li ul li{ 
width:100px;
  display: block; 
}
.sub-menu li ul li a{display:block !important;padding:5px} 
.sub-menu li ul li:hover {}
.search { float:right; margin:0; padding:10px 0 0 0; width:300px;}

</style>
<div class="header">
    <div class="header_resize">
	
     
      
 <div class="search">
        <form id="form" name="form" method="post" action="">
          <span>
          <input name="q" type="text" class="keywords" id="textfield" maxlength="50" value="Search..." />
          
          <input name="b" type="image" src="images/search.gif" class="button" />
          </span>
        </form>
      </div>
      <!--/search -->
      <?php   include_once("database.php");?>
      <div class="slider" >
				<div class="rslides_container" style="margin-top:17%">
					<ul class="rslides" id="slider" >
						<!--<li><img src="images/1.jpg"/></li>-->
						<?php $sql="Select * from "?>
						<li><img src="./images/main_img.jpg"/></li>
						<li><img src="./images/main_img.jpg"/></li>
						<!-- <li><img src="images/slider4.jpg"/></li> -->
					</ul>
				</div>
			</div>
      <div class="menu_nav"  style="width:1000px;margin-top:1%">
	
       <ul class="sub-menu">
        <li class="active" ><a href="index.php"><span style="width:100px">首頁</span></a></li>
          <li ><a href="support.html"><span style="width:100px">志工靜宜</span></a>
		  <ul >
		  <li ><a href="VPUS.php"style="float:none;">緣起</a></li>
		  <li ><a href="VPS.php" style="float:none;">特色</a></li>
		  <li ><a href="VPG.php" style="float:none;">願景</a></li>
		  <li ><a style="float:none;">校園出版</a></li>
		  <li ><a style="float:none;">相關辦法</a></li>
		  
		  </ul></li>
		  <li><a href="FSLS.php"><span style="width:100px">大一服學</span></a>
		  <ul>
		  <li ><a href="FSLS.php" style="float:none;">緣起</a></li>
		  <li ><a href="FSR.php" style="float:none;">施行細則</a></li>
		  <li ><a href="FSS.php" style="float:none;">特色</a></li>
		  <li ><a style="float:none;">師資陣容</a></li>
		  <li ><a style="float:none;">課程</a></li>
		  
		  </ul>
		  </li>
          <li><a href="about.html"><span style="width:100px">專業服學</span></a>
		  <ul>
		  <li ><a href="PSLS.php">課程簡介</a></li>
		  <li ><a href="PSR.php">實施辦法</a></li>
		  <li ><a href="PSF.php">申請作業</a></li>
		  <li ><a href="PSLST.php">運作流程</a></li>
		  <li ><a>課程申請</a></li>
		  
		  </ul>
		  </li>
          <li><a href="IVS.php"><span style="width:100px">國際志工</span></a>
		  <ul>
		  <li ><a href="IVS.php">志工緣起</a></li>
		  <li ><a href="IVA.php">推展架構</a></li>
		  <li ><a href="IVT.php">招募培訓</a></li>
		  
		  
		  </ul></li>
          <li><a href="contact.html"><span style="width:100px">大一課程助理</span></a>
		  <ul>
		  <li ><a href="FreshmanCAIntroduction.php">課程助理簡介</a></li>
		  <li ><a href="FCR.php">課程助理辦法</a></li>
		  <li ><a href="FCT.php">課程助理培訓</a></li>
		  <li ><a>課程助理表格</a></li>
		  
		  </ul>
		  </li>
		  <li><a href="contact.html"><span style="width:100px">合作機構</span></a>
		  <ul>
		  <li ><a>機構簡介</a></li>
		  <li ><a>機構座談</a></li>
		  <li ><a>機構專區</a></li>
		  
		  
		  </ul></li>
		  <li><a href="contact.html"><span style="width:100px">聯絡我們</span></a>
		  <ul>
		  <li ><a style="float:none;">組織</a></li>
		  <li ><a style="float:none;">成員</a></li>
		  <li ><a style="float:none;">工作業務</a></li>
		  <li ><a style="float:none;">中心位置</a></li>
		  
		  </ul>
		  </li>
		  <li><a href="contact.html"><span style="width:100px">服務成果</span></a>
		  <ul>
		  <li ><a style="float:none;">大一服務成果</a></li>
		  <li ><a style="float:none;">專業服務成果</a></li>
		  <li ><a style="float:none;">國際志工成果</a></li>
		  <li ><a style="float:none;">成果影片</a></li>
		  <li ><a style="float:none;">相關辦法</a></li>
		  
		  </ul></li>
		  <li><a href="contact.html"><span style="width:100px">海線社區計畫</span></a></li>
      </ul>        
        
      </div>
      
    </div>
  </div>