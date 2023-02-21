<?php use App\Models\News; ?>
@extends('layout')

@section('content')

<!-- Breaking News Start -->
<div class="container-fluid mt-5 mb-3 pt-3">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <div class="section-title border-right-0 mb-0" style="width: 180px;">
                        <h4 class="m-0 text-uppercase font-weight-bold">Tranding</h4>
                    </div>
{{--                    <div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center bg-white border border-left-0"--}}
{{--                         style="width: calc(100% - 180px); padding-right: 100px;">--}}
{{--                        <?php--}}
{{--                        $newses = News::all();--}}
{{--                        ?>--}}
{{--                        @for($i = 0;$i<=3; $i++)--}}


{{--                        <div class="text-truncate"><a class="text-secondary text-uppercase font-weight-semi-bold"--}}
{{--                                                      href="<?=$newses[$i]->slug?>">--}}

{{--                                        <?=$newses[$i]->abbr?>--}}

{{--                            </a></div>--}}
{{--                        @endfor--}}

{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breaking News End -->


<!-- News With Sidebar Start -->
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">

                <img src="{{ asset('storage/' . $news->thumbnail) }}" alt="" class="">
            </div>
            <div class="col-lg-8">
                <div class="bg-white border border-top-0 p-4">
                    <div class="mb-3">

                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                           href="/categories/<?=$news->category->slug?>">
                            <?=$news->category->name; ?>
                        </a>
                        <?=$news->created_at->diffForHumans(); ?>
                        <a href="/authors/<?= $news->author->username?>"> By <?= $news->author->name?></a>

                    </div>

                <!-- News Detail Start -->
                    <?=$news->body; ?>
                <!-- News Detail End -->

                <!-- Comment List Start -->
                <div class="mb-3">
{{--                    <div class="section-title mb-0">--}}
{{--                        <h4 class="m-0 text-uppercase font-weight-bold"> <?php $news->comments-> ?> Comments</h4>--}}
{{--                    </div>--}}
                    @foreach ($news->comments as $comment)
                        <x-post-comment :comment="$comment" />
                    @endforeach
                </div>
                <!-- Comment List End -->

                <!-- Comment Form Start -->
               @auth
                        <div class="mb-3">
                            <div class="section-title mb-0">
                                <h4 class="m-0 text-uppercase font-weight-bold">Leave a comment</h4>
                            </div>
                            <div class="bg-white border border-top-0 p-4">
                                <form method="POST" action="/newses/{{$news->slug}}/comments">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <span>Name: </span><label class="font-weight-bold " for="name">{{ auth()->user()->name }}</label>

                                            </div>
                                        </div>

                                    </div>


                                    <div class="form-group">
                                        <label for="message">Message</label>
                                        <textarea name="body" cols="30" rows="5" class="form-control"></textarea>
                                    @error('body')
                                        <p class="text-xs text-red-500">{{ $message }}</p>
                                    </div>
                                    @enderror
                                    <x-submit-button>Leave a comment</x-submit-button>
                                </form>
                            </div>
                        </div>

                    @else
                   <p>
                       <a href="/register">Register </a> or <a href="/login">Log in </a> to leave a comment.
                   </p>
                    @endauth
                <!-- Comment Form End -->
            </div>
            </div>
        </div>
    </div>
</div>

@endsection
