<?php include "nav.php"?>
<!doctype html>
<a href="Brackets.php">Toernooi structuur</a>
<a href="Wedstrijden2.php">Wedstrijd uitslag</a>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>MBO Open</title>
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
	<!-- basic styles -->
	<style type="text/css">
	body {background-color: #fafafa; font-size: 19px; }
	h1 { margin: 150px auto 30px auto; text-align: center; }
	canvas {  }
		.g_gracket { width: 9999px; background-color: #fafafa; padding: 55px 15px 5px; line-height: 100%; position: relative; overflow: hidden;}
		.g_round { float: left; margin-right: 70px; }
		.g_game { position: relative; margin-bottom: 15px; }
		.g_gracket h3 { margin: 0; padding: 10px 8px 8px;  font-weight: normal; color: #fff}
		.g_team { background: #ff9623; }
		.g_team:last-child {  background: #2a6797; }
		.g_round:last-child { margin-right: 20px; }
		.g_winner { background: #cccccc; }
		.g_winner .g_team { background: none; }
		.g_current { cursor: pointer; background: #A0B43C!important; }
		.g_round_label { top: -5px; font-weight: normal; color: #CCC; text-align: center; }
	</style>

	<!-- dependencies -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" crossorigin="anonymous"></script>

	<!-- main lib -->
	<script type="text/javascript" src="../jquery.gracket.min.js"></script>
	<script type="text/javascript" src="test.js"></script>

</head>
<body>

<div class="jquery-script-ads"><script type="text/javascript"><!--
google_ad_client = "ca-pub-2783044520727903";
/* jQuery_demo */
google_ad_slot = "2780937993";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="https://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></div>
<div class="jquery-script-clear"></div>
</div>
</div>
	<!-- empty gracket element -->
	<div class="my_gracket"></div>

	<script type="text/javascript">
		(function(win, doc, $){
			// Fake Data
			win.TestData = [
				[
					[ {"name" : "Erik Zettersten", "id" : "erik-zettersten", "seed" : 1, "displaySeed": "1", "score" : 2 }, {"name" : "Andrew Miller", "id" : "andrew-miller", "seed" : 2} ],
					[ {"name" : "James Coutry", "id" : "james-coutry", "seed" : 3, "score": 2}, {"name" : "Sam Merrill", "id" : "sam-merrill", "seed" : 4, "score": 1}],
					[ {"name" : "Anothy Hopkins", "id" : "anthony-hopkins", "seed" : 5, "score": 2}, {"name" : "Everett Zettersten", "id" : "everett-zettersten", "seed" : 6, "score": 0} ],
					[ {"name" : "John Scott", "id" : "john-scott", "seed" : 7, "score": 0}, {"name" : "Teddy Koufus", "id" : "teddy-koufus", "seed" : 8, "score": 2}],
					[ {"name" : "Arnold Palmer", "id" : "arnold-palmer", "seed" : 9, "score": 1}, {"name" : "Ryan Anderson", "id" : "ryan-anderson", "seed" : 10, "score": 2} ],
					[ {"name" : "Jesse James", "id" : "jesse-james", "seed" : 1, "score": 0}, {"name" : "Scott Anderson", "id" : "scott-anderson", "seed" : 12, "score": 2}],
					[ {"name" : "Josh Groben", "id" : "josh-groben", "seed" : 13, "score": 1}, {"name" : "Sammy Zettersten", "id" : "sammy-zettersten", "seed" : 14, "score": 2} ],
					[ {"name" : "Jake Coutry", "id" : "jake-coutry", "seed" : 15, "score": 2}, {"name" : "Spencer Zettersten", "id" : "spencer-zettersten", "seed" : 16, "score": 1}]
				],
				[
					[ {"name" : "Erik Zettersten", "id" : "erik-zettersten", "seed" : 1, "score": 2}, {"name" : "James Coutry", "id" : "james-coutry", "seed" : 3, "score": 0} ],
					[ {"name" : "Anothy Hopkins", "id" : "anthony-hopkins", "seed" : 5, "score": 2}, {"name" : "Teddy Koufus", "id" : "teddy-koufus", "seed" : 8, "score": 1} ],
					[ {"name" : "Ryan Anderson", "id" : "ryan-anderson", "seed" : 10, "score": 2}, {"name" : "Scott Anderson", "id" : "scott-anderson", "seed" : 12, "score": 0} ],
					[ {"name" : "Sammy Zettersten", "id" : "sammy-zettersten", "seed" : 14, "score": 2}, {"name" : "Jake Coutry", "id" : "jake-coutry", "seed" : 15, "score": 1} ]
				],
				[
					[ {"name" : "Erik Zettersten", "id" : "erik-zettersten", "seed" : 1, "score": 2}, {"name" : "Anothy Hopkins", "id" : "anthony-hopkins", "seed" : 5, "score": 0} ],
					[ {"name" : "Ryan Anderson", "id" : "ryan-anderson", "seed" : 10, "score": 2}, {"name" : "Sammy Zettersten", "id" : "sammy-zettersten", "seed" : 14, "score": 0} ]
				],
				[
					[ {"name" : "Erik Zettersten", "id" : "erik-zettersten", "seed" : 1, "score": 2}, {"name" : "Ryan Anderson", "id" : "ryan-anderson", "seed" : 10, "score": 1} ]
				],
				[
					[ {"name" : "Erik Zettersten", "id" : "erik-zettersten", "seed" : 1, "score": "WINNER"} ]
				]
			];

			// initializer
			$(".my_gracket").gracket({ src : win.TestData });

		})(window, document, jQuery);
	</script>
	<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
