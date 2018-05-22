<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>FileManager</title>
    <link href="<?php echo THEME; ?>css/style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div id="header">
    <h1>File Manager</h1>
    <span id="header_text">Browse the content of directory</span>
</div>
<div id="zip_wrap">
    <div id="dirs_files">
        <h3 align="center">File Content - <?php echo $res_arr['path']; ?></h3>
        <a href="?path=<?php echo $res_arr['old_path']; ?>"><img src="<?php echo THEME; ?>images/back.png"> Back</a><br><br>

        <div class="content_file">
            <pre>
                <?php echo $res_arr['content']; ?>
            </pre>
        </div>
    </div>
    <div id="zip_wrap_end">&nbsp;</div>

</div>

<div id="footer">
    <hr>
    <p>2018 Created by <a href="#"><span class="author">Author</span></a>. All rights reserved</p>
</div>
</body>
</html>