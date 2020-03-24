<?php
$form = $this->beginWidget(
	'bootstrap.widgets.TbActiveForm',
	[
		'id' => 'export-form',
		'enableAjaxValidation' => false,
		'enableClientValidation' => true,
		'htmlOptions' => ['enctype' => 'multipart/form-data', 'class' => 'well'],
	]
); ?>
    <div class="alert alert-info">
		<?= Yii::t('UploadModule.common', 'Fields with'); ?>
        <span class="required">*</span>
		<?= Yii::t('UploadModule.common', 'are required'); ?>
    </div>

<?= $form->errorSummary($model); ?>

    <div class='row'>
        <div class="col-sm-12">
			<?= $form->textFieldGroup($model, 'fileName'); ?>
        </div>
    </div>

    <div class='row'>
        <div class="col-sm-12">
			<?= $form->fileFieldGroup(
				$model,
				'file',
				[
					'widgetOptions' => [
						'htmlOptions' => [
							'onchange' => 'readURL(this);',
						],
					],
				]
			); ?>
        </div>
    </div>

<?php $this->widget(
	'bootstrap.widgets.TbButton',
	[
		'buttonType' => 'submit',
		'context' => 'primary',
		'label' => $model->getIsNewRecord() ? Yii::t('UploadModule.common', 'Add and continue') : Yii::t('UploadModule.common', 'Save and continue'),
	]
); ?>

<?php $this->widget(
	'bootstrap.widgets.TbButton',
	[
		'buttonType' => 'submit',
		'htmlOptions' => ['name' => 'submit-type', 'value' => 'index'],
		'label' => $model->getIsNewRecord() ? Yii::t('UploadModule.common', 'Add and close') : Yii::t('UploadModule.common', 'Save and close'),
	]
); ?>

<?php $this->endWidget(); ?>