<!doctype html>
<html lang="en-US" xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:addthis="https://www.addthis.com/help/api-spec"
    prefix="og: http://ogp.me/ns#" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <title>How to use Instascan an HTML5 QR scanner</title> -->
    <link rel="shortcut icon" href="https://learncodeweb.com/demo/favicon.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <style>
    .fullVIdeo {
        position: fixed;
        right: 0;
        bottom: 0;
        min-width: 100%;
        min-height: 100%;
    }
    </style>
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
                <div class="col-sm-12">
                    <video id="preview" class="fullVIdeo"></video>
                </div>
                <script type="text/javascript">
                var scanner = new Instascan.Scanner({
                    video: document.getElementById('preview'),
                    scanPeriod: 5,
                    mirror: false
                });
                scanner.addListener('scan', function(content) {
                    // alert(content);
                    window.location.href = "<?=base_url('common/scan')?>"+content;
                });
                Instascan.Camera.getCameras().then(function(cameras) {
                    if (cameras.length > 0) {
                        scanner.start(cameras[1]);
                        $('[name="options"]').on('change', function() {
                            if ($(this).val() == 1) {
                                if (cameras[0] != "") {
                                    scanner.start(cameras[0]);
                                } else {
                                    alert('No camera found!');
                                }
                            } else if ($(this).val() == 2) {
                                if (cameras[1] != "") {
                                    scanner.start(cameras[1]);
                                } else {
                                    alert('No camera found!');
                                }
                            } else if ($(this).val() == 3) {
                                if (cameras[1] != "") {
                                    scanner.start(cameras[2]);
                                } else {
                                    alert('No camera found!');
                                }
                            }
                        });
                    } else {
                        console.error('No cameras found.');
                        alert('No cameras found.');
                    }
                }).catch(function(e) {
                    console.error(e);
                    alert(e);
                });
                </script>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
                    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
                    crossorigin="anonymous">

                <style>
                .nav_new {
                    color: #b3c2ef;
                }

                .nav_new:hover {
                    color: white;
                }
                </style>

                <nav class="navbar fixed-bottom navbar-dark text-center"
                    style="background: #0D215B; border-radius: 7px; margin-bottom: 0.3rem; margin-left:0.15rem; margin-right:0.15rem;">
                    <div class="mx-auto" data-toggle="buttons">
                        <label class="btn btn-primary active">
                            <input type="radio" name="options" value="2" autocomplete="off" checked> <i class="fas fa-fw fa-camera"></i> 1
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="options" value="3" autocomplete="off"> <i class="fas fa-fw fa-camera"></i> 2
                        </label>
                        <label class="btn btn-primary">
                            <input type="radio" name="options" value="1" autocomplete="off"> <i class="fas fa-fw fa-camera"></i> 3
                        </label>
                    </div>
                </nav>

            </div>

        </div>
    </div>

</body>

</html>