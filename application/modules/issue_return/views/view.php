<section class="content">
    <div class="container-fluid">
        <form class="all_form" method="post" action enctype="multipart/form-data">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title"><?php echo $title ?></h3>

                    <div class="card-tools">
                        <a class="btn btn-sm btn-info" id="approve_issue_return" table_id="issue_return_master-<?php echo $master_detail->id; ?>"><?php echo (isset($master_detail->approved_by) && $master_detail->approved_by != '') ? 'Approved' : 'Approve' ?></a>
                        <a class="btn btn-sm btn-success" id="post_issue_return" table_id="issue_return_master-<?php echo $master_detail->id; ?>"><?php echo (isset($master_detail->posted_tag) && $master_detail->posted_tag == '1') ? 'Posted' : 'Post' ?></a>
                        <a class="btn btn-sm btn-danger" id="cancel_issue_return" table_id="issue_return_master-<?php echo $master_detail->id; ?>"><?php echo (isset($master_detail->cancel_tag) && $master_detail->cancel_tag == '1') ? 'Cancelled' : 'Cancel' ?></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Issue Return Slip Date : </label>
                                <?php echo set_value('return_date', (((isset($master_detail->return_date)) && $master_detail->return_date != '') ? $master_detail->return_date : date('Y-m-d'))); ?>


                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Issue Return No. : </label>
                                <?php echo set_value('issue_return_no', (((isset($master_detail->issue_return_no)) && $master_detail->issue_return_no != '') ? $master_detail->issue_return_no : '')); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Issue No. : </label>
                                <?php echo set_value('issue_no', (((isset($master_detail->issue_no)) && $master_detail->issue_no != '') ? $master_detail->issue_no : '')); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Department : </label>
                                <?php $depart_detail = $this->crud_model->get_where_single_order_by('department_para', array('id' => $master_detail->department_id), 'id', 'DESC');
                                echo set_value('department_name', (((isset($depart_detail->department_name)) && $depart_detail->department_name != '') ? $depart_detail->department_name : ''));
                                ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Staff : </label>
                                <?php $staff_detail = $this->crud_model->get_where_single_order_by('staff_infos', array('id' => $master_detail->staff_id), 'id', 'DESC');
                                echo set_value('staff_name', (((isset($staff_detail->full_name)) && $staff_detail->full_name != '') ? $staff_detail->full_name : '')); ?>
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
                                                <label>
                                                    Returned Quantity</label>
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
                                                $issue_slip_date = ((isset($master_detail->prepared_date)) && $master_detail->prepared_date != '') ? $master_detail->prepared_date : date('Y-m-d');

                                                foreach ($childs as $key => $value) {
                                                    $where_stock = array(
                                                        'item_code' => $value->item_code,
                                                        'transaction_date <=' => $issue_slip_date,
                                                    );
                                                    $total_item_stock_before_issue_slip_date = $this->crud_model->get_total_item_stock('stock_ledger', $where_stock);

                                                    $item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $value->item_code));
                                                    $requisition_detail_item = $this->crud_model->get_where_single('issue_return_details', array('item_code' => $value->item_code, 'issue_return_no' => $master_detail->issue_return_no));

                                                    $issued_qty = (isset($requisition_detail_item->issued_qty) && $requisition_detail_item->issued_qty != '') ? $requisition_detail_item->issued_qty : 0;
                                                    $received_qty = (isset($requisition_detail_item->received_qnty) && $requisition_detail_item->received_qnty != '') ? $requisition_detail_item->received_qnty : 0;
                                                    $remaining_qty = (isset($requisition_detail_item->remaining_qnty) && $requisition_detail_item->remaining_qnty != '') ? $requisition_detail_item->remaining_qnty : 0;

                                                    $returned_qty = (isset($value->returned_qty) && $value->returned_qty != '') ? $value->returned_qty : 0;
                                        ?>
                                                    <div class="row" style="margin-bottom: 15px;">
                                                        <div class="col-md-2">
                                                            <?php echo $item_detail->item_name; ?>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <?php echo $returned_qty; ?>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <?php echo $issued_qty; ?>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <?php echo $value->remarks; ?>
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
                                <label>Remarks : </label>
                                <?php echo (((isset($master_detail->remarks)) && $master_detail->remarks != '') ? $master_detail->remarks : '') ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Issue Returned Date : </label>
                                <?php echo set_value('prepared_date', (((isset($master_detail->prepared_date)) && $master_detail->prepared_date != '') ? $master_detail->prepared_date : '')); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Issue Returned By : </label>
                                <?php echo set_value('prepared_by', (((isset($master_detail->prepared_by)) && $master_detail->prepared_by != '') ? $master_detail->prepared_by : '')); ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</section>