<!DOCTYPE html>
<html lang="en">
  <head>
      
      @include('home.css')

      <style>
        .post_deg{
            padding:30px;
            text-align:center;
            background-color:black;
        }
        .title_deg{
            font-size:30px;
            font-weight:bold;
            padding:15px;
            color:white;
        }
        .desc_deg{
            font-size:18px;
            font-weight:bold;
            padding:15px;
            color:whitesmoke;
        }
        .img_deg{
            height:200px;
            width:300px;
            padding:30px;
            margin:auto;
        }
      </style>

  </head>
  <body>
      <!-- header section start -->
    <div class="header_section">
         
            @include ('home.header')

            @if (session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert"
                        aria-hidden="true">x</button>
                        {{session()->get('message')}}
                </div>
            @endif

            @foreach( $data as $data)
            <div class="post_deg">
                <img class="img_deg" src="/postimage/{{$data->image}}" alt="">
                <h4 class="title_deg">{{$data->title}}</h4>
                <p class="desc_deg">{{$data->description}}</p>
                <a onclick="return confirm('Are You Sure To Delete This ?')"
                    href="{{url('my_post_delete',$data->id)}}" class="btn btn-danger">Delete</a>
                <a href="{{url('post_update_page',$data->id)}}" class="btn btn-primary">Update</a>    
            </div>
            @endforeach
    </div>
      <!-- header section end -->

      <!-- footer section start -->
        @include ('home.footer')
      <!-- footer section end -->
      <!-- copyright section start -->
        @include ('home.copy')
      <!-- copyright section end -->

        
  </body>
</html>