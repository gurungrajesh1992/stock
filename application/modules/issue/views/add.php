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
                                <input type="date" name="issue_date" class="form-control" id="issue_date" placeholder="Country Name" value="<?php echo set_value('issue_date', (((isset($detail->issue_date)) && $detail->issue_date != '') ? $detail->issue_date : date('Y-m-d'))); ?>">
                                <?php echo form_error('issue_date', '<div class="error_message">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Issue Slip No. <span class="req">*</span></label>
                                <input type="text" name="issue_slip_no" class="form-control" id="issue_slip_no" placeholder="Issue Slip Number" value="<?php echo set_value('issue_slip_no', (((isset($issue_slip_no)) && $issue_slip_no != '') ? $issue_slip_no : '')); ?>" readonly>
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
                                <?php $staff_detail = $this->crud_model->get_where_single_order_by('staff_infos', array('id' => $requisition_detail->requested_by), 'id', 'DESC') ?>
                                <input type="text" name="staff_name" class="form-control" id="staff_name" placeholder="Staff" value="<?php echo set_value('staff_name', (((isset($staff_detail->full_name)) && $staff_detail->full_name != '') ? $staff_detail->full_name : '')); ?>" readonly>
                                <input type="hidden" name="staff_id" class="form-control" id="staff_id" placeholder="Staff" value="<?php echo set_value('staff_id', (((isset($requisition_detail->requested_by)) && $requisition_detail->requested_by != '') ? $requisition_detail->requested_by : '')); ?>" readonly>
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
                                            <div class="col-md-1">
                                                <label>
                                                    #
                                                </label>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Product</label>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Issued Quantity</label>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Requested Quantity</label>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Remarks</label>
                                            </div>

                                        </div>
                                        <?php
                                        if (isset($requisition_detail->requisition_no)) {
                                            $childs = $this->crud_model->get_where('requisition_details', array('requisition_no' => $requisition_detail->requisition_no));
                                            if ($childs) {
                                                foreach ($childs as $key => $value) {
                                                    $item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $value->item_code));
                                        ?>
                                                    <div class="row" style="margin-bottom: 15px;">
                                                        <div class="col-md-1">
                                                            <?php echo ($key + 1) . '.'; ?>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" name="item_name[]" class="form-control" placeholder="Item Name" value="<?php echo $item_detail->item_name; ?>" readonly>
                                                            <input type="hidden" name="item_code[]" class="form-control" placeholder="Item Code" value="<?php echo $value->item_code; ?>">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="number" name="issued_quantity[]" class="form-control" placeholder="Issued Quantity" value="" required>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="number" name="quantity_requested[]" class="form-control" placeholder="Requested Quantity" value="<?php echo $value->quantity_requested; ?>" readonly>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <textarea name="issued_remark[]" class="form-control" rows="1" cols="80" autocomplete="off" placeholder="Issued Remarks"></textarea>
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
                                <textarea name="remarks" id="remarks" class="form-control" rows="1" cols="8" autocomplete="off"></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Issued Date <span class="req">*</span></label>
                                <input type="date" name="issued_on" class="form-control" id="issued_on" placeholder="Country Name" value="<?php echo set_value('issued_on', (((isset($detail->issued_on)) && $detail->issued_on != '') ? $detail->issued_on : '')); ?>">
                                <?php echo form_error('issued_on', '<div class="error_message">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Issued By <span class="req">*</span></label>
                                <input type="text" name="issued_by" class="form-control" id="issued_by" placeholder="Issueed By" value="<?php echo set_value('issued_by', (((isset($detail->issued_by)) && $detail->issued_by != '') ? $detail->issued_by : '')); ?>">
                                <?php echo form_error('issued_by', '<div class="error_message">', '</div>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
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