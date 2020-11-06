<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Real Time Downloads</title>
        <script>window.onload = () => {
            function sleep(ms) {
                return new Promise(resolve => setTimeout(resolve, ms));
            }
            async function reloadScrip() {
                var s = document.createElement('script');
                s.type = 'text/javascript';
                s.src = './assets/realtime.php'
                document.getElementById('body').append(s);
                var target = document.getElementsByTagName('script');
                target[1].parentElement.removeChild(target[1]);
                await sleep(5000);
                reloadScrip();
            }
            reloadScrip();
        }</script>
    </head>
    <body class="body" id="body">
        <div class="text">
            <div class="main" style="text-align: center;">
                <br>
                <h1>Poggit Real Time Downloads</h1>
                <hr />
                <h2>Total Plugins Downloads (All):</h2>
                <h1 id="poggit" style="font-size: 72px;"></h1>
                <hr />
                <h2>Total Plugins Downloads (By Kygekraqmak and aminozomty):</h2>
                <h1 id="kygekraqmak" style="font-size: 72px;"></h1>
                <hr />
                <h3 style="text-align: left;">This page automatically refreshes every 10 seconds.</h3>
                <h3 style="text-align: left;">If you have any feedbacks or you want to contribute to make this site better, contact KygekDev#6415 on Discord.</h3>
                <br>
            </div>
        </div>
    </body>
</html>
