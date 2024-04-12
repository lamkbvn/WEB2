<link rel="stylesheet" href="css/cssadmin.css">

<body>
    <style>
        .status-label {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-weight: bold;
        }

        .wait {
            background-color: #ffc107;
            /* yellow */
            color: #fff;
        }

        .confirmed {
            background-color: #28a745;
            /* green */
            color: #fff;
        }

        .in-progress {
            background-color: #007bff;
            /* blue */
            color: #fff;
        }

        .completed {
            background-color: purple;
            color: #fff;
        }

        .canceled {
            background-color: #dc3545;
            /* red */
            color: #fff;
        }

        .unknown {
            background-color: #f8f9fa;
            /* light gray */
            color: #333;
        }

        .form-group-filter-date {
            margin-left: 200px;
        }

        .form-group-filter-date .container-form {
            display: flex;
            gap: 10px;
        }

        .form-group-filter-date input {
            padding: 5px 10px;
            margin-top: 5px;
            margin-bottom: 5px;
        }

        .btn-reset-date {
            text-decoration: underline;
            margin-right: 5px;
            cursor: pointer;
            color: #777;
        }.btn-reset-date:hover {
            color: #333;
        }
        #btn-filter-date {
            margin-top: 5px;
            padding: 5px 8px;
            background-color: #4880ff;
            font-weight: 500;
            outline: none;
            border: none;
            border-radius: 6px;
            color: #fff;
            font-size: 17px;
            cursor: pointer;
        }
        #btn-filter-date:hover {
            background-color: #2f5dc5;
        }
    </style>
    <div class="user--table">
        <h2 class="table--heading">Danh sách đơn hàng</h2>

        <div class="list-feature">
            <div class="filter-container">
                <!-- <select id="filterBy">
                    <option value="all">Tất cả</option>
                    <option value="name">Tên</option>
                    <option value="year">Năm sinh</option>
                </select> -->
                <input type="text" id="filterInput" placeholder="Nhập giá trị cần tìm kiếm...">
                <!-- <button>Lọc</button> -->


                <div class="form-group-filter-date">
                    <div class="container-form">
                        <div class="div">
                            <label for="dateStart">Ngày bắt đầu</label><br>
                            <input type="date" name="dateStart" id="dateStart"><br>
                        </div>
                        <div class="div">
                            <label for="dateEnd">Ngày kết thúc</label><br>
                            <input type="date" name="dateEnd" id="dateEnd">
                        </div>
                    </div>
                    <span class="btn-reset-date" onclick="resetDate()">Xoá</span>
                    <button type="button" id="btn-filter-date" onclick="filterDate()">Lọc theo ngày</button>
                </div>

            </div>

            <!-- <a href="index.php?controller=trang-admin&action=addTour" class="list-feature-item add-user-btn">
                <img src="css/icons/favorites-admin-icon.svg" alt="" class="list-feature-item--icon">
                <p class="nav-admin-item--title">Thêm mới</p>
            </a> -->
        </div>
        <table id="tableData" class="custom-table">
            <thead class="table-head">
                <tr class="table--head">
                    <th>STT</th>
                    <th class="table-header" onclick="sortTable(0)">Mã đơn hàng
                        <img id="sortIcon0" src="images/arrow-point-to-up.png" width="14px">
                    </th>
                    <th class="table-header" onclick="sortTable(1)">Tên người đặt
                        <img id="sortIcon1" src="images/arrow-point-to-up.png" width="14px">
                    </th>
                    <th class="table-header" onclick="sortTable(2)">Thời gian đặt
                        <img id="sortIcon2" src="images/arrow-point-to-up.png" width="14px">
                    </th>
                    <th class="table-header" onclick="sortTable(3)">Tổng giá trị
                        <img id="sortIcon3" src="images/arrow-point-to-up.png" width="14px">
                    </th>
                    <th class="table-header">Trạng thái</th>
                    <th class="table-header">Hành động</th>
                </tr>
            </thead>

            <tbody class="table-body">
                <?php
                $stt = 1;
                foreach ($listOrder as $value) {
                    ?>
                    <tr class="table-row">
                        <td class="table-cell"><?= $stt ?></td>
                        <td class="table-cell id">
                            <?php echo $value['id']; ?>
                        </td>
                        <td class="table-cell">
                            <?php echo $value['fullname']; ?>
                        </td>
                        <td class="table-cell date">
                            <?php echo $value['date_order']; ?>
                        </td>
                        <td class="table-cell">
                            <?php echo number_format($value['total_money'], 0, ',', '.'); ?>
                        </td>
                        <td class="table-cell status">
                            <?php
                            switch ($value['status']) {
                                case 1:
                                    echo '<span class="status-label wait">chờ xác nhận</span>';
                                    break;
                                case 2:
                                    echo '<span class="status-label confirmed">đã xác nhận</span>';
                                    break;
                                case 3:
                                    echo '<span class="status-label in-progress">đang thực hiện tour</span>';
                                    break;
                                case 4:
                                    echo '<span class="status-label completed">đã hoàn thành</span>';
                                    break;
                                case 5:
                                    echo '<span class="status-label canceled">đã huỷ bỏ</span>';
                                    break;
                                default:
                                    echo '<span class="status-label unknown">Unknown status</span>';
                                    break;
                            }
                            ?>
                        </td>


                        <td class="table-cell">

                            <a class="edit-btn table-btn"
                                href="index.php?controller=trang-admin&action=detailOrder&id=<?php echo $value['id']; ?>">Detail</a>

                            <?php
                            $isAdd = 0;
                            $isEdit = 0;
                            $isDelete = 0;
                            foreach ($role as $rowRole) {
                                if ($rowRole['id_chucNang'] == 3) {
                                    switch ($rowRole['HD']) {
                                        case 'Add':
                                            $isAdd = 1;
                                            break;
                                        case 'Edit':
                                            $isEdit = 1;
                                            break;
                                        case 'Delete':
                                            $isDelete = 1;
                                            break;
                                        default:
                                            # code...
                                            break;
                                    }
                                }
                            }

                            if ($isDelete) {
                                //echo "<a class='edit-btn table-btn' href='index.php?controller=trang-admin&action=editOrder&id={$value['id']}'>Edit</a>";
                                echo "<a class='delete-btn table-btn' data-delete-url='index.php?controller=trang-admin&action=deleteOrder&id={$value['id']}'>Delete</a>";
                            }
                            ?>

                        </td>
                    </tr>
                    <?php
                    $stt++;
                }
                ?>
            </tbody>
        </table>
    </div>
    <script>
        // Lấy ô input và bảng dữ liệu
        var input = document.getElementById("filterInput");
        var table = document.getElementById("tableData");
        var btnFilterDate = document.getElementById("btn-filter-date");
        var dateStartEle = document.getElementById("dateStart")
        var dateEndEle = document.getElementById("dateEnd")
        var btnResetDatet = document.querySelector(".btn-reset-date");

        function resetDate() {
            console.log("Đã vào reset Date");
            dateStartEle.value = " "; // Đặt lại giá trị của ô nhập liệu ngày bắt đầu thành rỗng
            dateEndEle.value = " "; // Đặt lại giá trị của ô nhập liệu ngày kết thúc thành rỗng
        }

        function filterDate() {
            let dateStart = dateStartEle.value;
            let dateEnd = dateEndEle.value;
            let rows = table.getElementsByClassName("table-row");
            if(dateStart=="" && dateEnd == "") {
                for (let i = 0; i < rows.length; i++) { 
                    rows[i].style.display = ""; // Hiển thị hàng
                }
                return;
            }

            for (let i = 0; i < rows.length; i++) {
                let date = rows[i].getElementsByClassName("date")[0]; // Sử dụng getElementsByClassName vì không có id duy nhất
                let dateString = date.textContent;
                let rowVisible = false;

                // Chuyển đổi các chuỗi ngày thành đối tượng Date để so sánh
                let rowDate = new Date(dateString);
                let startDate = new Date(dateStart);
                let endDate = new Date(dateEnd);

                // Kiểm tra xem ngày trong khoảng thời gian được chọn không
                if (rowDate >= startDate && rowDate <= endDate) {
                    rowVisible = true;
                }

                // Hiển thị hoặc ẩn hàng dựa trên kết quả kiểm tra ngày
                if (rowVisible) {
                    rows[i].style.display = ""; // Hiển thị hàng
                } else {
                    rows[i].style.display = "none"; // Ẩn hàng
                }
            }
        }
        

        // Lắng nghe sự kiện input trên ô tìm kiếm
        input.addEventListener("input", function () {
            let filter = input.value.toLowerCase(); // Chuyển đổi giá trị nhập vào thành chữ thường để so sánh

            // Lặp qua từng hàng trong tbody
            let rows = table.getElementsByClassName("table-row");
            for (var i = 0; i < rows.length; i++) {
                var cells = rows[i].getElementsByClassName("table-cell"); // Lấy tất cả các ô trong hàng

                var rowVisible = false; // Biến để kiểm tra xem hàng có nên hiển thị hay không

                // Lặp qua tất cả các ô trong hàng
                for (var j = 0; j < cells.length; j++) {
                    var textValue = cells[j].textContent.toLowerCase();
                    console.log(textValue); // Nội dung của ô chuyển thành chữ thường

                    // Nếu nội dung của ô chứa giá trị tìm kiếm, hiển thị hàng và thoát khỏi vòng lặp
                    if (textValue.indexOf(filter) > -1) {
                        rowVisible = true;
                        break;
                    }
                }

                // Hiển thị hoặc ẩn hàng dựa trên kết quả kiểm tra các ô trong hàng
                if (rowVisible) {
                    rows[i].style.display = ""; // Hiển thị hàng
                } else {
                    rows[i].style.display = "none"; // Ẩn hàng
                }
            }
        });


        $(document).ready(function () {
            $('.delete-btn').on('click', function (e) {
                e.preventDefault();
                var deleteUrl = $(this).attr('data-delete-url');
                var rowToDelete = $(this).closest('.table-row');
                var confirmDelete = confirm('Bạn có chắc chắn muốn xóa tour này không?');
                if (confirmDelete) {
                    $.ajax({
                        url: deleteUrl,
                        type: 'GET',
                        success: function (response) {
                            // Xử lý phản hồi thành công (nếu cần)
                            if (rowToDelete.length > 0) { // Kiểm tra nếu rowToDelete tồn tại
                                rowToDelete.hide(); // Ẩn dòng bằng jQuery hide()
                            }
                        },
                        error: function (xhr, status, error) {
                            // Xử lý lỗi (nếu cần)
                        }
                    });
                } else {
                    // Nếu người dùng không đồng ý, không làm gì cả
                }
            });
        });
    </script>
    <script src="js/sapxep.js"></script>
</body>