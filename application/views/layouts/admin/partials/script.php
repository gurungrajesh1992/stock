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
</script>

<!-- select2  -->
<link href="<?php echo base_url('theme/select2-4.1.0-rc.0/dist/css/select2.min.css'); ?>" rel="stylesheet" />
<script src="<?php echo base_url('theme/select2-4.1.0-rc.0/dist/js/select2.min.js'); ?>"></script>

<!-- ckeditor -->
<script src="<?php echo base_url('theme/ckeditor/ckeditor.js'); ?>"></script>
<script>
  $(document).ready(function() {

    // get staff of a department

    $(document).off('change', '#department_id').on('change', '#department_id', function(e) {
      var val = $(this).val();
      if (val == '') {
        alert('SElect atleast one department');
        return false;
      }
      $.ajax({

        url: '<?php echo base_url('requisition/admin/getStaffOfDepartment'); ?>',
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

    // $(document).off('click','.logo').on('click','.logo',function(e){
    //     e.preventDefault(); 
    //     // alert(key);
    //     var url = '<?php //echo base_url('responsive_filemanager/filemanager/dialog.php?type=1&popup=1&field_id=logo'); 
                      ?>';
    //     var w = 880;
    //     var h = 570;
    //     var l = Math.floor((screen.width - w) / 2);
    //     var t = Math.floor((screen.height - h) / 2);
    //     var win = window.open(url, 'ResponsiveFilemanager', "scrollbars=1,width=" + w + ",height=" + h + ",top=" + t + ",left=" + l);
    // })

    // $(document).off('click','.fav').on('click','.fav',function(e){
    //     e.preventDefault(); 
    //     // alert(key);
    //     var url = '<?php //echo base_url('responsive_filemanager/filemanager/dialog.php?type=1&popup=1&field_id=fav'); 
                      ?>';
    //     var w = 880;
    //     var h = 570;
    //     var l = Math.floor((screen.width - w) / 2);
    //     var t = Math.floor((screen.height - h) / 2);
    //     var win = window.open(url, 'ResponsiveFilemanager', "scrollbars=1,width=" + w + ",height=" + h + ",top=" + t + ",left=" + l);
    // })

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
  })
</script>