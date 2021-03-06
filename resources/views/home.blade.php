@extends('layouts.app')

@section('content')
<div class="container">
    @if ($errors->any())
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <div class="row justify-content-center">
        @if( Auth::check() )
            <div class="col-md-2">
                @if( Auth::user()->can('create-post') )
                    <button class="btn btn-primary" onclick="showAddPostForm()">New Post</button>
                @endif
            </div>
            <div class="col-md-8">
                <form method="post" id="newPostForm" style="display:none">
                    <div class="card">
                        <div class="card-header">
                            <label>Title</label>
                            <input type="hidden" name="id" value=""/>
                            <input type="hidden" name="username" value="{{Auth::user()->name}}"/>
                            {{ csrf_field() }}
                            <input class="form-control" rows=3 maxlength="1500" name="postTitle" value=""/>
                        </div>
                        <div class="card-body">
                            <label>Post</label>
                            <textarea class="form-control" rows=3 maxlength="1500" name="postText"></textarea>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-10"></div>
                                <div class="col-md-2">
                                    <button type=submit formaction="{{ route('create') }}" class="btn btn-secondary">Create</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </form>

                @if( Auth::user()->can('read-post') )
                    @foreach ($posts as $post)
                    <div class="card">
                        @php
                            $canUpdate = Auth::user()->can('update-post')
                        @endphp

                        <form method="post" action="{{ route('store') }}">
                            <div class="card-header">
                                @if($canUpdate)
                                    <label>Title</label>
                                    <input type="hidden" name="id" value="{{$post['_id']}}"/>
                                    <input type="hidden" name="username" value="{{Auth::user()->name}}"/>
                                    {{ csrf_field() }}
                                    <input class="form-control" rows=3 maxlength="1500" name="postTitle" value="{{$post['postTitle']}}"/>
                                @else
                                    {{$post['postTitle']}}
                                @endif
                            </div>
                            <div class="card-body">
                                @if($canUpdate)
                                    <label>Post</label>
                                    <textarea class="form-control" rows=3 maxlength="1500" name="postText">{{$post['postText']}}</textarea>
                                @else
                                    {{$post['postText']}}
                                @endif
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-6">Author : {{$post['username']}}</div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-1">
                                        @if($canUpdate)
                                            <button type=submit formaction="{{ route('store') }}" class="btn btn-secondary">Save</button>
                                        @endif
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-1">
                                        @if($canUpdate)
                                            <button type=submit class="btn btn-danger" formaction="{{ route('delete') }}">Delete</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                        <hr>
                    @endforeach
                @endif
            </div>
            <div class="col-md-2"></div>
        @endif
    </div>
</div>
@endsection
