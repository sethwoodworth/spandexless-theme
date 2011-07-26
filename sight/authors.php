<?php
// Template Name: Authors List
get_header(); ?>

<?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>

        <div class="entry">
            <div <?php post_class('single clear'); ?> id="post_<?php the_ID(); ?>">
                <div class="post-meta">
                    <h1><?php the_title(); ?></h1>
                   
                    
                </div>
                <div class="post-content"><?php the_content(); ?>



	<style type='text/css'>
	.author { margin-bottom: 80px; }
	.author h3 { margin-bottom: 10px; }
	.author .description { background: #FFEA97; width: 100%; overflow: hidden; }
	.author .description p1 { font: 14px/2 Helvetica, Arial, sans-serif; padding-top:5px; width: 70%; float: right; margin: 0; }
	.author .avatar { float: left; border: 5px solid #ccc; }
	.author p { font: 14px/2 Helvetica, Arial, sans-serif; background: #E7E7E7; padding: 5px; border: 1px dotted #ccc; }
	.author .connect { border-top: 1px solid #ccc; border-bottom: 1px solid #ccc; list-style: none; margin: 0; padding: 0; width: 100%; overflow: hidden; padding: 10px 0px; }
	.author .connect li { float: left; margin-right: 20px; }
	</style>
	
		<?php
		$authors = $wpdb->get_results('SELECT DISTINCT post_author FROM '.$wpdb->posts);
		foreach($authors as $author):
		if ( 3 == $author->post_author ) {
 		continue;
		}
		?>
		<div class='author' id='aut	hor-<?php the_author_meta('user_login', $author->post_author); ?>'>
			<h3><?php the_author_meta('display_name', $author->post_author); ?>, <?php the_author_meta('urole', $author->post_author); ?></h3>
		
			
			<?php if(get_the_author_meta('description', $author->post_author)): ?>
			<div class='description'>
				<?php echo get_avatar(get_the_author_meta('user_email', $author->post_author), 140); ?>
				<p1><?php the_author_meta('description', $author->post_author); ?></p1>
			</div>
			<?php endif; ?>
			
			<?php
			$recentPost = new WP_Query('author='.$author->post_author.'&showposts=1');
			while($recentPost->have_posts()): $recentPost->the_post();
			?>
			<p> <a href='http://www.spandexless.com/author/<?php the_author_meta('user_login', $author->post_author); ?>'><?php the_author_meta('user_firstname', $author->post_author); ?>'s Articles </a> </p>


			<?php endwhile; ?>
			<?php if(get_the_author_meta('twitter', $author->post_author) ||  get_the_author_meta('facebook', $author->post_author) || get_the_author_meta('linkedin', $author->post_author) || get_the_author_meta('digg', $author->post_author) || get_the_author_meta('flickr', $author->post_author)): ?>
			<ul class='connect'>
				<?php if(get_the_author_meta('website', $author->post_author)): ?>
				<li><a href='http://<?php the_author_meta('website', $author->post_author); ?>'>Website</a></li>
				<?php endif; ?>
				<?php if(get_the_author_meta('blog', $author->post_author)): ?>
				<li><a href='http://<?php the_author_meta('blog', $author->post_author); ?>'>Blog</a></li>
				<?php endif; ?>
				<?php if(get_the_author_meta('tumblr', $author->post_author)): ?>
				<li><a href='http://<?php the_author_meta('tumblr', $author->post_author); ?>.tumblr.com/'>Tumblr</a></li>
				<?php endif; ?>
				<?php if(get_the_author_meta('twitter', $author->post_author)): ?>
				<li><a href='http://twitter.com/<?php the_author_meta('twitter', $author->post_author); ?>'>Twitter</a></li>
				<?php endif; ?>
				<?php if(get_the_author_meta('facebook', $author->post_author)): ?>
				<li><a href='http://www.facebook.com/<?php the_author_meta('facebook', $author->post_author); ?>'>Facebook</a></li>
				<?php endif; ?>
				<?php if(get_the_author_meta('linkedin', $author->post_author)): ?>
				<li><a href='http://www.linkedin.com/in/<?php the_author_meta('linkedin', $author->post_author); ?>'>LinkedIn</a></li>
				<?php endif; ?>
				<?php if(get_the_author_meta('digg', $author->post_author)): ?>
				<li><a href='http://digg.com/users/<?php the_author_meta('digg', $author->post_author); ?>'>Digg</a></li>
				<?php endif; ?>
				<?php if(get_the_author_meta('reddit', $author->post_author)): ?>
				<li><a href='http://reddit.com/user/<?php the_author_meta('reddit', $author->post_author); ?>'>Reddit</a></li>
				<?php endif; ?>

				<?php if(get_the_author_meta('flickr', $author->post_author)): ?>
				<li><a href='http://www.flickr.com/photos/<?php the_author_meta('flickr', $author->post_author); ?>/'>Flickr</a></li>
			<?php endif; ?>
			</ul>
			<?php endif; ?>
		</div>
		<?php endforeach; ?>
	</div>
                <div class="post-footer"><?php the_tags(__('<strong>Tags: </strong>'), ', '); ?></div>
            </div>
        </div>

        <?php endwhile; ?>
    <?php endif; ?>
<?php get_footer(); ?>
