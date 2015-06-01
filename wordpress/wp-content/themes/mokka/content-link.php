<?php
/**
 * The default template for displaying content Link
 *
 * @package Mokka
 * @since Mokka 1.0
 */
?>
<!-- ============= link post format ============= -->

<?php if ( get_field( 'format_link' ) ):?>
<div class="link-wrapper">
    <a href="<?php the_field( 'format_link' ); ?>" target="_blank"><?php the_field( 'format_link' ); ?></a>
</div>
<?php endif; ?>
