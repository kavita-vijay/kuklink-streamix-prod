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

    <?php if (!empty($ad_captcha_above)) : ?>
        <div class="banner banner-captcha">
            <div class="banner-inner">
                <?= $ad_captcha_above; ?>
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


    <?php
    $col_num = 6;
    $table_row = 'is-table-row';
    $hidden_class = '';
    if (empty($link->image) && empty($link->title) && empty($link->description)) {
        $col_num = 12;
        $table_row = '';
        $hidden_class = 'hidden';
    }
    if (get_option('short_link_content', 'no') === 'no') {
        $col_num = 12;
        $table_row = '';
        $hidden_class = 'hidden';
    }
    ?>

<?php if (get_option('short_link_content', 'no') === 'yes') : ?>
                <div class="link-details">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <img class="link-image" src="<?= h($link->image) ?>"/>
                            <h4 class="link-title"><?= h($link->title) ?></h4>
                            
                        </div>
                    </div>
                </div>
            <?php endif; ?>
    <div class="row <?= $table_row ?>">
        <div class="col-md-<?= $col_num ?> <?= $hidden_class ?>">
            
        </div>
        <div class="col-md-<?= $col_num ?>">

            <?= $this->Flash->render() ?>

            <?= $this->Form->create(null, ['id' => 'link-view']); ?>

            

            <?= $this->Form->hidden('ref', ['value' => strtolower(env('HTTP_REFERER'))]); ?>

            <?= $this->Form->hidden('f_n', ['value' => 'slc']); ?>

            <div class="form-group text-center">
                <div id="captchaShortlink" style="display: inline-block;"></div>
            </div>
            
            <div>
    <?php if (!empty($ad_captcha_above)) : ?>
        <div class="banner banner-captcha">
            <div class="banner-inner">
                <?= $ad_captcha_above; ?>
            </div>
        </div>
    <?php endif; ?>
    
    
   



	    <?php if (!empty($ad_captcha_above)) : ?>
        <div class="banner banner-captcha">
            <div class="banner-inner">
                <?= $ad_captcha_above; ?>
            </div>
        </div>
    <?php endif; ?>
    



	
				</div>
				
				
		

            <?= $this->Form->button(__('Generate Video link'), [
                'class' => 'btn btn-primary btn-captcha',
                'id' => 'invisibleCaptchaShortlink',
            ]); ?>

            <?= $this->Form->end() ?>
        </div>
    </div>


    <?php if (!empty($ad_captcha_below)) : ?>
        <div class="banner banner-captcha">
            <div class="banner-inner">
                <?= $ad_captcha_below; ?>
            </div>
        </div>
    <?php endif; ?>

</div>

