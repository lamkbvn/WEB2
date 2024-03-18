<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Page Title</title>
    <link rel="stylesheet" href="../../Css/admin/style.css" />

</head>

<body>
    <div class="container">

        <div class="account-settings">
            <h2>Danh Sách Tài Khoản</h2>
            <form>
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Id</th>
                            <th>Nội dung</th>
                            <th>Id_user</th>
                            <th>Id_pro</th>
                            <th>Ngày bình luận</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        include ("../../Controller/admin/index.php");

                            foreach ($listbinhluan as $binhluan) {
                                extract($binhluan);
                                $suabl = "index.php?action=suabl&id=" . $id;
                                $xoabl = "index.php?action=xoabl&id=" . $id;

                                echo '<tr>
                                    <td><input type="checkbox" /></td>
                                    <td>$id</td>
                                    <td>$note</td>
                                    <td>$user_id</td>
                                    <td>$product_id</td>
                                    <td>$create_at</td>
                                    <td>
                                        <a href="'.$suabl.'"><input type="button" value="Sửa"></a>
                                        <a href="'.$xoabl.'"> <input type="button" value="Xóa"></a>
                                    </td>
                                </tr>';
                            }
                        
?>


                    </tbody>
                </table>
                <button type="button" value="Chọn tất cả"></button>
                <button type="button" value="Bỏ chọn tất cả"></button>
                <button type="button" value="Xóa tất cả"></button>

            </form>
        </div>
    </div>
</body>

</html>