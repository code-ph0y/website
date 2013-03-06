<?php $view->extend('::base.html.php'); ?>

<?php $view['slots']->start('include_css'); ?>
<link href="<?=$view['assets']->getUrl('css/community.css');?>" rel="stylesheet">
<?php $view['slots']->stop(); ?>

<?php $view['slots']->start('include_js_body'); ?>
<script type="text/javascript" src="<?=$view['assets']->getUrl('js/home.js');?>"></script>
<?php $view['slots']->stop(); ?>

<div class="community-page ideas-page">
    <div class="left-side">
        <?=$view->render('Application:index:community_leftnav.html.php');?>
    </div>

    <div class="content-box">
        <ul class="breadcrumb">
            <li><a href="#">Home</a> <span class="divider">/</span> <a href="<?=$view['router']->generate('List_Ideas');?>">Ideas</a> <span class="divider">/</span></li>
            <li class="active"><?=$idea->getName();?></li>
        </ul>

        <h1>Idea: <?=$idea->getName();?></h1>
        <div>

        </div>
        <div>
            <p><?=nl2br($idea->getDescription());?></p>
        </div>
    </div>
    <div class="clear"></div>
</div>

