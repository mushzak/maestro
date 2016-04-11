@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Settings Edit</div>
                    <div class="panel-body col-md-12">
                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                                <strong Whoops!!</strong>
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>
                                            {{$error}}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form role="form" enctype="multipart/form-data" method="post" action="{{ url('/admin/updateSettings') }}">
                            <div class="form-group">
                                <label for="name">Address:</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{$setting->address}}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </div>
                            <div class="form-group">
                                <label for="title">Telephone:</label>
                                <input type="text" class="form-control" id="tel" name="tel" value="{{$setting->tel}}">
                            </div>
                            <div class="form-group">
                                <label for="title">Mail:</label>
                                <input type="text" class="form-control" id="mail" name="mail" value="{{$setting->mail}}">
                            </div>
                            <div class="form-group">
                                <label for="title">Site:</label>
                                <input type="text" class="form-control" id="site" name="site" value="{{$setting->site}}">
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="btn btn-default btn-file" id="id" name="id" value="{{$setting->id}}">
                            </div>

                            <button type="submit" class="btn btn-default">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection