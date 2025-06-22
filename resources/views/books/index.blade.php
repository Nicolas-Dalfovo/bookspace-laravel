@extends('layouts.app')

@section('title', 'Livros - BookSpace')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="page-title">
        <i class="bi bi-book me-2"></i>
        Meus Livros
    </h1>
    <a href="{{ route('books.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle me-2"></i>
        Novo Livro
    </a>
</div>

<!-- Filtros de Busca -->
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('books.index') }}">
            <div class="row g-3">
                <div class="col-md-4">
                    <label for="search" class="form-label">Buscar por título ou autor</label>
                    <input type="text" 
                           class="form-control" 
                           id="search" 
                           name="search" 
                           value="{{ request('search') }}" 
                           placeholder="Digite o título ou autor...">
                </div>
                
                <div class="col-md-3">
                    <label for="category_id" class="form-label">Categoria</label>
                    <select class="form-select" id="category_id" name="category_id">
                        <option value="">Todas as categorias</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" 
                                    {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="col-md-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status">
                        <option value="">Todos os status</option>
                        <option value="want_to_read" {{ request('status') == 'want_to_read' ? 'selected' : '' }}>
                            Quero Ler
                        </option>
                        <option value="reading" {{ request('status') == 'reading' ? 'selected' : '' }}>
                            Lendo
                        </option>
                        <option value="read" {{ request('status') == 'read' ? 'selected' : '' }}>
                            Lido
                        </option>
                    </select>
                </div>
                
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-outline-primary me-2">
                        <i class="bi bi-search"></i>
                    </button>
                    <a href="{{ route('books.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-x-circle"></i>
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

@if($books->count() > 0)
    <div class="row">
        @foreach($books as $book)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    @if($book->cover_image_url)
                        <img src="{{ $book->cover_image_url }}" 
                             class="card-img-top" 
                             alt="{{ $book->title }}"
                             style="height: 200px; object-fit: cover;">
                    @else
                        <div class="card-img-top bg-light d-flex align-items-center justify-content-center" 
                             style="height: 200px;">
                            <i class="bi bi-book display-4 text-muted"></i>
                        </div>
                    @endif
                    
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ Str::limit($book->title, 50) }}</h5>
                        <p class="card-text">
                            <small class="text-muted">
                                <i class="bi bi-person me-1"></i>
                                {{ $book->author }}
                            </small>
                        </p>
                        
                        @if($book->description)
                            <p class="card-text flex-grow-1">{{ Str::limit($book->description, 100) }}</p>
                        @endif
                        
                        <div class="mt-auto">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge bg-{{ $book->status == 'read' ? 'success' : ($book->status == 'reading' ? 'warning' : 'secondary') }}">
                                    {{ $book->status_formatted }}
                                </span>
                                <small class="text-muted">
                                    <i class="bi bi-tag me-1"></i>
                                    {{ $book->category->name }}
                                </small>
                            </div>
                            
                            <div class="btn-group w-100" role="group">
                                <a href="{{ route('books.show', $book) }}" 
                                   class="btn btn-outline-primary btn-sm">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('books.edit', $book) }}" 
                                   class="btn btn-outline-secondary btn-sm">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('books.destroy', $book) }}" 
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm"
                                            onclick="return confirm('Tem certeza que deseja excluir este livro?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
    <div class="d-flex justify-content-center mt-4">
        {{ $books->appends(request()->query())->links() }}
    </div>
@else
    <div class="text-center py-5">
        <i class="bi bi-book display-1 text-muted"></i>
        <h3 class="mt-3 text-muted">Nenhum livro encontrado</h3>
        @if(request()->hasAny(['search', 'category_id', 'status']))
            <p class="text-muted">Tente ajustar os filtros de busca.</p>
            <a href="{{ route('books.index') }}" class="btn btn-outline-secondary me-2">
                <i class="bi bi-x-circle me-2"></i>
                Limpar Filtros
            </a>
        @else
            <p class="text-muted">Comece adicionando seu primeiro livro ao catálogo.</p>
        @endif
        <a href="{{ route('books.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>
            Adicionar Primeiro Livro
        </a>
    </div>
@endif
@endsection

