<div class="content__home col l-8 m-12 c-12">
    <!-- content main -->
    <main class="content__main">
        <!-- heading -->
        <div class="content__main-heading-wrap">
            <h2 class="content__main-heading-title">PHIM lẻ <?=$countryName;?></h2>
        </div>
        <!-- end heading -->

        <?php 
            loadView('partitions.frontend.filter', [
                'orderList' => $orderList,
                'listType' => $listType,
                'listCategory' => $listCategory,
                'listCountry' => $listCountry,
            ]);
        ?>

        <div class="grid content__main-films">
            <div class="row">
                <?php foreach($filmData as $item): ?>
                <div class="col l-3 m-3 c-4">
                    <div class="content__main-film">
                        <a href="<?=DOMAIN?>/phim/<?=$item['slug_film']?>" title="<?=$item['name'];?>" class="content__main-film-link">
                            <div class="content__main-film-img-wrap">
                                <div class="content__main-film-img" style="background-image: url(<?=$item['poster'];?>)"></div>
                                <label for="" class="content__main-film-status"><?=$item['status_name'];?></label>
                                <!-- <label for="" class="content__main-film-quality">Tập 10 Thuyết Minh</label> -->
                                <label for="" class="content__main-film-btn">
                                    <i class="fas fa-play"></i>
                                </label>
                            </div>

                            <div class="content__main-film-info">
                                <p class="content__main-film-name"><?=$item['name'];?></p>
                                <p class="content__main-film-real-name"><?=$item['real_name'];?></p>
                            </div>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
                
            </div>
        </div>
    </main>
    <!-- end content main -->
</div>