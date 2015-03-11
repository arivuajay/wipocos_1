<?php
$this->title = 'Users';
$this->breadcrumbs = array(
    $this->title
);
?>
<div class="col-lg-12 col-md-12">
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="glyphicon glyphicon-search"></i>  Search
                </h3>
                <div class="clearfix"></div>
            </div>
            <section class="content">
                <div class="row">
                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'search-form',
                        'method' => 'get',
                        'action' => array('/site/user/index'),
                        'htmlOptions' => array('role' => 'form')
                    ));
                    ?>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'username') ?>
                            <?php echo $form->textField($searchModel, 'username', array('autofocus', 'class' => 'form-control')); ?>
                            <?php echo $form->error($searchModel, 'username') ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <?php $names = CHtml::listData(User::model()->findAll(array('order' => 'name')), 'name', 'name') ?>
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'username') ?>
                            <?php echo $form->dropDownList($searchModel, 'username', $names, array('prompt' => '', 'class' => 'form-control')); ?>
                            <?php echo $form->error($searchModel, 'username') ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'email') ?>
                            <?php echo $form->textField($searchModel, 'email', array('autofocus', 'class' => 'form-control')); ?>
                            <?php echo $form->error($searchModel, 'email') ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <?php $roles = CHtml::listData(MasterRole::model()->findAll(), 'Master_Role_ID', 'Description') ?>
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'role') ?>
                            <?php echo $form->dropDownList($searchModel, 'role', $names, array('prompt' => '', 'class' => 'form-control')); ?>
                            <?php echo $form->error($searchModel, 'role') ?>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($searchModel, 'status') ?>
                            <?php echo $form->dropDownList($searchModel, 'status', array('0' => 'In-active', '1' => 'Active'), array('prompt' => '', 'class' => 'form-control')); ?>
                            <?php echo $form->error($searchModel, 'status') ?>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2">
                        <div class="form-group">
                            <label>&nbsp;</label>
                            <?= CHtml::submitButton('Search', array('class' => 'btn btn-primary form-control')) ?>
                        </div>
                    </div>
                    <?php $this->endWidget(); ?>
                </div>
            </section>


        </div>
    </div>
</div>

<?php if ($search == TRUE) { ?>
    <div class="col-lg-12 col-md-12">
        <div class="row">
            <?php
            $gridColumns = [
                [
                    'class' => 'kartik\grid\SerialColumn',
                    //'width' => '36px',
                    'header' => '',
                ],
                'username',
                [
                    'attribute' => 'name',
                    //'vAlign' => 'middle',
                    //'width' => '180px',
                    'filterType' => GridView::FILTER_SELECT2,
                    'filter' => CHtml::listData(User::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
                    'filterWidgetOptions' => [
                        'pluginOptions' => ['allowClear' => true],
                    ],
                    'filterInputOptions' => ['placeholder' => 'Type name'],
                    'format' => 'raw'
                ],
                [
                    'attribute' => 'email',
                    //'vAlign' => 'middle',
                    'value' => function ($model, $key, $index, $widget) {
                return Html::a($model->email, "mailto:{$model->email}");
            },
                    'format' => 'raw'
                ],
                [
                    'attribute' => 'role',
                    //'vAlign' => 'middle',
                    //'width' => '180px',
                    'value' => function ($model, $key, $index, $widget) {
                return $model->roleMdl->Description;
            },
                    'filterType' => GridView::FILTER_SELECT2,
                    'filter' => CHtml::listData(MasterRole::find()->orderBy('Description')->asArray()->all(), 'Master_Role_ID', 'Description'),
                    'filterWidgetOptions' => [
                        'pluginOptions' => ['allowClear' => true],
                    ],
                    'filterInputOptions' => ['placeholder' => 'Type name'],
                    'format' => 'raw'
                ],
                [
                    'class' => 'kartik\grid\BooleanColumn',
                    'attribute' => 'status',
                    //'vAlign' => 'middle',
                    'trueIcon' => '<i class="fa fa-circle text-green"></i>',
                    'falseIcon' => '<i class="fa fa-circle text-red"></i>'
                ],
                [
                    'class' => 'kartik\grid\ActionColumn',
                    //'width' => '150px',
                    'contentOptions' => ['class' => 'action_column'],
                    'template' => '{privilages}{view}{update}{delete}',
                    'buttons' => [
                        'privilages' => function ($url, $model) {
                    return Html::a('<i class="fa fa-cogs"></i>', Url::to(['/auth-resources/user', 'uid' => $model->id]), [
                                'title' => Yii::t('yii', 'Privilages'),
                                'data-pjax' => '0',
                    ]);
                }
                    ]
                ]
            ];

            echo GridView::widget([
                'dataProvider' => $dataProvider,
//                    'filterModel' => $searchModel,
                'columns' => $gridColumns,
                'pjax' => true,
                'toolbar' => [
                    '{export}',
                ],
                // set export properties
                'export' => [
                    'fontAwesome' => true
                ],
                'panel' => [
                    'type' => GridView::TYPE_PRIMARY,
                    'heading' => '<i class="glyphicon glyphicon-search"></i>  Search Results',
                    'footer' => false
                ],
                'persistResize' => false,
                'exportConfig' => [
                    GridView::CSV => ['label' => 'Save as CSV'],
                    GridView::EXCEL => ['label' => 'Save as excel'],
                    GridView::PDF => ['label' => 'Save as pdf'],
                ],
            ]);
            ?>
        </div>
    </div>
<?php } ?>

<div class="col-lg-12 col-md-12">
    <div class="row mb10">
        <?php echo CHtml::link('<i class="fa fa-plus"></i>&nbsp;&nbsp;Create User', array('/site/user/create'), array('class' => 'btn btn-success pull-right')); ?>
    </div>
</div>


<div class="col-lg-12 col-md-12">
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="pull-right">
                    <div class="summary">Showing <b>1-1</b> of <b>1</b> item.</div>
                </div>
                <h3 class="panel-title">
                    <i class="glyphicon glyphicon-book"></i>  User
                </h3>
            </div>

            <?php
            $gridColumns = array(
                array(
                    'class' => 'IndexColumn',
                    'header' => '',
                ),
                'username',
                array(
                    'name' => 'name',
                    'htmlOptions' => array('style' => 'width: 180px;', 'vAlign' => 'middle'),
                    'type' => 'raw',
                    'value' => 'CHtml::encode($data->username)'
                ),
                array(
                    'name' => 'email',
                    'htmlOptions' => array('vAlign' => 'middle'),
                    'type' => 'raw',
                    'value' => 'CHtml::link(CHtml::encode($data->email), "mailto:".CHtml::encode($data->email))',
                ),
                array(
                    'name' => 'role',
                    'htmlOptions' => array('style' => 'width: 180px;', 'vAlign' => 'middle'),
                    'type' => 'raw',
                    'value' => 'CHtml::encode($data->roleMdl->Description)',
                ),
                array(
                    'name' => 'status',
                    'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle'),
                    'type' => 'raw',
                    'value' => function($data) {
                echo ($data->status == 1) ? "<i class='fa fa-circle text-green'></i>" : "<i class='fa fa-circle text-red'></i>";
            },
                ),
                array(
                    'header' => 'Actions',
                    'class' => 'booster.widgets.TbButtonColumn',
                    'htmlOptions' => array('style' => 'width: 180px;;text-align:center', 'vAlign' => 'middle', 'class' => 'action_column'),
                    'template' => '{privilages}{view}{update}{delete}',
                    'buttons' => array(
                        'privilages' => array(//the name {reply} must be same
                            'label' => '<i class="fa fa-cogs"></i>',
                            'options' => array(
                                'title' => 'Privilages',
                            ),
                            'url' => 'CHtml::normalizeUrl(array("/site/auth-resources/user/uid".rawurlencode($data->id)))',
                        ),
                    ),
                )
            );


            $this->widget('booster.widgets.TbExtendedGridView', array(
                'type' => 'striped bordered',
                'dataProvider' => (new User)->dataProvider(),
                'responsiveTable' => true,
                'template' => "{items}",
                'columns' => $gridColumns
                )
            );
            ?>
        </div>
        <?php
//        $this->widget('zii.widgets.grid.CGridView', array(
//        'dataProvider' => $searchModel->search(),
//        'filter' => $searchModel,
//        'columns' =>,
//        ));
////
//        $gridColumns = [
//            [
//                'class' => 'kartik\grid\SerialColumn',
//                //'width' => '36px',
//                'header' => '',
//            ],
//            'username',
//            [
//                'attribute' => 'name',
//                //'vAlign' => 'middle',
//                //'width' => '180px',
//                'filterType' => GridView::FILTER_SELECT2,
//                'filter' => CHtml::listData(User::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
//                'filterWidgetOptions' => [
//                    'pluginOptions' => ['allowClear' => true],
//                ],
//                'filterInputOptions' => ['placeholder' => 'Type name'],
//                'format' => 'raw'
//            ],
//            [
//                'attribute' => 'email',
//                //'vAlign' => 'middle',
//                'value' => function ($model, $key, $index, $widget) {
//            return Html::a($model->email, "mailto:{$model->email}");
//        },
//                'format' => 'raw'
//            ],
//            [
//                'attribute' => 'role',
//                //'vAlign' => 'middle',
//                //'width' => '180px',
//                'value' => function ($model, $key, $index, $widget) {
//            return $model->roleMdl->Description;
//        },
//                'filterType' => GridView::FILTER_SELECT2,
//                'filter' => CHtml::listData(MasterRole::find()->orderBy('Description')->asArray()->all(), 'Master_Role_ID', 'Description'),
//                'filterWidgetOptions' => [
//                    'pluginOptions' => ['allowClear' => true],
//                ],
//                'filterInputOptions' => ['placeholder' => 'Type name'],
//                'format' => 'raw'
//            ],
//            [
//                'class' => 'kartik\grid\BooleanColumn',
//                'attribute' => 'status',
//                //'vAlign' => 'middle',
//                'trueIcon' => '<i class="fa fa-circle text-green"></i>',
//                'falseIcon' => '<i class="fa fa-circle text-red"></i>'
//            ],
//            [
//                'class' => 'kartik\grid\ActionColumn',
//                //'width' => '150px',
//                'contentOptions' => ['class' => 'action_column'],
//                'template' => '{privilages}{view}{update}{delete}',
//                'buttons' => [
//                    'privilages' => function ($url, $model) {
//                return Html::a('<i class="fa fa-cogs"></i>', Url::to(['/auth-resources/user', 'uid' => $model->id]), [
//                            'title' => Yii::t('yii', 'Privilages'),
//                            'data-pjax' => '0',
//                ]);
//            }
//                ]
//            ]
//        ];
//
//        echo GridView::widget([
//            'dataProvider' => $dataProviderAll,
////                    'filterModel' => $searchModel,
//            'columns' => $gridColumns,
//            'pjax' => true,
//            'toolbar' => [
//                '{export}',
//            ],
//            // set export properties
//            'export' => [
//                'fontAwesome' => true
//            ],
//            'panel' => [
//                'type' => GridView::TYPE_PRIMARY,
//                'heading' => '<i class="glyphicon glyphicon-book"></i>  User',
//                'footer' => false
//            ],
//            'persistResize' => false,
//            'exportConfig' => [
//                GridView::CSV => ['label' => 'Save as CSV'],
//                GridView::EXCEL => ['label' => 'Save as excel'],
//                GridView::PDF => ['label' => 'Save as pdf'],
//            ],
//        ]);
        ?>
    </div>
</div>