<link rel="stylesheet" href="<?php echo base_url() ?>assetss/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assetss/bootstrap/css/jquery-ui.min.css">
        <script src="<?php echo base_url() ?>assetss/bootstrap/js/bootstrap.min.js"></script>
  
   <hr>
   <div class="col-xs-12">
        <div class="text-center">
        <h2>
       Login here...        
   </h2>
                        <div style="margin-top: 4px"  id="message">
                            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                        </div>
        </div>
   </div>
        <div class="row">
            <div class="col-xs-12 text-center">
                  
                        <form action="<?php echo base_url().$action; ?>" method="post" enctype="multipart/form-data">
                            <div class="col-md-12" id='mydiv'>
                               
                                <div class="form-group ">
                                    <div class="col-md-12" >
                                        <label>Enter Registered Email </label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" value="" required></input>
                                           
                                    </div>   

                                    <div class="col-md-12" >
                                        <label>Password </label>
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" value="" required></input>
                                            <button type="submit" id='sub_but'   class="btn btn-primary"><?php echo "Submit" ?></button>                       
                                    </div>  
                 
                                           
                                </div>

                          </div>
                            
	                   </form>
                </div>
         
           


<style>
#mydiv {
    position:fixed;
    top: 50%;
    left: 50%;
    width:30em;
    height:18em;
    margin-top: -9em; /*set to a negative number 1/2 of your height*/
    margin-left: -15em; /*set to a negative number 1/2 of your width*/
    border: 1px solid #ccc;
    background-color: #f3f3f3;
}
</style>