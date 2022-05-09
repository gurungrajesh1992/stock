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
                                <label>Purchase Order No. <span class="req">*</span></label>
                                <input type="text" name="purchase_order_no" class="form-control" id="purchase_order_no" placeholder="Purchase Request" value="<?php echo set_value('purchase_order_no', (((isset($master_detail->purchase_order_no)) && $master_detail->purchase_order_no != '') ? $master_detail->purchase_order_no : '')); ?>" readonly>
                                <?php echo form_error('purchase_order_no', '<div class="error_message">', '</div>'); ?>
                            </div>
                        </div>

                        <?php if ($master_detail->request_type   == "REQ") { ?>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Requisition No. <span class="req">*</span></label>
                                    <input type="text" name="requisition_no" class="form-control" id="requisition_no" placeholder="Requisition" value="<?php echo set_value('requisition_no', (((isset($master_detail->requisition_no)) && $master_detail->requisition_no != '') ? $master_detail->requisition_no : '')); ?>" readonly>
                                    <?php echo form_error('requisition_no', '<div class="error_message">', '</div>'); ?>
                                </div>
                            </div>
                        <?php } else if ($master_detail->request_type   == "MRN") { ?>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>MRN No. <span class="req">*</span></label>
                                    <input type="text" name="mrn_no" class="form-control" id="mrn_no" placeholder="MRN" value="<?php echo set_value('mrn_no', (((isset($master_detail->mrn_no)) && $master_detail->mrn_no != '') ? $master_detail->mrn_no : '')); ?>" readonly>
                                    <?php echo form_error('mrn_no', '<div class="error_message">', '</div>'); ?>
                                </div>
                            </div>
                        <?php } elseif ($master_detail->request_type   == "PR") { ?>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Purchase Request No. <span class="req">*</span></label>
                                    <input type="text" name="purchase_request_no" class="form-control" id="purchase_request_no" placeholder="MRN" value="<?php echo set_value('purchase_request_no', (((isset($master_detail->purchase_request_no)) && $master_detail->purchase_request_no != '') ? $master_detail->purchase_request_no : '')); ?>" readonly>
                                    <?php echo form_error('purchase_request_no', '<div class="error_message">', '</div>'); ?>
                                </div>
                            </div>
                        <?php    }
                        ?>
                        <?php if ($master_detail->request_type   == "REQ") { ?>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Department <span class="req">*</span></label>
                                    <?php $depart_detail = $this->crud_model->get_where_single_order_by('department_para', array('id' => $master_detail->department_id), 'id', 'DESC') ?>
                                    <input type="text" name="department_name" class="form-control" id="department_name" placeholder="Department" value="<?php echo set_value('department_name', (((isset($depart_detail->department_name)) && $depart_detail->department_name != '') ? $depart_detail->department_name : '')); ?>" readonly>
                                    <input type="hidden" name="department_id" class="form-control" id="department_id" placeholder="Department" value="<?php echo set_value('department_id', (((isset($master_detail->department_id)) && $master_detail->department_id != '') ? $master_detail->department_id : '')); ?>" readonly>
                                    <?php echo form_error('department_id', '<div class="error_message">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Staff <span class="req">*</span></label>
                                    <?php $staff_detail = $this->crud_model->get_where_single_order_by('staff_infos', array('id' => $master_detail->staff_id), 'id', 'DESC') ?>
                                    <input type="text" name="staff_name" class="form-control" id="staff_name" placeholder="Staff" value="<?php echo set_value('staff_name', (((isset($staff_detail->full_name)) && $staff_detail->full_name != '') ? $staff_detail->full_name : '')); ?>" readonly>
                                    <input type="hidden" name="staff_id" class="form-control" id="staff_id" placeholder="Staff" value="<?php echo set_value('staff_id', (((isset($master_detail->staff_id)) && $master_detail->staff_id != '') ? $master_detail->staff_id : '')); ?>" readonly>
                                    <?php echo form_error('staff_id', '<div class="error_message">', '</div>'); ?>
                                </div>
                            </div>
                        <?php } elseif ($master_detail->request_type   == "PR") { ?>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Department <span class="req">*</span></label>
                                    <?php $depart_detail = $this->crud_model->get_where_single_order_by('department_para', array('id' => $master_detail->department_id), 'id', 'DESC') ?>
                                    <input type="text" name="department_name" class="form-control" id="department_name" placeholder="Department" value="<?php echo set_value('department_name', (((isset($depart_detail->department_name)) && $depart_detail->department_name != '') ? $depart_detail->department_name : '')); ?>" readonly>
                                    <input type="hidden" name="department_id" class="form-control" id="department_id" placeholder="Department" value="<?php echo set_value('department_id', (((isset($master_detail->department_id)) && $master_detail->department_id != '') ? $master_detail->department_id : '')); ?>" readonly>
                                    <?php echo form_error('department_id', '<div class="error_message">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Staff <span class="req">*</span></label>
                                    <?php $staff_detail = $this->crud_model->get_where_single_order_by('staff_infos', array('id' => $master_detail->staff_id), 'id', 'DESC') ?>
                                    <input type="text" name="staff_name" class="form-control" id="staff_name" placeholder="Staff" value="<?php echo set_value('staff_name', (((isset($staff_detail->full_name)) && $staff_detail->full_name != '') ? $staff_detail->full_name : '')); ?>" readonly>
                                    <input type="hidden" name="staff_id" class="form-control" id="staff_id" placeholder="Staff" value="<?php echo set_value('staff_id', (((isset($master_detail->staff_id)) && $master_detail->staff_id != '') ? $master_detail->staff_id : '')); ?>" readonly>
                                    <?php echo form_error('staff_id', '<div class="error_message">', '</div>'); ?>
                                </div>
                            </div>
                        <?php  } elseif ($master_detail->request_type   == "MRN") { ?>

                        <?php    } else { ?>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Department <span class="req">*</span></label>
                                    <?php $depart_detail = $this->crud_model->get_where_single_order_by('department_para', array('id' => $master_detail->department_id), 'id', 'DESC') ?>
                                    <input type="text" name="department_name" class="form-control" id="department_name" placeholder="Department" value="<?php echo set_value('department_name', (((isset($depart_detail->department_name)) && $depart_detail->department_name != '') ? $depart_detail->department_name : '')); ?>" readonly>
                                    <input type="hidden" name="department_id" class="form-control" id="department_id" placeholder="Department" value="<?php echo set_value('department_id', (((isset($master_detail->department_id)) && $master_detail->department_id != '') ? $master_detail->department_id : '')); ?>" readonly>
                                    <?php echo form_error('department_id', '<div class="error_message">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Staff <span class="req">*</span></label>
                                    <?php $staff_detail = $this->crud_model->get_where_single_order_by('staff_infos', array('id' => $master_detail->staff_id), 'id', 'DESC') ?>
                                    <input type="text" name="staff_name" class="form-control" id="staff_name" placeholder="Staff" value="<?php echo set_value('staff_name', (((isset($staff_detail->full_name)) && $staff_detail->full_name != '') ? $staff_detail->full_name : '')); ?>" readonly>
                                    <input type="hidden" name="staff_id" class="form-control" id="staff_id" placeholder="Staff" value="<?php echo set_value('staff_id', (((isset($master_detail->staff_id)) && $master_detail->staff_id != '') ? $master_detail->staff_id : '')); ?>" readonly>
                                    <?php echo form_error('staff_id', '<div class="error_message">', '</div>'); ?>
                                </div>
                            </div>
                        <?php    }
                        ?>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Order Date <span class="req">*</span></label>
                                <input type="date" name="requested_on" class="form-control" id="requested_on" placeholder="Country Name" value="<?php echo set_value('requested_on', ((isset($master_detail->requested_on)) && $master_detail->requested_on != '') ? $master_detail->requested_on : date('Y-m-d')); ?>" required>
                                <?php echo form_error('requested_on', '<div class="error_message">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Order By <span class="req">*</span></label>
                                <input type="text" name="requested_by" class="form-control" id="requested_by" placeholder="Requested By" value="<?php echo set_value('requested_by', ((isset($master_detail->requested_by)) && $master_detail->requested_by != '') ? $master_detail->requested_by : ''); ?>" required>
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
                                <div class="col-md-12">
                                    <div class="req_item" id="items">
                                        <div class=" row">
                                            <div class="col-md-2">
                                                <label>Product</label>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Quantity</label>
                                            </div>
                                            <div class="col-md-2">
                                                <label><?php if ($master_detail->request_type == "REQ") {
                                                            echo "REQ Quantity";
                                                        } else if ($master_detail->request_type == "MRN") {
                                                            echo "MRN Quantity";
                                                        } else if ($master_detail->request_type == "PR") {
                                                            echo "PR Quantity";
                                                        } else {
                                                        }
                                                        ?> </label>
                                            </div>
                                            <div class="col-md-2">
                                                <label><?php if ($master_detail->request_type == "REQ") {
                                                            echo "Stock";
                                                        } else if ($master_detail->request_type == "MRN") {
                                                            echo "Stock";
                                                        } else if ($master_detail->request_type == "PR") {
                                                            echo "Stock";
                                                        } else {
                                                        }
                                                        ?></label>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Remarks</label>
                                            </div>
                                        </div>
                                        <?php
                                        if ($master_detail->request_type == "REQ") {
                                            if (isset($master_detail->requisition_no)) {
                                                $childs = $this->crud_model->get_where('purchase_order_details', array('purchase_order_no' => $master_detail->purchase_order_no));
                                                if ($childs) {
                                                    $purchase_request_date = ((isset($master_detail->requested_on)) && $master_detail->requested_on != '') ? $master_detail->requested_on : date('Y-m-d');
                                                    foreach ($childs as $key => $value) {
                                                        $where_stock = array(
                                                            'item_code' => $value->item_code,
                                                            'transaction_date <=' => $purchase_request_date,
                                                        );
                                                        $total_item_stock_before_purchase_request_date = $this->crud_model->get_total_item_stock('stock_ledger', $where_stock);
                                                        $item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $value->item_code));

                                                        $requisition_detail_item = $this->crud_model->get_where_single('requisition_details', array('item_code' => $value->item_code, 'requisition_no' => $master_detail->requisition_no));
                                        ?>
                                                        <div class="row" style="margin-bottom: 15px;">
                                                            <div class="col-md-2">
                                                                <input type="text" name="item_name[]" class="form-control" placeholder="Item Name" value="<?php echo $item_detail->item_name; ?>" readonly>
                                                                <input type="hidden" name="item_code[]" class="form-control" placeholder="Item Code" value="<?php echo $value->item_code; ?>">
                                                            </div>
                                                            <div class="col-md-2">
                                                                <input type="number" name="requested_qty[]" min="1" id="PR_<?php echo $value->id; ?>" class="form-control pr" placeholder="Quantity" value="<?php echo ((isset($value->requested_qty)) && $value->requested_qty != '') ? $value->requested_qty : ''; ?>" required>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <input type="number" name="mrn_req[]" class="form-control" placeholder="MRN/REQ Quantity" value="<?php echo $requisition_detail_item->quantity_requested; ?>" readonly>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <input type="number" name="in_stock[]" id="stock_<?php echo $value->id; ?>" class="form-control stcks stock_<?php echo $value->item_code; ?>" placeholder="Stock" value="<?php echo $total_item_stock_before_purchase_request_date; ?>" readonly>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <textarea name="pr_remark[]" class="form-control" rows="1" cols="80" autocomplete="off" placeholder="Issued Remarks"><?php echo ((isset($value->remarks)) && $value->remarks != '') ? $value->remarks : ''; ?></textarea>
                                                            </div>
                                                        </div>
                                            <?php }
                                                }
                                            } ?>

                                            <?php
                                        } else if ($master_detail->request_type == "MRN") {
                                            if (isset($master_detail->mrn_no)) {
                                                $childs = $this->crud_model->get_where('purchase_order_details', array('purchase_order_no' => $master_detail->purchase_order_no));
                                                if ($childs) {
                                                    $purchase_request_date = ((isset($master_detail->requested_on)) && $master_detail->requested_on != '') ? $master_detail->requested_on : date('Y-m-d');
                                                    foreach ($childs as $key => $value) {
                                                        $where_stock = array(
                                                            'item_code' => $value->item_code,
                                                            'transaction_date <=' => $purchase_request_date,
                                                        );
                                                        $total_item_stock_before_purchase_request_date = $this->crud_model->get_total_item_stock('stock_ledger', $where_stock);
                                                        $item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $value->item_code));

                                                        $mrn_detail_item = $this->crud_model->get_where_single('mrn_details', array('item_code' => $value->item_code, 'mrn_no' => $master_detail->mrn_no));
                                            ?>
                                                        <div class="row" style="margin-bottom: 15px;">
                                                            <div class="col-md-2">
                                                                <input type="text" name="item_name[]" class="form-control" placeholder="Item Name" value="<?php echo $item_detail->item_name; ?>" readonly>
                                                                <input type="hidden" name="item_code[]" class="form-control" placeholder="Item Code" value="<?php echo $value->item_code; ?>">
                                                            </div>
                                                            <div class="col-md-2">
                                                                <input type="number" name="requested_qty[]" min="1" id="PR_<?php echo $value->id; ?>" class="form-control pr" placeholder="Quantity" value="<?php echo ((isset($value->requested_qty)) && $value->requested_qty != '') ? $value->requested_qty : ''; ?>" required>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <input type="number" name="mrn_req[]" class="form-control" placeholder="MRN/REQ Quantity" value="<?php echo $mrn_detail_item->ordered_qty; ?>" readonly>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <input type="number" name="in_stock[]" id="stock_<?php echo $value->id; ?>" class="form-control stcks stock_<?php echo $value->item_code; ?>" placeholder="Stock" value="<?php echo $total_item_stock_before_purchase_request_date; ?>" readonly>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <textarea name="pr_remark[]" class="form-control" rows="1" cols="80" autocomplete="off" placeholder="Issued Remarks"><?php echo ((isset($value->remarks)) && $value->remarks != '') ? $value->remarks : ''; ?></textarea>
                                                            </div>
                                                        </div>
                                            <?php }
                                                }
                                            } ?>
                                            <?php } else if ($master_detail->request_type == "PR") {
                                            if (isset($master_detail->purchase_order_no)) {
                                                $childs = $this->crud_model->get_where('purchase_order_details', array('purchase_order_no' => $master_detail->purchase_order_no));
                                                if ($childs) {
                                                    $purchase_request_date = ((isset($master_detail->requested_on)) && $master_detail->requested_on != '') ? $master_detail->requested_on : date('Y-m-d');
                                                    foreach ($childs as $key => $value) {
                                                        $where_stock = array(
                                                            'item_code' => $value->item_code,
                                                            'transaction_date <=' => $purchase_request_date,
                                                        );
                                                        $total_item_stock_before_purchase_request_date = $this->crud_model->get_total_item_stock('stock_ledger', $where_stock);
                                                        $item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $value->item_code));

                                                        $mrn_detail_item = $this->crud_model->get_where_single('purchase_request_details', array('item_code' => $value->item_code, 'purchase_request_no' => $master_detail->purchase_request_no));
                                            ?>
                                                        <div class="row" style="margin-bottom: 15px;">
                                                            <div class="col-md-2">
                                                                <input type="text" name="item_name[]" class="form-control" placeholder="Item Name" value="<?php echo $item_detail->item_name; ?>" readonly>
                                                                <input type="hidden" name="item_code[]" class="form-control" placeholder="Item Code" value="<?php echo $value->item_code; ?>">
                                                            </div>
                                                            <div class="col-md-2">
                                                                <input type="number" name="requested_qty[]" min="1" id="PR_<?php echo $value->id; ?>" class="form-control pr" placeholder="Quantity" value="<?php echo ((isset($value->requested_qty)) && $value->requested_qty != '') ? $value->requested_qty : ''; ?>" required>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <input type="number" name="mrn_req[]" class="form-control" placeholder="PR Quantity" value="<?php echo $mrn_detail_item->requested_qty; ?>" readonly>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <input type="number" name="in_stock[]" id="stock_<?php echo $value->id; ?>" class="form-control stcks stock_<?php echo $value->item_code; ?>" placeholder="Stock" value="<?php echo $total_item_stock_before_purchase_request_date; ?>" readonly>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <textarea name="pr_remark[]" class="form-control" rows="1" cols="80" autocomplete="off" placeholder="Issued Remarks"><?php echo ((isset($value->remarks)) && $value->remarks != '') ? $value->remarks : ''; ?></textarea>
                                                            </div>
                                                        </div>
                                            <?php }
                                                }
                                            } ?>
                                            <?php } else {
                                            $childs = $this->crud_model->get_where('purchase_order_details', array('purchase_order_no' => $master_detail->purchase_order_no));
                                            if ($childs) {
                                                $purchase_request_date = ((isset($master_detail->requested_on)) && $master_detail->requested_on != '') ? $master_detail->requested_on : date('Y-m-d');
                                                foreach ($childs as $key => $value) {
                                                    $where_stock = array(
                                                        'item_code' => $value->item_code,
                                                        'transaction_date <=' => $purchase_request_date,
                                                    );
                                                    $total_item_stock_before_purchase_request_date = $this->crud_model->get_total_item_stock('stock_ledger', $where_stock);
                                                    $item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $value->item_code));

                                                    $mrn_detail_item = $this->crud_model->get_where_single('purchase_request_details', array('item_code' => $value->item_code, 'purchase_request_no' => $master_detail->purchase_request_no));
                                            ?>
                                                    <div class="row" style="margin-bottom: 15px;">
                                                        <div class="col-md-2">
                                                            <input type="text" name="item_name[]" class="form-control" placeholder="Item Name" value="<?php echo $item_detail->item_name; ?>" readonly>
                                                            <input type="hidden" name="item_code[]" class="form-control" placeholder="Item Code" value="<?php echo $value->item_code; ?>">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="number" name="requested_qty[]" min="1" id="PR_<?php echo $value->id; ?>" class="form-control pr" placeholder="Quantity" value="<?php echo ((isset($value->requested_qty)) && $value->requested_qty != '') ? $value->requested_qty : ''; ?>" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <textarea name="pr_remark[]" class="form-control" rows="1" cols="80" autocomplete="off" placeholder="Issued Remarks"><?php echo ((isset($value->remarks)) && $value->remarks != '') ? $value->remarks : ''; ?></textarea>
                                                        </div>
                                                    </div>
                                            <?php }
                                            }
                                            ?>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-md-4">
                            <div class="form-group">
                                <label>remarks</label>
                                <textarea name="remarks" id="remarks" class="form-control" rows="1" cols="8" autocomplete="off"><?php echo ((isset($master_detail->remarks)) && $master_detail->remarks != '') ? $master_detail->remarks : ''; ?></textarea>
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