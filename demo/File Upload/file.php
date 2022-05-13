<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <link rel="stylesheet" href="file.css">
</head>
<body>
    <div class="container">
        <div class="row">
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" id="fileToUpload">
        
        <input type="submit" value="submit" >
    </form>
    </div>
    </div>
    
<?php

$list="";
if($handle =opendir('D:\xampp\htdocs\demo\uploads'))
{
    while(false!==($file=readdir($handle)))
    {
        if($file!='.' && $file!="..")
        {
            $list .='<li><p> Download file <a href="download.php?file=' . $file .'">'.$file.'</a></p></li>';
            $list .='<li><p> Delete file <a href="deletefile.php?file=' . $file .'">'.$file.'</a></p></li>';
        }
    }
    closedir($handle);
}

?>
<h2>List of Files</h2>
<ul><?php echo $list; ?></ul>
</body>
</html>



