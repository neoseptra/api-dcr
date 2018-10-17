<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[LelangAll]].
 *
 * @see LelangAll
 */
class LelangAllQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return LelangAll[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return LelangAll|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
