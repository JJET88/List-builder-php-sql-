<?php


$uri =$_SERVER['REQUEST_URI']; // [$path => /..., $query =>?=...]
// dd($uri);
$uriArr=parse_url($uri);
// dd($uriArr);
$path =$uriArr['path'];

// switch ($path) {
//     case '/':
//         view("home", ["name" => "jjet", "age" => 20]);
//         break;

//     case "/about-us":
//         view("about");
//         break;

// case '/list':
//         controller("list@index");
//         break;
    
//     case '/list-create':
//         controller("list@create");
//         break;

//     // case '/list-store' && $_SERVER['REQUEST_METHOD']==='POST':
//     case '/list-store':
//         controller("list@store");
//         break;
    
//     case '/list-delete':
//         controller("list@delete");
//         break;
//     case '/list-edit':
//         controller("list@edit");
//         break;
    
//     case '/list-update':
//         controller("list@update");
//         break;
    
        
//     // for all unknown route
//     default:
//         view("not-found");
// }

// Routes
const Routes =[ 
    "/"=>"page@home", //to controller
    "/about-us"=>"page@about",
    "/list"=>"list@index",
    "/list-create"=>"list@create",
    "/list-store"=>["post","list@store"],  //["method"=>"post","run"=>"liststore"]
    "/list-edit"=>"list@edit",
    "/list-update"=>["put","list@update"],
    "/list-delete"=>["delete","list@delete"]
];
// 36:00  WAD29
// array-key-exist? 
if(array_key_exists($path,Routes) && is_array(Routes[$path]) && checkRequestMethod(Routes[$path][0])){
    // dd($_SERVER["REQUEST_METHOD"]);
    controller(Routes[$path][1]);

}elseif(array_key_exists($path,Routes) && !is_array(Routes[$path])){
    controller(Routes[$path]);

}
else{
    view('not-found');
}