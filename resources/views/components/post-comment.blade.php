
@props(['comment'])
<div class="bg-gray-100 border border-top-0 p-4 mt-5 space-y-6">
    <div class="media mb-4">
        <div class="media-body ">
            <h6> {{ $comment->author->username }} <small><time>{{ $comment->created_at->diffForHumans() }}</time></small></h6>
            <p>{{ $comment->body }}</p>
            <button class="btn btn-sm btn-outline-secondary">Reply</button>
        </div>
    </div>
    <div class="media">

    </div>
</div>
