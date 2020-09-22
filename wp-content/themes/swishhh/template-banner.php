
<!--
Template Name: Page avec bannière
Template Post Type: page, post
-->


<?php get_header() ?>
<h1>Ceci est la bannière</h1>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <h1> <?php the_title() ?></h1>
        <?php the_content() ?>

<?php endwhile;
endif; ?>


<?php get_footer() ?>