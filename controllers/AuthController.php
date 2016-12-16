<?php
namespace app\controllers;

class AuthController extends BaseController
{
    public function actionIndex()
    {
        $this->render('index', ['asd' => '123']);
    }
}
