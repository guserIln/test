<?php
namespace app\models;

use yii\base\Model;

/**
 * Модель для формы обратной связи
 */
class AddResumeForm extends Model
{
    public $name, $email, $fam, $otch, $date, $pol, $tel, $description, $body, $salary, $city,
     $foto, $age, $zan, $grafik, $spec;

    public function attributeLabels() {
        return [
            'name' => 'Ваше имя',
             'fam' => 'Ваша фамилия',
              'otch' => 'Ваше отчество',
              'date' => 'Дата рождения',
              'pol' => 'Ваш пол',
            'email' => 'Ваш email',
            'tel' => 'Ваш телефон',
            'age' => 'Ваш возраст',
            'salary' => 'Зарплата',
            'city' => 'Ваш город',
              'foto' => 'Фото',
               'age' => 'Возраст',
               'zan' => 'Занятость',
               'city' => 'Город',
               'spec' => 'Специализация',
                'grafik' => 'График работы',
            'description' => 'Обо мне',
            'body' => 'Сообщение',
        ];
    }

    public function rules() {
        return [
            // удалить пробелы для полей name и email
            [['name', 'email'], 'trim'],
            // поле name обязательно для заполнения
            ['name', 'required', 'message' => 'Поле «Ваше имя» обязательно для заполнения'],
             ['email', 'required', 'message' => 'Поле «Ваш email» обязательно для заполнения'],
              ['fam', 'required', 'message' => 'Поле «Ваша фамилия» обязательно для заполнения'],
               ['otch', 'required', 'message' => 'Поле «Ваше отчество» обязательно для заполнения'],
                 ['salary', 'required', 'message' => 'Поле «Зарплата» обязательно для заполнения'],
                  ['foto', 'required', 'message' => 'Поле «Фото» обязательно для заполнения'],
                    ['city', 'required', 'message' => 'Поле «Город» обязательно для заполнения'],
                         ['tel', 'required', 'message' => 'Поле «Телефон» обязательно для заполнения'],
                          ['age', 'required', 'message' => 'Поле «Возраст» обязательно для заполнения'],
['zan', 'required', 'message' => 'Поле «Занятость» обязательно для заполнения'],
['grafik', 'required', 'message' => 'Поле «График» обязательно для заполнения'],
//  ['tel', 'match', 'pattern' => '/^\+7\s\([0-9]{3}\)\s[0-9]{3}\-[0-9]{2}\-[0-9]{2}$/', 'message' => ' Неверный номер телефона' ],
                ['date', 'required', 'message' => 'Поле «Ваша дата» обязательно для заполнения'],
            // поле email обязательно для заполнения
            ['email', 'required', 'message' => 'Поле «Ваш email» обязательно для заполнения'],
            // поле email должно быть корректным адресом почты
            ['email', 'email', 'message' => 'Поле «Ваш email» должно быть адресом почты'],
            // поле body обязательно для заполнения
            ['description', 'required', 'message' => 'Поле «Сообщение» обязательно для заполнения'],
            ['body', 'required', 'message' => 'Поле «Сообщение» обязательно для заполнения'],
        ];
    }
}