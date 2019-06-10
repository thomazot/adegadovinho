<?php
$absolute_path = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
$wp_load = $absolute_path[0] . 'wp-load.php';
require_once($wp_load);

/**
 *  Do stuff like connect to WP database and grab user set values
 */

header('Content-type: text/css');
header('Cache-control: must-revalidate');

$colorOne = get_theme_mod('colors_primary');
$bgFooter = get_theme_mod('footer_bg');
?>

.ct-bg-primary {
    background: <?php echo $colorOne; ?>;
}

.ct-color-primary {
    color: <?php echo $colorOne; ?>;
}

/* Custom Color */
[data-scrolling=true] .header {
    box-shadow: 0 1px 0 <?php echo $colorOne; ?>, 0 0 10px rgba(0, 0, 0, .5)
}

.menu__item--0 > .menu__link {
    color: <?php echo $colorOne; ?>
}

.header__search-button svg,
.header__menu-open svg,
.header__social svg, 
.header__cart svg {
    color: <?php echo $colorOne; ?>;
    fill: <?php echo $colorOne; ?>;
}

.slick-arrow {
    background: <?php echo $colorOne; ?>;
}

.footer__title,
.widget__title,
.widget .title--h2 {
    color: <?php echo $colorOne; ?>;
}

.page-header {
    background: <?php echo $colorOne; ?>;
}

.footer__social svg {
    fill: <?php echo $colorOne; ?>;
    color: <?php echo $colorOne; ?>;
}

.page-header .page-title {
    color: #fff;
}
.post-list__title,
.comment__title,
.pagination-infinite__more {
    color: <?php echo $colorOne; ?>;
    border: solid 1px <?php echo $colorOne; ?>;
}
.breadcrumb__sep {
    background: <?php echo $colorOne; ?>;
}
.breadcrumb__current {
    color: <?php echo $colorOne; ?>;
}

.form-submit:before {
    background: <?php echo $colorOne; ?>;
}

.contact__content {
    background: <?php echo $colorOne; ?>;
}

.contact [type=submit] {
    color: <?php echo $colorOne; ?>
}

.footer {
    background-image: url("<?php echo $bgFooter; ?>");
}

@media screen and (max-width: 991px) {
    .ct-bg-primary--mb {
        background: <?php echo $colorOne; ?>;       
    }

    .ct-color-primary--mb {
        color: <?php echo $colorOne; ?>;       
    }

    .header__menu .menu__container {
        background: <?php echo $colorOne; ?>;
    }
}