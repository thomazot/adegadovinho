<?php
    if(!$searchPlaceholder)  $searchPlaceholder = 'Busque por um ou mais produtos';
?>
<form id="search-form" class="search-form" method="get" action="<?php echo home_url('/'); ?>">
    <input type="text" class="search-form__input" name="s" placeholder="<?php echo $searchPlaceholder; ?>" value="<?php the_search_query(); ?>">
    <button class="search-form__button ct-bg-primary" type="submit">Buscar</button>
</form>