<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();

        return response()->json([
            "status_code" => 200,
            "status"      => "success",
            "data"        => $books
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate

        $validator = Validator::make($request->all(), [
            'name'           => 'required',
            'isbn'           => 'required',
            'authors'        => 'required',
            'country'        => 'required',
            'number_of_pages'=> 'required',
            'publisher'      => 'required',
            'release_date'   => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'status_code' => 401,
                "error"       => $validator->errors()
            ]);
        }

        $data = array();
        $book = Book::create([
            "name"            => $request->name,
            "isbn"            => $request->isbn,
            "authors"         => $request->authors,
            "country"         => $request->country,
            "number_of_pages" => $request->number_of_pages,
            "publisher"       => $request->publisher,
            "release_date"    => $request->release_date
        ]);

        return response()->json([
            "status_code" =>  201,
            "status"      => "success",
            "data"        =>  [
                "book" => $book
            ]
        ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //VALIDATE
        $validate = Validator::make($request->all(), [
            'name'           => 'required',
            'isbn'           => 'required',
            'authors'        => 'required',
            'country'        => 'required',
            'number_of_pages'=> 'required',
            'publisher'      => 'required',
            'release_date'   => 'required'
        ]);

        if($validate->fails()){
            return response()->json([
                'status_code' => 401,
                "error"       => $validate->errors()
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $book = Book::find($request->id);
     
        if($book){
            $book->delete();
            return response()->json([
                "status_code" => 204,
                "status"      => "success",
                "message"     => "The Book ".$book->name." was deleted successfully",
                "data"        =>  []
            ]);
        }else{
            return response()->json([
                "status_code" => 204,
                "status"      => "success",
                "message"     => "The book with that ID is not available",
                "data"        =>  []
            ]);
        }
    }
}
