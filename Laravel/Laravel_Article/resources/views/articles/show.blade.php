@extends('articles.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Article</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('articles.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row" style="font-size:15px">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Article Name:</strong>
                 {{ $Article->name }} 
            </div>
        </div>
        
        <!-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Slug</strong>
                {{ $Article->slug }}
            </div>
        </div>
        
        -----------------------------------xxxxxxxxxxxxxxxxxxxxxxx------------------------
        $table->unsignedBigInteger('group_id');
        $table->foreign('group_id')->references('group_id')->on('which table it come from');
    
    
    -->
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $Article->description }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status</strong>
                {{ $Article ->status }}
            </div>
        </div>
        @csrf
        @method('DELETE')      
        <button type="submit" class="btn btn-danger">Delete</button>
    </div>
@endsection