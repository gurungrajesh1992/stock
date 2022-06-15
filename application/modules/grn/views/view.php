<style>
    .reqsn_cls {
        display: none;
    }
</style>
<section class="content">
    <div class="container-fluid">
        <form class="all_form" method="post" action enctype="multipart/form-data">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title"><?php echo $title ?></h3>

                    <div class="card-tools">
                        <?php
                        $check_grn_change_status = $this->crud_model->get_module_function_for_role('grn', 'change_status');
                        if ($check_grn_change_status == true) {
                        ?>
                            <a class="btn btn-sm btn-info" id="approve_grn" table_id="grn_master-<?php echo $master_detail->id; ?>"><?php echo (isset($master_detail->approved_by) && $master_detail->approved_by != '') ? 'Approved' : 'Approve' ?></a>
                        <?php } ?>
                        <?php
                        $check_grn_grn_post = $this->crud_model->get_module_function_for_role('grn', 'grn_post');
                        if ($check_grn_grn_post == true) {
                        ?>
                            <a class="btn btn-sm btn-success" id="post_grn" table_id="grn_master-<?php echo $master_detail->id; ?>"><?php echo (isset($master_detail->posted_tag) && $master_detail->posted_tag == '1') ? 'Posted' : 'Post' ?></a>
                        <?php } ?>
                        <?php
                        $check_grn_cancel_row = $this->crud_model->get_module_function_for_role('grn', 'cancel_row');
                        if ($check_grn_cancel_row == true) {
                        ?>
                            <a class="btn btn-sm btn-danger" id="cancel_grn" table_id="grn_master-<?php echo $master_detail->id; ?>"><?php echo (isset($master_detail->cancel_tag) && $master_detail->cancel_tag == '1') ? 'Cancelled' : 'Cancel' ?></a>
                        <?php } ?>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>GRN No. : </label>
                                <?php echo (isset($master_detail->grn_no) && $master_detail->grn_no != '') ? $master_detail->grn_no : '' ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date : </label>
                                <?php echo (((isset($master_detail->grn_date)) && $master_detail->grn_date != '') ? $master_detail->grn_date : date('Y-m-d')); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Suppliers : </label>
                                <?php
                                if (!empty($master_detail->supplier_id)) {
                                    $supplier_detail = $this->crud_model->get_where_single('supplier_infos', array('id' => $master_detail->supplier_id));
                                    echo (isset($supplier_detail->supplier_name) && $supplier_detail->supplier_name != '') ? $supplier_detail->supplier_name : '';
                                } ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Payment Type : </label>
                                <?php echo (isset($master_detail->payment_type) && $master_detail->payment_type != '') ? $master_detail->payment_type : '' ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Type : </label>
                                <?php echo (isset($master_detail->type) && $master_detail->type != '') ? $master_detail->type : '' ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Bank Name : </label>
                                <?php echo (((isset($master_detail->bank_name)) && $master_detail->bank_name != '') ? $master_detail->bank_name : ''); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php if ($master_detail->type == 'DR') { ?>

                                <?php } else if ($master_detail->type == "INV") { ?>
                                    <label>Invoice No : </label>
                                    <?php echo (((isset($master_detail->type_no)) && $master_detail->type_no  != '') ? $master_detail->type_no  : ''); ?>
                                <?php } else if ($master_detail->type == "PO") { ?>
                                    <label>Purchase Order No : </label>
                                    <?php echo (((isset($master_detail->type_no)) && $master_detail->type_no != '') ? $master_detail->type_no : ''); ?>
                                <?php } else { ?>
                                    <label>Purchase Request No : </label>
                                    <?php echo (((isset($master_detail->type_no)) && $master_detail->type_no != '') ? $master_detail->type_no : ''); ?>
                                <?php } ?>

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
                                            <div class="col-md-6">
                                                <label>Product</label>
                                            </div>
                                            <div class="col-md-1">
                                                <label>Quantity</label>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Unit Price</label>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Total Price</label>
                                            </div>
                                        </div>
                                        <?php
                                        if (isset($master_detail->grn_no)) {
                                            $childs = $this->crud_model->get_where('grn_details', array('grn_no' => $master_detail->grn_no));
                                            if ($childs) {
                                                $total = 0;
                                                foreach ($childs as $key => $value) {
                                                    $item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $value->item_code));
                                        ?>
                                                    <div class="row" style="margin-bottom: 15px;">
                                                        <div class="col-md-1">
                                                            <?php echo ($key + 1) . '.'; ?>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <?php echo (isset($item_detail->item_name) && $item_detail->item_name != '') ? $item_detail->item_name : ''; ?>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <?php echo (isset($value->qty) && $value->qty != '') ? $value->qty : 0; ?>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <?php echo (isset($value->unit_price) && $value->unit_price != '') ? $value->unit_price : 0; ?>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <?php echo ((isset($value->qty) && $value->qty != '') ? $value->qty : 0) * ((isset($value->unit_price) && $value->unit_price != '') ? $value->unit_price : 0) ?>
                                                        </div>
                                                    </div>
                                                <?php
                                                    $total = $total + (((isset($value->qty) && $value->qty != '') ? $value->qty : 0) * ((isset($value->unit_price) && $value->unit_price != '') ? $value->unit_price : 0));
                                                }
                                                ?>
                                                <div class="row" style="margin-bottom: 15px;">
                                                    <div class="col-md-1">
                                                    </div>
                                                    <div class="col-md-6">
                                                    </div>
                                                    <div class="col-md-1">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label>Total = </label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <?php echo $total; ?>
                                                    </div>
                                                </div>
                                        <?php
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
                        <div class="col-md-12">
                            <div class="grn_item" id="grn_items">
                                <div class=" row">
                                    <div class="col-md-1">
                                        <label>
                                            #
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Charge Name</label>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Remarks</label>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Amount</label>
                                    </div>
                                </div>
                                <div id="charges_append">
                                    <?php
                                    $total_charges = 0;
                                    if (isset($master_detail->grn_no)) {
                                        $charge_childs = $this->crud_model->get_where('grn_charges', array('grn_no' => $master_detail->grn_no));
                                        if ($charge_childs) {
                                            foreach ($charge_childs as $key => $value) {
                                                $charge_detail = $this->crud_model->get_where_single('charge_parameter', array('charge_code' => $value->charge_code));
                                    ?>
                                                <div class="row">
                                                    <div class="col-md-1">
                                                        <?php echo ($key + 1); ?>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <?php echo (isset($charge_detail->charge_name) && $charge_detail->charge_name != '') ? $charge_detail->charge_name : ''; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <?php echo (isset($value->remarks) && $value->remarks != '') ? $value->remarks : '' ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <?php echo (isset($value->amount) && $value->amount) ? $value->amount : '' ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                                $total_charges = $total_charges + $value->amount;
                                            }
                                            ?>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="row">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Total =</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <?php echo $total_charges; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-5"></div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label style="float: left;margin-right: 20px;">Advanced Paid</label>
                            </div>
                        </div>
                        <div class=" col-md-2">
                            <div class="form-group">
                                <?php echo (((isset($master_detail->advance_paid)) && $master_detail->advance_paid != '') ? $master_detail->advance_paid : ''); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-5"></div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label style="float: left;margin-right: 20px;">Discount Percent</label>
                            </div>
                        </div>
                        <div class=" col-md-2">
                            <div class="form-group">
                                <?php echo (((isset($master_detail->discount_per)) && $master_detail->discount_per != '') ? $master_detail->discount_per : ''); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-5"></div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label style="float: left;margin-right: 20px;">Vat Percent</label>
                            </div>
                        </div>
                        <div class=" col-md-2">
                            <div class="form-group">
                                <?php echo (((isset($master_detail->vat_percent)) && $master_detail->vat_percent != '') ? $master_detail->vat_percent : ''); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>