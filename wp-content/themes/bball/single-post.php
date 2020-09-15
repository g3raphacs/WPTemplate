<?php get_header() ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <h1> <?php the_title() ?></h1>

        <?php if(get_post_meta(get_the_ID(), SponsoMetaBox::META_KEY,true) === '1'): ?>
            <h1>Cet article est sponsorisé</h1>
        <?php endif ?>
        
        <?php the_content() ?>

<?php endwhile;
endif; ?>


<?php get_footer() ?>