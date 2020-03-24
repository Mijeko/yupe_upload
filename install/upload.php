<?php
return [
	'module' => [
		'class' => 'application.modules.upload.UploadModule',
	],
	'rules' => [
		'/backend/<module:\w+>/<controller:\w+>/<action:\w+>/<fileName:[0-9a-zA-Z-\.]+>' => '/<module>/<controller>Backend/<action>',
	],
];