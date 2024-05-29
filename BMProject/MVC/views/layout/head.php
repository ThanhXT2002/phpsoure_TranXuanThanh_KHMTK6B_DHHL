
<?php
// Định nghĩa đường dẫn gốc đến thư mục libs
$base_url = '/BMProject/libs/'; // Điều chỉnh đường dẫn này cho phù hợp với cấu trúc thư mục của bạn
?>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?php
            if (isset($title)) {
                echo $title;
            } else {
                echo "Đại Học Hạ Long - UHL";
            }
            ?>
        </title>
        <!-- Mainly styles -->
        <link href="<?php echo $base_url; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>css/animate.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="<?php echo $base_url; ?>css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>css/plugins/select2/select2.min.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>css/plugins/footable/footable.core.css" rel="stylesheet">

    <link href="<?php echo $base_url; ?>css/plugins/clockpicker/clockpicker.css" rel="stylesheet">

    <link href="<?php echo $base_url; ?>css/style.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>css/customize.css" rel="stylesheet">

    <!-- Datatable -->
    <link href="<?php echo $base_url; ?>css/plugins/dataTables/datatables.min.css" rel="stylesheet">

    <script src="<?php echo $base_url; ?>js/jquery-3.1.1.min.js"></script>

    <?php
    if (isset($custom_css)) {
        foreach ($custom_css as $css_file) {
            echo '<link rel="stylesheet" href="' . $base_url . 'css/' . $css_file . '">';
        }
    }
    ?>

        
        <script src="<?php echo isset($js_cnd_file) ? $js_cnd_file : ''; ?>"></script>