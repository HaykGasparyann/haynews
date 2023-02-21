@extends('layout')
@section('content')
<!-- News With Sidebar Start -->
<div class="container-fluid mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h4 class="m-0 text-uppercase font-weight-bold">Latest News</h4>
                            <a class="text-secondary font-weight-medium text-decoration-none" href="/">View All</a>
                        </div>
                    </div>
                </div>



                    <div class="col-lg-12">
                        @if($newses->count())
                        <?php foreach ($newses as $news): ?>
                        <div class="row news-lg mx-0 mb-3">
                            <div class="col-md-12 d-flex flex-column border bg-white h-100 px-0 margin_for_div">
                                <div class="mt-auto p-4">
                                    <div class="mb-2">
                                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                           href="/categories/<?=$news->category->slug?>">
                                                <?=$news->category->name; ?>
                                        </a>
                                        <a class="text-body" href=""><small>
                                                    <?=$news->date; ?>

                                            </small></a>
                                    </div>
                                    <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href="/newses/<?= $news->slug; ?>">
                                            <?= $news->title; ?>
                                    </a>
                                    <p class="m-0">
                                            <?= $news->abbr; ?>
                                    ...</p>
                                    <div class="d-flex justify-content-between bg-white border-top mt-auto p-4">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle mr-2" src="img/user.jpg" width="25" height="25" alt="">
                                            <a href="authors/<?= $news->author->username?>">  <small> <?= $news->author->name?> </small></a>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <small class="ml-3"><i class="far fa-eye mr-2"></i><?php echo rand(4000,8000); ?></small>
                                            <small class="ml-3"><i class="far fa-comment mr-2"></i><?php echo rand(150,300); ?></small>
                                        </div>
                                </div>
                            </div>
                        </div>
                        </div>

                        <?php endforeach; ?>
                    </div>

                        {{$newses->links()}}

                        @else
                            <p>No News yet, please come back later.</p>
                        @endif



                    </div>



            <div class="col-lg-4">
                <!-- Social Follow Start -->
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Follow Us</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-3">
                        <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #39569E;">
                            <i class="fab fa-facebook-f text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                            <span class="font-weight-medium"><?php echo rand(4000,8000); ?> Fans</span>
                        </a>
                        <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #52AAF4;">
                            <i class="fab fa-twitter text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                            <span class="font-weight-medium"><?php echo rand(4000,8000); ?> Followers</span>
                        </a>
                        <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #0185AE;">
                            <i class="fab fa-linkedin-in text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                            <span class="font-weight-medium"><?php echo rand(4000,8000); ?> Connects</span>
                        </a>
                        <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #C8359D;">
                            <i class="fab fa-instagram text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                            <span class="font-weight-medium"><?php echo rand(4000,8000); ?> Followers</span>
                        </a>
                        <a href="" class="d-block w-100 text-white text-decoration-none mb-3" style="background: #DC472E;">
                            <i class="fab fa-youtube text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                            <span class="font-weight-medium"><?php echo rand(4000,8000); ?> Subscribers</span>
                        </a>
                        <a href="" class="d-block w-100 text-white text-decoration-none" style="background: #055570;">
                            <i class="fab fa-vimeo-v text-center py-4 mr-3" style="width: 65px; background: rgba(0, 0, 0, .2);"></i>
                            <span class="font-weight-medium"><?php echo rand(4000,8000); ?> Followers</span>
                        </a>
                    </div>
                </div>
                <!-- Social Follow End -->

            </div>
            </div>
        </div>
        </div>
    </div>
</div>
<!-- News With Sidebar End -->




@endsection
