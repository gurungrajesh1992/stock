<section class="content">
    <div class="container-fluid">
        <form class="all_form" method="post" action enctype="multipart/form-data">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title"><?php echo $title ?></h3>
                    <div class="card-tools">
                        <a class="btn btn-sm btn-info" id="approve" table_id="purchase_order-<?php echo $master_detail->id; ?>"><?php echo (isset($master_detail->approved_by) && $master_detail->approved_by != '') ? 'Approved' : 'Approve' ?></a>
                        <a class="btn btn-sm btn-success" id="post_issue" table_id="purchase_order-<?php echo $master_detail->id; ?>"><?php echo (isset($master_detail->posted_by) && $master_detail->posted_by != '') ? 'Posted' : 'Post' ?></a>
                        <a class="btn btn-sm btn-danger" id="cancel" table_id="purchase_order-<?php echo $master_detail->id; ?>"><?php echo (isset($master_detail->cancel_tag) && $master_detail->cancel_tag == '1') ? 'Cancelled' : 'Cancel' ?></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Purchase Order No : </label>
                                <?php echo set_value('purchase_order_no', (((isset($master_detail->purchase_order_no)) && $master_detail->purchase_order_no != '') ? $master_detail->purchase_order_no : '')); ?>
                            </div>
                        </div>

                        <?php if ($master_detail->request_type == "REQ") { ?>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Requisition No. : </label>
                                    <?php echo set_value('requisition_no', (((isset($master_detail->requisition_no)) && $master_detail->requisition_no != '') ? $master_detail->requisition_no : '')); ?>
                                </div>
                            </div>
                        <?php } else if ($master_detail->request_type == "MRN") { ?>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>MRN No. : </label>
                                    <?php echo set_value('mrn_no', (((isset($master_detail->mrn_no)) && $master_detail->mrn_no != '') ? $master_detail->mrn_no : '')); ?>
                                </div>
                            </div>
                        <?php } elseif ($master_detail->request_type == "PR") { ?>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Purchase Request No. : </label>
                                    <?php echo set_value('purchase_request_no', (((isset($master_detail->purchase_request_no)) && $master_detail->purchase_request_no != '') ? $master_detail->purchase_request_no : '')); ?>
                                </div>
                            </div>
                        <?php    }
                        ?>

                    </div>
                    <div class="row">
                        <?php if ($master_detail->request_type   == "REQ") { ?>
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
                        <?php } elseif ($master_detail->request_type   == "PR") { ?>
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
                        <?php  } else if ($master_detail->request_type   == "MRN") { ?>

                        <?php    } else { ?>
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
                        <?php   }
                        ?>

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Order Date : </label>
                                <?php echo set_value('requested_on', (((isset($master_detail->requested_on)) && $master_detail->requested_on != '') ? $master_detail->requested_on : date('Y-m-d'))); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Order By : </label>
                                <?php echo set_value('requested_by', (((isset($master_detail->requested_by)) && $master_detail->requested_by != '') ? $master_detail->requested_by : '')); ?>
                            </div>
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
                                            <!-- <div class="col-md-1">
                                                <label>Issued Quantity</label>
                                            </div> -->
                                            <div class="col-md-2">
                                                <label>Order Quantity</label>
                                            </div>
                                            <!-- <div class="col-md-1">
                                                <label>Total Issued</label>
                                            </div>
                                            <div class="col-md-1">
                                                <label>Remaining</label>
                                            </div>
                                            <div class="col-md-1">
                                                <label>Stock</label>
                                            </div> -->
                                            <div class="col-md-2">
                                                <label>Remarks</label>
                                            </div>

                                        </div>
                                        <?php
                                        if (isset($master_detail->purchase_order_no)) {
                                            $childs = $this->crud_model->get_where('purchase_order_details', array('purchase_order_no' => $master_detail->purchase_order_no));
                                            if ($childs) {
                                                foreach ($childs as $key => $value) {
                                                    $where_stock = array(
                                                        'item_code' => $value->item_code,
                                                    );
                                                    $total_item_stock_before_issue_slip_date = $this->crud_model->get_total_item_stock('stock_ledger', $where_stock);

                                                    $item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $value->item_code));
                                                    // $requisition_detail_item = $this->crud_model->get_where_single('requisition_details', array('item_code' => $value->item_code, 'requisition_no' => $master_detail->requisition_no));

                                                    // $requested_qty = (isset($requisition_detail_item->quantity_requested) && $requisition_detail_item->quantity_requested != '') ? $requisition_detail_item->quantity_requested : 0;
                                                    // $received_qty = (isset($requisition_detail_item->received_qnty) && $requisition_detail_item->received_qnty != '') ? $requisition_detail_item->received_qnty : 0;
                                                    // $remaining_qty = (isset($requisition_detail_item->remaining_qnty) && $requisition_detail_item->remaining_qnty != '') ? $requisition_detail_item->remaining_qnty : 0;

                                                    // $issued_qty = (isset($value->issued_qnty) && $value->issued_qnty != '') ? $value->issued_qnty : 0;
                                        ?>
                                                    <div class="row" style="margin-bottom: 15px;">
                                                        <div class="col-md-2">
                                                            <?php echo $item_detail->item_name; ?>
                                                        </div>

                                                        <div class="col-md-2">
                                                            <?php echo $value->requested_qty; ?>
                                                        </div>

                                                        <div class="col-md-2">
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
                    </div>

                </div>
            </div>
        </form>
    </div>
</section>