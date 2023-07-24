<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">
    @include ('admin.css')

    <style>
        .post_title{
            font-size:30px;
            font-weight:bold;
            text-align:center;
            padding:30px;
            color:white;
        }
        .div_center{
            text-align:center;
            padding:20px;
        }
        label{
            display:inline block;
            width:200px;
            color:white;
            font-size:18px;
            font-weight:bold;
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
        @if( session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="btn btn-success" data-dismiss="alert" 
                        aria-hideen="true">x</button>
                    {{ session()->get('message')}}
            </div>
        @endif
        <h1 class="post_title">Update Post</h1>
         <form action="{{url('update_post',$data->id)}}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="div_center">
                    <label>Post Title</label>
                    <input type="text" name="title" value="{{$data->title}}">
                </div>
                <div class="div_center">
                    <label>Post Description</label>
                    <textarea name="description">{{$data->description}}</textarea>
                </div>
                <div class="div_center">
                    <label>Salary</label>
                    <input type="text" name="salary" value="{{ $data->salary }}">
                </div>
                <div class="div_center">
                    <label>Old Image</label>
                    <img style="margin:auto;" height="100px" width="150px" src="/postimage/{{$data->image}}">
                </div>
                <div class="div_center">
                    <label>Update Old Image</label>
                    <input type="file" name="image">
                </div>
                <div class="div_center">
                    <input type="submit" class="btn btn-primary">
                </div>
        </form>
     </div>

        @include ('admin.footer')
      </div>
    </div>
  </body>
</html>