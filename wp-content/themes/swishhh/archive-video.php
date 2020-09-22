<?php get_header(); ?>

<h1>Vidéos</h1>

<?php if (have_posts()) : ?>
  <div class="row">
    <?php while (have_posts()) :
      the_post(); ?>
      <div class="col-sm-4">
        <?php get_template_part('parts/card', 'post') ?>
      </div>
    <?php
    endwhile; ?>

  </div>

  <!-- pagination  -->
  <?php lejee_pagination() ?>


<?php else : ?>
  <h1>pas d'article</h1>

<?php endif; ?>


<?php get_footer(); ?>