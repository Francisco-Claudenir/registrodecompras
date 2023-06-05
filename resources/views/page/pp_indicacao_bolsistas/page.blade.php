@extends('layout.page', [
    'layout' => 'evt',
    'plugins' => ['lightgallery'],
])

@section('title', ' - Login')
@section('content-header')
    @include('sweet::alert')
    <div class="container-fluid ">
        <div class="card">
            <div class="container">
                <div class="d-flex flex-column">

                    <img src="{{ asset('images/semic.png') }}" alt="" srcset="" width="full" height="full">
                    <div class="pt-4 pb-4">
                        <span class="mt-4"><strong>{{ $pp_indicacao_bolsista->nome }}</strong></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="row p-4">
                <div class="col-xl-4">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card bg-light border">
                                <div class="card-body">
                                    <div class="profile-statistics">
                                        <div class="text-center">
                                            <div class="row">
                                                <div class="col">
                                                    <h4 class="m-b-0">
                                                        {{ date('d/m/Y', strtotime($pp_indicacao_bolsista->data_inicio)) }}
                                                    </h4>
                                                    <span>Data
                                                        início</span>
                                                </div>
                                                <div class="col">
                                                    <h4 class="m-b-0">
                                                        {{ date('d/m/Y', strtotime($pp_indicacao_bolsista->data_fim)) }}
                                                    </h4>
                                                    <span>Data
                                                        fim</span>
                                                </div>

                                            </div>
                                            <div class="row mt-4 justify-content-center">
                                                <a href="{{ route('pp-i-bolsistas-inscricao.create', ['pp_indicacao_bolsista_id' => $pp_indicacao_bolsista->pp_i_bolsista_id]) }}"
                                                    class="btn btn-primary mb-1">Inscreva-se</a>
                                                <a href="javascript:void(0);" class="btn btn-dark mb-1"
                                                    data-bs-toggle="modal" data-bs-target="#sendMessageModal">Login</a>
                                            </div>
                                        </div>
                                        <!-- Modal -->
                                        <div class="modal fade" id="sendMessageModal">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Send Message</h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="comment-form">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="text-black font-w600 form-label">Name
                                                                            <span class="required">*</span></label>
                                                                        <input type="text" class="form-control"
                                                                            value="Author" name="Author"
                                                                            placeholder="Author">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="text-black font-w600 form-label">Email
                                                                            <span class="required">*</span></label>
                                                                        <input type="text" class="form-control"
                                                                            value="Email" placeholder="Email"
                                                                            name="Email">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="mb-3">
                                                                        <label
                                                                            class="text-black font-w600 form-label">Comment</label>
                                                                        <textarea rows="8" class="form-control" name="comment" placeholder="Comment"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="mb-3 mb-0">
                                                                        <input type="submit" value="Post Comment"
                                                                            class="submit btn btn-primary" name="submit">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="card bg-light border">
                                <div class="card-body">
                                    <div class="profile-interest">
                                        <h5 class="text-primary d-inline">Galeria</h5>
                                        <div class="row mt-4 sp4" id="lightgallery">
                                            <a href="https://zenix.dexignzone.com/laravel/demo/images/profile/2.jpg"
                                                data-exthumbimage="https://zenix.dexignzone.com/laravel/demo/images/profile/2.jpg"
                                                data-src="https://zenix.dexignzone.com/laravel/demo/images/profile/2.jpg"
                                                class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
                                                <img src="https://zenix.dexignzone.com/laravel/demo/images/profile/2.jpg"
                                                    alt="" class="img-fluid rounded">
                                            </a>
                                            <a href="https://zenix.dexignzone.com/laravel/demo/images/profile/3.jpg"
                                                data-exthumbimage="https://zenix.dexignzone.com/laravel/demo/images/profile/3.jpg"
                                                data-src="https://zenix.dexignzone.com/laravel/demo/images/profile/3.jpg"
                                                class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
                                                <img src="https://zenix.dexignzone.com/laravel/demo/images/profile/3.jpg"
                                                    alt="" class="img-fluid">
                                            </a>
                                            <a href="https://zenix.dexignzone.com/laravel/demo/images/profile/4.jpg"
                                                data-exthumbimage="https://zenix.dexignzone.com/laravel/demo/images/profile/4.jpg"
                                                data-src="https://zenix.dexignzone.com/laravel/demo/images/profile/4.jpg"
                                                class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
                                                <img src="https://zenix.dexignzone.com/laravel/demo/images/profile/4.jpg"
                                                    alt="" class="img-fluid">
                                            </a>
                                            <a href="https://zenix.dexignzone.com/laravel/demo/images/profile/3.jpg"
                                                data-exthumbimage="https://zenix.dexignzone.com/laravel/demo/images/profile/3.jpg"
                                                data-src="https://zenix.dexignzone.com/laravel/demo/images/profile/3.jpg"
                                                class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
                                                <img src="https://zenix.dexignzone.com/laravel/demo/images/profile/3.jpg"
                                                    alt="" class="img-fluid">
                                            </a>
                                            <a href="https://zenix.dexignzone.com/laravel/demo/images/profile/4.jpg"
                                                data-exthumbimage="https://zenix.dexignzone.com/laravel/demo/images/profile/4.jpg"
                                                data-src="https://zenix.dexignzone.com/laravel/demo/images/profile/4.jpg"
                                                class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
                                                <img src="https://zenix.dexignzone.com/laravel/demo/images/profile/4.jpg"
                                                    alt="" class="img-fluid">
                                            </a>
                                            <a href="https://zenix.dexignzone.com/laravel/demo/images/profile/2.jpg"
                                                data-exthumbimage="https://zenix.dexignzone.com/laravel/demo/images/profile/2.jpg"
                                                data-src="https://zenix.dexignzone.com/laravel/demo/images/profile/2.jpg"
                                                class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
                                                <img src="https://zenix.dexignzone.com/laravel/demo/images/profile/2.jpg"
                                                    alt="" class="img-fluid">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="card bg-light border">
                                <div class="card-body">
                                    <div class="profile-news">
                                        <h5 class="text-primary d-inline">Posts</h5>
                                        <div class="media pt-3 pb-3">
                                            <img src="https://zenix.dexignzone.com/laravel/demo/images/profile/5.jpg"
                                                alt="image" class="me-3 rounded" width="75">
                                            <div class="media-body">
                                                <h5 class="m-b-5"><a
                                                        href="https://zenix.dexignzone.com/laravel/demo/post-details"
                                                        class="text-black">Collection of textile samples</a></h5>
                                                <p class="mb-0">I shared this on my fb wall a few months back, and I
                                                    thought.</p>
                                            </div>
                                        </div>
                                        <div class="media pt-3 pb-3">
                                            <img src="https://zenix.dexignzone.com/laravel/demo/images/profile/6.jpg"
                                                alt="image" class="me-3 rounded" width="75">
                                            <div class="media-body">
                                                <h5 class="m-b-5"><a
                                                        href="https://zenix.dexignzone.com/laravel/demo/post-details"
                                                        class="text-black">Collection of textile samples</a></h5>
                                                <p class="mb-0">I shared this on my fb wall a few months back, and I
                                                    thought.</p>
                                            </div>
                                        </div>
                                        <div class="media pt-3 pb-3">
                                            <img src="https://zenix.dexignzone.com/laravel/demo/images/profile/7.jpg"
                                                alt="image" class="me-3 rounded" width="75">
                                            <div class="media-body">
                                                <h5 class="m-b-5"><a
                                                        href="https://zenix.dexignzone.com/laravel/demo/post-details"
                                                        class="text-black">Collection of textile samples</a></h5>
                                                <p class="mb-0">I shared this on my fb wall a few months back, and I
                                                    thought.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="card bg-light border">
                        <div class="card-body">
                            <div class="profile-tab">
                                <div class="custom-tab-1">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a href="#about-me" data-bs-toggle="tab"
                                                class="nav-link active">Sobre</a>
                                        </li>
                                        <li class="nav-item"><a href="#my-posts" data-bs-toggle="tab"
                                                class="nav-link show">Posts</a>
                                        </li>
                                        <li class="nav-item"><a href="#profile-settings" data-bs-toggle="tab"
                                                class="nav-link ">Galeria</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="about-me" class="tab-pane fade active show">
                                            <div class="profile-about-me">
                                                <div class="pt-4 border-bottom-1 pb-4">
                                                    <h4 class="text-primary">About Me</h4>
                                                    <p class="mb-2">A wonderful serenity has taken possession of my
                                                        entire soul, like these sweet mornings of spring which I enjoy with
                                                        my whole heart. I am alone, and feel the charm of existence was
                                                        created for the bliss of souls like mine.I am so happy, my dear
                                                        friend, so absorbed in the exquisite sense of mere tranquil
                                                        existence, that I neglect my talents.</p>
                                                </div>
                                            </div>
                                            <div class="profile-skills mb-5">
                                                <h4 class="text-primary mb-2">Skills</h4>
                                            </div>
                                            <div class="profile-personal-info">
                                                <h4 class="text-primary mb-4">Personal Information</h4>
                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Name <span class="pull-end">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7"><span>Mitchell C.Shay</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Email <span class="pull-end">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7"><span>example@examplel.com</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Availability <span class="pull-end">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7"><span>Full Time (Free Lancer)</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Age <span class="pull-end">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7"><span>27</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Location <span class="pull-end">:</span></h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7"><span>Rosemont Avenue Melbourne,
                                                            Florida</span>
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-sm-3 col-5">
                                                        <h5 class="f-w-500">Year Experience <span
                                                                class="pull-end">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-sm-9 col-7"><span>07 Year Experiences</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="my-posts" class="tab-pane fade">
                                            <div class="my-post-content pt-3">
                                                <div class="card p-4">
                                                    <div class="profile-uoloaded-post border-bottom-1 pb-5">
                                                        <img src="https://zenix.dexignzone.com/laravel/demo/images/profile/8.jpg"
                                                            alt="" class="img-fluid w-100 rounded border">
                                                        <a class="post-title"
                                                            href="https://zenix.dexignzone.com/laravel/demo/post-details">
                                                            <h3 class="text-black">Collection of textile samples lay spread
                                                            </h3>
                                                        </a>
                                                        <p>A wonderful serenity has take possession of my entire soul like
                                                            these
                                                            sweet morning of spare which enjoy whole heart.A wonderful
                                                            serenity
                                                            has take possession of my entire soul like these sweet morning
                                                            of spare which enjoy whole heart.</p>
                                                        <div class="flex col-7">
                                                            <div class="card border p-4">
                                                                <div class="d-flex align-items-center">
                                                                    <div
                                                                        class="col-2 p-4 border shadow-sm bg-bodyborder-light rounded d-flex justify-content-center  align-items-center">
                                                                        <a href="#">
                                                                            <i class="fas fa-download text-dark "></i>
                                                                        </a>
                                                                    </div>
                                                                    <div
                                                                        class="col-8 p-4 justify-content-center  align-items-center">
                                                                        <strong>Edital</strong><br>
                                                                        <small>sdaihsdifhsadfhsadihfsdffdgdgdfgdfgdfgdfgdfgfdhs</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-primary me-2"><span class="me-2"><i
                                                                    class="fa fa-heart"></i></span>Like</button>
                                                        <button class="btn btn-secondary" data-bs-toggle="modal"
                                                            data-bs-target="#replyModal"><span class="me-2"><i
                                                                    class="fa fa-reply"></i></span>Reply</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div id="profile-settings" class="tab-pane fade ">
                                            <div class="pt-4">
                                                <div class="settings-form">
                                                    <h4 class="text-primary ">Galeria</h4>
                                                    <div class="row mt-4 sp4" id="lightgallery2">
                                                        <a href="https://zenix.dexignzone.com/laravel/demo/images/profile/2.jpg"
                                                            data-exthumbimage="https://zenix.dexignzone.com/laravel/demo/images/profile/2.jpg"
                                                            data-src="https://zenix.dexignzone.com/laravel/demo/images/profile/2.jpg"
                                                            class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
                                                            <img src="https://zenix.dexignzone.com/laravel/demo/images/profile/2.jpg"
                                                                alt="" class="img-fluid rounded">
                                                        </a>
                                                        <a href="https://zenix.dexignzone.com/laravel/demo/images/profile/3.jpg"
                                                            data-exthumbimage="https://zenix.dexignzone.com/laravel/demo/images/profile/3.jpg"
                                                            data-src="https://zenix.dexignzone.com/laravel/demo/images/profile/3.jpg"
                                                            class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
                                                            <img src="https://zenix.dexignzone.com/laravel/demo/images/profile/3.jpg"
                                                                alt="" class="img-fluid rounded">
                                                        </a>
                                                        <a href="https://zenix.dexignzone.com/laravel/demo/images/profile/4.jpg"
                                                            data-exthumbimage="https://zenix.dexignzone.com/laravel/demo/images/profile/4.jpg"
                                                            data-src="https://zenix.dexignzone.com/laravel/demo/images/profile/4.jpg"
                                                            class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
                                                            <img src="https://zenix.dexignzone.com/laravel/demo/images/profile/4.jpg"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                        <a href="https://zenix.dexignzone.com/laravel/demo/images/profile/3.jpg"
                                                            data-exthumbimage="https://zenix.dexignzone.com/laravel/demo/images/profile/3.jpg"
                                                            data-src="https://zenix.dexignzone.com/laravel/demo/images/profile/3.jpg"
                                                            class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
                                                            <img src="https://zenix.dexignzone.com/laravel/demo/images/profile/3.jpg"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                        <a href="https://zenix.dexignzone.com/laravel/demo/images/profile/4.jpg"
                                                            data-exthumbimage="https://zenix.dexignzone.com/laravel/demo/images/profile/4.jpg"
                                                            data-src="https://zenix.dexignzone.com/laravel/demo/images/profile/4.jpg"
                                                            class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
                                                            <img src="https://zenix.dexignzone.com/laravel/demo/images/profile/4.jpg"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                        <a href="https://zenix.dexignzone.com/laravel/demo/images/profile/2.jpg"
                                                            data-exthumbimage="https://zenix.dexignzone.com/laravel/demo/images/profile/2.jpg"
                                                            data-src="https://zenix.dexignzone.com/laravel/demo/images/profile/2.jpg"
                                                            class="mb-1 col-lg-4 col-xl-4 col-sm-4 col-6">
                                                            <img src="https://zenix.dexignzone.com/laravel/demo/images/profile/2.jpg"
                                                                alt="" class="img-fluid">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="replyModal">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Post Reply</h5>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <textarea class="form-control" rows="4">Message</textarea>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Reply</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=" footer">
        <div class="copyright">
            <p>
                Todos os direitos reservados Universidade Estadual do Maranhão -
                <a href="https://www.uema.br/" target="_blank">UEMA</a> {{ now()->year }}
            </p>
            <p>
                Coordenação de Tecnologia da Informação e Comunicação -
                <a href="https://ctic.uema.br/" target="_blank">CTIC</a>
            </p>
        </div>
    </div>
@endsection

@section('scripts')

    <script>
        $('#lightgallery2').lightGallery({
            loop: true,
            thumbnail: true,
            exThumbImage: 'data-exthumbimage'
        });
    </script>
@endsection
