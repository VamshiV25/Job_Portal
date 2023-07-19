<!DOCTYPE html>
<html>
  <head> 
    @include ('admin.css')
    <style>
        .title_dig{
            font-size:30px;
            font-weight:bold;
            color:white;
            padding:30px;
            text-align:center;
        }
        .table_dig{
            border:1px solid white;
            border-color:blue;
            width:85%;
            text-align:center;
            margin-left:70px;
        }
        .th_dig{
            background-color:lightyellow;
            color:red;
        }
        .img_dig{
            height:100px;
            width:150px;
            padding:10px;
        }
    </style>
  </head>
  <body>
    @include ('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include ('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        @if(session()->has('message'))
        <div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert" 
              aria-hidden="true">x</button>
                {{session()->get('message')}}
        </div>
        @endif
        <h1 class="title_dig">All Posts</h1>
        <table class="table_dig">
            <tr class="th_dig">
                <th>Post Title</th>
                <th>Description</th>
                <th>Salary</th>
                <th>Post By</th>
                <th>Post Status</th>
                <th>Usertype</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach ( $post as $post)
            <tr>
                <td>{{$post->title}}</td>
                <td>{{$post->description}}</td>
                <td>{{ $post->salary }}</td>
                <td>{{$post->name}}</td>
                <td>{{$post->post_status}}</td>
                <td>{{$post->usertype}}</td>
                <td><img class="img_dig" src="postimage/{{$post->image}}"></td>
                <td><a href="{{url('edit_post',$post->id)}}" class="btn btn-success">Edit</a></td>
                <td><a href="{{url('delete_post',$post->id)}}" class="btn btn-danger"
                      onClick="return confirm ('Are You Sure To Delete This ?')">Delete</a></td>
            </tr>
            @endforeach
        </table>
      </div>

        @include ('admin.footer')
      </div>
    </div>
  </body>
</html>