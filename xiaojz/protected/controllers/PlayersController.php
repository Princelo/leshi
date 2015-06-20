<?php
class PlayersController extends Controller {
    /*
     * 通过用户访问控制过滤实现页面缓存 
     * 过滤器：
     *  accessControl 是方法过滤器
     *  array()       是类过滤器
     */
//    function filters(){
//        return array(
//            //'accessControl',  方法过滤器
//            //类过滤器 实现页面整体缓存 COutputCache.php
//            //只针对detail进行页面缓存
//            array(
//                'system.web.widgets.COutputCache + detail',
//                'duration'=>1800,
//                'varyByParam'=>array('id'),
//            ),
//        );
//    }
    
    
    function actionFetchall(){
        print_r($_GET);
        $players_model = Players::model();
        $total = $players_model->count();
        $per = 8;
        $page = new Pagination($total, $per);
        $sql = "select * from {{players}} {$page -> limit}";
        $players_infos = $players_model -> findAllBySql($sql);
        $page_list = $page -> fpage();
        $this -> render('fetchall',array('players_infos'=>$players_infos,'page_list'=>$page_list));
    }
    
    function actionDetail($id){
        print_r($_GET);
        //通过缓存实现数据的读取
        //自定义方法getGoodsInfoByPk()，是模型model里边的一个方法
        //该方法可以根据具体id信息获得商品详细
        $players_info = Players::model()->getPlayersInfoByPk($id);
        
        //根据id获得当前商品详细信息
        //$players_info = Players::model()->findByPk($id);
        $this ->render('detail',array('players_info'=>$players_info));
    }
    
    function actionIndex(){
        echo "aaaaaaaaaaaaaaaaaa";
    }
    
    function actionHuan1(){
        //设置变量缓存
        Yii::app()->cache->set('user_name','zhangsan',3600);
        Yii::app()->cache->set('useraddr','beijing',3600);
        Yii::app()->cache->set('hobby','lanqiu',3600);
        echo "set cache is ok";
    }
    function actionHuan2(){
        //使用变量缓存
        echo Yii::app()->cache->get('user_name'),"<br />";
        echo Yii::app()->cache->get('useraddr'),"<br />";
        echo Yii::app()->cache->get('hobby'),"<br />";
        echo "use cache is ok";
    }
    
    function actionHuan3(){
        //删除缓存变量
        //Yii::app()->cache->delete('username');
        //清空缓存变量，也可以删除片段缓存或文件缓存
        Yii::app()->cache->flush();
    }
   
    /*
     * 数据处理DAO
     */
    function actionCat(){
        //通过DAO方式读取数据
        $sql = "select * from {{players}}";
        //1. 创建DAO对象
        $d_obj = Yii::app()->db->createCommand($sql);
        
        //2. 执行sql语句
        //   查询：dao对象query() 返回一个结果对象CDbDataReader
        //         queryAll()  直接获得全部记录结果
        //         queryRow()  获得第一条记录结果
        //         queryColum() 获得第一列的记录结果
        //   非查询：execute()
        
        // read():通过具体CDbDataReader这个类里边的方法获得具体结果
        // readAll(): 获得全部记录结果
        //$data_obj = $d_obj -> query();
        //$info = $data_obj -> read();  //获得一条记录结果，一维数组
        //$info = $data_obj->readAll();  //获得全部记录结果，二维数组
        
        //$info = $d_obj -> queryAll();  //直接获得全部信息结果
        //$info = $d_obj -> queryRow();  //直接第一条记录结果
        
        //var_dump($info);
        //var_dump($data_obj);
    }
    
    /*
     * 通过DAO实现数据的添加 
     */
    function actionCat2(){
        $sql = "insert into {{players}} (players_name,players_price) values (:name,:price)";
        $d_obj = Yii::app()->db -> createCommand($sql);
        $name = "apple678";
        $price = 5050;
        //把定义的两个变量绑定到占位符里边
        $d_obj -> bindParam(':name',$name,PDO::PARAM_STR);
        $d_obj -> bindParam(':price',$price,PDO::PARAM_INT);
        $d_obj -> execute();
        
        $name = "诺基亚678";
        $price = 3999;
        //把定义的两个变量绑定到占位符里边
        $d_obj -> bindParam(':name',$name,PDO::PARAM_STR);
        $d_obj -> bindParam(':price',$price,PDO::PARAM_INT);
        $d_obj -> execute();
        
//        $num = $d_obj -> execute();  //会返回当前受影响的记录数目
//
//        //可以使用PDO预处理方式实现信息添加
//        $sql = "insert into {{article}} (article_title,article_content) values (:title,:content) ";
//        $command = $connection -> createCommand($sql);
//        $title = "rr";
//        $content = "rr";
//        $command ->bindParam(":title", $title, PDO::PARAM_STR);
//        $command ->bindParam(":content", $content, PDO::PARAM_STR);
//        $rowCount = $command -> execute();

        
    }
}
