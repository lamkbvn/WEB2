<?php
$sql = "SELECT * FROM product where status = 1";
$totalProducts = $connect->query($sql);
$showProductPerPage = 12;
$page = 1;
echo 'page ban dau' . $page;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    echo '   page now: ' . $page;
}
$from = ($page - 1) * $showProductPerPage;
$listCategory = mysqli_fetch_all($connect->query("select * from category"), MYSQLI_ASSOC);

if (isset($_GET['idCategory'])) {
    $idCategory = $_GET['idCategory'];
    $sql .= " and id_category = $idCategory";
    echo 'cate: ' . $sql;
} else if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    $sql .= " and title like '%" . $_GET['keyword'] . "%'";
    echo '<br>key: ' . $sql;

} else if (isset($_GET['price-min'])) {
    $priceMin = $_GET['price-min'];
    $priceMax = $_GET['price-max'];
    $sql .= " and price >= $priceMin and price <= $priceMax";
    echo '<br>price: ' . $sql;
}
if (isset($_GET['sort'])) {
    $sortOption = $_GET['sort'];
    echo '<br>sort: ' . $sortOption . ": " . $sql;
    switch ($sortOption) {
        case 1:
            break;
        case 2:
            $orderBy = "ORDER BY num_bought desc";
            break;
        case 3:
            $orderBy = "ORDER BY star_feedback desc";
            break;
        case 4:
            $orderBy = "ORDER BY price asc";
            break;
        case 5:
            $orderBy = "ORDER BY price desc";
            break;
    }
}
$totalProductsForCountProductBeforePanigation = $connect->query($sql);
$page = 1;

$sql .= " $orderBy";
$sql .= " limit $from, $showProductPerPage";
echo '<br> Cau lenh sql cuoi cung: ' . $sql;
$totalProducts = $connect->query($sql);
$totalPages = ceil($totalProductsForCountProductBeforePanigation->num_rows / $showProductPerPage);
$result = mysqli_fetch_all($totalProducts, MYSQLI_ASSOC);
?>

<main class="main">
    <div class="filter-row">
        <div class="container">
            <div class="filter-left">
                <div class="all-category category">
                    <span>Tất cả danh mục</span>
                    <!-- <img src="../View/icon/icon-list-bottom.svg" alt="" class="icon-list-bottom" /> -->
                    <svg class="icon-list-bottom" width="13" height="9" viewBox="0 0 13 9" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.3 0L0 1.36364L6.5 9L13 1.36364L11.7 0L6.5 6L1.3 0Z" fill="#212121" />
                    </svg>

                </div>
                <div class="list-category">
                    <?php foreach ($listCategory as $item): ?>
                        <div class="category category-<?= $item['id'] ?>>">
                            <a href="?option=showProduct&idCategory=<?= $item['id'] ?>">
                                <?= $item['name_category'] ?>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="display-selected">
                    <?php foreach ($listCategory as $item): ?>
                        <div class="category checked <?= ($item['id'] != $idCategory) ? "none" : "" ?>">
                            <?= ($item['id'] == $idCategory) ? $item['name_category'] : "" ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="separete-center"></div>
            <div class="filter-right">
                <div class="filter-date-price-group">
                    <div class="all-category category filter-date">
                        <span>Ngày tham gia</span>
                        <img src="../View/icon/icon-list-bottom.svg" alt="" class="icon-list-bottom" />
                    </div>
                    <div class="all-category category filter-price">
                        <span>Lọc theo giá</span>
                        <svg class="icon-list-bottom" width="13" height="9" viewBox="0 0 13 9" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.3 0L0 1.36364L6.5 9L13 1.36364L11.7 0L6.5 6L1.3 0Z" fill="#212121"/>
</svg>

                    </div>
                    <div class="wrapper">
                        <div class="price-input">
                            <div class="field">
                                <span>Min</span>
                                <input type="number" class="input-min" value="0">
                            </div>
                            <div class="separator">-</div>
                            <div class="field">
                                <span>Max</span>
                                <input type="number" class="input-max" value="5000000">
                            </div>
                        </div>
                        <div class="slider">
                            <div class="progress"></div>
                        </div>
                        <form class="range-input" method="get" action="">
                            <input type="range" class="range-min" min="0" max="5000000" value="0" step="100000"
                                name="price-min">
                            <input type="range" class="range-max" min="0" max="5000000" value="5000000" step="100000"
                                name="price-max">
                            <!-- <input type="submit" hidden> -->
                            <div class="row">
                                <span class="btn-clear">Xoá</span>
                                <button class="btn-show-result" type="submit">Xem kết quả</button>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="filter-all">
                    <img src="../View/icon/Filter.svg" alt="" class="icon-filter" />
                    <span>Lọc</span>
                </div>
                <form class="filter-advance" method="get">
                    <div class="icon-kill">
                        <svg width="24" height="24" viewBox="0 0 48 48" fill="none">
                            <path d="M10 10L38 38" stroke="#ffffff" stroke-width="3.6" stroke-linecap="round"></path>
                            <path d="M38 10L10 38" stroke="#ffffff" stroke-width="3.6" stroke-linecap="round"></path>
                        </svg>
                    </div>
                    <div class="filter-header">
                        <div class="title">Lọc</div>
                    </div>
                    <div class="filter-body">
                        <div class="filter-content">
                            <div class="filter-content-wrapper">
                                <div class="filter-content-item">
                                    <h3 class="title">Ngày tham gia</h3>
                                    <div class="item">
                                        <div class="quick-item">
                                            <div class="category">Hôm nay</div>
                                            <div class="category">Ngày mai</div>
                                            <div class="category">Ngày khác</div>
                                        </div>
                                        <div class="select-date"></div>
                                    </div>
                                </div>
                                <div class="filter-content-item">
                                    <h3 class="title">Lọc theo giá</h3>
                                    <div class="wrapper-filter-all">
                                        <div class="price-input-all">
                                            <div class="field-all">
                                                <span>Min</span>
                                                <input type="number" class="input-min-all" value="0">
                                            </div>
                                            <div class="separator-all">-</div>
                                            <div class="field-all">
                                                <span>Max</span>
                                                <input type="number" class="input-max-all" value="5000000">
                                            </div>
                                        </div>
                                        <div class="slider-all">
                                            <div class="progress-all"></div>
                                        </div>
                                        <div class="range-input-all">
                                            <input type="range" class="range-min-all" min="0" max="5000000" value="0"
                                                step="100000" name="price-min">
                                            <input type="range" class="range-max-all" min="0" max="5000000"
                                                value="5000000" step="100000" name="price-max">
                                        </div>
                                    </div>
                                </div>
                                <div class="filter-content-item">
                                    <h3 class="title">Danh mục</h3>
                                    <div class="item">
                                        <div class="quick-item content-wrap">
                                            <?php foreach ($listCategory as $item): ?>
                                                <div class="category category-<?= $item['id'] ?>>">
                                                    <a href="?option=showProduct&idCategory=<?= $item['id'] ?>">
                                                        <?= $item['name_category'] ?>
                                                    </a>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="filter-content-item">
                                    <h3 class="title">Thời lượng</h3>
                                    <div class="item">
                                        <div class="quick-item">
                                            <div class="category">0-3 tiếng</div>
                                            <div class="category">3-5 tiếng</div>
                                            <div class="category">5-7 tiếng</div>
                                            <div class="category">1 ngày</div>
                                            <div class="category">2 ngày trở lên</div>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- <div class="filter-content-item">
                                    <h3 class="title">Giờ khởi hành</h3>
                                    <div class="item">
                                        <div class="quick-item content-wrap">
                                            <div class="category">Sáng sớm (05:00 - 09:00)</div>
                                            <div class="category">Sáng (09:00 - 12:00)</div>
                                            <div class="category">Chiều (12:00 - 16:00)</div>
                                            <div class="category">Đêm (20:00 - 00:00)</div>
                                            <div class="category">Đêm muộn & rạng sáng (00:00 - 05:00)</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="filter-content-item">
                                    <h3 class="title">Ngôn ngữ hướng dẫn</h3>
                                    <div class="item">
                                        <div class="quick-item">
                                            <div class="category">Tiếng Việt</div>
                                            <div class="category">Tiếng Anh</div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="filter-footer">
                        <span class="btn-clear">Xoá</span>
                        <button class="btn-show-result" type="submit">Xem kết quả</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <div class="quantity-sort">
        <div class="container">
            <div class="quantity">
                <?= $totalProductsForCountProductBeforePanigation->num_rows ?> dịch vụ
            </div>
            <div class="sort">
                <span>Sắp xếp theo</span>
                <!-- <div class="list-item">
                        <span>KLook giới thiệu</span>
                        <img src="../View/icon/icon-list-bottom.svg" alt="" />
                    </div> -->
                <img src="../View/icon/icon-list-bottom.svg" alt="" />
                <div class="hide-arrow-default"></div>
                <form id="sortForm" class="form" method="get">
                    <select class="list-item" name="sort" id="sortOption" onchange="sortBy()">
                        <option value="1" <?= (isset($sortOption) && $sortOption == 1) ? 'selected' : '' ?>>Klook giới
                            thiệu</option>
                        <option value="2" <?= (isset($sortOption) && $sortOption == 2) ? 'selected' : '' ?>>Bán chạy
                        </option>
                        <option value="3" <?= (isset($sortOption) && $sortOption == 3) ? 'selected' : '' ?>>Đánh giá
                            cao
                            nhất</option>
                        <option value="4" <?= (isset($sortOption) && $sortOption == 4) ? 'selected' : '' ?>>Giá (từ
                            thấp
                            đến cao)</option>
                        <option value="5" <?= (isset($sortOption) && $sortOption == 5) ? 'selected' : '' ?>>Giá (từ cao
                            đến thấp)</option>
                    </select>
                    <input type="submit" hidden>
                </form>
            </div>
        </div>
    </div>
    <div class="list-product">
        <div class="container">
            <?php foreach ($result as $item): ?>
                <div class="card">
                    <img src="../View/image/tourCheoThuyen.webp" alt="" class="img-product" />
                    <h2 class="name-product">
                        <?= $item['title'] ?>
                    </h2>
                    <div class="row-star">
                        <img src="../View/icon/Star.svg" alt="" class="icon-star" />
                        <span>(
                            <?= $item['star_feedback'] ?>)
                        </span>
                        <div class="dot"></div>
                        <span>
                            <?= $item['num_bought'] ?> đã được đặt
                        </span>
                    </div>
                    <div class="row-toggle">
                        <div class="toggle">
                            <span>Bán chạy</span>
                        </div>
                        <div class="toggle">
                            <span>Xác nhận tức thời</span>
                        </div>
                    </div>
                    <div class="row-price">
                        <span class="price">
                            <?= number_format($item['price'], 0, ',', '.') ?>đ
                        </span>
                        <span class="discount">giảm 42.000đ</span>
                    </div>
                    <div class="row-toggle">
                        <div class="toggle">
                            <span>Chính sách đảm bảo về giá</span>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <div class="page-navigation">
        <ul class="pagination">
            <?php
            // Xây dựng liên kết phân trang với các tham số hiện có
            $queryString = isset($_GET['idCategory']) ? '&idCategory=' . $_GET['idCategory'] : '';
            $queryString .= isset($_GET['price-min']) ? '&price-min=' . $_GET['price-min'] : '';
            $queryString .= isset($_GET['price-max']) ? '&price-max=' . $_GET['price-max'] : '';
            $queryString .= isset($_GET['keyword']) ? '&keyword=' . $_GET['keyword'] : '';
            $queryString .= isset($_GET['sort']) ? '&sort=' . $_GET['sort'] : '';
            ?>
            <li id="prevPage">
                <?php if ($page > 1) {
                    $page = $page - 1;
                }

                ?>
                <a href="?option=showproduct&<?= $queryString ?>&page=<?= $page ?>">
                    <svg width="11" height="17" viewBox="0 0 11 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 1L1 8.5L10 16" stroke="black" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </a>
            </li>
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="<?= ($_GET['page'] == $i || ($page == $i && !isset($_GET['page']))) ? 'active' : '' ?>">
                    <a href="?option=showproduct<?= $queryString ?>&page=<?= $i ?>">
                        <?= $i ?>
                    </a>
                </li>
            <?php endfor; ?>
            <li id="nextPage">
                <?php if ($page <= $totalPages && $page >= 1) {
                    $page = $page + 1;
                } ?>
                <a href="?option=showproduct&<?= $queryString ?>&page=<?= $page ?>">
                    <svg width="11" height="17" viewBox="0 0 11 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L10 8.5L1 16" stroke="black" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </a>
            </li>
        </ul>
    </div>


    <div class="info-path">
        <div class="container">
            <p>Trang chủ > <span class="support-info"> Tour trải nghiệm</span></p>
        </div>
    </div>
    <div class="question">
        <div class="container">
            <h2>Câu hỏi thường gặp về địa điểm phổ biến</h2>
            <div class="list-question">
                <div class="one-question">
                    <div class="container-one-question">
                        <div class="top">
                            <h3 class="title">Klook có bao nhiêu Tour & Trải nghiệm?</h3>
                            <img src="../View/icon/icon-list-bottom.svg" alt="" class="icon-dynamic" />
                        </div>
                        <div class="content">
                            Klook có 13095 Tour & Trải nghiệm tại các địa điểm nổi tiếng
                        </div>
                    </div>
                </div>
                <div class="one-question">
                    <div class="container-one-question">
                        <div class="top">
                            <h3 class="title">Klook có bao nhiêu Tour & Trải nghiệm?</h3>
                            <img src="../View/icon/icon-list-bottom.svg" alt="" class="icon-dynamic" />
                        </div>
                        <div class="content">
                            Top Tour & Trải nghiệm tại các địa điểm nổi tiếng là:
                            1.
                            2.
                            3.
                        </div>
                    </div>
                </div>
                <div class="one-question">
                    <div class="container-one-question">
                        <div class="top">
                            <h3 class="title">
                                Những Tour & Trải nghiệm phổ biến nhất là gì?
                            </h3>
                            <img src="../View/icon/icon-list-bottom.svg" alt="" class="icon-dynamic" />
                        </div>
                        <div class="content">
                            Tour & Trải nghiệm được đánh giá cao tại các địa điểm nổi tiếng là:<br>
                            1.<br>
                            2.<br>
                            3.<br>
                        </div>
                    </div>
                </div>
                <div class="one-question">
                    <div class="container-one-question">
                        <div class="top">
                            <h3 class="title">
                                Những Tour & Trải nghiệm được đánh giá cao là gì?
                            </h3>
                            <img src="../View/icon/icon-list-bottom.svg" alt="" class="icon-dynamic" />
                        </div>
                        <div class="content">
                            Tour & Trải nghiệm có giá hợp lý tại các địa điểm nổi tiếng là:<br>
                            1.<br>
                            2.<br>
                            3.<br>
                        </div>
                    </div>
                </div>
                <div class="one-question">
                    <div class="container-one-question">
                        <div class="top">
                            <h3 class="title">
                                Những Tour & Trải nghiệm được đánh giá cao là gì?
                            </h3>
                            <img src="../View/icon/icon-list-bottom.svg" alt="" class="icon-dynamic" />
                        </div>
                        <div class="content">
                            Tour & Trải nghiệm được đánh giá cao tại các địa điểm nổi tiếng là:<br>
                            1.<br>
                            2.<br>
                            3.<br>
                        </div>
                    </div>
                </div>
                <div class="one-question">
                    <div class="container-one-question">
                        <div class="top">
                            <h3 class="title">Có Tour & Trải nghiệm nào mới nhất?</h3>
                            <img src="../View/icon/icon-list-bottom.svg" alt="" class="icon-dynamic" />
                        </div>
                        <div class="content">
                            Tour & Trải nghiệm mới nhất tại các địa điểm nổi tiếng là:<br>
                            1.<br>
                            2.<br>
                            3.<br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>