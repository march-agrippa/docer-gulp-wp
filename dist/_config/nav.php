<?php
include_once "pas.php";
# IEチェック
$ua = getenv('HTTP_USER_AGENT');
# ドメインチェック
if(strpos($_SERVER['HTTP_REFERER'], $_SERVER["HTTP_HOST"]) !== false){
  $referer = true;
}

/*----------------------------------------
サイト情報
------------------------------------------*/

$HTML['shop'] = array(
    'url' => 'https://seimitsu.w3.kanazawa-u.ac.jp/',
	'name' => '大宮研究室',
    'tel' => '076-234-4411',
    'fax' => '',
    'mail' => 'ohmiya@p.kanazawa-u.ac.jp',
    'postcode' => '920-1192',
    'adress' => [
      '石川県金沢市角間町',
      '石川県',
      '金沢市角間町',
      ''
      ],
    'date' => '2020-02-01T00:00:00+09:00' // 公開日時
);

/*----------------------------------------
ヘッダ
------------------------------------------*/

$HTML['pageTitle'] = array(
	'top' => '大宮研究室｜精密分子構築学／金沢大学 医薬保健研究域 薬学系',	
	'about' => 'About｜大宮研究室｜精密分子構築学／金沢大学 医薬保健研究域 薬学系',
	'research' => 'Research｜大宮研究室｜精密分子構築学／金沢大学 医薬保健研究域 薬学系',
	'research-detail' => '｜大宮研究室｜精密分子構築学／金沢大学 医薬保健研究域 薬学系',
	'alumni' => 'Alumni｜大宮研究室｜精密分子構築学／金沢大学 医薬保険研究域 薬学系',
	'members' => 'Members｜大宮研究室｜精密分子構築学／金沢大学 医薬保健研究域 薬学系',
	'publication' => 'Publication｜大宮研究室｜精密分子構築学／金沢大学 医薬保健研究域 薬学系',
	'news' => 'News｜大宮研究室｜精密分子構築学／金沢大学 医薬保健研究域 薬学系',
	'news-detail' => '｜大宮研究室｜精密分子構築学／金沢大学 医薬保健研究域 薬学系',
	'presentation' => 'Presentation｜大宮研究室｜精密分子構築学／金沢大学 医薬保健研究域 薬学系',
	'access' => 'Access｜大宮研究室｜精密分子構築学／金沢大学 医薬保健研究域 薬学系'
);

$HTML['pageDescription'] = array(
	'top' => '金沢大学 大宮寛久研究室のウェブサイトです。当研究室では新触媒・新反応・新機能を創りだし、有機化学的な研究手法で医薬品開発や生命科学研究の未来を切り拓くことが目標です。',
	'about' => '金沢大学 大宮研究室についてご紹介いたします。有機合成化学｜有機金属化学｜触媒化学',
	'research' => '金沢大学 大宮研究室の研究内容についてご紹介いたします。触媒｜反応｜分子',
	'research-detail' => '金沢大学 大宮研究室の研究の詳細についてご紹介いたします。有機触媒｜カルベン触媒｜光酸化還元触媒｜銅触媒｜ラジカル反応｜ホウ素',
	'alumni' => '金沢大学 大宮研究室の卒業生をご紹介いたします。',
	'members' => '金沢大学 大宮研究室のメンバーをご紹介いたします。',
	'publication' => '金沢大学 大宮研究室 教授 大宮寛久の論文リストをご紹介いたします。',
	'news' => '金沢大学 大宮研究室からのお知らせや最新情報をご紹介いたします。',
	'news-detail' => '',
	'presentation' => '金沢大学 大宮研究室の学会発表の内容をご紹介いたします。',
	'access' => '金沢大学 大宮研究室のアクセス情報をご紹介いたします。'
);


/*----------------------------------------
js css など
------------------------------------------*/

$HTML['pageHeaderJsCss'] = <<< HTML
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<link rel="stylesheet" href="{$css}default.css">
<link rel="stylesheet" href="{$css}common.css">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
<script src="https://polyfill.io/v2/polyfill.min.js?features=IntersectionObserver"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=IntersectionObserver"></script>
HTML;


if (strstr($ua, 'Trident') || strstr($ua, 'MSIE')) {
  # IEの時は、さらに追記
  $HTML['pageHeaderJsCss'] .= '<!--[if lt IE 9]>
<script src="{$js}polyfill/html5shiv.js"></script>
<script src="{$js}polyfill/selectivizr-min.js"></script>
<![endif]-->
<script src="{$js}polyfill/picturefill.min.js"></script>
<script src="{$js}polyfill/micromodal-ie.js"></script>
<script src="{$js}polyfill/svg4everybody.min.js"></script>
<script>svg4everybody();</script>';
};

  # もし違うドメインからの遷移の場合
  if($referer == false){
     $HTML['loading'] = <<< HTML
     <style>
     #loading{
      display:flex;
     }
     </style>
     <div id="loading" class="loading">
        <div class="load"></div>
     </div>
HTML;
     $HTML['loadingJS'] = <<< HTML
     <script>
     
     let loading = false;
     
async function main() {
  try {
    await wait(10); // ここで10秒間止まります
    // ここに目的の処理を書きます。
    if(loading == false){
      loading = true;
      document.querySelector('#loading').classList.add('hidden');
      setTimeout(() => {
       document.querySelector('#loading').style.display = 'none';
      }, 1200);
    };
  } catch (err) {
    console.error(err);
  }
}

window.addEventListener("load", function(){
      if(loading == false){
      loading = true;
      document.querySelector('#loading').classList.add('hidden');
      setTimeout(() => {
       document.querySelector('#loading').style.display = 'none';
      }, 1200);
    };
});

</script>
HTML;
  }

/*----------------------------------------
フッターjs
------------------------------------------*/

$HTML['pageFooterJs'] = <<< HTML
<div id="stalker"></div>
<script src="//unpkg.com/micromodal/dist/micromodal.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.2/TweenMax.min.js"></script>
HTML;

if (strstr($ua, 'Trident') || strstr($ua, 'MSIE')) {
  # IEの時は、さらに追記
  $HTML['pageFooterJs'] .= '<script src="/assets/js/ie-common.js" defer></script>';
}else{
	# IE以外の時
  $HTML['pageFooterJs'] .= '<script src="/assets/js/common.js" defer></script>';
}

$HTML['pageGoogleA'] = <<< HTML
HTML;
$HTML['pageGoogleB'] = <<< HTML
HTML;
$HTML['pageGoogleC'] = <<< HTML
HTML;

/*----------------------------------------
OGP設定
------------------------------------------*/

$HTML['ogp'] = <<< HTML
  <meta property="og:site_name" content="{$HTML['shop']['name']}"/>
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:site" content="@OhmiyaLab" />
  <meta property="og:url" content="{$HTML['shop']['url']}" />
  <meta property="og:title" content="{$HTML['shop']['name']}"/>
  <meta property="og:description" content="{$HTML['pageDescription']['top']}" />
  <meta property="og:type" content="website" />
  <meta property="og:image" content="https://seimitsu.w3.kanazawa-u.ac.jp/assets/img/favicon/og.png" />
  <meta name="twitter:image" content="https://seimitsu.w3.kanazawa-u.ac.jp/assets/img/favicon/og.png">
  <meta name="apple-mobile-web-app-title" content="{$HTML['shop']['name']}" />
  <meta name="author" content="nicottolab" />
  <meta name="copyright" content="© {$HTML['shop']['name']}" />
  <meta name="date" content="{$HTML['shop']['date']}" />
  <meta name="coverage" content="japan" />
HTML;

$HTML['sns'] = <<< HTML
<div class="common-sns" data-sns="sns" id="homesns">
	<p class="common-sns__text">Follow us</p>
	<a href="//twitter.com/OhmiyaLab" target="_blank" class="common-sns__twit">
		<figure><img src="{$img}common/twitter.svg" alt=""></figure>
	</a>
	<a href="//www.instagram.com/ohmiyalab/" target="_blank" class="common-sns__inst">
		<figure><img src="{$img}common/instagram.svg" alt=""></figure>
	</a>
</div>
HTML;

/*----------------------------------------
favicon
------------------------------------------*/
$HTML['favicon'] = <<<HTML
  <meta name="msapplication-square310x310logo" content="{$img}favicon/site-tile-310x310.png">
  <meta name="msapplication-TileColor" content="{$main_color}">
  <link rel="shortcut icon" type="image/vnd.microsoft.icon" href="{$img}favicon/favicon.ico">
  <link rel="icon" type="image/vnd.microsoft.icon" href="{$img}favicon/favicon.ico">
  <link rel="apple-touch-icon" sizes="180x180" href="{$img}favicon/180.png">
  <link rel="icon" type="image/png" sizes="512x512" href="{$img}favicon/512.png">
HTML;

/*----------------------------------------
schema
------------------------------------------*/
include_once "schema.php";
$HTML['schema'] = $HTML['schemalist']['office'];
?>
