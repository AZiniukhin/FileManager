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
        <h3 align="center">Directory Content</h3>
        <table id="my_table">
            <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Size</th>
            </tr>
            </thead>
            <tr>
                <td align="center">
                    <a href="?do=main&path=<?php echo $res_arr['old_path']; ?>"><img
                                src="<?php echo THEME; ?>images/back.png"></a>
                </td>
                <td align="center">
                    <a href="?do=title&path_min=<?php echo $res_arr['path']; ?>"><img
                                src="<?php echo THEME; ?>images/up.png"></a>
                    <a href="?do=title&path_max=<?php echo $res_arr['path']; ?>"><img
                                src="<?php echo THEME; ?>images/down.png"></a>
                </td>
                <td>
                    <a href="?do=reverse&path_min=<?php echo $res_arr['path']; ?>"><img
                                src="<?php echo THEME; ?>images/up.png" align="left"></a>
                    <a href="?do=reverse&path_max=<?php echo $res_arr['path']; ?>"><img
                                src="<?php echo THEME; ?>images/down.png" align="right"></a>
                </td>
            </tr>

            <!--Выводим папки-->

            <?php if ($res_arr['dirs']) {
                foreach ($res_arr['dirs'] as $my_dir => $val_dir) {
                    echo "<tr>";
                    echo "<td></td>";
                    echo "<td><img src='" . THEME . "images/dir2.png' align='left'><a href='?do=main&path=" . $val_dir . "' >" . $my_dir . "</a> </td>";
                    echo "<td align='center'>-</td>";
                    echo "</tr>";
                }

            } ?>

            <!--Выводим файлы-->

            <?php if ($res_arr['files']) {
                foreach ($res_arr['files'] as $my_file => $val_file) {
                    echo "<tr>";
                    echo "<td></td>";
                    if (isset($val_file['type'])) {
                        if ($val_file['type'] == 'text') {
                            echo "<td><a href='?do=view&path=" . $res_arr['path'] . $my_file . "'><img src='" . THEME . "images/file.png' align='left'>" . $my_file . "</a></td>";
                        } elseif ($val_file['type'] == 'img') {
                            echo "<td><a href='" . $res_arr['path'] . $my_file . "' ><img style='width:50px' src='" . $res_arr['path'] . $my_file . "' align='middle'></a>" . $my_file . "</td>";
                        } else {
                            echo "<td><img src='" . THEME . "images/file.png' align='left'>" . $my_file . "</td>";
                        }
                    }


                    echo "<td align='center'>" . $val_file['size'] . "</td>";
                    echo "</tr>";
                }

            } ?>

            <tbody>
            </tbody>
        </table>
    </div>
    <div id="zip_wrap_end">&nbsp;</div>

</div>

<div id="footer">
    <hr>

</div>
</body>
</html>