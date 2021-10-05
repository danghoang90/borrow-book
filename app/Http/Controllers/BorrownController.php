<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\Student;
use Illuminate\Http\Request;

class BorrownController extends Controller
{
    function create() {
        return view('borrows.create');
    }

    function searchStudent(Request $request){
        $keyword = $request->keyword;
        $students = Student::where('name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('student_code', 'LIKE', '%' . $keyword . '%')
            ->get();
        return response()->json($students);
    }

    function findStudent($id) {
        $student = Student::find($id);
        return response()->json($student);
    }

    function searchBook(Request $request){
        $keyword = $request->keyword;
        $books = Book::where('name', 'LIKE', '%' . $keyword . '%')
            ->orWhere('price', 'LIKE', '%' . $keyword . '%')
            ->get();
        return response()->json($books);
    }
    function findBook($id) {
        $book = Book::find($id);
        return response()->json($book);
    }

    public function store(Request $request)
    {
        $borrow = new Borrow();
        $borrow->student_id = $request->student_id;
        $borrow->book_id = $request->book_id;
        $borrow->borrow_date = $request->borrow_date;
        $borrow->borrow_return = $request->borrow_return;
        //$borrow->status = 1;
        $borrow->save();
        return response()->json('cho muon thanh cong');
    }
}
