<?php
/**
 * @return int|null
 */
function get_current_employee_id()
{
    $employee = \thienhungho\EmployeeManagement\modules\EmployeeBase\Employee::find()
        ->select('id')
        ->where(['user_id' => get_current_user_id()])
        ->one();

    if (!empty($employee)) {
        return $employee->id;
    }

    return null;
}