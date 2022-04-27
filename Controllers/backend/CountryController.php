<?php

class CountryController extends BaseController {
    private $countryModel;
    private $dataUser;

    public function __construct() {
        $this->dataUser = parent::checkLogin();
        $this->loadModel('CountryModel');
        $this->countryModel = new CountryModel();
    }

    public function index() {
        $totalCountry = $this->countryModel->getTotalCountry();

        $currentPage = isset($_GET['page']) ? $_GET['page'] : 0;
        if ($currentPage > $totalCountry) {
            $currentPage = $totalCountry;
        } else if ($currentPage < 1) {
            $currentPage = 0;
        }

        $limit = 5;
        $totalPage = ceil($totalCountry / $limit);
        $start = ($currentPage - 1) * $limit;

        if ($currentPage > $totalPage) {
            header('Location: ' . DOMAIN . '/?module=backend&controller=country&page=' . $totalPage);
        } else if ($currentPage < 1) {
            header('Location: ' . DOMAIN . '/?module=backend&controller=country&page=1');
        }

        $countryList = $this->countryModel->getCountryList($start, $limit);

        $this->loadView('partitions.backend.header', [
            'data_user' => $this->dataUser,
        ]);
        $this->loadView('partitions.backend.sidebar', [
            'data_user' => $this->dataUser,
        ]);

        $this->loadView('backend.country.index', [
            'totalCountry' => $totalCountry,
            'countryList' => $countryList,
            'totalPage' => $totalPage,
            'currentPage' => $currentPage
        ]);

        $this->loadView('partitions.backend.footer', [
            'data_user' => $this->dataUser,
        ]);
    }

    public function edit() {
        $id = $_GET['id'];
        $countryData = $this->countryModel->findCountryById($id);

        if(isset($_POST['edit_country'])){
            $errorMessage = array();
            $product = array();
            
            $product['countryName'] = isset($_POST['countryName']) ? $this->countryModel->uppercaseFirstChar(trim($_POST['countryName'])) : '';
            $product['countrySlug'] = isset($_POST['countrySlug']) ? trim($_POST['countrySlug']) : '';

            if(!$product['countryName']){
                $errorMessage['countryName'] = "Vui lòng nhập tên Quốc gia";
            }

            if(!$product['countrySlug']){
                $errorMessage['countrySlug'] = "Vui lòng nhập slug danh mục";
            }else if(($this->countryModel->checkExist('slug', $product['countrySlug'])) && ($product['countrySlug'] != $countryData['slug'])) {
                $errorMessage['countrySlug'] = "Vui lòng nhập slug danh mục (danh mục đã tồn tại)";
            }

            if(empty($errorMessage)){
                $this->countryModel->update($product['countryName'], $product['countrySlug'], $id);
                header('Location: ' . DOMAIN . '/?module=backend&controller=country');
            }
        }else{
            $errorMessage = null;
            $product = null;
        }

        $this->loadView('partitions.backend.header', [
            'data_user' => $this->dataUser,
        ]);
        $this->loadView('partitions.backend.sidebar', [
            'data_user' => $this->dataUser,
        ]);

        $this->loadView('backend.country.edit', [
            'countryData' => $countryData,
            'errorMessage' => $errorMessage,
            'product' => $product
        ]);

        $this->loadView('partitions.backend.footer', [
            'data_user' => $this->dataUser,
        ]);
    }

    public function add() {
        if(isset($_POST['add_country'])){
            $errorMessage = array();
            $product = array();
            
            $product['countryName'] = isset($_POST['countryName']) ? $this->countryModel->uppercaseFirstChar(trim($_POST['countryName'])) : '';
            $product['countrySlug'] = isset($_POST['countrySlug']) ? trim($_POST['countrySlug']) : '';

            if(!$product['countryName']){
                $errorMessage['countryName'] = "Vui lòng nhập tên Quốc gia";
            }

            if(!$product['countrySlug']){
                $errorMessage['countrySlug'] = "Vui lòng nhập slug Quốc gia";
            }else if($this->countryModel->checkExist('slug', $product['countrySlug'])){
                $errorMessage['countrySlug'] = "Vui lòng nhập lại slug (slug đã tồn tại)";
            }

            if(empty($errorMessage)){
                $this->countryModel->addCountry($product['countryName'], $product['countrySlug']);
                $isSuccess = true;
                unset($product);
                $product = null;
            }else{
                $isSuccess = false;
            }
        }else{
            $errorMessage = null;
            $product = null;
            $isSuccess = null;
        }

        $this->loadView('partitions.backend.header', [
            'data_user' => $this->dataUser,
        ]);
        $this->loadView('partitions.backend.sidebar', [
            'data_user' => $this->dataUser,
        ]);

        $this->loadView('backend.country.add', [
            'errorMessage' => $errorMessage,
            'product' => $product,
            'isSuccess' => $isSuccess
        ]);

        $this->loadView('partitions.backend.footer', [
            'data_user' => $this->dataUser,
        ]);
    }

    public function delete() {
        $id = isset($_GET['id']) ? $_GET['id'] : '';

        if($id) {
            $this->countryModel->deleteCountry($id);
        }

        header('Location: ' . DOMAIN . '/?module=backend&controller=country');
    }
}

?>