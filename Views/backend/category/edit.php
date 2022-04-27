<main class="content__user">
    <header class="header__content-wrap">
        <div class="header__content">
            <div class="header__content-item">
                <h5 class="header__content-title header__content-title-has-separator">Product</h5>
                <span class="content__user-text">Add Product</span>
            </div>

            <div class="header__content-item">
                <a href="<?=DOMAIN?>/?module=backend&controller=film" class="header__content-item-btn">DS Phim</a>
                <a href="<?=DOMAIN?>/?module=backend&controller=episode&id=<?=$idFilm;?>" class="header__content-item-btn">DS tập</a>
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
                    <label for="cateTitle">Tên danh mục</label>
                    <div class="form-control">
                        <input type="text" name="cateTitle" class="title-to-slug" placeholder="Nhập tên danh mục"
                        value="<?= isset($product['cateTitle']) ? $product['cateTitle'] : $cateData['cate_name'];?>">
                        <span class="form-message">
                            <?php echo isset($errorMessage['cateTitle']) ? $errorMessage['cateTitle'] : '';?>
                        </span>
                    </div>
                </div>

                <div class="form__group">
                    <label for="cateSlug">Slug danh mục</label>
                    <div class="form-control">
                        <input type="text" name="cateSlug" autocomplete="off" class="slug-result" placeholder="Click vào đây để tự nhập"
                        value="<?= isset($product['cateSlug']) ? $product['cateSlug'] : $cateData['slug'];?>">
                        <span class="form-message">
                            <?php echo isset($errorMessage['cateSlug']) ? $errorMessage['cateSlug'] : '';?>
                        </span>
                    </div>
                </div>

                <div class="form__group form__btn-submit">
                    <button type="submit" name="edit_cate">Cập nhật danh mục</button>
                </div>
            </form>
        </div>

    </div>
</main>
<script src="<?=DOMAIN?>/Public/backend/js/script.js"></script>