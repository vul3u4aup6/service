<div class="col-sm-3 col-md-2">
	<ul class="nav nav-pills nav-stacked" id="mngSideNav">
	
		<li><a href="newsList.php">公佈欄管理</a></li>
		<li><a href="classList.php">輪播圖管理</a></li>
		<li><a href="letterList.php">電子報管理</a></li>
		<li><a href="runtext.php">跑馬燈</a></li>
		<li><a href="relation.php">熱門連結</a></li>
		
	
		<li><a >志工靜宜</a>
			<ul>
				<li><a href="scpublish.php">校園出版</a></li>
				<li><a href="scmethod.php">相關辦法</a></li>
			</ul>
		</li>
		<li><a >大一服學</a>
			<ul>
				<li><a href="service_apply.php">服學辦法</a></li>
			
				<li><a href="teacher.php">師資陣容(歷年)</a></li>
				<li><a href="teacher_detail.php">師資陣容(細項)</a></li>
				<li><a href="service_cooperation.php">機構列表</a></li>
				<li><a href="calendar.php">行事曆</a></li>
				
				<li><a href="lecture.php">講座場次</a></li>
				<li><a href="publishtable.php">課程相關表格</a></li>
				<li><a href="supplemethod.php">課程補充資料</a></li>
			</ul>
		</li>
		<li><a >專業服學</a>
			<ul>
				<li><a href="applytable.php">課程申請表格</a></li>
				<li><a href="evaluation.php">課程評估表格</a></li>
				
			</ul>
		</li>
		
		<li><a >大一課程助理</a>
			<ul>
				<li><a href="classassistant.php">課程助理表格</a></li>
			</ul>
		</li>
		<li><a >合作機構</a>
			<ul>
				<li><a href="cooperation.php">機構簡介</a></li>
				<li><a href="discussion.php">機構座談</a></li>
				
			</ul>
		</li>
		<li><a >聯絡我們</a>
			<ul>
				<li>
					<a href="memberList.php">成員管理</a>
				</li>
			</ul>
		<li><a >服務成果</a>
			<ul>
				<li>
					<a href="service_result.php">大一服務成果</a>
				</li>
				<li>
					<a href="proresult.php">專業服務成果</a>
				</li>
				<li>
					<a href="interresult.php">國際志工成果</a>
				</li>
				<li>
					<a href="result.php">成果影片</a>
				</li>
		</ul>
		
		</li>
		
		
		
		
		
	</ul>
</div>
<script type="text/javascript">
choiceSite();
function choiceSite(){
	var site = location.pathname;
	site = site.split('/')[2];
	var siteString = 'a[href="'+site+'"]';
	$(siteString).parent().addClass('active');
}
</script>