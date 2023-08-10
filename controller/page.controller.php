<?php
function home(){
    return view("home", ["name" => "jjet", "age" => 20]);
}

function about(){
    return view('/about-us');
}