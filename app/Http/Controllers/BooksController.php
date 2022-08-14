<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\House;
use App\Models\Author;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('title', 'asc')->paginate(3);
        return view('books.index')->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $houses = House::all();
        $authors = Author::all();
        return view('books.create', compact('houses', 'authors'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'house' => 'required',
            'author' => 'required',
            
        ]);

        $book = new Book;
        $book->title = $request->input('title');
        $book->description = $request->input('description');
        $book->house_id = $request->input('house');
        $book->author_id = $request->input('author');

        $book->save();

        return redirect('/books')->with('success', 'Book added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book:: find($id);
        return view ('books.show')->with('book', $book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book:: find($id);

        // if(auth()->user()->id !==$book->user_id){
        //     return redirect ('/books')->with('error', 'Unauthorized page');
        // }

        $houses = House::all();
        $authors = Author::all();
       
        return view ('books.edit', compact('houses', 'book', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'house' => 'required',
            'author' => 'required',
            
        ]);

        $book = Book::find($id);
        $book->title = $request->input('title');
        $book->description = $request->input('description');
        $book->house_id = $request->input('house');
        $book->author_id = $request->input('author');
        $book->save();

        return redirect('/books')->with('success', 'Book updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);

        // if(auth()->user()->id !==$book->user_id){
        //     return redirect ('/books')->with('error', 'Unauthorized page');
        // }

        
        $book->delete();
        return redirect('/books')->with('success', 'Book deleted');

    }
}
