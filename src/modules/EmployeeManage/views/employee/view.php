<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model thienhungho\EmployeeManagement\modules\EmployeeBase\Employee */
$this->title = $model->id;
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', 'Employee'),
    'url'   => ['index'],
];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-view">

    <div class="row">
        <div class="col-sm-8">
            <h2><?= Yii::t('app', 'Employee') . ' ' . Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-4" style="margin-top: 15px">
            <?=
            Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . Yii::t('app', 'PDF'),
                [
                    'pdf',
                    'id' => $model->id,
                ],
                [
                    'class'       => 'btn btn-danger',
                    'target'      => '_blank',
                    'data-toggle' => 'tooltip',
                    'title'       => Yii::t('app', 'Will open the generated PDF file in a new window'),
                ]
            ) ?>
            <?= Html::a(Yii::t('app', 'Save As New'), [
                'save-as-new',
                'id' => $model->id,
            ], ['class' => 'btn btn-info']) ?>
            <?= Html::a(Yii::t('app', 'Update'), [
                'update',
                'id' => $model->id,
            ], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), [
                'delete',
                'id' => $model->id,
            ], [
                'class' => 'btn btn-danger',
                'data'  => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method'  => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
        <?php
        $gridColumn = [
            [
                'attribute' => 'id',
                'visible'   => false,
            ],
            [
                'attribute' => 'user.username',
                'label'     => Yii::t('app', 'User'),
            ],
            'avatar',
            'first_name',
            'last_name',
            'phone',
            'email:email',
            'website',
            'birth_date',
            'gender',
            'relationship_status',
            'vat_number',
            'language',
            'address:ntext',
            'country',
            'city',
            'state',
            'zip_code',
            'date_join',
            'date_left',
            'status',
            'type',
            'currency',
        ];
        echo DetailView::widget([
            'model'      => $model,
            'attributes' => $gridColumn,
        ]);
        ?>
    </div>
    <div class="row">
        <h4>User<?= ' ' . Html::encode($this->title) ?></h4>
    </div>
</div>
