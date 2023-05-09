<div class="main-profile mb-0">
    @auth('web')
        <div class="image-bx bg-white rounded-circle ">
            <i class="flaticon-381-user-4 align-middle"></i>
        </div>
        <h5 class="name"><span class="font-w400"></span> {{ Auth::guard('web')->user()->nome }}</h5>
        <p class="email">{{ Auth::guard('web')->user()->email }}</p>
    @else
        <i class="flaticon-381-user-4 " style="font-size: 80px"></i>
        <p>Faça login para acessar o sistema</p>
        <span class="email"><a href="{{ route('login') }}">Login</a> / <a href="#">Register</a></span>
    @endauth
</div>
