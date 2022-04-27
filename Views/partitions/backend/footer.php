        <section class="user__panel">
            <div class="user__panel-overlay hide"></div>
            <div class="user__panel-content">
                <div class="user__panel-heading">
                    <div class="user__panel-title">User Profile</div>
                    <div class="user__panel-heading-icon">
                        <i class="far fa-times-circle"></i>
                    </div>
                </div>

                <div class="user__panel-body">
                    <div class="user__panel-info">
                        <div class="user__panel-img">
                            <img src="
                                <?php
                                    if($data_user['url_avatar'] == ''){
                                        echo DOMAIN . '/Public/backend/images/profile.png';
                                    }else{
                                        echo $data_user['url_avatar'];
                                    }
                                ?>
                            " alt="">
                        </div>
                        <div class="user__panel-info-details">
                            <span class="user__panel-info-name">
                                <?php
                                    if($data_user['name_display'] == ''){
                                        echo $data_user['username'];
                                    }else{
                                        echo $data_user['name_display'];
                                    }
                                ?>
                            </span>
                            <span class="user__panel-info-email">
                                <?php
                                    if($data_user['email'] == ''){
                                        echo 'Email not found!';
                                    }else{
                                        echo $data_user['email'];
                                    }
                                ?>
                            </span>
                            <a href="logout.php" class="user__panel-btn">Đăng xuất</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer class="footer">
            <span class="footer__text">2021 ©</span>
            <a href="https://www.facebook.com/LeVanTuan.Info/" target="_blank" class="footer__copyright">Lê Văn Tuân</a>
        </footer>
    </div>
    <script>
        var list_tab = Array.from(document.querySelectorAll('.aside__menu-item'));
    </script>

    <?php
        if(isset($_GET['controller'])) {
            $ctrl = $_GET['controller'];
            $action = $_GET['action'] ?? '';
            echo '<script type="text/JavaScript">document.querySelector(".aside__menu-item.aside__menu-item--active").classList.remove("aside__menu-item--active")</script>';

            if($ctrl == 'film'  && $action == 'add'){
                echo '<script type="text/JavaScript">list_tab[2].classList.add("aside__menu-item--active")</script>';
            }else if($ctrl == 'film'){
                echo '<script type="text/JavaScript">list_tab[1].classList.add("aside__menu-item--active")</script>';
            }else if($ctrl == 'category'  && $action == 'add'){
                echo '<script type="text/JavaScript">list_tab[4].classList.add("aside__menu-item--active")</script>';
            }else if($ctrl == 'category'){
                echo '<script type="text/JavaScript">list_tab[3].classList.add("aside__menu-item--active")</script>';
            }else if($ctrl == 'country'  && $action == 'add'){
                echo '<script type="text/JavaScript">list_tab[6].classList.add("aside__menu-item--active")</script>';
            }else if($ctrl == 'country'){
                echo '<script type="text/JavaScript">list_tab[5].classList.add("aside__menu-item--active")</script>';
            }
        }
    ?>
    <script src="<?=DOMAIN?>/Public/backend/js/togglemenu.js"></script>
    <script src="<?=DOMAIN?>/Public/backend/js/validate.js"></script>

</body>
</html>