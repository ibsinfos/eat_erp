<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>EAT ERP</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="<?php echo base_url(); ?>favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        <!-- CSS INCLUDE -->        
         <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url(); ?>css/theme-blue.css"/>
        <link href="<?php echo base_url() . 'js/jquery-ui-1.11.2/jquery-ui.min.css'; ?>" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url(); ?>css/user-details.css"/>
        <!-- EOF CSS INCLUDE -->      
		
		<style>		 
			th{text-align:center;}
			.center{text-align:center;}
		</style>
		
    </head>
    <body>								
        <!-- START PAGE CONTAINER -->
         <!-- START PAGE CONTAINER -->
         <div class="page-container page-navigation-top">            
            <!-- PAGE CONTENT -->
			   <?php $this->load->view('templates/menus');?>
              <div class="page-content1 page-overflow wrapper wrapper__minify" style="height:auto!important;">
                   <div class="heading-h2"><a href="<?php echo base_url().'index.php/dashboard'; ?>" >  Dashboard  </a> &nbsp; &#10095; &nbsp; <a href="<?php echo base_url().'index.php/batch_processing'; ?>" > Batch Processing List </a>  &nbsp; &#10095; &nbsp; Batch Processing Details</div>
                
                <!-- PAGE CONTENT WRAPPER -->
                   
                <!-- PAGE CONTENT WRAPPER -->
                  <div class="page-content-wrap">
                    <div class="row main-wrapper">
					    <div class="main-container">           
                         <div class="box-shadow">	
                            <form id="form_batch_processing_details" role="form" class="form-horizontal" method="post" action="<?php if (isset($data)) echo base_url(). 'index.php/batch_processing/update/' . $data[0]->id; else echo base_url().'index.php/batch_processing/save'; ?>">
                               <div class="box-shadow-inside">
                                <div class="col-md-12 custom-padding" style="padding:0;" >
                                 <div class="panel panel-default">
							     	<div class="panel-body">
									<div class="form-group"  >
										<div class="col-md-12 col-sm-12 col-xs-12">
											<label class="col-md-2 col-sm-2 col-xs-12 control-label">Batch Id <span class="asterisk_sign">*</span></label>
                                          <div class="col-md-4 col-sm-4 col-xs-12">
                                                <input type="hidden" class="form-control" name="id" id="id" value="<?php if(isset($data)) echo $data[0]->id;?>"/>
                                                <input type="text" class="form-control" name="batch_id_as_per_fssai" id="batch_id_as_per_fssai" placeholder="Batch Id" value="<?php if(isset($data)) { echo  $data[0]->batch_id_as_per_fssai; } ?>"/>
                                            </div>
											  <label class="col-md-2 col-sm-2 col-xs-12 control-label">Date Of Processing <span class="asterisk_sign">*</span></label>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <input type="text" class="form-control datepicker1" name="date_of_processing" id="date_of_processing" placeholder="Date Of Processing" value="<?php if(isset($data)) echo (($data[0]->date_of_processing!=null && $data[0]->date_of_processing!='')?date('d/m/Y',strtotime($data[0]->date_of_processing)):date('d/m/Y')); else echo date('d/m/Y'); ?>"/>
                                            </div>
										</div>
									</div>
                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label class="col-md-2 col-sm-2 col-xs-12 control-label">Depot <span class="asterisk_sign">*</span></label>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <select name="depot_id" id="depot_id" class="form-control">
                                                    <option value="">Select</option>
                                                    <?php if(isset($depot)) { for ($k=0; $k < count($depot) ; $k++) { ?>
                                                            <option value="<?php echo $depot[$k]->id; ?>" <?php if(isset($data)) { if($depot[$k]->id==$data[0]->depot_id) { echo 'selected'; } } ?>><?php echo $depot[$k]->depot_name; ?></option>
                                                    <?php }} ?>
                                                </select>
                                                <!-- <input type="hidden" name="depot_id" id="depot_id" value="<?php //if(isset($data)) { echo  $data[0]->depot_id; } ?>"/>
                                                <input type="text" class="form-control load_depot" name="depot" id="depot" placeholder="Type To Select Depot...." value="<?php //if(isset($data)) { echo  $data[0]->depot_name; } ?>"/> -->
                                            </div>
                                        </div>
                                    </div>

                            	<div class="h-scroll">	
                                       <div class="table-stripped form-group" style="padding:15px;" >
									
                                        <table class="table table-bordered" style="margin-bottom: 0px; ">
                                        <thead>
                                            <tr>
                                                <th  >Raw Material</th>
                                                <th width="200">Qty (In Kg)</th>
                                                <th width="75">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="raw_material_details">
                                        <?php $i=0; if(isset($raw_material_stock)) {
                                                for($i=0; $i<count($raw_material_stock); $i++) { ?>
                                            <tr id="raw_material_<?php echo $i; ?>_row">
                                                <td>
                                                    <select name="raw_material_id[]" class="form-control raw_material" id="raw_material_<?php echo $i;?>">
                                                        <option value="">Select</option>
                                                        <?php if(isset($raw_material)) { for ($k=0; $k < count($raw_material) ; $k++) { ?>
                                                                <option value="<?php echo $raw_material[$k]->id; ?>" <?php if($raw_material[$k]->id==$raw_material_stock[$i]->raw_material_id) { echo 'selected'; } ?>><?php echo $raw_material[$k]->rm_name; ?></option>
                                                        <?php }} ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control qty" name="qty[]" id="qty_<?php echo $i; ?>" placeholder="Qty" value="<?php if (isset($raw_material_stock)) { echo $raw_material_stock[$i]->qty; } ?>"/>
                                                </td>
                                               <td style="text-align:center;     vertical-align: middle;">
                                                    <a id="raw_material_<?php echo $i; ?>_row_delete" class="delete_row" href="#"> <span class="fa trash fa-trash-o"  ></span></a>
                                                </td>
                                            </tr>
                                        <?php }} else { ?>
                                            <tr id="raw_material_<?php echo $i; ?>_row">
                                                <td>
                                                    <select name="raw_material_id[]" class="form-control raw_material" id="raw_material_<?php echo $i;?>">
                                                        <option value="">Select</option>
                                                        <?php if(isset($raw_material)) { for ($k=0; $k < count($raw_material) ; $k++) { ?>
                                                                <option value="<?php echo $raw_material[$k]->id; ?>"><?php echo $raw_material[$k]->rm_name; ?></option>
                                                        <?php }} ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control qty" name="qty[]" id="qty_<?php echo $i; ?>" placeholder="Qty" value=""/>
                                                </td>
                                                <td style="text-align:center;     vertical-align: middle;">
                                                    <a id="raw_material_<?php echo $i; ?>_row_delete" class="delete_row" href="#"><span class="fa trash fa-trash-o"  ></span></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="5">
                                                    <button type="button" class="btn btn-success" id="repeat-raw_material" style=" ">+</button>
                                                </td>
                                            </tr>
                                        </tfoot>
                                        </table>
                                    </div>
								</div>
                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label class="col-md-2 col-sm-2 col-xs-12 control-label">Total (In Kg) <span class="asterisk_sign">*</span></label>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <input type="text" class="form-control" name="total_kg" id="total_kg" placeholder="Total Kg" value="<?php if (isset($data)) { echo $data[0]->total_kg; } ?>"/>
                                            </div>
                                            <label class="col-md-2 col-sm-2 col-xs-12 control-label">Output (In Kg) <span class="asterisk_sign">*</span></label>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <input type="text" class="form-control" name="output_kg" id="output_kg" placeholder="Output Kg" value="<?php if (isset($data)) { echo $data[0]->output_kg; } ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label class="col-md-2 col-sm-2 col-xs-12 control-label">Product <span class="asterisk_sign">*</span></label>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <select name="product_id" id="product_id" class="form-control">
                                                    <option value="">Select</option>
                                                    <?php if(isset($product)) { for ($k=0; $k < count($product); $k++) { ?>
                                                            <option value="<?php echo $product[$k]->id; ?>" <?php if(isset($data)) { if($product[$k]->id==$data[0]->product_id) { echo 'selected'; } } ?>><?php echo $product[$k]->product_name; ?></option>
                                                    <?php }} ?>
                                                </select>
                                                <!-- <input type="hidden" name="product_id" id="product_id" value="<?php //if(isset($data)) { echo  $data[0]->product_id; } ?>"/>
                                                <input type="text" class="form-control load_product" name="product" id="product" placeholder="Type To Select Product...." value="<?php //if(isset($data)) { echo  $data[0]->product_name; } ?>"/> -->
                                            </div>
                                            <label class="col-md-2 col-sm-2 col-xs-12 control-label">Qty In Bar <span class="asterisk_sign">*</span></label>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <input type="text" class="form-control format_number" name="qty_in_bar" id="qty_in_bar" placeholder="Qty In Bar" value="<?php if (isset($data)) { echo $data[0]->qty_in_bar; } ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label class="col-md-2 col-sm-2 col-xs-12 control-label">Avg Grams In Bar <span class="asterisk_sign">*</span></label>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <input type="text" class="form-control" name="avg_grams" id="avg_grams" placeholder="Avg Grams In Bar" value="<?php if (isset($data)) { echo $data[0]->avg_grams; } ?>"/>
                                            </div>
                                            <label class="col-md-2 col-sm-2 col-xs-12 control-label">Actual Wastage (In Kg)<span class="asterisk_sign">*</span></label>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <input type="text" class="form-control format_number" name="actual_wastage" id="actual_wastage" placeholder="Actual Wastage" value="<?php if (isset($data)) { echo $data[0]->actual_wastage; } ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label class="col-md-2 col-sm-2 col-xs-12 control-label">Wastage (In %) <span class="asterisk_sign">*</span></label>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <input type="text" class="form-control format_number" name="wastage_percent" id="wastage_percent" placeholder="Wastage Percent" value="<?php if (isset($data)) { echo $data[0]->wastage_percent; } ?>"/>
                                            </div>
                                            <label class="col-md-2 col-sm-2 col-xs-12 control-label">Anticipated Wastage (In %) <span class="asterisk_sign">*</span></label>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <input type="text" class="form-control format_number" name="anticipated_wastage" id="anticipated_wastage" placeholder="Anticipated Wastage" value="<?php if (isset($data)) { echo $data[0]->anticipated_wastage; } ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label class="col-md-2 col-sm-2 col-xs-12 control-label">Wastage Variance (In %) <span class="asterisk_sign">*</span></label>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <input type="text" class="form-control format_number" name="wastage_variance" id="wastage_variance" placeholder="Wastage Variance" value="<?php if (isset($data)) { echo $data[0]->wastage_variance; } ?>"/>
                                            </div>
                                            <div style="<?php if(isset($data)) echo ''; else echo 'display: none;';?>">
                                                <label class="col-md-2 col-sm-2 col-xs-12 control-label">Status <span class="asterisk_sign">*</span></label>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <select class="form-control" name="status">
                                                        <option value="Approved" <?php if(isset($data)) {if ($data[0]->status=='Approved') echo 'selected';}?>>Active</option>
                                                        <option value="InActive" <?php if(isset($data)) {if ($data[0]->status=='InActive') echo 'selected';}?>>InActive</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label class="col-md-2 col-sm-2 col-xs-12 control-label">Remarks </label>
                                            <div class="col-md-10 col-sm-10 col-xs-12 ">
                                                <textarea class="form-control" name="remarks"><?php if(isset($data)) echo $data[0]->remarks;?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
										</div>
										<br clear="all"/>
									</div>
								</div>
                                <div class="panel-footer">
									<a href="<?php echo base_url(); ?>index.php/batch_processing" class="btn btn-danger" type="reset" id="reset">Cancel</a>
                                    <button class="btn btn-success pull-right" style="<?php if(isset($data[0]->id)) {if($access[0]->r_edit=='0') echo 'display: none;';} else if($access[0]->r_insert=='0' && $access[0]->r_edit=='0') echo 'display: none;'; ?>">Save</button>
                                </div>
							</form>
							
						</div>
						
                    </div>
                    
                </div>
                <!-- END PAGE CONTENT WRAPPER -->
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
 </div>
        <?php $this->load->view('templates/footer');?>
        <script type="text/javascript">
            var BASE_URL="<?php echo base_url()?>";
        </script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/load_autocomplete.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/validations.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $(".qty").blur(function(){
                    get_wastage();
                });
                $("#product_id").change(function(){
                    get_wastage();
                });
                $("#qty_in_bar").blur(function(){
                    get_wastage();
                });
                $("#actual_wastage").blur(function(){
                    get_wastage();
                });
                $("#output_kg").blur(function(){
                    get_wastage();
                });
                $(".datepicker1").datepicker({ maxDate: 0,changeMonth: true,yearRange:'-100:+0',changeYear: true });
                
                addMultiInputNamingRules('#form_batch_processing_details', 'select[name="raw_material_id[]"]', { required: true }, "");
                addMultiInputNamingRules('#form_batch_processing_details', 'input[name="qty[]"]', { required: true }, "");
            });

            function get_wastage(){
                var qty = 0;
                var total_qty = 0;
                $('.qty').each(function(){
                    qty = parseFloat(get_number($(this).val(),2));
                    if (isNaN(qty)) qty=0;
                    total_qty = total_qty + qty;
                });

                var product_id = $("#product_id").val();
                var qty_in_bar = parseFloat(get_number($("#qty_in_bar").val(),2));
                var grams_in_bar = 0;

                $.ajax({
                    url:BASE_URL+'index.php/Product/get_data',
                    method:"post",
                    data:{id:product_id},
                    dataType:"json",
                    async:false,
                    success: function(data){
                        if(data.result==1){
                            grams_in_bar = parseFloat(data.avg_grams);
                            anticipated_wastage = parseFloat(data.anticipated_wastage);
                        }
                    },
                    error: function (response) {
                        var r = jQuery.parseJSON(response.responseText);
                        alert("Message: " + r.Message);
                        alert("StackTrace: " + r.StackTrace);
                        alert("ExceptionType: " + r.ExceptionType);
                    }
                });

                if (isNaN(qty_in_bar)) qty_in_bar=0;
                if (isNaN(grams_in_bar)) grams_in_bar=0;
                if (isNaN(total_qty)) total_qty=0;

                var actual_wastage = total_qty-((qty_in_bar*grams_in_bar)/1000);
                var wastage_percent = (actual_wastage/total_qty)*100;
                var wastage_variance = wastage_percent-anticipated_wastage;

                var output_kg = parseFloat(get_number($('#output_kg').val(),2));
                if (isNaN(output_kg)) output_kg=0;
                if (qty_in_bar==0) qty_in_bar=1;
                var avg_grams = (output_kg*1000)/qty_in_bar;

                $('#total_kg').val(Math.round(total_qty*100)/100);
                $('#avg_grams').val(Math.round(avg_grams*100)/100);
                $("#actual_wastage").val(Math.round(actual_wastage*100)/100);
                $("#wastage_percent").val(Math.round(wastage_percent*100)/100);
                $("#anticipated_wastage").val(Math.round(anticipated_wastage*100)/100);
                $("#wastage_variance").val(Math.round(wastage_variance*100)/100);
            }

            jQuery(function(){
                var counter = $('.raw_material').length;
                $('#repeat-raw_material').click(function(event){
                    event.preventDefault();
                    var newRow = jQuery('<tr id="raw_material_'+counter+'_row">'+
                                            '<td>'+
                                                '<select name="raw_material_id[]" class="form-control raw_material" id="raw_material_'+counter+'">'+
                                                    '<option value="">Select</option>'+
                                                    '<?php if(isset($raw_material)) { for ($k=0; $k < count($raw_material) ; $k++) { ?>'+
                                                            '<option value="<?php echo $raw_material[$k]->id; ?>"><?php echo $raw_material[$k]->rm_name; ?></option>'+
                                                    '<?php }} ?>'+
                                                '</select>'+
                                            '</td>'+
                                            '<td>'+
                                                '<input type="text" class="form-control qty" name="qty[]" id="qty_'+counter+'" placeholder="Qty" value=""/>'+
                                            '</td>'+
                                            '<td style="text-align:center;  vertical-align: middle;">'+
                                                '<a id="raw_material_'+counter+'_row_delete" class="delete_row" href="#"><span class="fa trash fa-trash-o"  ></span></a>'+
                                            '</td>'+
                                        '</tr>');
                    $('#raw_material_details').append(newRow);
                    $('.format_number').keyup(function(){
                        format_number(this);
                    });
                    $(".qty").blur(function(){
                        get_wastage();
                    });
                    $('.delete_row').click(function(event){
                        delete_row($(this));
                        get_wastage();
                    });
                    counter++;
                });
            });
        </script>
    <!-- END SCRIPTS -->      
    </body>
</html>