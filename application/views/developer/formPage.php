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
        <?php 
            $FlsMsg = $this->session->flashdata('FlsMsg');
            if ( isset( $FlsMsg )) 
            {
               echo $FlsMsg;
            }
            if ( !empty( $error ) ) 
            {
               print_r( $error );
            }
         ?>
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
                            echo form_open_multipart('Developer/serviceAdd', $data );
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

                                <div class="form-group">
                                <?php 
                                    $data = array(
                                        'type' => 'file',
                                        'name'  =>  'image',
                                        'id'    =>  'profilePic',
                                        'class' =>  'form-control' 
                                        );
                                    echo form_upload( $data );
                                 ?>
                                </div>
                                <div class="form-group last">
                                <table id="output" class="table table-inverse hidden">
                                </table>
                                </div>
                            </div>
                            <div class="form-actions">
                            <?php 
                                $data = array(
                                    'type'  => 'submit',
                                    'class' =>  'btn green',
                                    'value' =>  'Submit'
                                    );
                                echo form_submit( $data );
                            ?>
                            <?php 
                                $data = array(
                                    'type'  => 'reset',
                                    'class' =>  'btn default',
                                    'value' =>  'Reset'
                                    );
                                echo form_reset( $data );
                            ?>
                            </div>
                        <?php echo form_close(); ?>
                        <!-- END FORM-->
                    </div>
                </div>
            </div>
        </div>   
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-cogs"></i>Restaurant and Service Information</div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse"> </a>
                            <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                            <a href="javascript:;" class="reload"> </a>
                            <a href="javascript:;" class="remove"> </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <form action="">
                                    <div class="input-group input-group-lg">
                                        <input type="text" class="form-control" placeholder="Search for...">
                                        <span class="input-group-btn">
                                            <button class="btn green" type="submit">Go!</button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th> Serail </th>
                                        <th> Restaurant Name </th>
                                        <th> Service name </th>
                                        <th> Status </th>
                                        <th> Created Date </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        if ( !empty( $serviceInfo )) :
                                            $i = $this->uri->segment(3,0);
                                            foreach ($serviceInfo as $serviceInfoData ) : ?>
                                                <tr>
                                                    <td> <?php echo ++$i; ?> </td>
                                                    <td> 
                                                    <?php echo $serviceInfoData->restaurantname; ?>
                                                    </td>
                                                    <td> 
                                                    <?php echo $serviceInfoData->servicename; ?> </td>
                                                    <td> 
                                                    <?php echo $serviceInfoData->status; ?>
                                                    </td>
                                                    <td> 
                                                    <?php echo $serviceInfoData->created_date; ?>
                                                    </td>
                                                    <td> <a href="">Edit</a> / <a href="">Delete</a> </td>
                                                </tr>
                                           <?php endforeach;
                                        endif;
                                    ?>
                                    
                                </tbody>
                            </table>
                            <?php echo $this->pagination->create_links(); ?>                            
                        </div>
                    </div>
                </div>
                <!-- END SAMPLE TABLE PORTLET-->               
            </div>
        </div>            
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
<style>
    .hidden{display:none;}
</style>
