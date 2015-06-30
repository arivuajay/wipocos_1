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
        
        if($_controller=='group'){
            if(isset($_REQUEST['role'])){
                $auth_group = $_REQUEST['role'] == 'author';
                $perf_group = $_REQUEST['role'] == 'performer';
            }elseif(isset($_REQUEST['id'])){
                $group = Group::model()->findByPk($_REQUEST['id']);
                $auth_group = $group->Group_Is_Author == '1';
                $perf_group = $group->Group_Is_Performer == '1';
            }
        }elseif($_controller=='publishergroup'){
            if(isset($_REQUEST['role'])){
                $pub_group = $_REQUEST['role'] == 'publisher';
                $pro_group = $_REQUEST['role'] == 'producer';
            }elseif(isset($_REQUEST['id'])){
                $group = PublisherGroup::model()->findByPk($_REQUEST['id']);
                $pub_group = $group->Pub_Group_Is_Publisher == '1';
                $pro_group = $group->Pub_Group_Is_Producer == '1';
            }
        }elseif($_controller=='work'){
            $contract_expiry = $_action == 'contractexpiry';
            if(!$contract_expiry)
                $work = true;
        }
        $this->widget('application.components.MyMenu', array(
            'activateParents' => true,
            'encodeLabel' => false,
            'activateItems' => true,
            'items' => array(
                array('label' => '<i class="fa fa-dashboard"></i> <span>Dashboard</span>', 'url' => Yii::app()->homeUrl, 'active' => $_controller=='default'),
                array('label' => '<i class="fa fa-briefcase"></i> <span>Administration</span><i class="fa pull-right fa-angle-left"></i>', 'url' => '#',
                    'itemOptions' => array('class' => 'treeview'),
                    'submenuOptions' => array('class' => 'treeview-menu'),
                    'items' => array(
                        array('label' => '<i class="fa fa-weixin"></i> <span>Society</span>', 'url' => array('/site/society/index'), 'active' => $_controller=='society', 'visible' => UserIdentity::checkAccess($_id, 'society', 'view')),
                        array('label' => '<i class="fa fa-music"></i> <span>Roles</span>', 'url' => array('/site/masterrole/index'), 'active' => $_controller=='masterrole', 'visible' => UserIdentity::checkAccess($_id, 'masterrole', 'view')),
                        array('label' => '<i class="fa fa-user"></i> <span>Operator</span>', 'url' => array('/site/user/index'), 'active' => $_controller=='user', 'visible' => UserIdentity::checkAccess($_id, 'society', 'user')),
                    ),
                ),
                array('label' => '<i class="fa fa-cog"></i> <span>Master</span><i class="fa pull-right fa-angle-left"></i>', 'url' => '#',
                    'itemOptions' => array('class' => 'treeview'),
                    'submenuOptions' => array('class' => 'treeview-menu'),
                    'items' => array(
                        array('label' => '<i class="fa fa-usd"></i> <span>Currencies</span>', 'url' => array('/site/mastercurrency/index'), 'active' => $_controller=='mastercurrency', 'visible' => UserIdentity::checkAccess($_id, 'mastercurrency', 'view')),
                        array('label' => '<i class="fa fa-globe"></i> <span>Countries</span>', 'url' => array('/site/mastercountry/index'), 'active' => $_controller=='mastercountry', 'visible' => UserIdentity::checkAccess($_id, 'mastercountry', 'view')),
                        array('label' => '<i class="fa fa-file-code-o"></i> <span>Document Status</span>', 'url' => array('/site/masterdocumentstatus/index'), 'active' => $_controller=='masterdocumentstatus', 'visible' => UserIdentity::checkAccess($_id, 'masterdocumentstatus', 'view')),
                        array('label' => '<i class="fa fa-file-audio-o"></i> <span>Document Type</span>', 'url' => array('/site/masterdocumenttype/index'), 'active' => $_controller=='masterdocumenttype', 'visible' => UserIdentity::checkAccess($_id, 'masterdocumenttype', 'view')),
                        array('label' => '<i class="fa fa-file"></i> <span>Documents</span>', 'url' => array('/site/masterdocument/index'), 'active' => $_controller=='masterdocument', 'visible' => UserIdentity::checkAccess($_id, 'masterdocument', 'view')),
                        array('label' => '<i class="fa fa-group"></i> <span>Internal position</span>', 'url' => array('/site/masterinternalposition/index'), 'active' => $_controller=='masterinternalposition', 'visible' => UserIdentity::checkAccess($_id, 'masterinternalposition', 'view')),
                        array('label' => '<i class="fa fa-bullseye"></i> <span>International Number</span>', 'url' => array('/site/masterinternationalnumber/index'), 'active' => $_controller=='masterinternationalnumber', 'visible' => UserIdentity::checkAccess($_id, 'masterinternationalnumber', 'view')),
                        array('label' => '<i class="fa fa-file-image-o"></i> <span>Labels</span>', 'url' => array('/site/masterlabel/index'), 'active' => $_controller=='masterlabel', 'visible' => UserIdentity::checkAccess($_id, 'masterlabel', 'view')),
                        array('label' => '<i class="fa fa-file-o"></i> <span>Legal Form</span>', 'url' => array('/site/masterlegalform/index'), 'active' => $_controller=='masterlegalform', 'visible' => UserIdentity::checkAccess($_id, 'masterlegalform', 'view')),
                        array('label' => '<i class="fa fa-language"></i> <span>Languages</span>', 'url' => array('/site/masterlanguage/index'), 'active' => $_controller=='masterlanguage', 'visible' => UserIdentity::checkAccess($_id, 'masterlanguage', 'view')),
                        array('label' => '<i class="fa fa-copyright"></i> <span>Managed rights</span>', 'url' => array('/site/mastermanagedrights/index'), 'active' => $_controller=='mastermanagedrights', 'visible' => UserIdentity::checkAccess($_id, 'mastermanagedrights', 'view')),
                        array('label' => '<i class="fa fa-female"></i> <span>Marital Status</span>', 'url' => array('/site/mastermaritalstatus/index'), 'active' => $_controller=='mastermaritalstatus', 'visible' => UserIdentity::checkAccess($_id, 'mastermaritalstatus', 'view')),
                        array('label' => '<i class="fa fa-flag"></i> <span>Nationalities</span>', 'url' => array('/site/masternationality/index'), 'active' => $_controller=='masternationality', 'visible' => UserIdentity::checkAccess($_id, 'masternationality', 'view')),
                        array('label' => '<i class="fa fa-building"></i> <span>Organization</span>', 'url' => array('/site/organization/index'), 'active' => $_controller=='organization', 'visible' => UserIdentity::checkAccess($_id, 'organization', 'view')),
                        array('label' => '<i class="fa fa-tty"></i> <span>Pseudonym Types</span>', 'url' => array('/site/masterpseudonymtypes/index'), 'active' => $_controller=='masterpseudonymtypes', 'visible' => UserIdentity::checkAccess($_id, 'masterpseudonymtypes', 'view')),
                        array('label' => '<i class="fa fa-paypal"></i> <span>Payment Methods</span>', 'url' => array('/site/masterpaymentmethod/index'), 'active' => $_controller=='masterpaymentmethod', 'visible' => UserIdentity::checkAccess($_id, 'masterpaymentmethod', 'view')),
                        array('label' => '<i class="fa fa-male"></i> <span>Profession</span>', 'url' => array('/site/masterprofession/index'), 'active' => $_controller=='masterprofession', 'visible' => UserIdentity::checkAccess($_id, 'masterprofession', 'view')),
                        array('label' => '<i class="fa fa-building-o"></i> <span>Region</span>', 'url' => array('/site/masterregion/index'), 'active' => $_controller=='masterregion', 'visible' => UserIdentity::checkAccess($_id, 'masterregion', 'view')),
                        array('label' => '<i class="fa fa-share-alt"></i> <span>Share Definition</span>', 'url' => array('/site/sharedefinitionperrole/index'), 'active' => $_controller=='sharedefinitionperrole', 'visible' => UserIdentity::checkAccess($_id, 'sharedefinitionperrole', 'view')),
                        array('label' => '<i class="fa fa-list"></i> <span>Types</span>', 'url' => array('/site/mastertype/index'), 'active' => $_controller=='mastertype', 'visible' => UserIdentity::checkAccess($_id, 'mastertype', 'view')),
                        array('label' => '<i class="fa fa-newspaper-o"></i> <span>Types of events</span>', 'url' => array('/site/mastereventtype/index'), 'active' => $_controller=='mastereventtype', 'visible' => UserIdentity::checkAccess($_id, 'mastereventtype', 'view')),
                        array('label' => '<i class="fa fa-at"></i> <span>RightHolder Type</span>', 'url' => array('/site/mastertyperights/index'), 'active' => $_controller=='mastertyperights', 'visible' => UserIdentity::checkAccess($_id, 'mastertyperights', 'view')),
                        array('label' => '<i class="fa fa-institution"></i> <span>Territories</span>', 'url' => array('/site/masterterritories/index'), 'active' => $_controller=='masterterritories', 'visible' => UserIdentity::checkAccess($_id, 'masterterritories', 'view')),
                        array('label' => '<i class="fa fa-suitcase"></i> <span>Works Category</span>', 'url' => array('/site/masterworkscategory/index'), 'active' => $_controller=='masterworkscategory', 'visible' => UserIdentity::checkAccess($_id, 'masterworkscategory', 'view')),
                    ),
                ),
                array('label' => '<i class="fa fa-briefcase"></i> <span>Documentation</span><i class="fa pull-right fa-angle-left"></i>', 'url' => '#',
                    'itemOptions' => array('class' => 'treeview'),
                    'submenuOptions' => array('class' => 'treeview-menu'),
                    'items' => array(
                        array('label' => '<i class="fa fa-group"></i> <span>Members</span><i class="fa pull-right fa-angle-left"></i>', 'url' => '#',
                            'itemOptions' => array('class' => 'treeview innertree'),
                            'submenuOptions' => array('class' => 'treeview-menu'),
                            'items' => array(
                                array('label' => '<i class="fa fa-book"></i> <span>Author</span>', 'url' => array('/site/authoraccount/index'), 'active' => $_controller=='authoraccount', 'visible' => UserIdentity::checkAccess($_id, 'authoraccount', 'view')),
                                array('label' => '<i class="fa fa-music"></i> <span>Performer</span>', 'url' => array('/site/performeraccount/index'), 'active' => $_controller=='performeraccount', 'visible' => UserIdentity::checkAccess($_id, 'performeraccount', 'view')),
                                array('label' => '<i class="fa fa-microphone"></i> <span>Publisher</span>', 'url' => array('/site/publisheraccount/index'), 'active' => $_controller=='publisheraccount', 'visible' => UserIdentity::checkAccess($_id, 'publisheraccount', 'view')),
                                array('label' => '<i class="fa fa-money"></i> <span>Producer</span>', 'url' => array('/site/produceraccount/index'), 'active' => $_controller=='produceraccount', 'visible' => UserIdentity::checkAccess($_id, 'produceraccount', 'view')),
                                array('label' => '<i class="fa fa-book"></i> <span>Authors Group</span>', 'url' => array('/site/group/index/role/author'), 'active' => $auth_group, 'visible' => UserIdentity::checkAccess($_id, 'group', 'view')),
                                array('label' => '<i class="fa fa-music"></i> <span>Performers Group</span>', 'url' => array('/site/group/index/role/performer'), 'active' => $perf_group, 'visible' => UserIdentity::checkAccess($_id, 'group', 'view')),
                                array('label' => '<i class="fa fa-microphone"></i> <span>Publishers Group</span>', 'url' => array('/site/publishergroup/index/role/publisher'), 'active' => $pub_group, 'visible' => UserIdentity::checkAccess($_id, 'publishergroup', 'view')),
                                array('label' => '<i class="fa fa-money"></i> <span>Producers Group</span>', 'url' => array('/site/publishergroup/index/role/producer'), 'active' => $pro_group, 'visible' => UserIdentity::checkAccess($_id, 'publishergroup', 'view')),
                            ),
                        ),
                        array('label' => '<i class="fa fa-sliders"></i> <span>Works</span>', 'url' => array('/site/work/index'), 'active' => $work, 'visible' => UserIdentity::checkAccess($_id, 'work', 'view')),
                        array('label' => '<i class="fa fa-volume-up"></i> <span>Recordings</span>', 'url' => array('/site/recording/index'), 'active' => $_controller=='recording', 'visible' => UserIdentity::checkAccess($_id, 'recording', 'view')),
                        array('label' => '<i class="fa fa-warning"></i> <span>Contract Expiry</span>', 'url' => array('/site/work/contractexpiry'), 'active' => $contract_expiry, 'visible' => UserIdentity::checkAccess($_id, 'work', 'contractexpiry')),
                    ),
                ),
//                array('label' => '<i class="fa fa-group"></i> <span>Members</span><i class="fa pull-right fa-angle-left"></i>', 'url' => '#',
//                    'itemOptions' => array('class' => 'treeview'),
//                    'submenuOptions' => array('class' => 'treeview-menu'),
//                    'items' => array(
//                        array('label' => '<i class="fa fa-book"></i> <span>Authors</span>', 'url' => array('/site/group/index/role/author'), 'active' => $_controller=='authoraccount'),
//                        array('label' => '<i class="fa fa-music"></i> <span>Performers</span>', 'url' => array('/site/group/index/role/performer'), 'active' => $_controller=='authoraccount'),
//                        array('label' => '<i class="fa fa-microphone"></i> <span>Publishers</span>', 'url' => array('/site/publishergroup/index/role/publisher'), 'active' => $_controller=='authoraccount'),
//                        array('label' => '<i class="fa fa-money"></i> <span>Producers</span>', 'url' => array('/site/publishergroup/index/role/producer'), 'active' => $_controller=='authoraccount'),
//                    ),
//                ),
//                array('label' => '<i class="fa fa-th"></i> <span>Number Assignment</span>', 'url' => array('/site/numberassignment/index'), 'active' => $_controller=='authoraccount'),
            ),
            'htmlOptions' => array('class' => 'sidebar-menu')
        ));
        ?>
    </section>
</aside>
