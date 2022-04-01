<!DOCTYPE html>
<html>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>


<?php
$thelist = "";
  if ($handle = opendir('uploads')) {
    while (false !== ($file = readdir($handle))) {
      if ($file != "." && $file != "..") {
        $thelist .= '<li><p>Download file <a href="download.php?file=' . $file . '">'.$file.'</a></p></li>';
        $thelist .= '<li><p>Delete file <a href="deletefile.php?file=' . $file . '">'.$file.'</a></p></li>';
        $thelist .= '<p>--------------------------------------';
      }
    }
    closedir($handle);
  }
?>
<h1>List of files:</h1>
<ul><?php echo $thelist; ?></ul>

</body>
</html>