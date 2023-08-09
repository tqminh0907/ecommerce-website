<div class="content">
    <?php 
        $controllerName = (strtolower(isset($_REQUEST["controller"])?$_REQUEST["controller"]:"home"))."Controller";
        //echo $controllerName;
        
        $actionName = isset($_REQUEST["action"])?$_REQUEST["action"]:"index";
        
        include "./app/controllers/$controllerName.php";
        
        $controllerObject = new $controllerName;
        //var_dump($controllerObject);
        
        $controllerObject->$actionName();
    ?>
</div>