<div class="blog__comment" id="comment_form">
    <h3>Write a Comment</h3>
    <form action="{{ route('admin.comments.store') }}" method="GET">
        @csrf
        <input type="hidden" name="blog_id" value="{{ $blog->id }}">
        <div class="row">
            
            <div class="col-xxl-12">
                <div class="blog__comment-input">
                    <textarea name="content" placeholder="Enter your comment ..."></textarea>
                </div>
            </div>
            <div class="col-xxl-12">
                <div class="blog__comment-btn">
                    <button type="submit" class="e-btn">Post Comment</button>
                </div>
            </div>
        </div>
    </form>
</div>
