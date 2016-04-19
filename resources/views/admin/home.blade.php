@extends('app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">Gallery</div>
					<div class="col-md-6">
						<table class="table table-hover table-bordered">

							<th>Name</th>
							<th>Delete</th>
							<th>Edite</th>
							@foreach($gallery as $gallery)

								<tr>
									<td>{{$gallery->title}}</td>
									<td>	{!!   Form::open(['method' => 'DELETE', 'route' => ['admin.destroyGallery', $gallery->id]]) !!}
										{!!  Form::submit('Delete', ['class' => 'btn btn-danger'])  !!}
										{!!   Form::close()  !!}
									</td>
									<td>{!!   Form::open(['method' => 'GET', 'route' => ['admin.editGallery', $gallery->id]]) !!}
										{!!  Form::submit('Edit', ['class' => 'btn btn-info'])  !!}
										{!!   Form::close()  !!}</td>
								</tr>
							@endforeach
						</table>
					</div>
					<div class="panel-body col-md-6">
						@if(count($errors)>0)
							<div class="alert alert-danger">
								<strong> Whoops!!</strong>
								<ul>
									@foreach($errors->all() as $error)
										<li>
											{{$error}}
										</li>
									@endforeach
								</ul>
							</div>
						@endif
						<form role="form" enctype="multipart/form-data" method="post" action="{{ url('/admin/gallery') }}">
							<div class="form-group">
								<label for="name">Title:</label>
								<input type="text" class="form-control" id="title" name="title">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
							</div>
							<div class="form-group">
								<label for="title">Description:</label>
								<input type="text" class="form-control" id="Description" name="description">
							</div>
							<div class="form-group">
								<label for="img_name">Image:</label>
								<input type="file" class="btn btn-default btn-file" id="img_name" name="img_name">
							</div>
							<button type="submit" class="btn btn-default">Save</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
