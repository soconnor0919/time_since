<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<?php
session_start();
?>

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
            url: 'scripts/get-time-since.php',
            success: function(data) {
                $('#timestamp').html(data);
            },
        });
    }

    document.addEventListener("DOMContentLoaded", function(event) {
        function verificationInput() {
            const inputs = document.querySelectorAll('#otp > *[id]');
            for (let i = 0; i < inputs.length; i++) {
                inputs[i].addEventListener('keydown', function(event) {
                    if (event.key === "Backspace") {
                        inputs[i].value = '';
                        if (i !== 0) inputs[i - 1].focus();
                    } else {
                        if (i === inputs.length - 1 && inputs[i].value !== '') {
                            return true;
                        } else if (event.keyCode > 47 && event.keyCode < 58) {
                            inputs[i].value = event.key;
                            if (i !== inputs.length - 1) inputs[i + 1].focus();
                            event.preventDefault();
                        } else if (event.keyCode > 64 && event.keyCode < 91) {
                            inputs[i].value = String.fromCharCode(event.keyCode);
                            if (i !== inputs.length - 1) inputs[i + 1].focus();
                            event.preventDefault();
                        }
                    }
                });
            }
        }
        verificationInput();
    });
</script>

<?php
$lines = file("lines.txt");
$message = $lines[array_rand($lines)];
?>

<body class="d-flex h-100 text-center text-bg-dark">
    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3">
        <button type="button" class="btn btn-light fw-bold border-white bg-white" data-bs-toggle="modal" data-bs-target="#confirmModal">
            Reset Counter
        </button>
    </div>

    <div class="modal fade" id="confirmModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-body">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Verify your identity.</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/scripts/reset-counter.php" method="post">
                    <div class="modal-body text-body">
                        <div class="container height-100 d-flex justify-content-center align-items-center">
                            <div class="position-relative">
                                <h6>Please enter your identity verification code..</h6>
                                <div id="otp" class="inputs d-flex flex-row justify-content-center mt-1">
                                    <input class="m-2 text-center form-control rounded" type="text" id="first" name="first" maxlength="1" />
                                    <input class="m-2 text-center form-control rounded" type="text" id="second" name="second" maxlength="1" />
                                    <input class="m-2 text-center form-control rounded" type="text" id="third" name="third" maxlength="1" />
                                    <input class="m-2 text-center form-control rounded" type="text" id="fourth" name="fourth" maxlength="1" />
                                    <input class="m-2 text-center form-control rounded" type="text" id="fifth" name="fifth" maxlength="1" />
                                    <input class="m-2 text-center form-control rounded" type="text" id="sixth" name="sixth" maxlength="1" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="cover-container d-flex justify-content-center w-100 h-100 p-3 mx-auto">
        <div class="align-self-center">
            <h1>It's been:</h1>
            <p id="timestamp" class="lead">Please wait...</p>
            <h3><?= $message ?></h3>
        </div>
    </div>
</body>

</html>