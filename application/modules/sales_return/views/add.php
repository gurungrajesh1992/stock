<?php
$total = 0;

?>
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
                                <label>Sales Return No. <span class="req">*</span></label>
                                <input type="text" name="s_return_no" class="form-control" id="s_return_no" value="<?php echo set_value('s_return_no', (((isset($s_return_no)) && $s_return_no != '') ? $s_return_no : '')); ?>" readonly>
                                <?php echo form_error('s_return_no', '<div class="error_message">', '</div>'); ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Sales No. <span class="req">*</span></label>
                                <select name="sale_no" class="form-control selct2" id="sale_no" required>
                                    <option value>Select Sales Number</option>
                                    <?php foreach ($sales_no as $key => $value) { ?>
                                        <option value="<?php echo $value->id; ?>" <?php echo  set_select('sale_no', $value->id, (isset($detail->sale_no) && $detail->sale_no  == $value->id) ? TRUE : ''); ?>><?php echo $value->sale_no; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Sales Return Date </label>
                                <input type="date" name="sales_rtn_date" class="form-control" id="sales_rtn_date" placeholder="Sales Date" value="<?php echo set_value('sales_rtn_date', date('Y-m-d')); ?>" required>
                                <?php echo form_error('sales_rtn_date', '<div class="error_message">', '</div>'); ?>
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
                                <label>Posted Date </label>
                                <input type="date" name="posted_on" class="form-control" id="posted_on" placeholder="Posted Date" value="<?php echo set_value('posted_on', date('Y-m-d')); ?>" required>
                                <?php echo form_error('posted_on', '<div class="error_message">', '</div>'); ?>
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Select To Add Items</label>
                                        <select name="item" class="form-control selct2" id="item_sales_return">
                                            <option value>Select item</option>
                                            <?php foreach ($items as $key => $value) { ?>
                                                <option value="<?php echo $value->item_code; ?>"><?php echo $value->item_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="req_item" id="items">
                                        <div class=" row">
                                            <div class="col-md-1">
                                                <label>
                                                    #
                                                </label>
                                            </div>
                                            <div class="col-md-5">
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
                                            <div class="col-md-1">

                                            </div>
                                        </div>
                                        <?php
                                        if (isset($detail->sale_no)) {
                                            $childs = $this->crud_model->get_where('sales_details', array('sale_no' => $detail->sale_no));
                                            if ($childs) {
                                                foreach ($childs as $key => $value) {

                                                    $item_detail = $this->crud_model->get_where_single('item_infos', array('item_code' => $value->item_code));
                                        ?>
                                                    <div class="row" style="margin-bottom: 15px;">
                                                        <div class="col-md-1">
                                                            <?php echo ($key + 1) . '.'; ?>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <input type="text" name="item_name[]" class="form-control" placeholder="Item Name" value="<?php echo $item_detail->item_name; ?>" readonly>
                                                            <input type="hidden" name="item_code[]" class="form-control" placeholder="Item Code" value="<?php echo $value->item_code; ?>">
                                                        </div>
                                                        <div class="col-md-1">
                                                            <input type="number" name="qty[]" min="1" class="form-control qty_sales" id="qty_sales-<?php echo  $key + 1 ?>" placeholder="Quantity" value="<?php echo $value->qty; ?>" required>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="number" name="unit_price[]" min="1" class="form-control unit_price_sales" id="unit_price_sales-<?php echo $key + 1; ?>" placeholder="Unit Price" value="<?php echo $value->unit_price; ?>" required>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="number" name="grand_total[]" min="1" class="form-control" id="each_total_sales-<?php echo $key + 1; ?>" placeholder="Total Price" value="<?php echo ($value->qty * $value->unit_price); ?>" readonly>
                                                        </div>

                                                        <div class="col-md-1">
                                                            <div class="rmv">
                                                                <span class="rmv_itm">X</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                        <?php
                                                    $total = $total + $value->qty * $value->unit_price;
                                                }
                                            }
                                        } ?>
                                    </div>
                                    <input type="hidden" name="next_key" class="form-control btn btn-sm btn-primary" id="next_key" value="<?php echo (((isset($childs)) && $childs != '') ? count($childs) : 0) ?>">
                                </div>
                            </div>
                            <div class=" row">
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-5">
                                </div>
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-2">
                                    <label>Total =</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="number" name="total" class="form-control" id="total_price_sales" placeholder="Total Price" value="<?php echo $total; ?>" readonly>
                                </div>
                                <div class="col-md-1">

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
                        <div class="col-md-3"></div>
                        <div class="col-md-5"></div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label style="float: left;margin-right: 20px;">Discount Percent</label>
                            </div>
                        </div>
                        <div class=" col-md-2">
                            <div class="form-group">
                                <input type="number" name="discount_per" class="form-control" id="discount_per" placeholder="Discount in percent" value="<?php echo set_value('discount_per', (((isset($detail->discount_per)) && $detail->discount_per != '') ? $detail->discount_per : '')); ?>">
                                <?php echo form_error('discount_per', '<div class="error_message">', '</div>'); ?>
                            </div>
                        </div>
                    </div>

                    <div class=" row">
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="submit" name="submit" class="form-control btn btn-sm btn-primary" id="submit" value="Save">
                                <input type="hidden" name="id" class="form-control btn btn-sm btn-primary" id="id" value="<?php echo (((isset($detail->id)) && $detail->id != '') ? $detail->id : '') ?>">
                                <input type="hidden" name="type" class="form-control btn btn-sm btn-primary" id="type" value="<?php echo (((isset($type)) && $type != '') ? $type : '') ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>