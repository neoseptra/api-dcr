<?php
namespace app\controllers;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\ForbiddenHttpException;

class LelangallController extends ActiveController{
    
    public $modelClass = "app\models\LelangAll";
    
    
    
    public function actions()
    {
        $actions = parent::actions();
        
        
        // customize the data provider preparation with the "prepareDataProvider()" method
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
        
        return $actions;
    }
    
    public function prepareDataProvider()
    {
        
        $modelClass = $this->modelClass;
        
        // tampilkan data kontak yang hanya dibuat oleh user
        $query = $modelClass::find();
        
        $dataprovider = new ActiveDataProvider([
        'query'=>$query,
        'pagination'=>false
        ]);
        
       return $dataprovider;
       
    }
    
    /*
    *  Lakukan autorisasi akses 
    *
    */
    
    public function checkAccess($action, $model = null, $params = []){
        
        if(!$model == null && $model->user_id !== Yii::$app->LelangAll->id){
            throw new ForbiddenHttpException(Yii::t('yii','Kamu hanya bisa mengakses data yang kamu buat'));
            
        }
        else{
            
            return true;
        }
        
    }
}