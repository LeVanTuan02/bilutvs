        </div>
        </div>
        </div>
        <!-- end content -->
        <!-- footer -->
        <footer class="footer">
            <div class="grid wide">
                <ul class="footer__tags">
                    <li class="footer__tag">
                        <a href="" class="footer__tag-link">FullPhims.net</a>
                    </li>
                    <li class="footer__tag">
                        <a href="" class="footer__tag-link">FullPhims.net</a>
                    </li>
                    <li class="footer__tag">
                        <a href="" class="footer__tag-link">FullPhims.net</a>
                    </li>
                    <li class="footer__tag">
                        <a href="" class="footer__tag-link">FullPhims.net</a>
                    </li>
                    <li class="footer__tag">
                        <a href="" class="footer__tag-link">FullPhims.net</a>
                    </li>
                    <li class="footer__tag">
                        <a href="" class="footer__tag-link">FullPhims.net</a>
                    </li>
                    <li class="footer__tag">
                        <a href="" class="footer__tag-link">FullPhims.net</a>
                    </li>
                    <li class="footer__tag">
                        <a href="" class="footer__tag-link">FullPhims.net</a>
                    </li>
                    <li class="footer__tag">
                        <a href="" class="footer__tag-link">FullPhims.net</a>
                    </li>
                    <li class="footer__tag">
                        <a href="" class="footer__tag-link">FullPhims.net</a>
                    </li>
                    <li class="footer__tag">
                        <a href="" class="footer__tag-link">FullPhims.net</a>
                    </li>
                    <li class="footer__tag">
                        <a href="" class="footer__tag-link">FullPhims.net</a>
                    </li>
                    <li class="footer__tag">
                        <a href="" class="footer__tag-link">FullPhims.net</a>
                    </li>
                    <li class="footer__tag">
                        <a href="" class="footer__tag-link">FullPhims.net</a>
                    </li>
                    <li class="footer__tag">
                        <a href="" class="footer__tag-link">FullPhims.net</a>
                    </li>
                </ul>

                <div class="footer__logo">
                    <a href="" class="footer__logo-link">
                        <img src="<?=DOMAIN?>/Public/frontend/images/logo-bilutv-bold.png" alt="">
                    </a>
                </div>

                <div class="footer__copyright">
                    <p class="footer__copyright-text">Copyright ® 2020 BiluTV ver 2.0 All Rights Reserved.</p>
                    <strong>bilutv mới - xem phim hay chất lượng full hd</strong>
                    <p>Liên hệ: bilutv.org@gmail.com</p>
                    <div class="footer__copyright-link">
                        <a href="">sitemap</a>
                        <span> | </span>
                        <a href="">contact</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end footer -->

        <!-- button scroll -->
        <div class="scroll-top-btn">
            <i class="fas fa-arrow-circle-up"></i>
        </div>
        <!-- end button scroll -->

        <!-- show toast message -->
        <div id="toast"></div>
        <!-- show toast message -->

    </div>
    <script src="<?=DOMAIN?>/Public/frontend/js/script.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="<?=DOMAIN?>/Public/frontend/slick-1.8.1/slick.js"></script>
    <script>
        $(document).ready(function(){
            $('.content__home-sliders').slick({
                autoplay: true,
                dots: true,
                customPaging: function(slider, i) {
                    return '<button class="content__home-sliders-dot"></button>';
                },
                prevArrow: '<div class="content__home-sliders-arrow arrow-pre"><i class="fas fa-chevron-left"></i></div>',
                nextArrow: '<div class="content__home-sliders-arrow arrow-next"><i class="fas fa-chevron-right"></i></div>'
            });
        });
    </script>
    <script>
        const menuListElement = Array.from(document.querySelectorAll('.header__menu-tablet-mobile-item'));
    </script>

    <?php

        $action = $_GET['action'] ?? '';
        if ($action) {
            switch($action) {
                case 'long_film':
                    echo '<script>menuListElement[1].classList.add("active");</script>';
                    break;
                case 'short_film':
                    echo '<script>menuListElement[2].classList.add("active");</script>';
                    break;
                case 'tu_phim':
                    echo '<script>menuListElement[4].classList.add("active");</script>';
                    break;
            }
        }

    ?>
    
</body>
</html>