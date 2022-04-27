<main class="content__user">
    <header class="header__content-wrap">
        <div class="header__content">
            <div class="header__content-item">
                <h5 class="header__content-title header__content-title-has-separator">Danh mục</h5>
                <span class="content__user-text"><?=$totalCate;?> Total</span>
            </div>

            <div class="header__content-item">
                <a href="<?=DOMAIN?>/?module=backend&controller=category&action=add" class="header__content-item-btn">Thêm danh mục</a>
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
                        <th>ID Cate</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <?php
                
                    // echo "<pre>";
                    // var_dump($cateList);
                    // echo "</pre>";

                ?>

                <tbody>
                    <?php foreach($cateList as $item): ?>
                    <tr>
                        <td><?=$item['id']?></td>
                        <td><?=$item['cate_name']?></td>
                        <td><?=$item['slug'];?></td>
                        
                        <td>
                            <div class="user_list-action">
                                <a href="" class="user__list-action danger" data-id="<?=$item['id'];?>">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                                <!-- <a onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này không?') ? true : false;" href="<?=DOMAIN?>/?module=backend&controller=category&action=delete&id=<?=$item['id'];?>" class="user__list-action danger">
                                    <i class="far fa-trash-alt"></i>
                                </a> -->
                                <a href="<?=DOMAIN?>/?module=backend&controller=category&action=edit&id=<?=$item['id'];?>" class="user__list-action info">
                                    <i class="fas fa-edit"></i>
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
                        <a href="<?=DOMAIN?>/?module=backend&controller=category&page=1" class="user__list-pagination-link user__list-pagination-link-first">
                            <i class="fas fa-angle-double-left"></i>
                        </a>
                    </li>
                    <li class="user__list-pagination-item">
                        <a href="<?=DOMAIN?>/?module=backend&controller=category&page=<?=($currentPage - 1);?>" class="user__list-pagination-link user__list-pagination-link-pre">
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
                                    <a href="'.DOMAIN.'/?module=backend&controller=category&page='.$i.'" class="user__list-pagination-link user__list-pagination-link--active">'.$i.'</a>
                                </li>
                            ';
                        } else {
                            echo
                            '
                                <li class="user__list-pagination-item">
                                    <a href="'.DOMAIN.'/?module=backend&controller=category&page='.$i.'" class="user__list-pagination-link">'.$i.'</a>
                                </li>
                            ';
                        }
                    }
                ?>

                <?php if ($currentPage < $totalPage && $totalPage > 1): ?>
                <li class="user__list-pagination-item">
                    <a href="<?=DOMAIN?>/?module=backend&controller=category&page=<?=($currentPage + 1);?>" class="user__list-pagination-link user__list-pagination-link-next">
                        <i class="fas fa-angle-right"></i>
                    </a>
                </li>
                <li class="user__list-pagination-item">
                    <a href="<?=DOMAIN?>/?module=backend&controller=category&page=<?=$totalPage;?>" class="user__list-pagination-link user__list-pagination-link-last">
                        <i class="fas fa-angle-double-right"></i>
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</main>
<script>
    $('.user__list-action.danger').on('click', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        Swal.fire({
            title: 'Bạn có chắc chắn không?',
            text: "Bạn không thể hoàn tác điều này!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ok'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Thành công',
                    text: "Danh mục này đã bị xóa",
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = `<?=DOMAIN?>/?module=backend&controller=category&action=delete&id=${id}`;
                    }
                })
            }
        })
    })
</script>