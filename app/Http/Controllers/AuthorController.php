<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            $data = Author::all();
            return $data;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $Author = new Author();
        $Author->name = $request->input('name');
        $Author->date_of_birth = $request->input('date_of_birth');
        $Author->place_of_birth = $request->input('place_of_birth');
        $Author->gender = $request->input('gender');
        $Author->email = $request->input('email');
        $Author->hp = $request->input('hp');
        $Author->save();

        return response()->json([
            'success' => 201,
            'message' => 'data berhasil disimpan',
            'data' => $Author
        ],201);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        {
            $author = author::find($id);
            if ($author) {
                return response()->json([
                    'status' => 200,
                    'data' => $author
    
                ], 200);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'id atas' . $id . 'tidak ditemukan'
                ], 404);
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        {
            $author = author::find($id);
            if($author){
                if($author){
                $author->name = $request->name ? $request->name : $author->name;
                $author->date_of_birth = $request->date_of_birth ? $request->date_of_birth : $author->date_of_birth;
                $author->place_of_birth = $request->place_of_birth ? $request->place_of_birth : $author->place_of_birth;
                $author->gender = $request->gender ? $request->gender : $author->gender;
                $author->email = $request->email ? $request->email : $author->email;
                $author->hp = $request->hp ? $request->hp : $author->hp;
                $author->save();
                return response()->json([
                    'status' => 200,
                    'data' => $author
                ],200);
    
            }else{
                return response()->json([
                    'status'=>404,
                    'message'=>$id. 'tidak ditemukan'
                ],404);
            }
        }
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $author = author::where('id', $id)->first();
        if($author){
            $author->delete();
            return response()->json([
                'status' =>200,
                'data' => $author
            ], 200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'id' . $id . 'tidak ditemukan'
            ], 404);
        }
    }
}
