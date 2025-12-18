<?php
class App {
    public function run(): void {
        $controllerName = $_GET['c'] ?? 'Auth';
        $action         = $_GET['a'] ?? 'login';

        $controllerClass = $controllerName . 'Controller';

        if (!class_exists($controllerClass)) {
            http_response_code(404);
            echo "Controller not found";
            return;
        }

        $controller = new $controllerClass();

        if (!method_exists($controller, $action)) {
            http_response_code(404);
            echo "Action not found";
            return;
        }

        $controller->$action();
    }
}
