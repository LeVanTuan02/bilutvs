<div class="content__home col l-8 m-12 c-12">

    <!-- content main -->
    <main class="content__main content__player">
        <section class="content__main-player">
            <!-- <div itemscope itemtype="https://schema.org/VideoObject">
                <meta itemprop="uploadDate" content="Sun Jun 13 2021 12:56:40 GMT+0700 (Giờ Đông Dương)"/>
                <meta itemprop="name" content="[Flycam] Toàn Cảnh Phổ Thông Cao đẳNg Fpt Polytechnic Cơ Sở Hà Nội Nhìn Từ Trên Cao"/>
                <meta itemprop="duration" content="P0Y0M0DT0H1M54S" />
                <meta itemprop="thumbnailUrl" content="https://content.jwplatform.com/thumbs/kPPS9b9A-1920.jpg"/>
                <meta itemprop="contentUrl" content="https://content.jwplatform.com/videos/kPPS9b9A-lohkVUFJ.mp4"/>
                <div style="position:relative; overflow:hidden; padding-bottom:56.25%">
                <iframe src="https://cdn.jwplayer.com/players/kPPS9b9A-excZRN5u.html" width="100%" height="100%" frameborder="0" scrolling="auto" title="[Flycam] Toàn Cảnh Phổ Thông Cao đẳNg Fpt Polytechnic Cơ Sở Hà Nội Nhìn Từ Trên Cao" style="position:absolute;" allowfullscreen></iframe>
            </div> -->

            <div class="content__main-player-wrap">
                <iframe src="<?=$filmData['link_player'];?>" width="100%" height="100%" frameborder="0" allowfullscreen></iframe>
            </div>
            <span class="content__main-player-note">Sử dụng trình duyệt Chrome hoặc Cốc Cốc để xem phim tốt nhất và tránh bị lỗi</span>
                            
        </section>

        <section class="content__main-film-details-wrap">
            <div class="content__main-film-server">
                <label for="" class="content__main-film-server-label">
                    <div class="content__main-film-server-icon">
                        <i class="fas fa-database"></i>
                    </div>
                    Server
                </label>

                <ul class="content__main-film-server-list">
                    <li class="content__main-film-server-item active">#1 GF</li>
                    <li class="content__main-film-server-item">#2 GR</li>
                    <li class="content__main-film-server-item">#3 GO</li>
                    <li class="content__main-film-server-item">#4 HX</li>
                </ul>
            </div>

            <div class="content__main-film-info-wrap">
                <div class="content__main-film-info">
                    <h2 class="content__main-film-info-name"><?=$filmData['name'];?> Tập <?=$filmData['tap']?> Vietsub</h2>
                    <span class="content__main-film-info-real-name"><?=$filmData['real_name'];?></span>
                </div>

                <div class="content__main-film-view">
                    <div class="content__main-film-view-icon">
                        <i class="far fa-heart"></i>
                    </div>
                    <div class="content__main-film-view-qnt">
                        <div class="content__main-film-view-qnt-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <?=number_format($filmData['view'], 0, ',', '.');?>
                    </div>
                </div>
            </div>

            <div class="content__main-film-tabs">
                <ul class="content__main-film-tab-list">
                    <li class="content__main-film-tab-item">
                        <a href="" class="content__main-film-tab-link">
                            Thông tin phim
                        </a>
                    </li>
                    <li class="content__main-film-tab-item">
                        <a href="" class="content__main-film-tab-link">
                            Trailer
                        </a>
                    </li>
                </ul>

                <div class="content__main-film-tab-action hide-on-mobile-tablet">
                    <div class="fb-like" data-href="<?=DOMAIN?>/phim/<?=$filmData['slug'];?>" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="true"></div>
                    <div class="fb-save" data-uri="<?=DOMAIN?>/phim/<?=$filmData['slug'];?>" data-size="large"></div>
                </div>
            </div>

            <div class="content__main-film-tag">
                <div class="content__main-film-tag-status content__main-film-tag-status--vip">VIP</div>
                <ul class="content__main-film-tags">
                    <li class="content__main-film-tag-item content__main-film-tag-item-has-sparator">
                        <a href="" class="content__main-film-tag-link"><?=$filmData['nation_name'];?></a>
                    </li>
                    <li class="content__main-film-tag-item content__main-film-tag-item-has-sparator">
                        <a href="" class="content__main-film-tag-link"><?=$filmData['year'];?></a>
                    </li>
                    <li class="content__main-film-tag-item">
                        <span class="content__main-film-tag-link"><?=$filmData['total_episode'];?> tập</span>
                    </li>
                </ul>
            </div>

            <div class="content__main-film-trend">
                <label for="" class="content__main-film-trend-label">TOP 10</label>
                <a href="" class="content__main-film-trend-link">
                    #4 trên top thịnh hành
                </a>
            </div>

            <div class="content__player-film-details">
                <div class="content__player-film-details-heading">
                    <div class="content__player-film-details-heading-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <span class="content__player-film-details-heading-text">Tìm tập nhanh</span>
                    <div class="content__player-film-details-heading-icon">
                        <i class="fas fa-angle-down"></i>
                    </div>
                </div>

                <div class="content__player-film-search">
                    <input type="text" class="content__player-film-search-input" placeholder="Nhập tên/ số tập">
                </div>
                <div class="content__player-film-search-result"></div>

                <div class="content__player-film-details-heading">
                    <div class="content__player-film-details-heading-icon">
                        <i class="fas fa-tv"></i>
                    </div>
                    <span class="content__player-film-details-heading-text">Vietsub</span>
                    <div class="content__player-film-details-heading-icon">
                        <i class="fas fa-angle-down"></i>
                    </div>
                </div>

                <ul class="content__player-film-episodes">
                    <?php

                        for($i = 1; $i <= $totalEpisodeCurrent; $i++) {
                            if($i == $filmData['tap']){
                                echo
                                '
                                    <li class="content__player-film-episode active">
                                        <a href="'.DOMAIN.'/xem-phim/'.$filmData['slug'].'-tap-'.$i.'" title="Xem phim '.$filmData['name'].' Tập '.$i.'" class="content__player-film-episode-link">Tập '.$i.'</a>
                                    </li>
                                ';
                            }else{
                                echo
                                '
                                    <li class="content__player-film-episode">
                                        <a href="'.DOMAIN.'/xem-phim/'.$filmData['slug'].'-tap-'.$i.'" title="Xem phim '.$filmData['name'].' Tập '.$i.'" class="content__player-film-episode-link">Tập '.$i.'</a>
                                    </li>
                                ';
                            }
                        }

                    ?>
                </ul>
            </div>
        </section>

        <section class="content__main-film-note">
            <div class="content__main-film-note-title">
                <div class="content__main-film-note-icon">
                    <i class="fas fa-info-circle"></i>
                </div>
                <strong class="content__main-film-note-title">Thông Tin - Lịch Chiếu</strong>
            </div>

            <span class="content__main-film-note-dessc">
                Lịch Chiếu Phim Dữ Quân Ca được lên sóng 7h-8h tối hằng ngày trên BiluTV
            </span>
        </section>

        <section class="content__main-film-comment">
            <div class="fb-comments" data-href="<?=DOMAIN?>/xem-phim/<?=$filmData['slug'];?>-tap-<?=$filmData['tap'];?>" data-width="100%" data-numposts="5"></div>
        </section>
    </main>
    <!-- end content main -->

    <section class="content__films">
        <div class="content__main-heading-wrap">
            <h2 class="content__main-heading-title">Phim liên quan</h2>
        </div>
        <!-- end heading -->

        <div class="grid content__main-films">
            <div class="row">
                <?php foreach ($filmRelation as $item): ?>
                <div class="col l-3 m-3 c-4">
                    <div class="content__main-film">
                        <a href="<?=DOMAIN?>/phim/<?=$item['slug'];?>" class="content__main-film-link">
                            <div class="content__main-film-img-wrap">
                                <div class="content__main-film-img" style="background-image: url(<?=$item['poster'];?>)"></div>
                                <!-- <label for="" class="content__main-film-status">
                                    <?php if ($item['type_id'] == 1): ?>
                                        <?=$item['status_name'];?>
                                    <?php elseif ($item['total_episode'] === $item['episodeCurrent']): ?>
                                        Full <?=$item['total_episode'];?>/<?=$item['total_episode'];?>
                                    <?php else: ?>
                                        Tập <?=$item['episodeCurrent'];?>
                                    <?php endif; ?>
                                </label> -->
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
    </section>

    
</div>
<script src="<?=DOMAIN?>/Public/frontend/js/filmplayer.js"></script>