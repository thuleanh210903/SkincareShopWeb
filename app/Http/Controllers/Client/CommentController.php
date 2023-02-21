<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\comment ;
use App\Models\comment_content;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function comment(Request $request,$idProduct)
    {
    
      $comment=  comment::create(
            [
                'admin'=>1,
                'idUsers'=>Auth::user()->user_id,
                'id_product'=>$idProduct,
                'parent_id'=>0
            ]
            );
            comment_content::create(
                [
                    'content'=>$request->content,
                    'idComment'=>$comment->id,
                    'idAuthur'=>Auth::user()->user_id
                ]
                );
            return back();
            
    }
    public function reply(Request $request,$idComment)
    {   
        $reply= Reply::create(
            [
                'content'=>$request->content,
                'idComment'=>$idComment
            ]
            );
        
            return back();
    }
    // public function all_comment(){
    //     return view('user.comment.table-da')
    // }
}
