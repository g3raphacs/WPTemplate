<form class="form-inline my-2 my-lg-0" action= "<?php echo esc_url(home_url('/')); ?>">
    <input class="form-control mr-sm-2" name="s" type="search" placeholder="Rechercher" aria-label="Search" value="<?php echo get_search_query();?>">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
</form>