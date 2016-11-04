<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>Dashboard</span>
                </li>
            </ul>
            <div class="page-toolbar">
                <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                    <i class="icon-calendar"></i>&nbsp;
                    <span class="thin uppercase hidden-xs"></span>&nbsp;
                    <i class="fa fa-angle-down"></i>
                </div>
            </div>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">Form Section
            <small>Custom Form Section</small>
        </h1>
        <!-- END PAGE TITLE-->    

        <div class="row">
            <div class="col-md-6">
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i>Filtering with ajax</div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                            <a href="javascript:;" class="reload"> </a>
                            <a href="javascript:;" class="remove"> </a>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <?php 
                            $data = array(
                                'name'  => 'serviceadd'
                                );
                            echo form_open('Developer/serviceAdd', $data );
                         ?>
                            <div class="form-body">
                                <div class="form-group">
                                    <select name="restaurant" id="restaurant" class="form-control">
                                        <option value="0">Select a restaurant</option>
                                    <?php 
                                        if ( $get_restaurantInfo ) :
                                            foreach ($get_restaurantInfo as $get_restaurantInfoData ) : ?>
                                            <option value="<?php echo $get_restaurantInfoData->id;?>"><?php echo $get_restaurantInfoData->restaurantname;?></option> 
                                            <?php                                               
                                            endforeach;
                                        endif;
                                    ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="service" id="service" class="form-control">
                                        <option value="0">Select a service</option>
                                    <?php 
                                        if ( $get_serviceInfo ) :
                                            foreach ($get_serviceInfo as $get_serviceInfoData ) : ?>
                                            <option value="<?php echo $get_serviceInfoData->id;?>"><?php echo $get_serviceInfoData->servicename;?></option> 
                                            <?php                                               
                                            endforeach;
                                        endif;
                                    ?>
                                    </select>
                                </div>
                                <div class="form-group last">
                                <table id="output" class="hidden">
                                        <tr>
                                            <th>City</th>
                                            <th>Status</th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn green">Submit</button>
                                <button type="button" class="btn default">Cancel</button>
                            </div>
                        <?php echo form_close(); ?>
                        <!-- END FORM-->
                    </div>
                </div>
            </div>
        </div>                   
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
<style>
    .hidden{display:none;}
</style>
