
<?php
// Định nghĩa đường dẫn gốc đến thư mục libs
$base_url = '/BMProject/libs/'; // Điều chỉnh đường dẫn này cho phù hợp với cấu trúc thư mục của bạn
?>

<!-- Mainly scripts -->
<script src="<?php echo $base_url; ?>js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo $base_url; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo $base_url; ?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo $base_url; ?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="<?php echo $base_url; ?>js/plugins/iCheck/icheck.min.js"></script>

    <!-- Peity -->
    <script src="<?php echo $base_url; ?>js/plugins/peity/jquery.peity.min.js"></script>
    <script src="<?php echo $base_url; ?>js/demo/peity-demo.js"></script>
    <!-- FooTable -->
    <script src="<?php echo $base_url; ?>js/plugins/footable/footable.all.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo $base_url; ?>js/inspinia.js"></script>
    <script src="<?php echo $base_url; ?>js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="<?php echo $base_url; ?>js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Jvectormap -->
    <script src="<?php echo $base_url; ?>js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="<?php echo $base_url; ?>js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- Sparkline -->
    <script src="<?php echo $base_url; ?>js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data -->
    <script src="<?php echo $base_url; ?>js/demo/sparkline-demo.js"></script>

    <!-- ChartJS -->
    <script src="<?php echo $base_url; ?>js/plugins/chartJs/Chart.min.js"></script>
    <!-- Jasny -->
    <script src="<?php echo $base_url; ?>js/plugins/jasny/jasny-bootstrap.min.js"></script>

    <!-- DROPZONE -->
    <script src="<?php echo $base_url; ?>js/plugins/dropzone/dropzone.js"></script>

    <!-- CodeMirror -->
    <script src="<?php echo $base_url; ?>js/plugins/codemirror/codemirror.js"></script>
    <script src="<?php echo $base_url; ?>js/plugins/codemirror/mode/xml/xml.js"></script>
    <!-- EayPIE -->
    <script src="<?php echo $base_url; ?>js/plugins/easypiechart/jquery.easypiechart.js"></script>

    <script src="<?php echo $base_url; ?>js/plugins/toastr/toastr.min.js"></script>

    <script src="<?php echo $base_url; ?>js/plugins/select2/select2.full.min.js"></script>

    <script src="<?php echo $base_url; ?>js/plugins/clockpicker/clockpicker.js"></script>

    <?php
    if (isset($custom_js)) {
        foreach ($custom_js as $js_file) {
            echo '<script src="' . $base_url . 'js/' . $js_file . '"></script>';
        }
    }
    ?>
    <script src="<?php echo $base_url; ?>js/plugins/dataTables/datatables.min.js"></script>
    <script src="<?php echo $base_url; ?>js/jscustom.js"></script>



<script>
    // if (window.history.replaceState) {
    //     window.history.replaceState(null, null, window.location.href);
    // }
    $(document).ready(function () {
        <?php
        if (isset($messages)) {
            foreach ($messages as $message) {
                if ($message['tags'] == 'success') {
                    echo "showCustomToast('Thành công', '" . $message['content'] . "', 'success');";
                } elseif ($message['tags'] == 'error') {
                    echo "showCustomToast('Thất bại', '" . $message['content'] . "', 'error');";
                } elseif ($message['tags'] == 'warning') {
                    echo "showCustomToast('Cảnh báo', '" . $message['content'] . "', 'warning');";
                }
            }
        }
        ?>

        <?php
        if (isset($custom_script)) {
            echo $custom_script;
        }
        ?>
    });
</script>
