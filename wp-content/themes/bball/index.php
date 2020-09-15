<?php get_header(); ?>

    <?php if (have_posts()): ?>
        <div class="row">
          <?php while (have_posts()):
              the_post(); ?>
            <div class="col-sm-4">
              <div class="card" style="width: 18rem;">
                <?php the_post_thumbnail('card_thumbnail', [
                    'class' => 'card-img-top',
                    'alt' => '',
                    'style' => 'height: auto;',
                ]); ?>
                <div class="card-body">
                  <h5 class="card-title"><?php the_title(); ?></h5>
                  <?php the_category(' '); ?>
                  <p class="card-text"><?php the_excerpt(); ?></p>
                  <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read more</a>
                </div>
              </div>
            </div>
          <?php
          endwhile; ?>

</div>

<!-- pagination  -->
<?php lejee_pagination() ?>


    <?php else: ?>
        <h1>pas d'article</h1>

    <?php endif; ?>


<?php get_footer(); ?>
