<section class="content">
    <div class="container-fluid">
        <form class="all_form" method="post" action enctype="multipart/form-data">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title"><?php echo $title ?></h3>

                    <div class="card-tools">
                        <?php
                        $check_purchase_request_change_status = $this->crud_model->get_module_function_for_role('purchase_request', 'change_status');
                        if ($check_purchase_request_change_status == true) {
                        ?>
                            <a class="btn btn-sm btn-info" id="approve_purchase_request" table_id="purchase_request-<?php echo $master_detail->id; ?>"><?php echo (isset($master_detail->approved_by) && $master_detail->approved_by != '') ? 'Approved' : 'Approve' ?></a>
                        <?php } ?>
                        <?php
                        $check_purchase_request_cancel_row = $this->crud_model->get_module_function_for_role('purchase_request', 'cancel_row');
                        if ($check_purchase_request_cancel_row == true) {
                        ?>
                            <a class="btn btn-sm btn-danger" id="cancel_purchase_request" table_id="purchase_request-<?php echo $master_detail->id; ?>"><?php echo (isset($master_detail->cancel_tag) && $master_detail->cancel_tag == '1') ? 'Cancelled' : 'Cancel' ?></a>
                        <?php  } ?>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Purchase Request No : </label>
                                <?php echo (((isset($master_detail->purchase_request_no)) && $master_detail->purchase_request_no != '') ? $master_detail->purchase_request_no : ''); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Department : </label>
                                <?php
                                if (!empty($master_detail->department_id)) {
                                    $depart_detail = $this->crud_model->get_where_single('department_para', array('id' => $master_detail->department_id));
                                    echo (isset($depart_detail->department_name) && $depart_detail->department_name != '') ? $depart_detail->department_name : '';
                                } ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Request Date : </label>
                                <?php echo (((isset($master_detail->requested_on)) && $master_detail->requested_on != '') ? $master_detail->requested_on : ''); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Staff : </label>
                                <?php
                                if (!empty($master_detail->staff_id)) {
                                    $staff_detail = $this->crud_model->get_where_single('staff_infos', array('id' => $master_detail->staff_id));
                                    echo (isset($staff_detail->full_name) && $staff_detail->full_name != '') ? $staff_detail->full_name : '';
                                } ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Requested By : </label>
                                <?php echo (((isset($master_detail->requested_by)) && $master_detail->requested_by != '') ? $master_detail->requested_by : ''); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php if ($master_detail->request_type == 'DR') { ?>

                                <?php } else if ($master_detail->request_type == "MRN") { ?>
                                    <label>MRN No : </label>
                                    <?php echo (((isset($master_detail->mrn_no)) && $master_detail->mrn_no  != '') ? $master_detail->mrn_no  : ''); ?>
                                <?php } else { ?>
                                    <label>Requisition No : </label>
                                    <?php echo (((isset($master_detail->requisition_no)) && $master_detail->requisition_no != '') ? $master_detail->requisition_no : ''); ?>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Type : </label>
                                <?php echo (((isset($master_detail->request_type)) && $master_detail->request_type != '') ? $master_detail->request_type : ''); ?>
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
                                            <div class="col-md-2">
                                                <label>Product</label>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Quantity</label>
                                            </div>
                                            <div class="col-md-7">
                                                <label>Remarks</label>
                                            </div>
                                        </div>
                                        <?php
                                        if (isset($master_detail->purchase_request_no)) {
                                            $childs = $this->crud_model->get_where('purchase_request_details', array('purchase_request_no' => $master_detail->purchase_request_no));
                                            if ($childs) {
                                                foreach ($childs as $key => $value) {
                                                    $item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $value->item_code));
                                        ?>
                                                    <div class="row" style="margin-bottom: 15px;">
                                                        <div class="col-md-1">
                                                            <?php echo ($key + 1) . '.'; ?>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <?php echo (isset($item_detail->item_name) && $item_detail->item_name != '') ? $item_detail->item_name : ''; ?>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <?php echo (isset($value->requested_qty) && $value->requested_qty != '') ? $value->requested_qty : ''; ?>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <?php echo (isset($value->remarks) && $value->remarks != '') ? $value->remarks : ''; ?>
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
                                <label>remarks : </label>
                                <?php echo (((isset($master_detail->remarks)) && $master_detail->remarks != '') ? $master_detail->remarks : '') ?>
                            </div>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4"></div>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <input type="button" class="form-control btn btn-sm btn-primary" onclick="printDiv('printableArea')" id="submit" value="Print">
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container-fluid invoice-container" id="printableArea" hidden>
    <!-- Header -->
    <?php echo $this->load->view('layouts/admin/partials/bill_head'); ?>


    <!-- Main Content -->
    <main>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Purchase Request No : </label>
                        <?php echo (((isset($master_detail->purchase_request_no)) && $master_detail->purchase_request_no != '') ? $master_detail->purchase_request_no : ''); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Department : </label>
                        <?php
                        if (!empty($master_detail->department_id)) {
                            $depart_detail = $this->crud_model->get_where_single('department_para', array('id' => $master_detail->department_id));
                            echo (isset($depart_detail->department_name) && $depart_detail->department_name != '') ? $depart_detail->department_name : '';
                        } ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Print Date : </label>
                        <?php echo date("F j, Y"); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Request Date : </label>
                        <?php echo (((isset($master_detail->requested_on)) && $master_detail->requested_on != '') ? $master_detail->requested_on : ''); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Staff : </label>
                        <?php
                        if (!empty($master_detail->staff_id)) {
                            $staff_detail = $this->crud_model->get_where_single('staff_infos', array('id' => $master_detail->staff_id));
                            echo (isset($staff_detail->full_name) && $staff_detail->full_name != '') ? $staff_detail->full_name : '';
                        } ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Requested By : </label>
                        <?php echo (((isset($master_detail->requested_by)) && $master_detail->requested_by != '') ? $master_detail->requested_by : ''); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <?php if ($master_detail->request_type == 'DR') { ?>

                        <?php } else if ($master_detail->request_type == "MRN") { ?>
                            <label>MRN No : </label>
                            <?php echo (((isset($master_detail->mrn_no)) && $master_detail->mrn_no  != '') ? $master_detail->mrn_no  : ''); ?>
                        <?php } else { ?>
                            <label>Requisition No : </label>
                            <?php echo (((isset($master_detail->requisition_no)) && $master_detail->requisition_no != '') ? $master_detail->requisition_no : ''); ?>
                        <?php } ?>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Type : </label>
                        <?php echo (((isset($master_detail->request_type)) && $master_detail->request_type != '') ? $master_detail->request_type : ''); ?>
                    </div>
                </div>
                <div class=" col-md-4">
                    <div class="form-group">
                        <label>remarks : </label>
                        <?php echo (((isset($master_detail->remarks)) && $master_detail->remarks != '') ? $master_detail->remarks : '') ?>
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
                                        <label>
                                            SN
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Product</label>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Quantity</label>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Remarks</label>
                                    </div>
                                </div>
                                <?php
                                if (isset($master_detail->purchase_request_no)) {
                                    $childs = $this->crud_model->get_where('purchase_request_details', array('purchase_request_no' => $master_detail->purchase_request_no));
                                    if ($childs) {
                                        foreach ($childs as $key => $value) {
                                            $item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $value->item_code));
                                ?>
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="col-md-2">
                                                    <?php echo ($key + 1) . '.'; ?>
                                                </div>
                                                <div class="col-md-3">
                                                    <?php echo (isset($item_detail->item_name) && $item_detail->item_name != '') ? $item_detail->item_name : ''; ?>
                                                </div>
                                                <div class="col-md-3">
                                                    <?php echo (isset($value->requested_qty) && $value->requested_qty != '') ? $value->requested_qty : ''; ?>
                                                </div>
                                                <div class="col-md-4">
                                                    <?php echo (isset($value->remarks) && $value->remarks != '') ? $value->remarks : ''; ?>
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

        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-sm-9 text-sm-end">
                <br>
                <br>
                ...................................
                <br>
                <b> Receiver's Signature </b>
                <br>
            </div>
            <div class="col-sm-3">
                <br>
                <br>
                ...................................
                <br>
                <b> Authorized Signature </b>
                <br>
            </div>
        </div>

    </footer>

</div>


<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>