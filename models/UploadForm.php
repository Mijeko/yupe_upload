<?php

class UploadForm extends \yupe\models\YFormModel
{
	protected $uploadManager;
	public $fileName;
	public $file;

	public function rules()
	{
		return [
			['fileName', 'length', 'max' => 255],
			['file', 'file', 'types' => 'jpg, gif, png, svg, docx, doc, pdf']
		];
	}

	public function attributeLabels()
	{
		return [
			'fileName' => 'Имя файла',
			'file' => 'Файл',
		];
	}

	public function save()
	{
		$module = Yii::app()->getModule('upload');
		$image = CUploadedFile::getInstance($this, 'file');
		if ($image instanceof CUploadedFile) {
			$path = $module->getPathUpload() . '/' . $this->getFileName() . '.' . $image->getExtensionName();
			if ($image->saveAs($path)) {
				return true;
			}
		}

		return false;
	}

	public function getFileName()
	{
		return !empty($this->fileName) ? $this->fileName : substr(md5(rand()), 0, 10);
	}


	public function getIsNewRecord()
	{
		return true;
	}

}