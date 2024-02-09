<!-- app/Views/clientes.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Clientes</title>
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>
    
    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/themes/bootstrap/plugins/datepicker/css/bootstrap-datetimepicker.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/themes/bootstrap/plugins/fullcalendar/fullcalendar.min.css" media="screen">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/themes/bootstrap/css/theme.min.css">

    <!-- Styles css custom -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/styles.css">
    <?php
    if (isset($css_files)) {
        foreach ($css_files as $file) : ?>
        <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
    <?php endforeach;
    }
    ?>
</head>
<body>
    <div>
    <?php echo $output; ?>
    </div>
     <!-- jQuery -->
  <script src="<?php echo base_url(); ?>assets/themes/bootstrap/js/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/themes/bootstrap/js/jquery-ui/jquery-ui.min.js"></script>
<?php
    if (isset($js_files)) {
    foreach ($js_files as $file) : ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach;
    }
?>
<!-- Theme Javascript -->
<script src="<?php echo base_url(); ?>assets/themes/bootstrap/plugins/moment/moment.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/bootstrap/plugins/datepicker/js/bootstrap-datetimepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/bootstrap/js/utility/utility.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/bootstrap/js/app.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/bootstrap/js/main.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.maskMoney.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/bootstrap/js/jquery-plugins/growl.min.js"></script>
<script src="<?php echo base_url(); ?>assets/themes/bootstrap/js/jquery-plugins/jquery-maskedinput.js"></script>

</body>
</html>
