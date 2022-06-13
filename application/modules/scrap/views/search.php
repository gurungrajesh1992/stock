<section class="content">
    <div class="container-fluid">
        <h2 class="text-center display-4">Search</h2>
        <form action="<?php echo base_url('scrap/admin/search'); ?> " method="post">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <?php 	$suppliers = $this->crud_model->get_where('supplier_infos', array('status' => '1'));
	?>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label> Date From:</label>
                                <input type="date" name="date_from" class="form-control" placeholder="Date From" value="">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label> Date to:</label>
                                <input type="date" name="date_to" class="form-control" placeholder="Date To" value="">
                            </div>
                        </div>
                          <div class="col-3">
                            <div class="form-group">
                                <label>Cancelled:</label>
                                <select name="cancelled" class="form-control">
                                    <option value="">Select</option>
                                    <option value="0">not cancelled</option>
                                    <option value="1">cancelled</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Approved:</label>
                                <select name="approved" class="form-control" id="requested_by">
                                    <option value="">Select</option>
                                    <option value="0">not approved</option>
                                    <option value="1">approved</option>

                                </select>
                            </div>
                        </div>
                       
                     
                    </div>  
                    
                    <div class="form-group">
                        <div class="input-group input-group-lg">
                          <input type="search" name="scrap_code" class="form-control" placeholder="Scrap Code" value="">
                           <input type="submit" name="submit" value=" search">                          
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>