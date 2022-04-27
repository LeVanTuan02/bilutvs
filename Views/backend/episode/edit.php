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
                // var_dump($episodeData);
            ?>



            <form action="" class="user__form" id="add_product" enctype="multipart/form-data" method="post">
                <h5 class="user__form-title">Film Details:</h5>

                <div class="form__group">
                    <label for="filmName">Tên phim</label>
                    <div class="form-control">
                        <input type="text" disabled name="filmName"
                        value="<?=isset($filmName) ? $filmName : '';?>">
                    </div>
                </div>

                <div class="form__group">
                    <label for="filmEpisode">Tập phim</label>
                    <div class="form-control">
                        <input type="number" name="filmEpisode" placeholder="Nhập tập phim muốn thêm"
                        value="<?= isset($product['filmEpisode']) ? $product['filmEpisode'] : $episodeData['tap'];?>">
                        <span class="form-message">
                            <?php echo isset($errorMessage['filmEpisode']) ? $errorMessage['filmEpisode'] : '';?>
                        </span>
                    </div>
                </div>

                <div class="form__group">
                    <label for="filmPlayer">Link Player</label>
                    <div class="form-control">
                        <div class="form-input">
                            <input type="text" name="filmPlayer" autocomplete="off" id="filmPlayer" placeholder="Nhập link player"
                            value="<?= isset($product['filmPlayer']) ? $product['filmPlayer'] : $episodeData['link_player'];?>">
                            <div class="form-input-icon">
                                <i class="fas fa-plus"></i>
                            </div>
                        </div>
                        <span class="form-message">
                            <?php echo isset($errorMessage['filmPlayer']) ? $errorMessage['filmPlayer'] : '';?>
                        </span>
                    </div>
                </div>

                <?php
                    if(isset($isSuccess) && $isSuccess){
                        echo '<div class="alert alert-success">Thêm tập phim thành công</div>';
                    }
                ?>

                <div class="form__group form__btn-submit">
                    <button type="submit" name="update">Cập nhật tập phim</button>
                </div>
            </form>
        </div>

    </div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?=DOMAIN?>/Public/backend/js/clonehydrax.js"></script>