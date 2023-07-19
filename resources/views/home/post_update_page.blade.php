<!DOCTYPE html>
<html lang="en">
  <head>

    <base href="/public">
      
      @include('home.css')

      <style type="text/css">
            .div_deg{
                text-align:center;
                background-color:black;
            }
            .img_deg{
                height:150px;
                width:250px;
                margin:auto;
            }
            label{
                font-size:18px;
                font-weight:bold;
                width:200px;
                color:white;
            }
            .input_deg{
                padding:17px;
            }
            .title_deg{
                font-size:30px;
                font-weight:bold;
                padding:30px;
                color:white;
            }
      </style>

  </head>
  <body>
      <!-- header section start -->
    <div class="header_section">
         
        @include ('home.header')

        <div class="div_deg">
            
        @if (session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert"
                        aria-hidden="true">x</button>
                        {{session()->get('message')}}
                </div>
            @endif
            
            <h1 class="title_deg">Update Post</h1>
            <form action="{{url('update_post_data',$data->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="input_deg">
                    <label>Title</label>
                    <input type="text" name="title" value="{{$data->title}}">
                </div>
                <div class="input_deg">
                    <label>Description</label>
                    <textarea name="description">{{$data->description}}</textarea>
                </div>
                <div class="input_deg">
                    <label>Salary</label>
                    <input type="text" name="salary" value="{{ $data->salary }}">
                </div>
                <div class="input_deg">
                    <label>Current Image</label>
                    <img  class="img_deg"src="/postimage/{{$data->image}}" height="150px" width="250px" alt="">
                </div>
                <div class="input_deg">
                    <label>Change Current Image</label>
                    <input type="file" name="image">
                </div>
                <div class="input_deg">
                    <input type="submit" class="btn btn-outline-secondary">
                </div>
            </form>
        </div>

        
    </div>
      <!-- footer section start -->
        @include ('home.footer')
      <!-- footer section end -->
      <!-- copyright section start -->
        @include ('home.copy')
      <!-- copyright section end -->

        
  </body>
</html>
