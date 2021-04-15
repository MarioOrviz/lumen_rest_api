<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show all Authors in Database, without restriction.
     * 
     * @return jsonArray
     */
    public function showAllAuthors()
    {
        return response()->json(Author::all());
    }

    /**
     * Show one Author in Database, identified by its unique ID.
     * 
     * @param  $id  Author's Unique identifier
     * 
     * @return jsonArray
     */
    public function showOneAuthor($id)
    {
        return response()->json(Author::find($id));
    }

    /**
     * Create a new Author.
     * 
     * @param $request  HTTP Request object 
     * 
     * @return jsonArray
     */
    public function create(Request $request)
    {
        $author = Author::create($request->all());

        return response()->json($author, 201);
    }

    /**
     * Update an existing author.
     * 
     * @param  $id  Author's Unique identifier
     * @param $request  HTTP Request object 
     * 
     * @return jsonArray
     */
    public function update($id, Request $request)
    {
        $author = Author::findOrFail($id);
        $author->update($request->all());

        return response()->json($author, 200);
    }

    /**
     * Delete an existing Author.
     * 
     * @param  $id  Author's Unique identifier
     * 
     * @return jsonArray
     */
    public function delete($id)
    {
        Author::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}
