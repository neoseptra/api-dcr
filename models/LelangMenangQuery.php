<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[LelangMenang]].
 *
 * @see LelangMenang
 */
class LelangMenangQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return LelangMenang[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return LelangMenang|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
