<?php
/* @var $model Export */

$this->breadcrumbs = [
	Yii::t('UploadModule.common', 'File manager') => ['/upload/uploadBackend/index'],
	Yii::t('UploadModule.common', 'Create'),
];

$this->pageTitle = Yii::t('UploadModule.common', 'Files manager - creating');

$this->menu = [
	['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('UploadModule.common', 'List files'), 'url' => ['/upload/uploadBackend/index']],

//	['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('UploadModule.common', 'Manage export lists'), 'url' => ['/yml/exportBackend/index']],
//	['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('UploadModule.common', 'Create export list'), 'url' => ['/yml/exportBackend/create']],
];
?>
<div class="page-header">
    <h1>
		<?= Yii::t('UploadModule.common', 'File manager'); ?>
        <small><?= Yii::t('UploadModule.common', 'creating'); ?></small>
    </h1>
</div>

<?= $this->renderPartial('_form', ['model' => $model]); ?>
