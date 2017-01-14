<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Sort]].
 *
 * @see Sort
 */
class SortQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Sort[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Sort|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
