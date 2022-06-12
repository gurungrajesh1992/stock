<section class="content">
    <div class="container-fluid">
        <h2 class="text-center display-4">Search</h2>
        <form action="<?php echo base_url('grn/admin/search'); ?> " method="post">
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
                            <label>Select Supplier <span class="req"></span></label>
                                <select name="supplier_id" class="form-control selct2" id="supplier_id" required>
                                    <option value>Select Supplier</option>
                                    <?php foreach ($suppliers as $key => $value) { ?>
                                        <option value="<?php echo $value->id; ?>" <?php echo  set_select('supplier_id', $value->id, (isset($detail->supplier_id) && $detail->supplier_id  == $value->id) ? TRUE : ''); ?>><?php echo $value->supplier_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                            <label>Select Type</label>
                               <select name="type" class="form-control selct2" id="grn_request_type" required>
                                    <option value="DR" <?php echo (isset($type) && $type == 'DR') ? 'selected' : ''; ?>>Direct</option>
                                    <option value="INV" <?php echo (isset($type) && $type == 'INV') ? 'selected' : ''; ?>>Invoice</option>
                                    <option value="PO" <?php echo (isset($type) && $type == 'PO') ? 'selected' : ''; ?>>Purchase Order</option>
                                    <option value="PRQ" <?php echo (isset($type) && $type == 'PRQ') ? 'selected' : ''; ?>>Purchase Request</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                            <label>Select Payment Type <span class="req"></span></label>
                                <select name="payment_type" class="form-control selct2" id="payment_type" required>
                                    <option value="CH" <?php echo  set_select('payment_type', 'CH', (isset($detail->payment_type) && $detail->payment_type  == 'CH') ? TRUE : ''); ?>>Cash</option>
                                    <option value="CQ" <?php echo  set_select('payment_type', 'CQ', (isset($detail->payment_type) && $detail->payment_type  == 'CQ') ? TRUE : ''); ?>>Cheque</option>
                                    <option value="CR" <?php echo  set_select('payment_type', 'CR', (isset($detail->payment_type) && $detail->payment_type  == 'CR') ? TRUE : ''); ?>>Credit</option>
                                </select>
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
                        <input type="search" name="grn_no" class="form-control" placeholder="GRN No" value="">
                            <input type="submit" name="submit" value=" search">                          
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>