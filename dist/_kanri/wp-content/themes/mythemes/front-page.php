<?php include_once $_SERVER['DOCUMENT_ROOT']."/_config/nav.php"; ?>
<!DOCTTPE html>
<html lang="ja">

	<head>
		<?php echo $HTML['pageGoogleA']; ?>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="format-detection" content="telephone=no">
		<meta name="viewport" content="width=device-width">
		<title><?= $HTML['pageTitle']['top']; ?></title>
		<meta name="description" content="<?= $HTML['pageTitle']['top']; ?>">
		<?php
		  echo $HTML['ogp'];
		  echo $HTML['favicon'];
		  echo $HTML['schema'];
		  echo $HTML['pageHeaderJsCss'];
		?>
		<link rel="stylesheet" href="<?= $css; ?>home.css">
		<?php echo $HTML['loading']; ?>
		<?php echo $HTML['pageGoogleB']; ?>
	</head>

	<body id="pagebody" class="">
		<?php echo $HTML['pageGoogleC']; ?>

		<div class="wrapper">
			<?php include_once $_SERVER['DOCUMENT_ROOT']."/_config/header.php" ?>
			<main id="pageMain">

				<!-- main contents -->

			</main>
			<?php include_once $_SERVER['DOCUMENT_ROOT']."/_config/footer.php" ?>
		</div>

		<?php echo $HTML['pageFooterJs']; ?>
		<script src="<?= $js ?>home.js" defer></script>
		<?php echo $HTML['loadingJS']; ?>
		<script>
			document.addEventListener("DOMContentLoaded", function() {});
		</script>
	</body>
</html>

