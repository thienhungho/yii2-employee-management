<?php

namespace thienhungho\EmployeeManagement\migrations;

use yii\db\Schema;

class m181106_070101_employee extends \yii\db\Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%employee}}', [
            'id'                  => $this->primaryKey(),
            'user_id'             => $this->integer(19),
            'avatar'              => $this->string(255),
            'first_name'          => $this->string(255)->notNull(),
            'last_name'           => $this->string(255)->notNull(),
            'phone'               => $this->string(255)->notNull(),
            'email'               => $this->string(255)->notNull(),
            'website'             => $this->string(255),
            'birth_date'          => $this->date(),
            'gender'              => $this->string(55)->defaultValue('male'),
            'relationship_status' => $this->string(255)->defaultValue('Single'),
            'vat_number'          => $this->string(255),
            'language'            => $this->string(255)->defaultValue('English'),
            'address'             => $this->text(),
            'country'             => $this->string(255),
            'city'                => $this->string(255),
            'state'               => $this->string(255),
            'zip_code'            => $this->string(255),
            'date_join'           => $this->date(),
            'date_left'           => $this->date(),
            'status'              => $this->string(255)->defaultValue('active'),
            'type'                => $this->string(255)->defaultValue('Full time'),
            'currency'            => $this->string(255),
            'created_at'          => $this->timestamp()->notNull()->defaultValue(CURRENT_TIMESTAMP),
            'updated_at'          => $this->timestamp()->notNull()->defaultValue('0000-00-00 00:00:00'),
            'created_by'          => $this->integer(19),
            'updated_by'          => $this->integer(19),
            'FOREIGN KEY ([[user_id]]) REFERENCES {{%user}} ([[id]]) ON DELETE CASCADE ON UPDATE CASCADE',
        ], $tableOptions);

    }

    public function safeDown()
    {
        $this->dropTable('{{%employee}}');
    }
}
