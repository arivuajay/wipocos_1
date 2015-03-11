<?php

class UserController extends Controller {

    public function filters() {
        array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @array access control rules
     */
    public function accessRules() {
        array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('profile', 'index', 'create', 'update', 'search', 'sendemail', 'view', 'delete'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionProfile() {
        $model = $this->findModel(Yii::app()->user->id);

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            if ($model->validate()) {
                $model->updateProfile();
                Yii::app()->user->setFlash('success', 'Changes saved successfully');
                $this->refresh();
            }
        }

        $this->render('profile', array('model' => $model));
    }

    /**
     * Lists all User models.
     * @mixed
     */
    public function actionIndex() {
        $searchModel = new Users();
        $search = false;
        if (isset($_REQUEST['Users'])) {
            foreach ($_REQUEST['Users'] as $key => $value) {
                if ($value != '') {
                    $search = true;
                    break;
                }
            }
        }

        $dataProvider = $searchModel->search($_REQUEST);
        $dataProviderAll = new ActiveDataProvider([
            'query' => Users::find(),
        ]);

        $this->render('index', array(
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'dataProviderAll' => $dataProviderAll,
            'search' => $search
        ));
    }

    public function actionSearch() {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search($_REQUEST);

        $this->render('index', array(
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @mixed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->findModel($id),
        ));
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @mixed
     */
    public function actionCreate() {
        $model = new User();

        if ($model->load(Yii::$app->request->post())) {
            $valid = $model->validate();
            if ($valid) {
                $model->createUser(false);
                $this->redirect(array('index'));
            }
        }
        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $valid = $model->validate();
            if ($valid) {
                $model->updateUser(false);
                $this->redirect(array('index'));
            }
        }
        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        $this->redirect(array('index'));
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = User::findOne($id)) !== null) {
            $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionSendemail() {
        Yii::$app->mailer->compose()
                ->setFrom('noreply@wipocos.com')
                ->setTo('prakash.paramanandam@arkinfotec.com')
                ->setSubject('test')
                ->setHtmlBody('test')
                ->send();
        exit;
    }

}
