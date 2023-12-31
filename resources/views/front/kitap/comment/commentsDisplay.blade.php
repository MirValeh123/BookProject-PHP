@foreach($comments as $comment)
    <div class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
        <strong>{{ $comment->user->name }}</strong>
        <p>{{ $comment->content }}</p>
        <a href="" id="reply"></a>
        <form method="post" action="{{ route('books.store_comment', $data[0]->id) }}">
            @csrf
            <div class="form-group">
                {{-- <input type="text" name="body" class="form-control" /> --}}
                <input type="hidden" name="kitap_id" value="{{ $comment->kitap_id }}" />
                {{-- <input type="hidden" name="parent_id" value="{{ $comment->parent_id }}" /> --}}
                <input type="hidden" name="parent_id" value="{{ $comment->parent_id }}">
                <input  class="form-control" name="content" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Reply" />
            </div>
        </form>
        @include('front.kitap.comment.commentsDisplay', ['comments' => $comment->replies])

    </div>
@endforeach