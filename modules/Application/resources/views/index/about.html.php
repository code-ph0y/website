<?php $view->extend('::base.html.php'); ?>

<?php $view['slots']->start('include_css'); ?>
<link href="<?=$view['assets']->getUrl('css/community.css');?>" rel="stylesheet">
<link href="<?=$view['assets']->getUrl('css/about.css');?>" rel="stylesheet">
<?php $view['slots']->stop(); ?>   

<?php $view['slots']->start('include_js_body'); ?>
<script type="text/javascript" src="<?=$view['assets']->getUrl('js/community.js');?>"></script>
<?php $view['slots']->stop(); ?>

<div class="about-page community-page content-box">
    
    <div class="breadcrumbs">
        <ul class=" clearfix">
            <li><a href="/">Home</a></li>
            <li><span class="divider">&rsaquo;</span></li>
            <li class="active">About</li>
        </ul>
    </div>

    <div class="content-container clearfix">

        <div class="left-side">
               <?=$view->render('Application:index:community_leftnav.html.php');?>
       	</div>
           
       	<div class="inner-content">
            
            <div class="desc">
                <h2>What is PPI?</h2>
                <p>Conceptually, PPI is a php framework that combines power and simplicity.</p>
                <p>Technically, PPI is a simple web framework which harnesses the power of Symfony2, ZendFramework2 and Doctrine2.</p>
            </div>
            
            <div class="desc">
                <h2>Design Goals</h2>
                <ul>
                    <li>Minimise the learning curve of using such powerful components.</li>
                    <li>Do not re-invent the wheel! Choose the best component for the job from an existing library and make it easily accessible for the developer.</li>
                    <li>Designed to be cloud compatible from the beginning.</li>
                    <li>To harness the capabilities of larger more complex frameworks and convey them in a more productive and approachable manner.</li>
                    <li>To give developers coming from frameworks such as CodeIgniter, Kohana, CakePHP a platform to step up and use much more powerful components while retaining the simplistic routes of those frameworks they've came from.</li>
                </ul>
            </div>
            
            <div class="desc">
                <h2>Key Aspects</h2>
                <ul>
                    <li>Fully PSR compliant. You can use all of your existing compatible PSR code in PPI.</li>
                    <li>Re-use of time/code invested in learning/using other frameworks.</li>
                    <li>Clean and simple.</li>
                    <li>Minimal and useful (non-intrusive)</li>
                    <li>Well documented.</li>
                    <li>Pragmatic but feature rich.</li>
                </ul>
            </div>
            
            <div class="desc">
                <h2>Advantages</h2>
                <ul>
                    <li>If you know Symfony2 or ZendFramework2 you already know what you're doing in PPI. Therefore all the time you've invested in learning these frameworks can be re-used in building PPI apps.</li>
                    <li>Knowledge you gain from using PPI will be invaluable to you out there in the wild-wild-web. It's teaching you how to use ZendFramework and Symfony and bits of Doctrine at the same time</li>
                </ul>
            </div>
               
        </div>
    </div>
</div>