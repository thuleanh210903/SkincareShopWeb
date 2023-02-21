<?php

namespace App\Http\Controllers\Admin;
use App\Models\post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category_post;
class CategoryPostController extends Controller
{
    public function all_category_post()
    {
        $all_category_post = category_post::all();
     
        return view('admin.post.table-data-cate-post', ['all_category_post', $all_category_post]);
    }

    public function add_category_post()
    {
        return view('admin.post.form-add-cate-post');
    }

    public function save_category_post(Request $request)
    {
        $data = array();
        


        $data['cate_post_name'] = $request->cate_post_name;
        $data['cate_post_status'] = $request->cate_post_status;
        $data['cate_post_desc'] = $request->cate_post_desc;
      
        category_post::insert($data);
        return redirect('/all-category-post');
    }

    public function edit_category_post($id_cate_post)
    {
        $edit_category_post = category_post::where('id_cate_post', $id_cate_post)->get();
        return view('admin.post.edit-category-post', compact('edit_category_post'));
    }
    public function update_category_post(Request $request, $id_cate_post)
    {
        $data = array();
        $data['cate_post_name'] = $request->cate_post_name;
        $data['cate_post_status'] = $request->cate_post_status;
        $data['cate_post_desc'] = $request->cate_post_desc;
        category_post::where('id_cate_post', $id_cate_post)->update($data);
        return redirect('/all-category-post');
    }



    public function delete_category_post($id_cate_post)
    {
        category_post::where('id_cate_post', $id_cate_post)->delete();
        return redirect('/all-category-post');
    }

    public function show_category_post(){
        $category_post = category_post::where('cate_post_status',1)->get();
        return view('user.index',compact('category_post',$category_post));
    }
    //
    public function show_post($id_cate_post, Request $request){
        $cate_post_by_id = post::join('category_post', 'post.id_cate_post', '=', 'category_post.id_cate_post')->where('post.id_cate_post', $id_cate_post)->paginate(5);
        return view('user.blog')->with('cate_post_by_id', $cate_post_by_id);
    }
}
