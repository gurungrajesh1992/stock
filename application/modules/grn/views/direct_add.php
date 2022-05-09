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
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Purchase Request No. <span class="req">*</span></label>
                                <input type="text" name="purchase_request_no" class="form-control" id="purchase_request_no" placeholder="Requisition" value="<?php echo set_value('purchase_request_no', (((isset($purchase_request_no)) && $purchase_request_no != '') ? $purchase_request_no : '')); ?>" readonly>
                                <?php echo form_error('purchase_request_no', '<div class="error_message">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Select Department <span class="req">*</span></label>
                                <select name="department_id" class="form-control selct2" id="department_id" required>
                                    <option value>Select Department</option>
                                    <?php foreach ($departments as $key => $value) { ?>
                                        <option value="<?php echo $value->id; ?>" <?php echo  set_select('department_id', $value->id, (isset($detail->department_id) && $detail->department_id  == $value->id) ? TRUE : ''); ?>><?php echo $value->department_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Select Staff <span class="req">*</span></label>
                                <select name="staff_id" class="form-control selct2" id="requested_by" required>
                                    <option value>Select Staff</option>
                                    <?php foreach ($staffs as $key => $value) { ?>
                                        <option value="<?php echo $value->id; ?>" <?php echo  set_select('staff_id', $value->id, (isset($detail->staff_id) && $detail->staff_id  == $value->id) ? TRUE : ''); ?>><?php echo $value->full_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Request Date <span class="req">*</span></label>
                                <input type="date" name="requested_on" class="form-control" id="requested_on" placeholder="Country Name" value="<?php echo set_value('requested_on', (((isset($detail->requested_on)) && $detail->requested_on != '') ? $detail->requested_on : date('Y-m-d'))); ?>" required>
                                <?php echo form_error('requested_on', '<div class="error_message">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Requested By <span class="req">*</span></label>
                                <input type="text" name="requested_by" class="form-control" id="requested_by" placeholder="Requested By" value="<?php echo set_value('requested_by', (((isset($detail->requested_by)) && $detail->requested_by != '') ? $detail->requested_by : '')); ?>" required>
                                <?php echo form_error('requested_by', '<div class="error_message">', '</div>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div style="border: 1px solid #ddd;margin-bottom: 10px;"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Select To Add Items</label>
                                        <select name="item" class="form-control selct2" id="item_purchase_req">
                                            <option value>Select item</option>
                                            <?php foreach ($items as $key => $value) { ?>
                                                <option value="<?php echo $value->item_code; ?>"><?php echo $value->item_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="req_item" id="items">
                                        <div class=" row">
                                            <div class="col-md-1">
                                                <label>
                                                    #
                                                </label>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Product</label>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Quantity</label>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Stock</label>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Remarks</label>
                                            </div>
                                            <div class="col-md-1">

                                            </div>
                                        </div>
                                        <?php
                                        if (isset($detail->purchase_request_no)) {
                                            $childs = $this->crud_model->get_where('purchase_request_details', array('purchase_request_no' => $detail->purchase_request_no));
                                            if ($childs) {
                                                $requisition_date = ((isset($detail->requested_on)) && $detail->requested_on != '') ? $detail->requested_on : date('Y-m-d');
                                                foreach ($childs as $key => $value) {
                                                    $where_stock = array(
                                                        'item_code' => $value->item_code,
                                                        'transaction_date <=' => $requisition_date,
                                                    );
                                                    $total_item_stock_before_requisition_date = $this->crud_model->get_total_item_stock('stock_ledger', $where_stock);
                                                    $item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $value->item_code));
                                        ?>
                                                    <div class="row" style="margin-bottom: 15px;">
                                                        <div class="col-md-1">
                                                            <?php echo ($key + 1) . '.'; ?>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="text" name="item_name[]" class="form-control" placeholder="Item Name" value="<?php echo $item_detail->item_name; ?>" readonly>
                                                            <input type="hidden" name="item_code[]" class="form-control" placeholder="Item Code" value="<?php echo $value->item_code; ?>">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="number" name="requested_qty[]" min="1" id="pr_<?php echo $value->item_code; ?>" class="form-control qty_pr" placeholder="Requested Quantity" value="<?php echo $value->requested_qty; ?>" required>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="number" name="in_stock[]" id="stock_<?php echo $value->item_code; ?>" class="form-control stcks stock_<?php echo $value->item_code; ?>" placeholder="Stock" value="<?php echo $total_item_stock_before_requisition_date; ?>" readonly>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <textarea name="remark[]" class="form-control" rows="1" cols="80" autocomplete="off" placeholder="Remarks"><?php echo $value->remarks; ?></textarea>
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
                        <div class="col-md-12">
                            <div style="border: 1px solid #ddd;margin-bottom: 10px;"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-md-4">
                            <div class="form-group">
                                <label>remarks</label>
                                <textarea name="remarks" id="remarks" class="form-control" rows="1" cols="8" autocomplete="off"><?php echo (((isset($detail->remarks)) && $detail->remarks != '') ? $detail->remarks : '')
                                                                                                                                ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4"></div>
                    </div>
                    <div class=" row">
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="submit" name="submit" class="form-control btn btn-sm btn-primary" id="submit" value="Save">
                                <input type="hidden" name="id" class="form-control btn btn-sm btn-primary" id="submit" value="<?php echo (((isset($detail->id)) && $detail->id != '') ? $detail->id : '') ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>