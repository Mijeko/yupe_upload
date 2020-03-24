<?php

class FileHelper
{
	private $_file;
	private $_module;
	private $_fileName;

	public function __construct($fileName)
	{
		$this->_module = Yii::app()->getModule('upload');
		$this->_file = pathinfo($this->_module->getPathUpload() . '/' . $fileName);
		$this->_fileName = $fileName;
	}


	public function getPath()
	{
		if ($this->isImage()) {
			return '/uploads/' . $this->_fileName;
		}
		if ($this->isPdf()) {
			return 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/PDF_file_icon.svg/1200px-PDF_file_icon.svg.png';
		}
	}

	/**
	 * @return mixed
	 */
	public function getFileName()
	{
		return $this->_fileName;
	}

	public function isPdf()
	{
		return in_array($this->_file['extension'], ['pdf']);
	}

	public function isImage()
	{
		return in_array($this->_file['extension'], ['png', 'jpeg', 'jpg', 'svg', 'bmp']);
	}
}