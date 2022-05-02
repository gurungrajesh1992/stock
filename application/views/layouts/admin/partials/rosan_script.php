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
    });
</script>