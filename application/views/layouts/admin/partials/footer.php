<?php
$site_settings = $this->session->userdata('site_settings');
?>
<footer class="main-footer">
  <strong>Copyright &copy; <?php echo date('Y') ?> <a href="<?php echo $site_settings->web_url ?>"><?php echo $site_settings->site_name ?></a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Designed & Developed By :</b> <a href="https://nyatapol.com/" target="_blank">Nyatapol</a>
  </div>
</footer>