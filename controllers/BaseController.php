<?php
namespace app\controllers;

abstract class BaseController
{
    /** @var static */
    protected $controllerName;
    /** @var string */
    protected $layout = 'default';

    /**
     * BaseController constructor.
     * @param string $controllerName
     */
    public function __construct($controllerName)
    {
        $this->controllerName = $controllerName;
    }

    /**
     * @param string $view
     * @param array $params
     */
    protected function render($view, $params = [])
    {
        echo $this->renderFile(
            'layouts/' . $this->layout . '.php',
            ['contest' => $this->renderFile($this->controllerName . '/' . $view . '.php', $params)]
        );
    }

    /**
     * @param string $file
     * @param array $params
     * @return string
     */
    protected function renderFile($file, $params = [])
    {
        extract($params, EXTR_PREFIX_SAME, 'data');
        ob_start();
        require($this->getViewPath() . '/' . $file);
        $render = ob_get_contents();
        ob_end_clean();
        return $render;
    }

    /**
     * @return string
     */
    protected function getViewPath()
    {
        return realpath(__DIR__ . '/../views/');
    }
}
