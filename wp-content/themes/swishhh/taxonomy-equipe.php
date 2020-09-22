<?php get_header(); ?>


<?php $equipes = get_terms(['taxonomy' => 'equipe']); ?>
<?php if (is_array($equipes)): ?>
  <ul class="nav nav-pills my-4">
    <?php foreach ($equipes as $equipe) : ?>
      <li class="nav-item">
        <a href="<?php echo get_term_link($equipe) ?>" class="nav-link <?php echo is_tax('equipe', $equipe->term_id) ? "active" : '' ?>"><?php echo $equipe->name ?></a>
      </li>
      <?php endforeach ?>
    </ul>
    <?php endif ?>

<h1>L'actu des <?php echo get_queried_object()->name; ?></h1>

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