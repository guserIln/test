<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Мои резюме';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-open">
           <div class="col-lg-9">
                <div class="main-title mb32 mt50 d-flex justify-content-between align-items-center">Резюме
                    <?php //var_dump($model);?>
                    <a href="index.php?r=site%2Fcontact" class="link-orange-btn orange-btn my-vacancies-add-btn">Добавить резюме</a><a
                            class="my-vacancies-mobile-add-btn link-orange-btn orange-btn plus-btn" href="#">+</a></div>
                <div class="tabs mb64">
                    <div class="tabs__content active">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="d-flex">
                                
                                </div>
                                 <?php 
                                             foreach ($model as $key => $value) {
                                               // var_dump($model);
                                          ?>
                                <div class="vakancy-page-block my-vacancies-block p-rel mb16">
                                    <div class="row">
                                         <?php 
                                           //  foreach ($model as $key => $value) {
                                               // var_dump($model);
                                          ?>
                                        <div class="my-resume-dropdown dropdown show mb8">
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="images/dots.svg" alt="dots">
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right"
                                                 aria-labelledby="dropdownMenuLink">
                                                 <a class="dropdown-item" href="index.php?r=site%2Fedit&id=<?php echo $value["id"]?>">Редактировать</a>
                                                <a class="dropdown-item" href="index.php?r=site%2Fdelete&id=<?php echo $value["id"]?>">Удалить</a>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 my-vacancies-block__left-col mb16">
                                            <h2 class="mini-title mb8"><?php //echo $spec[$value["spec"]];
                                           // var_dump($value["spec"]);
                                                       if ($value["spec"]!=0) {
                                             echo $spec[$value["spec"]-1]["name"];
                                            }else echo 'Должность не указана';
                                           ?></h2>
                                           <p><img width="20%" height="20%" src="<?php echo $value["foto"];?>"></p> 
                                            <font size="4"> <?php echo $value["fam"]; ?>  <?php echo $value["name"]; ?>   <?php echo $value["otch"]; ?>
                                            </font>
                                            <div class="d-flex align-items-center flex-wrap mb8 ">
                                                <span class="mr16 paragraph">
                                                    <?php echo $value["salary"]; ?> руб.</span>

                                            <!--    <span class="mr16 paragraph">Опыт работы <?php//  echo $value["experience"];?>  года</span>!-->
                                                <span class="mr16 paragraph"><?php echo $value["city"];?></span>
                                            </div>
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


                                                //echo $value["zan"];?></span>
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
                                            <div class="d-flex flex-wrap">
                                                <div class="paragraph mr16">
                                                    <strong>Просмотров</strong>
                                                    <span class="grey"> <?php echo $value["shows"]; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                                class="col-xl-12 d-flex justify-content-between align-items-center flex-wrap">
                                            <div class="d-flex flex-wrap mobile-mb12">
                                            
                                            </div>
                                            <span class="mini-paragraph cadet-blue">Опубликовано 23 марта 2020 в
                                                    12:00</span>
                                        </div>
                                    </div>
                                </div>
                                 <?php
                        }
                    ?> 
                            </div>
                               
                        </div>
                    </div>
                         
                    <div class="tabs__content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="d-flex">
                                    <div class="paragraph mb8 mr16">У вас <span>1</span> резюме</div>
                                </div>
                                <div class="vakancy-page-block my-vacancies-block p-rel mb16">
                                    <div class="row">
                                        <div class="my-resume-dropdown dropdown show mb8">
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="images/dots.svg" alt="dots">
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right"
                                                 aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="#">Редактировать</a>
                                                <a class="dropdown-item" href="#">Удалить</a>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 my-vacancies-block__left-col mb32">
                                            <span class="paragraph mr16 mb4">Обновлено сегодня в 12:40</span>
                                            <span class="paragraph my-vacancies-block__time-span">Видно всем</span>
                                            <h2 class="mini-title mb8">PHP разработчик</h2>
                                            <div class="d-flex flex-wrap">
                                                <div class="paragraph mr16">Просмотров
                                                    <span class="grey">26</span>
                                                </div>
                                                <div class="paragraph mr16">Откликов <span class="grey">5</span>
                                                </div>
                                                <a href="#"><span>13</span> подходящих вакансий</a>
                                            </div>
                                        </div>
                                        <div
                                                class="col-xl-12 d-flex justify-content-between align-items-center flex-wrap">
                                            <div class="d-flex flex-wrap mobile-mb12">
                                                <a class="mr16" href="#">Открыть</a>
                                                <a class="mr16" href="#">Изменить видимость</a>
                                            </div>
                                            <span class="mini-paragraph cadet-blue">Опубликовано 23 марта 2020 в
                                                    12:00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tabs__content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="d-flex">
                                    <div class="paragraph mb8 mr16">У вас <span>1</span> резюме</div>
                                </div>
                                <div class="vakancy-page-block my-vacancies-block p-rel mb16">
                                    <div class="row">
                                        <div class="my-resume-dropdown dropdown show mb8">
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="images/dots.svg" alt="dots">
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right"
                                                 aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="#">Редактировать</a>
                                                <a class="dropdown-item" href="#">Удалить</a>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 my-vacancies-block__left-col mb32">
                                            <span class="paragraph mr16 mb4">Зарплата от 90 000 ₽</span>
                                            <span class="paragraph mr16 mb4">Обновлено сегодня в 12:40</span>
                                            <span class="paragraph my-vacancies-block__time-span">Видно всем</span>
                                            <h2 class="mini-title mb8">PHP разработчик</h2>
                                            <div class="d-flex flex-wrap">
                                                <div class="paragraph mr16">Просмотров
                                                    <span class="grey">26</span>
                                                </div>
                                                <div class="paragraph mr16">Откликов <span class="grey">5</span>
                                                </div>
                                                <a href="#"><span>13</span> подходящих вакансий</a>
                                            </div>
                                        </div>
                                        <div
                                                class="col-xl-12 d-flex justify-content-between align-items-center flex-wrap">
                                            <div class="d-flex flex-wrap mobile-mb12">
                                                <a class="mr16" href="#">Открыть</a>
                                                <a class="mr16" href="#">Изменить видимость</a>
                                            </div>
                                            <span class="mini-paragraph cadet-blue">Опубликовано 23 марта 2020 в
                                                    12:00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tabs__content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="d-flex flex-wrap pr13">
                                    <div class="paragraph mb8 mr16">У вас <span>5</span> резюме</div>
                                    <div class="vakancy-page-wrap p-rel show mr16">
                                        <a class="vakancy-page-btn arrow-toggle-down-btn dropdown-toggle" href="#"
                                           role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                           aria-haspopup="true" aria-expanded="false">
                                            любое резюме
                                            <i class="fas fa-angle-down arrowDown"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="#">За день</a>
                                            <a class="dropdown-item" href="#">За год</a>
                                            <a class="dropdown-item" href="#">За все время</a>
                                        </div>
                                    </div>
                                    <div class="profile-info right-checkbox-block">
                                        <div class="form-check d-flex">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                            <label class="form-check-label" for="exampleCheck1"></label>
                                            <label for="exampleCheck1"
                                                   class="profile-info__check-text job-resolution-checkbox">Отметить
                                                все</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="vakancy-page-block my-vacancies-block p-rel mb16">
                                    <div class="row">
                                        <div class="dropdown profile-info right-checkbox-block">
                                            <div class="form-check d-flex">
                                                <input type="checkbox" class="form-check-input" id="exampleCheck2">
                                                <label class="form-check-label" for="exampleCheck2"></label>
                                                <label for="exampleCheck2"
                                                       class="profile-info__check-text job-resolution-checkbox"></label>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 my-vacancies-block__left-col mb32">
                                            <span class="paragraph mr16 mb4">Зарплата от 90 000 ₽</span>
                                            <span class="paragraph mr16 mb4">15 июля 2019</span>
                                            <span class="blue-label label">Соискатель</span>
                                            <h2 class="mini-title mb8">PHP разработчик</h2>
                                            <div class="d-flex flex-wrap">
                                                <div class="paragraph mr16">Просмотров
                                                    <span class="grey">26</span>
                                                </div>
                                                <div class="paragraph mr16">Откликов <span class="grey">5</span>
                                                </div>
                                                <a href="#"><span>13</span> подходящих вакансий</a>
                                            </div>
                                        </div>
                                        <div
                                                class="col-xl-12 d-flex justify-content-between align-items-center flex-wrap">
                                            <div class="d-flex flex-wrap mobile-mb12">
                                                <a class="mr16" href="#">Открыть</a>
                                                <a class="mr16" href="#">Удалить</a>
                                            </div>
                                            <span class="mini-paragraph cadet-blue">Заархивировано 23 марта 2020 в 12:00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
