@extends('Admin.Master')

@section('title', Lang::get('admin.newproduct'))
@section('headtitle', Lang::get('admin.newproduct'))

@push('styles')
    <link rel="stylesheet" href="{{ url('public/static/vendors/summernote/summernote.min.css') }}" />  
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ url('public/static/vendors/summernote/summernote.min.js') }}"></script>    
@endpush

@section('toolbar')
{!! Form::open(['url' => '/admin/catalog/products/save']) !!}	
{!! Form::button('<i class="far fa-save"></i>', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
@stop

@section('content')
@php 
$firstTab = 'active';
$firstPanel = 'active show';
@endphp

<div>
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
				  <h5 class="card-title card-custom-title">Sku y categoria</h5>
					<div class="form-group">
						<label class="control-label" for="sku">SKU</label>
						{!! Form::text('sku', null, ['class' => 'form-control' . ($errors->has('sku') ? ' border-danger' : '')]) !!}					
						<div class="invalid-feedback active">
							<i class="fa fa-exclamation-circle fa-fw"></i>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label" for="category">Categoria</label>
						{!! Form::select('category', $comboCategories, null, ['class' =>'form-control'])  !!}
						<div class="invalid-feedback active">
							<i class="fa fa-exclamation-circle fa-fw"></i>
						</div>
					</div>											  
				</div>
			</div>			
		</div>
	</div>
	<div class="row mt-4">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
				  <h5 class="card-title card-custom-title">Modelo, nombre y descripción</h5>	
				  <div class="form-group">
					<label class="control-label" for="modelo">Modelo</label>
					{!! Form::text('modelo', null, ['class' => 'form-control' . ($errors->has('modelo') ? ' border-danger' : '')]) !!}					
					<div class="invalid-feedback active">
						<i class="fa fa-exclamation-circle fa-fw"></i>
					</div>
				  </div>					  
				  <ul class="nav nav-tabs" id="langTab" role="tablist">
					@foreach(array_keys(Config::get('languages')) as $key)
					<li class="nav-item">
					  <a class="nav-link {{ $firstTab }}" id="tab-{{$key}}" data-toggle="tab" href="#panel-{{$key}}" role="tab" aria-controls="panel-{{$key}}" aria-selected="true">{{ Config::get('languages')[$key] }}</a>
					</li>
					@php 
					$firstTab = '';
					@endphp
					@endforeach
				  </ul>	
				  <div class="tab-content" id="langTabContent">	
					@foreach(array_keys(Config::get('languages')) as $key)		
						<div class="tab-pane fade {{ $firstPanel }}" id="panel-{{$key}}" role="tabpanel" aria-labelledby="tab-{{$key}}">  
							<div class="form-group">
								<label class="control-label" for="modelo">Nombre</label>
								{!! Form::text('name-' . $key, null, ['class' => 'form-control' . ($errors->has('name' . $key) ? ' border-danger' : '')]) !!}					
								<div class="invalid-feedback active">
									<i class="fa fa-exclamation-circle fa-fw"></i>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label" for="modelo">Descripcion</label>
								{!! Form::textarea('description-' . $key, null, ['class' =>'form-control w-100 summernote' . ($errors->has('description-' . $key) ? ' border-danger' : ''), 'rows' => 4]) !!}
								<div class="invalid-feedback active">
									<i class="fa fa-exclamation-circle fa-fw"></i>
								</div>
							</div>
						</div>
						@php 
						$firstPanel = '';
						@endphp						
					@endforeach	
				  </div>											
				</div>
			</div>				
		</div>
	</div>
	<div class="row mt-4">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
				  <h5 class="card-title card-custom-title">Atributos</h5>			  				  
				</div>
			</div>				
		</div>
	</div>		
	{!! Form::close() !!}		
</div>
@stop


