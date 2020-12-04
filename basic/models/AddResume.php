<?php
namespace app\models;

use yii\db\ActiveRecord;

/**
 * Модель для формы обратной связи
 */
class AddResume extends ActiveRecord
{
    public function attributeLabels() {
        return [
            'name' => 'Ваше имя',
            'email' => 'Ваш email',
            'description' => 'Сообщение',
            'body' => 'Сообщение',
              'salary' => 'Сообщение',
        ];
    }

    public function rules() {
        return [
            // удалить пробелы для полей name и email
            [['name', 'email'], 'trim'],
            // поле name обязательно для заполнения
            ['name', 'required', 'message' => 'Поле «Ваше имя» обязательно для заполнения'],
            // поле email обязательно для заполнения
            ['email', 'required', 'message' => 'Поле «Ваш email» обязательно для заполнения'],
            // поле email должно быть корректным адресом почты
            ['email', 'email', 'message' => 'Поле «Ваш email» должно быть адресом почты'],
            // поле body обязательно для заполнения
            ['description', 'required', 'message' => 'Поле «Обо мне» обязательно для заполнения'],
        ];
    }
}