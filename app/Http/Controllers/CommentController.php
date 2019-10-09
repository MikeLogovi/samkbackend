<?php

namespace App\Http\Controllers;

use App\Events\CommentCrud;
use App\Http\Requests\CommentFormRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $comments=Comment::all();
        return view('admin.comments.index',compact('comments'));
    }
    public function indexApi()
    {   
        $comments=Comment::all();
        return response()->json($comments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.comments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentFormRequest $request)
    {   
        if($request->hasfile('source')&& $request->file('source')->isValid()){
            $path=fileUpload($request->file('source'),'comments');
            Comment::create(['author_name'=>$request->author_name,
                             'author_function'=>$request->author_function,
                             'comment'=>$request->comment,
                             'source'=>$path]);
            event(new CommentCrud('Comment created successfully'));
        }
        return redirect(route('comments.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {   
        return view('admin.comments.show',compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {  
        return view('admin.comments.edit',compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        if(!empty($request->author_name)){
            $comment->author_name=$request->author_name;
         }
         if(!empty($request->author_function)){
            $comment->author_function=$request->author_function;
         }
         if(!empty($request->comment)){
             $comment->comment=$request->comment;
         }
         if(!empty($request->source) && $request->hasFile('source') && $request->file('source')->isValid()){
            $this->validate($request,[
                'source'=>'file|image|mimes:png,jpeg,jpg,gif,bmp'
            ]) ;
            $path=unlinkAndUpload($request->file('source'),'comments');
             $comment->source=$path;
         }
         
         $comment->save();
         event(new CommentCrud('Comment updated successfully'));
         return redirect(route('comments.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        unlinkFile((Comment::find($id))->source);
        Comment::destroy($id);
        event(new CommentCrud('Comment deleted successfully'));
        return redirect(route('comments.index'));
    }
}
