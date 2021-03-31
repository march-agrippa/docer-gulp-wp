<!-- start get_sidebar(); ==================================== -->
      <h2>カテゴリー</h2>
      <ul>
            <?php wp_list_categories('title_li='); ?>
      </ul>

      <h2>最近の投稿</h2>
      <ul>
            <?php query_posts($query_string . 'post_type=post&posts_per_page=5&paged='.$paged); ?>
            <?php if(have_posts()): while(have_posts()): the_post(); ?>
            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            <?php endwhile; endif; ?>
      </ul>

      <h2>月別</h2>
      <ul>
            <?php wp_get_archives('type=monthly&limit=12'); ?>
      </ul>
<!-- end   get_sidebar(); =============================== -->