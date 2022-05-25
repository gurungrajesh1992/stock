<!-- jQuery -->
<script src="<?php echo base_url('theme/admin/'); ?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('theme/admin/'); ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('theme/admin/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url('theme/admin/'); ?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('theme/admin/'); ?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url('theme/admin/'); ?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url('theme/admin/'); ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('theme/admin/'); ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('theme/admin/'); ?>plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url('theme/admin/'); ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url('theme/admin/'); ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url('theme/admin/'); ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url('theme/admin/'); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('theme/admin/'); ?>dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('theme/admin/'); ?>dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('theme/admin/'); ?>dist/js/pages/dashboard.js"></script>
<!-- custome  -->
<script src="<?php echo base_url('theme/admin/'); ?>rajesh/js/custome.js"></script>

<!-- jquery ui -->
<script src="<?php echo base_url('theme/admin/'); ?>rajesh/js/jquery-ui.min.js"></script>

<!-- nested sortable -->
<script type="text/javascript" src="<?php echo base_url('theme/admin/'); ?>rajesh/js/jquery.mjs.nestedSortable.js">
  // <<<<<<< HEAD
  //   >
  // =======
  // >>>>>>> 7b2f7cf96e3359ff4ca9197eafb2f64dd4d1b419
</script>

<!-- select2  -->
<link href="<?php echo base_url('theme/select2-4.1.0-rc.0/dist/css/select2.min.css'); ?>" rel="stylesheet" />
<script src="<?php echo base_url('theme/select2-4.1.0-rc.0/dist/js/select2.min.js'); ?>"></script>

<!-- ckeditor -->
<script src="<?php echo base_url('theme/ckeditor/ckeditor.js'); ?>"></script>

<!-- toaster -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>/
<script>
  $(document).ready(function() {

    // scarp get form
    $(document).off('change', '#item_scrap').on('change', '#item_scrap', function(e) {
      e.preventDefault();
      var selected_val = $(this).val();
      var splited = selected_val.split(",");
      var val = splited[0];
      var unit_price = splited[1];
      // alert(unit_price);
      // return false;
      var already_items = $('input[name^=item_code]').map(function(idx, elem) {
        return $(elem).val();
      }).get();

      if (jQuery.inArray(val, already_items) !== -1) {
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
      $.ajax({

        url: '<?php echo base_url('scrap/admin/getForm'); ?>',
        type: "POST",
        // contentType: "application/json",  
        dataType: "json",
        data: {
          "val": val,
          "unit_price": unit_price,
          "total": already_items.length,
        },
        success: function(resp) {
          // console.log(resp.data);return false;
          // var obj = jQuery.parseJSON(resp);
          // console.log(resp.status);return false;
          if (resp.status == "success") {
            $('#items').append(resp.data);
          } else {
            Toastify({

              text: resp.status_message,

              duration: 6000,

              style: {
                background: "linear-gradient(to right, red, yellow)",
              }

            }).showToast();
            // alert(resp.status_message);
          }
        }
      });
    });
    //issue items
    $(document).off('change', '#item_goods_return').on('change', '#item_goods_return', function(e) {
      e.preventDefault();
      var val = $(this).val();
      var grn_no = $('#grn_no').val();
      var already_items = $('input[name^=item_code]').map(function(idx, elem) {
        return $(elem).val();
      }).get();

      if (jQuery.inArray(val, already_items) !== -1) {
        Toastify({

          text: 'already selected, you can change quantity',

          duration: 6000,

          style: {
            background: "linear-gradient(to right, red, yellow)",
          }

        }).showToast();
        // alert('already selected, you can change quantity');
        return false;
      }

      $.ajax({

        url: '<?php echo base_url('grn_return/admin/getForm'); ?>',
        type: "POST",
        // contentType: "application/json",  
        dataType: "json",
        data: {
          "val": val,
          "grn_no": grn_no,
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

              duration: 6000,

              style: {
                background: "linear-gradient(to right, red, yellow)",
              }

            }).showToast();
          }
        }
      });
    });

    //charges
    $(document).off('change', '.charge_amt').on('change', '.charge_amt', function(e) {
      e.preventDefault();
      var val = $(this).val();
      var total_charges = 0;
      var amount_list = $('input[name^=charge_amount]').map(function(idx, elem) {
        total_charges = total_charges + parseInt($(elem).val());
        return $(elem).val();
      }).get();

      $('#total_charges_grn').val(total_charges);
    });

    // REMOVE item direct add grn

    $(document).off('click', '.rmv_grn_direct').on('click', '.rmv_grn_direct', function(e) {
      e.preventDefault();
      var id = $(this).attr('id');
      var split_by_dash = id.split("-");
      var key = split_by_dash[1];
      var row_total_before_change = $('#each_total_grn-' + key).val();
      var total = $('#total_price_grn').val();
      // alert(key);
      // alert('hi');
      $('#total_price_grn').val(total - row_total_before_change);
      $(this).parent().parent().remove();
    });

    //on change qty change total price
    $(document).off('change', '.qty_grn').on('change', '.qty_grn', function(e) {
      e.preventDefault();
      var qty = $(this).val();
      var id = $(this).attr('id');
      var split_by_dash = id.split("-");
      var key = split_by_dash[1];
      // alert(key);
      var unit_price = $('#unit_price_grn-' + key).val();
      var row_total_before_change = $('#each_total_grn-' + key).val();
      var total = $('#total_price_grn').val();

      $('#each_total_grn-' + key).val(unit_price * qty);
      $('#total_price_grn').val(total - row_total_before_change + unit_price * qty);
    });

    //on change unit price change total price 
    $(document).off('change', '.unit_price_grn').on('change', '.unit_price_grn', function(e) {
      e.preventDefault();
      var unit_price = $(this).val();
      var id = $(this).attr('id');
      var split_by_dash = id.split("-");
      var key = split_by_dash[1];
      // alert(key);
      var qty = $('#qty_grn-' + key).val();
      var row_total_before_change = $('#each_total_grn-' + key).val();
      var total = $('#total_price_grn').val();

      $('#each_total_grn-' + key).val(unit_price * qty);
      $('#total_price_grn').val(total - row_total_before_change + unit_price * qty);
    });

    //charges
    $(document).off('change', '#charges_grn').on('change', '#charges_grn', function(e) {
      e.preventDefault();
      var val = $(this).val();
      var sn = $('#next_sn').val();
      var already_selected = $('input[name^=charge_code]').map(function(idx, elem) {
        return $(elem).val();
      }).get();

      if (jQuery.inArray(val, already_selected) !== -1) {
        // alert('already selected, you can change quantity');
        Toastify({

          text: 'already selected, you can change amount',

          duration: 6000,

          style: {
            background: "linear-gradient(to right, red, yellow)",
          }

        }).showToast();
        return false;
      }

      $.ajax({

        url: '<?php echo base_url('grn/admin/getForm_charges'); ?>',
        type: "POST",
        // contentType: "application/json",  
        dataType: "json",
        data: {
          "val": val,
          "sn": sn,
        },
        success: function(resp) {
          // console.log(resp.data);return false;
          // var obj = jQuery.parseJSON(resp);
          // console.log(resp.status);return false;
          if (resp.status == "success") {
            $('#charges_append').append(resp.data);
            $('#next_sn').val(sn + 1);
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

    //direct grn receive items
    $(document).off('change', '#item_grn').on('change', '#item_grn', function(e) {
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

        url: '<?php echo base_url('grn/admin/getForm'); ?>',
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

    //goods receive type change
    $(document).off('change', '#grn_request_type').on('change', '#grn_request_type', function(e) {
      e.preventDefault();
      // alert('hi');
      var val = $(this).val();
      // alert(val);
      if (val == 'DR') {
        $("#inv").addClass("reqsn_cls");
        $("#po").addClass("reqsn_cls");
        $("#prq").addClass("reqsn_cls");
      } else if (val == 'INV') {
        $("#inv").removeClass("reqsn_cls");
        $("#po").addClass("reqsn_cls");
        $("#prq").addClass("reqsn_cls");

      } else if (val == 'PO') {
        $("#po").removeClass("reqsn_cls");
        $("#inv").addClass("reqsn_cls");
        $("#prq").addClass("reqsn_cls");

      } else {
        $("#prq").removeClass("reqsn_cls");
        $("#inv").addClass("reqsn_cls");
        $("#po").addClass("reqsn_cls");
      }
    });

    //Issue post
    $(document).off('click', '#post_issue').on('click', '#post_issue', function() {
      var table_id = $(this).attr('table_id');
      var split_by_underline = table_id.split("-");
      var table = split_by_underline[0];
      var row_id = split_by_underline[1];
      // console.log(table, row_id);
      // return false;

      var list = $('.req_item .out_of_stock').map(function() {
        return 'out of stock';
      }).get();
      // console.log(list.length);
      // return false;
      if (list.length > 0) {
        Toastify({

          text: 'Some Product Out of stock !!!',

          duration: 1000,

          style: {
            background: "linear-gradient(to right, red, yellow)",
          },

        }).showToast();
        return false;
      }
      $.ajax({

        url: '<?php echo base_url('issue/admin/issue_post'); ?>',
        type: "POST",
        // contentType: "application/json",  
        dataType: "json",
        data: {
          "table": table,
          "row_id": row_id,
        },
        success: function(resp) {
          if (resp.status == "success") {
            Toastify({

              text: resp.status_message,

              duration: 5000,

              style: {
                background: "linear-gradient(to right, #00b09b, #96c93d)",
              },

            }).showToast();

            $('.card-tools').load(document.URL + ' .card-tools');

            location.reload();
          } else {
            Toastify({

              text: resp.status_message,

              duration: 5000,

              style: {
                background: "linear-gradient(to right, red, yellow)",
              }

            }).showToast();
            // alert(resp.status_message);
            $('.card-tools').load(document.URL + ' .card-tools');
          }
        }
      });

    });

    //opening post
    $(document).off('click', '#post_open').on('click', '#post_open', function() {
      var table_id = $(this).attr('table_id');
      var split_by_underline = table_id.split("-");
      var table = split_by_underline[0];
      var row_id = split_by_underline[1];
      // console.log(table, row_id);
      // return false;

      $.ajax({

        url: '<?php echo base_url('opening_master/admin/opening_post'); ?>',
        type: "POST",
        // contentType: "application/json",  
        dataType: "json",
        data: {
          "table": table,
          "row_id": row_id,
        },
        success: function(resp) {
          if (resp.status == "success") {
            Toastify({

              text: resp.status_message,

              duration: 1000,

              style: {
                background: "linear-gradient(to right, #00b09b, #96c93d)",
              },

            }).showToast();
            // location.reload();
            $('.card-tools').load(document.URL + ' .card-tools');
          } else {
            Toastify({

              text: resp.status_message,

              duration: 5000,

              style: {
                background: "linear-gradient(to right, red, yellow)",
              }

            }).showToast();
            // alert(resp.status_message);
          }
        }
      });

    });

    //approve row
    $(document).off('click', '#approve').on('click', '#approve', function() {
      var table_id = $(this).attr('table_id');
      var split_by_underline = table_id.split("-");
      var table = split_by_underline[0];
      var row_id = split_by_underline[1];
      // console.log(table, row_id);
      // return false;

      $.ajax({

        url: '<?php echo base_url('opening_master/admin/change_status'); ?>',
        type: "POST",
        // contentType: "application/json",  
        dataType: "json",
        data: {
          "table": table,
          "row_id": row_id,
        },
        success: function(resp) {
          if (resp.status == "success") {
            Toastify({

              text: resp.status_message,

              duration: 1000,

              style: {
                background: "linear-gradient(to right, #00b09b, #96c93d)",
              },

            }).showToast();
            // location.reload();
            $('.card-tools').load(document.URL + ' .card-tools');
          } else {
            Toastify({

              text: resp.status_message,

              duration: 5000,

              style: {
                background: "linear-gradient(to right, red, yellow)",
              },

            }).showToast();
            // alert(resp.status_message);
          }
        }
      });

    });

    //cancel row
    $(document).off('click', '#cancel').on('click', '#cancel', function() {
      var table_id = $(this).attr('table_id');
      var split_by_underline = table_id.split("-");
      var table = split_by_underline[0];
      var row_id = split_by_underline[1];
      // console.log(table, row_id);
      // return false;

      $.ajax({

        url: '<?php echo base_url('requisition/admin/cancel_row'); ?>',
        type: "POST",
        // contentType: "application/json",  
        dataType: "json",
        data: {
          "table": table,
          "row_id": row_id,
        },
        success: function(resp) {
          if (resp.status == "success") {
            Toastify({

              text: resp.status_message,

              duration: 1000,

              style: {
                background: "linear-gradient(to right, #00b09b, #96c93d)",
              },

            }).showToast();
            // location.reload();
            $('.card-tools').load(document.URL + ' .card-tools');
          } else {
            Toastify({

              text: resp.status_message,

              duration: 5000,

              style: {
                background: "linear-gradient(to right, red, yellow)",
              },

            }).showToast();
            // alert(resp.status_message);
          }
        }
      });

    });

    //check greater than stock
    $(document).off('change', '.qty_iss').on('change', '.qty_iss', function(e) {
      var issued = $(this).val();
      var id = $(this).attr('id');
      var id_val = id.split("_");

      var in_stock = $('#stock_' + id_val[1]).val();
      // alert(in_stock);
      // return false; 
      if (parseInt(issued) > parseInt(in_stock)) {
        alert('Can not be greater than stock qyuantity');
        $(this).val(in_stock);
      }
    });

    //onchange issue slip date show stock value in each row in direct
    $(document).off('change', '#issue_date_direct').on('change', '#issue_date_direct', function(e) {
      var issue_slip_date = $(this).val();
      $.ajax({

        url: '<?php echo base_url('issue/admin/getAllStock'); ?>',
        type: "POST",
        // contentType: "application/json",  
        dataType: "json",
        data: {
          "issue_slip_date": issue_slip_date,
        },
        success: function(resp) {
          // console.log(resp.data);return false;
          // var obj = jQuery.parseJSON(resp);
          // console.log(resp.status);return false;
          if (resp.status == "success") {
            $.each(resp.data, function(k, v) {
              var item_code = v.item_code;
              var total_stock = (parseInt(v.totalIn) - parseInt(v.totalOut));
              $('.stock_' + item_code).val(total_stock);
            });
          } else {
            alert(resp.status_message);
            $('.stcks').val(0);
            $('.qty_iss').val(0);
          }
        }
      });
    });
    //mrn item select
    $(document).off('change', '#item_mrn').on('change', '#item_mrn', function(e) {
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
        url: '<?php echo base_url('mrn/admin/getForm'); ?>',
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
    //onchange issue slip date show stock value in each row
    $(document).off('change', '#issue_date').on('change', '#issue_date', function(e) {
      var issue_slip_date = $(this).val();
      $.ajax({

        url: '<?php echo base_url('issue/admin/getAllStock'); ?>',
        type: "POST",
        // contentType: "application/json",  
        dataType: "json",
        data: {
          "issue_slip_date": issue_slip_date,
        },
        success: function(resp) {
          // console.log(resp.data);return false;
          // var obj = jQuery.parseJSON(resp);
          // console.log(resp.status);return false;
          if (resp.status == "success") {
            $.each(resp.data, function(k, v) {
              var item_code = v.item_code;
              var total_stock = (parseInt(v.totalIn) - parseInt(v.totalOut));
              $('.stock_' + item_code).val(total_stock);
            });
          } else {
            alert(resp.status_message);
            $('.stcks').val(0);
            $('.iss').val(0);
          }
        }
      });
    });

    //check greater than remaining
    $(document).off('change', '.iss').on('change', '.iss', function(e) {
      var issued = $(this).val();
      var id = $(this).attr('id');
      var id_val = id.split("_");

      var remaining = $('#remaining_' + id_val[1]).val();
      var in_stock = $('#stock_' + id_val[1]).val();
      // alert(in_stock);
      // return false;
      if (parseInt(in_stock) < parseInt(remaining)) {
        if (parseInt(issued) > parseInt(in_stock)) {
          alert('Incorrect Quantity');
          $(this).val(in_stock);
        }
      } else {
        if (parseInt(issued) > parseInt(remaining)) {
          alert('Please Select less than or equal to ' + remaining);
          $(this).val(remaining);
        }
      }
    });
    // onchange issue type
    $(document).off('change', '#issue_type').on('change', '#issue_type', function(e) {
      e.preventDefault();
      // alert('hi'); 
      var val = $(this).val();
      // alert(val);
      if (val == 'DR') {
        $("#reqsn").addClass("reqsn_cls");
      } else {
        $("#reqsn").removeClass("reqsn_cls")
      }
    });

    //onchange purchase request type

    $(document).off('change', '#p_request_type').on('change', '#p_request_type', function(e) {
      e.preventDefault();
      var val = $(this).val();
      // alert(val);
      if (val == "DR") {
        // alert('top');
        $("#reqsn").addClass("reqsn_cls");
        $("#mrn").addClass("reqsn_cls");
      }
      if (val == "REQ") {
        // alert('mid');
        $("#reqsn").removeClass("reqsn_cls");
        $("#mrn").addClass("reqsn_cls");
      }
      if (val == "MRN") {
        // alert('bot');
        $("#reqsn").addClass("reqsn_cls");
        $("#mrn").removeClass("reqsn_cls");
      }
    });

    // REMOVE item

    $(document).off('click', '.rmv').on('click', '.rmv', function(e) {
      e.preventDefault();
      // alert('hi');
      $(this).parent().parent().remove();
    });

    // get staff of a department

    $(document).off('change', '#department_id').on('change', '#department_id', function(e) {
      var val = $(this).val();
      // alert(val);
      // return false;
      if (val == '') {
        alert('Select atleast one department');
        return false;
      }
      $.ajax({

        url: '<?php echo base_url('requisition/admin/getStaffOfDepartment'); ?>',
        type: "POST",
        // contentType: "application/json",  
        dataType: "json",
        data: {
          "val": val,
        },
        success: function(resp) {
          // console.log(resp.data);return false;
          // var obj = jQuery.parseJSON(resp);
          // console.log(resp.status);return false;
          if (resp.status == "success") {
            $('#requested_by').html(resp.data);
          } else {
            alert(resp.status_message);
          }
        }
      });
    });

    //requisition items

    $(document).off('change', '#item').on('change', '#item', function(e) {
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

        url: '<?php echo base_url('requisition/admin/getForm'); ?>',
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

    //issue items
    $(document).off('change', '#item_isuue').on('change', '#item_isuue', function(e) {
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

      var issued_date = $('#issue_date_direct').val();
      // alert(issued_date);
      // return false;
      $.ajax({

        url: '<?php echo base_url('issue/admin/getForm'); ?>',
        type: "POST",
        // contentType: "application/json",  
        dataType: "json",
        data: {
          "val": val,
          "total": already_items.length,
          "issued_date": issued_date,
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

    //invoice items
    //issue items
    $(document).off('change', '#invoice_items').on('change', '#invoice_items', function(e) {
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

      var issued_date = $('#issue_date_direct').val();
      // alert(issued_date);
      // return false;
      $.ajax({

        url: '<?php echo base_url('invoice/admin/getForm'); ?>',
        type: "POST",
        // contentType: "application/json",  
        dataType: "json",
        data: {
          "val": val,
          "total": already_items.length,
          "issued_date": issued_date,
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

    $(document).off('change', '#type').on('change', '#type', function(e) {
      e.preventDefault();
      var val = $(this).val();
      // alert(val);
      if (val == 'others') {
        $('.ext_url').show();
      } else {
        $('.ext_url').hide();
      }
    });

    $(document).off('click', '.featured_image').on('click', '.featured_image', function(e) {
      e.preventDefault();
      // alert('rajesh');return false;
      var url = '<?php echo base_url('responsive_filemanager/filemanager/dialog.php?type=1&popup=1&field_id=featured_image'); ?>';
      // alert(url);return false;
      var w = 880;
      var h = 570;
      var l = Math.floor((screen.width - w) / 2);
      var t = Math.floor((screen.height - h) / 2);
      var win = window.open(url, 'ResponsiveFilemanager', "scrollbars=1,width=" + w + ",height=" + h + ",top=" + t + ",left=" + l);
    });
    $(document).off('click', '.item_image').on('click', '.item_image', function(e) {
      e.preventDefault();
      // alert('rajesh');return false;
      var url = '<?php echo base_url('responsive_filemanager/filemanager/dialog.php?type=1&popup=1&field_id=item_image'); ?>';
      // alert(url);return false;
      var w = 880;
      var h = 570;
      var l = Math.floor((screen.width - w) / 2);
      var t = Math.floor((screen.height - h) / 2);
      var win = window.open(url, 'ResponsiveFilemanager', "scrollbars=1,width=" + w + ",height=" + h + ",top=" + t + ",left=" + l);
    });

    $(document).off('click', '.generalized_img').on('click', '.generalized_img', function(e) {
      e.preventDefault();
      var field_id = $(this).prev().attr('id');
      // alert (field_id);return false;
      // alert(key);
      var url = '<?php echo base_url('responsive_filemanager/filemanager/dialog.php?type=1&popup=1&field_id='); ?>' + field_id;
      var w = 880;
      var h = 570;
      var l = Math.floor((screen.width - w) / 2);
      var t = Math.floor((screen.height - h) / 2);
      var win = window.open(url, 'ResponsiveFilemanager', "scrollbars=1,width=" + w + ",height=" + h + ",top=" + t + ",left=" + l);
    })

    CKEDITOR.replace('description', {
      filebrowserBrowseUrl: '<?php echo base_url('responsive_filemanager/filemanager/dialog.php?type=1&editor=ckeditor&fldr='); ?>',
      filebrowserUploadUrl: '<?php echo base_url('responsive_filemanager/filemanager/dialog.php?type=1&editor=ckeditor&fldr='); ?>',
      filebrowserImageBrowseUrl: '<?php echo base_url('responsive_filemanager/filemanager/dialog.php?type=1&editor=ckeditor&fldr='); ?>'
    });

    CKEDITOR.replace('meta_description', {
      filebrowserBrowseUrl: '<?php echo base_url('responsive_filemanager/filemanager/dialog.php?type=1&editor=ckeditor&fldr='); ?>',
      filebrowserUploadUrl: '<?php echo base_url('responsive_filemanager/filemanager/dialog.php?type=1&editor=ckeditor&fldr='); ?>',
      filebrowserImageBrowseUrl: '<?php echo base_url('responsive_filemanager/filemanager/dialog.php?type=1&editor=ckeditor&fldr='); ?>'
    });

    CKEDITOR.replace('map_location', {
      filebrowserBrowseUrl: '<?php echo base_url('responsive_filemanager/filemanager/dialog.php?type=1&editor=ckeditor&fldr='); ?>',
      filebrowserUploadUrl: '<?php echo base_url('responsive_filemanager/filemanager/dialog.php?type=1&editor=ckeditor&fldr='); ?>',
      filebrowserImageBrowseUrl: '<?php echo base_url('responsive_filemanager/filemanager/dialog.php?type=1&editor=ckeditor&fldr='); ?>'
    });

    CKEDITOR.replace('contact_detail', {
      filebrowserBrowseUrl: '<?php echo base_url('responsive_filemanager/filemanager/dialog.php?type=1&editor=ckeditor&fldr='); ?>',
      filebrowserUploadUrl: '<?php echo base_url('responsive_filemanager/filemanager/dialog.php?type=1&editor=ckeditor&fldr='); ?>',
      filebrowserImageBrowseUrl: '<?php echo base_url('responsive_filemanager/filemanager/dialog.php?type=1&editor=ckeditor&fldr='); ?>'
    });

    $(document).off('change', '#item_opening').on('change', '#item_opening', function(e) {
      e.preventDefault();
      var val = $(this).val();
      // alert(val);return false;
      var already_items = $('input[name^=item_code]').map(function(idx, elem) {
        return $(elem).val();
      }).get();
      if (jQuery.inArray(val, already_items) !== -1) {
        Toastify({

          text: 'already selected, you can change quantity',

          duration: 6000,

          style: {
            background: "linear-gradient(to right, red, yellow)",
          }

        }).showToast();
        return false;
      }
      // console.log(already_items);
      $.ajax({
        url: '<?php echo base_url('opening_master/admin/getForm'); ?>',
        type: "POST",
        // contentType: "application/json",
        dataType: "json",
        data: {
          "val": val,
        },
        success: function(resp) {
          // console.log(resp.data);return false;
          // var obj = jQuery.parseJSON(resp);
          // console.log(resp.status);return false;
          if (resp.status == "success") {
            $('#items_opening').append(resp.data);
          } else {
            Toastify({

              text: resp.status_message,

              duration: 6000,

              style: {
                background: "linear-gradient(to right, red, yellow)",
              }

            }).showToast();
          }
        }
      });
    });

  })
</script>