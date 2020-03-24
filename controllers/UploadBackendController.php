<?php

class UploadBackendController extends yupe\components\controllers\BackController
{
	public function accessRules()
	{
		return [
			['allow', 'roles' => ['admin'],],
			['allow', 'actions' => ['index'], 'roles' => ['Upload.ExportBackend.Index'],],
			['allow', 'actions' => ['view'], 'roles' => ['Upload.ExportBackend.View'],],
			['allow', 'actions' => ['create'], 'roles' => ['Upload.ExportBackend.Create'],],
			['allow', 'actions' => ['update'], 'roles' => ['Upload.ExportBackend.Update'],],
			['allow', 'actions' => ['delete', 'multiaction'], 'roles' => ['Upload.ExportBackend.Delete'],],
			['deny',],
		];
	}

	public function actionIndex()
	{
		$module = Yii::app()->getModule('upload');
		$files = array();

		try {
			$__files = scandir($module->getPathUpload());

			foreach ($__files as $file) {

				// if file is .gitignore, .git, etc
				if (is_file($module->getPathUpload() . '/' . $file) && substr($file, 0, 1) == '.') {
					continue;
				}

				if (is_file($module->getPathUpload() . '/' . $file)) {
					$files[] = $file;
				}
			}

		} catch (Exception $exception) {

		}

		return $this->render('index', [
			'files' => $files
		]);
	}

	public function actionCreate()
	{
		$model = new UploadForm();

		if (Yii::app()->getRequest()->getIsPostRequest() && Yii::app()->getRequest()->getPost('UploadForm')) {
			$model->setAttributes(Yii::app()->getRequest()->getPost('UploadForm'));

			if ($model->save()) {
				Yii::app()->getUser()->setFlash(
					yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
					Yii::t('UploadModule.common', 'File was saved!')
				);
				$this->redirect('/backend/upload/upload/index');
			}
		}

		return $this->render('create', [
			'model' => $model
		]);
	}

	public function actionDelete($fileName)
	{
		$module = Yii::app()->getModule('upload');
		if (@unlink($module->getPathUpload() . '/' . $fileName)) {
			Yii::app()->getUser()->setFlash(
				yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
				Yii::t('UploadModule.common', 'File was deleted!')
			);
		}
		$this->redirect('/backend/upload/upload/index');
	}
}