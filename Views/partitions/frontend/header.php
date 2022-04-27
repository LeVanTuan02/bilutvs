<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?=isset($tap) ? "[Tập ${tap}]": '';?>
        <?=$filmData['name'] ?? 'BiluTV - phim mới, xem phim hay online miễn phí Full HD';?>
    </title>
    <link rel="shortcut icon" href="<?=DOMAIN?>/Public/frontend/images/favicon.png" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <link rel="stylesheet" href="<?=DOMAIN?>/Public/frontend/slick-1.8.1/slick.css">
    <link rel="stylesheet" href="<?=DOMAIN?>/Public/frontend/css/base.css">
    <link rel="stylesheet" href="<?=DOMAIN?>/Public/frontend/css/grid.css">
    <link rel="stylesheet" href="<?=DOMAIN?>/Public/frontend/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?=DOMAIN?>/Public/frontend/css/responsive.css">
</head>
<body>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0&appId=604378676721357&autoLogAppEvents=1" nonce="oD6pISkr"></script>
    
    <div class="container">
        <!-- header -->
        <header class="header">
            <div class="header__top-wrap">
                <div class="grid wide">
                    <div class="header__top">
                        <div class="header__top-logo">
                            <a href="<?=DOMAIN?>" class="header__top-logo-link">
                                <img src="<?=DOMAIN?>/Public/frontend/images/logo-bilutv-bold.png" alt="" class="header__top-img">
                            </a>
                        </div>

                        <form action="<?=DOMAIN?>/tim-kiem/" class="header__top-search">
                            <input type="text" name="q" autocomplete="off" class="header__top-search-control" placeholder="Nhập tên phim, diễn viên...">
                            <button type="submit" class="header__top-search-btn">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>

                        <ul class="header__top-btn-list hide-on-mobile-tablet">
                            <li class="header__top-btn-item">
                                <a href="<?=DOMAIN?>/tu-phim" class="header__top-btn-link">
                                    <div class="header__top-btn-icon">
                                        <i class="far fa-heart"></i>
                                    </div>
                                    <span class="header__top-btn-text">Thích</span>
                                    <span class="header__top-btn-heart">0</span>
                                </a>
                            </li>
                            <li class="header__top-btn-item">
                                <a href="" class="header__top-btn-link">
                                    <div class="header__top-btn-icon">
                                        <i class="far fa-registered"></i>
                                    </div>
                                    <span class="header__top-btn-text">Đăng ký</span>
                                </a>
                            </li>
                            <li class="header__top-btn-item">
                                <a href="" class="header__top-btn-link">
                                    <div class="header__top-btn-icon">
                                        <i class="fas fa-sign-in-alt"></i>
                                    </div>
                                    <span class="header__top-btn-text">Đăng nhập</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <nav class="header__menu-wrap hide-on-mobile-tablet">
                <div class="grid wide">
                    <ul class="header__menu-list">
                        <li class="header__menu-item">
                            <a href="<?=DOMAIN?>" class="header__menu-link">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="header__menu-item">
                            <a href="" class="header__menu-link">
                                <span class="header__menu-text">Thể loại</span>
                                <div class="header__menu-icon">
                                    <i class="fas fa-sort-down"></i>
                                </div>
                            </a>

                            <ul class="header__sub-menu">
                                <?php foreach ($listCategory as $cate): ?>
                                <li class="header__sub-menu-item">
                                    <a href="<?=DOMAIN?>/the-loai/<?=$cate['slug'];?>" class="header__sub-menu-link"><?=$cate['cate_name'];?></a>
                                </li>
                                <?php endforeach;?>
                            </ul>
                        </li>
                        <li class="header__menu-item">
                            <a href="" class="header__menu-link">
                                <span class="header__menu-text">Quốc gia</span>
                                <div class="header__menu-icon">
                                    <i class="fas fa-sort-down"></i>
                                </div>
                            </a>

                            <ul class="header__sub-menu">
                                <?php foreach($listCountry as $country): ?>
                                <li class="header__sub-menu-item">
                                    <a href="<?=DOMAIN?>/quoc-gia/<?=$country['slug'];?>" class="header__sub-menu-link"><?=$country['nation_name'];?></a>
                                </li>
                                <?php endforeach;?>
                            </ul>
                        </li>
                        <li class="header__menu-item">
                            <a href="" class="header__menu-link">
                                <span class="header__menu-text">Phim lẻ</span>
                                <div class="header__menu-icon">
                                    <i class="fas fa-sort-down"></i>
                                </div>
                            </a>

                            <ul class="header__sub-menu">
                                <?php foreach($countryBetween as $item): ?>
                                <li class="header__sub-menu-item">
                                    <a href="<?=DOMAIN?>/phim-le/<?=$item['slug'];?>" class="header__sub-menu-link">Phim lẻ <?=$item['nation_name'];?></a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <li class="header__menu-item">
                            <a href="" class="header__menu-link">
                                <span class="header__menu-text">Phim bộ</span>
                                <div class="header__menu-icon">
                                    <i class="fas fa-sort-down"></i>
                                </div>
                            </a>

                            <ul class="header__sub-menu">
                                <?php foreach($countryBetween as $item): ?>
                                <li class="header__sub-menu-item">
                                    <a href="<?=DOMAIN?>/phim-bo/<?=$item['slug'];?>" class="header__sub-menu-link">Phim bộ <?=$item['nation_name'];?></a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <li class="header__menu-item">
                            <a href="" class="header__menu-link">
                                <span class="header__menu-text">Năm phát hành</span>
                                <div class="header__menu-icon">
                                    <i class="fas fa-sort-down"></i>
                                </div>
                            </a>

                            <ul class="header__sub-menu">
                                <?php foreach (range(date('Y'), 2000) as $year): ?>
                                <li class="header__sub-menu-item">
                                    <a href="<?=DOMAIN?>/nam/<?=$year;?>" class="header__sub-menu-link">Năm <?=$year;?></a>
                                </li>
                                <?php endforeach;?>
                            </ul>
                        </li>
                        <li class="header__menu-item">
                            <a href="<?=DOMAIN?>/phim-moi/" class="header__menu-link">
                                <span class="header__menu-text">Phim mới</span>
                            </a>
                        </li>
                        <li class="header__menu-item">
                            <a href="<?=DOMAIN?>/phim-chieu-rap/" class="header__menu-link">
                                <span class="header__menu-text">Phim chiếu rạp</span>
                            </a>
                        </li>
                        <li class="header__menu-item">
                            <a href="" class="header__menu-link">
                                <span class="header__menu-text">Lịch chiếu phim</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <nav class="header__menu-tablet-mobile hide-on-pc">
                <div class="grid wide">
                    <ul class="header__menu-tablet-mobile-list">
                        <li class="header__menu-tablet-mobile-item header__menu-tablet-mobile-item-menu header__menu-tablet-mobile-item-has-separator">
                            <a href="" class="header__menu-tablet-mobile-link">
                                <div class="header__menu-tablet-mobile-icon">
                                    <i class="fas fa-bars"></i>
                                </div>
                                <span class="header__menu-tablet-mobile-text">Menu</span>
                            </a>
                        </li>
                        <li class="header__menu-tablet-mobile-item header__menu-tablet-mobile-item-has-separator">
                            <a href="<?=DOMAIN?>/phim-bo/" class="header__menu-tablet-mobile-link">
                                <div class="header__menu-tablet-mobile-icon">
                                    <i class="fas fa-film"></i>
                                </div>
                                <span class="header__menu-tablet-mobile-text">Phim Bộ</span>
                            </a>
                        </li>
                        <li class="header__menu-tablet-mobile-item header__menu-tablet-mobile-item-has-separator">
                            <a href="<?=DOMAIN?>/phim-le/" class="header__menu-tablet-mobile-link">
                                <div class="header__menu-tablet-mobile-icon">
                                    <i class="fa fa-file-video"></i>
                                </div>
                                <span class="header__menu-tablet-mobile-text">Phim Lẻ</span>
                            </a>
                        </li>
                        <li class="header__menu-tablet-mobile-item header__menu-tablet-mobile-item-has-separator">
                            <a href="" class="header__menu-tablet-mobile-link">
                                <div class="header__menu-tablet-mobile-icon">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <span class="header__menu-tablet-mobile-text">Thịnh Hành</span>
                            </a>
                        </li>
                        <li class="header__menu-tablet-mobile-item">
                            <a href="<?=DOMAIN?>/tu-phim" class="header__menu-tablet-mobile-link">
                                <div class="header__menu-tablet-mobile-icon">
                                    <i class="far fa-heart"></i>
                                </div>
                                <label for="" class="header__menu-tablet-mobile-label">0</label>
                                <span class="header__menu-tablet-mobile-text">Cá Nhân</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <nav class="header__menu-mobile hide-on-pc">
                <div class="header__menu-mobile-overlay"></div>

                <div class="header__menu-mobile-body">
                    <ul class="header__menu-mobile-list">
                        <li class="header__menu-mobile-item-wrap">
                            <a href="./" class="header__menu-mobile-item-link">
                                <div class="header__menu-mobile-item">
                                    <div class="header__menu-mobile-item-text">
                                        <div class="header__menu-mobile-item-text-icon">
                                            <i class="fas fa-home"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="header__menu-mobile-item-wrap">
                            <div class="header__menu-mobile-item">
                                <div class="header__menu-mobile-item-text">
                                    Thể loại
                                    <div class="header__menu-mobile-item-text-icon">
                                        <i class="fas fa-sort-down"></i>
                                    </div>
                                </div>
                                
                                <div class="header__menu-mobile-item-icon header__menu-mobile-item-icon-open">
                                    <i class="fas fa-plus"></i>
                                </div>
                                
                                <div class="header__menu-mobile-item-icon header__menu-mobile-item-icon-close">
                                    <i class="fas fa-minus"></i>
                                </div>
                            </div>

                            <ul class="header__menu-mobile-sub-menu">
                                <?php foreach ($listCategory as $cate): ?>
                                <li class="header__menu-mobile-sub-menu-item">
                                    <a href="<?=DOMAIN?>/the-loai/<?=$cate['slug'];?>" class="header__menu-mobile-sub-menu-link"><?=$cate['cate_name'];?></a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>

                        <li class="header__menu-mobile-item-wrap">
                            <div class="header__menu-mobile-item">
                                <div class="header__menu-mobile-item-text">
                                    Quốc gia
                                    <div class="header__menu-mobile-item-text-icon">
                                        <i class="fas fa-sort-down"></i>
                                    </div>
                                </div>
                                
                                <div class="header__menu-mobile-item-icon header__menu-mobile-item-icon-open">
                                    <i class="fas fa-plus"></i>
                                </div>
                                
                                <div class="header__menu-mobile-item-icon header__menu-mobile-item-icon-close">
                                    <i class="fas fa-minus"></i>
                                </div>
                            </div>

                            <ul class="header__menu-mobile-sub-menu">
                                <?php foreach ($listCountry as $country): ?>
                                <li class="header__menu-mobile-sub-menu-item">
                                    <a href="<?=DOMAIN?>/quoc-gia/<?=$country['slug'];?>" class="header__menu-mobile-sub-menu-link"><?=$country['nation_name'];?></a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>

                        <li class="header__menu-mobile-item-wrap">
                            <div class="header__menu-mobile-item">
                                <div class="header__menu-mobile-item-text">
                                    Phim lẻ
                                    <div class="header__menu-mobile-item-text-icon">
                                        <i class="fas fa-sort-down"></i>
                                    </div>
                                </div>
                                
                                <div class="header__menu-mobile-item-icon header__menu-mobile-item-icon-open">
                                    <i class="fas fa-plus"></i>
                                </div>
                                
                                <div class="header__menu-mobile-item-icon header__menu-mobile-item-icon-close">
                                    <i class="fas fa-minus"></i>
                                </div>
                            </div>

                            <ul class="header__menu-mobile-sub-menu">
                                <?php foreach ($countryBetween as $item): ?>
                                <li class="header__menu-mobile-sub-menu-item">
                                    <a href="<?=DOMAIN?>/phim-le/<?=$item['slug'];?>" class="header__menu-mobile-sub-menu-link">Phim lẻ <?=$item['nation_name'];?></a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>

                        <li class="header__menu-mobile-item-wrap">
                            <div class="header__menu-mobile-item">
                                <div class="header__menu-mobile-item-text">
                                    Phim bộ
                                    <div class="header__menu-mobile-item-text-icon">
                                        <i class="fas fa-sort-down"></i>
                                    </div>
                                </div>
                                
                                <div class="header__menu-mobile-item-icon header__menu-mobile-item-icon-open">
                                    <i class="fas fa-plus"></i>
                                </div>
                                
                                <div class="header__menu-mobile-item-icon header__menu-mobile-item-icon-close">
                                    <i class="fas fa-minus"></i>
                                </div>
                            </div>

                            <ul class="header__menu-mobile-sub-menu">
                                <?php foreach ($countryBetween as $item): ?>
                                <li class="header__menu-mobile-sub-menu-item">
                                    <a href="<?=DOMAIN?>/phim-bo/<?=$item['slug'];?>" class="header__menu-mobile-sub-menu-link">Phim bộ <?=$item['nation_name'];?></a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>

                        <li class="header__menu-mobile-item-wrap">
                            <div class="header__menu-mobile-item">
                                <div class="header__menu-mobile-item-text">
                                    Năm phát hành
                                    <div class="header__menu-mobile-item-text-icon">
                                        <i class="fas fa-sort-down"></i>
                                    </div>
                                </div>
                                
                                <div class="header__menu-mobile-item-icon header__menu-mobile-item-icon-open">
                                    <i class="fas fa-plus"></i>
                                </div>
                                
                                <div class="header__menu-mobile-item-icon header__menu-mobile-item-icon-close">
                                    <i class="fas fa-minus"></i>
                                </div>
                            </div>

                            <ul class="header__menu-mobile-sub-menu">
                                <?php foreach (range(date('Y'), 2000) as $year): ?>
                                <li class="header__menu-mobile-sub-menu-item">
                                    <a href="<?=DOMAIN?>/nam/<?=$year;?>" class="header__menu-mobile-sub-menu-link">Năm <?=$year;?></a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>

                        <li class="header__menu-mobile-item-wrap">
                            <a href="<?=DOMAIN?>/phim-moi/" class="header__menu-mobile-item-link">
                                <div class="header__menu-mobile-item">
                                    <div class="header__menu-mobile-item-text">
                                        Phim mới
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="header__menu-mobile-item-wrap">
                            <a href="<?=DOMAIN?>/phim-chieu-rap/" class="header__menu-mobile-item-link">
                                <div class="header__menu-mobile-item">
                                    <div class="header__menu-mobile-item-text">
                                        Phim chiếu rạp
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- end header -->
        <!-- content -->
        <div class="content__wrap">
            <div class="grid wide">
                <div class="row">