<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Session;


class CustomerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        $categories = Category::all();
        return view('customers.home', compact('books', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addCart($id)
    {
        $book = Book::findOrFail($id);
        $cart=session()->get('cart',[]);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else{
        $cart[$id]= [
            'name' => $book->name,
            'price' => $book->price,
            'quantity' => 1,
        ];}
        session()->put('cart',$cart);
        return redirect()->back();
    }

    public function showCart()
    {
        $cart=\session()->get('cart',[]);
        return view('customers.showcart',compact('cart'));
    }

    public function removeItem($id)
    {
        $cart=session()->get('cart',[]);
        unset($cart[$id]);
        session()->put('cart',$cart);
        return redirect()->back();
    }

    public function updateItem($id,$quantity)
    {
        $cart=session()->get('cart',[]);
        $cart[$id]['quantity']=$quantity;
        session()->put('cart',$cart);
        return redirect()->back();
    }

}
