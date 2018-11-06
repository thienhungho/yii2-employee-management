<?php

namespace thienhungho\EmployeeManagement\modules\EmployeeBase;

use Yii;
use \thienhungho\EmployeeManagement\modules\EmployeeBase\base\Employee as BaseEmployee;

/**
 * This is the model class for table "employee".
 */
class Employee extends BaseEmployee
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['user_id', 'created_by', 'updated_by'], 'integer'],
            [['first_name', 'last_name', 'phone', 'email'], 'required'],
            [['birth_date', 'date_join', 'date_left', 'created_at', 'updated_at'], 'safe'],
            [['address'], 'string'],
            [['avatar', 'first_name', 'last_name', 'phone', 'email', 'website', 'relationship_status', 'vat_number', 'language', 'country', 'city', 'state', 'zip_code', 'status', 'type', 'currency'], 'string', 'max' => 255],
            [['gender'], 'string', 'max' => 55],
            [['phone'], 'unique'],
            [['email'], 'unique'],
            [['avatar'], 'default', 'value' => DEFAULT_AVATAR],
            [['updated_by'], 'default', 'value' => get_current_user_id()]
        ]);
    }

    /**
     * @param bool $insert
     *
     * @return bool
     * @throws \yii\base\Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $img = upload_img('Employee[avatar]');
            if (!empty($img)) {
                $this->avatar = $img;
            } elseif(empty($img) && !$this->isNewRecord) {
                $model = static::findOne(['id' => $this->id]);
                if ($model) {
                    $this->avatar = $model->avatar;
                }
            }

            return true;
        }

        return false;
    }
}
