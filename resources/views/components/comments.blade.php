<h3 class="font-weight-bold mb-3">Comments</h3>
<section class="my-5">
    <div class="row">
        <div class="col-md-12">
             <div class="mdb-feed">
                @forelse($comments as $comment)
                    <div class="news">
                        <div class="label">
                            <img src="{{ $comment->user->image }}" class="rounded-circle z-depth-1-half">
                        </div>
                        <div class="excerpt">
                            <div class="brief">
                                <a class="name">{{ $comment->user->name }}</a>
                                <div class="date">{{ $comment->created_at->diffForHumans() }}</div>
                            </div>
                            <div class="added-text">{{ $comment->text }}</div>
                        </div>
                    </div>
                @empty
                    <p>No comments to show</p>
                @endforelse
            </div>
            @if (isset($testing))
                @cannot('create', App\Testing::class)
                    <form method="POST">
                        @csrf
                        <div class="col-md-6">
                            <div class="md-form">
                                <textarea id="form7" name="text" class="md-textarea form-control" rows="3"></textarea>
                                <label for="form7">Write a comment</label>
                            </div>
                        </div>
                        <button class="btn btn-outline-info btn-rounded my-4 waves-effect z-depth-0" type="submit">Post</button>
                    </form>
                @endcannot
            @else
                @auth
                <form method="POST">
                    @csrf
                    <div class="col-md-6">
                        <div class="md-form">
                            <textarea id="form7" name="text" class="md-textarea form-control" rows="3"></textarea>
                            <label for="form7">Write a comment</label>
                        </div>
                    </div>
                    <button class="btn btn-outline-info btn-rounded my-4 waves-effect z-depth-0" type="submit">Post</button>
                </form>
                @endauth
            @endif
        </div>
    </div>
</section>
