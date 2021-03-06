<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>EAT ERP</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- END META SECTION -->
         <!-- CSS INCLUDE -->        
         <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url(); ?>css/theme-blue.css"/>
        <link href="<?php echo base_url() . 'js/jquery-ui-1.11.2/jquery-ui.min.css'; ?>" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url(); ?>css/user-details.css"/>
        <!-- EOF CSS INCLUDE -->    
		   <style type="text/css">
 body {background:none!important;}
.bootstrap-select.btn-group .dropdown-menu li > a {
    cursor: pointer;
    width: 100%;
}
.btn.btn-sm, .btn-group-sm > .btn {padding:0px 10px;}
.panel-heading{ background: #fff!important;  padding:8px  10px!important;  }
.panel  span { margin:0;}
 @media only screen and  (min-width:250px)  and (max-width:480px) {
  .custom-padding  .panel-heading .pull-right {/* margin:5px 20px; */}
  .panel-heading { min-height:60px;}

 }
 @media only screen and (min-width: 260px) and (max-width:767px) { 
.custom-padding .col-md-6 .control-label {
    margin-top:10px;
} }
 
@media only screen and (min-width:768px) and (max-width: 1020px) { 
.custom-padding .col-md-6 .control-label {
    margin-top:0;
} }
 	
        </style>
    </head>
    <body>								
       <!-- START PAGE CONTAINER -->
        <div class="page-container page-navigation-top">   
      <?php $this->load->view('templates/menus');?>         		
            <!-- PAGE CONTENT -->
             <div class="page-content1 page-overflow wrapper wrapper__minify" style="height:auto!important;">
                
                      
                   <div class="heading-h2"><a href="<?php echo base_url().'index.php/dashboard'; ?>" >  Dashboard  </a> &nbsp; &#10095; &nbsp; <a href="<?php echo base_url().'index.php/Reports/view_reports'; ?>" >  Report List  </a>   &nbsp; &#10095; &nbsp; Report Details   </div>               
                
                <!-- PAGE CONTENT WRAPPER -->
                 <div class="page-content-wrap" >
                    <div class="row main-wrapper">                  
                       <div class="main-container">           
                         <div class="box-shadow custom-padding">
						  <form id="form_download_report" role="form" class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php if(isset($report_id)) { echo base_url().'index.php/export/generate_report/'.$report_id; } ?>">
							
						  <div class="col-md-12" style="padding:0;">
                          <div class="box-shadow-inside">  
                        <div class="panel panel-default">
							<div class="panel-body panel-group accordion" >
                      		  	<div class="panel-primary"   >
                              	<div class="panel-heading" style="display:inline-block;">
	                              
	          						<h4 class="panel-title">  <span class="fa fa-file-text-o"> </span>  <?php if(isset($report_name)) echo $report_name; ?>  </h4>
	          						<input type="hidden" name="txn_type" id="txn_type" value="<?php if(isset($txn_type)) echo $txn_type; ?>" />
									<a class="pull-right" href="<?php echo base_url() . '/assets/reports_sample/' . (isset($sample_report_name)?$sample_report_name:'') ;?>" target="_blank"> <span class="btn btn-danger pull-right btn-sm "><span class="fa fa-file-pdf-o"> </span>  View Sample </span>  </a>
                                </div>
								
								 <div class="panel-body panel-body-open text1" id="accOneColOne" style="width:100%; ">    
									<div class="form-group" style="border-top:1px solid #ddd; <?php if($report_type!='Owner Level') echo 'display:none;';?>">
                                        <div class="col-md-6  col-sm-6 col-xs-12">
                                            <div class="">
                                                <label class="col-md-5 col-sm-5 col-xs-12 control-label">Select Owner</label>
                                                <div class="col-md-7 col-sm-7 col-xs-12">
                                                    <select class="form-control" name="owner" id="owner">
                                                        <option value="">Select Owner</option>
                                                        <?php for ($i=0; $i < count($owner) ; $i++) { ?>
                                                            <option value="<?php echo $owner[$i]->pr_client_id; ?>"><?php echo $owner[$i]->owner_name; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group" style="border-top:1px solid #ddd; border-bottom:none; <?php if($report_id !='5') echo 'display:none;';?>">
                                         <div class="col-md-6  col-sm-6 col-xs-12">
                                            <div class="">
                                                <label class="col-md-4 col-sm-4 col-xs-12  control-label">Select Distributor</label>
                                                <div class="col-md-6 col-sm-6  col-xs-12">
                                                    <select class="form-control" name="distributor_id" id="distributor_id">
                                                        <option value="">Select Distributor </option>
                                                        <?php if(isset($distributor)){
	                                                        	foreach($distributor as $row){
	                                                            	echo '<option value="'.$row->id.'" >'.$row->distributor_name.'</option>';                                                        	
	                                                        	}
                                                        	} 
                                                    	?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group" style="border-top:1px solid #ddd; <?php if($report_type!='Asset Level') echo 'display:none;';?>">
                                        <div class="col-md-6 col-sm-6 col-xs-12" id="property_div" style="<?php if($report_type!='Asset Level') echo 'display:none;';?>">
											<div class="">
												<label class="col-md-4 col-sm-4 col-xs-12 control-label">Property Name</label>
												<div class="col-md-8 col-sm-8 col-xs-12">
													<select  class="form-control" id="property" name="property">
														<option value="">Select Property</option>
														<?php for($i=0; $i<count($purchase_data); $i++) { ?>
														<option value="<?php echo $purchase_data[$i]->txn_id; ?>"><?php echo $purchase_data[$i]->p_property_name; ?></option>
														<?php } ?>
													</select>
												</div>
											</div>
										</div>
										<div class="col-md-6 col-sm-6 col-xs-12" id="sub_property_div" style="display: none;">
											<div class="">
												<label id="sub_property_label" class="col-md-4 col-sm-4 col-xs-12 control-label">Sub Property Name</label>
												<div class="col-md-8 col-sm-8 col-xs-12">
													<select id="sub_property" class="form-control" name="sub_property">
														<option value="">Select Sub Property</option>
													</select>
												</div>
											</div>
										</div>
                                    </div>

                                    <div class="form-group" style="border-top:1px solid #ddd; <?php if($report_type=='Aging Wise') echo 'display:none;';?>">
										  <div class="col-md-6  col-sm-6 col-xs-12">
											<label class="col-md-4  col-sm-4 col-xs-12 control-label" >From</label>
											<div class="col-md-6  col-sm-6 col-xs-12">                                                                  
												<div class="input-group" style="display:block">
                                                    <input type="text" class="form-control datepicker" name="from_date" value="<?php echo date('d/m/Y')?>">
                                                    <!--<span class="input-group-addon"><span class="fa fa-calendar"></span></span>-->
                                                </div>
											</div>
										</div>
                                        <div class="col-md-6  col-sm-6 col-xs-12">
											<label class="col-md-4  col-sm-4 col-xs-12 control-label">To</label>
											<div class="col-md-6  col-sm-6 col-xs-12">
											    <div class="input-group" style="display:block" >
                                            		<input type="text" class="form-control datepicker" name="to_date" value="<?php echo date('d/m/Y')?>">
                                               <!--<span class="input-group-addon"><span class="fa fa-calendar"></span></span>-->
                                        		</div>
											</div>
										</div>
									</div>

                                    <div class="form-group" style="border-top:1px solid #ddd; <?php if($report_type!='Aging Wise') echo 'display:none;';?>">
                                          <div class="col-md-6  col-sm-6 col-xs-12">
                                            <label class="col-md-4  col-sm-4 col-xs-12 control-label" >Date</label>
                                            <div class="col-md-6  col-sm-6 col-xs-12">                                                                  
                                                <div class="input-group" style="display:block">
                                                    <input type="text" class="form-control datepicker" name="date" value="<?php echo date('d/m/Y')?>">
                                                    <!--<span class="input-group-addon"><span class="fa fa-calendar"></span></span>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                  

									<div class="row" style="text-align:center; margin:15px 0;">
                                    	<button type="submit" class="btn btn-danger"> <span class="fa fa-download"> </span>  Download Report   </button>
                                    </div>
                                </div>
                                <br clear="all">                              
                            	</div>
							</div>
							</div>
							<br clear="all"/>
						</div>	
					</div>
                            <div class="panel-footer">
						 
								<a href="<?php echo base_url(); ?>index.php/Reports/view_reports" class="btn btn-danger" type="reset" id="reset">Cancel</a>
                            </div>
						</form>
						</div>
						</div>
					</div>
                </div>
                <!-- END PAGE CONTENT WRAPPER -->
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
						
        <?php $this->load->view('templates/footer');?>
        <script type="text/javascript">
            var BASE_URL="<?php echo base_url();?>";
        </script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/validations.js"></script>
        <script type="text/javascript">
            $( "#property" ).change(function() {
	            getSubProperties();
	        });

	        function getSubProperties(){
				var property=$("#property").val();
				var txn_type=$("#txn_type").val();
				if(property==''){
					$("#sub_property").html('');
					$("#sub_property_div").hide();
				} else {
        			// console.log(property);
					var status=$("#status").val();
		            var dataString = 'property_id=' + property + '&txn_type=' + txn_type;

		            $.ajax({
		               	type: "POST",
		               	url: "<?php echo base_url() . 'index.php/export/get_sub_property' ?>",
		               	data: dataString,
		               	// async: false,
		               	cache: false,
		               	success: function(html){
		                   	$("#sub_property").html(html);

							if(html==""){
								$("#sub_property_div").hide();
							} else {
								$("#sub_property_div").show();
							}
		               	}
		            });
				}
			}
        </script>
    	<!-- END SCRIPTS -->      
    </body>
</html>