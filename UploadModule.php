<?php

class UploadModule extends \yupe\components\WebModule
{
	public $pathUpload;

	public function getVersion()
	{
		return '1.0';
	}

	public function getCategory()
	{
		return 'Контент';
	}

	public function getName()
	{
		return 'Управление файлами';
	}

	/**
	 * @return string
	 */
	public function getDescription()
	{
		return 'Управление файлами медиа';
	}

	public function getAuthor()
	{
		return 'small_jedi';
	}

	public function getIcon()
	{
		return 'fa fa-fw fa-folder';
	}

	public function getNavigation()
	{
		return [
			[
				'icon' => 'fa fa-fw fa-folder-plus',
				'label' => 'Добавить файл',
				'url' => ['/upload/uploadBackend/create']
			],
		];
	}

	public function getAdminPageLink()
	{
		return '/upload/uploadBackend/index';
	}

	public function getPathUpload()
	{
		return Yii::getPathOfAlias('webroot') . '/uploads';
	}

//	public function getAuthItems()
//	{
//		return [
//			[
//				'type' => AuthItem::TYPE_TASK,
//				'name' => 'Upload.ExportBackend.Management',
//				'description' => Yii::t('YmlModule.default', 'Manage export lists'),
//				'items' => [
//					[
//						'type' => AuthItem::TYPE_OPERATION,
//						'name' => 'Upload.ExportBackend.Index',
//						'description' => Yii::t('YmlModule.default', 'Export lists'),
//					],
//					[
//						'type' => AuthItem::TYPE_OPERATION,
//						'name' => 'Upload.ExportBackend.Create',
//						'description' => Yii::t('YmlModule.default', 'Create export list'),
//					],
//					[
//						'type' => AuthItem::TYPE_OPERATION,
//						'name' => 'Upload.ExportBackend.Update',
//						'description' => Yii::t('YmlModule.default', 'Update export list'),
//					],
//					[
//						'type' => AuthItem::TYPE_OPERATION,
//						'name' => 'Upload.ExportBackend.View',
//						'description' => Yii::t('YmlModule.default', 'View export list'),
//					],
//					[
//						'type' => AuthItem::TYPE_OPERATION,
//						'name' => 'Upload.ExportBackend.Delete',
//						'description' => Yii::t('YmlModule.default', 'Delete export list'),
//					],
//				],
//			],
//		];
//	}

	public function init()
	{
		$this->setImport(
			[
				'upload.models.*',
				'upload.helpers.*',
			]
		);

		parent::init();
	}
}