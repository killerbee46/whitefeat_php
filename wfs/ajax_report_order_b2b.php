
            <div class="card card-secondary"style="padding-bottom:1em; margin-bottom:0">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-chart-bar"></i> &nbsp; Order Report <small>B2B</small> </h3>

                <div class="card-tools">
                  
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" id="fetch_bill_reprint" style="margin-bottom:0; padding-bottom:0;">
			  
			  
  <div class="callout callout-primary alert">
                  <h5><i class="fas fa-cubes"></i> Orders  <small>(B2B)</small>
				  
			  <div class="row" style="margin-top:1em;">
			  <div class="col-2">
			  <label>Vendor</label>
			  <select id="ps_vendor" class="form-control">
			  <option value='0' selected>ALL</option>
			  <?php
			    include('db_connect.php');
                    $queryuc = "Select * from `whitefeat_wf_new`.`customer` where b2b='1'"; 
                    $displayuc = mysqli_query($con,$queryuc);
		            while($rowuc=mysqli_fetch_array($displayuc))
					{echo '<option value='.$rowuc['c_id'].'>'.ucfirst($rowuc['name']).'</option>';}
			  ?>
			  </select>
			  </div>
			  <div class="col-2">
			  <label>From</label>
			  <input type="date" class="form-control" id="start_date_sales_table"/>
			  </div>
			  <div class="col-2">
			  <label>To</label>
			  <input type="date" class="form-control" id="end_date_sales_table"/>
			  </div>
			  <div class="col-2">
			  <label>Status</label>
			  <select id="ps_status_order" class="form-control">
			  <option value='0' selected>ALL</option>
			  <option value='1' >New Orders</option>
			  <option value='2'>On-Delivery</option>
			  <option value='3'>Delivered</option>
			  </select>
			  </div>
			  <div class="col-2">
			  <label>Payment mode</label>
			  <select id="ps_pay" class="form-control">
			  <option value='0' selected>ALL</option>
			  <option value='1' >Cash-On-Delivery</option>
			  <option value='2'>Khalti</option>
			  <option value='3'>Esewa</option>
			  </select>
			  </div>
			  
			  <div class="col-2">
			  <label>&nbsp;</label>
			  <button class="btn btn-flat form-control btn-outline-primary view_report_sales_table_3">View Report</button>
			  </div>
			  </div>
		
  </div>
				  

		  
            <!-- /.card -->	
			  
  <div class="callout callout-primary alert">
                  <h5><i class="fas fa-shopping-bag"></i> Sales  <small>(B2B)</small>
				  
			  <div class="row" style="margin-top:1em;">
			  <div class="col-2">
			  <label>Vendor</label>
			  <select id="ps_vendor_2" class="form-control">
			  <option value='0' selected>ALL</option>
			  <?php
			  
                    $queryuc = "Select * from `whitefeat_wf_new`.`customer` where b2b='1'"; 
                    $displayuc = mysqli_query($con,$queryuc);
		            while($rowuc=mysqli_fetch_array($displayuc))
					{echo '<option value='.$rowuc['c_id'].'>'.ucfirst($rowuc['name']).'</option>';}
			  ?>
			  </select>
			  </div>
			  <div class="col-2">
			  <label>From</label>
			  <input type="date" class="form-control" id="start_date_sales_table_2"/>
			  </div>
			  <div class="col-2">
			  <label>To</label>
			  <input type="date" class="form-control" id="end_date_sales_table_2"/>
			  </div>
			  <div class="col-2">
			  <label>Status</label> 
			  <select id="ps_status_order_2" class="form-control">
			  <option value='0' selected>ALL</option>
			  <option value='1' >New Orders</option>
			  <option value='2'>On-Delivery</option>
			  <option value='3'>Delivered</option>
			  </select>
			  </div>
			  <div class="col-2">
			  <label>Payment mode</label>
			  <select id="ps_pay_2" class="form-control">
			  <option value='0' selected>ALL</option>
			  <option value='1'>Cash-On-Delivery</option>
			  <option value='2'>Khalti</option>
			  <option value='3'>Esewa</option>
			  </select>
			  </div>
			  
			  <div class="col-2">
			  <label>&nbsp;</label>
			  <button class="btn btn-flat form-control btn-outline-primary view_report_sales_table_4">View Report</button>
			  </div>
			  </div>
		
  </div>
				  



 </div>
		   </div>
            <!-- /.card -->			