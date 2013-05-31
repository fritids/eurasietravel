<?php get_header(); ?>

<!-- This header is use for all page, exclude homepage -->
<?php include 'includes/headers-otherpage.php' ?>

<!--Other Page-->
<div id="otherpage">

<?php 
$catid = get_query_var('cat');
$cat = &get_category($catid);
$parent = $cat->category_parent;
?>    
    
    <div class="inner-wrap">
    	
    	<!--Col 1-->
        <?php get_sidebar('pages'); ?>
        <!--End Col 1-->
        
        <!--Col 1-->
        <div id="c2">
            <div class="page-detail"> 
            <h2><?php echo get_cat_name($catid) ?></h2>
            
            <?php if(have_posts()) : while(have_posts()) : the_post(); ?>

            <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
            
            <h3 class="clearleft"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>            
            
            <?php $width = get_option('wp_postimagethumbnail_width'); ?>
            <?php $height = get_option('wp_postimagethumbnail_height'); ?>
            
            <?php
            if ( has_post_thumbnail() ) {
                the_post_thumbnail(array($width, $height));
            }
            ?>
            
            <?php the_excerpt(); ?>
            
            <a class="readmore inline" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read More >></a>
            </div><!-- end post -->
            
            <?php endwhile ?>
            
            <div id="posts_navigation">
            <span id="nextlink"><?php next_posts_link('&laquo; Older Entries') ?></span>
            <span id="previouslink"><?php previous_posts_link('Newer Entries &raquo;') ?></span>
            </div>
            
            
            <?php else : ?>
            <h2 class="center">Not Found</h2>
            <p class="center">Sorry, but you are looking for something that isn't here.</p>            
            <?php endif ?>
            </div>
            <!--End Tour Detail-->        
            
        </div>
        <!--End Col 2-->
        
    </div>
    <!--End Wrap-->
</div>    
<!--End Other Page-->

<?php get_footer(); ?>