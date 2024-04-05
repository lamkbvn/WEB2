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
    </style>
    <div class="user--table">
        <h2 class="table--heading">Danh sách đơn hàng</h2>

        <div class="list-feature">
            <div class="filter-container">
                <select id="filterBy">
                    <option value="all">Tất cả</option>
                    <option value="name">Tên</option>
                    <option value="year">Năm sinh</option>
                </select>
                <input type="text" id="filterInput" placeholder="Nhập giá trị...">
                <button>Lọc</button>
            </div>

            <a href="index.php?controller=trang-admin&action=addTour" class="list-feature-item add-user-btn">
                <img src="css/icons/favorites-admin-icon.svg" alt="" class="list-feature-item--icon">
                <p class="nav-admin-item--title">Thêm mới</p>
            </a>
        </div>
        <table id="tableData" class="custom-table">
            <thead class="table-head">
                <tr class="table--head">
                    <th class="table-header">Mã đơn hàng</th>
                    <th class="table-header">Tên người đặt</th>
                    <th class="table-header">Thời gian đặt</th>
                    <th class="table-header">Tổng giá trị</th>
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
                        <td class="table-cell id">
                            <?php echo $value['id']; ?>
                        </td>
                        <td class="table-cell">
                            <?php echo $value['fullname']; ?>
                        </td>
                        <td class="table-cell">
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
                            <a class="delete-btn table-btn"
                                href="index.php?controller=trang-admin&action=deleteOrder&id=<?php echo $value['id']; ?>">Delete</a>
                        </td>
                    </tr>
                    <?php
                    $stt++;
                }
                ?>
            </tbody>
        </table>
    </div>
</body>