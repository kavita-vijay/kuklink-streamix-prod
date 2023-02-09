<style type="text/css">
.stick-dt {
    width: 728px;
    position: fixed;
    bottom: 0px;
    text-align: center;
    z-index: 99999;
    left:0px;
    transform: translateX(50%);
}
.stick-mob {
    width: 100%;
    position: fixed;
    bottom: 0px;
    text-align: center;
z-index: 99999;
margin: 0px auto;
}

@media only screen and (min-width: 728px){
   .stick-dt{
      display: block;
   }
   .stick-mob{
      display: none;
   }
}

@media only screen and (max-width: 727px){
   .stick-dt{
      display: none;
   }
   .stick-mob{
      display: block;
   }
}
</style>

 
 
<?php
$this->assign('title', get_option('site_name'));
$this->assign('description', get_option('description'));
$this->assign('content_title', get_option('site_name'));
$this->assign('og_title', $link->title);
$this->assign('og_description', $link->description);
$this->assign('og_image', $link->image);
?>

<?php $this->start('scriptTop'); ?>
<script type="text/javascript">
  if (window.self !== window.top) {
    window.top.location.href = window.location.href;
  }
</script>
<?php $this->end(); ?>

<div class="box-main">
    <?php if (!empty($banner_728x90)) : ?>
        <div class="banner banner-728x90">
            <div class="banner-inner">
                <?= $banner_728x90; ?>
            </div>
        </div>
    <?php endif; ?>
    
    <?php if ($post): ?>
        <div class="blog-item">
            <div class="page-header">
                <h3>
                    <small><a href="<?= build_main_domain_url('/blog') ?>"><?= __('From Our Blog') ?>:</a>
                    </small> <?= h($post->title) ?></h3>
            </div>
            <div class="blog-content"><?= $post->description ?></div>
        </div>
    <?php endif; ?>
    
    
    
    
<?php if (get_option('short_link_content', 'no') === 'yes') : ?>
        <img class="link-image" src="<?= h($link->image) ?>"/>
         <iframe src="<?= h($link->url) ?>" class="get-link" style="height: 0.1px; width: 0.1px; position: relative;" title="Iframe Example"><div id="container-adxplay-cover" style="position: absolute; z-index: 99990; inset: 0px; background: transparent;"></div></iframe>
          
                    <h3 class="link-title"><?= h($link->title) ?></h3>
                    
                    
    <?php endif; ?>
   
   

   

<!--ADcode starts here-->


<!--adcode ends here-->   



    <?php
    $hidden_class = '';
    if (empty($link->image) && empty($link->title) && empty($link->description)) {
        $hidden_class = 'hidden';
    }
    ?>


 
    
    <!--Place ADx Play Ad Code Below-->



<!--Adcode ends here-->

    <?php if (!empty($banner_336x280)) : ?>
        <div class="banner banner-336x280">
            <div class="banner-inner">
                <?= $banner_336x280; ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="myTestAd" style="height: 5px; width: 5px; position: absolute;"></div>

</div>


<?=
$this->Form->create(null, [
    'url' => ['controller' => 'Links', 'action' => 'go', 'prefix' => false],
    'id' => 'go-link',
    'class' => 'hidden',
]);
?>

<?= $this->Form->hidden('ad_form_data', ['value' => $ad_form_data]); ?>
<?=
$this->Form->button(__('Submit'), [
    'id' => 'go-submit',
    'class' => 'hidden',
]);
?>


<?= $this->Form->end(); ?>

<?php if (get_option('enable_popup', 'yes') == 'yes' && $show_pop_ad) : ?>
    <?=
    $this->Form->create(null, [
        'url' => ['controller' => 'Links', 'action' => 'popad', 'prefix' => false],
        'target' => "_blank",
        'id' => 'go-popup',
        'class' => 'hidden',
    ]);
    ?>

    <?= $this->Form->hidden('pop_ad', ['value' => $pop_ad]); ?>

    <?= $this->Form->end(); ?>
<?php endif; ?>

<?php $this->start('scriptBottom'); ?>
<?php $this->end(); ?>
