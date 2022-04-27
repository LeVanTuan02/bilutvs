<?php

class FilmController extends BaseController {

    private $filmModel;

    public function __construct() {
        $this->dataUser = parent::checkLogin();
        $this->loadModel('FilmModel');
        $this->filmModel = new FilmModel();
    }

    public function index() {
        $totalFilm = $this->filmModel->getSummary();
        $title = 'List Film';

        $currentPage = isset($_GET['page']) ? $_GET['page'] : 0;
        if ($currentPage > $totalFilm) {
            $currentPage = $totalFilm;
        } else if ($currentPage < 1) {
            $currentPage = 0;
        }

        $limit = 10;
        $totalPage = ceil($totalFilm / $limit);
        $start = ($currentPage - 1) * $limit;

        if ($currentPage > $totalPage) {
            header('Location: ' . DOMAIN . '/?module=backend&controller=film&page=' . $totalPage);
        } else if ($currentPage < 1) {
            header('Location: ' . DOMAIN . '/?module=backend&controller=film&page=1');
        }
        
        $filmData = $this->filmModel->getAllDataFilm($start, $limit);
        
        $this->loadView('partitions.backend.header', [
            'data_user' => $this->dataUser,
            'title' => $title
        ]);
        $this->loadView('partitions.backend.sidebar', [
            'data_user' => $this->dataUser
        ]);
        $this->loadView('backend.film.index', [
            'filmData' => $filmData,
            'totalFilm' => $totalFilm,
            'totalPage' => $totalPage,
            'currentPage' => $currentPage,
        ]);
        $this->loadView('partitions.backend.footer', [
            'data_user' => $this->dataUser
        ]);
    }

    public function add() {
        $cateList = $this->filmModel->getAllByOption('*', 'categories');
        $typeList = $this->filmModel->getAllByOption('*', 'type');
        $countryList = $this->filmModel->getAllByOption('*', 'national');
        $title = 'Add Films';

        if(isset($_POST['add_product'])){
            $errorMessage = array();
            $product = array();
            
            $product['filmName'] = isset($_POST['filmName']) ? $_POST['filmName'] : '';
            $product['filmLink'] = isset($_POST['filmLink']) ? $_POST['filmLink'] : '';
            $product['filmPoster'] = isset($_POST['filmPoster']) ? $_POST['filmPoster'] : '';
            $product['filmThumbnail'] = isset($_POST['filmThumbnail']) ? $_POST['filmThumbnail'] : '';
            $product['filmTotalEpisode'] = isset($_POST['filmTotalEpisode']) ? $_POST['filmTotalEpisode'] : '';
            $product['filmYear'] = isset($_POST['filmYear']) ? $_POST['filmYear'] : '';
            $product['filmNational'] = isset($_POST['filmNational']) ? $_POST['filmNational'] : '';
            $product['filmCate'] = isset($_POST['filmCate']) ? $_POST['filmCate'] : '';
            $product['filmType'] = isset($_POST['filmType']) ? $_POST['filmType'] : '';
            $product['filmDesc'] = isset($_POST['filmDesc']) ? htmlspecialchars(str_replace('\'', '\'\'', $_POST['filmDesc'])) : '';
            $product['filmRealName'] = isset($_POST['filmRealName']) ? str_replace('\'', '\'\'', ($_POST['filmRealName'])) : '';

            if(!$product['filmName']){
                $errorMessage['filmName'] = "Vui lòng nhập tên phim";
            }else{
                $product['filmName'] = $this->filmModel->uppercaseFirstChar($product['filmName']);
            }

            if(!$product['filmRealName']){
                $errorMessage['filmRealName'] = "Vui lòng nhập tên phim";
            }

            if(!$product['filmLink']){
                $errorMessage['filmLink'] = "Vui lòng nhập link phim";
            }else if($this->filmModel->checkExits('slug', $product['filmLink'])){
                $errorMessage['filmLink'] = "Link phim đã tồn tại";
            }

            if(!$product['filmPoster']){
                $errorMessage['filmPoster'] = "Vui lòng nhập link poster";
            }else if(!filter_var($product['filmPoster'], FILTER_VALIDATE_URL)){
                $errorMessage['filmPoster'] = "Vui lòng nhập lại link poster";
            }

            if(!$product['filmThumbnail']){
                $errorMessage['filmThumbnail'] = "Vui lòng nhập link thumbnail";
            }else if(!filter_var($product['filmThumbnail'], FILTER_VALIDATE_URL)){
                $errorMessage['filmThumbnail'] = "Vui lòng nhập lại link thumbnail";
            }

            if(!$product['filmTotalEpisode']){
                $errorMessage['filmTotalEpisode'] = "Vui lòng nhập tổng số tập phim";
            }else if($product['filmTotalEpisode'] < 0){
                $errorMessage['filmTotalEpisode'] = "Tổng số tập phải là số dương";
            }else if(!is_numeric($product['filmTotalEpisode'])){
                $errorMessage['filmTotalEpisode'] = "Vui lòng nhập số";
            }

            if(!$product['filmYear']){
                $errorMessage['filmYear'] = "Vui lòng chọn năm phát hành";
            }

            if(!$product['filmNational']){
                $errorMessage['filmNational'] = "Vui lòng chọn quốc gia";
            }

            if(!$product['filmCate']){
                $errorMessage['filmCate'] = "Vui lòng chọn thể loại";
            }

            if(!$product['filmType']){
                $errorMessage['filmType'] = "Vui lòng chọn loại phim";
            }

            if(!$product['filmDesc']){
                $errorMessage['filmDesc'] = "Vui lòng nhập mô tả";
            }

            if(empty($errorMessage)){
                $column = ['name', 'cate_id', 'poster', 'thumbnail', 'description', 'real_name', 'slug', 'total_episode', 'year', 'nation_id', 'type_id'];

                $dataFilm = [
                    "$product[filmName]",
                    "$product[filmCate]",
                    "$product[filmPoster]",
                    "$product[filmThumbnail]",
                    "$product[filmDesc]",
                    "$product[filmRealName]",
                    "$product[filmLink]",
                    "$product[filmTotalEpisode]",
                    "$product[filmYear]",
                    "$product[filmNational]",
                    "$product[filmType]"
                ];
                $this->filmModel->addFilm($column, $dataFilm);
                unset($product);
                $isSuccess = true;
                $product = null;
            }else{
                $isSuccess = false;
            }
        }else{
            $errorMessage = null;
            $product = null;
            $isSuccess = false;
        }

        $this->loadView('partitions.backend.header', [
            'data_user' => $this->dataUser,
            'title' => $title
        ]);
        $this->loadView('partitions.backend.sidebar', [
            'data_user' => $this->dataUser
        ]);
        $this->loadView('backend.film.addFilm', [
            'cateList' => $cateList,
            'typeList' => $typeList,
            'countryList' => $countryList,
            'errorMessage' => $errorMessage,
            'product' => $product,
            'isSuccess' => $isSuccess
        ]);
        $this->loadView('partitions.backend.footer', [
            'data_user' => $this->dataUser
        ]);
    }

    public function edit() {
        $idFilm = $_GET['id'];
        $filmData = $this->filmModel->getDataFilmById($idFilm);
        $countryList = $this->filmModel->getAllByOption('*', 'national');
        $cateList = $this->filmModel->getAllByOption('*', 'categories');
        $typeList = $this->filmModel->getAllByOption('*', 'type');
        $title = 'Update Films';
        $statusList = $this->filmModel->getAllByOption('*', 'status');

        if(isset($_POST['update_film'])){
            $errorMessage = array();
            $product = array();
            
            $product['filmName'] = isset($_POST['filmName']) ? $_POST['filmName'] : '';
            $product['filmLink'] = isset($_POST['filmLink']) ? $_POST['filmLink'] : '';
            $product['filmPoster'] = isset($_POST['filmPoster']) ? $_POST['filmPoster'] : '';
            $product['filmThumbnail'] = isset($_POST['filmThumbnail']) ? $_POST['filmThumbnail'] : '';
            $product['filmTotalEpisode'] = isset($_POST['filmTotalEpisode']) ? $_POST['filmTotalEpisode'] : '';
            $product['filmYear'] = isset($_POST['filmYear']) ? $_POST['filmYear'] : '';
            $product['filmNational'] = isset($_POST['filmNational']) ? $_POST['filmNational'] : '';
            $product['filmCate'] = isset($_POST['filmCate']) ? $_POST['filmCate'] : '';
            $product['filmType'] = isset($_POST['filmType']) ? $_POST['filmType'] : '';
            $product['filmDesc'] = isset($_POST['filmDesc']) ? htmlspecialchars($_POST['filmDesc']) : '';
            $product['filmRealName'] = isset($_POST['filmRealName']) ? $_POST['filmRealName'] : '';
            $product['filmStatus'] = isset($_POST['filmStatus']) ? $_POST['filmStatus'] : '';

            if(!$product['filmName']){
                $errorMessage['filmName'] = "Vui lòng nhập tên phim";
            }else{
                $product['filmName'] = $this->filmModel->uppercaseFirstChar($product['filmName']);
            }

            if(!$product['filmRealName']){
                $errorMessage['filmRealName'] = "Vui lòng nhập tên phim";
            }

            if(!$product['filmLink']){
                $errorMessage['filmLink'] = "Vui lòng nhập link phim";
            }else if(($this->filmModel->checkExits('slug', $product['filmLink'])) && ($product['filmLink'] != $filmData['slug'])){
                $errorMessage['filmLink'] = "Link phim đã tồn tại";
            }

            if(!$product['filmPoster']){
                $errorMessage['filmPoster'] = "Vui lòng nhập link poster";
            }else if(!filter_var($product['filmPoster'], FILTER_VALIDATE_URL)){
                $errorMessage['filmPoster'] = "Vui lòng nhập lại link poster";
            }

            if(!$product['filmThumbnail']){
                $errorMessage['filmThumbnail'] = "Vui lòng nhập link thumbnail";
            }else if(!filter_var($product['filmThumbnail'], FILTER_VALIDATE_URL)){
                $errorMessage['filmThumbnail'] = "Vui lòng nhập lại link thumbnail";
            }

            if(!$product['filmTotalEpisode']){
                $errorMessage['filmTotalEpisode'] = "Vui lòng nhập tổng số tập phim";
            }else if($product['filmTotalEpisode'] < 0){
                $errorMessage['filmTotalEpisode'] = "Tổng số tập phải là số dương";
            }else if(!is_numeric($product['filmTotalEpisode'])){
                $errorMessage['filmTotalEpisode'] = "Vui lòng nhập số";
            }

            if(!$product['filmYear']){
                $errorMessage['filmYear'] = "Vui lòng chọn năm phát hành";
            }

            if(!$product['filmNational']){
                $errorMessage['filmNational'] = "Vui lòng chọn quốc gia";
            }

            if(!$product['filmCate']){
                $errorMessage['filmCate'] = "Vui lòng chọn thể loại";
            }

            if(!$product['filmType']){
                $errorMessage['filmType'] = "Vui lòng chọn loại phim";
            }

            if(!$product['filmDesc']){
                $errorMessage['filmDesc'] = "Vui lòng nhập mô tả";
            }

            if($product['filmStatus'] === ''){
                $errorMessage['filmStatus'] = "Vui lòng chọn trạng thái phim";
            }

            if(empty($errorMessage)){
                $this->filmModel->update(
                    $product['filmName'],
                    $product['filmRealName'],
                    $product['filmLink'],
                    $product['filmPoster'],
                    $product['filmThumbnail'],
                    $product['filmTotalEpisode'],
                    $product['filmYear'],
                    $product['filmNational'],
                    $product['filmCate'],
                    $product['filmType'],
                    $product['filmStatus'],
                    $product['filmDesc'],
                    $idFilm
                );
                header('Location: '.DOMAIN.'/?module=backend&controller=film');
                // unset($product);
                // $isSuccess = true;
            }else{
                $isSuccess = false;
            }
        }else{
            $errorMessage = null;
            $product = null;
            $isSuccess = false;
        }

        $this->loadView('partitions.backend.header', [
            'data_user' => $this->dataUser,
            'title' => $title
        ]);
        $this->loadView('partitions.backend.sidebar', [
            'data_user' => $this->dataUser
        ]);
        $this->loadView('backend.film.edit', [
            'filmData' => $filmData,
            'countryList' => $countryList,
            'cateList' => $cateList,
            'typeList' => $typeList,
            'statusList' => $statusList,
            'errorMessage' => $errorMessage,
            'product' => $product,
            'isSuccess' => $isSuccess
        ]);
        $this->loadView('partitions.backend.footer', [
            'data_user' => $this->dataUser
        ]);
    }

    public function delete() {
        $idFilm = isset($_GET['id']) ? $_GET['id'] : '';

        if($idFilm) {
            $this->filmModel->deleteFilm($idFilm);
        }
        header('Location: ' . DOMAIN . '/?module=backend&controller=film');
    }
}

?>