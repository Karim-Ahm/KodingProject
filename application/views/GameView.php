<!doctype html>
<html>
	<head>
		<meta charset="utf-8">

		<title>Easy</title>
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href= <?php echo base_url()."application/assets/style.css"; ?>>
		<link rel="stylesheet" href= <?php echo base_url()."application/assets/bootstrap.min.css"; ?>>
		<link rel="stylesheet" href= <?php echo base_url()."application/assets/bootstrap-theme.min.css"; ?>>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script type="text/javascript" src="http://www.parsecdn.com/js/parse-1.3.1.min.js"></script>
		<script type="text/javascript" src= <?php echo base_url()."application/assets/app.js"; ?>>
		</script>
		<script type="text/javascript" src= <?php echo base_url()."application/assets/bootstrap.min.js"; ?>>
		</script>

	</head>

	<body style="background: #4EA699">
		<div class="row">
			<div class="col-md-6">
				<canvas id="main" width="680" height="660" style="border:1px solid #000000; background:#101F29;"></canvas>
			</div>
			<div class="col-md-6">
				<p1>
					Code Editor
				</p1>
				<br>
				<p2>
					Level 1
				</p2>

				
				<form method="POST" action="Parser/compile">
					<textarea type="text" name="code_text"></textarea>
					<input type="submit">				
				</form>
			</div>
		</div>
	</body>
</html>