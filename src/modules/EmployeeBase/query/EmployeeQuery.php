<?php

namespace thienhungho\EmployeeManagement\modules\EmployeeBase\query;

/**
 * This is the ActiveQuery class for [[\thienhungho\EmployeeManagement\modules\EmployeeBase\query\Employee]].
 *
 * @see \thienhungho\EmployeeManagement\modules\EmployeeBase\query\Employee
 */
class EmployeeQuery extends \thienhungho\ActiveQuery\models\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \thienhungho\EmployeeManagement\modules\EmployeeBase\query\Employee[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \thienhungho\EmployeeManagement\modules\EmployeeBase\query\Employee|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
