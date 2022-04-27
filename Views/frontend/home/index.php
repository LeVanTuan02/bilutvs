
<div class="content__home col l-8 m-12 c-12">
    <!-- slide -->
    <section class="content__home-slider-wrap">
        <ul class="content__home-sliders">
            <li class="content__home-slider">
                <a href="" class="content__home-slider-link">
                    <div class="content__home-slider-img" style="background-image: url(./Public/frontend/images/slide/slider.jpg);"></div>
                </a>
            </li>
            <li class="content__home-slider">
                <a href="" class="content__home-slider-link">
                    <div class="content__home-slider-img" style="background-image: url(./Public/frontend/images/slide/slider2.jpg);"></div>
                </a>
            </li>
            <li class="content__home-slider">
                <a href="" class="content__home-slider-link">
                    <div class="content__home-slider-img" style="background-image: url(./Public/frontend/images/slide/slider3.jpg);"></div>
                </a>
            </li>
            <li class="content__home-slider">
                <a href="" class="content__home-slider-link">
                    <div class="content__home-slider-img" style="background-image: url(./Public/frontend/images/slide/slider4.jpg);"></div>
                </a>
            </li>
        </ul>
    </section>
    <!-- end slide -->

    <!-- content main -->
    <main class="content__main">
        <!-- heading -->
        <div class="content__main-heading-wrap">
            <div class="content__main-heading">
                <div class="content__main-heading-icon">
                    <i class="fas fa-plus-square"></i>
                </div>
                <a href="" class="content__main-heading-link">
                    <h2 class="content__main-heading-title">Phim bộ mới</h2>
                    <span class="content__main-heading-icon">
                        <i class="fas fa-caret-right"></i>
                    </span>
                </a>
            </div>

            <ul class="content__main-heading-tabs">
                <li class="content__main-heading-tab content__main-heading-tab-phimbo active">All</li>
                <li class="content__main-heading-tab content__main-heading-tab-phimbo">Trung Quốc</li>
                <li class="content__main-heading-tab content__main-heading-tab-phimbo">Hàn Quốc</li>
                <li class="content__main-heading-tab content__main-heading-tab-phimbo">Thái Lan</li>
            </ul>
        </div>
        <!-- end heading -->

        <div class="grid content__main-films content__main-films-phimbo active">
            <div class="row">
                <?php foreach ($list_film as $item): ?>
                <div class="col l-3 m-3 c-4">
                    <div class="content__main-film">
                        <a href="<?=DOMAIN?>/phim/<?=$item['slug']?>" title="<?=$item['name'];?>" class="content__main-film-link">
                            <div class="content__main-film-img-wrap">
                                <div class="content__main-film-img" style="background-image: url(<?=$item['poster']?>)"></div>
                                <label for="" class="content__main-film-status">
                                    <?php if ($item['total_episode'] === $item['total']): ?>
                                        Full <?=$item['total_episode'];?>/<?=$item['total_episode'];?>
                                    <?php else: ?>
                                        Tập <?=$item['total'];?>
                                    <?php endif; ?>
                                </label>
                                <!-- <label for="" class="content__main-film-quality">Tập 10 Thuyết Minh</label> -->
                                <label for="" class="content__main-film-btn">
                                    <i class="fas fa-play"></i>
                                </label>
                            </div>

                            <div class="content__main-film-info">
                                <p class="content__main-film-name"><?=$item['name']?></p>
                                <p class="content__main-film-real-name"><?=$item['real_name']?></p>
                            </div>
                        </a>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>

        <div class="grid content__main-films content__main-films-phimbo">
            <div class="row">
                <?php foreach ($filmChina as $item): ?>
                <div class="col l-3 m-3 c-4">
                    <div class="content__main-film">
                        <a href="<?=DOMAIN?>/phim/<?=$item['slug']?>" title="<?=$item['name'];?>" class="content__main-film-link">
                            <div class="content__main-film-img-wrap">
                                <div class="content__main-film-img" style="background-image: url(<?=$item['poster']?>)"></div>
                                <label for="" class="content__main-film-status">
                                    <?php if ($item['total_episode'] === $item['total']): ?>
                                        Full <?=$item['total_episode'];?>/<?=$item['total_episode'];?>
                                    <?php else: ?>
                                        Tập <?=$item['total'];?>
                                    <?php endif; ?>
                                </label>
                                <!-- <label for="" class="content__main-film-quality">Tập 10 Thuyết Minh</label> -->
                                <label for="" class="content__main-film-btn">
                                    <i class="fas fa-play"></i>
                                </label>
                            </div>

                            <div class="content__main-film-info">
                                <p class="content__main-film-name"><?=$item['name']?></p>
                                <p class="content__main-film-real-name"><?=$item['real_name']?></p>
                            </div>
                        </a>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>

        <div class="grid content__main-films content__main-films-phimbo">
            <div class="row">
                <?php foreach ($filmKorean as $item): ?>
                <div class="col l-3 m-3 c-4">
                    <div class="content__main-film">
                        <a href="<?=DOMAIN?>/phim/<?=$item['slug']?>" title="<?=$item['name'];?>" class="content__main-film-link">
                            <div class="content__main-film-img-wrap">
                                <div class="content__main-film-img" style="background-image: url(<?=$item['poster']?>)"></div>
                                <label for="" class="content__main-film-status">
                                    <?php if ($item['total_episode'] === $item['total']): ?>
                                        Full <?=$item['total_episode'];?>/<?=$item['total_episode'];?>
                                    <?php else: ?>
                                        Tập <?=$item['total'];?>
                                    <?php endif; ?>
                                </label>
                                <!-- <label for="" class="content__main-film-quality">Tập 10 Thuyết Minh</label> -->
                                <label for="" class="content__main-film-btn">
                                    <i class="fas fa-play"></i>
                                </label>
                            </div>

                            <div class="content__main-film-info">
                                <p class="content__main-film-name"><?=$item['name']?></p>
                                <p class="content__main-film-real-name"><?=$item['real_name']?></p>
                            </div>
                        </a>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>

        <div class="grid content__main-films content__main-films-phimbo">
            <div class="row">
                <?php foreach ($filmThailand as $item): ?>
                <div class="col l-3 m-3 c-4">
                    <div class="content__main-film">
                        <a href="<?=DOMAIN?>/phim/<?=$item['slug']?>" title="<?=$item['name'];?>" class="content__main-film-link">
                            <div class="content__main-film-img-wrap">
                                <div class="content__main-film-img" style="background-image: url(<?=$item['poster']?>)"></div>
                                <label for="" class="content__main-film-status">
                                    <?php if ($item['total_episode'] === $item['total']): ?>
                                        Full <?=$item['total_episode'];?>/<?=$item['total_episode'];?>
                                    <?php else: ?>
                                        Tập <?=$item['total'];?>
                                    <?php endif; ?>
                                </label>
                                <!-- <label for="" class="content__main-film-quality">Tập 10 Thuyết Minh</label> -->
                                <label for="" class="content__main-film-btn">
                                    <i class="fas fa-play"></i>
                                </label>
                            </div>

                            <div class="content__main-film-info">
                                <p class="content__main-film-name"><?=$item['name']?></p>
                                <p class="content__main-film-real-name"><?=$item['real_name']?></p>
                            </div>
                        </a>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>

        <div class="content__main-heading-wrap">
            <div class="content__main-heading">
                <div class="content__main-heading-icon">
                    <i class="fas fa-plus-square"></i>
                </div>
                <a href="" class="content__main-heading-link">
                    <h2 class="content__main-heading-title">Phim lẻ mới</h2>
                    <span class="content__main-heading-icon">
                        <i class="fas fa-caret-right"></i>
                    </span>
                </a>
            </div>

            <ul class="content__main-heading-tabs">
                <li class="content__main-heading-tab content__main-heading-tab-phimle active">All</li>
                <li class="content__main-heading-tab content__main-heading-tab-phimle">Chiếu Rạp</li>
                <li class="content__main-heading-tab content__main-heading-tab-phimle">Hành Động</li>
                <li class="content__main-heading-tab content__main-heading-tab-phimle">Cổ Trang</li>
            </ul>
        </div>

        <div class="grid content__main-films content__main-films-phimle active">
            <div class="row">
                <?php foreach ($listShortFilm as $item): ?>
                <div class="col l-3 m-3 c-4">
                    <div class="content__main-film">
                        <a href="<?=DOMAIN?>/phim/<?=$item['slug']?>" title="<?=$item['name'];?>" class="content__main-film-link">
                            <div class="content__main-film-img-wrap">
                                <div class="content__main-film-img" style="background-image: url(<?=$item['poster']?>)"></div>
                                <label for="" class="content__main-film-status"><?=$item['status_name'];?></label>
                                <!-- <label for="" class="content__main-film-quality">Tập 10 Thuyết Minh</label> -->
                                <label for="" class="content__main-film-btn">
                                    <i class="fas fa-play"></i>
                                </label>
                            </div>

                            <div class="content__main-film-info">
                                <p class="content__main-film-name"><?=$item['name']?></p>
                                <p class="content__main-film-real-name"><?=$item['real_name']?></p>
                            </div>
                        </a>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>

        <div class="grid content__main-films content__main-films-phimle">
            <div class="row">
                <?php foreach ($filmTheater as $item): ?>
                <div class="col l-3 m-3 c-4">
                    <div class="content__main-film">
                        <a href="<?=DOMAIN?>/phim/<?=$item['slug']?>" title="<?=$item['name'];?>" class="content__main-film-link">
                            <div class="content__main-film-img-wrap">
                                <div class="content__main-film-img" style="background-image: url(<?=$item['poster']?>)"></div>
                                <label for="" class="content__main-film-status">Tập <?=$item['total'];?></label>
                                <!-- <label for="" class="content__main-film-quality">Tập 10 Thuyết Minh</label> -->
                                <label for="" class="content__main-film-btn">
                                    <i class="fas fa-play"></i>
                                </label>
                            </div>

                            <div class="content__main-film-info">
                                <p class="content__main-film-name"><?=$item['name']?></p>
                                <p class="content__main-film-real-name"><?=$item['real_name']?></p>
                            </div>
                        </a>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>

        <div class="grid content__main-films content__main-films-phimle">
            <div class="row">
                <?php foreach ($filmAction as $item): ?>
                <div class="col l-3 m-3 c-4">
                    <div class="content__main-film">
                        <a href="<?=DOMAIN?>/phim/<?=$item['slug']?>" title="<?=$item['name'];?>" class="content__main-film-link">
                            <div class="content__main-film-img-wrap">
                                <div class="content__main-film-img" style="background-image: url(<?=$item['poster']?>)"></div>
                                <label for="" class="content__main-film-status">Tập <?=$item['total'];?></label>
                                <!-- <label for="" class="content__main-film-quality">Tập 10 Thuyết Minh</label> -->
                                <label for="" class="content__main-film-btn">
                                    <i class="fas fa-play"></i>
                                </label>
                            </div>

                            <div class="content__main-film-info">
                                <p class="content__main-film-name"><?=$item['name']?></p>
                                <p class="content__main-film-real-name"><?=$item['real_name']?></p>
                            </div>
                        </a>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>

        <div class="grid content__main-films content__main-films-phimle">
            <div class="row">
                <?php foreach ($filmChineseDramas as $item): ?>
                <div class="col l-3 m-3 c-4">
                    <div class="content__main-film">
                        <a href="<?=DOMAIN?>/phim/<?=$item['slug']?>" title="<?=$item['name'];?>" class="content__main-film-link">
                            <div class="content__main-film-img-wrap">
                                <div class="content__main-film-img" style="background-image: url(<?=$item['poster']?>)"></div>
                                <label for="" class="content__main-film-status">Tập <?=$item['total'];?></label>
                                <!-- <label for="" class="content__main-film-quality">Tập 10 Thuyết Minh</label> -->
                                <label for="" class="content__main-film-btn">
                                    <i class="fas fa-play"></i>
                                </label>
                            </div>

                            <div class="content__main-film-info">
                                <p class="content__main-film-name"><?=$item['name']?></p>
                                <p class="content__main-film-real-name"><?=$item['real_name']?></p>
                            </div>
                        </a>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </main>
    <!-- end content main -->
</div>