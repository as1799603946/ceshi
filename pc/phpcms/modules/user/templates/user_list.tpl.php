<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<center>
    <table border="1px" width="400px">
        <tr>
            <td>id</td>
            <td>名字</td>
            <td>密码</td>
        </tr>
        <?php
           foreach($row as $user){
        ?>
            <tr>
                <td><?php echo $user['id'] ?></td>
                <td><?php echo $user['name'] ?></td>
                <td><?php echo $user['password'] ?></td>
            </tr>`
        <?php } ?>


    </table>
</center>
</body>
</html>