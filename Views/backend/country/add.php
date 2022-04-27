<main class="content__user">
    <header class="header__content-wrap">
        <div class="header__content">
            <div class="header__content-item">
                <h5 class="header__content-title header__content-title-has-separator">Country</h5>
                <span class="content__user-text">Add Country</span>
            </div>

            <div class="header__content-item">
                <a href="<?=DOMAIN?>/?module=backend&controller=country" class="header__content-item-btn">DS Quốc gia</a>
            </div>
        </div>
    </header>

    <div class="content__home">
        <div class="content__home-wrap">
            <?php
                
                // chỉ quản trị viên có thể truy cập trang này
                // if($data_user['status'] != 1){
                //     echo '<div class="alert alert-info">Tài khoản của bạn đã bị khóa vui lòng liên hệ QTV</div>';
                //     exit();
                // }else if($data_user['rule'] != 1){
                //     echo '<div class="alert alert-info">Tài khoản của bạn không có quyền truy cập vào trang này</div>';
                //     exit();
                // }
                // var_dump($cateData);
            ?>



            <form action="" class="user__form" id="add_product" method="post">
                <h5 class="user__form-title">Category Details:</h5>

                <div class="form__group">
                    <label for="countryName">Tên Quốc gia</label>
                    <div class="form-control">
                        <input type="text" name="countryName" class="title-to-slug" placeholder="Nhập tên Quốc gia"
                        value="<?= isset($product['countryName']) ? $product['countryName'] : '';?>">
                        <span class="form-message">
                            <?php echo isset($errorMessage['countryName']) ? $errorMessage['countryName'] : '';?>
                        </span>
                    </div>
                </div>

                <div class="form__group">
                    <label for="countrySlug">Slug Quốc gia</label>
                    <div class="form-control">
                        <input type="text" name="countrySlug" autocomplete="off" class="slug-result" placeholder="Click vào đây để tự nhập"
                        value="<?= isset($product['countrySlug']) ? $product['countrySlug'] : '';?>">
                        <span class="form-message">
                            <?php echo isset($errorMessage['countrySlug']) ? $errorMessage['countrySlug'] : '';?>
                        </span>
                    </div>
                </div>

                <?php
                    if(isset($isSuccess) && $isSuccess){
                        echo '<div class="alert alert-success">Thêm Quốc gia thành công</div>';
                    }
                ?>

                <div class="form__group form__btn-submit">
                    <button type="submit" name="add_country">Thêm Quốc gia</button>
                </div>
            </form>
        </div>

    </div>
</main>
<script src="<?=DOMAIN?>/Public/backend/js/script.js"></script>