@extends('layouts.app')
@section('content')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="/css/livres.css">
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <div class="panel-heading">Livres</div>
                  <div class="panel-body">
                    @if(! empty($livres))
                      @foreach ($livres as $livre)
                        <a href='/livre/{{ $livre->id }}/delete'><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        <a href='/livre/{{ $livre->id }}/update'><i class="fa fa-upload" aria-hidden="true"></i></a>
                        {{ $livre->name }}
                        {{-- {{ $livre->description }} --}}
                        @foreach ($livre->authors as $author)
                          <b>{{ $author->name }}</b>
                        @endforeach
                        <br>
                      @endforeach
                    @elseif(! empty($livre))
                      {{ $livre->name }}
                      @foreach ($livre->authors as $author)
                        {{ $author->name}}
                      @endforeach
                    @else
                      Aucun livre affiché
                    @endif
                  </div>
              </div>
        </div>
    </div>
</div>
@endsection
