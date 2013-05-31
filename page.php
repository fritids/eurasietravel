<?php get_header(); ?>

<!-- This header is use for all page, exclude homepage -->
<?php include 'includes/headers-otherpage.php' ?>

<!--Other Page-->
<div id="otherpage">
    <div class="inner-wrap">
    	
    	<!--Col 1-->
        <?php get_sidebar(); ?>
        <!--End Col 1-->
        
        <!--Col 1-->
        <div id="c2">
            <div class="page-detail">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div <?php post_class() ?> class="post" id="post-<?php the_ID(); ?>">
            <h2 id="title"><?php the_title(); ?></h2>
                <div class="entry">
                    <?php the_content(); ?>                    
                </div>
            </div>
            <?php endwhile; endif; ?>
            </div>
            <!--End Tour Detail-->        
            
        </div>
        <!--End Col 2-->
        
    </div>
    <!--End Wrap-->
</div>    
<!--End Other Page-->

<?php get_footer(); ?>