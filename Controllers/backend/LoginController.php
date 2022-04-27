<?php

class LoginController extends BaseController {
    private $loginModel;
    private $userModel;

    public function __construct() {
        $this->loadModel('LoginModel');
        $this->loadModel('UserModel');
        $this->loginModel = new LoginModel();
        $this->userModel = new UserModel();

        if($this->loginModel->checkUserLogin()){
            header('Location: ' . DOMAIN . '/?module=backend');
        }
    }

    public function index() {
        if(isset($_POST['login'])){
            $errorMessage = array();
            $user = array();
            
            $user['username'] = isset($_POST['username']) ? strtolower($_POST['username']) : '';
            $user['password'] = isset($_POST['password']) ? $_POST['password'] : '';

            // kiểm tra username có tồn tại trong database không
            if($this->userModel->checkUsernameExists($user['username'])){
                $data_user = $this->userModel->getUser($user['username']);
            }

            if($user['username'] == ''){
                $errorMessage['username'] = "Vui lòng nhập Username";
            }

            if($user['password'] == ''){
                $errorMessage['password'] = "Vui lòng nhập mật khẩu";
            }

            if($user['username'] && $user['password']){
                if((isset($data_user)) && ($user['username'] == $data_user['username']) && (md5($user['password']) == $data_user['password'])){
                    if($data_user['status'] == 0){
                        $errorMessage['login'] = 'Tài khoản của bạn bị khóa, vui lòng liên hệ QTV';
                    }else{
                        $data_user_login = array(
                            'username' => $data_user['username'],
                            'password' => $data_user['password']
                        );
                        $this->loginModel->sendData($data_user_login);
                        header('Location: ' . DOMAIN . '/?module=backend');
                    }
                }else{
                    $errorMessage['login'] = 'Tài khoản hoặc mật khẩu không chính xác';
                }
            }
        }else{
            $errorMessage = null;
            $user = null;
        }

        $this->loadView('backend.login.index', [
            'errorMessage' => $errorMessage,
            'user' => $user
        ]);
    }
}

?>