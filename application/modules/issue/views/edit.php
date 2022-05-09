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
                                <label>Issue Slip Date <span class="req">*</span></label>
                                <input type="date" name="issue_date" class="form-control" id="issue_date" placeholder="Country Name" value="<?php echo set_value('issue_date', (((isset($master_detail->issue_date)) && $master_detail->issue_date != '') ? $master_detail->issue_date : date('Y-m-d'))); ?>">
                                <?php echo form_error('issue_date', '<div class="error_message">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Issue Slip No. <span class="req">*</span></label>
                                <input type="text" name="issue_slip_no" class="form-control" id="issue_slip_no" placeholder="Issue Slip Number" value="<?php echo set_value('issue_slip_no', (((isset($master_detail->issue_slip_no)) && $master_detail->issue_slip_no != '') ? $master_detail->issue_slip_no : '')); ?>" readonly>
                                <?php echo form_error('issue_slip_no', '<div class="error_message">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Requisition No. <span class="req">*</span></label>
                                <input type="text" name="requisition_no" class="form-control" id="requisition_no" placeholder="Requisition" value="<?php echo set_value('requisition_no', (((isset($requisition_detail->requisition_no)) && $requisition_detail->requisition_no != '') ? $requisition_detail->requisition_no : '')); ?>" readonly>
                                <?php echo form_error('requisition_no', '<div class="error_message">', '</div>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Department <span class="req">*</span></label>
                                <?php $depart_detail = $this->crud_model->get_where_single_order_by('department_para', array('id' => $requisition_detail->department_id), 'id', 'DESC') ?>
                                <input type="text" name="department_name" class="form-control" id="department_name" placeholder="Department" value="<?php echo set_value('department_name', (((isset($depart_detail->department_name)) && $depart_detail->department_name != '') ? $depart_detail->department_name : '')); ?>" readonly>
                                <input type="hidden" name="department_id" class="form-control" id="department_id" placeholder="Department" value="<?php echo set_value('department_id', (((isset($requisition_detail->department_id)) && $requisition_detail->department_id != '') ? $requisition_detail->department_id : '')); ?>" readonly>
                                <?php echo form_error('department_id', '<div class="error_message">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Staff <span class="req">*</span></label>
                                <?php $staff_detail = $this->crud_model->get_where_single_order_by('staff_infos', array('id' => $requisition_detail->staff_id), 'id', 'DESC') ?>
                                <input type="text" name="staff_name" class="form-control" id="staff_name" placeholder="Staff" value="<?php echo set_value('staff_name', (((isset($staff_detail->full_name)) && $staff_detail->full_name != '') ? $staff_detail->full_name : '')); ?>" readonly>
                                <input type="hidden" name="staff_id" class="form-control" id="staff_id" placeholder="Staff" value="<?php echo set_value('staff_id', (((isset($requisition_detail->staff_id)) && $requisition_detail->staff_id != '') ? $requisition_detail->staff_id : '')); ?>" readonly>
                                <?php echo form_error('staff_id', '<div class="error_message">', '</div>'); ?>
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
                                            <div class="col-md-1">
                                                <label>Issued Quantity</label>
                                            </div>
                                            <div class="col-md-1">
                                                <label>Requested Quantity</label>
                                            </div>
                                            <div class="col-md-1">
                                                <label>Total Issued</label>
                                            </div>
                                            <div class="col-md-1">
                                                <label>Remaining</label>
                                            </div>
                                            <div class="col-md-1">
                                                <label>Stock</label>
                                            </div>
                                            <div class="col-md-5">
                                                <label>Remarks</label>
                                            </div>

                                        </div>
                                        <?php
                                        if (isset($master_detail->issue_slip_no)) {
                                            $childs = $this->crud_model->get_where('issue_slip_details', array('issue_slip_no' => $master_detail->issue_slip_no));
                                            if ($childs) {
                                                $issue_slip_date = ((isset($master_detail->issue_date)) && $master_detail->issue_date != '') ? $master_detail->issue_date : date('Y-m-d');

                                                foreach ($childs as $key => $value) {
                                                    $where_stock = array(
                                                        'item_code' => $value->item_code,
                                                        'transaction_date <=' => $issue_slip_date,
                                                    );
                                                    $total_item_stock_before_issue_slip_date = $this->crud_model->get_total_item_stock('stock_ledger', $where_stock);

                                                    $item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $value->item_code));
                                                    $requisition_detail_item = $this->crud_model->get_where_single('requisition_details', array('item_code' => $value->item_code, 'requisition_no' => $master_detail->requisition_no));

                                                    $requested_qty = (isset($requisition_detail_item->quantity_requested) && $requisition_detail_item->quantity_requested != '') ? $requisition_detail_item->quantity_requested : 0;
                                                    $received_qty = (isset($requisition_detail_item->received_qnty) && $requisition_detail_item->received_qnty != '') ? $requisition_detail_item->received_qnty : 0;
                                                    $remaining_qty = (isset($requisition_detail_item->remaining_qnty) && $requisition_detail_item->remaining_qnty != '') ? $requisition_detail_item->remaining_qnty : 0;
                                        ?>
                                                    <div class="row" style="margin-bottom: 15px;">
                                                        <div class="col-md-2">
                                                            <input type="text" name="item_name[]" class="form-control" placeholder="Item Name" value="<?php echo $item_detail->item_name; ?>" readonly>
                                                            <input type="hidden" name="item_code[]" class="form-control" placeholder="Item Code" value="<?php echo $value->item_code; ?>">
                                                        </div>
                                                        <div class="col-md-1">
                                                            <input type="number" name="issued_quantity[]" max="<?php echo $remaining_qty; ?>" id="issue_<?php echo $value->id; ?>" class="form-control iss" placeholder="Issued Quantity" value="<?php echo (isset($value->issued_qnty) && $value->issued_qnty != '') ? $value->issued_qnty : 0 ?>" required>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <input type="number" name="quantity_requested[]" class="form-control" placeholder="Requested Quantity" value="<?php echo $requested_qty; ?>" readonly>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <input type="number" name="quantity_received[]" class="form-control" placeholder="Received Quantity" value="<?php echo $received_qty; ?>" readonly>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <input type="number" name="remaining[]" id="remaining_<?php echo $value->id; ?>" class="form-control" placeholder="Remaining Quantity" value="<?php echo $remaining_qty; ?>" readonly>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <input type="number" name="in_stock[]" id="stock_<?php echo $value->id; ?>" class="form-control stcks stock_<?php echo $value->item_code; ?>" placeholder="Stock" value="<?php echo $total_item_stock_before_issue_slip_date; ?>" readonly>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <textarea name="issued_remark[]" class="form-control" rows="1" cols="80" autocomplete="off" placeholder="Issued Remarks"><?php echo $value->remarks; ?></textarea>
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
                        <div class=" col-md-4">
                            <div class="form-group">
                                <label>remarks</label>
                                <textarea name="remarks" id="remarks" class="form-control" rows="1" cols="8" autocomplete="off"><?php echo (((isset($master_detail->remarks)) && $master_detail->remarks != '') ? $master_detail->remarks : '') ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Issued Date <span class="req">*</span></label>
                                <input type="date" name="issued_on" class="form-control" id="issued_on" placeholder="Country Name" value="<?php echo set_value('issued_on', (((isset($master_detail->issued_on)) && $master_detail->issued_on != '') ? $master_detail->issued_on : '')); ?>">
                                <?php echo form_error('issued_on', '<div class="error_message">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Issued By <span class="req">*</span></label>
                                <input type="text" name="issued_by" class="form-control" id="issued_by" placeholder="Issueed By" value="<?php echo set_value('issued_by', (((isset($master_detail->issued_by)) && $master_detail->issued_by != '') ? $master_detail->issued_by : '')); ?>">
                                <?php echo form_error('issued_by', '<div class="error_message">', '</div>'); ?>
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