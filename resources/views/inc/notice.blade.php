<div class="card-header d-flex justify-content-between align-items-center"">
    <h5>Notice Board</h5>
    @if(Auth::user()->roles()->pluck('name')->contains('admin'))
    <a class="btn btn-primary" href="/notice">New</a>
    @endif
        </div>
        <ul class="list-group list-group-flush">
            @foreach (App\Notice::orderBy('body', 'asc')->paginate(5) as $notice)
            <li class="list-group-item"> {!! $notice->body !!} <br><strong><a class="btn btn-primary" href="{!! $notice->link !!}">Read More</a></strong></li>
            @endforeach
            </ul>
            {{App\Notice::orderBy('body', 'asc')->paginate(5)->links()}}
</div>
</div>