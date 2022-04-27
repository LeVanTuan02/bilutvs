<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RIN - COFFEE</title>
    <link rel="stylesheet" href="<?=DOMAIN?>/Public/backend/css/login.css">
    <link rel="icon" href="<?=DOMAIN?>/Public/backend/images/favicon.ico" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <aside class="login__aside">
            <div class="login__aside-heading">
                <a href="" class="login__aside-logo-link">
                    <img src="<?=DOMAIN?>/Public/backend/images/login-logo.png" alt="" class="login__aside-logo">
                </a>
                <h3 class="login__aside-title">
                    Discover Amazing Metronic <br>
                    with great build tools
                </h3>
            </div>

            <div class="login__aside-background"></div>
        </aside>

        <main class="login__content">
            <div class="login__content-form-wrap">

                <!-- form đăng nhập -->
                <form action="" class="login__content-form active" id="form__login" method="POST">
                    <div class="login__content-heading">
                        <h3 class="login__content-title">Welcome to Rin - Coffee</h3>
                        <span class="login__content-desc">
                            <span class="login__content-desc-label">Now Here?</span>
                            <a href="./register.php" class="login__content-desc-link">Create an Account</a>
                        </span>
                    </div>
    
                    <div class="login__content-body">
                        <div class="form__group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="username" value="<?php echo isset($user['username']) ? $user['username'] : '';?>">
                            <span class="form-message">
                                <?php echo isset($errorMessage['username']) ? $errorMessage['username'] : '';?>
                            </span>
                        </div>
    
                        <div class="form__group">
                            <div class="form__group-forgot">
                                <label for="password">Password</label>
                                <a href="./recoverpass.php" class="form__group-link">Quên mật khẩu?</a>
                            </div>
                            <input type="password" name="password" class="password" value="<?php echo isset($user['password']) ? $user['password'] : '';?>">
                            <span class="form-message">
                                <?php echo isset($errorMessage['password']) ? $errorMessage['password'] : '';?>
                            </span>
                        </div>

                        <div class="form__group">
                            <span class="form-message">
                                <?php echo isset($errorMessage['login']) ? $errorMessage['login'] : '';?>
                            </span>
                        </div>
    
                        <div class="form__group form__btn">
                            <button type="submit" name="login" class="form-btn-login">Đăng nhập</button>
                            <button type="submit" class="form-btn-login">
                                <div class="form-btn-login-icon">
                                    <i class="fab fa-google"></i>
                                </div>
                                Đăng nhập với Google
                            </button>
                        </div>
                    </div>
                </form>
                <!-- form đăng nhập -->
            </div>

            <!-- footer -->
            <footer class="footer">
                <span class="footer__text">2021 ©</span>
                <a href="" class="footer__copyright">Lê Văn Tuân</a>
            </footer>
            <!-- footer -->
        </main>
    </div>
    <!-- validate client -->
    <script src="<?=DOMAIN?>/Public/backend/js/validate.js"></script>
</body>
</html>
