@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if( Auth::check() )
            <div class="col-md-8">
                @if( Auth::user()->can('read-post') )
                    @foreach ($posts as $post)
                    <div class="card">
                        <div class="card-header">{{$post['postTitle']}}</div>
                        <div class="card-body">
                            {{$post['postText']}}
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        @endif
    </div>
</div>
@endsection
