<!DOCTYPE html>
<html lang="en">
    @include('home.css')
   <body>
      <!-- header section start -->
      <div class="header_section">
         @include('home.header')

         <!-- banner section start -->
         @include('home.banner')
         <!-- banner section end -->
      </div>
      <!-- header section end -->

      <!-- about section start -->
      @include('home.about')
      <!-- about section end -->


      <!-- copyright section start -->
      @include('home.copy')
      <!-- copyright section end -->
   </body>
</html>