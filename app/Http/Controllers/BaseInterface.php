<?php


namespace App\Http\Controllers;


interface BaseInterface
{
    function index();
    function create();
    function destroy($id);
}
