<?php include_once $_SERVER['DOCUMENT_ROOT']."/_config/nav.php"; ?>
<!DOCTTPE html>
<html lang="ja">

	<head>
		<?php echo $HTML['pageGoogleA']; ?>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="format-detection" content="telephone=no">
		<meta name="viewport" content="width=device-width">
		<title>お知らせ | <?= $HTML['pageTitle']['top']; ?></title>
		<meta name="description" content="お知らせ | <?= $HTML['pageTitle']['top']; ?>">
		<?php
		  echo $HTML['ogp'];
		  echo $HTML['favicon'];
		  echo $HTML['schema'];
		  echo $HTML['pageHeaderJsCss'];
		?>
		<?php echo $HTML['loading']; ?>
		<?php echo $HTML['pageGoogleB']; ?>
	</head>

	<body id="pagebody" class="">
		<?php echo $HTML['pageGoogleC']; ?>

		<div class="wrapper">
			<?php include_once $_SERVER['DOCUMENT_ROOT']."/_config/header.php" ?>
			<main id="pageMain">

				<ul>
					<?php
						query_posts($query_string);
						if(have_posts()): while(have_posts()): the_post();
					?>

					 <li><a href="<?php the_permalink(); ?>">
						<time datetime="<?= get_the_date("Y-m-d"); ?>"><?= get_the_date("Y.m.d"); ?></time>
					 	<p><?php the_title(); ?></p>
					 </a></li>

					<?php endwhile; else: ?>

					<li>
						<p>記事がありません</p>
					</li>

					<?php endif; ?>
				</ul>
			</main>
			<?php include_once $_SERVER['DOCUMENT_ROOT']."/_config/footer.php" ?>
		</div>

		<?php echo $HTML['pageFooterJs']; ?>
		<?php echo $HTML['loadingJS']; ?>
		<script>
			document.addEventListener("DOMContentLoaded", function() {});
		</script>
	</body>
</html>

