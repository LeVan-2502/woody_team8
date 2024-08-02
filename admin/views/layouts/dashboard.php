<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= BASE_URL_ADMIN ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?= BASE_URL_ADMIN ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= BASE_URL_ADMIN ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?= BASE_URL_ADMIN ?>assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= BASE_URL_ADMIN ?>assets/dist/css/adminlte.min.css">

    <link rel="stylesheet" href="<?= BASE_URL_ADMIN ?>assets/dist/css/style.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= BASE_URL_ADMIN ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= BASE_URL_ADMIN ?>assets/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= BASE_URL_ADMIN ?>assets/plugins/summernote/summernote-bs4.min.css">

    <script src="<?= BASE_URL_ADMIN ?>assets/plugins//tinymce/tinymce.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        tinymce.init({
            selector: '#mytextarea',
            plugins: 'image code',
            toolbar: 'undo redo | link image | code',
            image_title: true,
            automatic_uploads: true,
            file_picker_types: 'image',
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function() {
                    var file = this.files[0];
                    var reader = new FileReader();
                    reader.onload = function() {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), {
                            title: file.name
                        });
                    };
                    reader.readAsDataURL(file);
                };
                input.click();
            }
        });
    </script>
    <style>
        .navbar-custom {
            background-color: #343a40;
            /* Background color for navbar */
        }

        .navbar-custom .navbar-brand {
            color: #fff;
            font-weight: bold;
        }

        .navbar-custom .navbar-nav .nav-link {
            color: #adb5bd;
            /* Link color */
            padding: 0.75rem 1rem;
            /* Padding for links */
            transition: color 0.3s, background-color 0.3s;
        }

        .navbar-custom .navbar-nav .nav-link:hover {
            color: #fff;
            /* Link color on hover */
            background-color: #495057;
            /* Background color on hover */
        }

        .navbar-custom .navbar-toggler {
            border-color: #adb5bd;
        }

        .navbar-custom .navbar-toggler-icon {
            color: #adb5bd;
        }

        .navbar-custom .navbar-collapse {
            justify-content: center;
            /* Center align the navbar items */
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?= BASE_URL_ADMIN ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <?php require_once PATH_VIEW_ADMIN . 'layouts/partials/navbar.php' ?>

        <!-- /.navbar -->


        <!-- Main Sidebar Container -->
        <?php require_once PATH_VIEW_ADMIN . 'layouts/partials/sidebar.php' ?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <!-- Main content -->
            <section class="content mt-3">
                <div class="container-fluid">
                    <!-- <nav class="navbar navbar-expand-lg navbar-custom mb-4 row">

                        <a class="navbar-brand" href="#">QUẢN LÝ THỐNG KÊ</a>

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div style="background-color: #343a40;" class="collapse navbar-collapse align-item-center justify-content-center" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?act=doanhthu">Doanh Thu</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?act=donhang">Đơn Hàng</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?act=khachhang">Khách Hàng</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?act=sanpham">Sản Phẩm</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?act=giao_hang">Giao Hàng</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?act=quangcao">Quảng Cáo</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?act=phanhoi">Phản Hồi</a>
                                </li>
                            </ul>
                        </div>
                    </nav> -->
                    <?php require_once PATH_VIEW_ADMIN . $view . '.php' ?>

                </div>
            </section>
        </div>


       
        <!-- Content Wrapper. Contains page content -->

        <!-- /.content-wrapper -->
        <?php require_once PATH_VIEW_ADMIN . 'layouts/partials/footer.php' ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>

        <!-- /.control-sidebar -->
    </div>

    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?= BASE_URL_ADMIN ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= BASE_URL_ADMIN ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?= BASE_URL_ADMIN ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->

    <!-- Sparkline -->
    <script src="<?= BASE_URL_ADMIN ?>assets/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="<?= BASE_URL_ADMIN ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?= BASE_URL_ADMIN ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?= BASE_URL_ADMIN ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?= BASE_URL_ADMIN ?>assets/plugins/moment/moment.min.js"></script>
    <script src="<?= BASE_URL_ADMIN ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= BASE_URL_ADMIN ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="<?= BASE_URL_ADMIN ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?= BASE_URL_ADMIN ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= BASE_URL_ADMIN ?>assets/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= BASE_URL_ADMIN ?>assets/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?= BASE_URL_ADMIN ?>assets/dist/js/pages/dashboard.js"></script>
    <!-- Code injected by live-server -->
    <script src="<?= BASE_URL_ADMIN ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= BASE_URL_ADMIN ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= BASE_URL_ADMIN ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= BASE_URL_ADMIN ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= BASE_URL_ADMIN ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= BASE_URL_ADMIN ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= BASE_URL_ADMIN ?>assets/plugins/jszip/jszip.min.js"></script>
    <script src="<?= BASE_URL_ADMIN ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= BASE_URL_ADMIN ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= BASE_URL_ADMIN ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= BASE_URL_ADMIN ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= BASE_URL_ADMIN ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
        // <![CDATA[  <-- For SVG support
        if ('WebSocket' in window) {
            (function() {
                function refreshCSS() {
                    var sheets = [].slice.call(document.getElementsByTagName("link"));
                    var head = document.getElementsByTagName("head")[0];
                    for (var i = 0; i < sheets.length; ++i) {
                        var elem = sheets[i];
                        var parent = elem.parentElement || head;
                        parent.removeChild(elem);
                        var rel = elem.rel;
                        if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
                            var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
                            elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
                        }
                        parent.appendChild(elem);
                    }
                }
                var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
                var address = protocol + window.location.host + window.location.pathname + '/ws';
                var socket = new WebSocket(address);
                socket.onmessage = function(msg) {
                    if (msg.data == 'reload') window.location.reload();
                    else if (msg.data == 'refreshcss') refreshCSS();
                };
                if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
                    console.log('Live reload enabled.');
                    sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
                }
            })();
        } else {
            console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
        }
        $(document).ready(function() {
            var navbar = $('.main-header');
            var offset = navbar.offset().top;

            $(window).scroll(function() {
                if ($(window).scrollTop() >= offset) {
                    navbar.addClass('navbar-fixed');
                } else {
                    navbar.removeClass('navbar-fixed');
                }
            });
        });

        // ]]>
    </script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    <script>
        tinymce.init({
            selector: '#mytextarea',
            plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table paste code help wordcount',
            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
            content_css: 'https://www.tiny.cloud/css/codepen.min.css'
        });
    </script>
    <script>
        $(document).ready(function() {
            var areaChartData = {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                        label: 'Năm 2023',
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: [28, 48, 40, 19, 86, 27, 90]
                    },
                    {
                        label: 'Năm 2024',
                        backgroundColor: 'rgba(210, 214, 222, 1)',
                        borderColor: 'rgba(210, 214, 222, 1)',
                        pointRadius: false,
                        pointColor: 'rgba(210, 214, 222, 1)',
                        pointStrokeColor: '#c1c7d1',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data: [65, 59, 80, 81, 56, 55, 40]
                    },
                ]
            }

            var barChartCanvas = $('#barChart').get(0).getContext('2d');
            var barChartData = $.extend(true, {}, areaChartData);
            var temp0 = areaChartData.datasets[0];
            var temp1 = areaChartData.datasets[1];
            barChartData.datasets[0] = temp1;
            barChartData.datasets[1] = temp0;

            var barChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false
            };

            new Chart(barChartCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
            var pieChartData = {
                labels: <?php echo $categoriesJson; ?>,
                datasets: [
                    {
                        label: 'Doanh Thu Theo Danh Mục',
                        backgroundColor: ['gray','#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0'],
                        borderColor: '#fff',
                        data: <?php echo $totalsJson; ?>
                    }
                ]
            };

            var pieChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'top'
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                }
            };

            new Chart(pieChartCanvas, {
                type: 'pie',
                data: pieChartData,
                options: pieChartOptions
            });
        });
    </script>

</body>

</html>