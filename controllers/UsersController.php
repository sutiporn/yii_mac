<?php
/**
 * Created by PhpStorm.
 * User: sutiporn
 * Date: 6/5/2018 AD
 * Time: 9:54 PM
 */
namespace app\controllers;

use yii\web\Controller;
use app\models\Users;

class UsersController extends Controller{

    public function actionIndex(){

        $users = Users::find()->all();
        return $this->render('index',['users'=>$users]);
    }
}