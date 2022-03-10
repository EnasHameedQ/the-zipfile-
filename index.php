<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <button class="btn btn-dark text-center" type="button"><a href="listFolder.php" class="text-white">Show Folder</a></button>

<div class="container mt-5 bg-light">
<div class="box">
	<div class="heading text-center">Upload File and Unzip</div>

	<div class="form_field">
		<form enctype="multipart/form-data" method="post" >
		<div class="mb-3">
  <label for="formFile" class="form-label text-center">Upload Zip File:</label>
  <input class="form-control lg-5" type="file" name="zip_file" id="formFile">
</div>
	<input type="submit" name="submit" value="Upload" class="p-1 mb-2 bg-primary text-white"> <br><br>
		</form>
	</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<?php
if (isset($_FILES["zip_file"]["name"])) {
  $filename = $_FILES["zip_file"]["name"]; //save file name to use in unzip
  $source = $_FILES["zip_file"]["tmp_name"]; //save file name to use in upload
  //function to check if folder  exsist or create it
  function checkDir($Dir)
  {
    if (file_exists($Dir)) {
      return;
    } else {
      mkdir($Dir, 0777);
    }
  }
  //function to upload and unzip file
  function unzip($Dir, $File)
  {
    checkDir($Dir); //function to check if directory is exists or create

    $zip = new ZipArchive();
    $fileZip = $zip->open($File); // open the zip file to extract
    if ($fileZip === true) {
      $zip->extractTo($Dir); // extract to directory with same name
      $zip->close();
      unlink($File); //to delete zip file after extract
      /**show  massage after upload */
      echo '<script language="javascript">';
      echo 'alert("Your .zip file uploaded and unziped.")';
      echo '</script>';
    }
  }
  /* PHP current path */
  $path = 'upload/'; //name of folder to save and extract file in it  
  $filenoext = $filename . "zip";

  $myDir = $path . $filenoext; // target directory
  $myFile = $path . $filename; // target zip file


  /* here it is really happening */

  if (move_uploaded_file($source, $myFile)) {
    unzip($myDir, $myFile);
  } else {

    echo '<script language="javascript">';
    echo 'alert("There was a problem with the upload..")';
    echo '</script>';
  }
}
?>
</body>
</html>
