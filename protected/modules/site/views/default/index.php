<?php
$this->title = 'Dashboard';
$this->breadcrumbs = array(
    $this->title
);
?>
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-xs-6">

        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>65</h3>
                <p>Albums</p>
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

        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>68</h3>
                <p>Performer</p>
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

        <div class="small-box bg-red">
            <div class="inner">
                <h3>8956</h3>
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

        <div class="small-box bg-green">
            <div class="inner">
                <h3>65<sup style="font-size: 20px">%</sup></h3>
                <p>Payment due</p>
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
                <h3 class="box-title">Chat</h3>
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



        
        
    </section><!-- /.Left col -->
    <!-- right col (We are only adding the ID to make the widgets sortable)-->
    <section class="col-lg-5 connectedSortable">
        <!-- Calendar -->
        <!-- TO DO List -->
        <div class="box box-primary">
            <div class="box-header">
                <i class="ion ion-clipboard"></i>
                <h3 class="box-title">Board Meeting</h3>
                <div class="box-tools pull-right">
                    <ul class="pagination pagination-sm inline">
                        <li><a href="#">&laquo;</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <ul class="todo-list">
                    <li>
                        <!-- drag handle -->
                        <span class="handle">
                            <i class="fa fa-ellipsis-v"></i>
                            <i class="fa fa-ellipsis-v"></i>
                        </span>
                        <!-- checkbox -->
                        <input type="checkbox" value="" name=""/>
                        <!-- todo text -->
                        <span class="text">Discussion about new album registration</span>
                        <!-- Emphasis label -->
                        <small class="label label-danger"><i class="fa fa-clock-o"></i> 20 mins</small>
                        <!-- General tools such as edit or delete-->
                        <div class="tools">
                            <i class="fa fa-edit"></i>
                            <i class="fa fa-trash-o"></i>
                        </div>
                    </li>

                </ul>
            </div><!-- /.box-body -->
            <div class="box-footer clearfix no-border">
                <button class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
            </div>
        </div><!-- /.box -->

    </section><!-- right col -->
</div><!-- /.row (main row) -->
