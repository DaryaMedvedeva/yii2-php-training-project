<?php


namespace app\models;

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use app\components\QuesWidget;
use app\models\Lessons;
use app\models\Results;

$mark=$_POST['mark'];
$lessid=$_POST['lessid'];


$r=new Results;
echo 'alert('.$mark.')';
?>