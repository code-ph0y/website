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
            <li><a href="#">Home</a> <span class="divider">/</span></li>
            <li class="active">Ideas</li>
        </ul>

        <p>
            <a href="<?=$view['router']->generate('Idea_Create'); ?>" class="btn btn-large">Create Idea</a>
        </p>

        <h1>Ideas</h1>
        <div class="ideas">
            <?php foreach($ideas as $idea): ?>
            <div class="idea clearfix">
                <div class="vote">
                    <div class="up">
                         <a href="<?=$view['router']->generate('Idea_Vote_UpDown', array('id' => $idea->getId(), 'dir'=>'up')); ?>" ><img src="<?=$view['assets']->getUrl('images/arrow_up.png');?>" /></a>
                    </div>
                    <div class="num"><?=$idea->getVoteCount(); ?></div>
                    <div class="down">
                        <a href="<?=$view['router']->generate('Idea_Vote_UpDown', array('id' => $idea->getId(), 'dir'=>'down')); ?>" ><img src="<?=$view['assets']->getUrl('images/arrow_down.png');?>" /></a>
                    </div>
                </div>
                <div class="idea_content">
                    <p class="name"><a href="<?=$view['router']->generate('View_Idea', array('id' => $idea->getId()));?>"><?= $idea->getName();?></a></p>
                    <p class="description"><?= $idea->getDescription();  ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="clear"></div>
</div>
