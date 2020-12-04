<?php
namespace app\models;

use yii\base\Model;

/**
 * Модель для формы обратной связи
 */
class EditResumeForm extends Model
{
    public $name, $email, $fam, $otch, $date, $pol, $tel, $description, $body, $salary, $city, $zan,
     $foto;

    public function attributeLabels() {
        return [
            'name' => 'Ваше имя',
             'fam' => 'Ваша фамилия',
              'otch' => 'Ваше отчество',
              'date' => 'Дата рождения',
              'pol' => 'Ваш пол',
            'email' => 'Ваш email',
            'tel' => 'Ваш телефон',
            'salary' => 'Зарплата',
            'city' => 'Ваш город',
            'grafik' => 'График',
            'zan' => 'Занятость',
              'foto' => 'Фото',
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
               ['zan', 'required', 'message' => 'Поле «Занятость» обязательно для заполнения'],
               ['grafik', 'required', 'message' => 'Поле «График» обязательно для заполнения'],
                ['date', 'required', 'message' => 'Поле «Ваша дата» обязательно для заполнения'],
            // поле email обязательно для заполнения
            ['email', 'required', 'message' => 'Поле «Ваш email» обязательно для заполнения'],
            // поле email должно быть корректным адресом почты
            ['email', 'email', 'message' => 'Поле «Ваш email» должно быть адресом почты'],
            // поле body обязательно для заполнения
            ['description', 'required', 'message' => 'Поле «Обо мне» обязательно для заполнения'],
            ['body', 'required', 'message' => 'Поле «Сообщение» обязательно для заполнения'],
        ];
    }
}