<?php

class CategoryController extends BaseController {
    private $categoryModel;
    private $dataUser;

    public function __construct() {
        $this->dataUser = parent::checkLogin();
        $this->loadModel('CategoryModel');
        $this->categoryModel = new CategoryModel();
    }

    public function index() {
        $totalCate = $this->categoryModel->getTotalCate();

        $currentPage = isset($_GET['page']) ? $_GET['page'] : 0;
        if ($currentPage > $totalCate) {
            $currentPage = $totalCate;
        } else if ($currentPage < 1) {
            $currentPage = 0;
        }

        $limit = 5;
        $totalPage = ceil($totalCate / $limit);
        $start = ($currentPage - 1) * $limit;

        if ($currentPage > $totalPage) {
            header('Location: ' . DOMAIN . '/?module=backend&controller=category&page=' . $totalPage);
        } else if ($currentPage < 1) {
            header('Location: ' . DOMAIN . '/?module=backend&controller=category&page=1');
        }

        $cateList = $this->categoryModel->getCateList($start, $limit);

        $this->loadView('partitions.backend.header', [
            'data_user' => $this->dataUser,
        ]);
        $this->loadView('partitions.backend.sidebar', [
            'data_user' => $this->dataUser,
        ]);

        $this->loadView('backend.category.index', [
            'totalCate' => $totalCate,
            'cateList' => $cateList,
            'currentPage' => $currentPage,
            'totalPage' => $totalPage
        ]);

        $this->loadView('partitions.backend.footer', [
            'data_user' => $this->dataUser,
        ]);
    }

    public function edit() {
        $id = $_GET['id'];
        $cateData = $this->categoryModel->findCateById($id);

        if(isset($_POST['edit_cate'])){
            $errorMessage = array();
            $product = array();
            
            $product['cateTitle'] = isset($_POST['cateTitle']) ? $this->categoryModel->uppercaseFirstChar(trim($_POST['cateTitle'])) : '';
            $product['cateSlug'] = isset($_POST['cateSlug']) ? trim($_POST['cateSlug']) : '';

            if(!$product['cateTitle']){
                $errorMessage['cateTitle'] = "Vui lòng nhập tiêu đề danh mục";
            }

            if(!$product['cateSlug']){
                $errorMessage['cateSlug'] = "Vui lòng nhập slug danh mục";
            }else if(($this->categoryModel->checkExist('slug', $product['cateSlug'])) && ($product['cateSlug'] != $cateData['slug'])) {
                $errorMessage['cateSlug'] = "Vui lòng nhập slug danh mục (danh mục đã tồn tại)";
            }

            if(empty($errorMessage)){
                $this->categoryModel->update($product['cateTitle'], $product['cateSlug'], $id);
                header('Location: ' . DOMAIN . '/?module=backend&controller=category');
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

        $this->loadView('backend.category.edit', [
            'cateData' => $cateData,
            'errorMessage' => $errorMessage,
            'product' => $product
        ]);

        $this->loadView('partitions.backend.footer', [
            'data_user' => $this->dataUser,
        ]);
    }

    public function add() {
        if(isset($_POST['add_cate'])){
            $errorMessage = array();
            $product = array();
            
            $product['cateTitle'] = isset($_POST['cateTitle']) ? $this->categoryModel->uppercaseFirstChar(trim($_POST['cateTitle'])) : '';
            $product['cateSlug'] = isset($_POST['cateSlug']) ? trim($_POST['cateSlug']) : '';

            if(!$product['cateTitle']){
                $errorMessage['cateTitle'] = "Vui lòng nhập tiêu đề danh mục";
            }

            if(!$product['cateSlug']){
                $errorMessage['cateSlug'] = "Vui lòng nhập slug danh mục";
            }else if($this->categoryModel->checkExist('slug', $product['cateSlug'])){
                $errorMessage['cateSlug'] = "Danh mục đã tồn tại";
            }

            if(empty($errorMessage)){
                $this->categoryModel->addCate($product['cateTitle'], $product['cateSlug']);
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

        $this->loadView('backend.category.add', [
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
            $this->categoryModel->deleteCate($id);
        }

        header('Location: ' . DOMAIN . '/?module=backend&controller=category');
    }
}

?>