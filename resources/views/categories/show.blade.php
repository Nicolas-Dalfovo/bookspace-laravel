@extends('layouts.app')

@section('title', $category->name . ' - BookSpace')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0">
                    <i class="bi bi-tag me-2"></i>
                    {{ $category->name }}
                </h4>
            </div>
            <div class="card-body">
                @if($category->description)
                    <p class="card-text">{{ $category->description }}</p>
                @else
                    <p class="text-muted">Nenhuma descrição disponível.</p>
                @endif
                
                <hr>
                
                <div class="d-flex justify-content-between align-items-center">
                    <span class="badge bg-primary fs-6">
                        {{ $category->books->count() }} {{ $category->books->count() == 1 ? 'livro' : 'livros' }}
                    </span>
                    
                    <div class="btn-group" role="group">
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil me-1"></i>
                            Editar
                        </a>
                        <a href="{{ route('categories.index') }}" class="btn btn-secondary btn-sm">
                            <i class="bi bi-arrow-left me-1"></i>
                            Voltar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-8">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5>Livros desta Categoria</h5>
            <a href="{{ route('books.create', ['category_id' => $category->id]) }}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-circle me-1"></i>
                Adicionar Livro
            </a>
        </div>
        
        @if($category->books->count() > 0)
            <div class="row">
                @foreach($category->books as $book)
                    <div class="col-md-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h6 class="card-title">{{ $book->title }}</h6>
                                <p class="card-text">
                                    <small class="text-muted">
                                        <i class="bi bi-person me-1"></i>
                                        {{ $book->author }}
                                    </small>
                                </p>
                                
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="badge bg-{{ $book->status == 'read' ? 'success' : ($book->status == 'reading' ? 'warning' : 'secondary') }}">
                                        {{ $book->status_formatted }}
                                    </span>
                                    
                                    <a href="{{ route('books.show', $book) }}" class="btn btn-outline-primary btn-sm">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-4">
                <i class="bi bi-book display-4 text-muted"></i>
                <h6 class="mt-3 text-muted">Nenhum livro nesta categoria</h6>
                <p class="text-muted">Adicione o primeiro livro desta categoria.</p>
                <a href="{{ route('books.create', ['category_id' => $category->id]) }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-2"></i>
                    Adicionar Primeiro Livro
                </a>
            </div>
        @endif
    </div>
</div>
@endsection

