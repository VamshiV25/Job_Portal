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
      
      @include ('admin.sidebar')
     
      <div class="page-content">
        @if(session()->has('message'))
        <div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert" 
              aria-hidden="true">x</button>
                {{session()->get('message')}}
        </div>
        @endif

      <div>
        <h1 class="title_dig">All Posts</h1>
        <table class="table table-dark table-hover">
          <tr>
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
          @foreach ( $data as $d)
          <tr>
            <td>{{$d->title}}</td>
            <td>{{$d->description}}</td>
            <td>{{$d->salary }}</td>
            <td>{{$d->name}}</td>
            <td>{{$d->post_status}}</td>
            <td>{{$d->usertype}}</td>
            <td><img class="img_dig" src="postimage/{{$d->image}}"></td>
            <td><a href="{{url('edit_post',$d->id)}}" class="btn btn-success">Edit</a></td>
            <td><a href="{{url('delete_post',$d->id)}}" class="btn btn-danger"
                    onClick="return confirm ('Are You Sure To Delete This ?')">Delete</a></td>
          </tr>
          @endforeach
        </table>
        </div>
        
      </div>

        @include ('admin.footer')
      </div>
    </div>
  </body>
</html>