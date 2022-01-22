<section class="content">
      <div class="container-fluid">
    	<div class="row">
        	<div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    	<h3 class="card-title"><?php echo $title; ?></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <div class="row">
                        	<div class="col-md-12 col-lg-12 table-responsive" id="result">
                            	<table class="table table-bordered text-center" id="bootstrap-data-table-export">
                                    <thead>
                                        <tr>    
                                            <th>#</th>
                                            <th>Customer Name</th>                                   
                                            <th>Project Location</th>                               
                                            <th>Min Hoist</th>                                            
                                            <th>AUX Hoist</th>                                            
                                            <th>Location</th>                                      
                                            <th>Class Duty</th>                                
                                            <th>Design Standered</th>                      
                                            <th>Application</th>                                        
                                            <th>Travel Length</th>                                  
                                            <th>Lifting Height</th>                                  
                                            <th>Speed MH</th>                                             
                                            <th>Travel</th>                                    
                                            <th>Scope Supply</th>                                         
                                            <th>Installation</th>                                        
                                            <th>Other Remarks</th>                                        
                                            <th>Action</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody class="text-uppercase">
                                    <?php 
                                     if(!empty($list)){
                                        $i = 0;
                                        foreach ($list as $key => $value) {
                                            $i++;
                                          ?>
                                          <tr>
                                           <td><?php echo $i;?></td>
                                           <td><?php echo $value['name']?></td>
                                           <td><?php echo $value['project_loc']?></td>
                                           <td><?php echo $value['mainhost']?></td>
                                           <td><?php echo $value['auxhoist']?></td>
                                           <td><?php echo $value['location']?></td>
                                           <td><?php echo $value['crane_type']?></td>
                                           <td><?php echo $value['design_standered']?></td>
                                           <td><?php echo $value['application']?></td>
                                           <td><?php echo $value['travel_length']?></td> 
                                           <td><?php echo $value['lifting']?></td>
                                           <td><?php echo $value['MH']?></td>
                                           <td><?php echo $value['travel']?></td>
                                           <td><?php echo $value['scope_supply']?></td>
                                           <td><?php echo $value['installation']?></td>
                                           <td><?php echo $value['other_remarks']?></td>
                                           <td><button type="button" class="btn btn-sm btn-success inst" data-id="<?php echo $value['id'];?>" data-cust_id="<?php echo $value['cust_id'];?>" data-toggle="modal" data-target="#exampleModal">Send Details</button></td>
                                       </tr>
                                           <?php
                                        }  
                                     }
                                    ?> 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>  
    <!-- '''''''''''''''''''''''''''''''''''''''Model'''''''''''''''''''''''''''''''''''''''''   -->
    <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Send Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
             <form method="POST" action="<?php echo base_url('admin/sendquotation')?>" enctype="multipart/form-data">  
                  <div class="modal-body">
                   <div class="row">
                       <div class="col-md-12"><label>Amount</label><input type="text" placeholder="Enter Amount" name="amount" class="form-control"></div>
                       <input type="hidden" name="quot_id" id="id">
                       <input type="hidden" name="cust_id" id="cust_id">
                       <input type="hidden" name="quotation" value="Electric Wire">

                       <div class="col-md-12"><label>Advance Amount</label><input type="text" name="adv_amount" placeholder="Enter Advance Amount" class="form-control"></div>
                       <div class="col-md-12"><label>File Upload</label><input type="file" name="image" class="form-control"></div>
                   </div>
                  
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit"  class="btn btn-success">Submit</button>
                  </div> 
            </form>
            </div>
          </div>
        </div>
<script type="text/javascript">
    $('.inst').click(function(e){

       var id = $(this).data('id');
       var cust_id = $(this).data('cust_id');
       $('#id').val(id);
       $('#cust_id').val(cust_id);
    });
</script>
<script>
    var table;
    $(document).ready(function(){
        createDatatable();
    });

    
    function createDatatable(){
        $('#status').html('');
        table=$('#bootstrap-data-table-export').DataTable();
        table.columns('.select-filter').every(function(index){
            var that = this;
            var title=that.context[0].aoColumns[that[0]].sTitle;
            $ele=$('<div class="col-md-3"></div>');
            var pos=$('#status').append($ele);
            // Create the select list and search operation
            var select = $('<select class="form-control" />').appendTo($ele).on('change',function(){
                            that.search($(this).val()).draw();
                        });
            select.append('<option value="">Select '+title+'</option>');
            // Get the search data for the first column and add to the select list
            this.cache( 'search' ).sort().unique().each(function(d){
                    select.append($('<option value="'+d+'">'+d+'</option>') );
            });
        });
    }

	
	$(document).ready(function(e) {
        $('.hoverable').mouseenter(function(){
            //$('[data-toggle="popover"]').popover();
            $(this).popover('show');                    
        }); 

        $('.hoverable').mouseleave(function(){
            $(this).popover('hide');
        });


          

        

        $('.duplicate').click(function(){
            var dupid = $(this).data('dupid');
            $.ajax({
                url:"<?php echo base_url('home/ajax_sidebar') ;?>",
                method:"POST",
                data:{dupid:dupid},
                success:function(data){
                    //console.log(data);
                    var setdata = JSON.parse(data);
                    //console.log(setdata);
                    $('#activate_menu').val(setdata.activate_menu);
                    $('#activate_not').val(setdata.activate_not);
                    $('#base_url').val(setdata.base_url);
                    $('#icon').val(setdata.icon);
                    $('#parent_id').val(setdata.parent).trigger('change');
                    $('#position').val(setdata.position);
                    var role_text = setdata.role_id;                    
                    $('#roles').val(role_text);
                    $('#status').val(setdata.status);
                }
            });
        });
        
		var table=$('.data-table').DataTable({
			scrollCollapse: true,
			autoWidth: false,
			responsive: true,
			columnDefs: [{
				targets: "no-sort",
				orderable: false,
			}],
			"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
			"language": {
				"info": "_START_-_END_ of _TOTAL_ entries",
				searchPlaceholder: "Search"
			},
		});		
        
		$('body').on('change','#parent_id',function(){
			var parent_id=$(this).val();
			var option="<select name='position' id='position' class='form-control' required>";
			option+="<option value=''>Select </option>";
			option+="<option value='0'>Top</option>";
			$.ajax({
				type:"POST",
				url:"<?php echo base_url("home/getOrderList"); ?>",
				data:{parent_id:parent_id},
				dataType:"json",
				beforeSend: function(){
					//$(".box-overlay").show();
				},
				success: function(data){
					$(data).each(function(i, val) {
						option+="<option value='"+val['position']+"'>After "+val['name']+"</option>";
					});
					option+='</select>';
					$('#position').replaceWith(option);
					$('.box-overlay').hide();
				}
			});
		});
        $('#parent_id').trigger('change');
    });
</script>
