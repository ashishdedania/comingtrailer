<div id="ctwpcontent">    
    <?php
    if (isset($inserted)) {
        echo $inserted;
    }
    ?>
    <ul class="language-nav-tabs">    
        <li>
            <a href="<?php echo base_url() ?>AdmViewAllUser">ALL</a>
        </li>            
        <li>
            <a href="<?php echo base_url() ?>AdmViewAllUser/payoutData">PAYOUT</a>
        </li>    
        <li>
            <a class="active" data-toggle="tab" href="<?php echo base_url() ?>AdmViewAllUser/WithdrawReqData">WITHDRAW REQUEST</a>
        </li>
    </ul>
    <div class="ctbody-content">		
        <div class="addcategory-total cf">                   			
            <p class="total-number"><?php echo $withdrawuserdata->num_rows() . ' User Pay'; ?> </p>			
            <a href="javascript:void(0)" id="export" class="button icon-add">Export IN Excel</a>		
        </div>        
        <div class="search-bar cf">            
            <form method="post" name="seo_form" action="<?php echo base_url('AdmViewAllUser/WithdrawReqData'); ?>">                    
                <select class="select" name="search_year" id="search_year">                    
                    <option value="">Year</option>                    
                    <?php
                    $cur_year = date('Y');
                    $end_year = $cur_year - 10;
                    for ($i = $cur_year; $i >= $end_year; $i--) {
                        $selected = ($this->input->post('search_year') && $this->input->post('search_year') == $i) ? 'selected' : '';
                        echo '<option value="' . $i . '" ' . $selected . '>' . $i . '</option>';
                    }
                    ?>
                </select>                
                <select class="select" name="search_month" id="search_month">                    
                    <option  value="">Month</option>                    
<?php
for ($i = 1; $i <= 12; $i++) {
    $dateObj = DateTime::createFromFormat('!m', $i);
    $monthName = $dateObj->format('F');
    $selected = ($this->input->post('search_month') && $this->input->post('search_month') == $i) ? 'selected' : '';
    echo '<option value="' . $i . '" ' . $selected . '>' . $monthName . '</option>';
}
?>                
                </select>                
                <input type="text" name="search_keyword" placeholder="Search Keywords" value="<?php echo $this->input->post('search_keyword') ? $this->input->post('search_keyword') : '' ?>" class="input-search">                <input type="submit" class="button-search" name="search" onclick="searchTrailer()" value="Search">            </form>	</div>        <div class="ctlists alluser">	<div class="table-responsive">	              <table id="" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">        <thead>            <tr>                <th>#</th>                <th>DATE</th>                <th>NAME</th>                <th>NUMBER</th>                <th>EMAIL</th>                <th>POINT</th>                <th>GENDER</th>                <th>ACTION</th>                <th>NEWSLETTER SUBSCRIBE</th>                <th>SOCIAL MEDIA LIKES</th>                <th>INVITE FRIENDS</th>                <th>VIDEO PLAY</th>                <th>VIDEO SHARE</th>                <th>FRIENDS SHARE</th>                <th>EARN RS.</th>                <th>WITHDRAW REQUEST</th>                <th>BY PAYTM</th>                <th>BY BANK</th>                <th>APPROVAL</th>                <th></th>            </tr>        </thead>        <tbody>            <?php $no = 1;
                    foreach ($withdrawuserdata->result_array() as $user_data) { if (!empty($user_data)) { $user_id = $user_data['users_id']; ?>            <tr>                <td><?php echo $no++; ?></td>                <td><?php echo date('d M Y, h:m A', strtotime($user_data['created'])); ?></td>                <td><a href="<?php echo base_url(); ?>AdmOneUserInfo/index/<?php echo $user_id; ?>"><?php echo $user_data['name']; ?></a></td>                <td>                    <?php echo $user_data['mobile']; ?>                 </td>                <td><?php echo $user_data['email']; ?></td>                <td><?php echo $user_data['earn_points']; ?></td>                <td><?php echo $user_data['gender']; ?></td>                <td><a href="<?php echo base_url(); ?>AdmOneUserInfo/index/<?php echo $user_id; ?>" class="icon-view"></a></td>                <td><?php echo $controller->isInNewsLetter($user_data['email']); ?></td>                <td><?php echo $user_data['total_social_likes']; ?></td>                <td><?php echo $user_data['total_invite']; ?></td>                <td><?php echo $user_data['total_video_play']; ?></td>                <td><?php echo $user_data['total_share']; ?></td>                <td><?php echo $user_data['totla_frnds_share']; ?></td>                <td><?php $rs = ($user_data['earn_points']*100)/5000;
                    echo $rs; ?></td>                <td>                    <?php $paytm = $controller->getWithdrawReqUserData($user_id);
                    if($paytm->num_rows()>0){ foreach ($paytm->result_array() as $value) { echo 'Rs '.$rs.', '.$value['created'].'</br>';
                    } } else{ echo 'No withdraw yet';
                    } ?>                </td>                <td>                    <?php $paytm = $controller->getWithdrawReqUserPaytmNo($user_id);
if($paytm->num_rows()>0){ foreach ($paytm->result_array() as $value) { echo $value['paytm_no'].'</br>';
} } else{ echo 'No Paytm Number';
} ?>                </td>                <td>                    <?php $paytm = $controller->getAllReqBankUserData($user_id, 'bank');
if($paytm->num_rows()>0){ foreach ($paytm->result_array() as $value) { echo 'Account Number: '.$value['acc_no'].'</br>'. 'Name: '.$value['acc_name'].'</br>'. 'Bank: '.$value['bank'].'</br>'. 'Branch: '.$value['branch'].'</br>'. 'IFSC Code: '.$value['ifsc_code'].'</br>';
} } else{ echo 'No Bank Details';
} ?></td>                <?php if($user_data['is_approved'] == ''){ ?>                        
                        <td class="cf">                            
                            <a onclick="return confirm('Are You Sure to Approve it?');" href="<?php echo base_url('AdmViewAllUser/approveWithdrawReq/'.$user_data['withdraw_req_id'].'/1'); ?>" class="btn btn-primary">Approve</a>                       
                        </td>                        
                        <td class="cf">                            
                            <form method="post" action="<?php echo base_url('AdmViewAllUser/approveWithdrawReq/'.$user_data['withdraw_req_id'].'/0'); ?>" title="Not Approve">                                
                                <textarea required name="reject_reason" class="reject-description" rows="10" cols="40"></textarea>                                 
                                <input type="submit" class="button delete btn btn-danger" value="Reject">   
                            </form>                   
                        </td>               
 <?php } else{ ?>                      
                        <td class="cf">                           
 <?php echo $user_data['is_approved'] ? 'Approved' : 'Disapporved'; ?>     
                        </td>                                  
                        <td class="cf">                           
 <?php echo ($user_data['is_approved'] == 0) ? $user_data['message'] : ''; ?>    
                        </td>            <?php }          
                        //exit;          
                        //      }            }     
                                     
                        ?>            
                    </tr>        
                            </tbody>    
                        </table>        
                    </div>    
                </div>		
                <div class="seo-bar" style="display: none;">
                    <div class="cf">	
                        <p>Seo</p>		
                        <a href="#" class="arrow icon-arrow-drop-down"></a>	
                    </div>		
                    <div class="open-info">			
                        <div class="input-wrap">		
                            <label>Name</label>			
                            <div class="cf">
                                <input type="text" value="" class="input-field full-field">
                            </div>		
                        </div>				
                        <div class="input-wrap">		
                            <label>TITLE</label>			
                            <div class="cf"><input type="text" value="" class="input-field full-field">
                            </div>			
                        </div>				
                        <div class="input-wrap">	
                            <label>description</label>		
                            <div class="cf"><textarea class="description" rows="10" cols="40">
                                
                                </textarea></div>		
                        </div>				
                        <div class="input-wrap">	
                            <label>keywords</label>	
                            <div class="cf">
                                <input type="text" value="" class="input-field full-field">
                            </div>			
                        </div>				
                        <input type="submit" class="button" value="Save">	
                    </div>			
                </div>				       		
                <div class="ctlists" style="display: none;">	
                    <ul class="title cf">			
                        <li class="col1"><a href="#">#</a></li>		
                        <li class="col2"><a href="#">Date<span class="icon-arrow-drop-down"></span></a>
                        </li>				
                        <li class="col3">
                                    <a href="#" class="active">Name<span class="icon-arrow-drop-up">
                                
                                </span></a></li>
                                <li class="col4">
                                    <a href="#">Movie<span class="icon-arrow-drop-down"></span>
                                    </a></li>			
                                    <li class="col5">
                                        <a href="#">play<span class="icon-arrow-drop-down"></span>
                                        </a>
                                    </li>			
                                        <li class="col6">
                                            <a href="#">like<span class="icon-arrow-drop-down"></span>
                                            </a>
                                        </li>		
                                        <li class="col7">
                                                    <a href="#">category<span class="icon-arrow-drop-down">
                                                
                                                </span></a></li>	
                                                <li class="col8"><a href="#">action</a>
                                                </li>			
                    </ul>			
                    <ul class="info-list cf">			
                        <li class="col1">1</li>				
                        <li class="col2">23 Jan 2017, 5:20 PM</li>		
                        <li class="col3">
                            <a href="#">Dhingana Song ? Raees ? Shah Rukh Khan</a>
                        </li>				
                        <li class="col4"><a href="#">Raees</a>
                        </li>				
                        <li class="col5">52,000
                        </li>				
                        <li class="col6">2,000</li>		
                        <li class="col7"><a href="#">HINDI</a></li>	
                        <li class="col8"><a href="#" class="icon-edit"></a> 
                            <a href="#" class="icon-view"></a> 
                            <a href="#" class="icon-arrow-drop-down"></a>
                        </li>				
                        <ul class="open-info clear">	
                            <li class="cf">
                                <label>Cast</label><p>
                                    <a href="">Shah Rukh Khan</a> 
                                    <a href="">Mahira Khan</a> 
                                    <a href="">Nawazuddin Siddiqui</a>
                                </p></li>				
                            <li class="cf"><label>singers</label><p><a href="">Mika Singh</a></p>
                            </li>					
                            <li class="cf"><label>Music</label><p><a href="">Ram Sampath</a></p>
                            </li>					
                            <li class="cf"><label>Director</label><p><a href="">Rahul Dholakia</a></p>
                            </li>					
                            <li class="cf"><label>(?)</label><p><a href="">Zee Music</a></p>
                            </li>					
                            <li class="cf"><label>description</label>
                                <p>Watch Latest Video Song Dhandhe Ka Dhingana From Shah Rukh Khan's Upcoming movie Raees. Song Sung By Mika Singh.</p>
                            </li>				
                        </ul>			
                    </ul>			
                    <ul class="info-list cf">				
                        <li class="col1">2</li>				
                        <li class="col2">23 Jan 2017, 5:20 PM</li>				
                        <li class="col3"><a href="#">Mere Miyan Gaye England Video Song </a></li>				
                        <li class="col4"><a href="#">Rangoon</a></li>				
                        <li class="col5">52,000</li>				
                        <li class="col6">2,000</li>				
                        <li class="col7"><a href="#">HINDI</a></li>				
                        <li class="col8">
                            <a href="#" class="icon-edit"></a> 
                            <a href="#" class="icon-view"></a> 
                            <a href="#" class="icon-arrow-drop-down"></a>
                        </li>			
                    </ul>			
                    <ul class="info-list cf">				
                        <li class="col1">3</li>				
                        <li class="col2">23 Jan 2017, 5:20 PM</li>				
                        <li class="col3">
                            <a href="#">Jee Lein HD Video</a>
                        </li>				
                        <li class="col4"><a href="#">OK Jaanu</a>
                        </li>				
                        <li class="col5">52,000</li>				
                        <li class="col6">2,000</li>				
                        <li class="col7"><a href="#">HINDI</a></li>				
                        <li class="col8">
                            <a href="#" class="icon-edit"></a> 
                            <a href="#" class="icon-view"></a> 
                            <a href="#" class="icon-arrow-drop-down"></a>
                        </li>			
                    </ul>			
                    <ul class="info-list cf">				
                        <li class="col1">4</li>				
                        <li class="col2">23 Jan 2017, 5:20 PM</li>				
                        <li class="col3"><a href="#">Pyaar Ka Test HD Video</a></li>				
                        <li class="col4"><a href="#">RunningShaadi</a></li>				
                        <li class="col5">52,000</li>				
                        <li class="col6">2,000</li>				
                        <li class="col7"><a href="#">HINDI</a></li>				
                        <li class="col8"><a href="#" class="icon-edit"></a> 
                            <a href="#" class="icon-view"></a> 
                            <a href="#" class="icon-arrow-drop-down"></a>
                        </li>			
                    </ul>			
                    <ul class="info-list cf">				
                        <li class="col1">5</li>				
                        <li class="col2">23 Jan 2017, 5:20 PM</li>				
                        <li class="col3"><a href="#">Jolly Good Fellow</a></li>				
                        <li class="col4"><a href="#">Jolly LLB 2</a></li>				
                        <li class="col5">52,000</li>				
                        <li class="col6">2,000</li>				
                        <li class="col7"><a href="#">HINDI</a></li>				
                        <li class="col8">
                            <a href="#" class="icon-edit"></a> 
                            <a href="#" class="icon-view"></a> 
                            <a href="#" class="icon-arrow-drop-down"></a>
                        </li>
                    </ul>	
                    <ul class="info-list cf">				
                        <li class="col1">6</li>				
                        <li class="col2">23 Jan 2017, 5:20 PM</li>				
                        <li class="col3"><a href="#">Yeh Ishq Hai</a></li>				
                        <li class="col4"><a href="#">Rangoon</a></li>				
                        <li class="col5">52,000</li>				
                        <li class="col6">2,000</li>				
                        <li class="col7"><a href="#">HINDI</a></li>				
                        <li class="col8">
                            <a href="#" class="icon-edit"></a> 
                            <a href="#" class="icon-view"></a> 
                            <a href="#" class="icon-arrow-drop-down"></a>
                        </li>			
                    </ul>			
                    <ul class="info-list cf">			
                        <li class="col1">7</li>				
                        <li class="col2">23 Jan 2017, 5:20 PM</li>	
                        <li class="col3"><a href="#">Jung Hai Humri Aatankwad Se</a></li>	
                        <li class="col4"><a href="#">MSG Lion Heart 2</a></li>		
                        <li class="col5">52,000</li>			
                        <li class="col6">2,000</li>			
                        <li class="col7"><a href="#">HINDI</a></li>		
                        <li class="col8">
                            <a href="#" class="icon-edit"></a> 
                            <a href="#" class="icon-view"></a> 
                            <a href="#" class="icon-arrow-drop-down"></a>
                        </li>			
                    </ul>			
                    
                    <ul class="info-list cf">			
                        <li class="col1">8</li>		
                        <li class="col2">23 Jan 2017, 5:20 PM</li>
                        <li class="col3"><a href="#">Kisi Se Pyaar Ho Jaye</a>
                        </li>
                        <li class="col4"><a href="#">Kaabil</a></li>	
                        <li class="col5">52,000</li>		
                        <li class="col6">2,000</li>		
                        <li class="col7"><a href="#">HINDI</a></li>
                        <li class="col8">
                            <a href="#" class="icon-edit"></a>
                            <a href="#" class="icon-view"></a> 
                            <a href="#" class="icon-arrow-drop-down"></a>
                        </li>			
                    </ul>			
                    <ul class="info-list cf">		
                        <li class="col1">9</li>			
                        <li class="col2">23 Jan 2017, 5:20 PM</li>
                        <li class="col3"><a href="#">Udi Udi Jaye</a></li>
                        <li class="col4"><a href="#">Raees</a></li>		
                        <li class="col5">52,000</li>			
                        <li class="col6">2,000</li>			
                        <li class="col7"><a href="#">HINDI</a></li>		
                        <li class="col8">
                            <a href="#" class="icon-edit"></a>
                            <a href="#" class="icon-view"></a> 
                            <a href="#" class="icon-arrow-drop-down"></a>
                        </li>			
                    </ul>			
                    <ul class="info-list cf">		
                        <li class="col1">10</li>		
                        <li class="col2">23 Jan 2017, 5:20 PM</li>		
                        <li class="col3"><a href="#">Bawara Mann</a></li>
                        <li class="col4"><a href="#">Jolly LLB 2</a></li>	
                        <li class="col5">52,000</li>				
                        <li class="col6">2,000</li>				
                        <li class="col7"><a href="#">HINDI</a></li>		
                        <li class="col8">
                            <a href="#" class="icon-edit"></a> 
                            
                            <a href="#" class="icon-view"></a> 
                            
                                    <a href="#" class="icon-arrow-drop-down"></a>
                                </li>			
                            </ul>		
                        </div>				
                        <div class="page-bar cf">			
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

<script>    $(document).ready(function () {
                        $('table.nowrap').DataTable();
                        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                            $.fn.dataTable.tables({visible: true, api: true}).columns.adjust();
                        });
                    });
                    $(function () {
                        $(document).on('click', '#export', function () {
                            $(".table").table2excel({exclude: ".noExl", name: "User Detail", filename: "AllUserWithDetail", fileext: ".xls", exclude_img: true, exclude_links: true, exclude_inputs: true});            });
                    });
                                        </script>
                                        