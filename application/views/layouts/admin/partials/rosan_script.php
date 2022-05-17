<script>
    $(document).ready(function() {
        //purchase request items
        $(document).off('change', '#item_purchase_req').on('change', '#item_purchase_req', function(e) {
            e.preventDefault();
            var val = $(this).val();
            var already_items = $('input[name^=item_code]').map(function(idx, elem) {
                return $(elem).val();
            }).get();

            if (jQuery.inArray(val, already_items) !== -1) {
                // alert('already selected, you can change quantity');
                Toastify({

                    text: 'already selected, you can change quantity',

                    duration: 6000,

                    style: {
                        background: "linear-gradient(to right, red, yellow)",
                    }

                }).showToast();
                return false;
            }
            // console.log(already_items.length);
            // return false;

            var requested_date = $('#requested_on').val();
            // alert(issued_date);
            // return false;
            $.ajax({

                url: '<?php echo base_url('purchase_request/admin/getForm'); ?>',
                type: "POST",
                // contentType: "application/json",  
                dataType: "json",
                data: {
                    "val": val,
                    "total": already_items.length,
                    "requested_date": requested_date,
                },
                success: function(resp) {
                    // console.log(resp.data);return false;
                    // var obj = jQuery.parseJSON(resp);
                    // console.log(resp.status);return false;
                    if (resp.status == "success") {
                        $('#items').append(resp.data);
                        Toastify({

                            text: resp.status_message,

                            duration: 5000,

                            style: {
                                background: "linear-gradient(to right, #00b09b, #96c93d)",
                            },

                        }).showToast();
                    } else {
                        // alert(resp.status_message);
                        Toastify({

                            text: resp.status_message,

                            duration: 5000,

                            style: {
                                background: "linear-gradient(to right, red, yellow)",
                            }

                        }).showToast();
                    }
                }
            });
        });

        $(document).off('change', '#pur_order_items').on('change', '#pur_order_items', function(e) {
            e.preventDefault();
            var val = $(this).val();
            var already_items = $('input[name^=item_code]').map(function(idx, elem) {
                return $(elem).val();
            }).get();

            if (jQuery.inArray(val, already_items) !== -1) {
                alert('already selected, you can change quantity');
                return false;
            }
            // console.log(already_items.length);
            // return false;
            $.ajax({

                url: '<?php echo base_url('purchase_order/admin/getForm'); ?>',
                type: "POST",
                // contentType: "application/json",  
                dataType: "json",
                data: {
                    "val": val,
                    "total": already_items.length,
                },
                success: function(resp) {
                    // console.log(resp.data);return false;
                    // var obj = jQuery.parseJSON(resp);
                    // console.log(resp.status);return false;
                    if (resp.status == "success") {
                        $('#items').append(resp.data);
                    } else {
                        alert(resp.status_message);
                    }
                }
            });
        });

        //sales items
        $(document).off('change', '#item_sales').on('change', '#item_sales', function(e) {
            e.preventDefault();
            var val = $(this).val();
            var next_key = $('#next_key').val();
            var already_items = $('input[name^=item_code]').map(function(idx, elem) {
                return $(elem).val();
            }).get();

            if (jQuery.inArray(val, already_items) !== -1) {
                // alert('already selected, you can change quantity');
                Toastify({

                    text: 'already selected, you can change quantity',

                    duration: 6000,

                    style: {
                        background: "linear-gradient(to right, red, yellow)",
                    }

                }).showToast();
                return false;
            }

            $.ajax({

                url: '<?php echo base_url('sales/admin/getForm'); ?>',
                type: "POST",
                // contentType: "application/json",  
                dataType: "json",
                data: {
                    "val": val,
                    "total": already_items.length,
                    "next_key": next_key,
                },
                success: function(resp) {
                    // console.log(resp.data);return false;
                    // var obj = jQuery.parseJSON(resp);
                    // console.log(resp.status);return false;
                    if (resp.status == "success") {
                        $('#items').append(resp.data);
                        $('#next_key').val(next_key + 1);
                        Toastify({

                            text: resp.status_message,

                            duration: 5000,

                            style: {
                                background: "linear-gradient(to right, #00b09b, #96c93d)",
                            },

                        }).showToast();
                    } else {
                        // alert(resp.status_message);
                        Toastify({

                            text: resp.status_message,

                            duration: 5000,

                            style: {
                                background: "linear-gradient(to right, red, yellow)",
                            }

                        }).showToast();
                    }
                }
            });
        });
        //sales Return items
        $(document).off('change', '#item_sales_return').on('change', '#item_sales_return', function(e) {
            e.preventDefault();
            var val = $(this).val();
            var next_key = $('#next_key').val();
            var already_items = $('input[name^=item_code]').map(function(idx, elem) {
                return $(elem).val();
            }).get();

            if (jQuery.inArray(val, already_items) !== -1) {
                // alert('already selected, you can change quantity');
                Toastify({

                    text: 'already selected, you can change quantity',

                    duration: 6000,

                    style: {
                        background: "linear-gradient(to right, red, yellow)",
                    }

                }).showToast();
                return false;
            }

            $.ajax({

                url: '<?php echo base_url('sales_return/admin/getForm'); ?>',
                type: "POST",
                // contentType: "application/json",  
                dataType: "json",
                data: {
                    "val": val,
                    "total": already_items.length,
                    "next_key": next_key,
                },
                success: function(resp) {
                    // console.log(resp.data);return false;
                    // var obj = jQuery.parseJSON(resp);
                    // console.log(resp.status);return false;
                    if (resp.status == "success") {
                        $('#items').append(resp.data);
                        $('#next_key').val(next_key + 1);
                        Toastify({

                            text: resp.status_message,

                            duration: 5000,

                            style: {
                                background: "linear-gradient(to right, #00b09b, #96c93d)",
                            },

                        }).showToast();
                    } else {
                        // alert(resp.status_message);
                        Toastify({

                            text: resp.status_message,

                            duration: 5000,

                            style: {
                                background: "linear-gradient(to right, red, yellow)",
                            }

                        }).showToast();
                    }
                }
            });
        });

        $(document).off('change', '#po_request_type').on('change', '#po_request_type', function(e) {
            e.preventDefault();
            // alert('hi'); 
            var val = $(this).val();
            // alert(val);
            if (val == 'DR') {
                $("#reqsn").addClass("reqsn_cls");
                $("#mrn").addClass("reqsn_cls");
                $("#pr").addClass("reqsn_cls");
            } else if (val == 'MRN') {
                $("#mrn").removeClass("reqsn_cls");
                $("#reqsn").addClass("reqsn_cls");
                $("#pr").addClass("reqsn_cls");

            } else if (val == 'PR') {
                $("#pr").removeClass("reqsn_cls");
                $("#reqsn").addClass("reqsn_cls");
                $("#mrn").addClass("reqsn_cls");

            } else {
                $("#reqsn").removeClass("reqsn_cls");
                $("#mrn").addClass("reqsn_cls");
                $("#pr").addClass("reqsn_cls");
            }
        });

        // REMOVE item direct add sales return

        $(document).off('click', '.rmv_sales_return').on('click', '.rmv_sales_return', function(e) {
            e.preventDefault();
            var id = $(this).attr('id');
            var split_by_dash = id.split("-");
            var key = split_by_dash[1];
            var row_total_before_change = $('#each_total_sales-' + key).val();
            var total = $('#total_price_sales').val();

            $('#total_price_sales').val(total - row_total_before_change);
            $(this).parent().parent().remove();
        });

        // REMOVE item direct add sales

        $(document).off('click', '.rmv_sales').on('click', '.rmv_sales', function(e) {
            e.preventDefault();
            var id = $(this).attr('id');
            var split_by_dash = id.split("-");
            var key = split_by_dash[1];
            var row_total_before_change = $('#each_total_sales-' + key).val();
            var total = $('#total_price_sales').val();

            $('#total_price_sales').val(total - row_total_before_change);
            $(this).parent().parent().remove();
        });
        //on change qty change total price
        $(document).off('change', '.qty_sales').on('change', '.qty_sales', function(e) {
            e.preventDefault();
            var qty = $(this).val();
            var id = $(this).attr('id');
            var split_by_dash = id.split("-");
            var key = split_by_dash[1];
            // alert(key);
            var unit_price = $('#unit_price_sales-' + key).val();
            var row_total_before_change = $('#each_total_sales-' + key).val();
            var total = $('#total_price_sales').val();

            $('#each_total_sales-' + key).val(unit_price * qty);
            $('#total_price_sales').val(total - row_total_before_change + unit_price * qty);
        });

        //on change unit price change total price 
        $(document).off('change', '.unit_price_sales').on('change', '.unit_price_sales', function(e) {
            e.preventDefault();
            var unit_price = $(this).val();
            var id = $(this).attr('id');
            var split_by_dash = id.split("-");
            var key = split_by_dash[1];
            // alert(key);
            var qty = $('#qty_sales-' + key).val();
            var row_total_before_change = $('#each_total_sales-' + key).val();
            var total = $('#total_price_sales').val();

            $('#each_total_sales-' + key).val(unit_price * qty);
            $('#total_price_sales').val(total - row_total_before_change + unit_price * qty);
        });

    });
</script>