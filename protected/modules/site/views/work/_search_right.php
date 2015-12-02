<!--<div class="col-lg-12 row">
    <div class="col-lg-12 col-md-12">
        <label class="control-label">Spotlight Search: </label>
        <input type="text" class="form-control inline" name="base_table_search" id="base_table_search" />
    </div>
</div>-->
<div class="col-lg-12">
    <div class="box-body">
        <div class="form-group foundation">
            <div class="box-header">
                <div class="col-lg-12 col-md-12">
                    <h3 class="box-title">Rightholders</h3>
                </div>

            </div>
            <div class="box-body"  style="max-height: 300px; overflow-y: scroll">
                <div class="col-lg-12 col-md-12 row">
                    <table id="search_result" class="table table-bordered selectable table-datatable">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Internal Code</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($authusers) || !empty($publusers) || !empty($perfusers) || !empty($produsers)) {
                                if ($authusers) {
                                    foreach ($authusers as $key => $user)
                                        echo $user->authorRHRow;
                                }

                                if ($publusers) {
                                    foreach ($publusers as $key => $user)
                                        echo $user->publisherRHRow;
                                }

                                if ($perfusers) {
                                    foreach ($perfusers as $key => $user)
                                        echo $user->performerRHRow;
                                }

                                if ($produsers) {
                                    foreach ($produsers as $key => $user)
                                        echo $user->producerRHRow;
                                }
                            } else {
                                echo '<tr class="empty-record"><td colspan="3" class="errorMessage text-center">No Users Found</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="pull-right">
        <?php
        if ($_REQUEST['is_auth'] == '1') {
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'New Author',
                'context' => 'success',
                'htmlOptions' => array(
//                'class' => 'hide',
                    'id' => 'newauthorbutton',
                    'data-toggle' => 'modal',
                    'data-target' => '#newauthorModal',
                    'onclick' => '{$("#author-dismiss").trigger("click");}'
                ),
                    )
            );
        }
        if ($_REQUEST['is_publ'] == '1') {
            echo "&nbsp;&nbsp;";
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'New Publisher',
                'context' => 'success',
                'htmlOptions' => array(
//                'class' => 'hide',
                    'id' => 'newpublisherbutton',
                    'data-toggle' => 'modal',
                    'data-target' => '#newpublisherModal',
                    'onclick' => '{$("#publisher-dismiss").trigger("click");}'
                ),
                    )
            );
        }
        if ($_REQUEST['is_perf'] == '1') {
            echo "&nbsp;&nbsp;";
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'New Performer',
                'context' => 'success',
                'htmlOptions' => array(
//                'class' => 'hide',
                    'id' => 'newperformerbutton',
                    'data-toggle' => 'modal',
                    'data-target' => '#newperformerModal',
                    'onclick' => '{$("#performer-dismiss").trigger("click");}'
                ),
                    )
            );
        }
        if ($_REQUEST['is_prod'] == '1') {
            echo "&nbsp;&nbsp;";
            $this->widget(
                    'application.components.MyTbButton', array(
                'label' => 'New Producer',
                'context' => 'success',
                'htmlOptions' => array(
//                'class' => 'hide',
                    'id' => 'newproducerbutton',
                    'data-toggle' => 'modal',
                    'data-target' => '#newproducerModal',
                    'onclick' => '{$("#producer-dismiss").trigger("click");}'
                ),
                    )
            );
        }
        ?>
    </div>
</div>
