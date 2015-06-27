<?php
$this->title = 'Dashboard';
$this->breadcrumbs = array(
    $this->title
);
?>
<!-- Small boxes (Stat box) -->
<div class="row">

    <?php
    $author_count = AuthorAccount::model()->count();
    $author_reg_count = AuthorManageRights::model()->count();
    $performer_count = PerformerAccount::model()->count();
    $performer_reg_count = PerformerRelatedRights::model()->count();
    ?>
    <div class="col-lg-3 col-xs-6">

        <div class="small-box bg-red">
            <div class="inner">
                <h3><?php echo $author_count ?></h3>
                <p>Reg. Authors</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>

            <a href="#" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">

        <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?php echo $performer_count ?></h3>
                <p>Reg. Performers</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">

        <div class="small-box bg-aqua">
            <div class="inner">
                <?php
                $uncompleted_profie_auth = ($author_count - $author_reg_count);
                $uncompleted_profie_perf = ($performer_count - $performer_reg_count);
                ?>
                <h3><?php echo $uncompleted_profie_auth + $uncompleted_profie_perf ?></h3>
                <p>Uncompleted Records</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>


    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
            <div class="inner">
                <h3>0</h3>
                <p>Registered works</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>


<div class="row">

    <section class="col-lg-7 connectedSortable">

        <div class="box box-success">
            <div class="box-header">
                <i class="fa fa-comments-o"></i>
                <h3 class="box-title">Support Chat</h3>
                <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
                    <div class="btn-group" data-toggle="btn-toggle" >
                        <button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i></button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
                    </div>
                </div>
            </div>
            <div class="box-body chat" id="chat-box">
                <!-- chat item -->
                <div class="item">
                    <?php echo CHtml::image("{$this->themeUrl}/img/avatar.png", '', array('class' => 'img-circle', 'alt' => 'User Image')); ?>
                    <p class="message">
                        <a href="#" class="name">
                            <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>
                            User 1
                        </a>
                        Unable to log in to my account. Please fix this issue
                    </p>
                    <div class="attachment">
                        <h4>Attachments:</h4>
                        <p class="filename">
                            Issue-page.jpg
                        </p>
                        <div class="pull-right">
                            <button class="btn btn-primary btn-sm btn-flat">Open</button>
                        </div>
                    </div><!-- /.attachment -->
                </div><!-- /.item -->
                <!-- chat item -->
                <div class="item">
                    <?php echo CHtml::image("{$this->themeUrl}/img/avatar2.png", '', array('class' => 'img-circle', 'alt' => 'User Image')); ?>
                    <p class="message">
                        <a href="#" class="name">
                            <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:15</small>
                            Admin
                        </a>
                        Hi User 1, We will fix this issue as soon as possible. Please wait for our mail.
                    </p>
                </div><!-- /.item -->
                <!-- chat item -->
                <div class="item">
                    <?php echo CHtml::image("{$this->themeUrl}/img/avatar3.png", '', array('class' => 'img-circle', 'alt' => 'User Image')); ?>
                    <p class="message">
                        <a href="#" class="name">
                            <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:30</small>
                            User 2
                        </a>
                        I would like to add more options in my account.
                    </p>
                </div><!-- /.item -->
            </div><!-- /.chat -->
            <div class="box-footer">
                <div class="input-group">
                    <input class="form-control" placeholder="Type message..."/>
                    <div class="input-group-btn">
                        <button class="btn btn-success"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
            </div>
        </div><!-- /.box (chat box) -->





    </section>
    <section class="col-lg-5 connectedSortable">
        <div class="box box-primary">
            <div class="box-header">
                <i class="ion ion-clipboard"></i>
                <h3 class="box-title">Contract period Expiry</h3>
            </div>
            <div class="box-body">
                <?php 
                $publisher_expiry_count = WorkPublishing::model()->expiry()->count();
                $sub_publisher_expiry_count = WorkSubPublishing::model()->expiry()->count();
                ?>
                <ul class="todo-list">
                    <li>
                        <?php 
                        $text = '<span class="text">No. of Publisher contract expiry: </span>&nbsp;<small class="badge bg-red">'.$publisher_expiry_count.'</small>';
                        echo CHtml::link($text, array('/site/work/contractexpiry'), array());
                        ?>
                        <!--<small class="label label-danger"><i class="fa fa-clock-o"></i> 20 mins</small>-->
                    </li>
                    <li>
                        <?php 
                        $text = '<span class="text">No. of Sub-Publisher contract expiry: </span>&nbsp;<small class="badge bg-red">'.$sub_publisher_expiry_count.'</small>';
                        echo CHtml::link($text, array('/site/work/contractexpiry'), array());
                        ?>
                        
                    </li>
                </ul>
            </div>
        </div>
    </section>
</div>
