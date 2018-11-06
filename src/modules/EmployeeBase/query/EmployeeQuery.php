<?php

namespace BaseApp\hrm\modules\EmployeeBase\query;

/**
 * This is the ActiveQuery class for [[\BaseApp\hrm\modules\EmployeeBase\query\Employee]].
 *
 * @see \BaseApp\hrm\modules\EmployeeBase\query\Employee
 */
class EmployeeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \BaseApp\hrm\modules\EmployeeBase\query\Employee[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \BaseApp\hrm\modules\EmployeeBase\query\Employee|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
