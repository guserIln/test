<?php

namespace app\models;
use yii\db\ActiveRecord;


class Spec extends ActiveRecord
{

	 public function attributeLabels() {
        return [
            'name' => 'Имя',
             'id' => 'Id',
        ];
    }

}
