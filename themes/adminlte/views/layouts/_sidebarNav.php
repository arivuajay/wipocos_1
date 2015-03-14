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
        $this->widget('zii.widgets.CMenu', array(
            'activateParents' => true,
            'encodeLabel' => false,
            'activateItems' => true,
            'items' => array(
                array('label' => '<i class="fa fa-dashboard"></i> <span>Dashboard</span>', 'url' => Yii::app()->homeUrl),
                array('label' => '<i class="fa fa-th"></i> <span>Document Activities</span>', 'url' => '#'),
                array('label' => '<i class="fa fa-laptop"></i> <span>Distribution Activities</span>', 'url' => '#'),
                array('label' => '<i class="fa fa-th"></i> <span>International Databases</span>', 'url' => '#'),
                array('label' => '<i class="fa fa-user"></i> <span>Users & Customers</span>', 'url' => '#'),
                array('label' => '<i class="fa fa-th"></i> <span>Administration</span><i class="fa pull-right fa-angle-left"></i>', 'url' => '#',
                    'itemOptions' => array('class' => 'treeview'),
                    'submenuOptions' => array('class' => 'treeview-menu'),
                    'items' => array(
                        array('label' => '<i class="fa fa-user"></i> <span>User</span>', 'url' => array('/site/user/index')),
                        array('label' => '<i class="fa fa-music"></i> <span>Security Roles</span>', 'url' => array('/site/masterrole/index')),
                        array('label' => '<i class="fa fa-male"></i> <span>Profession</span>', 'url' => array('/site/masterprofession/index')),
                        array('label' => '<i class="fa fa-group"></i> <span>Internal position</span>', 'url' => array('/site/masterinternalposition/index')),
                    ),
                ),
                array('label' => '<i class="fa fa-th"></i> <span>Documents</span><i class="fa pull-right fa-angle-left"></i>', 'url' => '#',
                    'itemOptions' => array('class' => 'treeview'),
                    'submenuOptions' => array('class' => 'treeview-menu'),
                    'items' => array(
                        array('label' => '<i class="fa fa-file-code-o"></i> <span>Document Status</span>', 'url' => array('/site/masterdocumentstatus/index')),
                        array('label' => '<i class="fa fa-file-audio-o"></i> <span>Document Type</span>', 'url' => array('/site/masterdocumenttype/index')),
                        array('label' => '<i class="fa fa-file"></i> <span>Documents</span>', 'url' => array('/site/masterdocument/index')),
                        array('label' => '<i class="fa fa-file-o"></i> <span>Legal Form</span>', 'url' => array('/site/masterlegalform/index')),
                    ),
                ),
                array('label' => '<i class="fa fa-th"></i> <span>Rights</span><i class="fa pull-right fa-angle-left"></i>', 'url' => '#',
                    'itemOptions' => array('class' => 'treeview'),
                    'submenuOptions' => array('class' => 'treeview-menu'),
                    'items' => array(
                        array('label' => '<i class="fa fa-at"></i> <span>Type of Rights</span>', 'url' => array('/site/mastertyperights/index')),
                        array('label' => '<i class="fa fa-copyright"></i> <span>Managed rights</span>', 'url' => array('/site/mastermanagedrights/index')),
                    ),
                ),
                array('label' => '<i class="fa fa-th"></i> <span>Localities</span><i class="fa pull-right fa-angle-left"></i>', 'url' => '#',
                    'itemOptions' => array('class' => 'treeview'),
                    'submenuOptions' => array('class' => 'treeview-menu'),
                    'items' => array(
                        array('label' => '<i class="fa fa-globe"></i> <span>Countries</span>', 'url' => array('/site/mastercountry/index')),
                        array('label' => '<i class="fa fa-flag"></i> <span>Nationalities</span>', 'url' => array('/site/masternationality/index')),
                        array('label' => '<i class="fa fa-language"></i> <span>Languages</span>', 'url' => array('/site/masterlanguage/index')),
                        array('label' => '<i class="fa fa-institution"></i> <span>Territories</span>', 'url' => array('/site/masterterritories/index')),
                        array('label' => '<i class="fa fa-building-o"></i> <span>Region</span>', 'url' => array('/site/masterregion/index')),
                    ),
                ),
                array('label' => '<i class="fa fa-th"></i> <span>Types</span><i class="fa pull-right fa-angle-left"></i>', 'url' => '#',
                    'itemOptions' => array('class' => 'treeview'),
                    'submenuOptions' => array('class' => 'treeview-menu'),
                    'items' => array(
                        array('label' => '<i class="fa fa-paypal"></i> <span>Payment Methods</span>', 'url' => array('/site/masterpaymentmethod/index')),
                        array('label' => '<i class="fa fa-newspaper-o"></i> <span>Types of events</span>', 'url' => array('/site/mastereventtype/index')),
                        array('label' => '<i class="fa fa-female"></i> <span>Marital Status</span>', 'url' => array('/site/mastermaritalstatus/index')),
                        array('label' => '<i class="fa fa-tty"></i> <span>Pseudonym Types</span>', 'url' => array('/site/masterpseudonymtypes/index')),
                        array('label' => '<i class="fa fa-suitcase"></i> <span>Works Category</span>', 'url' => array('/site/masterworkscategory/index')),
                    ),
                ),
            ),
            'htmlOptions' => array('class' => 'sidebar-menu')
        ));
        ?>
    </section>
</aside>
