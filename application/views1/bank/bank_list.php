<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Portfolio Management</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="<?php echo base_url(); ?>favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
           <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url(); ?>css/theme-blue.css"/>
		<link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url(); ?>mobile-menu/vendor-1437d0659c.css"/>
		<link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url().'css/custome_vj_css.css'; ?>"/>    
        <!-- EOF CSS INCLUDE -->            
    </head>
    <body>								
         <!-- START PAGE CONTAINER -->
        <div class="page-container page-navigation-top">            
            <!-- PAGE CONTENT -->
			   <?php $this->load->view('templates/menus');?>
              <div class="page-content1 page-overflow wrapper wrapper__minify" style="height:auto!important;">
                
                   <div class="heading-h3"> 
                   <div class="heading-h3-heading">	 <a href="<?php echo base_url().'index.php/dashboard'; ?>" >  Dashboard  </a> &nbsp; &#10095; &nbsp; Bank Details List  </div>	 
					 
					  <div class="heading-h3-heading">
					  <div class="pull-right btn-margin">	
								<?php $this->load->view('templates/download');?>	
								</div>	
                    	<div class="pull-right btn-margin"  >
							<?php if(isset($access)) { if($access[0]->r_insert == 1) { ?>
							<a class="btn btn-success btn-block btn-padding" href="<?php echo base_url().'index.php/bank/add'; ?>">
										<span class="fa fa-plus"></span> Add Bank Details</a>
										<?php } } ?>
								</div>
								
								
				</div>	      
                </div>	 
              
                
                <!-- PAGE CONTENT WRAPPER -->
                   <div class="page-content-wrap">                
                     <div class="row">	
					   <div class="page-width">					
                         <div class="col-md-12">
					    	<div class="panel panel-default">							 
							  <div class="panel-body">
								<div class="table-responsive">
								<table id="customers2" class="table datatable table-bordered" >
									<thead>
										<tr>
											<th width="65"  style="text-align:center;"  >Sr. No.</th>
											<th style=" " width=" ">Bank Name</th>
											<th style=" " width=" ">Branch</th>
											<th style=" " width=" ">Account Type</th>
											<th style=" " width=" ">Account Number</th>
											<th style=" " width=" ">IFSC Code</th>
											<th style=" " width="">Status</th>
										</tr>
									</thead>
									<tbody>
										<?php for($i=0; $i < count($data); $i++) { ?>
										<tr id="trow_<?php echo $i;?>">
											<td style=" text-align:center; "><?php if(isset($data)){ echo ($i+1) ;} else {echo '1';} ?></td>
											<?php if(isset($access)) { if($access[0]->r_view == 1) { ?>
												<td style="padding:5px;">
														<a href="<?php echo base_url().'index.php/Bank/edit/'.$data[$i]->id; ?>"><?php echo $data[$i]->b_name; ?></a>
												</td>
											<?php }} ?>
											<td style=" "><?php echo $data[$i]->b_branch; ?></td>
											<td style=" "><?php echo $data[$i]->b_accounttype; ?></td>
											<td style=" "><?php echo $data[$i]->b_accountnumber; ?></td>
											<td style=" "><?php echo $data[$i]->b_ifsc; ?></td>
											<td><?php echo ($data[$i]->status=='Approved')?'Active':$data[$i]->status; ?></td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
								</div>
							</div>
                            <!-- END DEFAULT DATATABLE -->
                           </div>
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
		
    <!-- END SCRIPTS -->      
    </body>
</html>