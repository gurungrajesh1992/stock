<section class="content">
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title"><?php echo $title ?></h3>

                <div class="card-tools">
                    <a class="btn btn-sm btn-info" id="approve" table_id="item_scrap-<?php echo $detail->id; ?>"><?php echo (isset($detail->approved_by) && $detail->approved_by != '') ? 'Approved' : 'Approve' ?></a>
                    <a class="btn btn-sm btn-success" id="post_scrap" table_id="item_scrap-<?php echo $detail->id; ?>"><?php echo (isset($detail->posted_tag) && $detail->posted_tag == '1') ? 'Posted' : 'Post' ?></a>
                    <a class="btn btn-sm btn-danger" id="cancel" table_id="item_scrap-<?php echo $detail->id; ?>"><?php echo (isset($detail->cancel_tag) && $detail->cancel_tag == '1') ? 'Cancelled' : 'Cancel' ?></a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Scrap Code : </label>
                            <?php echo (isset($detail->scrap_code) && $detail->scrap_code != '') ? $detail->scrap_code : ''; ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Remarks : </label>
                            <?php echo ((isset($detail->remarks)) && $detail->remarks != '') ? $detail->remarks : ''; ?>
                        </div>
                    </div>
                    <div class="col-md-4">

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div style="border: 1px solid #ddd;margin-bottom: 10px;"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="scrap_item" id="items">
                            <?php if ($detail->type == 'Assets') { ?>
                                <div class=" row">
                                    <div class="col-md-1">
                                        <label>
                                            #
                                        </label>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Product</label>
                                    </div>
                                    <div class="col-md-1">
                                        <label>Type</label>
                                    </div>
                                    <div class="col-md-1">
                                        <label>Quantity</label>
                                    </div>
                                    <div class="col-md-1">
                                        <label>Stock</label>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Depreciated</label>
                                    </div>
                                    <div class="col-md-1">
                                        <label>Book Value</label>
                                    </div>
                                    <div class="col-md-1">
                                        <label>Total Depreciated</label>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Remarks</label>
                                    </div>
                                </div>
                                <?php
                                if (isset($detail->scrap_code)) {
                                    $childs = $this->crud_model->get_where('item_scrap_detail', array('scrap_code' => $detail->scrap_code));
                                    if ($childs) {
                                        foreach ($childs as $key => $value) {
                                            $where_stock = array(
                                                'item_code' => $value->item_code,
                                                'transaction_date <=' => date('Y-m-d'),
                                            );
                                            $total_item_stock_before_issue_slip_date = $this->crud_model->get_total_item_stock('stock_ledger', $where_stock);
                                            $scrapped_qty = (isset($value->qty) && $value->qty != '') ? $value->qty : 0;
                                            $item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $value->item_code));
                                ?>
                                            <div class="row" style="margin-bottom: 15px;">
                                                <div class="col-md-1">
                                                    <?php echo ($key + 1) . '.'; ?>
                                                </div>
                                                <div class="col-md-2">
                                                    <?php echo (isset($item_detail->item_name) && $item_detail->item_name != '') ? $item_detail->item_name : ''; ?>
                                                </div>
                                                <div class="col-md-1">
                                                    <?php echo (isset($value->type) && $value->type != '') ? $value->type : ''; ?>
                                                </div>
                                                <div class="col-md-1">
                                                    <?php echo (isset($value->qty) && $value->qty != '') ? $value->qty : 0; ?>
                                                </div>
                                                <div class="col-md-1 <?php echo ($scrapped_qty > $total_item_stock_before_issue_slip_date) ? 'out_of_stock' : 'in_stock'; ?>">
                                                    <?php echo $total_item_stock_before_issue_slip_date; ?>
                                                </div>
                                                <div class="col-md-2">
                                                    <?php echo (isset($value->depreciated_amt) && $value->depreciated_amt != '') ? $value->depreciated_amt : 0; ?>
                                                </div>
                                                <div class="col-md-1">
                                                    <?php echo (isset($value->book_value) && $value->book_value != '') ? $value->book_value : 0; ?>
                                                </div>
                                                <div class="col-md-1">
                                                    <?php echo (isset($value->total_depreciated_amt) && $value->total_depreciated_amt != '') ? $value->total_depreciated_amt : 0; ?>
                                                </div>
                                                <div class="col-md-2">
                                                    <?php echo (isset($value->remarks) && $value->remarks != '') ? $value->remarks : ''; ?>
                                                </div>
                                            </div>
                                <?php }
                                    }
                                } ?>
                            <?php } else { ?>
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
                                        <label>Type</label>
                                    </div>
                                    <div class="col-md-1">
                                        <label>Quantity</label>
                                    </div>
                                    <div class="col-md-1">
                                        <label>Stock</label>
                                    </div>
                                    <div class="col-md-5">
                                        <label>Remarks</label>
                                    </div>
                                </div>
                                <?php
                                if (isset($detail->scrap_code)) {
                                    $childs = $this->crud_model->get_where('item_scrap_detail', array('scrap_code' => $detail->scrap_code));
                                    if ($childs) {
                                        foreach ($childs as $key => $value) {
                                            $where_stock = array(
                                                'item_code' => $value->item_code,
                                                'transaction_date <=' => date('Y-m-d'),
                                            );
                                            $total_item_stock_before_issue_slip_date = $this->crud_model->get_total_item_stock('stock_ledger', $where_stock);
                                            $scrapped_qty = (isset($value->qty) && $value->qty != '') ? $value->qty : 0;
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
                                                    <?php echo (isset($value->type) && $value->type != '') ? $value->type : ''; ?>
                                                </div>
                                                <div class="col-md-1">
                                                    <?php echo (isset($value->qty) && $value->qty != '') ? $value->qty : 0; ?>
                                                </div>
                                                <div class="col-md-1 <?php echo ($scrapped_qty > $total_item_stock_before_issue_slip_date) ? 'out_of_stock' : 'in_stock'; ?>">
                                                    <?php echo $total_item_stock_before_issue_slip_date; ?>
                                                </div>
                                                <div class="col-md-5">
                                                    <?php echo (isset($value->remarks) && $value->remarks != '') ? $value->remarks : ''; ?>
                                                </div>
                                            </div>
                                <?php }
                                    }
                                } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>