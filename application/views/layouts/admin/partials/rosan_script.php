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

        $(document).off('change', '#item_sales').on('change', '#item_sales', function(e) {
            e.preventDefault();
            var val = $(this).val();
            var already_items = $('input[name^=item_code]').map(function(idx, elem) {
                return $(elem).val();
            }).get();

            // if (jQuery.inArray(val, already_items) !== -1) {
            //     alert('already selected, you can change quantity');
            //     return false;
            // }
            // console.log(already_items.length);
            // return false;
            $.ajax({

                url: '<?php echo base_url('sales/admin/getForm'); ?>',
                type: "POST",
                // contentType: "application/json",  
                dataType: "json",
                data: {
                    "val": val,
                    // "total": already_items.length,
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


        $(document).ready(function() {
            var i = 0;
            $("#qty-" + i).change(function() {
                upd_art(i)
            });
            $("#unit_price-" + i).change(function() {
                upd_art(i)
            });


            function upd_art(i) {
                var qty = $('#qty-' + i).val();
                var unit_price = $('#unit_price-' + i).val();
                var totNumber = (qty * unit_price);
                var tot = totNumber.toFixed(2);
                $('#grand_total-' + i).val(tot);
            }



            //  setInterval(upd_art, 1000);
        });

    });
</script>