<div id="ctwpcontent">
	<ul class="language-nav-tabs">
		<li><a href="<?php echo base_url('AdmContactUs'); ?>">Contact Us</a></li>
		<li><a href="<?php echo base_url('AdmContactFormData'); ?>" class="active">Form Data</a></li>
	</ul>
	
	<div class="ctbody-content">
		
		<div class="search-bar cf">
			
                <form method="post" name="seo_form" action="<?php echo base_url('AdmContactFormData'); ?>">    
		<select class="select" name="search_year" id="search_year">
                            <option value="">Year</option>
                            <?php
                                foreach($year_list as $i){
                                    $selected = ($this->input->post('search_year') && $this->input->post('search_year') == $i['year']) ? 'selected' : '';  
                                    echo '<option value="' . $i['year'] . '" '.$selected.'>' . $i['year'] . '</option>';
                                }
                            ?>
                        </select>
                        <select class="select" name="search_month" id="search_month">
                            <option  value="">Month</option>
                            <?php
                                for($i = 1; $i <= 12; $i++){
                                    $dateObj = DateTime::createFromFormat('!m', $i);
                                    $monthName = $dateObj->format('F');
                                    $selected = ($this->input->post('search_month') && $this->input->post('search_month') == $i) ? 'selected' : '';  
                                    echo '<option value="' . $i . '" '.$selected.'>' . $monthName . '</option>';
                                }
                            ?>
                        </select>	
        <input type="text" name="search_keyword" placeholder="Search Keywords" value="<?php echo $this->input->post('search_keyword') ? $this->input->post('search_keyword') : ''?>" id="search" class="input-search">
        <input type="submit" class="button-search" value="Search">
        </form>
		</div>
		
		<div class="ctlists">
                    
                    <div class="table-responsive ctlists">	
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Category</th>
                    <th>Message</th>
                    
                </tr>
            </thead>
            <tbody id="trailer-data">
                <?php
                    
                    $no = 1;
                    foreach($content as $contact){
                        if(!empty($contact)){
                            $video_id = $contact['id'];
                            ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo date('d M Y, h:i A',strtotime($contact['created'])); ?></td>
                                    <td><?php echo $contact['first_name']; ?></td>
                                    
                                    <td><?php echo $contact['last_name']; ?></td>
                                    <td><?php echo $contact['email']; ?></td>
                                    <td>
                                        
                                            <?php echo $contact['phone']; ?>
                                        
                                    </td>
                                   
                                    
                                    <td>
                                        <?php
                                            
                                            echo $contact['category'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            
                                            echo $contact['message'];
                                        ?>
                                    </td>
                                   
                                </tr>
                            <?php
                            //exit;
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
                    
                    
                    <ul class="title cf" style="display: none;">
				<li class="col1"><a href="#">#</a></li>
				<li class="col2"><a href="#">First Name<span class="icon-arrow-drop-down"></span></a></li>
				<li class="col3"><a href="#">Last Name<span class="icon-arrow-drop-up"></span></a></li>
				<li class="col4"><a href="#">Email<span class="icon-arrow-drop-down"></span></a></li>
				<li class="col5"><a href="#">Phone<span class="icon-arrow-drop-down"></span></a></li>
				<li class="col6"><a href="#">Category<span class="icon-arrow-drop-down"></span></a></li>
				<li class="col7"><a href="#">Message<span class="icon-arrow-drop-down"></span></a></li>
<!--				<li class="col8"><a href="#">action</a></li>-->
			</ul>
			<?php
//			if(	!empty( $content ) ) {
//				$srno = 1;
//				foreach( $content as $contact ) {
//					echo '<ul class="info-list cf">';
//						echo '<li class="col1">'. $srno++ .'</li>';
//						echo '<li class="col2">'. $contact['first_name'] .'</li>';
//						echo '<li class="col3">'. $contact['last_name'] .'</li>';
//						echo '<li class="col4">'. $contact['email'] .'</li>';
//						echo '<li class="col5">'. $contact['phone'] .'</li>';
//						echo '<li class="col6">'. $contact['category'] .'</li>';
//						echo '<li class="col7">'. $contact['message'] .'</li>';
//						echo '<li class="col8"><a href="#" class="icon-edit"></a> <a href="#" class="icon-view"></a> <a href="#" class="icon-arrow-drop-down"></a></li>';
//					echo '</ul>';
//				}
//			} else {
//				echo '<ul class="info-list cf">';
//				echo '<p>No data found !!</p>';
//				echo '</ul>';
//			}
			?>
		</div>
		
            <div class="page-bar cf" style="display: none;">
			<div class="pages cf">
		   		<label>1-10 of 100</label>
		   		<a href="" class="icon-previous"></a>
		   		<a href="" class="icon-next"></a>
		   </div>
			<div class="show-rows">
			<label>Show rows:</label>
			<select class="select" name="" id="">
				<option value="">10</option>
				<option value="">25</option>
				<option value="">50</option>
				<option value="">100</option>
				<option value="">250</option>
				<option value="">500</option>
				<option value="">1000</option>
				<option value="">2500</option>
		   </select>
		   </div>
		</div>
        
		
	</div>
	
</div>
<script>
    $(document).ready(function() {
        $('table.nowrap').DataTable();
        $('a[data-toggle="tab"]').on( 'shown.bs.tab', function (e) {
            $.fn.dataTable.tables( {visible: true, api: true} ).columns.adjust();
        });
    } );
</script>