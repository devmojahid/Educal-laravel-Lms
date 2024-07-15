<div class="latest-comments mb-95">

    <h3>{{ $blog->comments->where('status', 'approved')->count() }} Comments</h3>
    @if ($blog->comments->where('status', 'approved')->count() > 0)
    <ul>
            @foreach ($blog->comments->where('status', 'approved') as $comment)
                <li>
                    <div class="comments-box grey-bg">
                        <div class="comments-info d-flex">
                            <div class="comments-avatar mr-20">
                                <img src="{{ asset($comment->user->image) }}" alt="">
                            </div>
                            <div class="avatar-name">
                                <h5>{{ $comment->user->full_name }}</h5>
                                <span class="post-meta">{{ monthDayYear($comment->created_at) }}</span>
                            </div>
                        </div>
                        <div class="comments-text ml-65">
                            <p>{{ $comment->content }}</p>
                            <div class="comments-replay">
                                <button type="button" data-id="{{ $comment->id }}" class="commentParrent" id="commentParrent-{{ $comment->id }}">Reply</button>
                            </div> 
                        </div>
                    </div>
                </li>

                <div class="blog__comment comment_form_reply pt-30 pb-30 pl-30" data-child_id="{{ $comment->id }}" id="comment_form_reply-{{ $comment->id }}">
                    <h3>{{ __("frontend.you_reply_to") }}{{ $comment->user->full_name }}
                        <small>
                            <button rel="nofollow" class="cancel-comment-reply-link-text" data-cencel_id="{{ $comment->id }}">Cancel reply</button>
                        </small>
                    </h3>

                    <form action="{{ route('admin.comments.reply') }}" method="GET">
                        @csrf
                        <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                        <input type="hidden" name="parent_id" value="{{ $comment->id }}">
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

                @if ($comment->replies->where('status', 'approved')->count() > 0)
                    @foreach ($comment->replies->where('status', 'approved') as $reply)
                        <li class="children">
                            <div class="comments-box grey-bg">
                                <div class="comments-info d-flex">
                                    <div class="comments-avatar mr-20">
                                        <img src="{{ asset($reply->user->image) }}" alt="">
                                    </div>
                                    <div class="avatar-name">
                                        <h5>{{ $reply->user->first_name . ' ' . $reply->user->last_name }}</h5>
                                        <span class="post-meta">{{ monthDayYear($reply->created_at) }}</span>
                                    </div>
                                </div>
                                <div class="comments-text ml-65">
                                    <p>{{ $reply->content }}</p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                @endif
            @endforeach
        </ul>
    @endif
</div>
