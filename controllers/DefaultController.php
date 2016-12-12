<?php
namespace app\controllers;

class DefaultController extends BaseController
{
    public function actionIndex()
    {
        $this->render('index', ['asd' => '123']);
    }
}
