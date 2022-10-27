<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\widgets\LinkPager;
use app\components\ResultsWidget;

$this->title = 'Результаты пользователей';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
       
        <table class="table">
        <?php 

            $table='<thead>
            <tr>
                <th scope="col">Фамилия</th>
                <th scope="col">Имя</th>
                <th scope="col">Урок</th>
                <th scope="col">Оценка</th>
                <th scope="col">Дата</th>
            </tr>
            </thead>
            <tbody>';

        foreach ($res as $r)
        {
            $table.=ResultsWidget::Widget([
                'id'=>$r->userid,
                'lessid'=>$r->lessid,
                'mark'=>$r->mark,
                'testdate'=>$r->testdate]);
        }


        $table.='</tbody>';

      echo $table;
      
        ?>

        </table>




        </div>

    <div class="body-content">

        <div class="row">
            
        </div>

    </div>
</div>
