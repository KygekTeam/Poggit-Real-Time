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
            }
            
            let timerId = setInterval(function() => {
                reloadScrip()
            }, 5000);

            setTimeout(function() => {
                clearInterval(timerId)
            }, 1800000);
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
                <h3>Download our plugins <a href="https://poggit.pmmp.io/plugins/by/Kygekraqmak">here</a> and see the counter goes up!</h3>
                <hr />
                <h4 style="text-align: left;">This page automatically refreshes every 5 seconds.</h4>
                <h4 style="text-align: left;">If you have any feedbacks or you want to contribute to make this site better, contact KygekDev#6415 on Discord.</h4>
                <hr />
                <h4 style="text-align: left;"><a href="https://github.com/Kygekraqmak/Poggit-Real-Time/tree/refresh-h1">Source Code</a></h4>
                <br>
            </div>
        </div>
    </body>
</html>
