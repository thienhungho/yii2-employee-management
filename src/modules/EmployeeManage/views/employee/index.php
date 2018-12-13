<?php
/* @var $this yii\web\View */
/* @var $searchModel thienhungho\EmployeeManagement\modules\EmployeeManage\search\EmployeeSearch */

/* @var $dataProvider yii\data\ActiveDataProvider */

use kartik\grid\GridView;
use yii\helpers\Html;

$this->title = Yii::t('app', 'Employee');
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>

<div class="employee-index-head">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-lg-10">
            <p>
                <?= Html::a(Yii::t('app', 'Create Employee'), ['create'], ['class' => 'btn btn-success']) ?>
                <?= Html::a(Yii::t('app', 'Advance Search'), '#', ['class' => 'btn btn-info search-button']) ?>
            </p>
        </div>
        <div class="col-lg-2">
            <?php backend_per_page_form() ?>
        </div>
    </div>
    <div class="search-form" style="display:none">
        <?= $this->render('_search', ['model' => $searchModel]); ?>
    </div>
</div>

<div class="employee-index">
    <?php
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        grid_checkbox_column(),
        [
            'class'         => 'kartik\grid\ExpandRowColumn',
            'width'         => '50px',
            'value'         => function($model, $key, $index, $column) {
                return GridView::ROW_COLLAPSED;
            },
            'detail'        => function($model, $key, $index, $column) {
                return Yii::$app->controller->renderPartial('_expand', ['model' => $model]);
            },
            'headerOptions' => ['class' => 'kartik-sheet-style'],
            'expandOneOnly' => true,
        ],
        [
            'attribute' => 'id',
            'visible'   => false,
        ],
        [
            'class'     => \kartik\grid\DataColumn::className(),
            'format'    => 'raw',
            'attribute' => 'avatar',
            'value'     => function($model, $key, $index, $column) {
                return Html::a(
                    '<img style="max-width: 50px;" src=/' . get_other_img_size_path('thumbnail', $model->avatar) . '>',
                    \yii\helpers\Url::to(['/']), [
                    'data-pjax' => '0',
                    'target'    => '_blank',
                ]);
            },
            'vAlign'    => GridView::ALIGN_MIDDLE,
        ],
        [
            'attribute'           => 'user_id',
            'label'               => Yii::t('app', 'User'),
            'value'               => function($model) {
                if ($model->user) {
                    return $model->user->username;
                } else {
                    return null;
                }
            },
            'filterType'          => GridView::FILTER_SELECT2,
            'filter'              => \yii\helpers\ArrayHelper::map(\thienhungho\UserManagement\models\User::find()->asArray()->all(), 'id', 'username'),
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions'  => [
                'placeholder' => t('app', 'User'),
                'id'          => 'grid-employee-search-user_id',
            ],
            'vAlign'    => GridView::ALIGN_MIDDLE,
        ],
        [
            'attribute' => 'first_name',
            'vAlign'    => GridView::ALIGN_MIDDLE,
        ],
        [
            'attribute' => 'last_name',
            'vAlign'    => GridView::ALIGN_MIDDLE,
        ],
        [
            'attribute' => 'phone',
            'vAlign'    => GridView::ALIGN_MIDDLE,
        ],
        [
            'attribute' => 'email',
            'format'    => 'email',
            'vAlign'    => GridView::ALIGN_MIDDLE,
        ],
        grid_language_column(),
        [
            'attribute' => 'country',
            'vAlign'    => GridView::ALIGN_MIDDLE,
        ],
        [
            'format'              => 'raw',
            'attribute'           => 'status',
            'value'               => function($model, $key, $index, $column) {
                if ($model->status == STATUS_PENDING) {
                    return '<span class="label-warning label">' . t('app', slug_to_text(STATUS_PENDING)) . '</span>';
                } elseif ($model->status == STATUS_ACTIVE) {
                    return '<span class="label-success label">' . t('app', slug_to_text(STATUS_ACTIVE)) . '</span>';
                } elseif ($model->status == STATUS_DISABLE) {
                    return '<span class="label-danger label">' . t('app', slug_to_text(STATUS_DISABLE)) . '</span>';
                }
            },
            'filterType'          => GridView::FILTER_SELECT2,
            'filter'              => \yii\helpers\ArrayHelper::map([
                [
                    'value' => STATUS_PENDING,
                    'name'  => t('app', slug_to_text(STATUS_PENDING)),
                ],
                [
                    'value' => STATUS_ACTIVE,
                    'name'  => t('app', slug_to_text(STATUS_ACTIVE)),
                ],
                [
                    'value' => STATUS_DISABLE,
                    'name'  => t('app', slug_to_text(STATUS_DISABLE)),
                ],
            ], 'value', 'name'),
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions'  => [
                'placeholder' => t('app', 'Status'),
                'id'          => 'grid-search-status',
            ],
            'vAlign'    => GridView::ALIGN_MIDDLE,
        ],
        [
            'format'              => 'raw',
            'attribute'           => 'type',
            'value'               => function($model, $key, $index, $column) {
                if ($model->type == TYPE_PART_TIME) {
                    return '<span class="label-warning label">' . t('app', TYPE_PART_TIME) . '</span>';
                } elseif ($model->type == TYPE_FULL_TIME) {
                    return '<span class="label-success label">' . t('app', TYPE_FULL_TIME) . '</span>';
                }
            },
            'filterType'          => GridView::FILTER_SELECT2,
            'filter'              => \yii\helpers\ArrayHelper::map([
                [
                    'value' => TYPE_PART_TIME,
                    'name'  => t('app', TYPE_PART_TIME),
                ],
                [
                    'value' => TYPE_FULL_TIME,
                    'name'  => t('app', TYPE_FULL_TIME),
                ],
            ], 'value', 'name'),
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions'  => [
                'placeholder' => t('app', 'Type'),
                'id'          => 'grid-search-type',
            ],
            'vAlign'    => GridView::ALIGN_MIDDLE,
        ],
    ];
    $gridColumn[] = grid_view_default_active_column_cofig();
    ?>
    <?= GridView::widget([
        'dataProvider'   => $dataProvider,
        'filterModel'    => $searchModel,
        'columns'        => $gridColumn,
        'responsive'     => true,
        'responsiveWrap' => false,
        'condensed'      => true,
        'hover'          => true,
        'pjax'           => true,
        'pjaxSettings'   => ['options' => ['id' => 'kv-pjax-container-employee']],
        'panel'          => [
            'type'    => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
        ],
        'toolbar'        => grid_view_toolbar_config($dataProvider, $gridColumn),
    ]); ?>

    <div class="row">
        <div class="col-lg-2">
            <?= \kartik\widgets\Select2::widget([
                'name'    => 'action',
                'data'    => [
                    ACTION_DELETE => t('app', 'Delete'),
                ],
                'theme'   => \kartik\widgets\Select2::THEME_BOOTSTRAP,
                'options' => [
                    'multiple'    => false,
                    'placeholder' => t('app', 'Bulk Actions ...'),
                ],
            ]); ?>
        </div>
        <div class="col-lg-10">
            <?= Html::submitButton(t('app', 'Apply'), [
                'class'        => 'btn btn-primary',
                'data-confirm' => t('app', 'Are you want to do this?'),
            ]) ?>
        </div>
    </div>

</div>
