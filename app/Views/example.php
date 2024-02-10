<!-- app/Views/example.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sistema</title>
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>
    
    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/grocery_crud/themes/bootstrap/plugins/datepicker/css/bootstrap-datetimepicker.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/grocery_crud/themes/bootstrap/plugins/fullcalendar/fullcalendar.min.css" media="screen">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/grocery_crud/themes/bootstrap/css/theme.min.css">

    <!-- Styles css custom -->
    <?php
    if (isset($css_files)) {
        foreach ($css_files as $file) : ?>
        <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
    <?php endforeach;
    }
    ?>
</head>
<body>
    <div class="container">
        <div class="row justify-content-lg-center">
            <div class="col-lg-auto">
                <?php echo $output; ?>
            </div>
        </div>
        </div>
     <!-- jQuery -->

<script src="<?php echo base_url(); ?>assets/grocery_crud/themes/bootstrap/js/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/grocery_crud/themes/bootstrap/js/jquery-ui/jquery-ui.min.js"></script>
<?php
    if (isset($js_files)) {
    foreach ($js_files as $file) : ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach;
    }
?>
<!-- Theme Javascript -->
<script src="<?php echo base_url(); ?>assets/grocery_crud/themes/bootstrap/plugins/moment/moment.js"></script>
<script src="<?php echo base_url(); ?>assets/grocery_crud/themes/bootstrap/plugins/datepicker/js/bootstrap-datetimepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/grocery_crud/themes/bootstrap/js/utility/utility.js"></script>
<script src="<?php echo base_url(); ?>assets/grocery_crud/themes/bootstrap/js/app.js"></script>
<script src="<?php echo base_url(); ?>assets/grocery_crud/themes/bootstrap/js/main.js"></script>
<script src="<?php echo base_url(); ?>assets/grocery_crud/themes/bootstrap/js/jquery-plugins/growl.min.js"></script>
<script src="<?php echo base_url(); ?>assets/grocery_crud/themes/bootstrap/js/jquery-plugins/jquery-maskedinput.js"></script>

</body>
</html>
