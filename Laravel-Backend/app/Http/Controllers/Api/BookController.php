<?php

namespace App\Http\Controllers\Api;

use App\Models\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    protected $book;

    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response($this->book->all(), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'genre' => 'required',
            'price' => 'required'
        ]);

        return response($this->book->create($request->all()), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = $this->book->find($id);

        if (!$book) {
            return response(['message' => 'Book not found'], Response::HTTP_NOT_FOUND);
        }

        return response($book, Response::HTTP_OK);
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
        $book = $this->book->find($id);

        if (!$book) {
            return response(['message' => 'Book not found'], Response::HTTP_NOT_FOUND);
        }

        $book->update($request->all());

        return response($book, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = $this->book->find($id);

        if(!$book) {
            return response(['message' => 'Book not found'], Response::HTTP_NOT_FOUND);
        }

        $book->delete();

        return response($book, Response::HTTP_OK);
    }

    /**
     * Search for a book by title, description, or genre.
     *
     * @param  string  $prperty
     * @param  string  $value
     * @return \Illuminate\Http\Response
     */
    public function search($property, $value)
    {
        // Check if the property is valid
        if (!in_array($property, ['title', 'description', 'genre'])) {
            return response(['message' => 'Invalid property'], Response::HTTP_BAD_REQUEST);
        }

        return response($this->book->where($property, 'LIKE', '%' . $value . '%')->get(), Response::HTTP_OK);
    }

     /**
     * Borrow a book.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function borrow(Request $request, $id)
    {
        $book = $this->book->find($id);

        if (!$book) {
            return response(['message' => 'Book not found'], Response::HTTP_NOT_FOUND);
        }

        if ($request->session()->has('book'.$id)) {
            return response(['message' => 'Book already borrowed'], Response::HTTP_BAD_REQUEST);
        }

        // Change the status of the book to borrowed
        $book->status = 'borrowed';
        $book->save();

        // $request->session()->push('book'.$id , $book);

        return response($book, Response::HTTP_OK);
    }

    /**
     * Return a book.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function return( Request $request, $id)
    {
        $book = $this->book->find($id);

        if (!$book) {
            return response(['message' => 'Book not found'], Response::HTTP_NOT_FOUND);
        }

        if (!$request->session()->has('book'.$id)) {
            return response(['message' => 'Book not borrowed'], Response::HTTP_BAD_REQUEST);
        }

        // Change the status of the book to available
        $book->status = 'available';
        $book->save();

        // $request->session()->pull('book'.$id);

        return response($book, Response::HTTP_OK);
    }

    /**
     * Get all borrowed books.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSession(Request $request)
    {
        return response($request->session()->all(), Response::HTTP_OK);
    }

    /**
     * Clear all borrowed books.
     *
     * @return \Illuminate\Http\Response
     */
    public function clearSession(Request $request)
    {
        $request->session()->flush();
        return response(['message' => 'Session cleared'], Response::HTTP_OK);
    }
}
