<?php

namespace app\models;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "lelang_seleksi".
 *
 * @property string $kode_kel
 * @property string $kode_kec
 * @property string $nama_kel
 * @property string $created_at
 * @property string $updated_at
 */
class LelangMenang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function getDb()
    {
        return Yii::$app->get('dbdata');
    }
    public static function tableName()
    {
        return 'lelang_seleksi';
    }
    public function behaviors()
    {
        return [

        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
          
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kode_kel' => Yii::t('app', 'Kode Kelurahan'),
            'kode_kec' => Yii::t('app', 'Kecamatan'),
            'nama_kel' => Yii::t('app', 'Nama Kelurahan'),
            'created_at' => Yii::t('app', 'Tanggal Dibuat'),
            'updated_at' => Yii::t('app', 'Tanggal Diupdate'),
        ];
    }
    
    /**
     * @inheritdoc
     * @return lelang_seleksiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LelangMenangQuery(get_called_class());
    }
}
