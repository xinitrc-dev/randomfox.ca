<?php
$files = glob('images/*');
if ($files) {
    $FOX_NUM = count($files);

    if (!isset($_GET['i'])) {
        $random_fox_index = rand(1, $FOX_NUM);
    } else if (ctype_digit($_GET['i'])) {
        $random_fox_index = $_GET['i'];
    }
} else {
    $FOX_NUM = 0;
    $random_fox_index = 0;
}

?>

<html>
<head>
    <title>RandomFox</title>
    <meta charset="utf-8">
    <meta type="author" content="xinitrc" />
    <meta type="description" content="Displaying pictures of random foxes with every click!" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="#FF6600" />
	<meta http-equiv="Cache-Control" content="max-age=1" />

    <meta property="og:image" content="https://randomfox.ca/images/<?= $random_fox_index ?>.jpg" />
    <meta property="og:title" content="randomfox.ca" />
    <meta property="og:description" content="Random fox on every click!" />
    <meta property="og:url" content="https://randomfox.ca" />

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script>
        $(document).ready(function () {
            var panel_width = document.getElementById('sidebar').offsetWidth;
            var image_width = document.getElementById('fox_full_link').offsetWidth;
            document.getElementById('footer').style.width = panel_width + image_width;
        });
    </script>

    <style type="text/css">
        body {
            margin: 0;
			padding: 5px;
            font-family: arial, verdana, tahoma, sans-serif;
            font-size: 14px;
        }
        #footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 75%;
            text-align: center;
        }
		#panel {
			display: flex;
			align-items: center;
			max-height: 100%;
		}
        #sidebar {
            float: left;
            width: 200px;
            padding: 5px;
        }
		#fox_full_link {
			max-width: calc(100% - 240px);
			max-height: 100%;
            background: transparent url('https://randomfox.ca/images/<?= $random_fox_index ?>.jpg') 0 0/contain no-repeat;
			margin: 10px;
		}
        #fox_img_link {
            float: left;
            margin: 10px;
			max-width: 100%;
            border: 2px solid #ccc;
        }
    </style>
</head>
<body>
<div id="panel">
	<div id="sidebar">
		<label for=shareButton><strong>Share this fox!</strong></label>
		<input type="text" id="shareButton" value="https://randomfox.ca/?i=<?= $random_fox_index ?>" onclick="this.select();" /><br />

		<p id="fox_count">Fox Count: <?= $FOX_NUM ?><br />
			<a href="https://github.com/xinitrc-ls/randomfox.ca">Add more floof!</a></p>

		<p>Submit more foxes?<br>Here: <a href="https://github.com/xinitrc-ls/randomfox.ca" target="_blank">GitHub</a> or <a href="mailto:x-bot@x-hub.co?subject=Fox%20Pictures%20Upload%20Request">Email</a></p>

		<br /><br /><br />
		<p>API is Available: <a href="https://randomfox.ca/floof">https://randomfox.ca/floof</a></p>

	</div>

	<a href="https://randomfox.ca/?i=<?= $random_fox_index ?>" id="fox_full_link">
		<img src="https://randomfox.ca/images/<?= $random_fox_index ?>.jpg" alt="" title="" style="visibility: hidden;" id="fox_img_link" />
	</a>

    <div id="footer">
        <p>Made by: xinitrc</p>
    </div>
</div>

</body>
</html>