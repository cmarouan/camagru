<?php
// load models and views
abstract class Controller{

    public function Model($model)
    {
        require_once '../app/model/' . $model . '.php';
        return new $model();
    }

    public function View($view, $data = [])
    {
        if (file_exists('../app/view/' . $view . '.php'))
            require_once ('../app/view/' . $view . '.php');
        else
        {
            //die ("View does not exist");
        }
    }

}
?>