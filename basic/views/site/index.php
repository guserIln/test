<?php
use \yii\helpers\Html;

use  yii\widgets\ActiveForm;

$this->title = 'Резюме';
?>

<h1 class="main-title mt24 mb16">Списки резюме</h1>
            <button class="vacancy-filter-btn">Фильтр</button>
                <div class="row">
                <div class="col-lg-9 desctop-992-pr-16">
                    <div class="d-flex align-items-center flex-wrap mb8">
                        <span class="paragraph mr16">Найдено <?php echo count($model)?> резюме</span>
                        <div class="vakancy-page-header-dropdowns">
                            <div class="vakancy-page-wrap show mr16">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">За день</a>
                                    <a class="dropdown-item" href="#">За год</a>
                                    <a class="dropdown-item" href="#">За все время</a>
                                </div>
                            </div>
                            <div class="vakancy-page-wrap show">
                                <a class="vakancy-page-btn vakancy-btn dropdown-toggle" href="#" role="button"
                                   id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false">
                                  
                                    <i class="fas fa-angle-down arrowDown"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                   
                                   
                                </div>
                                 <a  href="index.php?order=date">По новизне</a><br>
                                 <a  href="index.php?order=asc">По возрастанию зарплаты</a><br>
                                    <a  href="index.php?order=desc">По убыванию зарплаты</a>
                            </div>
                        </div>
                    </div>
                    <?php 
                       foreach ($model as $key => $value) {
                    ?>

                        <div class="vakancy-page-block company-list-search__block resume-list__block p-rel mb16">
                        <div class="company-list-search__block-left">
                            <div class="resume-list__block-img mb8">
                                <img src="<?php echo $value["foto"] ?>" alt="profile">
                               <!--  <img src="images/profile-foto.jpg" alt="profile">!-->
                             </div>
                        </div>
                          <div class="company-list-search__block-right">
                            <div class="mini-paragraph cadet-blue mobile-mb12">Обновлено  <?php echo $value["date"];?></div>
                              <h3 class="mini-title mobile-off"><?php if ($value["spec"]!=0) {
                                             echo $spec[$value["spec"]-1]["name"];
                                            }else echo 'Должность не указана'; ?></h3>
                            <div class="d-flex align-items-center flex-wrap mb8 ">
                                <span class="mr16 paragraph"><?php echo $value["salary"]; ?>₽</span><br><br>
                           <!--       <span class="mr16 paragraph">Опыт работы <?php  //echo $value["experience"];?> года</span><br><br>!-->
                                    <span class="mr16 paragraph"><?php echo $value["age"];?> года</span><br><br>
                                      <span class="mr16 paragraph"><?php echo $value["city"];?></span><br><br>
                                          <span class="mr16 paragraph"><?php  
                                                switch ($value["zan"]) {
                                                    case 1:
                                                        echo 'Полная занятость';
                                                        break;
                                                     case 2:
                                                        echo 'Частичная занятость';
                                                        break;
                                                    case 3:
                                                        echo 'Проектная/Временная работа';
                                                        break;
                                                     case 4:
                                                        echo 'Волонтёрство';
                                                        break;
                                                    case 5:
                                                        echo 'Стажировка';
                                                        break;
                                                    default:
                                                        # code...
                                                        break;
                                                }


                                                //echo $value["zan"];?></span><br>

                                                  <span class="mr16 paragraph"><?php 

                                                  switch ($value["grafik"]) {
                                                    case 1:
                                                        echo 'Полный день';
                                                        break;
                                                     case 2:
                                                        echo 'Сменный график';
                                                        break;
                                                    case 3:
                                                        echo 'Гибкий график';
                                                        break;
                                                     case 4:
                                                        echo 'Удалённая работа';
                                                        break;
                                                    case 5:
                                                        echo 'Вахтовый метод';
                                                        break;
                                                    default:
                                                       echo '';
                                                        break;
                                                }
                                                ?></span>
                                   <!--     <span class="mr16 paragraph"><?php// echo $value["last"];?></span><br><br>!-->
                            </div>
                          
                            <p class="paragraph tbold mobile-off">Последнее место работы</p>
                        </div>
                        <div class="company-list-search__block-middle">
                            <h3 class="mini-title desktop-off"></h3>
                            <p class="paragraph mb16 mobile-mb32"><?php echo $value["description"]; ?></p>
                        </div>

                    </div>     

                     <?php
                        }
                    ?> 
                     
              
                    <ul class="dor-pagination mb128">
                        <li class="page-link-prev"><a href="#"><img class="mr8"
                                                                    src="images/mini-left-arrow.svg" alt="arrow"> Назад</a>
                        </li>
                        <li><a href="#">1</a></li>
                        <li><a class="grey" href="#">...</a></li>
                        <li class="active"><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a class="grey" href="#">...</a></li>
                        <li><a href="#">10</a></li>
                        <li class="page-link-next"><a href="#">Далее <img class="ml8"
                                                                          src="images/mini-right-arrow.svg" alt="arrow"></a>
                        </li>
                    </ul>
                </div>
                
               
                <div class="col-lg-3 desctop-992-pl-16 d-flex flex-column vakancy-page-filter-block vakancy-page-filter-block-dnone">
                  <!--  <form action="site/index" method="GET" >!-->
                     <?php 
                $form = ActiveForm::begin([

                 'id' => 'login-form',
                  //'options' => ['class' => 'form-horizontal'],
                ]) ?>
                    <div
                            class="vakancy-page-filter-block__row mobile-flex-992 mb24 d-flex justify-content-between align-items-center">
                        <div class="heading">Фильтр</div>
                        <img class="cursor-p" src="images/big-cancel.svg" alt="cancel">
                    </div>
                    <div class="signin-modal__switch-btns-wrap resume-list__switch-btns-wrap mb16">
                        <a href="#" class="signin-modal__switch-btn active">Все</a>
                        <a href="#" class="signin-modal__switch-btn ">Мужчины</a>
                        <a href="#" class="signin-modal__switch-btn ">Женщины</a>
                    </div>
                     <div class="vakancy-page-filter-block__row mb24">
                         <div class="paragraph cadet-blue"></div>
                        <div class="citizenship-select p-rel">
                           <?php
                          //  $items = [
                         //       0 => 'Кемерово',
                         //       1 => 'Новосибирск',
                         //       2 => 'Иркутск',
                         //       3 => 'Красноярск',
                        //        4 => 'Барнаул',
                        //    ];
                         //  $form->field($model, 'city')->dropDownList(
                            //    \yii\helpers\ArrayHelper::map($items, 'id', 'name'),
                            //      [
                            //    'prompt' => 'Выбор категории',
                            //     ]
                          //      ) ?>
                          <!-- y <select class="nselect-1 dor-input w100">
                                <option value="01"></option>
                                <option value="02">Кемерово</option>
                                <option value="03">Новосибирск</option>
                                <option value="04">Иркутск</option>
                                <option value="05">Красноярск</option>
                                <option value="06">Барнаул</option>
                            </select>!-->
                        </div>
                    </div>
                    <div class="vakancy-page-filter-block__row mb24">
                        <div class="paragraph cadet-blue">Город</div>
                        <div class="citizenship-select p-rel">
                            <select name="city" class="nselect-1 dor-input w100">
                                <option value="01"></option>
                                <option value="02">Кемерово</option>
                                <option value="03">Новосибирск</option>
                                <option value="04">Иркутск</option>
                                <option value="05">Красноярск</option>
                                <option value="06">Барнаул</option>
                            </select>
                        </div>
                    </div>
                    <div class="vakancy-page-filter-block__row mb24">
                        <div class="paragraph cadet-blue">Зарплата</div>
                        <div class="p-rel">
                            <input placeholder="Любая" type="text" class="dor-input w100">
                            <img class="rub-icon" src="images/rub-icon.svg" alt="rub-icon">
                        </div>
                    </div>
                    <div class="vakancy-page-filter-block__row mb24">
                        <div class="paragraph cadet-blue">Специализация</div>
                        <div class="citizenship-select">
                            <select class="nselect-1 dor-input w100" data-title="Любая">
                              <?php foreach ($spec as $sp) {   ?>
                                <option value="<?php echo $sp['id']?>"><?php echo $sp['name']?></option>
                                 <?php }   ?>
                            </select>
                        </div>
                    </div>
                    <div class="vakancy-page-filter-block__row mb24">
                        <div class="paragraph cadet-blue">Возраст</div>
                        <div class="d-flex">
                            <input placeholder="От" type="text" class="dor-input w100">
                            <input placeholder="До" type="text" class="dor-input w100">
                        </div>
                    </div>
                    <div class="vakancy-page-filter-block__row mb24">
                        <div class="paragraph cadet-blue">Опыт работы</div>
                        <div class="profile-info">
                            <div class="form-check d-flex">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1"></label>
                                <label for="exampleCheck1" class="profile-info__check-text">Без опыта</label>
                            </div>
                            <div class="form-check d-flex">
                                <input type="checkbox" class="form-check-input" id="exampleCheck2">
                                <label class="form-check-label" for="exampleCheck2"></label>
                                <label for="exampleCheck2" class="profile-info__check-text">От 1 года до 3
                                    лет</label>
                            </div>
                            <div class="form-check d-flex">
                                <input type="checkbox" class="form-check-input" id="exampleCheck3">
                                <label class="form-check-label" for="exampleCheck3"></label>
                                <label for="exampleCheck3" class="profile-info__check-text">От 3 лет до 6
                                    лет</label>
                            </div>
                            <div class="form-check d-flex">
                                <input type="checkbox" class="form-check-input" id="exampleCheck4">
                                <label class="form-check-label" for="exampleCheck4"></label>
                                <label for="exampleCheck4" class="profile-info__check-text">Более 6 лет</label>
                            </div>
                        </div>
                    </div>
                    <div class="vakancy-page-filter-block__row mb24">
                        <div class="paragraph cadet-blue">Тип занятости</div>
                        <div class="profile-info">
                            <div class="form-check d-flex">
                                <input type="checkbox" class="form-check-input" id="exampleCheck5">
                                <label class="form-check-label" for="exampleCheck5"></label>
                                <label for="exampleCheck5" class="profile-info__check-text">Полная занятость</label>
                            </div>
                            <div class="form-check d-flex">
                                <input type="checkbox" class="form-check-input" id="exampleCheck6">
                                <label class="form-check-label" for="exampleCheck6"></label>
                                <label for="exampleCheck6" class="profile-info__check-text">Частичная
                                    занятость</label>
                            </div>
                            <div class="form-check d-flex">
                                <input type="checkbox" class="form-check-input" id="exampleCheck7">
                                <label class="form-check-label" for="exampleCheck7"></label>
                                <label for="exampleCheck7" class="profile-info__check-text">Проектная работа</label>
                            </div>
                            <div class="form-check d-flex">
                                <input type="checkbox" class="form-check-input" id="exampleCheck8">
                                <label class="form-check-label" for="exampleCheck8"></label>
                                <label for="exampleCheck8" class="profile-info__check-text">Стажировка</label>
                            </div>
                            <div class="form-check d-flex">
                                <input type="checkbox" class="form-check-input" id="exampleCheck9">
                                <label class="form-check-label" for="exampleCheck9"></label>
                                <label for="exampleCheck9" class="profile-info__check-text">Волонтёрство</label>
                            </div>
                        </div>
                    </div>
                    <div class="vakancy-page-filter-block__row mb24">
                        <div class="paragraph cadet-blue">График работы</div>
                        <div class="profile-info">
                            <div class="form-check d-flex">
                                <input type="checkbox" class="form-check-input" id="exampleCheck10">
                                <label class="form-check-label" for="exampleCheck10"></label>
                                <label for="exampleCheck10" class="profile-info__check-text">Полный день</label>
                            </div>
                            <div class="form-check d-flex">
                                <input type="checkbox" class="form-check-input" id="exampleCheck11">
                                <label class="form-check-label" for="exampleCheck11"></label>
                                <label for="exampleCheck11" class="profile-info__check-text">Сменный график</label>
                            </div>
                            <div class="form-check d-flex">
                                <input type="checkbox" class="form-check-input" id="exampleCheck12">
                                <label class="form-check-label" for="exampleCheck12"></label>
                                <label for="exampleCheck12" class="profile-info__check-text">Вахтовый метод</label>
                            </div>
                            <div class="form-check d-flex">
                                <input type="checkbox" class="form-check-input" id="exampleCheck13">
                                <label class="form-check-label" for="exampleCheck13"></label>
                                <label for="exampleCheck13" class="profile-info__check-text">Гибкий график</label>
                            </div>
                            <div class="form-check d-flex">
                                <input type="checkbox" class="form-check-input" id="exampleCheck14">
                                <label class="form-check-label" for="exampleCheck14"></label>
                                <label for="exampleCheck14" class="profile-info__check-text">Удалённая
                                    работа</label>
                            </div>
                        </div>
                    </div>
                    <div class="vakancy-page-filter-block__row vakancy-page-filter-block__show-vakancy-btns mb24 d-flex flex-wrap align-items-center mobile-jus-cont-center">
                        <a class="link-orange-btn orange-btn mr24 mobile-mb12" href="#">Показать <span>1 230</span>
                            вакансии</a>
                        <a href="#">Сбросить все</a>
                    </div>
                   <input type="submit" size=15 value="Найти"><br><br><br><br>
                    <?php ActiveForm::end() ?>
                  
            <!--  </form>!-->
               </div>
                     
                </div>
               
            </div>



