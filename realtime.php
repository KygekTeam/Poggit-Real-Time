<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Real Time Downloads</title>
        <script language="javascript">
            setTimeout(function() {
                location.reload();
            }, 4500);
        </script>
    </head>
    <body class="body">
        <div class="text">
            <div class="main" style="text-align: center;">
                <br>
                <h1>Poggit Real Time Downloads</h1>
                <hr />
                <h2>Total Plugins Downloads (All):</h2>
                <?php include "./assets/realtime-poggit.php"; ?>
                <hr />
                <h2>Total Plugins Downloads (By Kygekraqmak and aminozomty):</h2>
                <?php include "./assets/realtime-kygek.php"; ?>
                <hr />
                <h3 style="text-align: left;">This page automatically refreshes every 10 seconds.</h3>
                <h3 style="text-align: left;">If you have any feedbacks or you want to contribute to make this site better, contact KygekDev#6415 on Discord.</h3>
                <br>
            </div>
        </div>
    </body>
</html>
