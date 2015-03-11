<?php

namespace application\controllers;

use Yii;
use application\models\MasterRole;
use application\models\MasterRoleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TestController implements the CRUD actions for MasterRole model.
 */
class TestController extends Controller
{
    public function behaviors()
    {
        [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all MasterRole models.
     * @mixed
     */
    public function actionIndex()
    {
        $searchModel = new MasterRoleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MasterRole model.
     * @param integer $id
     * @mixed
     */
    public function actionView($id)
    {
        $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new MasterRole model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @mixed
     */
    public function actionCreate()
    {
        $model = new MasterRole();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->redirect(['view', 'id' => $model->Master_Role_ID]);
        } else {
            $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MasterRole model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->redirect(['view', 'id' => $model->Master_Role_ID]);
        } else {
            $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MasterRole model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        $this->redirect(['index']);
    }

    /**
     * Finds the MasterRole model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @MasterRole the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MasterRole::findOne($id)) !== null) {
            $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
