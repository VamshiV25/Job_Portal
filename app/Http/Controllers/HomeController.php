<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Alert;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if( auth::id() ){
            $usertype = auth()->user()->usertype;
            if( $usertype == 'user'){

                return view ( 'home.homepage');

                // return response()->json(['message' => 'User Homepage'], 200);

            }
            elseif ( $usertype == 'admin'){

                return view ('admin.adminhome');

                // return response()->json(['message' => 'Admin Homepage'], 200);

            }
            else {

                return redirect()->back();

                // return response()->json(['message' => 'Unknown User Type'], 400);

            }
        }
    }

    public function homepage(){

        return view ('home.homepage');
        
    }

    public function post_details(){

        $data = Post::find($id);

        if ($data) {
            return response()->json(['data' => $data], 200);
        } else {
            return response()->json(['message' => 'Post not found'], 404);
        }

        return view ('home.post_details',compact('data'));
       
    }

    public function create_post(){

        return view ('home.create_post');

        // return response()->json(['message' => 'Post Created Successfully', 'data' => $data], 201);
    
       
    }

    public function user_post(Request $request){

        $user = auth()->user();
        $userid = $user->id;
        $name = $user->name;
        $usertype = $user->usertype;

        $data = new Post;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->salary = $request->salary;
        $data->post_status = 'pending';
        $data->user_id = $userid;
        $data->name = $name;
        $data->usertype = $usertype;

        $image = $request->image;
        if ($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('postimage',$imagename);
            $data->image = $imagename;
        }
        $data->save();
        Alert::success('Congrats','You Have Added The Data Succesfully');
        return redirect()->back();

    }

    public function my_post(){

        $user = auth::user();
        $userid = $user->id;
        $data = Post::where( 'user_id','=',$userid)->get();

        return view ('home.my_post',compact('data'));

        // return response()->json(['data' => $data], 200);

    }

    public function post_update_page($id){

        $data = Post::find($id);

        return view ('home.post_update_page',compact('data'));

    }

    public function update_post_data(Request $request,$id){

        $data = Post::find($id);
        // if (!$data) {
        //     return response()->json(['error' => 'Post not found'], 404);
        // }

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

        // return response()->json(['message' => 'Post Updated Successfully', 'data' => $data], 200);

    }

    public function my_post_delete($id){

        $data = Post::find($id);
        // if (!$data) {
        //     return response()->json(['error' => 'Post not found'], 404);
        // }

        $data->delete();

        return redirect()->back()->with('message','Post Deleted Succesfully');

        // return response()->json(['message' => 'Post Deleted Successfully'], 200);

    }

}
