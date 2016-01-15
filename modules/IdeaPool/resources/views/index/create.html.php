<?php $view->extend('::base.html.php'); ?>

<?php $view['slots']->start('include_css') ?>
<link href="<?=$view['assets']->getUrl('css/community.css');?>" rel="stylesheet">
<?php $view['slots']->stop(); ?>

<?php $view['slots']->start('include_js_body') ?>
<script src="<?php echo $view['assets']->getUrl('js/libs/jquery.validationEngine-en.js') ?>"></script>
<script src="<?php echo $view['assets']->getUrl('js/libs/jquery.validationEngine.js') ?>"></script>
<script src="<?php echo $view['assets']->getUrl('ideas/js/create.js') ?>"></script>
<?php $view['slots']->stop(); ?>

<div class="community-page ideas-page">
    <div class="left-side">
        <?=$view->render('Application:index:community_leftnav.html.php');?>
    </div>

    <div class="content-box">

        <ul class="breadcrumb">
            <li><a href="#">Home</a> <span class="divider">/</span> <a href="<?=$view['router']->generate('List_Ideas');?>">Ideas</a> <span class="divider">/</span></li>
            <li class="active">Create Your Idea</li>
        </ul>

        <?php if(isset($errors) && !empty($errors)): ?>
        <div class="alert alert-error">
            <?php foreach($errors as $error): ?>
            <p><?=$view->escape($error);?></p>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <form action="<?=$view['router']->generate('Idea_Create_Submit');?>" method="post" class="form-horizontal">

            <legend>Create Your Idea</legend>

            <div class="control-group">
                <label class="control-label" for="formName">Name <em>*</em></label>
                <div class="controls">
                    <input type="text" class="input-xlarge validate[required]" id="formName" name="formName">
                    <span rel="formName" class="help-inline"></span>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="formDesc">Description <em>*</em></label>
                <div class="controls">
                    <textarea class="input-xlarge validate[required]" id="formDesc" name="formDesc"></textarea>
                    <span rel="formDesc" class="help-inline"></span>
                </div>
            </div>

            <div class="form-actions buttons-area">
                <input type="submit" class="btn btn-large" value="Create">
            </div>

        </form>
     </div>

</div>