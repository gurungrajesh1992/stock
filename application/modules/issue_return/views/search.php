<section class="content">
    <div class="container-fluid">
        <h2 class="text-center display-4">Search</h2>
        <form action="<?php echo base_url('issue_return/admin/search'); ?> " method="post">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label> Return Date From:</label>
                                <input type="date" name="return_date_from" class="form-control" placeholder="Return Date From" value="">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label> Return Date to:</label>
                                <input type="date" name="return_date_to" class="form-control" placeholder="Return Date To" value="">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Department:</label>
                                <select name="department_id" class="form-control selct2" id="department_id">
                                    <option value>Select Department</option>
                                    <?php
                                    $departments = $this->crud_model->get_where('department_para', array('status' => '1'));
                                    foreach ($departments as $key => $value) { ?>
                                        <option value="<?php echo $value->id; ?>" <?php echo  set_select('department_id', $value->id, (isset($detail->department_id) && $detail->department_id  == $value->id) ? TRUE : ''); ?>><?php echo $value->department_name; ?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Staff:</label>
                                <select name="staff_id" class="form-control selct2" id="requested_by">
                                    <option value>Select Staff</option>
                                    <?php foreach ($staffs as $key => $value) { ?>
                                        <option value="<?php echo $value->staff_id; ?>" <?php echo  set_select('staff_id', $value->staff_id, (isset($detail->staff_id) && $detail->staff_id  == $value->staff_id) ? TRUE : ''); ?>><?php echo $value->full_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-3">
                            <div class="form-group">
                                <label>Cancelled:</label>
                                <select name="cancelled" class="form-control">
                                    <option value="">Select</option>
                                    <option value="0">not cancelled</option>
                                    <option value="1">cancelled</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Approved:</label>
                                <select name="approved" class="form-control" id="requested_by">
                                    <option value="">Select</option>
                                    <option value="0">not approved</option>
                                    <option value="1">approved</option>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group input-group-lg">
                            <div class="col-5"><input type="search" name="issue_return_no" class="form-control" placeholder="Issue Return Slip No" value=""></div>
                            <div class="col-5"><input type="search" name="issue_no" class="form-control" placeholder="Issue Slip No" value=""></div>
                                <input type="submit" name="submit" value=" search">                          
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>