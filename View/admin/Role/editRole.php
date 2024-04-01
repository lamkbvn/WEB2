<style>
    .nameRoleValidation,
    .validationTableRole {
        display: none;
        color: red;
    }

    #formAddRole {
        margin-left: 220px;
        margin-top: 80px;
    }
</style>

<body>
    <form id="formAddRole">
        <div class="Box_name_role">
            <?php
            if (isset($_REQUEST['id'])) {
                $id = $_REQUEST['id'];
            }
            $role = $db->getDataId('role', $id);
            ?>
            <label for="">Tên quyền:</label>
            <input type="text" id="name_role" name="name_role" value='<?php echo $role['decription'] ?>'>
            <span class="nameRoleValidation">Dữ liệu không hợp lệ</span>
            <input type="hidden" name="idRole" value='<?php echo $id ?>'>
        </div>

        <!-- <input type="hidden" name="id_chucNang" value="<?php // echo $rowCN['id']; 
                                                            ?>"> -->
        <table border="1">
            <tr>
                <th>Bộ phận quản lý</th>
                <th>Xem</th>
                <th>Thêm</th>
                <th>Xóa</th>
                <th>Sửa</th>
            </tr>

            <?php
            $rowsCN = $db->getAllData('ChucNang');


            $rowsPQLD = $db->FindRole($id);
            foreach ($rowsCN as $rowCN) {
                $name = $rowCN['decription'];
                $idCN = $rowCN['id'];
                $viewChecked = '';
                $addChecked = '';
                $deleteChecked = '';
                $editChecked = '';
                foreach ($rowsPQLD as $pqld) {
                    if ($pqld['id_chucNang'] === $idCN) {
                        if ($pqld['HD'] === "View") {
                            $viewChecked = 'checked';
                        }elseif ($pqld['HD'] === "Add") {
                            $addChecked = 'checked';
                        }elseif ($pqld['HD'] === "Delete") {
                            $deleteChecked = 'checked';
                        }elseif ($pqld['HD'] === "Edit") {
                            $editChecked = 'checked';
                        }
                    }
                }


                echo "<tr>";
                echo "<td>$name</td>";
                echo "<td><input type='checkbox' name='view[$idCN]' $viewChecked></td>";
                echo "<td><input type='checkbox' name='add[$idCN]' $addChecked></td>";
                echo "<td><input type='checkbox' name='delete[$idCN]' $deleteChecked></td>";
                echo "<td><input type='checkbox' name='edit[$idCN]' $editChecked></td>";
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
                var url = "Controller/trangadmin/Role/C_editRole.php";
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
                xhr.open("POST", url + "?addRole='1'&action=addRole", true);
                xhr.send(formData);
                window.location.href = '/WEB2/index.php?controller=trang-admin&action=role';
            }
        }
    </script>
</body>