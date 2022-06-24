<section class="content">
    <div class="container-fluid">
        <form class="all_form" method="post" action enctype="multipart/form-data">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title"><?php echo $title ?></h3>

                    <div class="card-tools">
                        <?php
                        $check_grn_return_change_status = $this->crud_model->get_module_function_for_role('grn_return', 'change_status');
                        if ($check_grn_return_change_status == true) {
                        ?>
                            <a class="btn btn-sm btn-info" id="approve_grn_return" table_id="grn_return-<?php echo $master_detail->id; ?>"><?php echo (isset($master_detail->approved_by) && $master_detail->approved_by != '') ? 'Approved' : 'Approve' ?></a>
                        <?php } ?>
                        <?php
                        $check_grn_return_grn_return_post = $this->crud_model->get_module_function_for_role('grn_return', 'grn_return_post');
                        if ($check_grn_return_grn_return_post == true) {
                        ?>
                            <a class="btn btn-sm btn-success" id="post_grn_return" table_id="grn_return-<?php echo $master_detail->id; ?>"><?php echo (isset($master_detail->posted_tag) && $master_detail->posted_tag == '1') ? 'Posted' : 'Post' ?></a>
                        <?php } ?>
                        <?php
                        $check_grn_return_cancel_row = $this->crud_model->get_module_function_for_role('grn_return', 'cancel_row');
                        if ($check_grn_return_cancel_row == true) {
                        ?>
                            <a class="btn btn-sm btn-danger" id="cancel_grn_return" table_id="grn_return-<?php echo $master_detail->id; ?>"><?php echo (isset($master_detail->cancel_tag) && $master_detail->cancel_tag == '1') ? 'Cancelled' : 'Cancel' ?></a>
                        <?php } ?>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Goods Return No : </label>
                                <?php echo ((isset($master_detail->grn_return_no)) && $master_detail->grn_return_no != '') ? $master_detail->grn_return_no : '' ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>GRN No : </label>
                                <?php echo ((isset($master_detail->grn_no)) && $master_detail->grn_no != '') ? $master_detail->grn_no : '' ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Goods Return Date :</label>
                                <?php echo ((isset($master_detail->return_date)) && $master_detail->return_date != '') ? $master_detail->return_date : '' ?>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Supplier :<span class="req">*</span></label>
                                <?php $supplier_detail = $this->crud_model->get_where_single_order_by('supplier_infos', array('id' => $master_detail->supplier_id), 'id', 'DESC') ?>
                                <?php echo ((isset($supplier_detail->supplier_name)) && $supplier_detail->supplier_name != '') ? $supplier_detail->supplier_name : '' ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>remarks :</label>
                                <?php echo ((isset($master_detail->remarks)) && $master_detail->remarks != '') ? $master_detail->remarks : '' ?>
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
                                                <label>Received Quantity</label>
                                            </div>
                                            <div class="col-md-1">
                                                <label>Return Quantity</label>
                                            </div>
                                            <div class="col-md-8">
                                                <label>Remarks</label>
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
                                                            <?php echo ((isset($item_detail->item_name)) && $item_detail->item_name != '') ? $item_detail->item_name : '' ?>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <?php echo $received_qty; ?>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <?php echo $return_qty; ?>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <?php echo (isset($value->remarks) && $value->remarks != '') ? $value->remarks : '' ?>
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
                        <label>Goods Return No : </label>
                        <?php echo ((isset($master_detail->grn_return_no)) && $master_detail->grn_return_no != '') ? $master_detail->grn_return_no : '' ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>GRN No : </label>
                        <?php echo ((isset($master_detail->grn_no)) && $master_detail->grn_no != '') ? $master_detail->grn_no : '' ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Print Date :</label>
                        <?php echo date("F j, Y"); ?>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Goods Return Date :</label>
                        <?php echo ((isset($master_detail->return_date)) && $master_detail->return_date != '') ? $master_detail->return_date : '' ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Supplier :</label>
                        <?php $supplier_detail = $this->crud_model->get_where_single_order_by('supplier_infos', array('id' => $master_detail->supplier_id), 'id', 'DESC') ?>
                        <?php echo ((isset($supplier_detail->supplier_name)) && $supplier_detail->supplier_name != '') ? $supplier_detail->supplier_name : '' ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>remarks :</label>
                        <?php echo ((isset($master_detail->remarks)) && $master_detail->remarks != '') ? $master_detail->remarks : '' ?>
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
                                        <label>SN</label>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Product</label>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Received Quantity</label>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Return Quantity</label>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Remarks</label>
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
                                                    <?php echo ($key + 1) . '.'; ?>
                                                </div>
                                                <div class="col-md-2">
                                                    <?php echo ((isset($item_detail->item_name)) && $item_detail->item_name != '') ? $item_detail->item_name : '' ?>
                                                </div>
                                                <div class="col-md-2">
                                                    <?php echo $received_qty; ?>
                                                </div>
                                                <div class="col-md-2">
                                                    <?php echo $return_qty; ?>
                                                </div>
                                                <div class="col-md-4">
                                                    <?php echo (isset($value->remarks) && $value->remarks != '') ? $value->remarks : '' ?>
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