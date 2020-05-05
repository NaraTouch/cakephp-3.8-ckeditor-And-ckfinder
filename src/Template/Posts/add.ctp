<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Posts'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="posts form large-9 medium-8 columns content">
    <?= $this->Form->create($post) ?>
    <fieldset>
        <legend><?= __('Add Post') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('contents');
			echo $this->form->input('newsContent', [
				'label' => false,
				'size'  => false,
				'div' => false,
				'class' => $ckeditorClass,
//				'id' => 'ckeditor'
				]
			);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

<script type="text/javascript">
	CKEDITOR.plugins.addExternal( 'abbr', '/myplugins/abbr/', 'plugin.js' );
	CKEDITOR.replace('newsContent',
	{
		filebrowserBrowseUrl: '/cakephp-3.8-ckeditor-And-ckfinder/webroot/js/ckfinder/ckfinder.html',
		filebrowserImageBrowseUrl: '/cakephp-3.8-ckeditor-And-ckfinder/webroot/js/ckfinder/ckfinder.html?type=Images',
		filebrowserUploadUrl: '/cakephp-3.8-ckeditor-And-ckfinder/webroot/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&currentFolder=/archive/',
		filebrowserImageUploadUrl: '/cakephp-3.8-ckeditor-And-ckfinder/webroot/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images&currentFolder=/cars/'
	});

</script>
