<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .nameRoleValidation, .validationTableRole{
        display: none;
        color: red;
    }
</style>
<body>
    <form id="formAddRole">
        <div class="Box_name_role">
            <label for="">Tên quyền:</label>
            <input type="text" id="name_role" name="name_role">
            <span class="nameRoleValidation">Dữ liệu không hợp lệ</span>
        </div>
        <div class="box_select_role">
            <label for="">Chọn loại quyền</label>
            <select name="selectRole">
                <?php
                foreach ($rowsRole as $rowRole) {
                    echo "<option value='" . $rowRole['id'] . "'>" . $rowRole['decription'] . "</option>";
                }
                ?>
            </select>
        </div>
        <!-- <input type="hidden" name="id_chucNang" value="<?php // echo $rowCN['id']; ?>"> -->
        <table border="1">
            <tr>
                <th>Bộ phận quản lý</th>
                <th>Xem</th>
                <th>Thêm</th>
                <th>Xóa</th>
                <th>Sửa</th>
            </tr>

            <?php
            // Duyệt qua mỗi bộ phận và tạo hàng trong bảng
            foreach ($rowsCN as $rowCN) {
                $name = $rowCN['decription'];
                $idCN = $rowCN['id'];
                echo "<tr>";
                echo "<input type=\"hidden\" name=\"id_chucNang\" value=\"" . $rowCN['id'] . "\">";
                echo "<td>$name</td>";
                echo "<td><input type='checkbox' name='view[$idCN]'></td>";
                echo "<td><input type='checkbox' name='add[$idCN]'></td>";
                echo "<td><input type='checkbox' name='delete[$idCN]'></td>";
                echo "<td><input type='checkbox' name='edit[$idCN]'></td>";
                echo "</tr>";
            }
            ?>

        </table>
        <span class="validationTableRole">Vui lòng chọn ít nhất một ô</span>
        <button type="button" name="addRole" id="addRole" value="Thêm" onclick="ajaxAddRole()">Thêm</button>
    </form>
    <script>
        function validateFormAddRole() {
            let nameRole = document.getElementById('name_role').value;
            let nameRoleValidation = document.getElementsByClassName('nameRoleValidation')[0];
            let isTrue = true;
            if (nameRole.trim() === '') {
                nameRoleValidation.style.display = 'block';
                isTrue = false;
            } else nameRoleValidation.style.display = 'none';

            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            var checkedCount = 0;
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    checkedCount++;
                }
            }
            let spanTable = document.getElementsByClassName('validationTableRole')[0];
            if (checkedCount === 0) {
                spanTable.style.display = 'block';
                isTrue = false;
            } else spanTable.style.display = 'none';
            return isTrue;
        }

        function ajaxAddRole() {
            if (validateFormAddRole()) {
                var xhr = new XMLHttpRequest();
                var url = "/Controller/Admin/C_addNewRole.php";
                var formData = new FormData(document.getElementById("formAddRole"));

                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            // Xử lý kết quả thành công ở đây nếu cần thiết
                            console.log(xhr.responseText);
                        } else {
                            // Xử lý lỗi nếu cần thiết
                            alert('Error: ' + xhr.status);
                        }
                    }
                }
                console.log(formData);
                // Sử dụng phương thức POST để gửi dữ liệu form
                xhr.open("POST", url+"?addRole='1'", true);
                xhr.send(formData);
            }
        }
    </script>
</body>

</html>