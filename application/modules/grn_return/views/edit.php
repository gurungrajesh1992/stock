<section class="content">
    <div class="container-fluid">
        <form class="all_form" method="post" action enctype="multipart/form-data">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title"><?php echo $title ?></h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Goods Return No. <span class="req">*</span></label>
                                <input type="text" name="grn_return_no" class="form-control" id="grn_return_no" placeholder="Goods Return Number" value="<?php echo set_value('grn_return_no', (((isset($master_detail->grn_return_no)) && $master_detail->grn_return_no != '') ? $master_detail->grn_return_no : '')); ?>" readonly>
                                <?php echo form_error('grn_return_no', '<div class="error_message">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>GRN No. <span class="req">*</span></label>
                                <input type="text" name="grn_no" class="form-control" id="grn_no" placeholder="GRN No" value="<?php echo set_value('grn_no', (((isset($master_detail->grn_no)) && $master_detail->grn_no != '') ? $master_detail->grn_no : '')); ?>" readonly>
                                <?php echo form_error('grn_no', '<div class="error_message">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Goods Return Date <span class="req">*</span></label>
                                <input type="date" name="return_date" class="form-control" id="return_date" value="<?php echo set_value('return_date', (((isset($master_detail->return_date)) && $master_detail->return_date != '') ? $master_detail->return_date : date('Y-m-d'))); ?>">
                                <?php echo form_error('return_date', '<div class="error_message">', '</div>'); ?>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Supplier <span class="req">*</span></label>
                                <?php $supplier_detail = $this->crud_model->get_where_single_order_by('supplier_infos', array('id' => $master_detail->supplier_id), 'id', 'DESC') ?>
                                <input type="text" name="supplier_name" class="form-control" id="supplier_name" placeholder="Supplier" value="<?php echo set_value('supplier_name', (((isset($supplier_detail->supplier_name)) && $supplier_detail->supplier_name != '') ? $supplier_detail->supplier_name : '')); ?>" readonly>
                                <input type="hidden" name="supplier_id" class="form-control" id="supplier_id" placeholder="Supplier" value="<?php echo set_value('supplier_id', (((isset($master_detail->supplier_id)) && $master_detail->supplier_id != '') ? $master_detail->supplier_id : '')); ?>" readonly>
                                <?php echo form_error('supplier_id', '<div class="error_message">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>remarks</label>
                                <textarea name="remarks" id="remarks" class="form-control" rows="1" cols="8" autocomplete="off"><?php echo (isset($master_detail->remarks) && $master_detail->remarks != '') ? $master_detail->remarks : ''; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div style="border: 1px solid #ddd;margin-bottom: 10px;"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Select To Add Items</label>
                                <select name="item" class="form-control selct2" id="item_goods_return">
                                    <option value>Select item</option>
                                    <?php
                                    foreach ($items as $key => $value) {
                                        $item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $value->item_code));
                                    ?>
                                        <option value="<?php echo $item_detail->item_code; ?>"><?php echo $item_detail->item_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="req_item" id="items">
                                        <div class=" row">
                                            <div class="col-md-2">
                                                <label>Product</label>
                                            </div>
                                            <div class="col-md-1">
                                                <label>Received Quantity</label>
                                            </div>
                                            <div class="col-md-1">
                                                <label>Return Quantity</label>
                                            </div>
                                            <div class="col-md-7">
                                                <label>Remarks</label>
                                            </div>
                                            <div class="col-md-1">

                                            </div>
                                        </div>
                                        <?php
                                        if (isset($master_detail->grn_no)) {
                                            if ($grn_return_details) {
                                                foreach ($grn_return_details as $key => $value) {

                                                    $item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $value->item_code));

                                                    $return_qty = (isset($value->qty) && $value->qty != '') ? $value->qty : 0;

                                                    $goods_receeive_detail = $this->crud_model->get_where_single('grn_details', array('item_code' => $value->item_code, 'grn_no' => $master_detail->grn_no));

                                                    $received_qty = (isset($goods_receeive_detail->qty) && $goods_receeive_detail->qty != '') ? $goods_receeive_detail->qty : 0;
                                        ?>
                                                    <div class="row" style="margin-bottom: 15px;">
                                                        <div class="col-md-2">
                                                            <input type="text" name="item_name[]" class="form-control" placeholder="Item Name" value="<?php echo $item_detail->item_name; ?>" readonly>
                                                            <input type="hidden" name="item_code[]" class="form-control" placeholder="Item Code" value="<?php echo $value->item_code; ?>">
                                                            <input type="hidden" name="unit_price[]" class="form-control" placeholder="Unit Price" value="<?php echo $value->unit_price; ?>">
                                                        </div>
                                                        <div class="col-md-1">
                                                            <input type="number" name="received_qty[]" class="form-control" placeholder="Received Quantity" value="<?php echo $received_qty; ?>" readonly>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <input type="number" name="qty[]" max="<?php echo $received_qty; ?>" min="1" class="form-control iss" placeholder="R-Q" value="<?php echo $return_qty; ?>" required>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <textarea name="detail_remarks[]" class="form-control" rows="1" cols="80" autocomplete="off" placeholder="Remarks"><?php echo (isset($value->remarks) && $value->remarks != '') ? $value->remarks : '' ?></textarea>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div class="rmv">
                                                                <span class="rmv_itm">X</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                        <?php }
                                            }
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="submit" name="submit" class="form-control btn btn-sm btn-primary" id="submit" value="Save">
                                <input type="hidden" name="id" class="form-control btn btn-sm btn-primary" id="submit" value="<?php echo (((isset($master_detail->id)) && $master_detail->id != '') ? $master_detail->id : '') ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>