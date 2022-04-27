<div class="content__home col l-8 m-12 c-12">
    <!-- content main -->
    <main class="content__main">
        <!-- heading -->
        <div class="content__main-heading-wrap">
            <h2 class="content__main-heading-title">Lọc phim</h2>
        </div>
        <!-- end heading -->

        <section class="content__main-filter">
            <form action="<?=DOMAIN?>/loc-phim/" class="content__main-filter-form" method="GET">
                <div class="content__main-filter-item">
                    <select name="order" class="content__main-filter-control">
                        <option value="">-- Sắp xếp --</option>
                        <!-- <option value="">Mới cập nhật</option> -->
                        <?php foreach($orderList as $key => $orderItem): ?>
                            <?php if ($order === $key): ?>
                                <option value="<?=$key;?>" selected><?=$orderItem;?></option>
                            <?php else: ?>
                                <option value="<?=$key;?>"><?=$orderItem;?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="content__main-filter-item">
                    <select name="type" class="content__main-filter-control">
                        <option value="">-- Loại --</option>
                        <?php foreach($listType as $typeItem): ?>
                            <?php if($type === $typeItem['id']): ?>
                                <option value="<?=$typeItem['id'];?>" selected><?=$typeItem['type_name'];?></option>
                            <?php else: ?>
                                <option value="<?=$typeItem['id'];?>"><?=$typeItem['type_name'];?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="content__main-filter-item">
                    <select name="cate" class="content__main-filter-control">
                        <option value="">-- Thể loại --</option>
                        <?php foreach($listCategory as $cateItem): ?>
                            <?php if($cate === $cateItem['id']): ?>
                                <option value="<?=$cateItem['id'];?>" selected><?=$cateItem['cate_name'];?></option>
                            <?php else: ?>
                                <option value="<?=$cateItem['id'];?>"><?=$cateItem['cate_name'];?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="content__main-filter-item">
                    <select name="country" class="content__main-filter-control">
                        <option value="">-- Quốc gia --</option>
                        <?php foreach($listCountry as $countryItem): ?>
                            <?php if($country === $countryItem['id']): ?>
                                <option value="<?=$countryItem['id'];?>" selected><?=$countryItem['nation_name'];?></option>
                            <?php else: ?>
                                <option value="<?=$countryItem['id'];?>"><?=$countryItem['nation_name'];?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="content__main-filter-item">
                    <select name="year" class="content__main-filter-control">
                        <option value="">-- Năm --</option>
                        <?php foreach(range(date('Y'), 1997) as $yearItem): ?>
                            <?php if ($year == $yearItem): ?>
                                <option value="<?=$yearItem;?>" selected><?=$yearItem;?></option>
                            <?php else: ?>
                                <option value="<?=$yearItem;?>"><?=$yearItem;?></option>
                            <?php endif; ?>
                        <?php endforeach;?>
                    </select>
                </div>
                <div class="content__main-filter-item">
                    <input type="submit" value="Lọc Phim" class="content__main-filter-submit">
                </div>
            </form>
        </section>

        <div class="grid content__main-films">
            <div class="row">
                <?php foreach($filmData as $item): ?>
                <div class="col l-3 m-3 c-4">
                    <div class="content__main-film">
                        <a href="<?=DOMAIN?>/phim/<?=$item['slug_film']?>" title="<?=$item['name'];?>" class="content__main-film-link">
                            <div class="content__main-film-img-wrap">
                                <div class="content__main-film-img" style="background-image: url(<?=$item['poster'];?>)"></div>
                                <label for="" class="content__main-film-status">
                                    <?php if (($type != 2) && $type): ?>
                                        <?=$item['status_name'];?>
                                    <?php elseif ($item['total_episode'] === $item['episodeCurrent']): ?>
                                        Full <?=$item['episodeCurrent'];?>/<?=$item['episodeCurrent'];?>
                                    <?php else: ?>
                                        Tập <?=$item['episodeCurrent'];?>
                                    <?php endif; ?>
                                </label>
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