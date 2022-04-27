        
                    <aside class="sidebar col l-4 m-0 c-0">
                        <section class="sidebar__item">
                            <div class="sidebar__item-title">
                                <a href="" class="sidebar__item-title-link">Top thịnh hành</a>
                            </div>

                            <ul class="sidebar__item-tabs">
                                <li class="sidebar__item-tab active">Phim Bộ</li>
                                <li class="sidebar__item-tab">Phim Lẻ</li>
                                <li class="sidebar__item-tab">Hoạt Hình</li>
                            </ul>

                            <ul class="sidebar__films sidebar__films-tab active">
                                <?php foreach($longFilmSidebar as $item): ?>
                                    <li class="sidebar__film">
                                    <a href="" class="sidebar__film-link">
                                        <div class="sidebar__film-img" style="background-image: url(<?=$item['poster'];?>);"></div>

                                        <div class="sidebar__film-content">
                                            <p class="sidebar__film-name"><?=$item['name'];?></p>
                                            <p class="sidebar__film-real-name"><?=$item['real_name'];?></p>
                                            <div class="sidebar__film-view">
                                                <div class="sidebar__film-view-icon">
                                                    <i class="fas fa-eye"></i>
                                                </div>
                                                <span class="sidebar__film-view-text"><?=number_format($item['view']);?> lượt xem</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <?php endforeach; ?>
                            </ul>

                            <ul class="sidebar__films sidebar__films-tab">
                                <?php foreach($shortFilmSidebar as $item): ?>
                                <li class="sidebar__film">
                                    <a href="" class="sidebar__film-link">
                                        <div class="sidebar__film-img" style="background-image: url(<?=$item['poster'];?>);"></div>

                                        <div class="sidebar__film-content">
                                            <p class="sidebar__film-name"><?=$item['name'];?></p>
                                            <p class="sidebar__film-real-name"><?=$item['real_name'];?></p>
                                            <div class="sidebar__film-view">
                                                <div class="sidebar__film-view-icon">
                                                    <i class="fas fa-eye"></i>
                                                </div>
                                                <span class="sidebar__film-view-text"><?=number_format($item['view']);?> lượt xem</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <?php endforeach; ?>
                            </ul>

                            <ul class="sidebar__films sidebar__films-tab">
                                <?php foreach($cartoonFilmSidebar as $item): ?>
                                <li class="sidebar__film">
                                    <a href="" class="sidebar__film-link">
                                        <div class="sidebar__film-img" style="background-image: url(<?=$item['poster'];?>);"></div>

                                        <div class="sidebar__film-content">
                                            <p class="sidebar__film-name"><?=$item['name'];?></p>
                                            <p class="sidebar__film-real-name"><?=$item['real_name'];?></p>
                                            <div class="sidebar__film-view">
                                                <div class="sidebar__film-view-icon">
                                                    <i class="fas fa-eye"></i>
                                                </div>
                                                <span class="sidebar__film-view-text"><?=number_format($item['view']);?> lượt xem</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </section>

                        <section class="sidebar__item">
                            <div class="sidebar__item-title">
                                <a href="" class="sidebar__item-title-link">Phim sắp chiếu</a>
                            </div>

                            <ul class="sidebar__films sidebar__films-has-scroll">
                                <li class="sidebar__film">
                                    <a href="" class="sidebar__film-link">
                                        <div class="sidebar__film-img" style="background-image: url(<?=DOMAIN?>/Public/frontend/images/poster.jpg);"></div>

                                        <div class="sidebar__film-content">
                                            <p class="sidebar__film-name">Penthouse: Cuộc Chiến Thượng</p>
                                            <p class="sidebar__film-real-name">The Penthouse: War in Life 3</p>
                                            <div class="sidebar__film-view">
                                                <div class="sidebar__film-view-icon">
                                                    <i class="fas fa-eye"></i>
                                                </div>
                                                <span class="sidebar__film-view-text">200.000 lượt xem</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="sidebar__film">
                                    <a href="" class="sidebar__film-link">
                                        <div class="sidebar__film-img" style="background-image: url(<?=DOMAIN?>/Public/frontend/images/poster.jpg);"></div>

                                        <div class="sidebar__film-content">
                                            <p class="sidebar__film-name">Penthouse: Cuộc Chiến Thượng</p>
                                            <p class="sidebar__film-real-name">The Penthouse: War in Life 3</p>
                                            <div class="sidebar__film-view">
                                                <div class="sidebar__film-view-icon">
                                                    <i class="fas fa-eye"></i>
                                                </div>
                                                <span class="sidebar__film-view-text">200.000 lượt xem</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="sidebar__film">
                                    <a href="" class="sidebar__film-link">
                                        <div class="sidebar__film-img" style="background-image: url(<?=DOMAIN?>/Public/frontend/images/poster.jpg);"></div>

                                        <div class="sidebar__film-content">
                                            <p class="sidebar__film-name">Penthouse: Cuộc Chiến Thượng</p>
                                            <p class="sidebar__film-real-name">The Penthouse: War in Life 3</p>
                                            <div class="sidebar__film-view">
                                                <div class="sidebar__film-view-icon">
                                                    <i class="fas fa-eye"></i>
                                                </div>
                                                <span class="sidebar__film-view-text">200.000 lượt xem</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="sidebar__film">
                                    <a href="" class="sidebar__film-link">
                                        <div class="sidebar__film-img" style="background-image: url(<?=DOMAIN?>/Public/frontend/images/poster.jpg);"></div>

                                        <div class="sidebar__film-content">
                                            <p class="sidebar__film-name">Penthouse: Cuộc Chiến Thượng</p>
                                            <p class="sidebar__film-real-name">The Penthouse: War in Life 3</p>
                                            <div class="sidebar__film-view">
                                                <div class="sidebar__film-view-icon">
                                                    <i class="fas fa-eye"></i>
                                                </div>
                                                <span class="sidebar__film-view-text">200.000 lượt xem</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="sidebar__film">
                                    <a href="" class="sidebar__film-link">
                                        <div class="sidebar__film-img" style="background-image: url(<?=DOMAIN?>/Public/frontend/images/poster.jpg);"></div>

                                        <div class="sidebar__film-content">
                                            <p class="sidebar__film-name">Penthouse: Cuộc Chiến Thượng</p>
                                            <p class="sidebar__film-real-name">The Penthouse: War in Life 3</p>
                                            <div class="sidebar__film-view">
                                                <div class="sidebar__film-view-icon">
                                                    <i class="fas fa-eye"></i>
                                                </div>
                                                <span class="sidebar__film-view-text">200.000 lượt xem</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="sidebar__film">
                                    <a href="" class="sidebar__film-link">
                                        <div class="sidebar__film-img" style="background-image: url(<?=DOMAIN?>/Public/frontend/images/poster.jpg);"></div>

                                        <div class="sidebar__film-content">
                                            <p class="sidebar__film-name">Penthouse: Cuộc Chiến Thượng</p>
                                            <p class="sidebar__film-real-name">The Penthouse: War in Life 3</p>
                                            <div class="sidebar__film-view">
                                                <div class="sidebar__film-view-icon">
                                                    <i class="fas fa-eye"></i>
                                                </div>
                                                <span class="sidebar__film-view-text">200.000 lượt xem</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </section>

                        <section class="sidebar__item">
                            <div class="sidebar__item-title">
                                <a href="" class="sidebar__item-title-link">Album - Series</a>
                            </div>

                            <ul class="sidebar__films sidebar__films-has-scroll sidebar__films-series">
                                <li class="sidebar__film">
                                    <a href="" class="sidebar__film-link">
                                        <div class="sidebar__film-img" style="background-image: url(<?=DOMAIN?>/Public/frontend/images/poster.jpg);"></div>

                                        <p class="sidebar__film-title">Series Phim Dưới mái vòm - Under the Dome</p>
                                    </a>
                                </li>
                                <li class="sidebar__film">
                                    <a href="" class="sidebar__film-link">
                                        <div class="sidebar__film-img" style="background-image: url(<?=DOMAIN?>/Public/frontend/images/poster.jpg);"></div>

                                        <p class="sidebar__film-title">Series Phim Dưới mái vòm - Under the Dome</p>
                                    </a>
                                </li>
                                <li class="sidebar__film">
                                    <a href="" class="sidebar__film-link">
                                        <div class="sidebar__film-img" style="background-image: url(<?=DOMAIN?>/Public/frontend/images/poster.jpg);"></div>

                                        <p class="sidebar__film-title">Series Phim Dưới mái vòm - Under the Dome</p>
                                    </a>
                                </li>
                                <li class="sidebar__film">
                                    <a href="" class="sidebar__film-link">
                                        <div class="sidebar__film-img" style="background-image: url(<?=DOMAIN?>/Public/frontend/images/poster.jpg);"></div>

                                        <p class="sidebar__film-title">Series Phim Dưới mái vòm - Under the Dome</p>
                                    </a>
                                </li>
                                <li class="sidebar__film">
                                    <a href="" class="sidebar__film-link">
                                        <div class="sidebar__film-img" style="background-image: url(<?=DOMAIN?>/Public/frontend/images/poster.jpg);"></div>

                                        <p class="sidebar__film-title">Series Phim Dưới mái vòm - Under the Dome</p>
                                    </a>
                                </li>
                            </ul>
                        </section>

                        <section class="sidebar__item">
                            <div class="sidebar__item-title">
                                <a href="" class="sidebar__item-title-link">Hồ sơ diễn viên</a>
                            </div>

                            <ul class="sidebar__actors">
                                <li class="sidebar__actor">
                                    <a href="" class="sidebar__actor-link">
                                        <div class="sidebar__actor-img" style="background-image: url('https://img.bilutv.cc/actor/5948/poster.jpg')"></div>
                                        <span class="sidebar__actor-name">Cúc Tịnh Y</span>
                                    </a>
                                </li>
                                <li class="sidebar__actor">
                                    <a href="" class="sidebar__actor-link">
                                        <div class="sidebar__actor-img" style="background-image: url(<?=DOMAIN?>/Public/frontend/images/tonguylong.jpg)"></div>
                                        <span class="sidebar__actor-name">Tống Uy Long</span>
                                    </a>
                                </li>
                                <li class="sidebar__actor">
                                    <a href="" class="sidebar__actor-link">
                                        <div class="sidebar__actor-img" style="background-image: url(<?=DOMAIN?>/Public/frontend/images/damtungvan.jpg)"></div>
                                        <span class="sidebar__actor-name">Đàm Tùng Vận</span>
                                    </a>
                                </li>
                                <li class="sidebar__actor">
                                    <a href="" class="sidebar__actor-link">
                                        <div class="sidebar__actor-img" style="background-image: url(<?=DOMAIN?>/Public/frontend/images/duongmich.jpg)"></div>
                                        <span class="sidebar__actor-name">Dương Mịch</span>
                                    </a>
                                </li>
                                <li class="sidebar__actor">
                                    <a href="" class="sidebar__actor-link">
                                        <div class="sidebar__actor-img" style="background-image: url(<?=DOMAIN?>/Public/frontend/images/ngogiaidi.jpg)"></div>
                                        <span class="sidebar__actor-name">Ngô Dai Di</span>
                                    </a>
                                </li>
                                <li class="sidebar__actor">
                                    <a href="" class="sidebar__actor-link">
                                        <div class="sidebar__actor-img" style="background-image: url(<?=DOMAIN?>/Public/frontend/images/kimjiso.jpg)"></div>
                                        <span class="sidebar__actor-name">Kim Ji Soo</span>
                                    </a>
                                </li>
                            </ul>
                        </section>

                        <section class="sidebar__info">
                            <p class="sidebar__info-content">
                                BiluTV - trang web xem phim mới online miễn phí chất lượng Full HD,
                                cập nhật nhiều phim hoa ngữ, phim hàn quốc, tv show, anime vietsub,
                                thuyết minh, phim chiếu rạp nhanh nhất, bilutv luôn đồng hành
                                và mang đến trải nghiệm xem phim tốt nhất đến với những mọt phim!
                            </p>
                        </section>
                    </aside>