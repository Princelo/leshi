<?php

class AjaxController extends Controller
{

    public function actionFetchall()
    {
        $photo_model = Photo::model();
        $per = 8;
        if(isset($_GET['battle']) && $_GET['battle']=='1'){
            $total = $photo_model->countByAttributes(array('battle'=>'1'));
            $page = new PaginationAjax($total, $per);
            $sql = "select * from {{photo}} WHERE battle='1' order by photo_id desc {$page -> limit}";
        }else{
            $total = $photo_model->countByAttributes(array('battle'=>'0'));
            $page = new PaginationAjax($total, $per);
            $sql = "select * from {{photo}} WHERE battle='0' order by photo_id desc {$page -> limit}";
        }
        $photo_infos = $photo_model -> findAllBySql($sql);
        $page_list = $page -> fpage();
        $this -> renderPartial('fetchall',array('photo_infos'=>$photo_infos,'page_list'=>$page_list));
        //$this->render('photo');
    }
    public function actionFetchone()
    {
        $photo_model = Photo::model();
        $per = 8;
        if(isset($_GET['battle']) && $_GET['battle']=='1'){
            $total = $photo_model->countByAttributes(array('battle'=>'1', 'photo_category'=>'0'));
            $page = new PaginationAjax($total, $per);
            $sql = "select * from {{photo}} WHERE battle='1' AND photo_category='0' order by photo_id desc {$page -> limit}";
        }else{
            $total = $photo_model->countByAttributes(array('battle'=>'0', 'photo_category'=>'0'));
            $page = new PaginationAjax($total, $per);
            $sql = "select * from {{photo}} WHERE battle='0' AND photo_category='0' order by photo_id desc {$page -> limit}";
        }
        $photo_infos = $photo_model -> findAllBySql($sql);
        $page_list = $page -> fpage();
        $this -> renderPartial('fetchone', array('photo_infos' => $photo_infos, 'page_list'=>$page_list));
    }
    public function actionFetchtwo()
    {
        $photo_model = Photo::model();
        $per = 8;
        if(isset($_GET['battle']) && $_GET['battle']=='1'){
            $total = $photo_model->countByAttributes(array('battle'=>'1', 'photo_category'=>'1'));
            $page = new PaginationAjax($total, $per);
            $sql = "select * from {{photo}} WHERE battle='1' AND photo_category='1' order by photo_id desc {$page -> limit}";
        }else{
            $total = $photo_model->countByAttributes(array('battle'=>'0', 'photo_category'=>'1'));
            $page = new PaginationAjax($total, $per);
            $sql = "select * from {{photo}} WHERE battle='0' AND photo_category='1' order by photo_id desc {$page -> limit}";
        }
        $photo_infos = $photo_model -> findAllBySql($sql);
        $page_list = $page -> fpage();
        $this -> renderPartial('fetchtwo', array('photo_infos' => $photo_infos, 'page_list'=>$page_list));
    }
    public function actionFetchthree()
    {
        $photo_model = Photo::model();
        $per = 8;
        if(isset($_GET['battle']) && $_GET['battle']=='1'){
            $total = $photo_model->countByAttributes(array('battle'=>'1', 'photo_category'=>'2'));
            $page = new PaginationAjax($total, $per);
            $sql = "select * from {{photo}} WHERE battle='1' AND photo_category='2' order by photo_id desc {$page -> limit}";
        }else{
            $total = $photo_model->countByAttributes(array('battle'=>'0', 'photo_category'=>'2'));
            $page = new PaginationAjax($total, $per);
            $sql = "select * from {{photo}} WHERE battle='0' AND photo_category='2' order by photo_id desc {$page -> limit}";
        }
        $photo_infos = $photo_model -> findAllBySql($sql);
        $page_list = $page -> fpage();
        $this -> renderPartial('fetchthree', array('photo_infos' => $photo_infos, 'page_list'=>$page_list));
    }
    public function actionFetchfour()
    {
        $photo_model = Photo::model();
        $per = 8;
        if(isset($_GET['battle']) && $_GET['battle']=='1'){
            $total = $photo_model->countByAttributes(array('battle'=>'1', 'photo_category'=>'3'));
            $page = new PaginationAjax($total, $per);
            $sql = "select * from {{photo}} WHERE battle='1' AND photo_category='3' order by photo_id desc {$page -> limit}";
        }else{
            $total = $photo_model->countByAttributes(array('battle'=>'0', 'photo_category'=>'3'));
            $page = new PaginationAjax($total, $per);
            $sql = "select * from {{photo}} WHERE battle='0' AND photo_category='3' order by photo_id desc {$page -> limit}";
        }
        $photo_infos = $photo_model -> findAllBySql($sql);
        $page_list = $page -> fpage();
        $this -> renderPartial('fetchfour', array('photo_infos' => $photo_infos, 'page_list'=>$page_list));
    }

    public function actionFetchplayersvideo()
    {
        $video_model = Video::model();
        $total = $video_model->countByAttributes(array('video_category'=>'0'));
        $per = 8;
        $page = new PaginationAjax($total, $per);
        $sql = "SELECT * FROM {{video}} WHERE video_category='0' ORDER BY video_id DESC {$page->limit}";
        $video_infos = $video_model->findAllBySql($sql);
        $page_list = $page->fpage();
        $this -> renderPartial('fetchplayersvideo', array('video_infos'=>$video_infos, 'page_list'=>$page_list));
    }
    public function actionFetchnewsvideo()
    {
        $video_model = Video::model();
        $total = $video_model->countByAttributes(array('video_category'=>'1'));
        $per = 8;
        $page = new PaginationAjax($total, $per);
        $sql = "SELECT * FROM {{video}} WHERE video_category='1' ORDER BY video_id DESC {$page->limit}";
        $video_infos = $video_model->findAllBySql($sql);
        $page_list = $page->fpage();
        $this -> renderPartial('fetchnewsvideo', array('video_infos'=>$video_infos, 'page_list'=>$page_list));
    }
    public function actionFetchtitbitsvideo()
    {
        $video_model = Video::model();
        $total = $video_model->countByAttributes(array('video_category'=>'2'));
        $per = 8;
        $page = new PaginationAjax($total, $per);
        $sql = "SELECT * FROM {{video}} WHERE video_category='2' ORDER BY video_id DESC {$page->limit}";
        $video_infos = $video_model->findAllBySql($sql);
        $page_list = $page->fpage();
        $this -> renderPartial('fetchtitbitsvideo', array('video_infos'=>$video_infos, 'page_list'=>$page_list));
    }

    public function actionFetchvote()
    {
        $players_model = Players::model();
        $total = $players_model->countByAttributes(array('is_cut'=>'1'));
        $per = 12;
        $page = new PaginationAjax($total, $per);
        $sql = "SELECT * FROM {{players}} WHERE is_cut='1' {$page->limit}";
        $players_infos = $players_model->findAllBySql($sql);
        $page_list = $page->fpage();
        $this->renderPartial('fetchvote', array('players_infos'=>$players_infos,'page_list'=>$page_list));
    }

    public function actionFetchnews()
    {
        $news_model = News::model();
        $total = $news_model->countByAttributes(array('type'=>'default'));
        $per = 10;
        $page = new PaginationAjax($total, $per);
        $sql = "select * from {{news}} WHERE type='default' order by news_id desc {$page -> limit}";
        $news_infos = $news_model -> findAllBySql($sql);
        $page_list = $page -> fpage();
        $this -> renderPartial('fetchnews',array('news_infos'=>$news_infos,'page_list'=>$page_list));
        //$this->render('photo');
    }

    public function actionFetchannouncement()
    {
        $news_model = News::model();
        $total = $news_model->countByAttributes(array('type'=>'announcement'));
        $per = 10;
        $page = new PaginationAjax($total, $per);
        $sql = "select * from {{news}} WHERE type='announcement' order by news_id desc {$page -> limit}";
        $news_infos = $news_model -> findAllBySql($sql);
        $page_list = $page -> fpage();
        $this -> renderPartial('fetchannouncement',array('news_infos'=>$news_infos,'page_list'=>$page_list));
        //$this->render('photo');
    }
    public function actionFetchcontribute()
    {
        $news_model = News::model();
        $total = $news_model->countByAttributes(array('type'=>'contribute'));
        $per = 10;
        $page = new PaginationAjax($total, $per);
        $sql = "select * from {{news}} WHERE type='contribute' order by news_id desc {$page -> limit}";
        $news_infos = $news_model -> findAllBySql($sql);
        $page_list = $page -> fpage();
        $this -> renderPartial('fetchcontribute',array('news_infos'=>$news_infos,'page_list'=>$page_list));
        //$this->render('photo');
    }


    /*public function actionFetchtwo()
    {
        $photo_model = Photo::model();
        $total = $photo_model->countByAttributes(array('photo_category'=>'1'));
        $per = 8;
        $page = new PaginationAjax($total, $per);
        $sql = "SELECT * FROM {{photo}} WHERE photo_category='1' ORDER BY photo_id DESC {$page -> limit}";
        $photo_infos = $photo_model -> findAllBySql($sql);
        $page_list = $page -> fpage();
        $this -> renderPartial('fetchtwo', array('photo_infos' => $photo_infos, 'page_list'=>$page_list));
    }

    public function actionFetchthree()
    {
        $photo_model = Photo::model();
        $total = $photo_model->countByAttributes(array('photo_category'=>'2'));
        $per = 8;
        $page = new PaginationAjax($total, $per);
        $sql = "SELECT * FROM {{photo}} WHERE photo_category='2' ORDER BY photo_id DESC {$page -> limit}";
        $photo_infos = $photo_model -> findAllBySql($sql);
        $page_list = $page -> fpage();
        $this -> renderPartial('fetchthree', array('photo_infos' => $photo_infos, 'page_list'=>$page_list));
    }

    public function actionFetchfour()
    {
        $photo_model = Photo::model();
        $total = $photo_model->countByAttributes(array('photo_category'=>'3'));
        $per = 8;
        $page = new PaginationAjax($total, $per);
        $sql = "SELECT * FROM {{photo}} WHERE photo_category='3' ORDER BY photo_id DESC {$page -> limit}";
        $photo_infos = $photo_model -> findAllBySql($sql);
        $page_list = $page -> fpage();
        $this -> renderPartial('fetchfour', array('photo_infos' => $photo_infos, 'page_list'=>$page_list));
    }*/
}
