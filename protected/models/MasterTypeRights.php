<?php/** * This is the model class for table "{{master_type_rights}}". * * The followings are the available columns in table '{{master_type_rights}}': * @property integer $Master_Type_Rights_Id * @property string $Type_Rights_Name * @property string $Type_Rights_Code * @property string $Type_Rights_Standard * @property integer $Type_Rights_Rank * @property string $Type_Rights_Occupation * @property string $Type_Rights_Domain * @property string $Type_Right_Use * @property string $Active * @property string $Created_Date * @property string $Rowversion * * The followings are the available model relations: * @property AuthorManageRights[] $authorManageRights * @property AuthorRelatedRights[] $authorRelatedRights * @property GroupManageRights[] $groupManageRights * @property PerformerRelatedRights[] $performerRelatedRights * @property ProducerRelatedRights[] $producerRelatedRights * @property PublisherGroupManageRights[] $publisherGroupManageRights * @property PublisherManageRights[] $publisherManageRights * @property PublisherRelatedRights[] $publisherRelatedRights * @property WorkRightholder[] $workRightholders */class MasterTypeRights extends CActiveRecord {    const OCCUPATION_AUTHOR = 'AU';    const OCCUPATION_PERFORMER = 'PE';    const OCCUPATION_PUBLISHER = 'PU';    const OCCUPATION_PRODUCER = 'PR';    /**     * @return string the associated database table name     */    public function tableName() {        return '{{master_type_rights}}';    }    public function scopes() {        $alias = $this->getTableAlias(false, false);        return array(            'isActive' => array('condition' => "$alias.Active = '1'"),            'isAuthor' => array('condition' => "$alias.Type_Rights_Occupation = '" . self::OCCUPATION_AUTHOR . "'"),            'isPublisher' => array('condition' => "$alias.Type_Rights_Occupation = '" . self::OCCUPATION_PUBLISHER . "'"),            'isPerformer' => array('condition' => "$alias.Type_Rights_Occupation = '" . self::OCCUPATION_PERFORMER . "'"),            'isProducer' => array('condition' => "$alias.Type_Rights_Occupation = '" . self::OCCUPATION_PRODUCER . "'"),        );    }    /**     * @return array validation rules for model attributes.     */    public function rules() {        // NOTE: you should only define rules for those attributes that        // will receive user inputs.        return array(            array('Type_Rights_Name, Type_Rights_Code, Type_Rights_Occupation, Type_Rights_Domain', 'required'),            array('Type_Rights_Rank', 'numerical', 'integerOnly' => true),            array('Type_Rights_Name', 'length', 'max' => 90),            array('Type_Rights_Code, Type_Rights_Standard', 'length', 'max' => 10),            array('Type_Rights_Occupation', 'length', 'max' => 2),            array('Type_Rights_Domain, Active', 'length', 'max' => 1),            array('Type_Right_Use', 'length', 'max' => 100),            array('Created_Date, Rowversion', 'safe'),            // The following rule is used by search().            // @todo Please remove those attributes that should not be searched.            array('Master_Type_Rights_Id, Type_Rights_Name, Type_Rights_Code, Type_Rights_Standard, Type_Rights_Rank, Type_Rights_Occupation, Type_Rights_Domain, Type_Right_Use, Active, Created_Date, Rowversion', 'safe', 'on' => 'search'),        );    }    /**     * @return array relational rules.     */    public function relations() {        // NOTE: you may need to adjust the relation name and the related        // class name for the relations automatically generated below.        return array(            'authorManageRights' => array(self::HAS_MANY, 'AuthorManageRights', 'Auth_Mnge_Type_Rght_Id'),            'authorRelatedRights' => array(self::HAS_MANY, 'AuthorRelatedRights', 'Auth_Rel_Type_Rght_Id'),            'groupManageRights' => array(self::HAS_MANY, 'GroupManageRights', 'Group_Mnge_Type_Rght_Id'),            'performerRelatedRights' => array(self::HAS_MANY, 'PerformerRelatedRights', 'Perf_Rel_Type_Rght_Id'),            'producerRelatedRights' => array(self::HAS_MANY, 'ProducerRelatedRights', 'Pro_Rel_Type_Rght_Id'),            'publisherGroupManageRights' => array(self::HAS_MANY, 'PublisherGroupManageRights', 'Pub_Group_Mnge_Type_Rght_Id'),            'publisherManageRights' => array(self::HAS_MANY, 'PublisherManageRights', 'Pub_Mnge_Type_Rght_Id'),            'publisherRelatedRights' => array(self::HAS_MANY, 'PublisherRelatedRights', 'Pub_Rel_Type_Rght_Id'),            'workRightholders' => array(self::HAS_MANY, 'WorkRightholder', 'Work_Right_Role'),        );    }    /**     * @return array customized attribute labels (name=>label)     */    public function attributeLabels() {        return array(            'Master_Type_Rights_Id' => 'Master Type Rights',            'Type_Rights_Name' => 'Role',            'Type_Rights_Code' => 'Code',            'Type_Rights_Standard' => 'Standard',            'Type_Rights_Rank' => 'Rank',            'Type_Rights_Occupation' => 'Occupation',            'Type_Rights_Domain' => 'Domain',            'Type_Right_Use' => 'Use',            'Active' => 'Active',            'Created_Date' => 'Created Date',            'Rowversion' => 'Rowversion',        );    }    /**     * Retrieves a list of models based on the current search/filter conditions.     *     * Typical usecase:     * - Initialize the model fields with values from filter form.     * - Execute this method to get CActiveDataProvider instance which will filter     * models according to data in model fields.     * - Pass data provider to CGridView, CListView or any similar widget.     *     * @return CActiveDataProvider the data provider that can return the models     * based on the search/filter conditions.     */    public function search() {        // @todo Please modify the following code to remove attributes that should not be searched.        $criteria = new CDbCriteria;        $criteria->compare('Master_Type_Rights_Id', $this->Master_Type_Rights_Id);        $criteria->compare('Type_Rights_Name', $this->Type_Rights_Name, true);        $criteria->compare('Type_Rights_Code', $this->Type_Rights_Code, true);        $criteria->compare('Type_Rights_Standard', $this->Type_Rights_Standard, true);        $criteria->compare('Type_Rights_Rank', $this->Type_Rights_Rank);        $criteria->compare('Type_Rights_Occupation', $this->Type_Rights_Occupation, true);        $criteria->compare('Type_Rights_Domain', $this->Type_Rights_Domain, true);        $criteria->compare('Type_Right_Use', $this->Type_Right_Use, true);        $criteria->compare('Active', $this->Active, true);        $criteria->compare('Created_Date', $this->Created_Date, true);        $criteria->compare('Rowversion', $this->Rowversion, true);        return new CActiveDataProvider($this, array(            'criteria' => $criteria,            'pagination' => array(                'pageSize' => PAGE_SIZE,            )        ));    }    /**     * Returns the static model of the specified AR class.     * Please note that you should have this exact method in all your CActiveRecord descendants!     * @param string $className active record class name.     * @return MasterTypeRights the static model class     */    public static function model($className = __CLASS__) {        return parent::model($className);    }    public function dataProvider() {        return new CActiveDataProvider($this, array(            'pagination' => array(                'pageSize' => PAGE_SIZE,            )        ));    }    public function getOccupationList($key = NULL) {        $occupation = array(            self::OCCUPATION_AUTHOR => 'Author',            self::OCCUPATION_PERFORMER => 'Performer',            self::OCCUPATION_PUBLISHER => 'Publisher',            self::OCCUPATION_PRODUCER => 'Producer',        );        if ($key != NULL)            return $occupation[$key];        return $occupation;    }    public function getDomainList($key = NULL) {        $domain = array(            'C' => 'Copyright',            'R' => 'Related Rights',        );        if ($key != NULL)            return $domain[$key];        return $domain;    }    public function getRolelist($is_active = TRUE, $key = NULL) {        if($is_active && $key == NULL)            $roles = CHtml::listData(self::model()->isActive()->findAll(array('order' => 'Type_Rights_Name')), 'Master_Type_Rights_Id', 'Type_Rights_Name');        else            $roles = CHtml::listData(self::model()->findAll(array('order' => 'Type_Rights_Name')), 'Master_Type_Rights_Id', 'Type_Rights_Name');        if($key != NULL)            return $roles[$key];        return $roles;    }}