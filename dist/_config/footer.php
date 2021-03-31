<footer id="pageFooter" class="footer">
	<div class="footer__first">
		<div class="footer-inner">
			<div class="footer__first__contact">
				<p class="footer-headline" data-san="headline">
					<span>Contact</span></p>
				<div class="footer__first__contact-contents">
					<div class="footer__first__contact-subline">
					<?php if(OHMIYA_LA == ""){ ?>
						<p>大宮 寛久 教授</p>
					<?php }else{ ?>
						<p>Prof. Dr. Hirohisa Ohmiya</p>
					<?php } ?>
						<p>Email：<a style="color:#fff;" href="mailto:ohmiya@p.kanazawa-u.ac.jp">ohmiya@p.kanazawa-u.ac.jp</a></p>
					</div>
				</div>
			</div>
			<div class="footer__first__access">
				<p class="footer-headline" data-san="headline"><span>Access</span></p>
				<div class="footer__first__access-contents">
					<div class="footer__first__access-subline">
					<?php if(OHMIYA_LA == ""){ ?>
						<p>金沢大学 医薬保健研究域 薬学系 精密分子構築学</p>
					<?php }else{ ?>
						<p>Division of Pharmaceutical Sciences</p>
						<p>Graduate School of Medical Sciences</p>
						<p>Kanazawa University</p>
					<?php } ?>
					</div>
					<div class="footer__first__access-flex">
						<div>
					<?php if(OHMIYA_LA == ""){ ?>
							<p>〒920-1192 石川県金沢市角間町</p>
							<p>金沢大学 角間キャンパス</p>
					<?php }else{ ?>
							<p>Kakuma-machi, Kanazawa <br>920-1192, Japan</p>
					<?php } ?>
						</div>
						<a href="<?= $pas; ?>access/" class="footer__first__btn">View more</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="footer__center">
		<div class="footer-inner">
			<div class="footer__center__info">
				<?php if(OHMIYA_LA == ""){ ?>
				<img src="<?= $img; ?>common/logo.svg" alt="" class="footer__center__info-logo">
				<?php }else{ ?>
				<img src="<?= $img; ?>common/logo_en.svg" alt="" class="footer__center__info-logo">
				<?php } ?>
				
				<div class="footer__center__info-sns">
					<div>Follow us:</div>
					<a href="//twitter.com/OhmiyaLab" target="_blank" class="footer__center__info-link">Twitter</a>
					<a href="//www.instagram.com/ohmiyalab/" target="_blank" class="footer__center__info-link">Istagram</a>
					
				</div>
			</div>
			<ul class="footer__center__list">
<?php $args = array(
        'posts_per_page'   => 4,
        // 'orderby'          => 'date', 
        // 'order'            => 'DESC',
        'post_type' => 'banner',  //カスタム投稿タイプ名
          );
$my_query = new WP_Query($args);
if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();
?>
 <li class="footer__center__item"><a href="<?= get_field('link'); ?>" target="_blank"><img src="<?= get_field('image'); ?>" alt="<?php the_title(); ?>"></a></li>
<?php endwhile; endif; wp_reset_postdata(); ?>
			</ul>
		</div>
	</div>
	<div class="footer__last">
		<div class="footer-inner">
			<small class="footer__copy">&copy; Ohmiya Lab all rights reserved.</small>
		</div>
	</div>

</footer>
