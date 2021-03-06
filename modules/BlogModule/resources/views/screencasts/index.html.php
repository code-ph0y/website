<?php $view->extend('::base.html.php'); ?>
<?php $view['slots']->set('title', 'PPI Framework - Blog');?>

<?php $view['slots']->start('include_css'); ?>
<link href="<?=$view['assets']->getUrl('blog/css/blog.css');?>" rel="stylesheet">
<?php $view['slots']->stop(); ?>

<?php $view['slots']->start('include_js_body'); ?>
<script type="text/javascript" src="<?=$view['assets']->getUrl('js/libs/mustache.js');?>"></script>
<script type="text/javascript" src="<?=$view['assets']->getUrl('blog/js/blog.js');?>"></script>
<?php $view['slots']->stop(); ?>

<div id="blog-index" class="clearfix">
	
    
    <div style="display: none"><img src="<?=$view['assets']->getUrl('images/opengraph.png');?>" alt="PPI Framework"></div>
    
	<div class="left-side">
		
		<?php
		foreach($posts as $post):
			$created = $post->getCreatedDate();
			$urlLink = $view['router']->generate('Screencasts_View', array('id' => $post->getID(), 'slug' => $post->getSlug()));
		?>
		
		<div class="post">
			<h1 class="post-title"><a href="<?=$urlLink;?>" title="<?=$post->getTitle();?>"><?=$post->getTitle();?></a></h1>
			<div class="post-thumbnail"></div>
			<div class="post-content"><?=$post->getDescription();?></div>
			
			<div class="post-meta">
				<a href="<?=$urlLink;?>" title="Watch Video" class="more-link">Watch Video &raquo;</a>
			</div>
			
			<div class="date-area">
				<div class="inner">
					<span><?=$created->format('M');?></span>
					<span class="day"><?=$created->format('j');?></span>
					<span><?=$created->format('Y');?></span>
				</div>
			</div>
			
		</div>
		<?php endforeach;?>
		
	</div>

	
</div>