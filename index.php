<?php
function funcGetPeriodYear(
	$target_date_str, 
	$now_date_str = 'now' 
){
	$target_date = new DateTime($target_date_str);
	$now_date = new DateTime($now_date_str);
	return $target_date->diff($now_date)->y;
}
define(
	"CONST_GITHUB_URL", 
	"https://github.com/KonishiMasayoshi/" 
);

define(
	"CONST_CONFIGS", 
	[
		"github" => [
			[
				"headline" => "Web", 
				"table_headline" => false, 
				"list" => [
					[
						"name" => "ポートフォリオ", 
						"description" => <<<TEXT
							こちらのポートフォリオでございます。<br>
							カルーセルは表示領域外では停止するようにするなどパフォーマンスを意識しながら作成いたしました。<br>
							CPU消費を最小に抑えメモリリークを起こさないようにしつつ、<br>
							アクセシビリティやセマンティックの面で正しいコーディングも意識しております。
TEXT
						, 
						"url" => CONST_GITHUB_URL. "portfolio" 
					] 
				] 
			], 
			[
				"headline" => "JavaScript", 
				"table_headline" => "クラス", 
				"list" => [
					[
						"name" => "ViewTrigger", 
						"description" => <<<TEXT
							HTMLの要素が表示領域に現れたタイミングにて任意の関数を実行できます。<br>
							こちらのクラスファイルを使用する事でカルーセル等の動作を制御しメモリーの消費を抑えることが出来ます。
TEXT
						, 
						"url" => CONST_GITHUB_URL. "view_trigger" 
					], 
					[
						"name" => "LocalStorage", 
						"description" => <<<TEXT
							ローカルストレージをオブジェクト形式で取り扱う事が出来ます。<br>
							オブジェクト毎の値の数に上限を設けたりCookieのように保持期限の設定もできます。<br>
							こちらのクラスファイルは閲覧履歴などの機能をフロントエンドで実装する際に使用します。
TEXT
						, 
						"url" => CONST_GITHUB_URL. "local_storage" 
					], 
					[
						"name" => "Timer", 
						"description" => <<<TEXT
							指定期間内にて任意の関数を実行できます。<br>
							セールバナーや要素の表示を切り替えたり出来ます。<br>
							期間指定以外にも曜日指定も出来るので柔軟な設定が可能となっております。
TEXT
						, 
						"url" => CONST_GITHUB_URL. "timer" 
					], 
					[
						"name" => "Calendar", 
						"description" => <<<TEXT
							カレンダーの表示用クラスファイルです。<br>
							カレンダーにはスケジュールの登録や指定日時にボタンを設置し任意の関数を実行できるようになっております。<br>
							予約管理システム等にも応用可能です。
TEXT
						, 
						"url" => CONST_GITHUB_URL. "calendar" 
					], 
					[
						"name" => "Bubble", 
						"description" => <<<TEXT
							シャボン玉表示用クラスファイルです。<br>
							ランダムにふわふわと浮かんでいるような動きをします。<br>
							CSSのアニメーションを変更すると他の動きも可能です。<br>
							常に動かしているので可能な限り軽量化を図っております。
TEXT
						, 
						"url" => CONST_GITHUB_URL. "bubble" 
					] 
				] 
			] 
		] 
	] 
);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ポートフォリオ</title>
<meta name="robots" content="noindex">
<meta name="description" content="ポートフォリオ">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no">
<meta name="author" content="小西理督">
<script>
	document.documentElement.classList.add('js-enabled');
</script>
<!-- base -->
<link rel="stylesheet" href="./css/default.css">
<!-- font -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preload" href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@100;300;400;500;700;800;900&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
<!-- class -->
<link rel="preload" href="./js/class/sticky/default.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<link rel="preload" href="./js/class/scroll_button/default.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<link rel="preload" href="./js/class/bubble/default.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<!-- library -->
<link rel="preload" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript>
	<!-- font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@100;300;400;500;700;800;900&display=swap">
	<!-- class -->
	<link rel="stylesheet" href="./js/class/sticky/default.css">
	<link rel="stylesheet" href="./js/class/scroll_button/default.css">
	<link rel="stylesheet" href="./js/class/bubble/default.css">
	<!-- library -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">
</noscript>
<!-- favicon -->
<link rel="icon" type="image/png" href="./img/favicon/icon.png">
<link rel="apple-touch-icon" href="./img/favicon/icon.png">
<style>
/****************************** all ******************************/
/*----------------------------- root -----------------------------*/
:root{
	/* カラー */
	--color-primary:#77f;
	--color-primary-light:rgba(119,119,255,0.3);
	--color-primary-extra-light:#eef;
	--color-text-black:#333;
	--color-text-gray:#666;
	--color-white:#fff;
	--color-red:#f00;
	
	/* フォント */
	--font-headline:"M PLUS Rounded 1c", sans-serif;
	
	/* ボーダー */
	--border-light:1px;
}
/*----------------------------- /root -----------------------------*/

/*----------------------------- common -----------------------------*/
.js-enabled .animate_effect{
	opacity:0;
	transition:opacity 1.0s;
	transition-delay:0.3s;
}

.headline{
	font-family:var(--font-headline);
}

h2.headline{
	position:relative;
}

h2.headline::before, 
h2.headline::after{
	content:"";
	aspect-ratio:1;
	background:var(--color-primary);
	display:block;
	position:absolute;
	border-radius:50%;
}

h2.headline::after{
	right:0;
}

h2.headline > div{
	color:var(--color-text-gray);
	font-weight:400;
	line-height:1.5;
	text-align:left;
}

h2.headline > div::after{
	content:"";
	background:var(--color-primary);
	display:block;
}

h3.headline{
	color:var(--color-text-gray);
	line-height:1.5;
	display:flex;
	justify-content:center;
	align-items:center;
}

h3.headline::before, 
h3.headline::after{
	content:"\25CF";
	vertical-align:middle;
}
/*----------------------------- /common -----------------------------*/

/*----------------------------- class -----------------------------*/
.bubble{
	z-index:-1;
}

.bubble_child{
	background:var(--color-primary-extra-light);
	box-shadow:unset;
}
/*----------------------------- /class -----------------------------*/

/*----------------------------- noscript -----------------------------*/
noscript p{
	color:var(--color-red);
	text-align:left;
}
/*----------------------------- /noscript -----------------------------*/

/*----------------------------- container -----------------------------*/
#container{
	margin-inline:auto;
}
/*----------------------------- /container -----------------------------*/

/*----------------------------- header -----------------------------*/
h1.headline{
	aspect-ratio:1;
	margin-inline:auto;
	border-radius:50%;
	background:var(--color-primary);
	display:flex;
	justify-content:center;
	align-items:center;
	flex-direction:column;
}

h1.headline > span{
	color:var(--color-white);
	line-height:1.2;
}

h1.headline span:first-child{
	font-weight:200;
}

h1.headline span:last-child{
	font-weight:300;
	display:flex;
	justify-content:center;
	align-items:center;
}

h1.headline span:last-child::before, 
h1.headline span:last-child::after{
	content:"\25CF";
}
/*----------------------------- /header -----------------------------*/

/*----------------------------- navi -----------------------------*/
#navi{
	width:100%;
}

#navi.sticky_active{
	background:rgba(255,255,255,0.85);
}

#navi > ul{
	margin-inline:auto;
	display:flex;
	justify-content:center;
	align-items:center;
	transition:width 0.5s;
}

#navi li{
	width:25%;
}

#navi a{
	width:100%;
	line-height:2.0;
	text-decoration:none;
	display:flex;
	justify-content:center;
	align-items:center;
}

#navi a::after{
	content:"";
	aspect-ratio:1;
	border-top:solid var(--color-text-black) var(--border-light);
	border-right:solid var(--color-text-black) var(--border-light);
	display:inline-block;
	transform:rotate(45deg);
}
/*----------------------------- /navi -----------------------------*/

/*----------------------------- profile -----------------------------*/
#profile_list0{
	width:100%;
}

#profile_list0 > li{
	line-height:1.5;
	text-align:left;
	background:url(./img/border-circle.svg) repeat-x left bottom;
	display:flex;
	justify-content:center;
	align-items:center;
}

#profile_list1{
	width:100%;
}

#profile_list1 > li::before{
	content:"\30FB";
}
/*----------------------------- /profile -----------------------------*/

/*----------------------------- history -----------------------------*/
#history_list{
	line-height:1.5;
	text-align:left;
	border:solid var(--color-primary) 2px;
	background:var(--color-primary-light);
}

#history_list > li{
	display:flex;
	justify-content:center;
	align-items:center;
}

#history_list > li > p::before{
	content:"\25A0";
	vertical-align:middle;
}
/*----------------------------- /history -----------------------------*/

/*----------------------------- product -----------------------------*/
#product_description_wrapper{
	line-height:1.5;
}

#product_description_wrapper > p{
	text-align:left;
}

#product_list{
	counter-reset:number 0;
}

#product_list h3.headline > span::after{
	content:counter(number);
	counter-increment:number 1;
}

.product_wrapper{
	display:flex;
	align-items:center;
}

.product_carousel img{
	width:100%;
}

.product_carousel figcaption{
	color:var(--color-text-black);
	line-height:1.5;
	font-weight:bold;
	text-align:left;
}

.product_carousel .splide__arrow{
	background:none;
}

.product_carousel .splide__pagination{
	position:static;
	bottom:unset;
	left:unset;
}

.product_carousel .splide__pagination__page{
	background:var(--color-primary-light);
}

.product_carousel .splide__pagination__page.is-active{
	background:var(--color-primary);
	transform:unset;
	z-index:unset;
}

.product_table{
	line-height:1.5;
	text-align:left;
}

.product_item_name{
	vertical-align:top;
}

.product_item_name > h4{
	color:var(--color-white);
	font-weight:bold;
	text-align:center;
	white-space:nowrap;
	background:var(--color-primary);
}

.product_comment > a{
	font-weight:bold;
}

.product_attention{
	color:var(--color-red);
}
/*----------------------------- /product -----------------------------*/

/*----------------------------- github -----------------------------*/
#github_description_wrapper{
	line-height:1.5;
	display:flex;
	justify-content:space-between;
}

#github_description_wrapper > p{
	text-align:left;
}

#github_description_wrapper > a{
	border-bottom:solid var(--color-text-gray) var(--border-light);
	text-decoration:none;
	display:inline-flex;
	justify-content:center;
	align-items:center;
}

#github_description_wrapper > a::after{
	content:"";
	aspect-ratio:1;
	border-top:solid var(--color-text-gray) var(--border-light);
	border-right:solid var(--color-text-gray) var(--border-light);
	transform:rotate(45deg);
	display:inline-block;
}

.github_table_headline{
	text-align:left;
	position:relative;
}

.github_table_headline::before{
	content:"";
	height:100%;
	background:var(--color-primary);
	display:block;
	position:absolute;
	top:0;
	left:0;
}

.github_table_headline > span{
	line-height:1.2;
	display:inline-block;
}

.github_table{
	width:100%;
	border-top:solid var(--color-primary) var(--border-light);
	border-left:solid var(--color-primary) var(--border-light);
	background:rgba(255,255,255,.7);
	display:grid;
}

.github_table > *{
	border-bottom:solid var(--color-primary) var(--border-light);
	border-right:solid var(--color-primary) var(--border-light);
}

.github_table > *:nth-of-type(3n+1){
	display:flex;
	justify-content:center;
	align-items:center;
}

.github_table h4, 
.github_table h5, 
.github_table p{
	line-height:1.5;
}

.github_table p{
	text-align:left;
}

.github_table_item_name{
	background:var(--color-primary-light);
}

.github_table_anchor_wrapper{
	display:flex;
	justify-content:center;
	align-items:center;
}

.github_table_anchor_wrapper > a{
	display:inline-block;
}

.github_table_anchor_wrapper img{
	width:100%;
}
/*----------------------------- /github -----------------------------*/

/*----------------------------- footer -----------------------------*/
#footer{
	background:var(--color-primary);
}

#footer_copyright{
	color:var(--color-white);
	line-height:1.2;
}
/*----------------------------- /footer -----------------------------*/
/****************************** /all ******************************/

/****************************** pc ******************************/
@media screen and (min-width:1280px){
	/*----------------------------- root -----------------------------*/
	:root{
		/* フォントサイズ */
		--font-size-extra-large:55px;
		--font-size-large:25px;
		--font-size-larger:22px;
		--font-size-medium:18px;
		--font-size-smaller:15px;
		--font-size-small:13px;
		--font-size-extra-small:10px;
		
		/* 幅 */
		--width-wrapper:1000px;
		--width-pointer:10px;
		
		/* 余白 */
		--margin-large:100px;
		--margin-larger:80px;
		--margin-medium:40px;
		--margin-smaller:20px;
		--margin-small:10px;
		--margin-extra-small:5px;
	}
	/*----------------------------- /root -----------------------------*/
	
	/*----------------------------- common -----------------------------*/
	.anchor_point{
		transform:translateY(-44px);
	}
	
	h2.headline{
		margin-bottom:var(--margin-medium);
	}
	
	h2.headline::before{
		width:20px;
		bottom:-8px;
		right:38px;
	}
	
	h2.headline::after{
		width:30px;
		bottom:-13px;
	}
	
	h2.headline > div{
		font-size:var(--font-size-large);
		text-indent:10px;
	}
	
	h2.headline > div::after{
		width:calc(100% - 68px);
		height:4px;
		border-radius:2px;
	}
	
	h3.headline{
		font-size:var(--font-size-large);
		margin-bottom:var(--margin-small);
		gap:5px;
	}
	
	h3.headline::before, 
	h3.headline::after{
		font-size:var(--font-size-extra-small);
	}
	
	#container > section:not(:last-child){
		margin-bottom:var(--margin-larger);
	}
	/*----------------------------- /common -----------------------------*/
	
	/*----------------------------- noscript -----------------------------*/
	noscript p{
		font-size:var(--font-size-medium);
	}
	/*----------------------------- /noscript -----------------------------*/
	
	/*----------------------------- container -----------------------------*/
	#container{
		width:var(--width-wrapper);
		padding-bottom:var(--margin-large);
	}
	/*----------------------------- /container -----------------------------*/
	
	/*----------------------------- header -----------------------------*/
	#header{
		padding-top:var(--margin-medium);
		margin-bottom:var(--margin-large);
	}
	
	h1.headline{
		width:300px;
		margin:0 auto var(--margin-medium);
	}
	
	h1.headline span:first-child{
		font-size:var(--font-size-extra-large);
	}
	
	h1.headline span:last-child{
		font-size:var(--font-size-large);
		gap:5px;
	}
	
	h1.headline span:last-child::before, 
	h1.headline span:last-child::after{
		font-size:var(--font-size-extra-small);
	}
	/*----------------------------- /header -----------------------------*/
	
	/*----------------------------- navi -----------------------------*/
	#navi > ul{
		width:600px;
	}
	
	#navi.sticky_active > ul{
		width:var(--width-wrapper);
	}
	
	#navi a{
		font-size:var(--font-size-larger);
		gap:5px;
	}
	
	#navi a::after{
		width:var(--width-pointer);
	}
	/*----------------------------- /navi -----------------------------*/
	
	/*----------------------------- profile -----------------------------*/
	#profile_list0 > li{
		font-size:var(--font-size-medium);
		padding:10px 0 14px;
		background-size:auto 4px;
	}
	
	#profile_list0 > li > h3{
		width:200px;
		padding-left:10px;
	}
	
	#profile_list0 > li > *:not(h3){
		width:calc(100% - 200px);
	}
	
	#profile_list1 > li:not(:last-child){
		margin-bottom:var(--margin-extra-small);
	}
	/*----------------------------- /profile -----------------------------*/
	
	/*----------------------------- history -----------------------------*/
	#history_list{
		font-size:var(--font-size-medium);
		padding:30px;
		border-radius:12px;
	}
	
	#history_list > li:not(:last-child){
		margin-bottom:var(--margin-small);
	}
	
	#history_list > li > span{
		width:200px;
	}
	
	#history_list > li > p{
		width:calc(100% - 200px);
	}
	
	#history_list > li > p::before{
		font-size:var(--font-size-extra-small);
	}
	/*----------------------------- /history -----------------------------*/
	
	/*----------------------------- product -----------------------------*/
	#product_description_wrapper{
		font-size:var(--font-size-medium);
		margin-bottom:var(--margin-smaller);
	}
	
	#product_list > li:not(:last-child){
		margin-bottom:var(--margin-medium);
	}
	
	.product_wrapper{
		justify-content:space-between;
	}
	
	.product_carousel{
		width:400px;
	}
	
	.product_carousel figcaption{
		font-size:var(--font-size-smaller);
		margin-top:var(--margin-extra-small);
	}
	
	.product_carousel .splide__arrow{
		width:30px;
		height:30px;
		top:calc(50% - 18px);
	}
	
	.product_carousel .splide__arrow--prev{
		left:-30px;
	}
	
	.product_carousel .splide__arrow--next{
		right:-30px;
	}
	
	.product_carousel .splide__arrow svg{
		width:25px;
		height:25px;
	}
	
	.product_carousel .splide__pagination{
		margin-top:var(--margin-small);
	}
	
	.product_carousel .splide__pagination__page{
		width:8px;
		height:8px;
		margin:0 var(--margin-small);
	}
	
	.product_table{
		font-size:var(--font-size-smaller);
		width:calc(100% - 440px);
	}
	
	.product_item_name > h4{
		padding-block:5px;
		border-radius:6px;
	}
	
	.product_attention{
		font-size:var(--font-size-small);
	}
	/*----------------------------- /product -----------------------------*/
	
	/*----------------------------- github -----------------------------*/
	#github_description_wrapper{
		font-size:var(--font-size-medium);
		margin-bottom:var(--margin-smaller);
		align-items:center;
	}
	
	#github_description_wrapper > a{
		gap:5px;
	}
	
	#github_description_wrapper > a::after{
		width:var(--width-pointer);
	}
	
	#github_list > li:not(:last-child){
		margin-bottom:var(--margin-medium);
	}
	
	.github_table{
		grid-template-columns:18% 72% 10%;
	}
	
	.github_table_headline{
		padding:5px 0 5px 23px;
		margin-bottom:var(--margin-smaller);
	}
	
	.github_table_headline::before{
		width:6px;
		border-radius:3px;
	}
	
	.github_table_headline > span{
		font-size:var(--font-size-larger);
	}
	
	.github_table:not(:last-child){
		margin-bottom:var(--margin-medium);
	}
	
	.github_table > *{
		padding:10px;
	}
	
	.github_table h4, 
	.github_table h5, 
	.github_table p{
		font-size:var(--font-size-medium);
	}
	
	.github_table_anchor_wrapper > a{
		width:20px;
	}
	/*----------------------------- /github -----------------------------*/
	
	/*----------------------------- footer -----------------------------*/
	#footer{
		padding-block:20px;
	}
	
	#footer_copyright{
		font-size:var(--font-size-medium);
	}
	/*----------------------------- /footer -----------------------------*/
}
/****************************** /pc ******************************/

/****************************** tablet ******************************/
@media screen and (min-width:768px) and (max-width:1280px){
	/*----------------------------- root -----------------------------*/
	:root{
		/* フォントサイズ */
		--font-size-extra-large:clamp(14px, 5.5vw, 5.5vw);
		--font-size-large:clamp(14px, 2.5vw, 2.5vw);
		--font-size-larger:clamp(14px, 2.2vw, 2.2vw);
		--font-size-medium:clamp(14px, 1.8vw, 1.8vw);
		--font-size-smaller:clamp(14px, 1.5vw, 1.5vw);
		--font-size-small:clamp(14px, 1.3vw, 1.3vw);
		--font-size-extra-small:clamp(10px, 1.0vw, 1.0vw);
		
		/* 幅 */
		--width-wrapper:98%;
		--width-pointer:1.0vw;
		
		/* 余白 */
		--margin-large:10.0vw;
		--margin-larger:8.0vw;
		--margin-medium:4.0vw;
		--margin-smaller:2.0vw;
		--margin-small:1.0vw;
		--margin-extra-small:0.5vw;
	}
	/*----------------------------- /root -----------------------------*/
	
	/*----------------------------- common -----------------------------*/
	.anchor_point{
		transform:translateY(-4.4vw);
	}
	
	h2.headline{
		margin-bottom:var(--margin-medium);
	}
	
	h2.headline::before{
		width:2.0vw;
		bottom:-0.8vw;
		right:3.8vw;
	}
	
	h2.headline::after{
		width:3.0vw;
		bottom:-1.3vw;
	}
	
	h2.headline > div{
		font-size:var(--font-size-large);
		text-indent:1.0vw;
	}
	
	h2.headline > div::after{
		width:calc(100% - 6.8vw);
		height:0.4vw;
		border-radius:0.2vw;
	}
	
	h3.headline{
		font-size:var(--font-size-large);
		margin-bottom:var(--margin-small);
		gap:0.5vw;
	}
	
	h3.headline::before, 
	h3.headline::after{
		font-size:var(--font-size-extra-small);
	}
	
	#container > section:not(:last-child){
		margin-bottom:var(--margin-larger);
	}
	/*----------------------------- /common -----------------------------*/
	
	/*----------------------------- noscript -----------------------------*/
	noscript p{
		font-size:var(--font-size-medium);
	}
	/*----------------------------- /noscript -----------------------------*/
	
	/*----------------------------- container -----------------------------*/
	#container{
		width:var(--width-wrapper);
		padding-bottom:var(--margin-large);
	}
	/*----------------------------- /container -----------------------------*/
	
	/*----------------------------- header -----------------------------*/
	#header{
		padding-top:var(--margin-medium);
		margin-bottom:var(--margin-large);
	}
	
	h1.headline{
		width:30.0vw;
		margin:0 auto var(--margin-medium);
	}
	
	h1.headline span:first-child{
		font-size:var(--font-size-extra-large);
	}
	
	h1.headline span:last-child{
		font-size:var(--font-size-large);
		gap:0.5vw;
	}
	
	h1.headline span:last-child::before, 
	h1.headline span:last-child::after{
		font-size:var(--font-size-extra-small);
	}
	/*----------------------------- /header -----------------------------*/
	
	/*----------------------------- navi -----------------------------*/
	#navi > ul{
		width:70.0vw;
	}
	
	#navi.sticky_active > ul{
		width:var(--width-wrapper);
	}
	
	#navi a{
		font-size:var(--font-size-larger);
		gap:0.5vw;
	}
	
	#navi a::after{
		width:var(--width-pointer);
	}
	/*----------------------------- /navi -----------------------------*/
	
	/*----------------------------- profile -----------------------------*/
	#profile_list0 > li{
		font-size:var(--font-size-medium);
		padding:1.0vw 0 1.4vw;
		background-size:auto 0.4vw;
	}
	
	#profile_list0 > li > h3{
		width:20.0vw;
		padding-left:1.0vw;
	}
	
	#profile_list0 > li > *:not(h3){
		width:calc(100% - 20.0vw);
	}
	
	#profile_list1 > li:not(:last-child){
		margin-bottom:var(--margin-extra-small);
	}
	/*----------------------------- /profile -----------------------------*/
	
	/*----------------------------- history -----------------------------*/
	#history_list{
		font-size:var(--font-size-medium);
		padding:3.0vw;
		border-radius:1.2vw;
	}
	
	#history_list > li:not(:last-child){
		margin-bottom:var(--margin-small);
	}
	
	#history_list > li > span{
		width:20.0vw;
	}
	
	#history_list > li > p{
		width:calc(100% - 20.0vw);
	}
	
	#history_list > li > p::before{
		font-size:var(--font-size-extra-small);
	}
	/*----------------------------- /history -----------------------------*/
	
	/*----------------------------- product -----------------------------*/
	#product_description_wrapper{
		font-size:var(--font-size-medium);
		margin-bottom:var(--margin-smaller);
	}
	
	#product_list > li:not(:last-child){
		margin-bottom:var(--margin-medium);
	}
	
	.product_wrapper{
		justify-content:space-between;
	}
	
	.product_carousel{
		width:40%;
	}
	
	.product_carousel figcaption{
		font-size:var(--font-size-smaller);
		margin-top:var(--margin-extra-small);
	}
	
	.product_carousel .splide__arrow{
		width:3.0vw;
		height:3.0vw;
		top:unset;
		bottom:-2.0vw;
	}
	
	.product_carousel .splide__arrow--prev{
		left:0;
	}
	
	.product_carousel .splide__arrow--next{
		right:0;
	}
	
	.product_carousel .splide__arrow svg{
		width:2.5vw;
		height:2.5vw;
	}
	
	.product_carousel .splide__pagination{
		margin-top:var(--margin-small);
	}
	
	.product_carousel .splide__pagination__page{
		width:0.8vw;
		height:0.8vw;
		margin:0 var(--margin-small);
	}
	
	.product_table{
		font-size:var(--font-size-smaller);
		width:calc(60% - 4.0vw);
	}
	
	.product_item_name > h4{
		padding-block:0.5vw;
		border-radius:0.6vw;
	}
	
	.product_attention{
		font-size:var(--font-size-small);
	}
	/*----------------------------- /product -----------------------------*/
	
	/*----------------------------- github -----------------------------*/
	#github_description_wrapper{
		font-size:var(--font-size-medium);
		margin-bottom:var(--margin-smaller);
		align-items:center;
	}
	
	#github_description_wrapper > a{
		gap:0.5vw;
	}
	
	#github_description_wrapper > a::after{
		width:var(--width-pointer);
	}
	
	#github_list > li:not(:last-child){
		margin-bottom:var(--margin-medium);
	}
	
	.github_table{
		grid-template-columns:18% 72% 10%;
	}
	
	.github_table_headline{
		padding:0.5vw 0 0.5vw 2.3vw;
		margin-bottom:var(--margin-smaller);
	}
	
	.github_table_headline::before{
		width:0.6vw;
		border-radius:0.3vw;
	}
	
	.github_table_headline > span{
		font-size:var(--font-size-larger);
	}
	
	.github_table:not(:last-child){
		margin-bottom:var(--margin-medium);
	}
	
	.github_table > *{
		padding:1.0vw;
	}
	
	.github_table h4, 
	.github_table h5, 
	.github_table p{
		font-size:var(--font-size-medium);
	}
	
	.github_table_anchor_wrapper > a{
		width:2.0vw;
	}
	/*----------------------------- /github -----------------------------*/
	
	/*----------------------------- footer -----------------------------*/
	#footer{
		padding-block:2.0vw;
	}
	
	#footer_copyright{
		font-size:var(--font-size-medium);
	}
	/*----------------------------- /footer -----------------------------*/
}
/****************************** /tablet ******************************/

/****************************** sp ******************************/
@media screen and (max-width:768px){
	/*----------------------------- root -----------------------------*/
	:root{
		/* フォントサイズ */
		--font-size-extra-large:clamp(13px, 10.0vw, 10.0vw);
		--font-size-large:clamp(13px, 6.0vw, 6.0vw);
		--font-size-larger:clamp(13px, 4.0vw, 4.0vw);
		--font-size-medium:clamp(13px, 3.5vw, 3.5vw);
		--font-size-smaller:clamp(13px, 3.2vw, 3.2vw);
		--font-size-small:clamp(13px, 3.0vw, 3.0vw);
		--font-size-extra-small:clamp(10px, 2.0vw, 2.0vw);
		
		/* 幅 */
		--width-wrapper:98%;
		--width-pointer:2.0vw;
		
		/* 余白 */
		--margin-large:15.0vw;
		--margin-larger:12.0vw;
		--margin-medium:6.0vw;
		--margin-smaller:3.0vw;
		--margin-small:2.0vw;
		--margin-extra-small:1.0vw;
	}
	/*----------------------------- /root -----------------------------*/
	
	/*----------------------------- common -----------------------------*/
	h2.headline{
		margin-bottom:var(--margin-medium);
	}
	
	h2.headline::before{
		width:4.5vw;
		bottom:-1.75vw;
		right:8.5vw;
	}
	
	h2.headline::after{
		width:7.0vw;
		bottom:-3.0vw;
	}
	
	h2.headline > div{
		font-size:var(--font-size-large);
		text-indent:2.0vw;
	}
	
	h2.headline > div::after{
		width:calc(100% - 15.0vw);
		height:1.0vw;
		border-radius:0.5vw;
	}
	
	h3.headline{
		font-size:var(--font-size-large);
		margin-bottom:var(--margin-small);
		gap:1.5vw;
	}
	
	h3.headline::before, 
	h3.headline::after{
		font-size:var(--font-size-extra-small);
	}
	
	#container > section:not(:last-child){
		margin-bottom:var(--margin-larger);
	}
	/*----------------------------- /common -----------------------------*/
	
	/*----------------------------- noscript -----------------------------*/
	noscript p{
		font-size:var(--font-size-medium);
	}
	/*----------------------------- /noscript -----------------------------*/
	
	/*----------------------------- container -----------------------------*/
	#container{
		width:var(--width-wrapper);
		padding-bottom:var(--margin-large);
	}
	/*----------------------------- /container -----------------------------*/
	
	/*----------------------------- header -----------------------------*/
	#header{
		padding-top:var(--margin-medium);
		margin-bottom:var(--margin-large);
	}
	
	h1.headline{
		width:65%;
		margin:0 auto var(--margin-medium);
	}
	
	h1.headline span:first-child{
		font-size:var(--font-size-extra-large);
	}
	
	h1.headline span:last-child{
		font-size:var(--font-size-large);
		gap:1.5vw;
	}
	
	h1.headline span:last-child::before, 
	h1.headline span:last-child::after{
		font-size:var(--font-size-extra-small);
	}
	/*----------------------------- /header -----------------------------*/
	
	/*----------------------------- navi -----------------------------*/
	#navi.sticky_active{
		top:unset;
		bottom:0;
	}
	
	#navi > ul{
		width:100%;
	}
	
	#navi.sticky_active > ul{
		width:var(--width-wrapper);
	}
	
	#navi a{
		font-size:var(--font-size-larger);
		padding-block:1.0vw;
		gap:0.5vw;
	}
	
	#navi a::after{
		width:var(--width-pointer);
	}
	/*----------------------------- /navi -----------------------------*/
	
	/*----------------------------- profile -----------------------------*/
	#profile_list0 > li{
		font-size:var(--font-size-medium);
		padding:2.0vw 0 3.0vw;
		background-size:auto 1.0vw;
		flex-direction:column;
		gap:1.0vw;
	}
	
	#profile_list0 > li > h3{
		display:flex;
		justify-content:center;
		align-items:center;
		gap:1.0vw;
	}
	
	#profile_list0 > li > h3::before, 
	#profile_list0 > li > h3::after{
		content:"\25CF";
		font-size:var(--font-size-extra-small);
	}
	
	#profile_list0 > li > *{
		width:100%;
	}
	
	#profile_list1 > li:not(:last-child){
		margin-bottom:var(--margin-extra-small);
	}
	/*----------------------------- /profile -----------------------------*/
	
	/*----------------------------- history -----------------------------*/
	#history_list{
		font-size:var(--font-size-medium);
		padding:4.0vw;
		border-radius:3.5vw;
	}
	
	#history_list > li:not(:last-child){
		margin-bottom:var(--margin-small);
	}
	
	#history_list > li > span{
		width:28.0vw;
	}
	
	#history_list > li > p{
		width:calc(100% - 28.0vw);
	}
	
	#history_list > li > p::before{
		font-size:var(--font-size-extra-small);
	}
	/*----------------------------- /history -----------------------------*/
	
	/*----------------------------- product -----------------------------*/
	#product_description_wrapper{
		font-size:var(--font-size-medium);
		margin-bottom:var(--margin-smaller);
	}
	
	#product_list > li:not(:last-child){
		margin-bottom:var(--margin-medium);
	}
	
	.product_wrapper{
		justify-content:center;
		flex-direction:column;
		gap:4.0vw;
	}
	
	.product_carousel{
		width:100%;
	}
	
	.product_carousel figcaption{
		font-size:var(--font-size-smaller);
		margin-top:var(--margin-extra-small);
	}
	
	.product_carousel .splide__arrow{
		width:8.0vw;
		height:8.0vw;
		top:unset;
		bottom:-6.5vw;
	}
	
	.product_carousel .splide__arrow--prev{
		left:0;
	}
	
	.product_carousel .splide__arrow--next{
		right:0;
	}
	
	.product_carousel .splide__arrow svg{
		width:4.0vw;
		height:4.0vw;
	}
	
	.product_carousel .splide__pagination{
		margin-top:var(--margin-small);
	}
	
	.product_carousel .splide__pagination__page{
		height:2.0vw;
		width:2.0vw;
		margin:0 var(--margin-small);
	}
	
	.product_table{
		font-size:var(--font-size-smaller);
		width:100%;
	}
	
	.product_item_name > h4{
		padding-block:1.5vw;
		border-radius:1.8vw;
	}
	
	.product_attention{
		font-size:var(--font-size-small);
	}
	/*----------------------------- /product -----------------------------*/
	
	/*----------------------------- github -----------------------------*/
	#github_description_wrapper{
		font-size:var(--font-size-medium);
		margin-bottom:var(--margin-smaller);
		align-items:flex-end;
		flex-direction:column;
		gap:1.0vw;
	}
	
	#github_description_wrapper > a{
		gap:0.5vw;
	}
	
	#github_description_wrapper > a::after{
		width:var(--width-pointer);
	}
	
	#github_list > li:not(:last-child){
		margin-bottom:var(--margin-medium);
	}
	
	.github_table{
		grid-template-columns:19% 66% 15%;
	}
	
	.github_table_headline{
		padding:1.5vw 0 1.5vw 4.5vw;
		margin-bottom:var(--margin-smaller);
	}
	
	.github_table_headline::before{
		width:1.0vw;
		border-radius:0.5vw;
	}
	
	.github_table_headline > span{
		font-size:var(--font-size-larger);
	}
	
	.github_table:not(:last-child){
		margin-bottom:var(--margin-medium);
	}
	
	.github_table > *{
		padding:1.0vw;
	}
	
	.github_table h4, 
	.github_table h5, 
	.github_table p{
		font-size:var(--font-size-medium);
	}
	
	.github_table_anchor_wrapper > a{
		width:10.0vw;
	}
	/*----------------------------- /github -----------------------------*/
	
	/*----------------------------- footer -----------------------------*/
	#footer{
		padding:2.0vw 0 12.0vw;
	}
	
	#footer_copyright{
		font-size:var(--font-size-medium);
	}
	/*----------------------------- /footer -----------------------------*/
}
/****************************** /sp ******************************/
</style>
</head>
<body>
	<header id="header">
		<h1 class="headline animate_effect">
			<span>MAKREW</span>
			<span>メイクル</span>
		</h1>
		<nav class="animate_effect sticky" id="navi" aria-label="コンテンツメニュー">
			<ul>
				<li>
					<a href="#profile_anchor_point" aria-label="プロフィールまでスクロール" class="scroll_button" data-scroll-button-scroll-position="#profile_anchor_point" data-scroll-button-display-toggle="false">Profile</a>
				</li>
				<li>
					<a href="#history_anchor_point" aria-label="経歴までスクロール" class="scroll_button" data-scroll-button-scroll-position="#history_anchor_point" data-scroll-button-display-toggle="false">History</a>
				</li>
				<li>
					<a href="#product_anchor_point" aria-label="制作物までスクロール" class="scroll_button" data-scroll-button-scroll-position="#product_anchor_point" data-scroll-button-display-toggle="false">Product</a>
				</li>
				<li>
					<a href="#github_anchor_point" aria-label="ギットハブまでスクロール" class="scroll_button" data-scroll-button-scroll-position="#github_anchor_point" data-scroll-button-display-toggle="false">GitHub</a>
				</li>
			</ul>
		</nav>
	</header>
	<main id="container">
		<noscript>
			<section>
				<p>こちらのコンテンツは JavaScript を有効にしないと正しく表示されません。</p>
				<p>お使いのブラウザで JavaScript を有効にしてください。</p>
			</section>
		</noscript>
		<section class="animate_effect" aria-labelledby="profile_headline">
			<div class="anchor_point" id="profile_anchor_point"></div>
			<h2 class="headline" id="profile_headline">
				<div>Profile</div>
			</h2>
			<ul id="profile_list0">
				<li>
					<h3>屋号</h3>
					<p>
						株式会社メイクル
					</p>
				</li>
				<li>
					<h3>氏名</h3>
					<p>
						<ruby>
						<rb>
							小西 理督
						</rb>
						<rp>（</rp>
						<rt>コニシ マサヨシ</rt>
						<rp>）</rp>
						</ruby>
					</p>
				</li>
				<li>
					<h3>年齢</h3>
					<p>
						<?php echo funcGetPeriodYear("1986-09-07"); ?>歳
					</p>
				</li>
				<li>
					<h3>性別</h3>
					<p>
						男性
					</p>
				</li>
				<li>
					<h3>活動拠点</h3>
					<p>
						大阪府
					</p>
				</li>
				<li>
					<h3>使用言語</h3>
					<p>
						MySQL, PHP, JavaScript, HTML, CSS, jQuery, Smarty(テンプレートエンジン), VBA(エクセル)
					</p>
				</li>
				<li>
					<h3>事業内容</h3>
					<ul id="profile_list1">
						<li>Webアプリケーション開発</li>
						<li>Webサイト制作、LP制作</li>
						<li>ECコンサルティング</li>
						<li>EC向けASPサービス</li>
					</ul>
				</li>
				<li>
					<h3>自己PR</h3>
					<p>
						<?php echo funcGetPeriodYear("2010-08-01"); ?>年間Webアプリケーション開発やWebサイト制作に携わってまいりました。<br>
						開発で意識している事としましては要件定義の際にシステム運用をしやすくするために自動化できる所は自動化するなど最大限、人の作業を減らす為のご提案も含めたヒアリングをさせて頂いております。<br>
						お客様のイメージするデザインをコーディングするだけではなく、
						デベロッパーツールでレンダリングスピードやパフォーマンススピードを検証し最適化された状態で納品しております。<br>
						1例ですがアパレル通販の企業様で商品のデータ収集、分析、サイト更新、在庫の適正管理を全て自動化する事で経費を抑えて売り上げの大幅アップができました。<br>
						お客様の目標達成に向けたご提案も行いながら制作に携わってまいりたいと思います。<br>
					</p>
				</li>
			</ul>
		</section>
		<section class="animate_effect" aria-labelledby="history_headline">
			<div class="anchor_point" id="history_anchor_point"></div>
			<h2 class="headline" id="history_headline">
				<div>History</div>
			</h2>
			<ul id="history_list">
				<li>
					<span>
						現在
					</span>
					<p>
						事業継続中
					</p>
				</li>
				<li>
					<span>
						2017年11月
					</span>
					<p>
						株式会社メイクル設立
					</p>
				</li>
				<li>
					<span>
						2015年4月
					</span>
					<p>
						個人事業開業<br>
						Webサイト制作、LP制作、システム開発、コンサルティング等に携わっております。
					</p>
				</li>
				<li>
					<span>
						2010年8月
					</span>
					<p>
						アパレル通販会社へ就職<br>
						ECサイト運営と商品画像制作と社内SEに携わっておりました。
					</p>
				</li>
			</ul>
		</section>
		<section class="animate_effect" aria-labelledby="product_headline">
			<div class="anchor_point" id="product_anchor_point"></div>
			<h2 class="headline" id="product_headline">
				<div>Product</div>
			</h2>
			<div id="product_description_wrapper">
				<p>過去に作成させて頂きました作成物の一部を記載させて頂きます。</p>
			</div>
			<ol id="product_list">
				<li>
					<h3 class="headline"><span>制作事例</span></h3>
					<div class="product_wrapper">
						<div class="product_carousel splide">
							<div class="splide__track">
								<ul class="splide__list">
									<li class="splide__slide">
										<figure>
											<picture>
												<source type="image/webp" srcset="./img/product/1/0.webp">
												<img src="./img/product/1/0.jpg" alt="" width="987" height="888" loading="lazy" decoding="async">
											</picture>
											<figcaption>トップページ</figcaption>
										</figure>
									</li>
									<li class="splide__slide">
										<figure>
											<picture>
												<source type="image/webp" srcset="./img/product/1/1.webp">
												<img src="./img/product/1/1.jpg" alt="" width="987" height="888" loading="lazy" decoding="async">
											</picture>
											<figcaption>カテゴリーページ</figcaption>
										</figure>
									</li>
									<li class="splide__slide">
										<figure>
											<picture>
												<source type="image/webp" srcset="./img/product/1/2.webp">
												<img src="./img/product/1/2.jpg" alt="" width="987" height="888" loading="lazy" decoding="async">
											</picture>
											<figcaption>商品検索ページ</figcaption>
										</figure>
									</li>
								</ul>
							</div>
						</div>
						<table cellpadding="4" cellspacing="0" border="0" class="product_table">
							<tr>
								<th class="product_item_name">
									<h4>サイト名</h4>
								</th>
								<td>
									大きいサイズ レディース服通販店ゴールドジャパン
								</td>
							</tr>
							<tr>
								<th class="product_item_name">
									<h4>URL</h4>
								</th>
								<td>
									<a href="https://www.gold-japan.jp/" target="_blank" rel="noopener noreferrer" aria-label="ページを開く">
										https://www.gold-japan.jp/
									</a>
									<p class="product_attention">
										※リンク切れの場合がございますがご了承ください。
									</p>
								</td>
							</tr>
							<tr>
								<th class="product_item_name">
									<h4>担当</h4>
								</th>
								<td>
									コーディング
								</td>
							</tr>
							<tr>
								<th class="product_item_name">
									<h4>使用言語<br>フレームワーク</h4>
								</th>
								<td>
									HTML, CSS, JavaScript, PHP
								</td>
							</tr>
							<tr>
								<th class="product_item_name">
									<h4>期間</h4>
								</th>
								<td>
									約120日
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<p class="product_comment">
										システム移行に伴い合計80ページをフルスクラッチにて作らせて頂きました。<br>
										全てのページのSEOやパフォーマンスを最適化しつつ動線設計も意識しながら進めさせて頂いておりました。<br>
										表示スピードはネットワーク環境にもよりますが0.3～0.5秒程で表示が完了致します。
									</p>
								</td>
							</tr>
						</table>
					</div>
				</li>
				<li>
					<h3 class="headline"><span>制作事例</span></h3>
					<div class="product_wrapper">
						<div class="product_carousel splide">
							<div class="splide__track">
								<ul class="splide__list">
									<li class="splide__slide">
										<figure>
											<picture>
												<source type="image/webp" srcset="./img/product/0/0.webp">
												<img src="./img/product/0/0.jpg" alt="" width="987" height="888" loading="lazy" decoding="async">
											</picture>
											<figcaption>メインビジュアル</figcaption>
										</figure>
									</li>
									<li class="splide__slide">
										<figure>
											<picture>
												<source type="image/webp" srcset="./img/product/0/1.webp">
												<img src="./img/product/0/1.jpg" alt="" width="987" height="888" loading="lazy" decoding="async">
											</picture>
											<figcaption>写真一覧ポップアップ</figcaption>
										</figure>
									</li>
									<li class="splide__slide">
										<figure>
											<picture>
												<source type="image/webp" srcset="./img/product/0/2.webp">
												<img src="./img/product/0/2.jpg" alt="" width="987" height="888" loading="lazy" decoding="async">
											</picture>
											<figcaption>お問い合わせフォーム</figcaption>
										</figure>
									</li>
								</ul>
							</div>
						</div>
						<table cellpadding="4" cellspacing="0" border="0" class="product_table">
							<tr>
								<th class="product_item_name">
									<h4>サイト名</h4>
								</th>
								<td>
									大阪の格安商品撮影代行｜業界最安値のLUZ PHOTO
								</td>
							</tr>
							<tr>
								<th class="product_item_name">
									<h4>URL</h4>
								</th>
								<td>
									<a href="https://luz-photo.com/" target="_blank" rel="noopener noreferrer" aria-label="ページを開く">
										https://luz-photo.com/
									</a>
									<p class="product_attention">
										※リンク切れの場合がございますがご了承ください。
									</p>
								</td>
							</tr>
							<tr>
								<th class="product_item_name">
									<h4>担当</h4>
								</th>
								<td>
									コーディング
								</td>
							</tr>
							<tr>
								<th class="product_item_name">
									<h4>使用言語<br>フレームワーク</h4>
								</th>
								<td>
									HTML, CSS, JavaScript, PHP
								</td>
							</tr>
							<tr>
								<th class="product_item_name">
									<h4>期間</h4>
								</th>
								<td>
									約60日
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<p class="product_comment">
										初めにご要望等お伺いしSEOを重視し作成致しました。<br>
										お問い合わせフォームも作成しドロップ＆ドラッグでファイルを添付できるようにしております。
									</p>
								</td>
							</tr>
						</table>
					</div>
				</li>
				<li>
					<h3 class="headline"><span>制作事例</span></h3>
					<div class="product_wrapper">
						<div class="product_carousel splide">
							<div class="splide__track">
								<ul class="splide__list">
									<li class="splide__slide">
										<figure>
											<picture>
												<source type="image/webp" srcset="./img/product/2/0.webp">
												<img src="./img/product/2/0.jpg" alt="" width="987" height="888" loading="lazy" decoding="async">
											</picture>
											<figcaption>PCファーストビュー</figcaption>
										</figure>
									</li>
									<li class="splide__slide">
										<figure>
											<picture>
												<source type="image/webp" srcset="./img/product/2/1.webp">
												<img src="./img/product/2/1.jpg" alt="" width="987" height="888" loading="lazy" decoding="async">
											</picture>
											<figcaption>スマホファーストビュー</figcaption>
										</figure>
									</li>
									<li class="splide__slide">
										<figure>
											<picture>
												<source type="image/webp" srcset="./img/product/2/2.webp">
												<img src="./img/product/2/2.jpg" alt="" width="987" height="888" loading="lazy" decoding="async">
											</picture>
											<figcaption>スマホ検索メニュー</figcaption>
										</figure>
									</li>
								</ul>
							</div>
						</div>
						<table cellpadding="4" cellspacing="0" border="0" class="product_table">
							<tr>
								<th class="product_item_name">
									<h4>サイト名</h4>
								</th>
								<td>
									こだわり検索
								</td>
							</tr>
							<tr>
								<th class="product_item_name">
									<h4>URL</h4>
								</th>
								<td>
									<a href="https://www.ala-mode.jp/search/" target="_blank" rel="noopener noreferrer" aria-label="ページを開く">
										https://www.ala-mode.jp/search/
									</a>
									<p class="product_attention">
										※リンク切れの場合がございますがご了承ください。
									</p>
								</td>
							</tr>
							<tr>
								<th class="product_item_name">
									<h4>担当</h4>
								</th>
								<td>
									コーディング
								</td>
							</tr>
							<tr>
								<th class="product_item_name">
									<h4>使用言語<br>フレームワーク</h4>
								</th>
								<td>
									HTML, CSS, JavaScript, PHP
								</td>
							</tr>
							<tr>
								<th class="product_item_name">
									<h4>期間</h4>
								</th>
								<td>
									約20日
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<p class="product_comment">
										機能改善の為に作成させて頂きました。<br>
										ユーザービリティを考慮し様々な条件で商品検索を行えるように致しました。
									</p>
								</td>
							</tr>
						</table>
					</div>
				</li>
			</ol>
		</section>
		<section class="animate_effect" aria-labelledby="github_headline">
			<div class="anchor_point" id="github_anchor_point"></div>
			<h2 class="headline" id="github_headline">
				<div>GitHub</div>
			</h2>
			<div id="github_description_wrapper">
				<p>GitHub上に過去に作成したソースコードを一部公開しております。</p>
				<a href="<?php echo CONST_GITHUB_URL; ?>" target="_blank" rel="noopener noreferrer">
					<span>GitHubはこちら</span>
				</a>
			</div>
			<ul id="github_list">
				<?php
					foreach(CONST_CONFIGS['github'] as $item0){
						if($item0['table_headline'] === false){
							$headline_code = "";
							$headline_number = "4";
						}else{
							$headline_code = <<<CODE
					<h4 class="github_table_headline">
						<span>{$item0['table_headline']}</span>
					</h4>
CODE;
							$headline_number = "5";
						}
						echo <<<CODE
				<li>
					<h3 class="headline">
						{$item0['headline']}
					</h3>
					{$headline_code}
					<div class="github_table">
						<h{$headline_number} class="github_table_item_name">名称</h{$headline_number}>
						<h{$headline_number} class="github_table_item_name">概要</h{$headline_number}>
						<h{$headline_number} class="github_table_item_name">リンク</h{$headline_number}>
CODE;
						foreach($item0["list"] as $item1){
							echo <<<CODE
						<div>
							<h{$headline_number}>{$item1["name"]}</h{$headline_number}>
						</div>
						<div>
							<p>{$item1["description"]}</p>
						</div>
						<div class="github_table_anchor_wrapper">
							<a href="{$item1["url"]}" target="_blank" rel="noopener noreferrer" aria-label="ギットハブのページを開きます。">
								<img src="./img/anchor.svg" alt="GitHubへのリンクボタン" width="683" height="683" loading="lazy" decoding="async">
							</a>
						</div>
CODE;
						}
						echo <<<CODE
					</div>
				</li>
CODE;
					}
				?>
			</ul>
		</section>
	</main>
	<footer class="animate_effect" id="footer">
		<small id="footer_copyright">Copyright (C) MAKREW Inc. All Rights Reserved.</small>
	</footer>
	
	<!-- class -->
	<script src="./js/class/scroll_button/ScrollButton.js"></script>
	<script src="./js/class/view_trigger/ViewTrigger.js"></script>
	<script src="./js/class/sticky/Sticky.js"></script>
	<script src="./js/class/bubble/Bubble.js"></script>
	<!-- library -->
	<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
	<script>
document.addEventListener('DOMContentLoaded', () => {
	const 
	configs = {
		plugin:{
			viewTrigger:{
				animateEffect:{
					countExecute: 1, 
					funcCallbackShow: (
						el, 
						count 
					) => {
						el.style.opacity = '1';
					} 
				} 
			}, 
			sticky:{}, 
			bubble:{} 
		} 
	}, 
	funcAddClass = () => {
		document.querySelectorAll('.animate_effect').forEach((el) => {
			new ViewTrigger(
				el, 
				configs.plugin.viewTrigger.animateEffect 
			);
		});
		document.querySelectorAll('.sticky').forEach((el) => {
			new Sticky(
				el, 
				configs.plugin.sticky 
			);
		});
		new Bubble(document.body);
	};
	funcAddClass();
});

window.addEventListener('load', () => {
	const 
	configs = {
		plugin:{
			scrollButton:{}, 
			viewTrigger:{
				productCarousel:{
					funcCallbackShow: (
						el, 
						count 
					) => {
						if(count === 1){
							if(!el.splideInstance)
							el.splideInstance = new Splide(
								el, 
								configs.plugin.splide 
							).mount();
						}else 
						if(el.splideInstance){
							el.splideInstance.Components.Autoplay.play();
						}
					}, 
					funcCallbackHide: (
						el, 
						count 
					) => {
						if(el.splideInstance)
						el.splideInstance.Components.Autoplay.pause();
					} 
				} 
			}, 
			splide:{
				type:'loop', 
				perPage:1, 
				gap:'10px', 
				autoplay:true, 
				interval:3000 
			} 
		} 
	}, 
	funcAddPlugin = () => {
		document.querySelectorAll('.scroll_button').forEach((el) => {
			new ScrollButton(
				el, 
				configs.plugin.scrollButton 
			);
		});
		document.querySelectorAll('.product_carousel').forEach((el) => {
			new ViewTrigger(
				el, 
				configs.plugin.viewTrigger.productCarousel 
			);
		});
	};
	funcAddPlugin();
});
	</script>
</body>
</html>