<?php

function index()
{
   $sql = "SELECT * FROM debt";
   if(!empty($_GET['q'])){
      $q=$_GET["q"];
      $sql.=" WHERE name LIKE '%$q%'";
   }
   return view('list/index', ["lists" => all($sql)]);
}

function create()
{
   view("list/create");
}
function store()
{
   $name = $_POST['name'];
   $money = $_POST['money'];
   $sql = "INSERT INTO debt (name,money)  VALUES ('$name','$money')";
   run($sql);
   // header("LOCATION:".route('list'));
   redirect(route('list'));
}
function delete()
{
   // dd($_GET);
   $id = $_POST['id'];
   $sql = "DELETE FROM debt WHERE id=$id";
   run($sql);
   redirect(route('list'));
}
function edit()
{
   $id = $_GET['id'];
   $sql = "SELECT * FROM debt WHERE id=$id";

   return view("list/edit", ['list' => first($sql)]);
}
function update()
{
   // dd($_POST);
   $id = $_POST['id'];
   $name = $_POST['name'];
   $money = $_POST['money'];
   $sql = "UPDATE debt SET name='$name',money=$money WHERE id=$id";
   run($sql);
   // header("LOCATION:".route('list'));
   redirect(route('list'));
}
