<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public $token = 'vtoken1';

    public function post_page(){

        return view ('admin.post_page');

    }

    public function add_post(Request $request){

        $user = auth()->user();
        $userid = $user->id;
        $name = $user->name;
        $usertype = $user->usertype;

        $data = new Post;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->salary = $request->salary;
        $data->post_status = 'active';
        $data->user_id = $userid;
        $data->name = $name;
        $data->usertype = $usertype;

        $image = $request->image;
        if ($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
        }
        $request->image->move('postimage',$imagename);

        $data->image = $imagename;
       
        $data->save();
        
        return redirect()->back()->with('message','Post Added Succesfully');

        // return response()->json(['message' => 'Post Added Successfully'], 200);

    }

    public function show_post(){

        $data = Post::all();

        return view ('admin.show_post',compact('data'));

        // return response()->json($data);

    }

    public function edit_post($id){

        $data = Post::find($id);

        return view ('admin.edit_post',compact('data'));

        // return response()->json($data);

    }

    public function update_post(Request $request,$id){

         // Validate the request data
         $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);
        
        $data = Post::find($id);

        $data->title = $request->title;
        $data->description = $request->description;
        $data->salary = $request->salary;
        
        $image = $request->image;
        if( $image ){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('postimage',$imagename);
            $data->image = $imagename;
        }
        $data->save();

        return redirect()->back()->with('message','Post Updated Succesfully');

        // return response()->json(['message' => 'Post Updated Successfully'], 200);


    }

    public function delete_post($id){

        $data = Post::find($id);

        $data->delete();

        return redirect()->back()->with('message','Post Deleted Succesfully');

        // return response()->json(['message' => 'Post Deleted Successfully'], 200);

    }

}