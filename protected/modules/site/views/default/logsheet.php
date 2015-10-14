<?php
$this->title = 'Logsheets';
$this->breadcrumbs = array(
    'Logsheets'
);
?>

<div class="box box-primary">

    <form method="get" action="/wipocos_1/branches/dev/site/work/update/id/7/tab/7" id="work-rightholder-search-form" onsubmit="return false;" class="form-horizontal MultiFile-intercepted" role="form">    

        <div class="col-lg-12">
            <div class="box-body">
                <div class="form-group foundation">
                    <div class="box-header">
                        <h3 class="box-title">Class</h3>
                    </div>
                    <div class="box-body">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <input type="text" id="WorkRightholder_Work_Right_Broad_Share" name="WorkRightholder[Work_Right_Broad_Share]" maxlength="10" class="form-control" value="Asian Paints" readonly="">                               
                                <div style="display:none" id="WorkRightholder_Work_Right_Broad_Share_em_" class="errorMessage"></div>                        
                            </div>

                            <div class="form-group">
                                <label for="DistributionClass_Class_Internal_Code" class="">Year</label>                    
                                <input type="text" id="WorkRightholder_Work_Right_Broad_Share" name="WorkRightholder[Work_Right_Broad_Share]" maxlength="10" class="form-control" value="2015" readonly="">                               
                                <div style="display:none" id="WorkRightholder_Work_Right_Broad_Share_em_" class="errorMessage"></div>                        
                            </div>
                            
                        </div>
                        <div class="col-lg-1"></div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label for="DistributionClass_Class_Internal_Code" class="col-sm-2 control-label required">Period </label>                    
                                <div class="col-sm-5">
                                    <div class="form-group">

                                        <div class="col-lg-12">
                                            <input type="text" value="2015-04-01" id="DistributionClass_Class_Internal_Code" name="DistributionClass[Class_Internal_Code]" readonly="readonly" maxlength="255" size="60" class="form-control">                        
                                        </div>
                                        <div class="col-lg-13">
                                            <input type="text" value="2016-04-08" id="DistributionClass_Class_Internal_Code" name="DistributionClass[Class_Internal_Code]" readonly="readonly" maxlength="255" size="60" class="form-control">                        
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="DistributionClass_Class_Internal_Code" class="col-sm-2 control-label required">Account</label>                    
                                <div class="col-sm-5">
                                    <input type="text" value="2015-05-01" id="DistributionClass_Class_Internal_Code" name="DistributionClass[Class_Internal_Code]" readonly="readonly" maxlength="255" size="60" class="form-control">                        <div style="display:none" id="DistributionClass_Class_Internal_Code_em_" class="errorMessage"></div>                    </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="box-body">
                <div class="form-group foundation">
                    <div class="box-body">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label for="Work_Work_Factor_Id" class=" required">Users <span class="required">*</span></label>                                    <select id="Work_Work_Factor_Id" name="Work[Work_Factor_Id]" class="form-control">
                                    <option selected="selected" value="5">FULBARI F.M. 100.6 MHZ (#9104)</option>
                                    <option value="1">ABCD F.M. 100.6 MHZ (#9104)</option>
                                </select>                                    <div style="display:none" id="Work_Work_Factor_Id_em_" class="errorMessage"></div>                                </div>

                        </div>
                        <div class="col-lg-1"></div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label for="Work_Work_Factor_Id" class=" required">Place <span class="required">*</span></label>                                    <select id="Work_Work_Factor_Id" name="Work[Work_Factor_Id]" class="form-control">
                                    <option selected="selected" value="5">RADIOS</option>
                                    <option value="1">TELEVISIONS</option>
                                </select>                                    <div style="display:none" id="Work_Work_Factor_Id_em_" class="errorMessage"></div>                                </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>



    </form>
    <form method="get" action="/wipocos_1/branches/dev/site/work/update/id/7/tab/7" id="work-rightholder-search-form" onsubmit="return false;" class="form-horizontal MultiFile-intercepted" role="form">    <div class="col-lg-12">
            <div class="box-body">
                <div class="form-group foundation">
                    <div class="box-header">
                        <h3 class="box-title">Search</h3>
                    </div>
                    <div class="box-body">
                        <p class="help-inline">Enter the begin of the name or internal code or one of the following criteria:</p>
                        <div class="col-lg-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="" class="control-label">Search</label>                                
                                    <input type="text" id="searach_text" name="searach_text" class="form-control">                            
                                </div>
                                <div class="form-group">
                                    <input type="button" value="Search" id="search_button" name="rght_holder" class="btn btn-success">                                                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>    
    <form method="post" action="/wipocos_1/branches/dev/site/work/update/id/7/tab/7" id="work-rightholder-form" class="form-horizontal MultiFile-intercepted" role="form"><input type="hidden" id="WorkRightholder_Work_Id" name="WorkRightholder[Work_Id]" value="7"><input type="hidden" id="WorkRightholder_Work_Member_GUID" name="WorkRightholder[Work_Member_GUID]" value="c08b44ca-14e4-11e5-b10a-74d435d335fe"><input type="hidden" id="WorkRightholder_Work_Member_Internal_Code" name="WorkRightholder[Work_Member_Internal_Code]" value="SOC-A-0001004">

        <div id="search_right_result"><!--<div class="col-lg-12 row">
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
                                <h3 class="box-title">Recordings</h3>
                            </div>

                        </div>
                        <div style="max-height: 300px; overflow-y: scroll" class="box-body">
                            <div class="col-lg-12 col-md-12 row">
                                <table class="table table-bordered selectable table-datatable" id="search_result">
                                    <thead>
                                        <tr>
                                            <th>Original Title</th>
                                            <th>Internal Code</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr data-intcode="SOC-A-0001003" data-name="Robert Van" data-uid="c08b4443-14e4-11e5-b10a-74d435d335fe" data-urole="AU">
                                            <td>As long as </td>
                                            <td>SOC-T-0000105</td>
                                        </tr>
                                        <tr data-intcode="SOC-A-0001004" data-name="Micheal Geo" data-uid="c08b44ca-14e4-11e5-b10a-74d435d335fe" data-urole="AU" class="highlight">
                                            <td>dookie</td>
                                            <td>SOC-T-0001004</td>
                                        </tr>
                                        <tr data-intcode="SOC-A-0001006" data-name="SAGAR RAJ" data-uid="c08b454d-14e4-11e5-b10a-74d435d335fe" data-urole="AU">
                                            <td>nothing else matters</td>
                                            <td>SOC-T-0001006</td>
                                        </tr>
                                        <tr data-intcode="SOC-A-0001007" data-name="Himal Samal" data-uid="c08b45d0-14e4-11e5-b10a-74d435d335fe" data-urole="AU">
                                            <td>ride the lightning</td>
                                            <td>SOC-T-0001007</td>
                                        </tr>
                                        <tr data-intcode="SOC-A-0001008" data-name="Kamal Mandal" data-uid="c08b4659-14e4-11e5-b10a-74d435d335fe" data-urole="AU">
                                            <td>Wild wild west</td>
                                            <td>SOC-T-0001008</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-12">
            <div class="box-body">
                <div class="form-group foundation">
                    <div class="box-header">
                        <h3 class="box-title">Exploitation</h3>
                    </div>
                    <div class="box-body">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label for="Recording_Rcd_Duration" class=" required">Duration <span class="required">*</span></label> (H : m : s)                                    <input type="hidden" value="00:03:00" id="Recording_Rcd_Duration" name="Recording[Rcd_Duration]">                                    <div class="row">
                                    <div class="col-lg-4">
                                        <input type="text" value="00" id="Recording_duration_hours" name="Recording[duration_hours]" class="form-control">                                        </div>
                                    <div class="col-lg-4">
                                        <input type="text" value="03" id="Recording_duration_minutes" name="Recording[duration_minutes]" class="form-control">                                            <div style="display:none" id="Recording_duration_minutes_em_" class="errorMessage"></div>                                        </div>
                                    <div class="col-lg-4">
                                        <input type="text" value="00" id="Recording_duration_seconds" name="Recording[duration_seconds]" class="form-control">                                            <div style="display:none" id="Recording_duration_seconds_em_" class="errorMessage"></div>                                        </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Work_Work_Factor_Id" class=" required">Factor <span class="required">*</span></label>                                    <select id="Work_Work_Factor_Id" name="Work[Work_Factor_Id]" class="form-control">
                                    <option value="5">1.00</option>
                                    <option selected="selected" value="1">2.00</option>
                                    <option value="2">3.00</option>
                                    <option value="3">4.00</option>
                                    <option value="4">5.00</option>
                                </select>                                    <div style="display:none" id="Work_Work_Factor_Id_em_" class="errorMessage"></div>                                </div>
                                
                                <div class="form-group">
                                <label for="Work_Work_Iswc" class="">Coefficient</label>                                    <input type="text" value="" id="Work_Work_Iswc" name="Work[Work_Iswc]" maxlength="100" size="60" class="form-control">                                    <div style="display:none" id="Work_Work_Iswc_em_" class="errorMessage"></div>                                </div>


                        </div>
                        <div class="col-lg-1"></div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label for="DistributionClass_Class_Internal_Code" class="">Date</label>                    
<input type="text" id="DistributionClass_Class_Internal_Code" name="DistributionClass[Class_Internal_Code]" maxlength="255" size="60" class="form-control">                            </div>
                            <div class="form-group">
                                <label for="DistributionClass_Class_Internal_Code" class="">Event or show</label>                    
<input type="text" id="DistributionClass_Class_Internal_Code" name="DistributionClass[Class_Internal_Code]" maxlength="255" size="60" class="form-control">                            </div>
                            <div class="form-group">
                                <label for="DistributionClass_Class_Internal_Code" class="">Sequence Number</label>                    
<input type="text" id="DistributionClass_Class_Internal_Code" name="DistributionClass[Class_Internal_Code]" maxlength="255" size="60" class="form-control">                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </div>
        
        <div class="box-footer">
            <div class="form-group">
                <div class="col-lg-12">
                    <div class="col-lg-1">
                        <input type="hidden" value="0" id="main_pub">
                        <input type="hidden" value="0" id="sub_pub">
                        <input type="submit" value="Add" name="yt2" id="right_insert" class="btn btn-warning">                </div>
                    <div class="col-lg-11 help-block">
                        <div style="display:none" id="WorkRightholder_Work_Member_GUID_em_" class="errorMessage"></div>                </div>
                </div>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-lg-12">
            <div class="box-body">
                <div class="text-left total_share hide">Broadcasting Share : <span id="equal_total">100 %</span> </div>
                <div class="text-left total_share hide">Mechanical Share : <span id="blank_total">100 %</span></div>
                <div class="text-left total_share hide show_pub_hint">Publisher Share : <span id="pub_total">100 %</span></div>
                <div class="text-left total_share hide show_pub_hint">Main Publisher : <span id="is_main_added"></span></div>
                <br>
                <div class="form-group foundation">
                    <form method="post" action="/wipocos_1/branches/dev/site/work/insertright" id="right_form" class="form-horizontal MultiFile-intercepted" role="form">                    <div class="box-header">
                            <h3 class="box-title">Logsheet List</h3>
                        </div>
                        <div class="box-body">
                            <table id="linked-holders" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Original Title</th>
                                        <th>Internal Code</th>
                                        <th>Duration</th>
                                        <th>Factor</th>
                                        <th>Coefficient</th>
                                        <!--<th>Broadcasting Organization</th>-->
                                        <th>Date</th>
                                        <th>Event or show</th>
                                        <!--<th>Mechanical Organization</th>-->
                                        <th>Sequence Number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr data-intcode="SOC-A-0001015" data-name="Vinodh Arumugam" data-uid="c08b4ad2-14e4-11e5-b10a-74d435d335fe" data-urole="AU">
                                        <td>As long as </td>
                                        <td>SOC-T-0001015</td>
                                        <td>04:00:00</td>
                                        <td>1.00</td>
                                        <td>1.00</td>
                                        <td>2015-05-01</td>
                                        <td></td>
                                        <td>2500</td>
                                    </tr>
                                    <tr data-intcode="SOC-A-0001015" data-name="Vinodh Arumugam" data-uid="c08b4ad2-14e4-11e5-b10a-74d435d335fe" data-urole="AU">
                                        <td>ride the lightning</td>
                                        <td>SOC-T-0001016</td>
                                        <td>04:00:00</td>
                                        <td>1.00</td>
                                        <td>1.00</td>
                                        <td>2015-05-01</td>
                                        <td></td>
                                        <td>2100</td>
                                    </tr>
                                    <tr data-intcode="SOC-A-0001015" data-name="Vinodh Arumugam" data-uid="c08b4ad2-14e4-11e5-b10a-74d435d335fe" data-urole="AU">
                                        <td>dookie</td>
                                        <td>SOC-T-0001017</td>
                                        <td>04:00:00</td>
                                        <td>1.00</td>
                                        <td>1.00</td>
                                        <td>2015-05-01</td>
                                        <td></td>
                                        <td>2800</td>
                                    </tr>
                                    <tr data-intcode="SOC-A-0001015" data-name="Vinodh Arumugam" data-uid="c08b4ad2-14e4-11e5-b10a-74d435d335fe" data-urole="AU">
                                        <td>Wild wild west</td>
                                        <td>SOC-T-0001018</td>
                                        <td>04:00:00</td>
                                        <td>1.00</td>
                                        <td>1.00</td>
                                        <td>2015-05-01</td>
                                        <td></td>
                                        <td>2900</td>
                                    </tr>
                                    <tr data-intcode="SOC-A-0001015" data-name="Vinodh Arumugam" data-uid="c08b4ad2-14e4-11e5-b10a-74d435d335fe" data-urole="AU">
                                        <td>nothing else matters</td>
                                        <td>SOC-T-0001019</td>
                                        <td>04:00:00</td>
                                        <td>1.00</td>
                                        <td>1.00</td>
                                        <td>2015-05-01</td>
                                        <td></td>
                                        <td>5800</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="box-footer">
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <input type="submit" value="Save" name="yt3" disabled="disabled" id="right_ajax_submit" class="btn btn-primary">                            </div>
                            </div>
                        </div>
                        <div class="overlay loader"></div>
                        <div class="loading-img loader"></div>
                    </form>                </div>
                <div class="text-left help-block hide">
                    <span><strong>Note:</strong> Data will be automatically saved after Broadcasting Share &amp; Mechanical Share is 100 % and One main publisher is added and (Publisher and Sub-Publisher) Shares is 50% Minimum</span>
                </div>

            </div>
        </div>
    </div>
</div>
