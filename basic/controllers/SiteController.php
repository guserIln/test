<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Model;
use app\models\Resume;
use app\models\Spec;
use yii\widgets\ActiveForm;
use app\models\AddResumeForm;
use app\models\EditResumeForm;
use yii\helpers\Time;
use app\models\UploadImage;
use yii\web\UploadedFile;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
       $model = new Model();
      // var_dump($_GET['city']);
      if(isset($_GET['city']) && isset($_GET['salary'])){
          $city = $_GET['city'];
          $salary = $_GET['salary'];

          $find = Resume::find()->where(['city' => $city])->all();
          return $this->render('index', ['model' => $find,]);
       }
        $spec = Spec::find()->all();
       if(isset($_GET['order'])){
             $str = $_GET['order'];
            if ($str == 'asc'){
               $find = Resume::find()->orderBy(['salary' => SORT_ASC])->all();
                return $this->render('index', ['model' => $find, 'spec'=>$spec,]);
            } else 
           if ($str == 'desc'){
               $find = Resume::find()->orderBy(['salary' => SORT_DESC])->all();
                return $this->render('index', ['model' => $find, 'spec'=>$spec,]);
            } else
             if ($str == 'date'){
               $find = Resume::find()->orderBy(['date' => SORT_DESC])->all();
                return $this->render('index', ['model' => $find, 'spec'=>$spec,]);
            } 

        }
          $find = Resume::find()->all();
        return $this->render('index', ['model' => $find, 'spec'=>$spec,]);
    }
 
    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    public function actionOpen()
    {
            
        $spec = Spec::find()->all();
        $id = (int)htmlspecialchars($_GET["id"]);
        $find = Resume::find()->where(['userid' => 2, 'id'=> $_GET["id"]])->all();
       foreach ($find as $key => $value) {
            $sh = $value["shows"];
            $sh++;
       }
       $params = ['shows'=>$sh, 'id' =>  $id];
       Yii::$app->db->createCommand('UPDATE resume SET shows=:shows WHERE id=:id', $params)->execute();
         

        return $this->render('open', [
            'model' => $find,'spec'=>$spec,]);
    }

     public function actionDelete()
    {
        $spec = Spec::find()->all();
        $connection = Yii::$app->db;
                          // выполняем команду вставки (параметры таблица Resume, массив с данными) и выполняем запрос
        $connection->createCommand()->delete('Resume', ['id'=>$_GET["id"]])->execute();
        
       $find = Resume::find()->where(['userid' => 2])->all();
        return $this->render('about', ['model' => $find,'spec'=>$spec,]);
    }
  public function actionEdit()
    {
         $spec = Spec::find()->all();
        $model = new EditResumeForm();
         $id = 0;
         if (isset($_GET["id"])){
            $id = $_GET["id"];
         }
         $find = Resume::find()->where(['id' => $id])->one();
       if (isset($_POST["Resume"])) {
                     Yii::$app->session->setFlash('success');
                         $id = $_GET["id"];
                         $fam = htmlspecialchars($_POST["Resume"]['fam']);
                         $name = htmlspecialchars($_POST["Resume"]['name']);
                         $email = htmlspecialchars($_POST["Resume"]['email']);
                        // $date = strtotime($_POST["Resume"]['date']);
                          $date =  date("Y-m-d", time());
                         $age = htmlspecialchars($_POST["Resume"]['age']);
                          $spec = htmlspecialchars($_POST["Resume"]['spec']);
                            $zan = htmlspecialchars($_POST["Resume"]['zan']);
                           $otch = htmlspecialchars($_POST["Resume"]['otch']);
                       //  $body = htmlspecialchars($_POST["Resume"]['body']);
                          $description = htmlspecialchars($_POST["Resume"]['description']);
                              $salary = htmlspecialchars($_POST["Resume"]['salary']);
                                 $city = htmlspecialchars($_POST["Resume"]['city']);
                            $now = new \DateTime('NOW', new \DateTimeZone('UTC'));
                            $grafik =  htmlspecialchars($_POST["Resume"]['grafik']);
           $name1 = 'uploads\\'.$_FILES['Resume']['name']["foto"];
                       move_uploaded_file($_FILES['Resume']['tmp_name']["foto"], $name1);
                    
                       echo "Файл загружен";
$params = ['id' => $id, 'fam' =>  $fam, 'name' => $name, 'email' => $email, 'date1'=>$date, 'age'=>$age, 'spec'=>$spec, 'zan' =>$zan,
'otch'=>$otch, 'description'=>$description, 'salary'=>$salary,'city'=>$city,'grafik'=>$grafik ];
Yii::$app->db->createCommand('UPDATE resume SET fam=:fam, name=:name,email=:email, age=:age,date=:date1,spec=:spec,zan=:zan,otch=:otch,description=:description, salary=:salary,city=:city,grafik=:grafik WHERE id=:id', $params)->execute();
                 //  $this->refresh();
                               return $this->render('edit', [
            'model' => $find,'iden'=>$id, //'dropdown' => $spec, 
        ]);
         }
    
        return $this->render('edit', [
            'model' => $find, 'iden'=>$id, //'dropdown' => $spec, 
        ]);
    }
    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new AddResumeForm();
          $image = new UploadImage();
           if ($model->load(Yii::$app->request->post())) {
                         Yii::$app->session->setFlash('success');
                         $fam = htmlspecialchars($_POST['AddResumeForm']['fam']);
                         $name = htmlspecialchars($_POST['AddResumeForm']['name']);
                         $email = htmlspecialchars($_POST['AddResumeForm']['email']);
                         $date = strtotime($_POST['AddResumeForm']['date']);
                          $date =  date("Y-m-d", time());
                         $otch = htmlspecialchars($_POST['AddResumeForm']['otch']);
                      
                          $description = htmlspecialchars($_POST['AddResumeForm']['description']);
                          $grafik = htmlspecialchars($_POST['AddResumeForm']['grafik']);
                           $age = htmlspecialchars($_POST['AddResumeForm']['age']);
                          $spec = htmlspecialchars($_POST['AddResumeForm']['spec']);
                            $zan = htmlspecialchars($_POST['AddResumeForm']['zan']);
                         $image->image = UploadedFile::getInstance($image, 'foto');
                          $image->upload();
           
                       $uid = uniqid();   
                       $name1 = 'uploads\\'.$uid.".jpg";
                       move_uploaded_file($_FILES['AddResumeForm']['tmp_name']["foto"], $name1);
                    
                       echo "Файл загружен";
            //       }
                              $salary = htmlspecialchars($_POST['AddResumeForm']['salary']);
                                 $city = htmlspecialchars($_POST['AddResumeForm']['city']);
                            $now = new \DateTime('NOW', new \DateTimeZone('UTC'));
                            $time = $now->format('m-d-Y H:i:S');

                            $time = strtotime($time);
                    $connection = Yii::$app->db;

                          // выполняем команду вставки (параметры таблица Country, массив с данными) и выполняем запрос
$connection->createCommand()->insert('Resume', ['date'=>$date,'age'=>$age, 'name' => $name, 'fam' => $fam, 'otch' =>$otch, 'body' => '', 
    'email' =>  $email, 'description' =>  $description, //'foto'=>$foto, 
    'salary'=>$salary, 'city'=>$city, 'userid'=>2, 'zan' => $zan, 'spec'=>$spec,'grafik'=>$grafik,'foto'=>$name1])->execute();
                    $this->refresh();
  return $this->render('contact', [
            'model' => $model, 'model_image'=> $image,
        ]);              
            }
    
        return $this->render('contact', [
            'model' => $model, 'model_image'=> $image,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
         $find = Resume::find()->where(['userid' => 2])->all();
         $spec = Spec::find()->all();
        return $this->render('about', ['model' => $find, 'spec'=>$spec,]);
    }
}
