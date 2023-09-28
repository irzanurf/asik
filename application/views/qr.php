<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ASIK UNDIP</title>
    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/main/vendor/fontawesome-free/css/all.min.css');?>" rel="stylesheet"
        type="text/css">
    <style>
    .centered {
        position: fixed;
        top: 50%;
        left: 50%;
        /* bring your own prefixes */
        transform: translate(-50%, -50%);
    }

    body {
        background: #9FB3EA;
    }

    .form {
        font-family: Helvetica, sans-serif;
        max-width: 400px;
        margin: 100px auto;
        text-align: center;
        padding: 16px;
        background: #ffffff;
        border-radius: 25px;
    }

    .form h1 {
        background: #2b53c5;
        padding: 20px 0;
        font-weight: 300;
        text-align: center;
        color: #fff;
        margin: -16px -16px 16px -16px;
        font-size: 25px;
    }

    .form input[type="text"],
    .form input[type="url"] {
        box-sizing: border-box;
        width: 100%;
        background: #fff;
        margin-bottom: 4%;
        border: 1px solid #ccc;
        padding: 4%;
        font-size: 17px;
        color: rgb(9, 61, 125);
    }

    .form input[type="text"]:focus,
    .form input[type="url"]:focus {
        box-shadow: 0 0 5px #5868bf;
        padding: 4%;
        border: 1px solid #5868bf;
    }

    .form button {
        box-sizing: border-box;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        width: 180px;
        margin: 0 auto;
        padding: 3%;
        background: #0853b6;
        border: none;
        border-radius: 3px;
        font-size: 17px;
        border-top-style: none;
        border-right-style: none;
        border-left-style: none;
        color: #fff;
        cursor: pointer;
    }

    .form button:hover {
        background: rgba(88, 104, 191, 0.5);
    }

    /* #qrcode-container {
        display: none;
    }

    .qrcode {
        padding: 16px;
        margin-bottom: 30px;
    }

    .qrcode img {
        margin: 0 auto;
        box-shadow: 0 0 10px rgba(67, 67, 68, 0.25);
        padding: 4px;
    } */
    </style>
</head>

<div class="form">
    <input type="hidden" value="?qr=<?=$kendaraan->qr?>" id="url">
    <img src="<?= base_url('assets/undip.png');?>" width="60" height="65">
    <h1>Scan QR</h1>
    <form>
        <div id="qrcode-container">
            <div id="qrcode" class="qrcode"></div>
        </div>
        <div id="qrcode"></div>

    </form>
</div>


<script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
<script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
<script src="<?= base_url('assets/qrcode/dist/jquery-qrcode.js');?>"></script>
<script>
window.onload = function() {

    // Clear Previous QR Code
    $('#qrcode').empty();

    // Generate and Output QR Code
    // $('#qrcode').qrcode({
    //     width: 128,
    //     height: 128,
    //     text: $('#url').val()
    // });

    $("#qrcode").qrcode({
        size: 250,
        // fill: '#212121',
        text: $('#url').val(),
        mode: 0
        // image: "./assets/undip.png"
    });

};
</script>