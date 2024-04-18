<link rel="stylesheet" href="css/cssadmin.css">

<body>
	<div class="trangchuadmin">
		<div class="trangchuadmin--inner">
			<div class="trangchuadmin--total-list">
				<div class="trangchuadmin--total-item blue">
					<div class="trangchuadmin--total-item__row">
						<div class="trangchuadmin--total-item__info">
							<h2 class="trangchuadmin--total-item__heading">Khách hàng</h2>
							<p class="trangchuadmin--total-item__number"><?php echo $soLuongKH; ?></p>
						</div>
						<img src="css/icons/total-item-01.svg" alt="" class="trangchuadmin--total-item__icon">
					</div>
					<div class="trangchuadmin--total-item__percent">
						<?php
						if ($soLuongKHPercent > 0) {
							echo '<img src="css/icons/total-item-increse.svg" alt="" class="trangchuadmin--total__percent-img">';
						} else if ($soLuongKHPercent < 0) {
							echo '<img src="css/icons/total-item-decrease.svg" alt="" class="trangchuadmin--total__percent-img">';
						} else {
							echo '<img src="css/icons/math-almost-equal-to-svgrepo-com (2).svg" alt="" class="trangchuadmin--total__percent-img-a">';
						}
						?>
						<div class="trangchuadmin--total__percent-number" id="percentKH">
							<?php echo $soLuongKHPercent; ?>%
						</div>
						<p class="trangchuadmin--total__percent-desc">from yesterday</p>
					</div>
				</div>
				<div class="trangchuadmin--total-item yellow">
					<div class="trangchuadmin--total-item__row">
						<div class="trangchuadmin--total-item__info">
							<h2 class="trangchuadmin--total-item__heading">Sản phẩm</h2>
							<p class="trangchuadmin--total-item__number"><?php echo $soLuongSP; ?></p>
						</div>
						<img src="css/icons/total-item-02.svg" alt="" class="trangchuadmin--total-item__icon">
					</div>
					<div class="trangchuadmin--total-item__percent">
						<?php
						if ($soLuongSPPercent > 0) {
							echo '<img src="css/icons/total-item-increse.svg" alt="" class="trangchuadmin--total__percent-img">';
						} else if ($soLuongSPPercent < 0) {
							echo '<img src="css/icons/total-item-decrease.svg" alt="" class="trangchuadmin--total__percent-img">';
						} else {
							echo '<img src="css/icons/math-almost-equal-to-svgrepo-com (2).svg" alt="" class="trangchuadmin--total__percent-img-a">';
						}
						?>
						<div class="trangchuadmin--total__percent-number" id="percentSP">
							<?php
							if ($soLuongSPPercent < 0)
								echo $soLuongSPPercent * -1;
							else echo $soLuongSPPercent; ?>%
						</div>
						<p class="trangchuadmin--total__percent-desc">from yesterday</p>
					</div>
				</div>
				<div class="trangchuadmin--total-item green">
					<div class="trangchuadmin--total-item__row">
						<div class="trangchuadmin--total-item__info">
							<h2 class="trangchuadmin--total-item__heading">Đặt hàng</h2>
							<p class="trangchuadmin--total-item__number"><?php echo $soLuongDH; ?></p>
						</div>
						<img src="css/icons/total-item-03.svg" alt="" class="trangchuadmin--total-item__icon">
					</div>
					<div class="trangchuadmin--total-item__percent">
						<?php
						if ($soLuongDHPercent > 0) {
							echo '<img src="css/icons/total-item-increse.svg" alt="" class="trangchuadmin--total__percent-img">';
						} else if ($soLuongDHPercent < 0) {
							echo '<img src="css/icons/total-item-decrease.svg" alt="" class="trangchuadmin--total__percent-img">';
						} else {
							echo '<img src="css/icons/math-almost-equal-to-svgrepo-com (2).svg" alt="" class="trangchuadmin--total__percent-img-a">';
						}
						?>
						<div class="trangchuadmin--total__percent-number" id="percentDH">
							<?php
							if ($soLuongDHPercent < 0)
								echo $soLuongDHPercent * -1;
							else echo $soLuongDHPercent; ?>%
						</div>
						<p class="trangchuadmin--total__percent-desc">from yesterday</p>
					</div>
				</div>
				<div class="trangchuadmin--total-item brown">
					<div class="trangchuadmin--total-item__row">
						<div class="trangchuadmin--total-item__info">
							<h2 class="trangchuadmin--total-item__heading">Feedback</h2>
							<p class="trangchuadmin--total-item__number"><?php echo $soLuongFB; ?></p>
						</div>
						<img src="css/icons/total-item-04.svg" alt="" class="trangchuadmin--total-item__icon">
					</div>
					<div class="trangchuadmin--total-item__percent">
						<?php
						if ($soLuongFBPercent > 0) {
							echo '<img src="css/icons/total-item-increse.svg" alt="" class="trangchuadmin--total__percent-img">';
						} else if ($soLuongFBPercent < 0) {
							echo '<img src="css/icons/total-item-decrease.svg" alt="" class="trangchuadmin--total__percent-img">';
						} else {
							echo '<img src="css/icons/math-almost-equal-to-svgrepo-com (2).svg" alt="" class="trangchuadmin--total__percent-img-a
								">';
						}
						?>
						<div class="trangchuadmin--total__percent-number" id="percentFB">
							<?php
							if ($soLuongFBPercent < 0)
								echo $soLuongFBPercent * -1;
							else echo $soLuongFBPercent; ?>%
						</div>
						<p class="trangchuadmin--total__percent-desc">from yesterday</p>
					</div>
				</div>
			</div>
			<div class="banthan">
				<img src="css/icons/maxresdefault.jpg" alt="" class="jack">
				<img src="css/icons/k-7391.jpg" alt="" class="kicm">
			</div>
		</div>
	</div>
</body>
<script>
	// Lấy phần tử có id là "percentNumber"
	var percentKH = document.getElementById("percentKH");
	var soLuongKHPercent = <?php echo $soLuongKHPercent; ?>;

	var percentSP = document.getElementById("percentSP");
	var soLuongSPPercent = <?php echo $soLuongSPPercent; ?>;

	var percentDH = document.getElementById("percentDH");
	var soLuongDHPercent = <?php echo $soLuongDHPercent; ?>;

	var percentFB = document.getElementById("percentFB");
	var soLuongFBPercent = <?php echo $soLuongFBPercent; ?>;

	function checkPercent(percent, soluong) {
		if (soluong > 0) {
			percent.classList.add("success");
		} else if (soluong < 0) {
			percent.classList.add("error");
		} else {
			percent.classList.add("warning");
		}
	}

	checkPercent(percentKH, soLuongKHPercent);
	checkPercent(percentSP, soLuongSPPercent);
	checkPercent(percentDH, soLuongDHPercent);
	checkPercent(percentFB, soLuongFBPercent);
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
	$(document).ready(function() {
		$('.trangchuadmin--total-list').find('.trangchuadmin--total-item__number').each(function() {
			$(this).prop('Counter', 0).animate({
				Counter: $(this).text()
			}, {
				duration: 2000, // Thời gian chạy hiệu ứng (milliseconds)
				easing: 'swing',
				step: function(now) {
					$(this).text(Math.ceil(now)); // Hiển thị số nguyên gần nhất
				}
			});
		});
	});
</script>