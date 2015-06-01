<?php
/**
 * The default template for displaying content Quote
 *
 * @package Mokka
 * @since Mokka 1.0
 */
?>
<!-- ============= Quote post format ============= -->
<div class="quote-wrapper">
    <blockquote>
        <h2><?php the_content(); ?></h2>
        <em>— <?php the_field('quote_author'); ?></em>
    </blockquote>
</div>