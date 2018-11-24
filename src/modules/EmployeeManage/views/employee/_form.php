<?php

use kartik\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model thienhungho\EmployeeManagement\modules\EmployeeBase\Employee */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row employee-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <!--    --><? //= $form->field($model, 'user_id')->widget(\kartik\widgets\Select2::classname(), [
    //        'data'          => \yii\helpers\ArrayHelper::map(\thienhungho\UserManagement\models\User::find()->orderBy('id')->asArray()->all(), 'id', 'username'),
    //        'options'       => ['placeholder' => Yii::t('app', 'Choose User')],
    //        'pluginOptions' => [
    //            'allowClear' => true,
    //        ],
    //    ]); ?>
    <div class="col-lg-6 col-sm-12">
        <?= $form->field($model, 'first_name', [
            'addon' => ['prepend' => ['content' => '<span class="fa fa-user"></span>']],
        ])->textInput([
            'maxlength'   => true,
            'placeholder' => t('app', 'First Name'),
        ]) ?>

        <?= $form->field($model, 'last_name', [
            'addon' => ['prepend' => ['content' => '<span class="fa fa-user"></span>']],
        ])->textInput([
            'maxlength'   => true,
            'placeholder' => t('app', 'Last Name'),
        ]) ?>

        <?= $form->field($model, 'phone', [
            'addon' => ['prepend' => ['content' => '<span class="fa fa-phone"></span>']],
        ])->textInput([
            'maxlength'   => true,
            'placeholder' => t('app', 'Phone'),
        ]); ?>

        <?= $form->field($model, 'email', [
            'addon' => ['prepend' => ['content' => '<span class="fa fa-envelope"></span>']],
        ])->textInput([
            'maxlength'   => true,
            'placeholder' => t('app', 'Email'),
        ]) ?>

        <?= $form->field($model, 'website', [
            'addon' => ['prepend' => ['content' => '<span class="glyphicon glyphicon-link"></span>']],
        ])->textInput([
            'maxlength'   => true,
            'placeholder' => 'Website',
        ]) ?>

        <?= $form->field($model, 'birth_date')->widget(\kartik\datecontrol\DateControl::classname(), [
            'type'           => \kartik\datecontrol\DateControl::FORMAT_DATE,
            'saveFormat'     => 'php:Y-m-d',
            'ajaxConversion' => true,
            'options'        => [
                'pluginOptions' => [
                    'placeholder' => Yii::t('app', 'Choose Birth Date'),
                    'autoclose'   => true,
                ],
            ],
        ]); ?>

        <?= $form->field($model, 'vat_number', [
            'addon' => ['prepend' => ['content' => '<span class="fa fa-bank"></span>']],
        ])->textInput([
            'maxlength'   => true,
            'placeholder' => 'Vat Number',
        ]) ?>

        <?= language_select_input($form, $model) ?>

        <?= country_select_input($form, $model) ?>

        <?= $form->field($model, 'city', [
            'addon' => ['prepend' => ['content' => '<span class="fa fa-map-marker"></span>']],
        ])->textInput([
            'maxlength'   => true,
            'placeholder' => 'City',
        ]) ?>

        <?= $form->field($model, 'state', [
            'addon' => ['prepend' => ['content' => '<span class="fa fa-map-marker"></span>']],
        ])->textInput([
            'maxlength'   => true,
            'placeholder' => 'State',
        ]) ?>

        <?= $form->field($model, 'zip_code', [
            'addon' => ['prepend' => ['content' => '<span class="fa fa-map-marker"></span>']],
        ])->textInput([
            'maxlength'   => true,
            'placeholder' => 'Zip Code',
        ]) ?>

        <?= $form->field($model, 'address', [
            'addon' => ['prepend' => ['content' => '<span class="fa fa-map-marker"></span>']],
        ])->textarea([
            'maxlength'   => true,
            'placeholder' => t('app', 'Address'),
        ]) ?>

    </div>

    <div class="col-lg-6 col-sm-12">

        <?= $form->field($model, 'status', [
            'addon' => ['prepend' => ['content' => '<span class="fa fa-eye"></span>']],
        ])->radioButtonGroup([
            STATUS_ACTIVE  => t('app', slug_to_text(STATUS_ACTIVE)),
            STATUS_PENDING => t('app', slug_to_text(STATUS_PENDING)),
            STATUS_DISABLE => t('app', slug_to_text(STATUS_DISABLE)),
            'debt'         => Yii::t('app', 'Debt'),
        ], [
            'class'       => 'btn-group-sm',
            'itemOptions' => ['labelOptions' => ['class' => 'btn green']],
        ]); ?>

        <?= $form->field($model, 'type', [
            'addon' => ['prepend' => ['content' => '<span class="fa fa-tag"></span>']],
        ])->radioButtonGroup([
            'Full time' => Yii::t('app', 'Full time'),
            'Part time' => Yii::t('app', 'Part time'),
        ], [
            'class'       => 'btn-group-sm',
            'itemOptions' => ['labelOptions' => ['class' => 'btn green']],
        ]); ?>

        <?= $form->field($model, 'gender', [
            'addon' => ['prepend' => ['content' => '<span class="fa fa-venus-mars"></span>']],
        ])->radioButtonGroup([
            'male'   => Yii::t('app', 'Male'),
            'female' => Yii::t('app', 'female'),
            'other'  => Yii::t('app', 'Other'),
        ], [
            'class'       => 'btn-group-sm',
            'itemOptions' => ['labelOptions' => ['class' => 'btn green']],
        ]); ?>

        <?= $form->field($model, 'relationship_status', [
            'addon' => ['prepend' => ['content' => '<span class="fa fa-heartbeat"></span>']],
        ])->radioButtonGroup([
            'single'  => Yii::t('app', 'Single'),
            'married' => Yii::t('app', 'Married'),
            'other'   => Yii::t('app', 'Other'),
        ], [
            'class'       => 'btn-group-sm',
            'itemOptions' => ['labelOptions' => ['class' => 'btn green']],
        ]); ?>

        <?= $form->field($model, 'date_join')->widget(\kartik\datecontrol\DateControl::classname(), [
            'type'           => \kartik\datecontrol\DateControl::FORMAT_DATE,
            'saveFormat'     => 'php:Y-m-d',
            'ajaxConversion' => true,
            'options'        => [
                'pluginOptions' => [
                    'placeholder' => Yii::t('app', 'Choose Date Join'),
                    'autoclose'   => true,
                ],
            ],
        ]); ?>

        <?= $form->field($model, 'date_left')->widget(\kartik\datecontrol\DateControl::classname(), [
            'type'           => \kartik\datecontrol\DateControl::FORMAT_DATE,
            'saveFormat'     => 'php:Y-m-d',
            'ajaxConversion' => true,
            'options'        => [
                'pluginOptions' => [
                    'placeholder' => Yii::t('app', 'Choose Date Left'),
                    'autoclose'   => true,
                ],
            ],
        ]); ?>

        <?= $form->field($model, 'currency', [
            'addon' => ['prepend' => ['content' => '<span class="fa fa-money"></span>']],
        ])->widget(\kartik\widgets\Select2::classname(), [
            'data'          => get_all_currency_code(),
            'options'       => ['placeholder' => t('app', 'Choose Currency')],
            'pluginOptions' => [
                'allowClear' => true,
            ],
        ]); ?>

        <?= $form->field($model, 'avatar')->fileInput()
            ->widget(\kartik\file\FileInput::classname(), [
                'options'       => ['accept' => 'image/*'],
                'pluginOptions' => empty($model->avatar) ? [] : [
                    'initialPreview'       => [
                        '/' . $model->avatar,
                    ],
                    'initialPreviewAsData' => true,
                    'initialCaption'       => $model->avatar,
                    'overwriteInitial'     => true,
                ],
            ]);
        ?>
    </div>

    <div class="col-lg-12">

        <div class="form-group">
            <?php if (Yii::$app->controller->action->id != 'save-as-new'): ?>
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?><?php endif; ?><?php if (Yii::$app->controller->action->id != 'create'): ?>
                <?= Html::submitButton(Yii::t('app', 'Save As New'), [
                    'class' => 'btn btn-info',
                    'value' => '1',
                    'name'  => '_asnew',
                ]) ?><?php endif; ?>
            <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
        </div>

    </div>

    <?php ActiveForm::end(); ?>

</div>
