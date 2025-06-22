@extends('layouts.app')

@section('title', 'BookSpace - Catálogo Pessoal de Leitura')

@section('content')
<div class="text-center mb-5">
    <h1 class="display-4 page-title mb-3">
        <i class="bi bi-book-half me-3"></i>
        Bem-vindo ao BookSpace
    </h1>
    <p class="lead text-muted">Seu catálogo pessoal de leitura</p>
</div>

<div class="row mb-5">
    <div class="col-md-4 mb-4">
        <div class="card text-center h-100">
            <div class="card-body">
                <i class="bi bi-book display-4 text-primary mb-3"></i>
                <h5 class="card-title">{{ $totalBooks }} Livros</h5>
                <p class="card-text text-muted">Total de livros no seu catálogo</p>
                <a href="{{ route('books.index') }}" class="btn btn-primary">
                    Ver Todos os Livros
                </a>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 mb-4">
        <div class="card text-center h-100">
            <div class="card-body">
                <i class="bi bi-tags display-4 text-success mb-3"></i>
                <h5 class="card-title">{{ $totalCategories }} Categorias</h5>
                <p class="card-text text-muted">Categorias organizadas</p>
                <a href="{{ route('categories.index') }}" class="btn btn-success">
                    Ver Categorias
                </a>
            </div>
        </div>
    </div>
    
    <div class="col-md-4 mb-4">
        <div class="card text-center h-100">
            <div class="card-body">
                <i class="bi bi-bookmark-check display-4 text-warning mb-3"></i>
                <h5 class="card-title">{{ $booksRead }} Lidos</h5>
                <p class="card-text text-muted">Livros já concluídos</p>
                <a href="{{ route('books.index', ['status' => 'read']) }}" class="btn btn-warning">
                    Ver Lidos
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="bi bi-clock me-2"></i>
                    Lendo Atualmente
                </h5>
            </div>
            <div class="card-body">
                @if($currentlyReading->count() > 0)
                    @foreach($currentlyReading as $book)
                        <div class="d-flex align-items-center mb-3">
                            @if($book->cover_image_url)
                                <img src="{{ $book->cover_image_url }}" 
                                     alt="{{ $book->title }}"
                                     class="me-3"
                                     style="width: 50px; height: 70px; object-fit: cover; border-radius: 5px;">
                            @else
                                <div class="me-3 bg-light d-flex align-items-center justify-content-center"
                                     style="width: 50px; height: 70px; border-radius: 5px;">
                                    <i class="bi bi-book text-muted"></i>
                                </div>
                            @endif
                            <div class="flex-grow-1">
                                <h6 class="mb-1">{{ Str::limit($book->title, 30) }}</h6>
                                <small class="text-muted">{{ $book->author }}</small>
                            </div>
                            <a href="{{ route('books.show', $book) }}" class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-eye"></i>
                            </a>
                        </div>
                    @endforeach
                @else
                    <p class="text-muted text-center">Nenhum livro sendo lido no momento.</p>
                    <div class="text-center">
                        <a href="{{ route('books.create') }}" class="btn btn-primary">
                            Adicionar Livro
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="bi bi-star me-2"></i>
                    Últimos Adicionados
                </h5>
            </div>
            <div class="card-body">
                @if($recentBooks->count() > 0)
                    @foreach($recentBooks as $book)
                        <div class="d-flex align-items-center mb-3">
                            @if($book->cover_image_url)
                                <img src="{{ $book->cover_image_url }}" 
                                     alt="{{ $book->title }}"
                                     class="me-3"
                                     style="width: 50px; height: 70px; object-fit: cover; border-radius: 5px;">
                            @else
                                <div class="me-3 bg-light d-flex align-items-center justify-content-center"
                                     style="width: 50px; height: 70px; border-radius: 5px;">
                                    <i class="bi bi-book text-muted"></i>
                                </div>
                            @endif
                            <div class="flex-grow-1">
                                <h6 class="mb-1">{{ Str::limit($book->title, 30) }}</h6>
                                <small class="text-muted">{{ $book->author }}</small>
                                <br>
                                <span class="badge bg-{{ $book->status == 'read' ? 'success' : ($book->status == 'reading' ? 'warning' : 'secondary') }} badge-sm">
                                    {{ $book->status_formatted }}
                                </span>
                            </div>
                            <a href="{{ route('books.show', $book) }}" class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-eye"></i>
                            </a>
                        </div>
                    @endforeach
                @else
                    <p class="text-muted text-center">Nenhum livro adicionado ainda.</p>
                    <div class="text-center">
                        <a href="{{ route('books.create') }}" class="btn btn-primary">
                            Adicionar Primeiro Livro
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="text-center mt-5">
    <div class="row">
        <div class="col-md-6 mb-3">
            <a href="{{ route('books.create') }}" class="btn btn-primary btn-lg w-100">
                <i class="bi bi-plus-circle me-2"></i>
                Adicionar Novo Livro
            </a>
        </div>
        <div class="col-md-6 mb-3">
            <a href="{{ route('categories.create') }}" class="btn btn-outline-primary btn-lg w-100">
                <i class="bi bi-tag me-2"></i>
                Criar Nova Categoria
            </a>
        </div>
    </div>
</div>
@endsection

