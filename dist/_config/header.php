<header id="pageHeader" class="header">

	<div class="header-inner">
		<h1 class="header__logo">
			<a href="<?= $pas; ?>">
				<?php if(OHMIYA_LA == ""){ ?>
				<img src="<?= $img; ?>common/logo.svg" alt="">
				<?php }else{ ?>
				<img src="<?= $img; ?>common/logo_en.svg" alt="">
				<?php } ?>
			</a>
		</h1>

		<button type="button" id="js-buttonHamburger" class="c-button p-hamburger" aria-controls="global-nav" aria-expanded="false" role="button" data-micromodal-trigger="header_nav">
			<span class="p-hamburger__line">
				<span class="u-visuallyHidden">
					メニューを開閉する
				</span>
			</span>
		</button>

		<div id="header_nav" class="header__nav" aria-hidden="true">
			<nav class="header__inner" tabindex="-1">
				<ul class="header__nav__list">
					<li class="header__nav__list-item"><a href="<?= $pas; ?>about/">About</a></li>
					<li class="header__nav__list-item"><a href="<?= $pas; ?>research/">Research</a></li>
					<li class="header__nav__list-item"><a href="<?= $pas; ?>members/">Members</a></li>
					<li class="header__nav__list-item"><a href="<?= $pas; ?>publication/ohmiya/">Publication</a></li>
					<?php if(OHMIYA_LA == ""){ ?>
					<li class="header__nav__list-item"><a href="<?= $pas; ?>presentation/">Presentation</a></li>
					<?php } ?>
					<li class="header__nav__list-item"><a href="<?= $pas; ?>news/">News</a></li>
					<li class="header__nav__list-item"><a href="<?= $pas; ?>access/">Access</a></li>
				</ul>
			</nav>
		</div>

		<div class="header__lang">
			<a href="//seimitsu.w3.kanazawa-u.ac.jp/" class="header__lang__link<?php if(OHMIYA_LA == ""){ ?> on<?php } ?>">Ja</a>
			<a href="//seimitsu.w3.kanazawa-u.ac.jp/eng/" class="header__lang__link<?php if(OHMIYA_LA == "en"){ ?> on<?php } ?>">En</a>
		</div>

	</div>

</header>


<script>

</script>
