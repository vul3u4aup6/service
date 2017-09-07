
<style>
body { margin:0; padding:0; width:100%; color:#878989; font:normal 12px/1.8em Arial, Helvetica, sans-serif;}
html, .main {width:100%; padding:0; margin:0; background:#f1f1f1 url(images/main_bg.gif) top repeat-x;}
.clr { clear:both; padding:0; margin:0; width:100%; font-size:0px; line-height:0px;}

h1 { margin:0; padding:5px 0; width:340px; color:#6e6d6d; font:normal 36px/1.2em Arial, Helvetica, sans-serif; letter-spacing:-2px;}
h1 a { color:#6e6d6d; text-decoration:none;}
h1 a:hover { color:#7baf30; text-decoration:none;}
h1 a:hover span { color:#6e6d6d;}
h1 span { color:#7baf30;}
h1 small {  color:#6e6d6d; display:inline; padding:0 0 0 10px; font:normal 12px/1.2em Arial, Helvetica, sans-serif; letter-spacing:normal;}
h2 { font:normal 24px Arial, Helvetica, sans-serif; padding:0; margin:5px 0; color:#595959;}
p { margin:8px 0; padding:0 0 8px 0; font:normal 12px/1.8em Arial, Helvetica, sans-serif;}
p.spec { text-align:right;}
a { color:#7baf30; text-decoration:none;}
a:hover { text-decoration:underline;}
a.rm, a.com { margin-left:8px; padding:9px 12px; background:url(images/a_bg.gif) repeat-x top; text-decoration:none; color:#fff;}

.header, .content, .menu_nav, .fbg, .footer, form, ol, ol li, ul, .content .mainbar, .content .sidebar { margin:0; padding:0;}

/* header */
.header { }
.header_resize { margin:0 auto; padding:4px 0 0 0; width:970px;}
.header_img { width:970px;  padding:0;}
.header_img img  { float:left;}
.header_img h2 { width:500px; float:right; text-align:left; font: normal 26px Arial, Helvetica, sans-serif; color:#fff; padding:30px 0 0 0; margin:0; text-transform:uppercase;}
.header_img p {width:500px; float:right; text-align:left; font: normal 12px Arial, Helvetica, sans-serif; color:#fff; line-height:1.8em; padding:10px 0 0 0;}
/* menu */
.menu_nav { margin:5px 0 0 0; padding:3px 0 0 10px; float:right; width:500px;}
.menu_nav ul {  padding:0; margin:0; }
.menu_nav li { float:left; padding:0 5px; }
.menu_nav li a { background:url(images/r_menu.gif) no-repeat right; font:normal 13px Arial, Helvetica, sans-serif; color:#878989; display:block; float:right; }
.menu_nav li a span {background:url(images/l_menu.gif) no-repeat left; padding:10px 15px; }
.menu_nav li a:hover { text-decoration:none; color:#7baf30; background:url(images/r_menu.gif) no-repeat right; }
.menu_nav li a:hover span { text-decoration:none; color:#7baf30; background:url(images/l_menu.gif) no-repeat left; }
.menu_nav li.active a { text-decoration:none; color:#7baf30; background:url(images/r_menu.gif) no-repeat right; }
.menu_nav li.active a span {text-decoration:none; color:#7baf30; background:url(images/l_menu.gif) no-repeat left; }

/* search */
.search form { padding:0; margin:0; }
.search span { display:block; float:left; background:#fff; border:1px solid #dcdcdd;  padding:0 10px; height:29px; margin:0;}
.search form .keywords { width:220px; line-height:13px; height:13px; float:left; background:none; border:0; padding:8px 0px; margin:0; font:normal 11px Arial, Helvetica, sans-serif; color:#767676; }
.search form .button { float:left; margin:0; padding:4px 0 0 0; border:0; position:relative; }
/* content */
.content { padding:10px 0 0 0;}
.content_resize { margin:0 auto; padding:20px 0 0 0; width:970px;}
.content .mainbar { margin:0; float:right;}
.content .mainbar img { float:left; padding:4px; margin:0 10px 0 0; border:1px solid #eaecec; background-color:#fff;}
.content .mainbar .article { margin:0 0 20px 0;  padding:30px 20px;  width:660px;}
.content .mainbar .article span.butons a { margin:0 5px 0 0; float:right; color:#9a9a9a; padding:1px 10px; text-decoration:none;  border:1px solid #ebe8e8; background:#fbfbfc;}
.content .mainbar .article span.butons a:hover { border:1px solid #d9f0ff; background:#7baf30; color:#fff; text-decoration:none;}
.content .mainbar .article span.butons a.active {  border:1px solid #ebe8e8;  background:#7baf30; color:#fff; text-decoration:none;}
.content .sidebar { margin:0; padding:0; float:left; }
.content .sidebar .gadget { margin:0 0 20px 0; padding:30px 20px; width:230px;}
ul.sb_menu, ul.ex_menu { margin:0; padding:0; list-style:none; color:#959595;}
ul.sb_menu li, ul.ex_menu li { margin:0;}
ul.sb_menu li { padding:4px 0 4px 12px; width:220px;}
ul.ex_menu li { padding:4px 0 8px 12px;}
ul.sb_menu li a, ul.ex_menu li a { color:#959595; text-decoration:none; margin-left:-12px; padding-left:22px;  background:url(images/li_a_hover.gif) left no-repeat;}
ul.sb_menu li a:hover, ul.ex_menu li a:hover { color:#7baf30; text-decoration:underline; background:url(images/li_a.gif) left no-repeat;}
ul.sb_menu li a:hover { text-decoration:underline;}
ul.ex_menu li a:hover { text-decoration:none;}

/* subpages */
.content .mainbar .comment { margin:0; padding:16px 0 0 0;}
.content .mainbar .comment img.userpic { border:1px solid #dedede; margin:10px 16px 0 0; padding:0; float:left;}

/* fbg */
.fbg { padding:10px 0 0 0;background: #3d3d3d url(images/fbg_bg.gif) top repeat-x; margin:10px 0 0 0;}
.fbg_resize { margin:0 auto; padding:20px 20px; width:930px;}
.fbg  h2 { color:#fff;}
.fbg  p { color:#fff;}
.fbg  a { color:#b2fd45; text-decoration:none;}
.fbg  img { padding:4px; border:1px solid #cfd2d4; background-color:#fff;}
.fbg .col { margin:0; float:left;}
.fbg .c1 { padding:0 16px 0 0; width:266px;}
.fbg .c2 { padding:0 16px; width:300px;}
.fbg .c3 { padding:0 0 0 16px; width:260px;}
.fbg .c1 img { margin:8px;}
.fbg .c3 img { margin:8px 16px 4px 0; float:left;}

/* footer */
.footer { width:970px; margin:0 auto; padding:40px 0 20px 0;}
.footer p.lf { margin:0; padding:4px 0; float:right; width:auto; text-align:right; line-height:1.5em; color:#b1b1b1;}
.footer p.lf a { color:#b2fd45;}
.footer p.lr { margin:0; padding:4px 0; float:left; width:auto; line-height:1.5em; color:#b1b1b1;}
.footer p.lr a { color:#b2fd45;}


/* form */
ol { list-style:none;}
ol li { display:block; clear:both;}
ol li label { display:block; margin:0; padding:16px 0 0 0;}
ol li input.text { width:480px; border:1px solid #c0c0c0; margin:2px 0; padding:5px 2px; height:16px; background:#fff;}
ol li textarea { width:480px; border:1px solid #c0c0c0; margin:2px 0; padding:2px; background:#fff;}
ol li .send { margin:16px 0 0 0;}
</style>