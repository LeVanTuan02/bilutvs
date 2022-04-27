<?php

class EpisodeController extends BaseController {

    private $episodeModel;
    private $dataUser;

    public function __construct() {
        $this->dataUser = parent::checkLogin();
        $this->loadModel('EpisodeModel');
        $this->episodeModel = new EpisodeModel();
    }

    public function index() {

        $idFilm = $_GET['id'];
        $totalEpisode = $this->episodeModel->getSummary($idFilm);
        $limit = $start = '';
        $totalPage = $currentPage = 0;

        if ($totalEpisode) {
            $currentPage = isset($_GET['page']) ? $_GET['page'] : 0;
            if ($currentPage > $totalEpisode) {
                $currentPage = $totalEpisode;
            } else if ($currentPage < 1) {
                $currentPage = 0;
            }
    
            $limit = 5;
            $totalPage = ceil($totalEpisode / $limit);
            $start = ($currentPage - 1) * $limit;
    
            if ($currentPage > $totalPage) {
                header('Location: ' . DOMAIN . '/?module=backend&controller=episode&id='.$idFilm.'&page=' . $totalPage);
            } else if ($currentPage < 1) {
                header('Location: ' . DOMAIN . '/?module=backend&controller=episode&id='.$idFilm.'&page=1');
            }
        }


        $filmData = $this->episodeModel->getEpisodeById($idFilm, $start, $limit);

        $this->loadView('partitions.backend.header', [
            'data_user' => $this->dataUser
        ]);
        $this->loadView('partitions.backend.sidebar', [
            'data_user' => $this->dataUser
        ]);
        $this->loadView('backend.episode.index', [
            'filmData' => $filmData,
            'idFilm' => $idFilm,
            'totalEpisode' => $totalEpisode,
            'currentPage' => $currentPage,
            'totalPage' => $totalPage
        ]);
        $this->loadView('partitions.backend.footer', [
            'data_user' => $this->dataUser
        ]);
    }

    public function add() {
        $idFilm = $_GET['id'];
        $filmName = $this->episodeModel->getNameFilmById($idFilm)[0];
        $episodeCurrent = $this->episodeModel->getEpisodeLatest($idFilm)[0];

        if(isset($_POST['add_product'])){
            $errorMessage = array();
            $product = array();
            
            $product['filmEpisode'] = isset($_POST['filmEpisode']) ? $_POST['filmEpisode'] : '';
            $product['filmPlayer'] = isset($_POST['filmPlayer']) ? $_POST['filmPlayer'] : '';

            if(!$product['filmPlayer']){
                $errorMessage['filmPlayer'] = "Vui lòng nhập link player";
            }
            // else if(!filter_var($product['filmPlayer'], FILTER_VALIDATE_URL)){
            //     $errorMessage['filmPlayer'] = "Vui lòng nhập lại link player";
            // }

            if(!$product['filmEpisode']){
                $errorMessage['filmEpisode'] = "Vui lòng nhập tập phim";
            }else if($product['filmEpisode'] < 0){
                $errorMessage['filmEpisode'] = "Số tập phải là số dương";
            }else if(!is_numeric($product['filmEpisode'])){
                $errorMessage['filmEpisode'] = "Vui lòng nhập số";
            }else if($this->episodeModel->checkEpisodeExists($idFilm, $product['filmEpisode'])) {
                $errorMessage['filmEpisode'] = "Tập phim đã tồn tại";
            }

            if(empty($errorMessage)){
                $this->episodeModel->addEpisode($product['filmEpisode'], trim($product['filmPlayer']), $idFilm);
                unset($product);
                $product = null;
                $isSuccess = true;
                $episodeCurrent += 1;

            }else{
                $isSuccess = false;
            }
        }else{
            $errorMessage = null;
            $product = null;
            $isSuccess = false;
        }

        $this->loadView('partitions.backend.header', [
            'data_user' => $this->dataUser
        ]);
        $this->loadView('partitions.backend.sidebar', [
            'data_user' => $this->dataUser
        ]);

        $this->loadView('backend.episode.add', [
            'filmName' => $filmName,
            'idFilm' => $idFilm,
            'episodeCurrent' => $episodeCurrent,
            'errorMessage' => $errorMessage,
            'product' => $product,
            'isSuccess' => $isSuccess
        ]);

        $this->loadView('partitions.backend.footer', [
            'data_user' => $this->dataUser
        ]);
    }

    public function addlink() {
        if(isset($_POST['slug'])) {
            $slug = $_POST['slug'];
            echo $this->episodeModel->cloneHydrax($slug);
        }else{
            $error = array(
                'status' => false
            );
            echo json_encode($error);
        }
    }

    public function edit() {
        $idFilm = $_GET['id'];
        $idEpisode = $_GET['id_episode'];
        $episodeData = $this->episodeModel->findFilmById($idFilm, $idEpisode);
        $filmName = $this->episodeModel->getNameFilmById($idFilm)[0];

        if(isset($_POST['update'])){
            $errorMessage = array();
            $product = array();
            
            $product['filmEpisode'] = isset($_POST['filmEpisode']) ? $_POST['filmEpisode'] : '';
            $product['filmPlayer'] = isset($_POST['filmPlayer']) ? $_POST['filmPlayer'] : '';

            if(!$product['filmPlayer']){
                $errorMessage['filmPlayer'] = "Vui lòng nhập link player";
            }
            // else if(!filter_var($product['filmPlayer'], FILTER_VALIDATE_URL)){
            //     $errorMessage['filmPlayer'] = "Vui lòng nhập lại link player";
            // }

            if(!$product['filmEpisode']){
                $errorMessage['filmEpisode'] = "Vui lòng nhập tập phim";
            }else if($product['filmEpisode'] < 0){
                $errorMessage['filmEpisode'] = "Số tập phải là số dương";
            }else if(!is_numeric($product['filmEpisode'])){
                $errorMessage['filmEpisode'] = "Vui lòng nhập số";
            }else if(($this->episodeModel->checkEpisodeExists($idFilm, $product['filmEpisode']) && $product['filmEpisode'] != $episodeData['tap'])) {
                $errorMessage['filmEpisode'] = "Tập phim đã tồn tại";
            }

            if(empty($errorMessage)){
                // $product['filmPlayer'] = 'https://short.ink/' . trim($product['filmPlayer']);
                // $this->episodeModel->addEpisode($product['filmEpisode'], $product['filmPlayer'], $idFilm);
                // unset($product);
                // $isSuccess = true;
                $this->episodeModel->update(
                    $product['filmEpisode'],
                    $product['filmPlayer'],
                    $idEpisode
                );
                header('Location: ' . DOMAIN . '/?module=backend&controller=episode&id=' . $idFilm);
            }
        }else{
            $errorMessage = null;
            $product = null;
        }

        $this->loadView('partitions.backend.header', [
            'data_user' => $this->dataUser
        ]);
        $this->loadView('partitions.backend.sidebar', [
            'data_user' => $this->dataUser
        ]);

        $this->loadView('backend.episode.edit', [
            'episodeData' => $episodeData,
            'filmName' => $filmName,
            'idFilm' => $idFilm,
            // 'episodeCurrent' => $episodeCurrent,
            'errorMessage' => $errorMessage,
            'product' => $product,
            // 'isSuccess' => $isSuccess
        ]);

        $this->loadView('partitions.backend.footer', [
            'data_user' => $this->dataUser
        ]);
    }

    public function delete() {
        $idEpisode = isset($_GET['id_episode']) ? $_GET['id_episode'] : '';
        $id = $_GET['id'];

        if($idEpisode) {
            $this->episodeModel->delete($idEpisode);
        }

        header("location: " . DOMAIN . '/?module=backend&controller=episode&id=' . $id);
    }

}

?>