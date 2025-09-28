<?php { 
include('db_connect.php');
                    $queryud = "Select * from `whitefeat_wf_new`.`login` where id_user='".$_SESSION['u_id']."'"; 
                    $displayud = mysqli_query($con,$queryud);
		            $rowud=mysqli_fetch_array($displayud);
					
					?>
<!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
			   
			   
			 
		<?php 
      	
	     
		 echo'<li class="nav-item">
            <a href="appointment.php" class="nav-link open_order">
              <i class="nav-icon fas fa-home"></i>
              <p>
                 Appoinments <span class="badge badge-warning">';
                    $queryuc = "Select * from `whitefeat_wf_new`.`inquiry` where visit='0'"; 
                    $displayuc = mysqli_query($con,$queryuc);
		            $rowuc=mysqli_num_rows($displayuc);
					echo $rowuc;

				echo'</span>
              </p>
            </a>
          </li>';
		  
		  
		 echo'<li class="nav-item">
            <a href="order.php" class="nav-link open_order">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                 Orders <span class="badge badge-warning">';
                    $queryuc = "Select * from `whitefeat_wf_new`.`cart_book` where checkout='1' and dispatch='0'"; 
                    $displayuc = mysqli_query($con,$queryuc);
		            $rowuc=mysqli_num_rows($displayuc);
					echo $rowuc;

				echo'</span>
              </p>
            </a>
          </li>';
		  
	     
		 echo'<li class="nav-item">
            <a href="#" class="nav-link open_table">
              <i class="nav-icon fas fa-cube"></i>
              <p>
                 Categories <span class="badge badge-success">';
                    $queryuc = "Select * from `whitefeat_wf_new`.`package_category`"; 
                    $displayuc = mysqli_query($con,$queryuc);
		            $rowuc=mysqli_num_rows($displayuc);
					echo $rowuc;

				echo'</span>
              </p>
            </a>
          </li>';
		  
		  echo'<li class="nav-item">
            <a href="product.php" class="nav-link open_food">
              <i class="nav-icon fas fa-cubes"></i>
              <p>
                Products  <span class="badge badge-success">';
                    $queryuc = "Select * from `whitefeat_wf_new`.`package`"; 
                    $displayuc = mysqli_query($con,$queryuc);
		            $rowuc=mysqli_num_rows($displayuc);
					echo $rowuc;

				echo'</span>
              </p>
            </a>
          </li>';
		 
		 echo'<li class="nav-item">
            <a href="#" class="nav-link open_slider">
              <i class="nav-icon fas fa-images"></i>
              <p>
                Sliders 
              </p>
            </a>
          </li>';
		 
		  
		 echo'<li class="nav-item">
            <a href="#" class="nav-link open_banner">
              <i class="nav-icon fas fa-images"></i>
              <p>
                Banners 
              </p>
            </a>
          </li>';
		 
		 
		 
		 echo'<li class="nav-item">
            <a href="#" class="nav-link open_review">
              <i class="nav-icon fas fa-comments"></i>
              <p>
                Reviews  <span class="badge badge-primary">'; 
				$queryuc = "Select * from `whitefeat_wf_new`.`testimonials`"; 
                    $displayuc = mysqli_query($con,$queryuc);
		            $rowuc=mysqli_num_rows($displayuc);
					echo $rowuc;
				echo'</span>
              </p>
            </a>
          </li>';
		  
		 echo'<li class="nav-item">
            <a href="#" class="nav-link open_content">
              <i class="nav-icon fas fa-comment-alt"></i>
              <p>
                Contents  
              </p>
            </a>
          </li>';
		  
		  
		 echo'<li class="nav-item">
            <a href="#" class="nav-link open_alert">
              <i class="nav-icon fas fa-bullhorn"></i>
              <p>
                Alerts 
              </p>
            </a>
          </li>';
		 
		  
		 echo'<li class="nav-item">
            <a href="#" class="nav-link open_menu">
              <i class="nav-icon fas fa-sort-alpha-up"></i>
              <p>
                Header Menu 
              </p>
            </a>
          </li>';
		 
		 
		 
			  
		  
		   
			  ?> 
			    
			    
			   
		  
		  
			  <?php 

			
      		
         echo' <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-alt" ></i>
              <p>
                Reports
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">';
			
				
			echo'
              <li class="nav-item">
                <a href="#" class="nav-link order_report">
                  <i class="fas fa-circle nav-icon" style="font-size:0.8em;"></i>
                  <small><p>B2C Report </p></small>
                </a>
              </li>';
			
				
			echo'
              <li class="nav-item">
                <a href="#" class="nav-link order_report_b2b">
                  <i class="fas fa-circle nav-icon" style="font-size:0.8em;"></i>
                  <small><p>B2B Report </p></small>
                </a>
              </li>';
			
			
			
             
			
           
			  echo'
            </ul>
          </li>';
		   
		  
      		
         echo' <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog" ></i>
              <p>
                Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">';
			
				
			echo'
              <li class="nav-item">
                <a href="#" class="nav-link open_social">
                  <i class="fas fa-circle nav-icon" style="font-size:0.8em;"></i>
                  <small><p>Social Links</p></small>
                </a>
              </li>';
			
				
			echo'
              <li class="nav-item">
                <a href="#" class="nav-link open_users">
                  <i class="fas fa-users nav-icon" style="font-size:0.8em;"></i>
                  <small><p>Users</p></small>
                </a>
              </li>';
					
			echo'
              <li class="nav-item">
                <a href="#" class="nav-link open_subs">
                  <i class="fas fa-users nav-icon" style="font-size:0.8em;"></i>
                  <small><p>Subscribers</p></small>
                </a>
              </li>';
			
             	
			echo'
              <li class="nav-item">
                <a href="#" class="nav-link open_converter">
                  <i class="fas fa-wrench nav-icon" style="font-size:0.8em;"></i>
                  <small><p>Price & Currency Coverter</p></small>
                </a>
              </li>';
			
             
			
           
			  echo'
            </ul>
          </li>';
		   
		  
		
		   
		  ?>
		  
		
		  
		  
		  <li class="nav-item " style="position:fixed;bottom:0;left:0;" disabled>
                <a href="#" class="nav-link " >
                  <small><small><p>WF CMS &copy; 2025, PHP 8.3  <!--Brainchild Technologies--></p></small></small>
                </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
	  <?php }?>