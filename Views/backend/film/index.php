<main class="content__user">
    <header class="header__content-wrap">
        <div class="header__content">
            <div class="header__content-item">
                <h5 class="header__content-title header__content-title-has-separator">Films</h5>
                <span class="content__user-text"><?=$totalFilm;?> Total</span>
            </div>

            <div class="header__content-item">
                <a href="<?=DOMAIN?>/?module=backend&controller=film&action=add" class="header__content-item-btn">Thêm Phim</a>
            </div>
        </div>
    </header>

    

    <div class="content__user-list">
        <div class="user__list-wrap">

            <?php
                // chỉ quản trị viên có thể truy cập trang này
                // if($data_user['status'] != 1){
                //     echo '<div class="alert alert-info">Tài khoản của bạn đã bị khóa vui lòng liên hệ QTV</div>';
                //     exit();
                // }
            ?>
            <div class="user__list-heading">
                <h3 class="user__list-title">Product Management</h3>
                <span class="user__list-text">Product management made easy</span>
            </div>

            <?php
                // $sql_get_products = "SELECT * FROM products ORDER BY id DESC";
                // kiểm tra xem có user nào không
                // if($db->pdo_num_rows($sql_get_products)){
                //     $products_data = $db->pdo_query_all($sql_get_products);
                // }else{
                //     echo '<div class="alert alert-info">Hiện tại chưa có sản phẩm nào</div>';
                //     die();
                // }
            ?>

            <table class="product__list-table">
                <thead>
                    <tr>
                        <th>ID Film</th>
                        <th>Name</th>
                        <th>View</th>
                        <th>Total Episode</th>
                        <th>Year</th>
                        <!-- <th>Image</th> -->
                        <td>Status</td>
                        <th>Actions</th>
                    </tr>
                </thead>

                <?php
                
                    // echo "<pre>";
                    // var_dump($filmData);
                    // echo "</pre>";

                ?>

                <tbody>
                    <?php foreach($filmData as $item): ?>
                    <tr>
                        <td><?=$item[0]?></td>
                        <td>
                            <div class="user__list-img">
                                <img src="
                                    <?php
                                        if($item['poster'] == ''){
                                            echo DOMAIN . '/Public/backend/images/profile.png';
                                        }else{
                                            // echo file_exists($item['productImage']) ? $item['productImage'] : './assets/images/profile.png';
                                            echo $item['poster'];
                                        }
                                    ?>
                                " alt="Ảnh của sản phẩm <?= $item['name']?>" class="user__list-avatar">
                            </div>

                            <div class="user__list-info">
                                <span class="user__list-name"><?=$item['name'];?></span>
                                <span class="user__list-email"><?=$item['real_name'];?></span>
                            </div>
                        </td>
                        <td><?=number_format($item['view']);?> lượt xem</td>
                        <td><?=$item['totalEpisodeCurrent'] . '/' . $item['total_episode'];?></td>
                        <td><?=$item['year'];?></td>
                        <!-- <td>
                            <a href="<?= $item['productImage'];?>" target="_blank" class="product__list-stt-info">Show Image</a>
                        </td> -->
                        <td>
                            <?php
                                if($item['status'] == 0){
                                    echo '<span class="user__list-stt-locked">Ẩn</span>';
                                }else{
                                    echo '<span class="user__list-stt-active">Xuất bản</span>';
                                }
                            ?>
                            
                        </td>
                        <td>
                            <div class="user_list-action">
                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa phim này không?') ? true : false;" href="<?=DOMAIN?>/?module=backend&controller=film&action=delete&id=<?=$item[0];?>" class="user__list-action danger">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                                <a href="<?=DOMAIN?>/?module=backend&controller=film&action=edit&id=<?=$item[0];?>" class="user__list-action info">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?=DOMAIN?>/?module=backend&controller=episode&id=<?=$item[0];?>" class="user__list-action info">
                                    <i class="fas fa-list"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach?>

                </tbody>
            </table>

            <ul class="user__list-pagination">
                <?php if ($currentPage > 1 && $totalPage > 1): ?>
                    <li class="user__list-pagination-item">
                        <a href="<?=DOMAIN?>/?module=backend&controller=film&page=1" class="user__list-pagination-link user__list-pagination-link-first">
                            <i class="fas fa-angle-double-left"></i>
                        </a>
                    </li>
                    <li class="user__list-pagination-item">
                        <a href="<?=DOMAIN?>/?module=backend&controller=film&page=<?=($currentPage - 1);?>" class="user__list-pagination-link user__list-pagination-link-pre">
                            <i class="fas fa-angle-left"></i>
                        </a>
                    </li>
                <?php endif; ?>

                <?php
                    for ($i = 1; $i <= $totalPage; $i++) {
                        if ($currentPage == $i) {
                            echo
                            '
                                <li class="user__list-pagination-item">
                                    <a href="'.DOMAIN.'/?module=backend&controller=film&page='.$i.'" class="user__list-pagination-link user__list-pagination-link--active">'.$i.'</a>
                                </li>
                            ';
                        } else {
                            echo
                            '
                                <li class="user__list-pagination-item">
                                    <a href="'.DOMAIN.'/?module=backend&controller=film&page='.$i.'" class="user__list-pagination-link">'.$i.'</a>
                                </li>
                            ';
                        }
                    }
                ?>

                <?php if ($currentPage < $totalPage && $totalPage > 1): ?>
                <li class="user__list-pagination-item">
                    <a href="<?=DOMAIN?>/?module=backend&controller=film&page=<?=($currentPage + 1);?>" class="user__list-pagination-link user__list-pagination-link-next">
                        <i class="fas fa-angle-right"></i>
                    </a>
                </li>
                <li class="user__list-pagination-item">
                    <a href="<?=DOMAIN?>/?module=backend&controller=film&page=<?=$totalPage;?>" class="user__list-pagination-link user__list-pagination-link-last">
                        <i class="fas fa-angle-double-right"></i>
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</main>