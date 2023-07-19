<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style>
      body{
        background-color:black;
      }
        .post_title{
            font-size:30px;
            font-weight:bold;
            text-align:center;
            padding:30px;
            color:red;

        }
        .div_center{
            text-align:center;
            padding:40px;
        }
        label{
            display:inline block;
            width:100px;
        }
    </style>

  </head>
  <body>
        
    @include('admin.header')

    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
    @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      
      @if( session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="btn btn-primary" data-dismiss="alert" 
                    aria-hideen="true">x</button>
                {{ session()->get('message')}}
        </div>
        @endif
        
        <h1 class="post_title">Add Post</h1>
        <div class="div_center">
            <form action="{{url('add_post')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="div_center">
                    <label>Post Title</label>
                    <input type="text" name="title">
                </div>
                <div class="div_center">
                    <label>Post Description</label>
                    <textarea name="description"></textarea>
                </div>
                <div class="div_center">
                    <label>Salary</label>
                    <input type="text" name="salary">
                </div>
                <div class="div_center">
                    <label>Add Image</label>
                    <input type="file" name="image">
                </div>
                <div class="div_center">
                    <input type="submit" class="btn btn-primary">
                </div>
            </form>
        </div>
        
      @include('admin.footer')
      </div>
    </div>
  </body>
</html>