<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Sean O'Connor">
    <title>Weather Update!</title>
    <link href="css/cover.css" rel="stylesheet">
</head>

<script>
    $(document).ready(function() {
        setInterval(timestamp, 1000);
    });

    function timestamp() {
        $.ajax({
            url: 'scripts/get_time_since.php',
            success: function(data) {
                $('#timestamp').html(data);
            },
        });
    }
</script>

<body class="d-flex h-100 text-center text-bg-dark">
    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
        <a href="scripts/reset-counter.php" class="btn btn-light fw-bold border-white bg-white">Reset Counter</a>
    </div>
    <div class="cover-container d-flex justify-content-center w-100 h-100 p-3 mx-auto">
        <div class="align-self-center">
            <h1>It's been:</h1>
            <p id="timestamp" class="lead"></p>
            <!-- <div id="timestamp"></div> -->
            <h3>It's over.</h3>
        </div>
    </div>
</body>

</html>