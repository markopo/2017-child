<?php
   $postId = get_the_ID();
   $isbn10 = get_field('isbn_10', $postId);
   $isbn13 = get_field('isbn-13', $postId);
   $amazon_link = get_field('amazon_link', $postId);
   $author = get_field('author', $postId);
   $publisher = get_field('publisher', $postId);
   $pages = get_field('pages', $postId);

   function book_title() {
        if ( is_single() ) {
            the_title( '<h1 class="entry-title">', '</h1>' );
        } elseif ( is_front_page() && is_home() ) {
            the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
        } else {
            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
        }
   }

?>



<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
    if ( is_sticky() && is_home() ) :
        echo twentyseventeen_get_svg( array( 'icon' => 'thumb-tack' ) );
    endif;
    ?>
    <header  class="entry-header">
        <?php if($amazon_link != false): ?>
        <a href="<?php echo $amazon_link; ?>">
        <?php endif; ?>

        <?php book_title(); ?>

        <?php if($amazon_link != false): ?>
        </a>
        <?php endif; ?>

        <?php if($author != false): ?>
        <p>By <?php echo $author; ?></p>
        <?php endif; ?>
    </header><!-- .entry-header -->

    <?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'twentyseventeen-featured-image' ); ?>
            </a>
        </div><!-- .post-thumbnail -->
    <?php endif; ?>

    <div class="entry-content">
        <?php
        /* translators: %s: Name of current post */
        the_content( sprintf(
            __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
            get_the_title()
        ) );

        wp_link_pages( array(
            'before'      => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
            'after'       => '</div>',
            'link_before' => '<span class="page-number">',
            'link_after'  => '</span>',
        ) );
        ?>
    </div><!-- .entry-content -->
    <div class="books-custom-fields" >
        <?php if($isbn10 != false): ?>
            <p class="book-custom-field" >ISBN-10: <?php echo $isbn10; ?></p>
        <?php endif; ?>

        <?php if($isbn13 != false): ?>
            <p class="book-custom-field" >ISBN-13: <?php echo $isbn13; ?></p>
        <?php endif; ?>

        <?php if($publisher != false): ?>
            <p class="book-custom-field">Publisher: <?php echo $publisher; ?></p>
        <?php endif; ?>

        <?php if($pages != false): ?>
            <p class="book-custom-field" >Pages: <?php echo $pages; ?></p>
        <?php endif; ?>
    </div>

    <?php
    if ( is_single() ) {
        twentyseventeen_entry_footer();
    }
    ?>

</article><!-- #post-## -->
