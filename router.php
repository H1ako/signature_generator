<?php
session_start();
function get($route, $path_to_include){
  if( $_SERVER['REQUEST_METHOD'] == 'GET' ){ route($route, $path_to_include); }  
}
function post($route, $path_to_include){
  if( $_SERVER['REQUEST_METHOD'] == 'POST' ){ route($route, $path_to_include); }    
}
function put($route, $path_to_include){
  if( $_SERVER['REQUEST_METHOD'] == 'PUT' ){ route($route, $path_to_include); }    
}
function patch($route, $path_to_include){
  if( $_SERVER['REQUEST_METHOD'] == 'PATCH' ){ route($route, $path_to_include); }    
}
function delete($route, $path_to_include){
  if( $_SERVER['REQUEST_METHOD'] == 'DELETE' ){ route($route, $path_to_include); }    
}
function any($route, $path_to_include){ route($route, $path_to_include); }
function route($route, $path_to_include){
  $callback = $path_to_include;
  if( !is_callable($callback) ){
    if(!strpos($path_to_include, '.php')){
      $path_to_include.='.php';
    }
  }    
  $request_url = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
  $request_url = rtrim($request_url, '/');
  $request_url = strtok($request_url, '?');
  $route_parts = explode('/', $route);
  $request_url_parts = explode('/', $request_url);
  
  $parameters = [];
  for( $__i__ = 0; $__i__ < count($route_parts); $__i__++ ){
    $route_part = $route_parts[$__i__];
    if( preg_match("/^[%]/", $route_part) ){
      $route_part = ltrim($route_part, '%');
      array_push($parameters, $request_url_parts[$__i__] ?? '');
      $$route_part=$request_url_parts[$__i__] ?? '';
    }
  }
  $route_with_params = vsprintf($route, $parameters);
  if ($route_with_params != $request_url && $route_with_params != $request_url.'/' && $route_with_params.'/' != $request_url) return;
  
  array_shift($route_parts);
  array_shift($request_url_parts);
  if( $route_parts[0] == '' && count($request_url_parts) == 0 ){
    // Callback function
    if( is_callable($callback) ){
      $template = call_callback_function($callback, []);
      if (!$template) return;

      $path_to_include = $template;
    }
    include_once __DIR__."/$path_to_include";
    exit();
  }
  // if( count($route_parts) != count($request_url_parts) ){ return; }  
  // Callback function
  if( is_callable($callback) ){
    $template = call_callback_function($callback, $parameters);
    if (!$template) return;

    $path_to_include = $template;
  }
  include_once __DIR__."/$path_to_include";
  exit();
}
function call_callback_function($callback, $parameters) {
  $template = call_user_func_array($callback, $parameters);

  if ($template === false) exit();
  if (file_exists(__DIR__."/$template")) {
    return $template;
  }

  return false;
}
function out($text){echo htmlspecialchars($text);}
function set_csrf(){
  if( ! isset($_SESSION["csrf"]) ){ $_SESSION["csrf"] = bin2hex(random_bytes(50)); }
  echo '<input type="hidden" name="csrf" value="'.$_SESSION["csrf"].'">';
}
function is_csrf_valid(){
  if( ! isset($_SESSION['csrf']) || ! isset($_POST['csrf'])){ return false; }
  if( $_SESSION['csrf'] != $_POST['csrf']){ return false; }
  return true;
}
