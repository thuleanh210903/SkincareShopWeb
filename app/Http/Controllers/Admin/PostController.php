<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category_post;
use Illuminate\Http\Request;
use App\Models\post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all_post()
    {
        $all_post = post::join('category_post', 'category_post.id_cate_post', '=', 'post.id_cate_post')->orderBy('post.id_post', 'desc')->get();;
      
        return view('admin.post.table-data-post', ['all_post', $all_post]);
    }

    public function add_post()
    {
        $cate_po = category_post::orderby('id_cate_post', "asc")->get();
        return view('admin.post.form-add-post',compact('cate_po'));
    }

    public function save_post(Request $request)
    {
        $data = array();

        $data['post_title'] = $request->post_title;
        $data['id_cate_post'] = $request->id_cate_post;
        $data['content'] = $request->content;
        $data['post_sum'] = $request->post_sum;
        $data['post_meta_desc'] = $request->post_meta_desc;
        $data['post_status'] = $request->post_status;
        $get_image = $request->file('post_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . time() . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/admin/image/post', $new_image);
            $data['post_image'] = $new_image;
           post::insert($data);
        } else {
            $data['post_image'] = '';
        }
    
        
        post::insert($data);
        return redirect('/all-post');
    }

    public function edit_category_post($id_post)
    {
        $edit_post = category_post::where('id_post', $id_post)->get();
        return view('admin.post.edit-post', compact('edit_post'));
    }
    public function update_post(Request $request, $id_post)
    {
        $data = array();
        $data['post_title'] = $request->post_title;
        $data['id_cate_post'] = $request->id_cate_post;
        $data['content'] = $request->content;
        $data['post_sum'] = $request->post_sum;
        $data['post_meta_desc'] = $request->post_meta_desc;
        $data['post_status'] = $request->post_status;
        post::where('id_post', $id_post)->update($data);
        return redirect('/all-post');
    }



    public function delete_post($id_post)
    {
        post::where('id_post', $id_post)->delete();
        return redirect('/all-post');
    }

    public function show_post_detail($id_post, Request $request){
        $post = post::join('category_post', 'category_post.id_cate_post', '=', 'post.id_cate_post')->where('post.id_post', $id_post)->get();
       return view('user.blog-detail',compact('post'));
       

    }
}
