<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<title>Hello, world!</title>
	<style>
		.card {
			background: #fff;
			box-shadow: 0 6px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
			border: 1;
			border-radius: 1rem;
		}

		.img-hover-zoom--colorize img {
			width: 180px;
		}
	</style>
</head>

<body>
	<div class="container p-5">
		<div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
		<?php
function listChildFiles($dir)
			{
				$ffs = scandir($dir);

				unset($ffs[array_search('.', $ffs, true)]);
				unset($ffs[array_search('..', $ffs, true)]);

				// prevent empty ordered elements
				if (count($ffs) < 1)
					return;


				foreach ($ffs as $ff) {
					$file_name = $ff;
					$extension = pathinfo($file_name, PATHINFO_EXTENSION);
					$supported_image = array('gif', 'jpg', 'jpeg', 'png', 'jfif');
					$supported_video = array('mp4', 'jpg', 'mkv', 'webm', 'wmv');
					$supported_audio = array('mp3', 'opus');
					if (in_array($extension, $supported_image)) {

						echo ' <div class="col">
	<div class="card h-100 shadow-sm">
		<div class="card-body">		 	 
			<div class="box">
				
			<div class="img-hover-zoom img-hover-zoom--colorize">
			 <img class="shadow" src="' . $dir . '/' . $ff;
						echo '">  
				</div>
			</div>
		</div>
	</div>
</div>';
					} else if (in_array($extension, $supported_video)) {


						echo ' <div class="col">
	<div class="card h-100 shadow-sm">
		<div class="card-body">		 	 
			<div class="box">
				
			<div class="img-hover-zoom img-hover-zoom--colorize">
			 <li><video class="shadow" controls>
			<source src="' . $dir . '/' . $ff;
						echo '"></video></li>
				</div>
			</div>
		</div>
	</div>
</div>';
					} else if (in_array($extension, $supported_audio)) {
						echo ' <div class="col">
	<div class="card h-100 shadow-sm">
		<div class="card-body">		 	 
			<div class="box">
				
			<div class="img-hover-zoom img-hover-zoom--colorize">
			 <li><audio class="shadow" controls>
			<source src="' . $dir . '/' . $ff;
						echo '"></audio></li>
				</div>
			</div>
		</div>
	</div>
</div>';
					} else {
						echo ' <div class="col">
	<div class="card h-100 shadow-sm">
		<div class="card-body">		 	 
			<div class="box">
				<div>
				<a href="' . $dir . '/' . $ff . '">' . $ff . '</a>	 
				</div>
			</div>
		</div>
	</div>
</div>';
					}
				}
			}

            if(isset($_GET['file'])){
                listChildFiles('upload/'. $_GET['file']);

            }


?>
</div>
	</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>