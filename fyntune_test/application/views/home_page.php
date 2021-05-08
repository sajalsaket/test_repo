<link rel="stylesheet" href="<?php echo base_url() ?>assetss/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assetss/bootstrap/css/jquery-ui.min.css">
        <script src="<?php echo base_url() ?>assetss/bootstrap/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>   
        <script src="jquery-3.5.1.min.js"></script>
        <div class="header-main">
                <div class="header-container container">
                    <div class="header-wrap">
                        <!-- Logo @s -->
                        <!-- Menu Toogle @s -->
                        <div class="header-nav-toggle">
                            <a href="#" class="navbar-toggle" data-menu-toggle="example-menu-04">
                                <div class="toggle-line">
                                    <span></span>
                                </div>
                            </a>
                        </div>
                        <!-- Menu @s -->
                        <div class="header-navbar header-navbar-s3">
                            <nav class="header-menu justify-content-between" id="example-menu-04">
                                <ul class="menu menu-s2 animated" data-animate="fadeInDown" data-delay=".75">
                                <?php if($this->session->userdata('validated')== true) { ?>
                                    <li class="menu-item"><a class="btn btn-warning pull-right" href="<?php echo base_url() ?>practical/logout">Logout</a></li>
                                    <?php }else{ ?>
                                        <li class="menu-item"><a class="btn btn-warning pull-right" href="<?php echo base_url() ?>practical">Back to Login page</a></li> 
                                  <?php  }?>
                                </ul>
                              
                            </nav>
                        </div><!-- .header-navbar @e -->
                    </div>
                </div>
            </div><!-- .header-main @e -->
   <hr>
   <div class="col-xs-12">
        <div class="text-center">
        <h2>
       Welcome (<?php if($this->session->userdata('validated')== true){echo $this->session->userdata('name');}else {echo 'Guest';}?>)
   </h2>
   <hr>
                        <!-- <div style="margin-top: 4px"  id="message">
                            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                        </div> -->
        </div>
   </div>
   
        <div class="row">
            <div class="col-xs-12 text-center">
                  <?php if($this->session->userdata('login_id')==true){?>
                        <form action="<?php echo base_url().$action; ?>" method="post" enctype="multipart/form-data">
                            <div class="col-md-12" id='mydiv'>
                               
                                        <div class="form-group " >
                                            <div class="col-md-3" >
                                            </div>
                                            <div class="col-md-6" style="border:thick double #800080; background: #d9d9f2;">
                                                    <label>Post new feed </label>
                                                    <select class="form-control" name='category' required>
                                                        <option value=''>Select Category</option>
                                                        <option value='Category1'>Category 1</option>
                                                        <option value='Category2'>Category 2</option>
                                                        <option value='Category3'>Category 3</option>
                                                        <option value='Category4'>Category 4</option>
                                                    </select>
                                                    <textarea type="text" class="form-control" name="feeds" id="feeds" placeholder="Type here..." value="" required></textarea>
                                                    <div class="col-md-12" >
                                            
                                            <button type="submit" id='sub_but' onclick='return sub()'  class="btn btn-primary pull-right"><?php echo "Post" ?></button>                       
                                    </div>  
                                            </div>   
                                    
                                           
                                            <div class="col-md-3" >
                                            </div>
                                            
                                        </div>
                                </div>
                            
                            </form>
                            <hr>
                            <hr>  
                            <?php }?>

                                <div class="col-md-3" ></div>
                                
                                    <div class="col-md-6  " >       
                                    <hr>
                           <div style="border:thick double #800080; background: #d9d9f2;">
                            <label>Search by Category </label>
                    <form action='<?php echo base_url()?>practical/home' method='post'>
                            <div class="row" >
                            <div class="col-md-10" >
                                        <select class="form-control" name='category'>
                                            <option <?php if($category==''){echo 'selected';}?> value='0'>Show all</option>
                                            <option <?php if($category=='Category1'){echo 'selected';}?> value='Category1'>Category 1</option>
                                            <option <?php if($category=='Category2'){echo 'selected';}?> value='Category2'>Category 2</option>
                                            <option <?php if($category=='Category3'){echo 'selected';}?> value='Category3'>Category 3</option>
                                            <option <?php if($category=='Category4'){echo 'selected';}?> value='Category4'>Category 4</option>
                                        </select>
                                        </div>
                                        <button type="submit" id='sub_but' onclick='return sub()'  class="btn btn-primary pull-left"><?php echo "Search" ?></button>                       
                             </div>
                             </div>
                    </form>   
                    
                            <hr>
                            
</div>
</div>

<div class="row">
<div class="col-md-3" ></div>
<div class="col-md-6" style="border:thick double #800080; background: #d9d9f2;" >
<label>Recent Updates</label>
<?php
$count=0;
foreach($comp_data as $key){?>
                                        <select class="form-control selecter" name='select' id='select<?php echo $key->feed_id ?>' required disabled>
                                            <option <?php if($key->category=='Category1'){echo 'selected';} ?> value='Category1'>Category 1</option>
                                            <option <?php if($key->category=='Category2'){echo 'selected';} ?> value='Category2'>Category 2</option>
                                            <option <?php if($key->category=='Category3'){echo 'selected';} ?> value='Category3'>Category 3</option>
                                            <option <?php if($key->category=='Category4'){echo 'selected';} ?> value='Category4'>Category 4</option>
                                        </select>
    <textarea type="text" rows="10" class="form-control textarea" name="feed_id[]" id="feed_id<?php echo $key->feed_id ?>" required readonly><?php echo $key->feed ?></textarea>
    <label class="pull-left"><small>Posted at: <i><?php echo date('H:i A d-F-Y',strtotime($key->created_at));?></i></small></label>
   <?php
   $feed_user_id=$this->Practical_model->read_feed_user_id($key->feed_id);
//    echo $feed_user_id;
   if($this->session->userdata('login_id')== $feed_user_id) { ?>
    <button  id='delete_btn' onclick='deletefn(<?php echo $key->feed_id;?>)'  class="btn btn-danger pull-right "><small>Delete</small></i></button>
    <button  id='update_btn<?php echo $key->feed_id ?>' onclick='enable(<?php echo $key->feed_id;?>)'  class="btn btn-info pull-right update_btn"><small>Update</small></i></button>                                              
    <button  id='save_btn<?php echo $key->feed_id ?>' style="display:none" onclick='update_fn(<?php echo $key->feed_id;?>)'  class="btn btn-success pull-right save_btn"><small>Save Changes</small></i></button>                                              
<?php } ?>
<hr>
<hr>
<?php
++$count;
}?>

<p><?php echo $links; ?></p>

<p><?php echo $total_rows; ?> result found.</p>
</div>

                        <input type='hidden' id='count' value='<?php echo $count;?>'></input>
                        
                </div>
       </div>  
       </div>
           
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script type="text/javascript">



function update_fn(f_id){
    var feed= $('#feed_id'+f_id).val();
    var select=$('#select'+f_id).val();
// alert(f_id);
$.ajax({
            type: 'POST',
            url: "<?php echo base_url('practical/update_feed'); ?>",
            data: {                     
                'f_id':f_id,
                'feed':feed,
                'category':select,
            },
            success: function (msg) {

            // console.log(msg);
        location.reload();
            }
        });
  

}

function enable(f_id){
    var count = $('#count').val();
    $('.textarea').attr("readonly", true); 
    $('.update_btn').css("display", "block"); 
    $('.save_btn').css("display", "none"); 
    $('.selecter').prop("disabled", "disabled")


    $('#feed_id'+f_id).attr("readonly", false); 
    $('#update_btn'+f_id).css("display", "none"); 
    $('#save_btn'+f_id).css("display", "block"); 
    $('#select'+f_id).prop("disabled", false);
}

function deletefn(feed_id){
    if (confirm("Are you sure?")) {
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('practical/delete_feeds'); ?>",
            data: {                     
                'f_id':feed_id,
            },
            success: function (msg) {

            // console.log(msg);
        location.reload();
            }
        });
    }
    // alert('not');
    return false;
}


</script>

