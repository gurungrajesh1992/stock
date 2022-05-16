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
                                <label>Issue Return Date <span class="req">*</span></label>
                                <input type="date" name="return_date" class="form-control" id="return_date" placeholder="Country Name" value="<?php echo set_value('return_date', (((isset($master_detail->return_date)) && $master_detail->return_date != '') ? $master_detail->return_date : date('Y-m-d'))); ?>">
                                <?php echo form_error('return_date', '<div class="error_message">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Issue Return No. <span class="req">*</span></label>
                                <input type="text" name="issue_return_no" class="form-control" id="issue_return_no" placeholder="Issue Slip Number" value="<?php echo set_value('issue_return_no', (((isset($master_detail->issue_return_no)) && $master_detail->issue_return_no != '') ? $master_detail->issue_return_no : '')); ?>" readonly>
                                <?php echo form_error('issue_return_no', '<div class="error_message">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Issue No. <span class="req">*</span></label>
                                <input type="text" name="issue_no" class="form-control" id="issue_no" placeholder="Requisition" value="<?php echo set_value('issue_no', (((isset($master_detail->issue_no)) && $master_detail->issue_no != '') ? $master_detail->issue_no : '')); ?>" readonly>
                                <?php echo form_error('issue_no', '<div class="error_message">', '</div>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
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
                                                <label>Returned Quantity</label>
                                            </div>
                                            <div class="col-md-1">
                                                <label>Issued Quantity</label>
                                            </div>
                                            <div class="col-md-5">
                                                <label>Remarks</label>
                                            </div>

                                        </div>
                                        <?php
                                        if (isset($master_detail->issue_return_no)) {
                                            $childs = $this->crud_model->get_where('issue_return_details', array('issue_return_no' => $master_detail->issue_return_no));
                                            if ($childs) {
                                                $issue_slip_date = ((isset($master_detail->issue_date)) && $master_detail->issue_date != '') ? $master_detail->issue_date : date('Y-m-d');

                                                foreach ($childs as $key => $value) {
                                                    $where_stock = array(
                                                        'item_code' => $value->item_code,
                                                        'transaction_date <=' => $issue_slip_date,
                                                    );
                                                    $total_item_stock_before_issue_slip_date = $this->crud_model->get_total_item_stock('stock_ledger', $where_stock);

                                                    $item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $value->item_code));
                                                    $issue_return_details_item = $this->crud_model->get_where_single('issue_return_details', array('item_code' => $value->item_code, 'issue_return_no' => $master_detail->issue_return_no));

                                                    $requested_qty = (isset($issue_return_details_item->issued_qty) && $issue_return_details_item->issued_qty != '') ? $issue_return_details_item->issued_qty : 0;
                                                    $received_qty = (isset($issue_return_details_item->received_qnty) && $issue_return_details_item->received_qnty != '') ? $issue_return_details_item->received_qnty : 0;
                                                    $returned_qty = (isset($issue_return_details_item->returned_qty) && $issue_return_details_item->returned_qty != '') ? $issue_return_details_item->returned_qty : 0;
                                        ?>
                                                    <div class="row" style="margin-bottom: 15px;">
                                                        <div class="col-md-2">
                                                            <input type="text" name="item_name[]" class="form-control" placeholder="Item Name" value="<?php echo $item_detail->item_name; ?>" readonly>
                                                            <input type="hidden" name="item_code[]" class="form-control" placeholder="Item Code" value="<?php echo $value->item_code; ?>">
                                                        </div>
                                                        <div class="col-md-1">
                                                            <input type="number" name="returned_qty[]" max="<?php echo $returned_qty; ?>" id="issue_<?php echo $value->id; ?>" class="form-control iss" placeholder="Issued Quantity" value="<?php echo (isset($value->returned_qty) && $value->returned_qty != '') ? $value->returned_qty : 0 ?>" required>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <input type="number" name="issued_qty[]" class="form-control" placeholder="Requested Quantity" value="<?php echo $requested_qty; ?>" readonly>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <textarea name="detail_remarks[]" class="form-control" rows="1" cols="80" autocomplete="off" placeholder="Issued Remarks"><?php echo $value->remarks; ?></textarea>
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
                                <input type="date" name="prepared_date" class="form-control" id="prepared_date" placeholder="Country Name" value="<?php echo set_value('prepared_date', (((isset($master_detail->prepared_date)) && $master_detail->prepared_date != '') ? $master_detail->prepared_date : '')); ?>">
                                <?php echo form_error('prepared_date', '<div class="error_message">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Issued By <span class="req">*</span></label>
                                <input type="text" name="prepared_by" class="form-control" id="prepared_by" placeholder="Issueed By" value="<?php echo set_value('prepared_by', (((isset($master_detail->prepared_by)) && $master_detail->prepared_by != '') ? $master_detail->prepared_by : '')); ?>">
                                <?php echo form_error('prepared_by', '<div class="error_message">', '</div>'); ?>
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