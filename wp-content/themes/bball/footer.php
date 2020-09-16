</div>
<footer>
    <?php wp_nav_menu([
        'theme_location' => 'footer',
        'container' => false,
        'menu_class' => 'navbar-nav mr-auto'
        ]) ?>
</footer>
<div>
    <?= get_option('bball_test_option') ?>
</div>
<?php wp_footer(); ?>
</body>

</html>