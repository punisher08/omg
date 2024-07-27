<?php get_header(); ?>
<main class="main entry-content">
	<?php
	global $post;
	if($post->post_type == 'blog' || $post->post_type == 'post'){
		require_once get_stylesheet_directory() .'/blog/blog.php';
	}else{
		the_content();
	}
	?>
</main>
<?php
get_footer();
