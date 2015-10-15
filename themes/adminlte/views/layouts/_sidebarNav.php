<aside class="left-side sidebar-offcanvas">
    <section class="sidebar">
        <?php if (!Yii::app()->user->isGuest) : ?>
            <div class="user-panel">
                <div class="pull-left image">
                    <?php echo CHtml::image("{$this->themeUrl}/img/avatar5.png", 'User Image', array('class' => 'img-circle')) ?>
                </div>
                <div class="pull-left info">
                    <p>Hello, <?php echo Inflector::camel2words(Yii::app()->user->name) ?></p>
                    <a href="#">
                        <i class="fa fa-circle text-success"></i> Online
                    </a>
                </div>
            </div>
        <?php endif ?>

        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i
                            class="fa fa-search"></i></button>
                </span>
            </div>
        </form>

        <?php
        $_id = NULL;
        $_controller = Yii::app()->controller->id;
        $_action = Yii::app()->controller->action->id;
        $groupCheck = Myclass::checkGroupactions($_controller, $_action);
        
        $work_com_active = array(
            'contractexpiry' => false,
            'work' => false
        );
        if($_controller == 'work'){
            if ($_action == 'contractexpiry')
                $work_com_active['contractexpiry'] = true;
            else
                $work_com_active['work'] = true;
        }
        
//        var_dump(UserIdentity::checkAccess($_id, 'contractexpiry', 'view'));
        
        $this->widget('application.components.MyMenu', array(
            'activateParents' => true,
            'encodeLabel' => false,
            'activateItems' => true,
            'items' => array(
                array('label' => '<i class="fa fa-dashboard"></i> <span>Dashboard</span>', 'url' => array('/site/default/index') /*Yii::app()->homeUrl*/, 'visible' => '1'),
                array('label' => '<i class="fa fa-cog"></i> <span>Administration</span><i class="fa pull-right fa-angle-left"></i>', 'url' => '#',
                    'itemOptions' => array('class' => 'treeview'),
                    'submenuOptions' => array('class' => 'treeview-menu'),
                    'visible' => '1',
                    'items' => array(
                        array('label' => '<i class="fa fa-weixin"></i> <span>Society</span>', 'url' => array('/site/society/index'), 'visible' => '1'),
                        array('label' => '<i class="fa fa-music"></i> <span>Roles</span>', 'url' => array('/site/masterrole/index'), 'visible' => '1'),
                        array('label' => '<i class="fa fa-user"></i> <span>Operator</span>', 'url' => array('/site/user/index'), 'visible' => '1'),
                    ),
                ),
                array('label' => '<i class="fa fa-database"></i> <span>Master</span><i class="fa pull-right fa-angle-left"></i>', 'url' => '#',
                    'itemOptions' => array('class' => 'treeview'),
                    'submenuOptions' => array('class' => 'treeview-menu'),
                    'visible' => '1',
                    'items' => array(
                        array('label' => '<i class="fa fa-usd"></i> <span>Currencies</span>', 'url' => array('/site/mastercurrency/index'), 'visible' => '1'),
                        array('label' => '<i class="fa fa-globe"></i> <span>Countries</span>', 'url' => array('/site/mastercountry/index'), 'visible' => '1'),
                        array('label' => '<i class="fa fa-bank"></i> <span>Cities</span>', 'url' => array('/site/mastercity/index'), 'visible' => '1'),
                        array('label' => '<i class="fa fa-barcode"></i> <span>Code Definition</span>', 'url' => array('/site/internalcodegenerate/setup'), 'visible' => '1'),
                        array('label' => '<i class="fa fa-binoculars"></i> <span>Destination</span>', 'url' => array('/site/masterdestination/index'), 'visible' => '1'),
                        array('label' => '<i class="fa fa-file-code-o"></i> <span>Document Status</span>', 'url' => array('/site/masterdocumentstatus/index'), 'visible' => '1'),
                        array('label' => '<i class="fa fa-file-audio-o"></i> <span>Document Type</span>', 'url' => array('/site/masterdocumenttype/index'), 'visible' => '1'),
                        array('label' => '<i class="fa fa-file"></i> <span>Documents</span>', 'url' => array('/site/masterdocument/index'), 'visible' => '1'),
                        array('label' => '<i class="fa fa-group"></i> <span>Internal position</span>', 'url' => array('/site/masterinternalposition/index'), 'visible' => '1'),
                        array('label' => '<i class="fa fa-bullseye"></i> <span>International Number</span>', 'url' => array('/site/masterinternationalnumber/index'), 'visible' => '1'),
                        array('label' => '<i class="fa fa-file-image-o"></i> <span>Labels</span>', 'url' => array('/site/masterlabel/index'), 'visible' => '1'),
                        array('label' => '<i class="fa fa-file-o"></i> <span>Legal Form</span>', 'url' => array('/site/masterlegalform/index'), 'visible' => '1'),
                        array('label' => '<i class="fa fa-language"></i> <span>Languages</span>', 'url' => array('/site/masterlanguage/index'), 'visible' => '1'),
                        array('label' => '<i class="fa fa-copyright"></i> <span>Managed rights</span>', 'url' => array('/site/mastermanagedrights/index'), 'visible' => '1'),
                        array('label' => '<i class="fa fa-cubes"></i> <span>Manufacturer</span>', 'url' => array('/site/mastermanufacturer/index'), 'visible' => '1'),
                        array('label' => '<i class="fa fa-female"></i> <span>Marital Status</span>', 'url' => array('/site/mastermaritalstatus/index'), 'visible' => '1'),
                        array('label' => '<i class="fa fa-flag"></i> <span>Nationalities</span>', 'url' => array('/site/masternationality/index'), 'visible' => '1'),
                        array('label' => '<i class="fa fa-building"></i> <span>Organization</span>', 'url' => array('/site/organization/index'), 'visible' => '1'),
                        array('label' => '<i class="fa fa-tty"></i> <span>Pseudonym Types</span>', 'url' => array('/site/masterpseudonymtypes/index'), 'visible' => '1'),
                        array('label' => '<i class="fa fa-paypal"></i> <span>Payment Methods</span>', 'url' => array('/site/masterpaymentmethod/index'), 'visible' => '1'),
                        array('label' => '<i class="fa fa-male"></i> <span>Profession</span>', 'url' => array('/site/masterprofession/index'), 'visible' => '1'),
                        array('label' => '<i class="fa fa-building-o"></i> <span>Region</span>', 'url' => array('/site/masterregion/index'), 'visible' => '1'),
                        array('label' => '<i class="fa fa-share-alt"></i> <span>Share Definition</span>', 'url' => array('/site/sharedefinitionperrole/index'), 'visible' => '1'),
                        array('label' => '<i class="fa fa-rupee"></i> <span>Tariff</span>', 'url' => array('/site/mastertariff/index'), 'visible' => '1'),
                        array('label' => '<i class="fa fa-list"></i> <span>Types</span>', 'url' => array('/site/mastertype/index'), 'visible' => '1'),
                        array('label' => '<i class="fa fa-desktop"></i> <span>Type (Places)</span>', 'url' => array('/site/masterplace/index'), 'visible' => '1'),
                        array('label' => '<i class="fa fa-newspaper-o"></i> <span>Types of events</span>', 'url' => array('/site/mastereventtype/index'), 'visible' => '1'),
                        array('label' => '<i class="fa fa-at"></i> <span>RightHolder Type</span>', 'url' => array('/site/mastertyperights/index'), 'visible' => '1'),
                        array('label' => '<i class="fa fa-video-camera"></i> <span>Studio</span>', 'url' => array('/site/masterstudio/index'), 'visible' => '1'),
                        array('label' => '<i class="fa fa-institution"></i> <span>Territories</span>', 'url' => array('/site/masterterritories/index'), 'visible' => '1'),
                        array('label' => '<i class="fa fa-suitcase"></i> <span>Works Category</span>', 'url' => array('/site/masterworkscategory/index'), 'visible' => '1'),
                    ),
                ),
                array('label' => '<i class="fa fa-briefcase"></i> <span>Documentation</span><i class="fa pull-right fa-angle-left"></i>', 'url' => '#',
                    'itemOptions' => array('class' => 'treeview'),
                    'submenuOptions' => array('class' => 'treeview-menu'),
                    'visible' => '1',
                    'items' => array(
                        array('label' => '<i class="fa fa-group"></i> <span>Members</span><i class="fa pull-right fa-angle-left"></i>', 'url' => '#',
                            'itemOptions' => array('class' => 'treeview innertree'),
                            'submenuOptions' => array('class' => 'treeview-menu'),
                            'items' => array(
                                array('label' => '<i class="fa fa-book"></i> <span>Author</span>', 'url' => array('/site/authoraccount/index'), 'visible' => '1'),
                                array('label' => '<i class="fa fa-music"></i> <span>Performer</span>', 'url' => array('/site/performeraccount/index'), 'visible' => '1'),
                                array('label' => '<i class="fa fa-microphone"></i> <span>Publisher</span>', 'url' => array('/site/publisheraccount/index'), 'visible' => '1'),
                                array('label' => '<i class="fa fa-money"></i> <span>Producer</span>', 'url' => array('/site/produceraccount/index'), 'visible' => '1'),
                                array('label' => '<i class="fa fa-book"></i> <span>Authors Group</span>', 'url' => array('/site/group/index/role/author'), 'visible' => UserIdentity::checkAccess($_id, 'group', 'view', 'authorgroup'), 'active' => $groupCheck['authorgroup']),
                                array('label' => '<i class="fa fa-music"></i> <span>Performers Group</span>', 'url' => array('/site/group/index/role/performer'), 'visible' => UserIdentity::checkAccess($_id, 'group', 'view', 'performergroup'), 'active' => $groupCheck['performergroup']),
                                array('label' => '<i class="fa fa-microphone"></i> <span>Publishers Group</span>', 'url' => array('/site/publishergroup/index/role/publisher'), 'visible' => UserIdentity::checkAccess($_id, 'publishergroup', 'view', 'publishergroup'), 'active' => $groupCheck['publishergroup']),
                                array('label' => '<i class="fa fa-money"></i> <span>Producers Group</span>', 'url' => array('/site/publishergroup/index/role/producer'), 'visible' => UserIdentity::checkAccess($_id, 'publishergroup', 'view', 'producergroup'), 'active' => $groupCheck['producergroup']),
                            ),
                        ),
                        array('label' => '<i class="fa fa-sliders"></i> <span>Works</span>', 'url' => array('/site/work/index'), 'visible' => UserIdentity::checkAccess($_id, 'work', 'view'), 'active' => $work_com_active['work']),
                        array('label' => '<i class="fa fa-volume-up"></i> <span>Recordings</span>', 'url' => array('/site/recording/index'), 'visible' => '1'),
                        array('label' => '<i class="fa fa-headphones"></i> <span>Sound Carriers</span>', 'url' => array('/site/soundcarrier/index'), 'visible' => '1'),
                        array('label' => '<i class="fa fa-file-audio-o"></i> <span>Recording Session Sheets</span>', 'url' => array('/site/recordingsession/index'), 'visible' => '1'),
                        array('label' => '<i class="fa fa-warning"></i> <span>Contract Expiry</span>', 'url' => array('/site/work/contractexpiry'), 'visible' => UserIdentity::checkAccess($_id, 'contractexpiry', 'view'), 'active' => $work_com_active['contractexpiry']),
                    ),
                ),
                array('label' => '<i class="fa fa-copyright"></i> <span>Licensing</span><i class="fa pull-right fa-angle-left"></i>', 'url' => '#',
                    'itemOptions' => array('class' => 'treeview'),
                    'submenuOptions' => array('class' => 'treeview-menu'),
                    'visible' => '1',
                    'items' => array(
                        array('label' => '<i class="fa fa-user"></i> <span>Users & Customers</span>', 'url' => array('/site/customeruser/index'), 'visible' => '1'),
                        array('label' => '<i class="fa fa-shield"></i> <span>Inspectors</span>', 'url' => array('/site/inspector/index'), 'visible' => '1'),
                        array('label' => '<i class="fa fa-cny"></i> <span>Contract</span>', 'url' => array('/site/tariffcontracts/index'), 'visible' => '1'),
                        array('label' => '<i class="fa fa-file-text"></i> <span>Invoices</span>', 'url' => array('/site/contractinvoice/index'), 'visible' => '1'),
                        array('label' => '<i class="fa fa-envelope"></i> <span>Email Templates</span>', 'url' => array('/site/emailtemplate/index'), 'visible' => '1'),
                    ),
                ),
                array('label' => '<i class="fa fa-pie-chart"></i> <span>Distribution</span><i class="fa pull-right fa-angle-left"></i>', 'url' => '#',
                    'itemOptions' => array('class' => 'treeview'),
                    'submenuOptions' => array('class' => 'treeview-menu'),
                    'visible' => '1',
                    'items' => array(
                        array('label' => '<i class="fa fa-puzzle-piece"></i> <span>Class</span>', 'url' => array('/site/distributionclass/index'), 'visible' => '1'),
                        array('label' => '<i class="fa fa-paw"></i> <span>Sub-Class</span>', 'url' => array('/site/distributionsubclass/index'), 'visible' => '1'),
                        array('label' => '<i class="fa fa-calendar"></i> <span>Setting Dates</span>', 'url' => array('/site/distributionsetting/index'), 'visible' => '1'),
                        array('label' => '<i class="fa fa-area-chart"></i> <span>Utlization Periods</span>', 'url' => array('/site/distributionutlizationperiod/index'), 'visible' => '1'),
//                        array('label' => '<i class="fa fa-bar-chart"></i> <span>LogSheets</span>', 'url' => array('/site/default/logsheet'), 'visible' => '1'),
                    ),
                ),
            ),
            'htmlOptions' => array('class' => 'sidebar-menu')
        ));
        ?>
    </section>
</aside>
