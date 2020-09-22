<div class="card" style="width: 18rem;">
    <?php the_post_thumbnail('card_thumbnail', [
        'class' => 'card-img-top',
        'alt' => '',
        'style' => 'height: auto;',
    ]); ?>
    <div class="card-body">
        <h5 class="card-title"><?php the_title(); ?></h5>
        <?php the_category(' '); ?>
        <h6><?php the_terms(get_the_ID(), 'equipe') ?></h6>
        <p class="card-text"><?php the_excerpt(); ?></p>
        <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read more</a>
    </div>
</div>