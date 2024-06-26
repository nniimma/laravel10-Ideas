<div>
    <form action="{{ route('ideas.comments.store', $idea->id) }}" method="post">
        @csrf
        <div class="mb-3">
            <textarea placeholder="My comment..." name="comment" class="fs-6 form-control" rows="1">{{ old('comment') }}</textarea>
            @error('comment')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <button class="btn btn-primary btn-sm"> Post Comment </button>
        </div>
    </form>
    @foreach ($idea->comments as $comment)
        <hr>
        <div class="d-flex align-items-start">
            <img style="width:35px" class="me-2 avatar-sm rounded-circle" src="{{ $comment->user->getImageURL() }}"
                alt="{{ $comment->user->name }}">
            <div class="w-100 mt-2">
                <div class="d-flex justify-content-between">
                    <h6 class="">{{ $comment->user->name }}</h6>
                    <small class="fs-6 fw-light text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                </div>
                <p class="fs-6 mt-3 fw-light">{{ $comment->content }}</p>
            </div>
        </div>
    @endforeach
</div>
