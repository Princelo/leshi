<?php

class DefaultController extends Controller
{
    /*
     * 用户访问控制过滤可以针对具体方法起作用
     */
    function filters() {
        return array(
            //+ 表示过滤器只针对具体方法起作用
            //'accessControl + f1,f2',
            
            //- 表示除了此方法，其他方法都会起作用
            //过滤器除了f1方法外，其他的都会起作用
            'accessControl - f1',
        );
    }
    
    function accessRules() {
        return array(
            array(
                'deny',
                'users'=>array('*'),
            ),
        );
    }
    
	public function actionIndex()
	{
		$this->render('index');
	}
        
        public function actionF1(){
            echo "I am F1";
        }
        public function actionF2(){
            echo "I am F2";
        }
        public function actionF3(){
            echo "I am F3";
        }
}
