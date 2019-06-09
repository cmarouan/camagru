<?php
// load models and views
    class Controller{

        public function Model($model)
        {
            //Load Model
            require_once '../app/model/' . $model . '.php';

            return new $model();
        }

        public function View($view, $data = [])
        {
            //echo getcwd();
            if (file_exists('../app/view/' . $view . '.php'))
            {
                require_once '../app/view/' . $view . '.php';
            }
            else
            {
                //die ("View does not exist");
            }
        }

    }
?>