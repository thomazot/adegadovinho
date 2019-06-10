<?php 

function zotPagination( $query=null)
{
    global $wp_query;
    $query = $query ? $query : $wp_query;
    $big = 999999999;
    $max_num_pages = $query->max_num_pages;

    $paginate = paginate_links(
        array(
            'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'type'      => 'array',
            'total'     => $max_num_pages,
            'format'    => '?paged=%#%',
            'current'   => max( 1, get_query_var('paged') ),
            'prev_text' => '<i class="fas fa-chevron-left"></i>',
            'next_text' => '<i class="fas fa-chevron-right"></i>',
        )
    );
    if ( $max_num_pages > 1 && $paginate ) {
        echo '<div class="pagination-infinite">';
        echo '<button class="pagination-infinite__more" type="button">Carregar mais posts</button>';
        echo '<ul class="pagination-infinite__list pagination-infinite--lg">';
        foreach ( $paginate as $page ) {
            echo '<li class="pagination-infinite__item">' . $page . '</li>';
        }
        echo '</ul>';
        echo '</div>';
    }
}