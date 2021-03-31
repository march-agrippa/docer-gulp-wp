<?php include_once "../_config/nav.php" ?>
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

	<body id="pagebody" class="publication">
		<?php echo $HTML['pageGoogleC']; ?>

		<div class="wrapper">
			<?php include_once "../_config/header.php" ?>
			<main id="pageMain">

				<section class="common-sub__mv">
					<div class="common-sub__mv-wrapper">
						<div class="common-inner">
							<h2 class="common-sub__mv-headline">News</h2>
						</div>
					</div>
				</section>

				<div class="common-sub__breadcrumb common-inner">
					<ul class="common-sub__breadcrumb__list" itemscope itemtype="https://schema.org/BreadcrumbList">
						<li class="common-sub__breadcrumb__item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
							<a href="/" itemprop="item">
								<span itemprop="name">Top</span>
							</a>
							<meta itemprop="position" content="1" />
						</li>
						<li class="common-sub__breadcrumb__item">News</li>
					</ul>
				</div>

				<section class="section-news">
					<div class="common-inner news__inner">
						<div class="section-news__header">
							<button class="common_btn">Archive</button>
						</div>

						<div class="section-news__section">
							<ul class="section-news__list">
								<li data-san="fade" class="section-news__item"><a href="#">
										<article class="section-news__item-article">
											<time class="section-news__item-time" datetime=”2020-1-5” itemprop=”datepublished”>
												<p class="section-news__item-time-day">00</p>
												<p class="section-news__item-time-month">Mar. 2021</p>
											</time>
											
											<figure class="section-news__item-article__figure" data-san="img"><img src="https://placehold.jp/350x250.png" alt=""></figure>
											<div class="section-news__item-article__text">
												<h4 class="section-news__item-article__text-headline">ダミー大宮教授 教授 Mukaiyama Award</h4>
												<div class="section-news__item-article__text-content">
													ダミー冒頭文が入ります。弟がしですものはもっと今日をどうぞなかっだた。ひとまず岡田さ弟がしですものはもっと今日をどうぞなかっだた。ひとまず岡田さんに出入り勇気少し運動よりしまし義務その理由あなたかお話からと
												</div>
											</div>
											
										</article>
									</a></li>
								<li data-san="fade" class="section-news__item"><a href="#">
										<article class="section-news__item-article">
											<time class="section-news__item-time" datetime=”2020-1-5” itemprop=”datepublished”>
												<p class="section-news__item-time-day">05</p>
												<p class="section-news__item-time-month">Jan. 2020</p>
											</time>
											<figure class="section-news__item-article__figure" data-san="img"><img src="https://placehold.jp/350x250.png" alt=""></figure>
											<div class="section-news__item-article__text">
												<h4 class="section-news__item-article__text-headline">ダミー大宮教授 Mukaiyama Award 受賞大宮教授 Mukaiyama Award ダミー大宮教授 Mukaiyama Award 受賞大宮教授 Mukaiyama Award</h4>
												<div class="section-news__item-article__text-content">
													ダミー冒頭文が入ります。弟がしですものはもっと今日をどうぞなかっだた。ひとまず岡田さんに出入り勇気少し運動よりしまし義務その理由あなたかお話からとダミー冒頭文が入ります。弟がしですものはもっと今日をどうぞなかっだた。ひとまず岡田さんに出入り勇気少し運動よりしまし義務その理由あなたかお話からと
												</div>
											</div>
										</article>
									</a></li>

								<li data-san="fade" class="section-news__item"><a href="#">
										<article class="section-news__item-article">
											<time class="section-news__item-time" datetime=”2020-1-5” itemprop=”datepublished”>
												<p class="section-news__item-time-day">05</p>
												<p class="section-news__item-time-month">Jan. 2020</p>
											</time>
											<figure class="section-news__item-article__figure" data-san="img"><img src="https://placehold.jp/350x250.png" alt=""></figure>
											<div class="section-news__item-article__text">
												<h4 class="section-news__item-article__text-headline">ダミー大宮教授 Mukaiyama Award 受賞大宮教授 Mukaiyama Award ダミー大宮教授 Mukaiyama Award 受賞大宮教授 Mukaiyama Award</h4>
												<div class="section-news__item-article__text-content">
													ダミー冒頭文が入ります。弟がしですものはもっと今日をどうぞなかっだた。ひとまず岡田さんに出入り勇気少し運動よりしまし義務その理由あなたかお話からとダミー冒頭文が入ります。弟がしですものはもっと今日をどうぞなかっだた。ひとまず岡田さんに出入り勇気少し運動よりしまし義務その理由あなたかお話からと
												</div>
											</div>
										</article>
									</a></li>
							</ul>

						</div>
					</div>
				</section>

				<section class="common-sub__next">
					<div class="common-inner">
						<div data-san="" class="common-sub__next-content">
							<a href="<?= $pas; ?>members/" class="common-sub__next-content__figure">
								<figure data-san="img"><img src="https://placehold.jp/470x550.png" alt=""></figure>
							</a>
							<a href="<?= $pas; ?>members/" data-san="" class="common-sub__next-text__next">Next</a>
							<a href="<?= $pas; ?>members/" data-san="" class="common-sub__next-text__title">Members</a>

						</div>
					</div>
				</section>

			</main>

			<?php include_once "../_config/footer.php" ?>
		</div><!-- wrapper -->
		<?php echo $HTML['pageFooterJs']; ?>
		<?php echo $HTML['loadingJS']; ?>
	</body>

	<script></script>

	</html>
