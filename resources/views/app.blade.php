<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.3.1/css/bulma.min.css" rel="stylesheet" type="text/css">
        <script>
        	window.Laravel = <?php echo json_encode([
        		'csrfToken' => csrf_token(),
        		]); ?>
        	</script>
        </head>
    <body>

    	<div id="app">
    		@yield('content')
    	</div>

    </body>
    <script src="js/app.js"></script>
</html>
