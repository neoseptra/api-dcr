<?php
namespace app\controllers;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\ForbiddenHttpException;

class LelangmenangController extends ActiveController{
    
    public $modelClass = "app\models\LelangMenang";
    
    
    
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
}