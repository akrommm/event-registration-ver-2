<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Accestix - {{ $title }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url('/')}}/assets/images/logo/accestix-2.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- page css -->
    <link href="{{ url('/') }}/assets/vendors/select2/select2.css" rel="stylesheet">
    <link href="{{ url('/') }}/assets/vendors/datatables/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('/') }}/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/vendors/summernote/summernote-bs4.min.css">

    <!-- Core css -->
    <link href="{{ url('/') }}/assets/css/app.min.css" rel="stylesheet">

    <style>
        .btn-interactive {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .btn-interactive:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-interactive:focus {
            outline: none;
            box-shadow: 0 0 10px rgba(0, 0, 255, 0.4);
        }
    </style>

</head>

<body>

    <div class="app">
        <div class="layout">
            <!-- Header START -->
            <x-template.header :menu="$menu" :title="$title" :header="$header" />
            <!-- Header END -->

            <!-- Side Nav START -->
            <x-template.sidebar :menu="$menu" :title="$title" :header="$header" />
            <!-- Side Nav END -->

            <!-- Page Container START -->
            <div class="page-container">
                <!-- Content Wrapper START -->
                <div class="main-content" style="background-image: url('{{ url('/')}}/assets/images/others/bg1.jpg')">
                    <div class="container-fluid pt-4">
                        <div class="row">
                            <div class="col-md-12">
                                <x-template.utils.notif-front />
                            </div>
                        </div>
                        {{ $slot }}
                    </div><!-- /.container-fluid -->
                </div>
                <!-- Content Wrapper END -->

                <!-- Footer START -->
                <x-template.footer />
                <!-- Footer END -->

            </div>
            <!-- Page Container END -->
            <x-template.control-sidebar />
        </div>
    </div>


    <!-- Core Vendors JS -->
    <script src="{{ url('/') }}/assets/js/vendors.min.js"></script>

    <!-- page js -->
    <script src="{{ url('/') }}/assets/vendors/select2/select2.min.js"></script>
    <script src="{{ url('/') }}/assets/vendors/chartjs/Chart.min.js"></script>
    <script src="{{ url('/') }}/assets/js/pages/dashboard-default.js"></script>
    <script src="{{ url('/') }}/assets/vendors/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ url('/') }}/assets/vendors/datatables/dataTables.bootstrap.min.js"></script>
    <script src="{{ url('/') }}/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- Summernote -->
    <script src="{{ url('/') }}/assets/vendors/summernote/summernote-bs4.min.js"></script>

    <!-- Core JS -->
    <script src="{{ url('/') }}/assets/js/app.min.js"></script>
    <script>
        $('#data-table').DataTable();
    </script>
    <script>
        $('.select2').select2();
    </script>
    <script>
        $('#trigger-loading-1').on('click', function(e) {
            $(this).addClass("is-loading");
            setTimeout(function() {
                $("#trigger-loading-1").removeClass("is-loading");
            }, 4000);
            e.preventDefault();
        });
    </script>
    <script>
        $(function() {
            $(document).ready(function() {
                $('.datepicker-input').datepicker({
                    changeMonth: true,
                    changeYear: true,
                    autoclose: true,
                    todayHighlight: true,
                    format: 'dd-mm-yyyy',
                    language: 'id',
                    locale: 'id',
                });
            });
        })
    </script>
    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote({
                fontNames: ['Arial', 'Times New Roman', 'Arial Black'],
                styleTags: ['p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'],
                blockquoteBreakingLevel: 2,
                blockquoteBreakingLevel: 2,
                styleWithSpan: false,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['fontname', ['fontname']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['insert', ['link', 'picture', 'video', 'table', 'hr']],
                    ['view', ['fullscreen', 'codeview']],
                ]
            });

            // Inisialisasi CodeMirror
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>

</body>

</html>