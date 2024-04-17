<?php
            session_start();
$conn = new mysqli('localhost', 'root', '', 'web2');
// $recordsPerPage = 5;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$table = isset($_GET['table']) ? $_GET['table'] : 1;

$isEdit = isset($_GET['isEdit']) ? $_GET['isEdit'] : 0;
$isDelete = isset($_GET['isDelete']) ? $_GET['isDelete'] : 0;
$recordsPerPage = isset($_GET['numRow']) ? $_GET['numRow'] : 5;

$startFrom = ($page - 1) * $recordsPerPage;
$sql = "SELECT * FROM $table LIMIT $startFrom, $recordsPerPage";
$data = $conn->query($sql);

// $data = $pagination->getRecords('product', $page, $recordsPerPage);

$sql = "SELECT COUNT(*) AS total FROM $table";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalPages = ceil($row["total"] / $recordsPerPage);

// $totalPagesForTable1 = $pagination->getTotalPages('product', $recordsPerPage);
$htmlTable = "";
switch ($table) {
    case 'product':
        foreach ($data as $value) {
            $idProduct = $value['id'];
            $rowsIMG = $conn->query("select * from image_product");
            $urlIMG = null;
            if ($rowsIMG) {
                foreach ($rowsIMG as $rowIMG) {
                    if ($rowIMG['id_product'] == $idProduct) {
                        $imageData = $rowIMG['image'];
                        $urlIMG = 'data:image/jpeg;base64,' . base64_encode($imageData) . '';
                        break;
                    }
                }
            }
            if ($urlIMG == null) $urlIMG = "images/no_image.gif";
            $htmlTable  .= "<tr class='table-row'>
            <td class='table-cell'><img loading='lazy' src='$urlIMG' alt='Hình ảnh tour' class='image-product-admin' width='80' height='45'></td>
            <td class='table-cell id'>{$value['title']}</td>
            <td class='table-cell'>{$value['price']}</td>
            <td class='table-cell'>{$value['create_at']}</td>
            <td class='table-cell'>{$value['num_bought']}</td>
            <td class='table-cell'>{$value['soLuongConLai']}</td>
            <td class='table-cell status'>{$value['star_feedback']}</td>
            <td class='table-cell elet'>";
            if ($isEdit == 1) {
                $htmlTable .= "<a class='edit-btn table-btn' href='index.php?controller=trang-admin&action=editTour&id={$value['id']}'>Edit</a>";
            }
            if ($isDelete == 1) {
                $htmlTable .= "<a class='delete-btn table-btn' data-delete-url='index.php?controller=trang-admin&action=deleteTour&id={$value['id']}'>Delete</a>";
            }
            $htmlTable .= "</td></tr>";
        }
        break;
    case 'nguoidung':
        foreach ($data as $value) {
            if (isset($_SESSION['objuser']) && isset($_SESSION['idUserLogin']) && $value['id'] != $_SESSION['idUserLogin']) {
                $htmlTable .= "<tr class='table-row'>
                    <td class='table-cell id'>{$value['id']}</td>
                    <td class='table-cell fullname'>{$value['fullname']}</td>
                    <td class='table-cell email'>{$value['email']}</td>
                    <td class='table-cell phone_number'>{$value['phone_number']}</td>
                    <td class='table-cell create_at'>{$value['create_at']}</td>
                    <td class='table-cell diachi'>{$value['address']}</td>
                    <td class='table-cell'>";
        
                if ($isEdit == 1) {
                    $htmlTable .= "<a class='edit-role table-btn' href='index.php?controller=trang-admin&action=editrole&id={$value['id']}'>Role</a>";
                    $htmlTable .= "<a class='edit-btn table-btn' href='index.php?controller=trang-admin&action=edit&id={$value['id']}'>Edit</a>";
        
                    $status = $value['status'];
                    if ($status == 0) {
                        $htmlTable .= "<a class='unban-user table-btn' href='index.php?controller=trang-admin&action=unbanuser&id={$value['id']}'>Unban</a>";
                    } elseif ($status == 1) {
                        $htmlTable .= "<a class='ban-user table-btn' href='index.php?controller=trang-admin&action=banuser&id={$value['id']}'>Ban</a>";
                    }
                }
                if ($isDelete == 1) {
                    $htmlTable .= "<a class='delete-btn table-btn' href='index.php?controller=trang-admin&action=delete&id={$value['id']}'>Delete</a>";
                }
        
                $htmlTable .= "</td></tr>";
            }
        }
        
        break;
        case 'orders':
            $stt=1;
            foreach ($data as $value) {
                $htmlTable .= "<tr class='table-row'>";
                $htmlTable .= "<td class='table-cell'>$stt</td>";
                $htmlTable .= "<td class='table-cell id'>{$value['id']}</td>";
                $htmlTable .= "<td class='table-cell'>{$value['fullname']}</td>";
                $htmlTable .= "<td class='table-cell'>{$value['date_order']}</td>";
                $htmlTable .= "<td class='table-cell'>{$value['total_money']}</td>";
                $htmlTable .= "<td class='table-cell'>";
                switch ($value['status']) {
                    case 1:
                        $htmlTable .= '<span class="status-label wait">chờ xác nhận</span>';
                        break;
                    case 2:
                        $htmlTable .= '<span class="status-label confirmed">đã xác nhận</span>';
                        break;
                    case 3:
                        $htmlTable .= '<span class="status-label in-progress">đang thực hiện tour</span>';
                        break;
                    case 4:
                        $htmlTable .= '<span class="status-label completed">đã hoàn thành</span>';
                        break;
                    case 5:
                        $htmlTable .= '<span class="status-label canceled">đã huỷ bỏ</span>';
                        break;
                    default:
                        $htmlTable .= '<span class="status-label unknown">Unknown status</span>';
                        break;
                }
                $htmlTable .= "</td>";
                $htmlTable .= "<td class='table-cell'>";
                $htmlTable .= "<a class='edit-btn table-btn' href='index.php?controller=trang-admin&action=detailOrder&id={$value['id']}'>Detail</a>";
                if ($isDelete) {
                    $htmlTable .= "<a class='delete-btn table-btn' data-delete-url='index.php?controller=trang-admin&action=deleteOrder&id={$value['id']}'>Delete</a>";
                }
                $htmlTable .= "</td>";
                $htmlTable .= "</tr>";
                $stt++;
            }
            break;
            case 'discount':
                foreach ($data as $voucher) {
                    $htmlTable .= "<tr class='table-row'>";
                    $htmlTable .= "<td class='table-cell id'>{$voucher['id']}</td>";
                    $htmlTable .= "<td class='table-cell discount_name'>{$voucher['discount_name']}</td>";
                    $htmlTable .= "<td class='table-cell code'>{$voucher['code']}</td>";
                    $htmlTable .= "<td class='table-cell percent'>{$voucher['percent']}</td>";
                    $htmlTable .= "<td class='table-cell date_start'>{$voucher['date_start']}</td>";
                    $htmlTable .= "<td class='table-cell date_end'>{$voucher['date_end']}</td>";
                    $htmlTable .= "<td class='table-cell'>";
                    if ($isEdit == 1) {
                        $htmlTable .= "<a class='edit-btn table-btn' href='index.php?controller=trang-admin&action=suavoucher&id={$voucher['id']}'>Edit</a>";
                    }
                    if ($isDelete == 1) {
                        $htmlTable .= "<a class='delete-btn table-btn' data-delete-url='index.php?controller=trang-admin&action=xoavoucher&id={$voucher['id']}'>Delete</a>";
                    }
                    $htmlTable .= "</td>";
                    $htmlTable .= "</tr>";
                }
                break;

    default:
        # code...
        break;
}
$numPaging = "";
$numPaging .= "<span style='border-radius: 5px;display: block; border: solid 1px #000; padding: 5px 8px; margin-right: 6px; cursor: pointer;' class='prevPage' data-page='-1' data-table='$table'>Prev</span>";
for ($i = 1; $i <= $totalPages; $i++) {
    $numPaging .= "<span style='border-radius: 5px;display: block; border: solid 1px #000; padding: 5px 8px; margin-right: 6px; cursor: pointer;' class='pagination' data-page='$i' data-table='$table' >$i</span> ";
}
$numPaging .= "<span style='border-radius: 5px;display: block; border: solid 1px #000; padding: 5px 8px; margin-right: 6px; cursor: pointer;' class='nextPage' data-page='1' data-table='$table'>Next</span>";
// if($totalPages==1)$numPaging="";
$htmlArray = array('table' => $htmlTable, 'paging' => $numPaging);
echo json_encode($htmlArray);
