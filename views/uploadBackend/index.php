<?php
/* @var $model Export */
$module = Yii::app()->getModule('upload');
$this->breadcrumbs = [
	Yii::t('UploadModule.common', 'File manager') => ['/upload/uploadBackend/index'],
	Yii::t('UploadModule.common', 'Manage'),
];

$this->pageTitle = Yii::t('UploadModule.common', 'File manager - manage');

$this->menu = [
	['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('UploadModule.common', 'Add file'), 'url' => ['/upload/uploadBackend/create']],
//	['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('UploadModule.common', 'Create export list'), 'url' => ['/yml/exportBackend/create']],
];
?>

<?php if ($files): ?>
    <ul style="list-style: none; display: flex; flex-direction: row; flex-wrap:wrap;">
		<?php foreach ($files as $file): ?>
			<?php $file = new FileHelper($file); ?>
            <li style="margin: 5px;position:relative;">
                <a href="<?= $this->createUrl('/backend/upload/upload/delete/' . $file->getFileName()) ?>" style="cursor:pointer;position: absolute;top: 0;left: 0;display: block; background: #0a6aa1; padding: 0 5px; border-radius: 50%;">
                    <span style="color: white; font-weight: bold; font-size: 11px;">X</span>
                </a>
                <img width="100" src="<?= $file->getPath(); ?>">
                <p style="font-size: 1.2rem; padding: 4px 0; font-weight: bold;"><?= $file->getFileName(); ?></p>
            </li>
		<?php endforeach; ?>
    </ul>
<?php endif; ?>