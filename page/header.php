<link href="css/service_style.css" rel="stylesheet" type="text/css" />

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
body{
	background: #DFFFDF url("./images/pattern.png");
	width:100%;
	

}

.content .mainbar .article { margin-left:1%;  padding:30px 20px;  width:720px;}

input, textarea, select {margin:0; padding:4px;background-color:	#D2E9FF}
@media only screen and (max-width: 700px) {
	/* -------------------------------------------- */
	/* ------------------Header-------------------- */
	header{height: 170px;}
	header #logo{top:20px;}
	header #search{top:130px; left: 5px;}

	.menu_nav{display:none;}
	.minimenu{display:block; margin: 5px 0;}
	
	nav .wrap-nav{background: none; border: none;}
	
	#main-content .comment input, #main-content .comment textarea{width:90%;}
	/* -------------------------------------------- */
	/* ------------------Content------------------- */
	.block01 {padding: 30px 0 30px 0}
	/* -------------------------------------------- */
	/* ------------------Footer-------------------- */
	footer {
		padding: 10px;
	}
	/* -------------------------------------------- */
	/* ------------------Other----------------*---- */
}
.content_resize { margin:0 auto; padding:20px 0 0 0; width:970px;}
.menu_nav li a { background:url(images/r_menu.gif) no-repeat right; font:normal 13px Arial, Helvetica, sans-serif; color:#000000; display:block; float:right; }
.main{background: url(images/main_bg1.png) top repeat-x;}
ul.sb_menu li a{
	color:#000000;
	font-size:16px
}
.content .sidebar .gadget { margin-left:10%; padding:30px 20px; width:230px;}

</style>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
$( document ).ready(function() {
	detectBrowser();
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
	function detectBrowser(){
    var isIE = navigator.userAgent.search("MSIE") > -1;
    var isIE7 = navigator.userAgent.search("MSIE 7") > -1;
    var isFirefox = navigator.userAgent.search("Firefox") > -1;
    var isOpera = navigator.userAgent.search("Opera") > -1;
    var isSafari = navigator.userAgent.search("Safari") > -1;//Google瀏覽器核心
    var browser='';
    if (isIE7) {
         browser += '<div class=menu_nav  style=width:115%;margin-top:1.5%;float:left>';
		browser += '<ul class=sub-menu style=margin-left:-3%>';
		browser += '<li class=active ><a href=index.php style=font-size:18px><span >首頁</span></a></li>';
		browser += '<li ><a href=VPUS.php style=font-size:18px><span >志工靜宜</span></a>';
		browser += '<ul style=margin-top:1%>';
		browser += '<li ><a href=VPUS.php style=float:none;>緣起</a></li>';
		browser += '<li ><a href=VPS.php style=float:none;>特色</a></li>';
		browser += '<li ><a href=VPG.php style=float:none;>願景</a></li>';
		browser += '<li ><a href=VPSB.php style=float:none;>校園出版</a></li>';
		browser += '<li ><a href=VPM.php style=float:none;>相關辦法</a></li>';
		browser += '</ul>';
		browser += '</li>';
		browser += ' <li ><a href=FSLS.php style=font-size:18px><span >大一服學</span></a>';
		browser += ' <ul style=margin-top:1%>';
		browser += ' <li ><a href=FSLS.php style=float:none;>緣起</a></li>';
		browser += ' <li ><a href=FSR.php style=float:none;>服學辦法</a></li>';
		
		browser += '<li ><a href=FSS.php style=float:none;>特色</a></li>';
		browser += '<li ><a href=FSTC.php style=float:none;>師資陣容</a></li>';
		browser += '<li ><a href=FCCI.php style=float:none;>課程</a></li>';
		browser += '<li ><a href=FCCR.php style=float:none;>基礎訓練講座</a></li>';
		browser += '<li ><a href=FST.php style=float:none;>課程相關表格</a></li>';
		browser += '<li ><a href=FSIM.php style=float:none;>課程補充資料</a></li>';
		browser += '</ul></li>';
		browser += ' <li ><a href=PSLS.php style=font-size:18px><span >專業服學</span></a>';
		browser += ' <ul style=margin-top:1%;margin-left:-1.5%>';
		browser += '<li ><a href=PSLS.php>課程簡介</a></li>';
		browser += '<li ><a href=PSR.php>實施辦法</a></li>';
		browser += '<li ><a href=PSF.php>申請作業</a></li>';
		browser += '<li ><a href=PSLST.php>運作流程</a></li>';
		browser += ' <li ><a href=PST.php>檔案下載</a></li>';
		browser += '</ul></li>';
		browser += ' <li ><a href=IVS.php style=font-size:18px><span >國際志工</span></a>';
		browser += '<ul style=margin-top:1%;margin-left:-1.5%>';
		browser += ' <li ><a href=IVS.php>志工緣起</a></li>';
		browser += '<li ><a href=IVA.php>推展架構</a></li>';
		browser += ' <li ><a href=IVT.php>招募培訓</a></li>';
		browser += '</ul></li>';
		browser += '<li ><a href=FreshmanCAIntroduction.php style=font-size:18px><span >大一課程助理</span></a>';
		browser += '<ul style=margin-top:1%;>';
		browser += '<li ><a href=FreshmanCAIntroduction.php>課程助理簡介</a></li>';
		browser += '<li ><a href=FCR.php>課程助理辦法</a></li>';
		browser += '<li ><a href=FCT.php>課程助理培訓</a></li>';
		browser += '<li ><a href=FCTA.php>課程助理表格</a></li>';
		browser += '</ul></li>';
		browser += ' <li ><a href=CLI.php style=font-size:18px><span >合作機構</span></a>';
		browser += '<ul style=margin-top:1%;margin-left:-1.5%>';
		browser += '<li ><a href=CLI.php>機構簡介</a></li>';
		browser += '<li ><a href=CLD.php>機構座談</a></li>';
		browser += '<li ><a href=http://www.service-learning.pu.edu.tw:8080/Volunteer/login.jsp>機構專區</a></li>';
		browser += '</ul></li>';
		browser += '<li ><a href=COC.php style=font-size:18px><span >聯絡我們</span></a>';
		browser += ' <ul style=margin-top:1%;>';
		browser += '<li ><a href=COC.php style=float:none;>組織</a></li>';
		browser += '<li ><a href=COM.php style=float:none;>成員</a></li>';
		browser += '<li ><a href=COW.php style=float:none;>工作業務</a></li>';
		browser += '<li ><a href=COP.php style=float:none;>中心位置</a></li>';
		browser += '</ul></li>';
		browser += '<li ><a href=RI.php style=font-size:18px><span >服務成果</span></a>';
		browser += '<ul style=margin-top:1%;>';
		browser += '<li ><a href=RS.php style=float:none;>大一服務成果</a></li>';
		browser += '<li ><a href=proresult.php style=float:none;>專業服務成果</a></li>';
		browser += '<li ><a href=RI.php style=float:none;>國際志工成果</a></li>';
		browser += '<li ><a href=RV.php style=float:none;>成果影片</a></li>';
		browser += '</ul></li>';
		browser += '</ul>';
		browser += '</div>';
		browser += ' <div class=minimenu>';
		browser += '<div style=width:50%;>MENU</div>';
		browser += '<select onchange=location=this.value>';
		browser += '<option></option>';
		browser += '<option value=index.php>首頁</option>';
		browser += '<option value=VPUS.php>志工靜宜</option>';
		browser += '<option value=FSLS.php>大一服學</option><option value=PSLS.php>專業服學</option><option value=IVS.php>國際志工</option><option value=FreshmanCAIntroduction.php>大一課程助理</option><option value=CLI.php>合作機構</option><option value=COC.php>聯絡我們</option><option value=RI.php>服務成果</option><option value=http://120.110.112.86/test/page/index.php>海線社區計畫</option><option value=../backstage/index.php>後台登入</option>';
		browser += '</select>';
		browser += '</div>	';
		
		document.getElementById("menu").innerHTML=browser;
    }else    if (isIE) {
         browser += '<div class=menu_nav  style=width:115%;margin-top:1.5%;float:left>';
		browser += '<ul class=sub-menu style=margin-left:-3%>';
		browser += '<li class=active ><a href=index.php style=font-size:18px><span >首頁</span></a></li>';
		browser += '<li ><a href=VPUS.php style=font-size:18px><span >志工靜宜</span></a>';
		browser += '<ul style=margin-top:1%>';
		browser += '<li ><a href=VPUS.php style=float:none;>緣起</a></li>';
		browser += '<li ><a href=VPS.php style=float:none;>特色</a></li>';
		browser += '<li ><a href=VPG.php style=float:none;>願景</a></li>';
		browser += '<li ><a href=VPSB.php style=float:none;>校園出版</a></li>';
		browser += '<li ><a href=VPM.php style=float:none;>相關辦法</a></li>';
		browser += '</ul>';
		browser += '</li>';
		browser += ' <li ><a href=FSLS.php style=font-size:18px><span >大一服學</span></a>';
		browser += ' <ul style=margin-top:1%>';
		browser += ' <li ><a href=FSLS.php style=float:none;>緣起</a></li>';
		browser += ' <li ><a href=FSR.php style=float:none;>服學辦法</a></li>';
		
		browser += '<li ><a href=FSS.php style=float:none;>特色</a></li>';
		browser += '<li ><a href=FSTC.php style=float:none;>師資陣容</a></li>';
		browser += '<li ><a href=FCCI.php style=float:none;>課程</a></li>';
		browser += '<li ><a href=FCCR.php style=float:none;>基礎訓練講座</a></li>';
		browser += '<li ><a href=FST.php style=float:none;>課程相關表格</a></li>';
		browser += '<li ><a href=FSIM.php style=float:none;>課程補充資料</a></li>';
		browser += '</ul></li>';
		browser += ' <li ><a href=PSLS.php style=font-size:18px><span >專業服學</span></a>';
		browser += ' <ul style=margin-top:1%;margin-left:-1.5%>';
		browser += '<li ><a href=PSLS.php>課程簡介</a></li>';
		browser += '<li ><a href=PSR.php>實施辦法</a></li>';
		browser += '<li ><a href=PSF.php>申請作業</a></li>';
		browser += '<li ><a href=PSLST.php>運作流程</a></li>';
		browser += ' <li ><a href=PST.php>檔案下載</a></li>';
		browser += '</ul></li>';
		browser += ' <li ><a href=IVS.php style=font-size:18px><span >國際志工</span></a>';
		browser += '<ul style=margin-top:1%;margin-left:-1.5%>';
		browser += ' <li ><a href=IVS.php>志工緣起</a></li>';
		browser += '<li ><a href=IVA.php>推展架構</a></li>';
		browser += ' <li ><a href=IVT.php>招募培訓</a></li>';
		browser += '</ul></li>';
		browser += '<li ><a href=FreshmanCAIntroduction.php style=font-size:18px><span >大一課程助理</span></a>';
		browser += '<ul style=margin-top:1%;>';
		browser += '<li ><a href=FreshmanCAIntroduction.php>課程助理簡介</a></li>';
		browser += '<li ><a href=FCR.php>課程助理辦法</a></li>';
		browser += '<li ><a href=FCT.php>課程助理培訓</a></li>';
		browser += '<li ><a href=FCTA.php>課程助理表格</a></li>';
		browser += '</ul></li>';
		browser += ' <li ><a href=CLI.php style=font-size:18px><span >合作機構</span></a>';
		browser += '<ul style=margin-top:1%;margin-left:-1.5%>';
		browser += '<li ><a href=CLI.php>機構簡介</a></li>';
		browser += '<li ><a href=CLD.php>機構座談</a></li>';
		browser += '<li ><a href=http://www.service-learning.pu.edu.tw:8080/Volunteer/login.jsp>機構專區</a></li>';
		browser += '</ul></li>';
		browser += '<li ><a href=COC.php style=font-size:18px><span >聯絡我們</span></a>';
		browser += ' <ul style=margin-top:1%;>';
		browser += '<li ><a href=COC.php style=float:none;>組織</a></li>';
		browser += '<li ><a href=COM.php style=float:none;>成員</a></li>';
		browser += '<li ><a href=COW.php style=float:none;>工作業務</a></li>';
		browser += '<li ><a href=COP.php style=float:none;>中心位置</a></li>';
		browser += '</ul></li>';
		browser += '<li ><a href=RI.php style=font-size:18px><span >服務成果</span></a>';
		browser += '<ul style=margin-top:1%;>';
		browser += '<li ><a href=RS.php style=float:none;>大一服務成果</a></li>';
		browser += '<li ><a href=proresult.php style=float:none;>專業服務成果</a></li>';
		browser += '<li ><a href=RI.php style=float:none;>國際志工成果</a></li>';
		browser += '<li ><a href=RV.php style=float:none;>成果影片</a></li>';
		browser += '</ul></li>';
		browser += '</ul>';
		browser += '</div>';
		browser += ' <div class=minimenu>';
		browser += '<div style=width:50%;>MENU</div>';
		browser += '<select onchange=location=this.value>';
		browser += '<option></option>';
		browser += '<option value=index.php>首頁</option>';
		browser += '<option value=VPUS.php>志工靜宜</option>';
		browser += '<option value=FSLS.php>大一服學</option><option value=PSLS.php>專業服學</option><option value=IVS.php>國際志工</option><option value=FreshmanCAIntroduction.php>大一課程助理</option><option value=CLI.php>合作機構</option><option value=COC.php>聯絡我們</option><option value=RI.php>服務成果</option><option value=http://120.110.112.86/test/page/index.php>海線社區計畫</option><option value=../backstage/index.php>後台登入</option>';
		browser += '</select>';
		browser += '</div>	';
		
		document.getElementById("menu").innerHTML=browser;
    }else    if (isFirefox) {
        browser = 'Firefox';
    }else    if (isOpera) {
        browser = 'Opera';
    }else    if (isSafari) {
		
        browser += '<div class=menu_nav  style=width:110%;margin-top:1.5%;float:left>';
		browser += '<ul class=sub-menu style=color:black>';
		browser += '<li class=active ><a href=index.php style=font-size:18px><span >首頁</span></a></li>';
		browser += '<li style=margin-left:6%><a href=VPUS.php style=font-size:18px><span >志工靜宜</span></a>';
		browser += '<ul style=margin-top:1%;>';
		browser += '<li ><a href=VPUS.php style=float:none;>緣起</a></li>';
		browser += '<li ><a href=VPS.php style=float:none;>特色</a></li>';
		browser += '<li ><a href=VPG.php style=float:none;>願景</a></li>';
		browser += '<li ><a href=VPSB.php style=float:none;>校園出版</a></li>';
		browser += '<li ><a href=VPM.php style=float:none;>相關辦法</a></li>';
		browser += '</ul>';
		browser += '</li>';
		browser += ' <li style=margin-left:16%><a href=FSLS.php style=font-size:18px><span >大一服學</span></a>';
		browser += ' <ul style=margin-top:1%>';
		browser += ' <li ><a href=FSLS.php style=float:none;>緣起</a></li>';
		browser += ' <li ><a href=FSR.php style=float:none;>服學辦法</a></li>';
		
		browser += '<li ><a href=FSS.php style=float:none;>特色</a></li>';
		browser += '<li ><a href=FSTC.php style=float:none;>師資陣容</a></li>';
		browser += '<li ><a href=FCCI.php style=float:none;>課程</a></li>';
		browser += '<li ><a href=FCCR.php style=float:none;>基礎訓練講座</a></li>';
		browser += '<li ><a href=FST.php style=float:none;>課程相關表格</a></li>';
		browser += '<li ><a href=FSIM.php style=float:none;>課程補充資料</a></li>';
		browser += '</ul></li>';
		browser += ' <li style=margin-left:26%><a href=PSLS.php style=font-size:18px><span >專業服學</span></a>';
		browser += ' <ul style=margin-top:1%;margin-left:-1.5%>';
		browser += '<li ><a href=PSLS.php>課程簡介</a></li>';
		browser += '<li ><a href=PSR.php>實施辦法</a></li>';
		browser += '<li ><a href=PSF.php>申請作業</a></li>';
		browser += '<li ><a href=PSLST.php>運作流程</a></li>';
		browser += ' <li ><a href=PST.php>檔案下載</a></li>';
		browser += '</ul></li>';
		browser += ' <li style=margin-left:36%><a href=IVS.php style=font-size:18px><span >國際志工</span></a>';
		browser += '<ul style=margin-top:1%;margin-left:-1.5%>';
		browser += ' <li ><a href=IVS.php>志工緣起</a></li>';
		browser += '<li ><a href=IVA.php>推展架構</a></li>';
		browser += ' <li ><a href=IVT.php>招募培訓</a></li>';
		browser += '</ul></li>';
		browser += '<li style=margin-left:46%><a href=FreshmanCAIntroduction.php style=font-size:18px><span >大一課程助理</span></a>';
		browser += '<ul style=margin-top:1%;>';
		browser += '<li ><a href=FreshmanCAIntroduction.php>課程助理簡介</a></li>';
		browser += '<li ><a href=FCR.php>課程助理辦法</a></li>';
		browser += '<li ><a href=FCT.php>課程助理培訓</a></li>';
		browser += '<li ><a href=FCTA.php>課程助理表格</a></li>';
		browser += '</ul></li>';
		browser += ' <li style=margin-left:59%><a href=CLI.php style=font-size:18px><span style=color:black>合作機構</span></a>';
		browser += '<ul style=margin-top:1%;margin-left:-1.5%>';
		browser += '<li ><a href=CLI.php>機構簡介</a></li>';
		browser += '<li ><a href=CLD.php>機構座談</a></li>';
		browser += '<li ><a href=http://www.service-learning.pu.edu.tw:8080/Volunteer/login.jsp>機構專區</a></li>';
		browser += '</ul></li>';
		browser += '<li style=margin-left:69%><a href=COC.php style=font-size:18px><span >聯絡我們</span></a>';
		browser += ' <ul style=margin-top:1%;>';
		browser += '<li ><a href=COC.php style=float:none;>組織</a></li>';
		browser += '<li ><a href=COM.php style=float:none;>成員</a></li>';
		browser += '<li ><a href=COW.php style=float:none;>工作業務</a></li>';
		browser += '<li ><a href=COP.php style=float:none;>中心位置</a></li>';
		browser += '</ul></li>';
		browser += '<li style=margin-left:79%><a href=RI.php style=font-size:18px><span >服務成果</span></a>';
		browser += '<ul style=margin-top:1%;>';
		browser += '<li ><a href=RS.php style=float:none;>大一服務成果</a></li>';
		browser += '<li ><a href=proresult.php style=float:none;>專業服務成果</a></li>';
		browser += '<li ><a href=RI.php style=float:none;>國際志工成果</a></li>';
		browser += '<li ><a href=RV.php style=float:none;>成果影片</a></li>';
		browser += '</ul></li>';
		browser += '</ul>';
		browser += '</div>';
		browser += ' <div class=minimenu>';
		browser += '<div style=width:50%;>MENU</div>';
		browser += '<select onchange=location=this.value>';
		browser += '<option></option>';
		browser += '<option value=index.php>首頁</option>';
		browser += '<option value=VPUS.php>志工靜宜</option>';
		browser += '<option value=FSLS.php>大一服學</option><option value=PSLS.php>專業服學</option><option value=IVS.php>國際志工</option><option value=FreshmanCAIntroduction.php>大一課程助理</option><option value=CLI.php>合作機構</option><option value=COC.php>聯絡我們</option><option value=RI.php>服務成果</option><option value=http://120.110.112.86/test/page/index.php>海線社區計畫</option><option value=../backstage/index.php>後台登入</option>';
		browser += '</select>';
		browser += '</div>	';
		
		document.getElementById("menu").innerHTML=browser;
    }else{
		 browser += '<div class=menu_nav  style=width:115%;margin-top:1.5%;float:left>';
		browser += '<ul class=sub-menu style=margin-left:-3%>';
		browser += '<li class=active ><a href=index.php style=font-size:18px><span >首頁</span></a></li>';
		browser += '<li ><a href=VPUS.php style=font-size:18px><span >志工靜宜</span></a>';
		browser += '<ul style=margin-top:1%>';
		browser += '<li ><a href=VPUS.php style=float:none;>緣起</a></li>';
		browser += '<li ><a href=VPS.php style=float:none;>特色</a></li>';
		browser += '<li ><a href=VPG.php style=float:none;>願景</a></li>';
		browser += '<li ><a href=VPSB.php style=float:none;>校園出版</a></li>';
		browser += '<li ><a href=VPM.php style=float:none;>相關辦法</a></li>';
		browser += '</ul>';
		browser += '</li>';
		browser += ' <li ><a href=FSLS.php style=font-size:18px><span >大一服學</span></a>';
		browser += ' <ul style=margin-top:1%>';
		browser += ' <li ><a href=FSLS.php style=float:none;>緣起</a></li>';
		browser += ' <li ><a href=FSR.php style=float:none;>服學辦法</a></li>';
		
		browser += '<li ><a href=FSS.php style=float:none;>特色</a></li>';
		browser += '<li ><a href=FSTC.php style=float:none;>師資陣容</a></li>';
		browser += '<li ><a href=FCCI.php style=float:none;>課程</a></li>';
		browser += '<li ><a href=FCCR.php style=float:none;>基礎訓練講座</a></li>';
		browser += '<li ><a href=FST.php style=float:none;>課程相關表格</a></li>';
		browser += '<li ><a href=FSIM.php style=float:none;>課程補充資料</a></li>';
		browser += '</ul></li>';
		browser += ' <li ><a href=PSLS.php style=font-size:18px><span >專業服學</span></a>';
		browser += ' <ul style=margin-top:1%;margin-left:-1.5%>';
		browser += '<li ><a href=PSLS.php>課程簡介</a></li>';
		browser += '<li ><a href=PSR.php>實施辦法</a></li>';
		browser += '<li ><a href=PSF.php>申請作業</a></li>';
		browser += '<li ><a href=PSLST.php>運作流程</a></li>';
		browser += ' <li ><a href=PST.php>檔案下載</a></li>';
		browser += '</ul></li>';
		browser += ' <li ><a href=IVS.php style=font-size:18px><span >國際志工</span></a>';
		browser += '<ul style=margin-top:1%;margin-left:-1.5%>';
		browser += ' <li ><a href=IVS.php>志工緣起</a></li>';
		browser += '<li ><a href=IVA.php>推展架構</a></li>';
		browser += ' <li ><a href=IVT.php>招募培訓</a></li>';
		browser += '</ul></li>';
		browser += '<li ><a href=FreshmanCAIntroduction.php style=font-size:18px><span >大一課程助理</span></a>';
		browser += '<ul style=margin-top:1%;>';
		browser += '<li ><a href=FreshmanCAIntroduction.php>課程助理簡介</a></li>';
		browser += '<li ><a href=FCR.php>課程助理辦法</a></li>';
		browser += '<li ><a href=FCT.php>課程助理培訓</a></li>';
		browser += '<li ><a href=FCTA.php>課程助理表格</a></li>';
		browser += '</ul></li>';
		browser += ' <li ><a href=CLI.php style=font-size:18px><span >合作機構</span></a>';
		browser += '<ul style=margin-top:1%;margin-left:-1.5%>';
		browser += '<li ><a href=CLI.php>機構簡介</a></li>';
		browser += '<li ><a href=CLD.php>機構座談</a></li>';
		browser += '<li ><a href=http://www.service-learning.pu.edu.tw:8080/Volunteer/login.jsp>機構專區</a></li>';
		browser += '</ul></li>';
		browser += '<li ><a href=COC.php style=font-size:18px><span >聯絡我們</span></a>';
		browser += ' <ul style=margin-top:1%;>';
		browser += '<li ><a href=COC.php style=float:none;>組織</a></li>';
		browser += '<li ><a href=COM.php style=float:none;>成員</a></li>';
		browser += '<li ><a href=COW.php style=float:none;>工作業務</a></li>';
		browser += '<li ><a href=COP.php style=float:none;>中心位置</a></li>';
		browser += '</ul></li>';
		browser += '<li ><a href=RI.php style=font-size:18px><span >服務成果</span></a>';
		browser += '<ul style=margin-top:1%;>';
		browser += '<li ><a href=RS.php style=float:none;>大一服務成果</a></li>';
		browser += '<li ><a href=proresult.php style=float:none;>專業服務成果</a></li>';
		browser += '<li ><a href=RI.php style=float:none;>國際志工成果</a></li>';
		browser += '<li ><a href=RV.php style=float:none;>成果影片</a></li>';
		browser += '</ul></li>';
		browser += '</ul>';
		browser += '</div>';
		browser += ' <div class=minimenu>';
		browser += '<div style=width:50%;>MENU</div>';
		browser += '<select onchange=location=this.value>';
		browser += '<option></option>';
		browser += '<option value=index.php>首頁</option>';
		browser += '<option value=VPUS.php>志工靜宜</option>';
		browser += '<option value=FSLS.php>大一服學</option><option value=PSLS.php>專業服學</option><option value=IVS.php>國際志工</option><option value=FreshmanCAIntroduction.php>大一課程助理</option><option value=CLI.php>合作機構</option><option value=COC.php>聯絡我們</option><option value=RI.php>服務成果</option><option value=http://120.110.112.86/test/page/index.php>海線社區計畫</option><option value=../backstage/index.php>後台登入</option>';
		browser += '</select>';
		browser += '</div>	';
		
		document.getElementById("menu").innerHTML=browser;
	}
	
    return browser;
}


</script>

<div class="header" >
    <div class="header_resize">
	<?php   include_once("database.php");?>
     
      
 <div class="search">
        
          <span style="width:350px;margin-left:-20%" >
		  <?php $sql="Select * from runtext";
		  $result=mysqli_query($conn,$sql);
		  $row=mysqli_fetch_assoc($result);?>
          <marquee onMouseOver="this.stop()" onMouseOut="this.start()"><?php echo $row['rt_title'];?></marquee>
          </span>
        
		
      </div>
	  
	  <a href="index.php"><h1 style="border-left:0px;font-size:30px" >Volunteering Providence</h1></a>
      <!--/search -->
      
	  
      <div class="slider" >
				<div class="rslides_container" style="margin-top:7.5%">
					<ul class="rslides" id="slider" >
						<!--<li><img src="images/1.jpg"/></li>-->
						<?php $sql="Select * from image";
						$result=mysqli_query($conn,$sql);
						while($row=mysqli_fetch_assoc($result)){?>
						<li><img src="<?php echo $row['i_img'];?>" style="width:970px;height:232px"/></li>
						<?php }?>
						
						<!-- <li><img src="images/slider4.jpg"/></li> -->
					</ul>
				</div>
			</div>
			
	<div class="wrap-nav zerogrid" id="menu">
      	
    </div>
	</div>
  </div>
  <script type="text/javascript">
$(function() {
	var pgurl = window.location.pathname;
	console.log(pgurl);
	$(".sub-menu ul li").each(function(){
		if($(this).find('a').attr("href") == pgurl)
			$(this).addClass("current");
	})
});
</script>