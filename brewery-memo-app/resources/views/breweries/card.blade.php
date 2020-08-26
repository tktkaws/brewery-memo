<div class="card mt-3">
    <div class="card-body d-flex flex-row">
        <i class="fas fa-user-circle fa-3x mr-1"></i>
        <div>
            <div class="font-weight-bold">
                {{ $brewery->user->name }}
            </div>
            <div class="font-weight-lighter">
                {{ $brewery->created_at->format('Y/m/d H:i') }}
            </div>
        </div>
        @if( Auth::id() === $brewery->user_id )
        <!-- dropdown -->
        <div class="ml-auto card-text">
            <div class="dropdown">
                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <button type="button" class="btn btn-link text-muted m-0 p-2">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ route("breweries.edit", ['brewery' => $brewery]) }}">
                        <i class="fas fa-pen mr-1"></i>記事を更新する
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" data-toggle="modal"
                        data-target="#modal-delete-{{ $brewery->id }}">
                        <i class="fas fa-trash-alt mr-1"></i>記事を削除する
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

    <div class="card-body pt-0 pb-2 pl-3">
        <div class="card-text">
            <brewery-like　 :initial-is-liked-by='@json($brewery->isLikedBy(Auth::user()))'
                :initial-count-likes='@json($brewery->count_likes)' :authorized='@json(Auth::check())'
                endpoint="{{ route('breweries.like', ['brewery' => $brewery]) }}">
            </brewery-like>
        </div>
    </div>
</div>