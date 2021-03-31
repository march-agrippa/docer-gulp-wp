<?php include_once "../../_config/nav.php" ?>
<!DOCTTPE html>
	<html lang="ja">

	<head>
		<?php echo $HTML['pageGoogleA']; ?>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="format-detection" content="telephone=no">
		<meta name="viewport" content="width=device-width">
		<title><?php echo $HTML['pageTitle']['news']; ?></title>
		<meta name="description" content="<?php echo $HTML['pageDescription']['news']; ?>">
		<?php
  echo $HTML['ogp'];
  echo $HTML['favicon'];
  echo $HTML['schema'];
  echo $HTML['pageHeaderJsCss'];
?>
		<link rel="stylesheet" href="<?= $css; ?>news.css">
		<link rel="stylesheet" href="<?= $css; ?>wysiwyg.css">
		<?php echo $HTML['loading']; ?>
		<?php echo $HTML['pageGoogleB']; ?>
	</head>

	<body id="pagebody" class="news-detail">
		<?php echo $HTML['pageGoogleC']; ?>

		<div class="wrapper">
			<?php include_once "../../_config/header.php" ?>
			<main id="pageMain">

				<div class="common-sub__breadcrumb common-inner">
					<ul class="common-sub__breadcrumb__list" itemscope itemtype="https://schema.org/BreadcrumbList">
						<li class="common-sub__breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
							<a href="/" itemprop="item">
								<span itemprop="name">Top</span>
							</a>
							<meta itemprop="position" content="1" />
						</li>
						<li class="common-sub__breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
							<a href="/news/" itemprop="item">
								<span itemprop="name">News</span>
							</a>
							<meta itemprop="position" content="2" />
						</li>
						<li class="common-sub__breadcrumb__item">News</li>
					</ul>
				</div>

				<div class="section-news-detail">
					<article class="common-inner section-news-detail__article">
						<header class="section-news-detail__article__header">
							<time class="section-news-detail__article__header-time">00. Mar. 2021</time>
							<h1 class="section-news-detail__article__header-headline">新しいウェブサイト公開</h1>
						</header>
						<section class="section-news-detail__article__section" id="wysiwyg">
							<h1>電子反応を制御する有機触媒電子反応を制御する有機触媒</h1>
							<h2>h2見出し大宮教授が Mukaiyama Award 2021 を受賞することが決定しました。</h2>
							<h3>h3小見出し受賞することが決定しました。</h3>
							<h4>電子反応を制御する有機触媒電子反応を制御する有機触媒</h4>
							<h5>電子反応を制御する有機触媒電子反応を制御する有機触媒</h5>
							<h6>電子反応を制御する有機触媒電子反応を制御する有機触媒</h6>
							<img src="https://placehold.jp/520x630.png" alt="">
							<strong>電子反応を制御する有機触媒電子反応を制御する有機触媒</strong>
							<em>電子反応を制御する有機触媒電子反応を制御する有機触媒</em>
							<blockquote>電子反応を制御する有機触媒電子反応を制御する有機触媒</blockquote>
						</section>
					</article>
					<footer class="section-news-detail__footer">
						<div class="common-inner section-news-detail__footer-inner">
							<div class="section-news-detail__footer-nav prev"><a href="#">
									<div class="section-news-detail__footer-nav__header">Prev</div>
									<div class="section-news-detail__footer-nav__caption">Organic Letters誌に掲載</div>
								</a></div>
							<div class="section-news-detail__footer-nav"><a href="#" class="common_btn">Back to news</a></div>
							<div class="section-news-detail__footer-nav next"><a href="#">
									<div class="section-news-detail__footer-nav__header">Next</div>
									<div class="section-news-detail__footer-nav__caption">next記事へ長尾助教 有機合成化学協会研究企画賞 受next記事へ長尾助教 有機合成化学協会研究企画賞 受</div>
								</a></div>
						</div>
					</footer>
				</div>


			</main>

			<?php include_once "../../_config/footer.php" ?>
		</div><!-- wrapper -->
		<?php echo $HTML['pageFooterJs']; ?>
		<?php echo $HTML['loadingJS']; ?>
	</body>

	<script></script>

	</html>
