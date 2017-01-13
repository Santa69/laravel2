@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <div class="panel-heading">{{ isset($updatedLivre) ? 'Update : ' . $updatedLivre->name : 'Create New Livre' }}</div>
              <div class="panel-body">
              @if(isset($updatedLivre))
              {{ Form::open(['url' => 'livre/update']) }}
              {{ Form::hidden('id', $updatedLivre->id)}}
              @else
              {{ Form::open(['url' => 'livre/new']) }}
              @endif
              {{ Form::label('name', 'Nom du Livre') }}
              {{ Form::text('name', isset($updatedLivre) ? $updatedLivre->name : '') }}
              {{ Form::label('author', 'Authors')}}
              {{ Form::select('authors[]',$authors, $authorsId, ['multiple' => true])}}
              {{ Form::submit('Créer') }}
              {{ Form::close() }}


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
