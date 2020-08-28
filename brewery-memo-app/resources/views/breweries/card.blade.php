<div class="card mt-3">
    <br>
    <div class="card-body pt-0">
        <h3 class="h4 card-title">
            <a class="text-dark" href="{{ route('breweries.show', ['brewery' => $brewery]) }}">
                {{ $brewery->name }}
            </a>
        </h3>
        <div class="card-text">
            {{ $brewery->body }}
        </div>
    </div>
    @foreach($brewery->tags as $tag)
    @if($loop->first)
    <div class="card-body pt-0 pb-4 pl-3">
        <div class="card-text line-height">
            @endif
            <a href="{{ route('tags.show', ['name' => $tag->name]) }}" class="border p-1 mr-1 mt-1 text-muted">
                {{ $tag->name }}

            </a>
            @if($loop->last)
        </div>
    </div>
    @endif
    @endforeach

    <div class="card-body pt-0 pb-2 pl-3">
        <div class="card-text">
            <brewery-like :initial-is-liked-by='@json($brewery->isLikedBy(Auth::user()))'
                :initial-count-likes='@json($brewery->count_likes)' :authorized='@json(Auth::check())'
                endpoint="{{ route('breweries.like', ['brewery' => $brewery]) }}">
            </brewery-like>
        </div>
    </div>

    <div class="card-body d-flex flex-row">
        <a href="{{ route('users.show', ['name' => $brewery->user->name]) }}" class="text-dark">
            <i class="fas fa-user-circle fa-3x mr-1"></i>
        </a>

        <div>
            <div class="font-weight-bold">
                <a href="{{ route('users.show', ['name' => $brewery->user->name]) }}" class="text-dark">
                    {{ $brewery->user->name }}
                </a>
            </div>
            <div class="font-weight-lighter">{{ $brewery->created_at->format('Y/m/d H:i') }}</div>
        </div>

        @if( Auth::id() === $brewery->user_id )
        <!-- dropdown -->
        <div class="ml-auto card-text">
            <div class="dropdown">
                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ route("breweries.edit", ['brewery' => $brewery]) }}">
                        <i class="fas fa-pen mr-1"></i>投稿を更新する
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" data-toggle="modal"
                        data-target="#modal-delete-{{ $brewery->id }}">
                        <i class="fas fa-trash-alt mr-1"></i>投稿を削除する
                    </a>
                </div>
            </div>
        </div>
        <!-- dropdown -->

        <!-- modal -->
        <div id="modal-delete-{{ $brewery->id }}" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('breweries.destroy', ['brewery' => $brewery]) }}">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">
                            {{ $brewery->name }}を削除します。よろしいですか？
                        </div>
                        <div class="modal-footer justify-content-between">
                            <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
                            <button type="submit" class="btn btn-danger">削除する</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- modal -->
        @endif
    </div>

</div>