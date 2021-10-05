<?php


namespace App\Http\Controllers;



use Illuminate\Http\Request;

interface UserInterface
{
    function getPostOfUser($idUser);
    function update($id);
    function edit(Request $request, $id);
    function destroy($id);
}
