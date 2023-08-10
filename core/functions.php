<?php
// dd
function dd($data, $showType = false)
{
    echo "<pre style='background-color: black; color:white; padding:20px; margin:10px; border-radius:10px;line-height:1.2rem;'>";
    if ($showType) {
        var_dump($data);
    } else {
        print_r($data);
    }
    echo "</pre>";
    die();
}
// url
function url(string $path = null): string
{
    $url = isset($_SERVER['HTTPS']) ? 'https' : 'http';
    $url .= '://';
    $url .= $_SERVER['HTTP_HOST'];
    if (isset($path)) {
        $url .= "/";
        $url .= $path;
    }
    return $url;
}
// view
function view(string $viewName, array $data = null): void
{
    // array to variable
    if (!is_null($data)) {
        foreach ($data as $key => $value) {
            // dynamic variable name
            ${$key} = $value;
        }
    }
    require_once ViewDir . "/$viewName.view.php";
}
// controller
function controller(string $controllerName): void
{
    // string to array
    // list@index =>['list', 'index']
    $controllerNameArray = explode("@", $controllerName);
    require_once ControllerDir . "/$controllerNameArray[0].controller.php";
    // dynamic function call
    call_user_func($controllerNameArray[1]);
}
// route
function route(string $path, array $queries = null): string
{
    $url = url($path);
    if (!is_null($queries)) {
        $url .= "?" . http_build_query($queries);
    }

    return $url;
}
// redirect
function redirect($url): void
{
    header("location:" . $url);
}
// checkRequestMethod
function checkRequestMethod(string $methodName)
{
    $result = false;
    $methodName = strtoupper($methodName);
    $serverRequestMethod = $_SERVER["REQUEST_METHOD"];
    if ($methodName === "POST" && $serverRequestMethod === "POST") {
        $result = true;
    } elseif ($methodName === "PUT" && $serverRequestMethod === "POST" && !empty($_POST["_method"]) && strtoupper($_POST["_method"] === "PUT")) {
        $result = true;
    } elseif ($methodName === "DELETE" && $serverRequestMethod === "POST" && !empty($_POST["_method"]) && strtoupper($_POST["_method"] === "DELETE")) {
        $result = true;
    }

    return $result = true;
}
// database functions start
function run(string $sql, bool $closeConnection = true): Object|bool
{
    try {
        $query = mysqli_query($GLOBALS['conn'], $sql);
        $closeConnection && mysqli_close($GLOBALS['conn']);
        return $query;
    } catch (Exception $error) {
        dd($error);
    }
}

function all(string $sql): array
{
    $lists = [];
    $query = run($sql);
    while ($row = mysqli_fetch_assoc($query)) {
        $lists[] = $row;
    }
    return $lists;
}
//get one item
function first(string $sql): array
{
    $query = run($sql);
    $list = mysqli_fetch_assoc($query);
    return $list;
}
// database functions end
