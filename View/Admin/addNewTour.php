<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .valiFormAddTour {
        display: none;
        color: red;
    }

    #ImgValidation1, #ImgValidation2, #ImgValidation3 {
        display: none;
        color: red;
    }
</style>

<body>
    <form id="formAddTour" action="C_addNewTour.php" method="post" enctype="multipart/form-data">
        <div class="containFieldAddTour">
            <label for="title">Tiêu đề</label> <br>
            <input id="title" name="title" type="text">
            <span class="valiFormAddTour" id="titleValidation">Tiêu đề không hợp lệ</span>
        </div>
        <div class="containFieldAddTour">
            <label for="selectCate">Loại</label> <br>
            <select name="category" id="selectCate">
                <?php
                foreach ($rowsCate as $rowCate) {
                    echo "<option name='selectCate' value='" . $rowCate['id'] . "'>" . $rowCate['name_category'] . "</option>";
                }
                ?>
            </select>
            <span class="valiFormAddTour" id="categoryValidation">Vui lòng chọn trường này</span>
        </div>
        <div class="containFieldAddTour">
            <label for="selectProvin">Tỉnh thành</label> <br>
            <select name="provincial" id="selectProvin">
                <?php
                foreach ($rowsProvin as $rowProvin) {
                    echo "<option name='selectRole' value='" . $rowProvin['id'] . "'>" . $rowProvin['name_procince'] . "</option>";
                }
                ?>
            </select>
            <span class="valiFormAddTour" id="provincialValidation">Vui lòng chọn trường này</span>
        </div>
        <div class="containFieldAddTour">
            <label for="price">Giá</label> <br>
            <input name="price" type="number">
            <span class="valiFormAddTour" id="priceValidation">Dữ liệu không hợp lệ</span>
        </div>
        <div class="containFieldAddTour">
            <label for="acount">Số lượng</label> <br>
            <input name="acount" type="number">
            <span class="valiFormAddTour" id="acountValidation">Dữ liệu không hợp lệ</span>
        </div>
        <div class="containFieldAddTour">
            <label for="content">Nội dung</label> <br>
            <input name="content" type="text">
            <span class="valiFormAddTour" id="contentValidation">Dữ liệu không hợp lệ</span>
        </div>
        <div class="containFieldAddTour">
            <label for="address">Địa chỉ</label> <br>
            <input name="address" type="text">
            <span class="valiFormAddTour" id="addressValidation">Dữ liệu không hợp lệ</span>
        </div>
        <div class="containFieldAddTour">
            <label for="">Chọn ảnh</label> <br>
            <div class="box-up-img">
                <input type="file" name="img1" id="img1"> <br>
                <span id="ImgValidation1">Dữ liệu không hợp lệ</span><br>
                <input type="file" name="img2" id="img2"><br>
                <span id="ImgValidation2">Dữ liệu không hợp lệ</span><br>
                <input type="file" name="img3" id="img3"><br>
                <span id="ImgValidation3">Dữ liệu không hợp lệ</span><br>
            </div>
            
        </div>
        <button type="submit" name="btnAddTour" id="btnAddTour" value="Thêm">Thêm</button>
    </form>
    <script>
        var formAddTour = document.getElementById('formAddTour');
        var title = document.getElementById('title');
        var selectCate = document.getElementById('selectCate');
        var selectProvin = document.getElementById('selectProvin');
        var price = document.getElementsByName('price')[0];
        var acount = document.getElementsByName('acount')[0];
        var content = document.getElementsByName('content')[0];
        var address = document.getElementsByName('address')[0];
        var img1 = document.getElementsByName('img1')[0];
        var img2 = document.getElementsByName('img2')[0];
        var img3 = document.getElementsByName('img3')[0];

        document.getElementById('btnAddTour').addEventListener('click', function(e) {


            // Validation
            var isValid = true;

            if (title.value.trim() === '') {
                e.preventDefault();
                document.getElementById('titleValidation').style.display = 'block';
                isValid = false;
            } else {
                document.getElementById('titleValidation').style.display = 'none';
            }

            if (selectCate.value.trim() === '') {
                e.preventDefault();
                document.getElementById('categoryValidation').style.display = 'block';
                isValid = false;
            } else {
                document.getElementById('categoryValidation').style.display = 'none';
            }

            if (selectProvin.value.trim() === '') {
                e.preventDefault();
                document.getElementById('provincialValidation').style.display = 'block';
                isValid = false;
            } else {
                document.getElementById('provincialValidation').style.display = 'none';
            }

            if (price.value.trim() === '') {
                e.preventDefault();
                document.getElementById('priceValidation').style.display = 'block';
                isValid = false;
            } else {
                document.getElementById('priceValidation').style.display = 'none';
            }

            if (acount.value.trim() === '') {
                e.preventDefault();
                document.getElementById('acountValidation').style.display = 'block';
                isValid = false;
            } else {
                document.getElementById('acountValidation').style.display = 'none';
            }

            if (content.value.trim() === '') {
                e.preventDefault();
                document.getElementById('contentValidation').style.display = 'block';
                isValid = false;
            } else {
                document.getElementById('contentValidation').style.display = 'none';
            }

            if (address.value.trim() === '') {
                e.preventDefault();
                document.getElementById('addressValidation').style.display = 'block';
                isValid = false;
            } else {
                document.getElementById('addressValidation').style.display = 'none';
            }

            //img1
            var fileInput = document.getElementById('img1');
            if (fileInput.files.length > 0) {
                var file = fileInput.files[0];
                var reader = new FileReader();
                reader.onload = function() {
                    var imageType = /image.*/;
                    if (file.type.match(imageType)) {
                        document.getElementById('ImgValidation1').style.display = 'none';
                    } else {
                        e.preventDefault();
                        document.getElementById('ImgValidation1').style.display = 'block';
                        fileInput.value = '';
                    }
                };
                reader.readAsDataURL(file);
            }
            //img2
            var fileInput = document.getElementById('img2');
            if (fileInput.files.length > 0) {
                var file = fileInput.files[0];
                var reader = new FileReader();
                reader.onload = function() {
                    var imageType = /image.*/;
                    if (file.type.match(imageType)) {
                        document.getElementById('ImgValidation2').style.display = 'none';
                    } else {
                        e.preventDefault();
                        document.getElementById('ImgValidation2').style.display = 'block';
                        fileInput.value = '';
                    }
                };
                reader.readAsDataURL(file);
            }
            //img3
            var fileInput = document.getElementById('img3');
            if (fileInput.files.length > 0) {
                var file = fileInput.files[0];
                var reader = new FileReader();
                reader.onload = function() {
                    var imageType = /image.*/;
                    if (file.type.match(imageType)) {
                        document.getElementById('ImgValidation3').style.display = 'none';
                    } else {
                        e.preventDefault();
                        document.getElementById('ImgValidation3').style.display = 'block';
                        fileInput.value = '';
                    }
                };
                reader.readAsDataURL(file);
            }
        });

        
    </script>
</body>

</html>