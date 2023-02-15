<div class="main-profile mb-0">
    @auth
    <div class="image-bx bg-white rounded-circle ">
        <i class="flaticon-381-user-4 align-middle"></i>
    </div>
    <h5 class="name"><span class="font-w400">Hello,</span> {{ Auth::user()->name }}</h5>
    <p class="email">marquezzzz@mail.com</p>
        @else
        <i class="flaticon-381-user-4 " style="font-size: 80px"></i>
        <p>Faça login para acessar o sistema</p>
        <span class="email"><a href="#">Login</a> / <a href="#">Register</a></span>
        @endauth
</div>
