<?php get_header(); ?>

<!-- This header is use for all page, exclude homepage -->
<?php include 'includes/headers-otherpage.php' ?>

<!--Other Page-->
<div id="otherpage">
    <div class="inner-wrap">
    	
    	<!--Col 1-->
        <?php get_sidebar('pages'); ?>
        <!--End Col 1-->
        
        <!--Col 1-->
        <div id="c2">
            <div class="page-detail">
            <?php if (have_posts()) : ?>

            <h2 id="title">Search Results</h2>
    
            <?php while (have_posts()) : the_post(); ?>
    
                <div <?php post_class() ?>>
                    <h3 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h3>
                <?php the_excerpt() ?>
                <a class="readmore inline" href="<?php the_permalink() ?>">Read more >></a>
                </div>
    
            <?php endwhile; ?>
    
            <div class="navigation">
                <div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
                <div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
            </div>
    
        <?php else : ?>
    
            <h2 id="title">No posts found</h2>
            <h3>Try a different search?</h3>
    
        <?php endif; ?>
            </div>
            <!--End Tour Detail-->        
            
        </div>
        <!--End Col 2-->
        
    </div>
    <!--End Wrap-->
</div>    
<!--End Other Page-->

<?php get_footer(); ?>