<?php
class RActiveRecord extends CActiveRecord {
    
    protected function beforeSave() {
        if($this->isNewRecord){
            $this->Created_By = Yii::app()->user->id;
        }else{
            $this->Updated_By = Yii::app()->user->id;
            $this->Rowversion = date('Y-m-d H:i:s');
        }
        return parent::beforeSave();
    }
    
    protected function afterFind() {
        if($this->Rowversion == '0000-00-00 00:00:00')
            $this->Rowversion = '';
        parent::afterFind();
    }
}
