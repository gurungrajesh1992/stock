<section class="content">
    <div class="container-fluid">
        <form class="all_form" method="post" action enctype="multipart/form-data">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title"><?php echo $title ?></h3>

                    <div class="card-tools">
                        <a class="btn btn-sm btn-info" id="approve" table_id="issue_slip_master-<?php echo $detail->id; ?>"><?php echo (isset($detail->approved_by) && $detail->approved_by != '') ? 'Approved' : 'Approve' ?></a>
                        <a class="btn btn-sm btn-success" id="post_open">Post</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <p>
                                    <label>Issue Slip No. : </label>
                                    <?php echo set_value('issue_slip_no', (((isset($issue_slip_no)) && $issue_slip_no != '') ? $issue_slip_no : '')); ?>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <p>
                                    <label>Issue Slip Date : </label>
                                    <?php echo set_value('issue_date', (((isset($detail->issue_date)) && $detail->issue_date != '') ? $detail->issue_date : date('Y-m-d'))); ?>
                                </p>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Select Department : </label>
                                <?php
                                if ((isset($detail->department_id)) && $detail->department_id != '') {
                                    $department = $this->crud_model->get_where_single('department_para', array('id' => $detail->department_id));
                                    echo $department->department_name;
                                }
                                ?>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Select Staff : </label>
                                <?php
                                if ((isset($detail->staff_id)) && $detail->staff_id != '') {
                                    $staff = $this->crud_model->get_where_single('staff_infos', array('id' => $detail->staff_id));
                                    echo $staff->full_name;
                                }
                                ?>

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
                                                <label>Quantity</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Remarks</label>
                                            </div>
                                        </div>
                                        <?php
                                        if (isset($detail->issue_slip_no)) {
                                            $childs = $this->crud_model->get_where('issue_slip_details', array('issue_slip_no' => $detail->issue_slip_no));
                                            if ($childs) {
                                                foreach ($childs as $key => $value) {
                                                    $item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $value->item_code));
                                        ?>
                                                    <div class="row" style="margin-bottom: 15px;">
                                                        <div class="col-md-1">
                                                            <?php echo ($key + 1) . '.'; ?>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <?php echo $item_detail->item_name; ?>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <?php echo $value->issued_qnty; ?>
                                                        </div>
                                                        <div class="col-md-6">
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
                        <div class="col-md-12">
                            <div style="border: 1px solid #ddd;margin-bottom: 10px;"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-md-4">
                            <div class="form-group">
                                <label>Remarks : </label>
                                <?php echo (((isset($detail->remarks)) && $detail->remarks != '') ? $detail->remarks : '')
                                ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Issued Date : </label>
                                <?php echo set_value('issued_on', (((isset($detail->issued_on)) && $detail->issued_on != '') ? $detail->issued_on : '')); ?>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Issued By : </label>
                                <?php echo set_value('issued_by', (((isset($detail->issued_by)) && $detail->issued_by != '') ? $detail->issued_by : '')); ?>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</section>