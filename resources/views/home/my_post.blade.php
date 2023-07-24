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
          font-size: 20px;
            padding: 10px;
            color: blue;
            border-radius: 5px;
            margin-top: 10px;
            text-align: center;
        }
        .img_deg{
            height:300px;
            width:400px;
            padding:30px;
            margin:auto;
        }
        .salary_deg {
            font-size: 20px;
            padding: 10px;
            color: white;
            border-radius: 5px;
            margin-top: 10px;
            text-align: center;
        }
        .abcd{
          background: #000;
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
              <section class="abcd">
                <img class="img_deg" src="/postimage/{{$data->image}}" alt="">
                  <h4 class="title_deg">{{$data->title}}</h4>
                  <p class="desc_deg">{{$data->description}}</p>
                  <p class="salary_deg">Salary: {{$data->salary}}</p>
                  <a onclick="return confirm('Are You Sure To Delete This ?')"
                      href="{{url('my_post_delete',$data->id)}}" class="btn btn-danger">Delete</a>
                  <a href="{{url('post_update_page',$data->id)}}" class="btn btn-primary">Update</a>              
              </section>
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