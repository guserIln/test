<?php

namespace app\models;
use yii\db\ActiveRecord;


class Model extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $id;
    public $foto;
    public $date;
    public $spec;
    public $salary;
    public $experience;
    public $age;
    public $city;
    public $last;

    private static $models = [
        '100' => [
            'id' => '100',
            'foto' => 'images/profile-foto.jpg',
            'date' => '20-01-2020',
            'spec' => 1,
            'salary' => 20000,
            'experience' => 1,
            'age' => 22,
            'city' => 'Стерлитамак',
            'last' => 'last',
            'description' => 'Младший PHP разработчик в ООО «ТЕПЛОВОЕ ОБОРУДОВАНИЕ», Октябрь 2010 — по настоящее время',
        ],
        '101' => [
              'id' => '100',
            'foto' => 'images/profile-foto.jpg',
            'date' => '20-01-2020',
            'spec' => 1,
            'salary' => 20000,
            'experience' => 1,
            'age' => 22,
            'city' => 'Стерлитамак',
            'last' => 'last',
             'description' => 'Младший PHP разработчик в ООО «ТЕПЛОВОЕ ОБОРУДОВАНИЕ», Октябрь 2010 — по настоящее время',
        ],
    ];

      /**
     * {@inheritdoc}
     */
    public static function findAll()
    {
        return isset(self::$models) ? self::$models : null;
       // return $models;
    }
    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return isset(self::$models[$id]) ? new static(self::$models[$id]) : null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
