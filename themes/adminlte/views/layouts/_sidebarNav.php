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
                        array('label' => '<i class="fa fa-th"></i> <span>Security Roles</span>', 'url' => array('/site/masterrole/index')),
                        array('label' => '<i class="fa fa-plane"></i> <span>Countries</span>', 'url' => array('/site/mastercountry/index')),
                    ),
                ),
            ),
            'htmlOptions' => array('class' => 'sidebar-menu')
        ));
        ?>
    </section>
</aside>
