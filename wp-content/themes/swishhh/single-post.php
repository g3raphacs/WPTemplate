<?php get_header(); ?>

<?php if (have_posts()): ?>
    <?php while (have_posts()):
        the_post(); ?>
        <h1> <?php the_title(); ?></h1>

        <?php if (
            get_post_meta(get_the_ID(), SponsoMetaBox::META_KEY, true) === '1'
        ): ?>
            <h1>Cet article est sponsorisé</h1>
        <?php endif; ?>

        <?php the_content(); ?>

        <h2>Articles relatifs</h2>

        <div class="row">
        <?php
            //list 'equipe' terms for similar posts
                $equipes = get_the_terms( get_post(), 'equipe' );
                if( $equipes ) {
                    $equipe_terms = array();
                    foreach( $equipes as $term ) {
                        $equipe_terms[] = $term->term_id;
                    }

                    $query = new WP_Query([
                     'post__not_in' => [get_the_ID()],
                     'post_type' => 'post',
                     'posts_per_page' => 3,
                     'orderby' => 'rand',
                     'tax_query' => [
                        [
                            'taxonomy' => 'equipe',
                            'field' => 'term_id',
                            'terms' => $equipe_terms,
                        ]
                     ]
                     ]);
                }else{
                    $query = new WP_Query([
                        'post__not_in' => [get_the_ID()],
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                    ]);
                }
        while ($query->have_posts()):
            $query->the_post(); ?>
            <div class="col-sm-4">
                <?php get_template_part('parts/card', 'post'); ?>
            </div>

        <?php
        endwhile;
        wp_reset_postdata();
        ?>
        </div>

<?php endwhile;endif; ?>


<?php get_footer(); ?>
