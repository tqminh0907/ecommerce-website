<?php 

class baseController {

    const VIEW_FOLDER_NAME = "app/views/";

    protected function view($viewPath, array $data = []) {
        
        foreach ($data as $key => $value) {
            $$key = $value;
        }

        return require(self::VIEW_FOLDER_NAME.$viewPath.".php");
    }
}

?>