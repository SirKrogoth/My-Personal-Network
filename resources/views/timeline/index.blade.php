@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Página inicial - Linha do Tempo</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row align-items-md-stretch">
                        <div class="col-md-12">
                          <div class="h-100 p-5 bg-light border rounded-3">
                              <form action="{{ route('storetweet') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_usuario" value="{{ Auth::user()->id }}">

                                <div class="mb-3">
                                    <h3><label for="titulo" class="form-label">Título</label></h3>
                                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Informe aqui o Título da Mensagem" required>
                                    @error('titulo')
                                        <div class="alert alert-danger">O campo Título deverá ser informado</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <h3><label for="tweet" class="form-label">Mensagem</label></h3>
                                    <textarea class="form-control" name="tweet" id="tweet" cols="96" rows="5" placeholder="Digite aqui a mensagem com até 255 caracteres" maxlength="255" required></textarea>
                                    @error('tweet')
                                        <div class="alert alert-danger">O campo Mensagem deverá ser informado.</div>
                                    @enderror
                                </div>

                                <div class="col mt-2 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Postar Nova Mensagem</button>
                                </div>
                              </form>
                          </div>
                        </div>
                    </div>
                </div>

                @foreach ($tweets as $tweet)

                    <div class="card-body">
                        <div class="row align-items-md-stretch">
                            <div class="col-md-12">
                                <div class="h-100 p-5 border rounded-3">
                                    <h5 class="card-title">{{ $tweet->titulo }}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Postado por {{ $tweet->apelido }} em {{ $tweet->created_at }}</h6>

                                    <p class="card-text">{{ $tweet->tweet }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
