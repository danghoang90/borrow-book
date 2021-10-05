<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Session;


class BookController extends Controller implements BaseInterface
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
        return view('books.list', compact('books', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('books.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBookRequest $request)
    {
        $book = new Book();
        $book->name = $request->name;
        $book->desc = $request->desc;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $book->image = $path;

        }

        $book->status = $request->status;
        $book->price = $request->price;
        $book->category_id = $request->category_id;
        $book->save();
        $message = "Thêm Sách thành công!";
        Session::flash('create-success', $message);
        return redirect()->route('books.index', compact('message'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();
        return view('books.update', compact('book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateBookRequest $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->name = $request->name;
        $book->desc = $request->desc;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $book->image = $path;

        }

        $book->status = $request->status;
        $book->price = $request->price;
        $book->category_id = $request->category_id;

        $book->save();
        $message = "Cập nhật thành công!";
        Session::flash('update-success', $message);
        return redirect()->route('books.index', compact('message'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->roles()->detach();
        $book->delete();
        return response()->json(['message' => 'Delete successfully']);
    }

//    public function search(Request $request){
//        $keyword = $request->input('keyword');
//        if (!$keyword) {
//            return redirect()->route('books.index');
//        }
//        $books = Book::where('name', 'LIKE', '%' . $keyword . '%');
//        return view('books.list', compact('books'));
//    }
    function search(Request $request)
    {
        $keyword = $request->keyword;
        $books = Book::where('name', 'LIKE', '%' . $keyword . '%')->get();
        return response()->json($books);
    }
}
