<!DOCTYPE html>
<html lang="en">
  <head>

      @include('home.css')

      <style type="text/css">
        .div_deg{
            text-align:center;
        }
        .title_deg{
            font-size:30px;
            font-weight:bold;
            text-align:center;
            padding:30px;
            color:white;
        }
        label{
            display:inline block;
            width:200px;
            color:white;
            font-size:18px;
            font-weight:bold;
            padding:10px;
        }
        .field_deg{
            padding:15px;
        }
        
      </style>
      
  </head>
  <body>
    @include('sweetalert::alert')
      <!-- header section start -->
    <div class="header_section">  
            @include ('home.header')

        <div class="div_deg">
            <h1 class="title_deg">Add Post</h1>
            <form action="{{url('user_post')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="field_deg">
                    <label>Title</label>
                    <input type="text" name="title">
                </div>
                <div class="field_deg">
                    <label>Description</label>
                    <textarea name="description"></textarea>
                </div>
                <div class="field_deg">
                    <label>Salary</label>
                    <input type="text" name="salary">
                </div>
                <div class="field_deg">
                    <label>Add Image</label>
                    <input type="file" name="image">
                </div>
                <div class="field_deg">
                    <input type="submit" value="Add post" class="btn btn-outline-secondary">
                </div>
            </form>
        </div>


      <!-- footer section start -->
        @include ('home.footer')
      <!-- footer section end -->
      <!-- copyright section start -->
        @include ('home.copy')
      <!-- copyright section end -->

        
  </body>
</html>
