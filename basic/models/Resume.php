<?php

namespace app\models;
use yii\db\ActiveRecord;


class Resume extends ActiveRecord
{
       public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
	 public function attributeLabels() {
        return [
            'name' => 'Ваше имя',
             'fam' => 'Ваше фамилия',
             'otch' => 'Ваше отчество',
            'email' => 'Ваш email',
             'tel' => 'Ваш телефон',
               'age' => 'Ваш возраст',
            'salary' => 'Зарплата',
             'spec' => 'Специализация',
              'age' => 'Возраст',
               'zan' => 'Занятость',
                'grafik' => 'График работы',
            'description' => 'Обо мне',
            'body' => 'Сообщение',
                   'shows' => 'Просмотр'
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
              ['spec', 'required', 'message' => 'Поле «Ваша специализация» обязательно для заполнения'],
                ['age', 'required', 'message' => 'Поле «Ваш возраст» обязательно для заполнения'],
               ['tel', 'required', 'message' => 'Поле «Ваш телефон» обязательно для заполнения'],
                ['age', 'required', 'message' => 'Поле «Ваш возраст» обязательно для заполнения'],
              ['zan', 'required', 'message' => 'Поле «Занятость» обязательно для заполнения'],
             ['salary', 'required', 'message' => 'Поле «Зарплата» обязательно для заполнения'],
          // ['tel', 'match', 'pattern' => '/^\+7\s\([0-9]{3}\)\s[0-9]{3}\-[0-9]{2}\-[0-9]{2}$/', 'message' => ' Неверный номер телефона' ],
            // поле email должно быть корректным адресом почты
            ['email', 'email', 'message' => 'Поле «Ваш email» должно быть адресом почты'],
            // поле body обязательно для заполнения
            ['description', 'required', 'message' => 'Поле «Сообщение» обязательно для заполнения'],
        ];
    }
}
