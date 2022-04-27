<main class="content__user">
    <header class="header__content-wrap">
        <div class="header__content">
            <div class="header__content-item">
                <h5 class="header__content-title header__content-title-has-separator">Films</h5>
                <span class="content__user-text">Add Films</span>
            </div>

            <div class="header__content-item">
                <a href="<?=DOMAIN?>/?module=backend&controller=film" class="header__content-item-btn">List Film</a>
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
            ?>

            <?php
                
            ?>
            <form action="" class="user__form" id="add_product" enctype="multipart/form-data" method="post">
                <h5 class="user__form-title">Film Details:</h5>

                <div class="form__group">
                    <label for="filmName">Tên phim</label>
                    <div class="form-control">
                        <input type="text" name="filmName" class="title-to-slug" placeholder="VD: Dữ quân ca"
                        value="<?= isset($product['filmName']) ? $product['filmName'] : '';?>">
                        <span class="form-message">
                            <?php echo isset($errorMessage['filmName']) ? $errorMessage['filmName'] : '';?>
                        </span>
                    </div>
                </div>

                <div class="form__group">
                    <label for="filmRealName">Tên khác</label>
                    <div class="form-control">
                        <input type="text" name="filmRealName" class="title-to-slug" placeholder="VD: Dữ quân ca"
                        value="<?= isset($product['filmRealName']) ? $product['filmRealName'] : '';?>">
                        <span class="form-message">
                            <?php echo isset($errorMessage['filmRealName']) ? $errorMessage['filmRealName'] : '';?>
                        </span>
                    </div>
                </div>

                <div class="form__group">
                    <label for="filmLink">Link phim</label>
                    <div class="form-control">
                        <input type="text" name="filmLink" class="slug-result" placeholder="Click vào đây để tạo link phim"
                        value="<?= isset($product['filmLink']) ? $product['filmLink'] : '';?>">
                        <span class="form-message">
                            <?php echo isset($errorMessage['filmLink']) ? $errorMessage['filmLink'] : '';?>
                        </span>
                    </div>
                </div>

                <div class="form__group">
                    <label for="filmPoster">Link Poster</label>
                    <div class="form-control">
                        <input type="text" name="filmPoster" placeholder="Nhập link poster"
                        value="<?= isset($product['filmPoster']) ? $product['filmPoster'] : '';?>">
                        <span class="form-message">
                            <?php echo isset($errorMessage['filmPoster']) ? $errorMessage['filmPoster'] : '';?>
                        </span>
                    </div>
                </div>

                <div class="form__group">
                    <label for="filmThumbnail">Link Thumbnail</label>
                    <div class="form-control">
                        <input type="text" name="filmThumbnail" placeholder="Nhập link thumbnail"
                        value="<?= isset($product['filmThumbnail']) ? $product['filmThumbnail'] : '';?>">
                        <span class="form-message">
                            <?php echo isset($errorMessage['filmThumbnail']) ? $errorMessage['filmThumbnail'] : '';?>
                        </span>
                    </div>
                </div>

                <div class="form__group">
                    <label for="filmTotalEpisode">Tổng số tập</label>
                    <div class="form-control">
                        <input type="number" name="filmTotalEpisode" min="1" placeholder="Nhập tổng số tập"
                        value="<?= isset($product['filmTotalEpisode']) ? $product['filmTotalEpisode'] : '';?>">
                        <span class="form-message">
                            <?php echo isset($errorMessage['filmTotalEpisode']) ? $errorMessage['filmTotalEpisode'] : '';?>
                        </span>
                    </div>
                </div>

                <div class="form__group">
                    <label for="filmYear">Năm phát hành</label>
                    <div class="form-control">
                        <select name="filmYear">
                            <option value="">-- Vui lòng chọn năm phát hành --</option>
                            <?php foreach(range(date('Y',), 1905) as $year):?>

                            <?php if(isset($product['filmYear']) && $product['filmYear'] == $year): ?>
                                <option value="<?=$year;?>" selected><?=$year;?></option>
                            <?php else: ?>
                                <option value="<?=$year;?>"><?=$year;?></option>
                            <?php endif;?>

                            <?php endforeach;?>
                        </select>

                        <span class="form-message">
                            <?php echo isset($errorMessage['filmYear']) ? $errorMessage['filmYear'] : '';?>
                        </span>
                    </div>
                </div>

                <div class="form__group">
                    <label for="filmNational">Quốc Gia</label>
                    <div class="form-control">

                        <select name="filmNational">
                            <option value="">-- Chọn Quốc gia --</option>
                            <?php foreach($countryList as $nation):?>

                            <?php if(isset($product['filmNational']) && $product['filmNational'] === $nation['id']): ?>
                                <option value="<?=$nation['id'];?>" selected><?=$nation['nation_name'];?></option>
                            <?php else: ?>
                                <option value="<?=$nation['id'];?>"><?=$nation['nation_name'];?></option>
                            <?php endif;?>

                            <?php endforeach;?>
                        </select>

                        <span class="form-message">
                            <?php echo isset($errorMessage['filmNational']) ? $errorMessage['filmNational'] : '';?>
                        </span>
                    </div>
                </div>

                <div class="form__group">
                    <label for="filmCate">Thể loại</label>
                    <div class="form-control">
                    
                        <select name="filmCate">
                            <option value="">-- Chọn thể loại --</option>
                            <?php foreach($cateList as $cate):?>

                            <?php if(isset($product['filmCate']) && $product['filmCate'] === $cate['id']): ?>
                                <option value="<?=$cate['id'];?>" selected><?=$cate['cate_name'];?></option>
                            <?php else: ?>
                                <option value="<?=$cate['id'];?>"><?=$cate['cate_name'];?></option>
                            <?php endif;?>

                            <?php endforeach;?>
                        </select>

                        <span class="form-message">
                            <?php echo isset($errorMessage['filmCate']) ? $errorMessage['filmCate'] : '';?>
                        </span>
                    </div>
                </div>

                <div class="form__group">
                    <label for="filmType">Loại phim</label>
                    <div class="form-control">
                    
                        <select name="filmType">
                            <option value="">-- Chọn loại phim --</option>
                            <?php foreach($typeList as $type):?>

                            <?php if(isset($product['filmType']) && $product['filmType'] === $type['id']): ?>
                                <option value="<?=$type['id'];?>" selected><?=$type['type_name'];?></option>
                            <?php else: ?>
                                <option value="<?=$type['id'];?>"><?=$type['type_name'];?></option>
                            <?php endif;?>

                            <?php endforeach;?>
                        </select>

                        <span class="form-message">
                            <?php echo isset($errorMessage['filmType']) ? $errorMessage['filmType'] : '';?>
                        </span>
                    </div>
                </div>

                <div class="form__group">
                    <label for="filmDesc">Mô tả</label>
                    <div class="form-control">
                        <textarea name="filmDesc" rows="8" placeholder="Nhập mô tả"><?= isset($product['filmDesc']) ? $product['filmDesc'] : '';?></textarea>
                        <span class="form-message">
                            <?php echo isset($errorMessage['filmDesc']) ? $errorMessage['filmDesc'] : '';?>
                        </span>
                    </div>
                </div>

                <?php
                    if(isset($isSuccess) && $isSuccess){
                        echo '<div class="alert alert-success">Thêm phim thành công</div>';
                    }
                ?>

                <div class="form__group form__btn-submit">
                    <button type="submit" name="add_product">Thêm phim</button>
                </div>
            </form>
        </div>

    </div>
</main>
<script src="<?=DOMAIN?>/Public/backend/js/script.js"></script>