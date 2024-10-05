@extends('user.layout')
@section('title','À propos ')
@section('content')
<div class="about-container  ">
    <div class="image-banner-container">
        <img id="banner_about"  src="{{asset('images/courses_banner.jpg')}}" alt="">
    </div>
    <div class="about-content container">
        <div class="top-content">
          <img src="{{asset('images/about_image.jpg')}} " alt="">  
          <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium omnis laborum tempore iste? Impedit quidem aspernatur suscipit recusandae ratione expedita, modi amet odit quae consectetur eius error explicabo quia. Id?
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi voluptatum dignissimos et ea sit suscipit quis iure. Quod voluptatem praesentium eaque dolor nemo sapiente vel blanditiis, beatae, inventore reiciendis necessitatibus?
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nobis, sed soluta. Eaque consectetur impedit sunt harum! Consequatur, officia. Quidem maiores dicta odit fuga expedita natus voluptatem repellat cupiditate, iure in!  
            </p>
        </div>
        <div class="end-content">
            <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Temporibus eius soluta, quia commodi illo architecto itaque enim sequi? Praesentium aperiam atque dignissimos a nihil eligendi officiis illum, dolore rerum eveniet.
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum aperiam expedita est voluptates, officia enim aliquam explicabo reiciendis animi, maiores sed at quia doloremque ipsa nam perspiciatis laboriosam molestiae tempore.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore ratione a deleniti excepturi? Voluptas dolor accusamus culpa distinctio, voluptates sapiente et, fuga, aut ratione deleniti est porro dicta animi doloremque?
            </p>
        </div>
    </div>
</div>


@endsection