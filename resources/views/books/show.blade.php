@extends('layouts.app')

@section('title', $book->title . ' - BookSpace')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            @if($book->cover_image_url)
                <img src="{{ $book->cover_image_url }}" 
                     class="card-img-top" 
                     alt="{{ $book->title }}"
                     style="height: 400px; object-fit: cover;">
            @else
                <div class="card-img-top bg-light d-flex align-items-center justify-content-center" 
                     style="height: 400px;">
                    <i class="bi bi-book display-1 text-muted"></i>
                </div>
            @endif
            
            <div class="card-body text-center">
                <span class="badge bg-{{ $book->status == 'read' ? 'success' : ($book->status == 'reading' ? 'warning' : 'secondary') }} fs-6 mb-3">
                    {{ $book->status_formatted }}
                </span>
                
                <div class="d-grid gap-2">
                    <a href="{{ route('books.edit', $book) }}" class="btn btn-warning">
                        <i class="bi bi-pencil me-2"></i>
                        Editar Livro
                    </a>
                    <a href="{{ route('books.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left me-2"></i>
                        Voltar aos Livros
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0">{{ $book->title }}</h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <strong>
                            <i class="bi bi-person me-2"></i>
                            Autor:
                        </strong>
                    </div>
                    <div class="col-sm-9">
                        {{ $book->author }}
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <strong>
                            <i class="bi bi-tag me-2"></i>
                            Categoria:
                        </strong>
                    </div>
                    <div class="col-sm-9">
                        <a href="{{ route('categories.show', $book->category) }}" 
                           class="text-decoration-none">
                            {{ $book->category->name }}
                        </a>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <strong>
                            <i class="bi bi-bookmark me-2"></i>
                            Status:
                        </strong>
                    </div>
                    <div class="col-sm-9">
                        <span class="badge bg-{{ $book->status == 'read' ? 'success' : ($book->status == 'reading' ? 'warning' : 'secondary') }}">
                            {{ $book->status_formatted }}
                        </span>
                    </div>
                </div>
                
                @if($book->description)
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <strong>
                                <i class="bi bi-file-text me-2"></i>
                                Descrição:
                            </strong>
                        </div>
                        <div class="col-sm-9">
                            <p class="mb-0">{{ $book->description }}</p>
                        </div>
                    </div>
                @endif
                
                <div class="row">
                    <div class="col-sm-3">
                        <strong>
                            <i class="bi bi-calendar me-2"></i>
                            Adicionado em:
                        </strong>
                    </div>
                    <div class="col-sm-9">
                        {{ $book->created_at->format('d/m/Y H:i') }}
                    </div>
                </div>
                
                @if($book->updated_at != $book->created_at)
                    <div class="row mt-2">
                        <div class="col-sm-3">
                            <strong>
                                <i class="bi bi-pencil me-2"></i>
                                Atualizado em:
                            </strong>
                        </div>
                        <div class="col-sm-9">
                            {{ $book->updated_at->format('d/m/Y H:i') }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
        
        <!-- Ações Rápidas -->
        <div class="card mt-3">
            <div class="card-header">
                <h6 class="mb-0">
                    <i class="bi bi-lightning me-2"></i>
                    Ações Rápidas
                </h6>
            </div>
            <div class="card-body">
                <div class="row g-2">
                    @if($book->status != 'reading')
                        <div class="col-md-4">
                            <form action="{{ route('books.update', $book) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="title" value="{{ $book->title }}">
                                <input type="hidden" name="author" value="{{ $book->author }}">
                                <input type="hidden" name="description" value="{{ $book->description }}">
                                <input type="hidden" name="cover_image_url" value="{{ $book->cover_image_url }}">
                                <input type="hidden" name="category_id" value="{{ $book->category_id }}">
                                <input type="hidden" name="status" value="reading">
                                <button type="submit" class="btn btn-warning btn-sm w-100">
                                    <i class="bi bi-play me-1"></i>
                                    Marcar como Lendo
                                </button>
                            </form>
                        </div>
                    @endif
                    
                    @if($book->status != 'read')
                        <div class="col-md-4">
                            <form action="{{ route('books.update', $book) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="title" value="{{ $book->title }}">
                                <input type="hidden" name="author" value="{{ $book->author }}">
                                <input type="hidden" name="description" value="{{ $book->description }}">
                                <input type="hidden" name="cover_image_url" value="{{ $book->cover_image_url }}">
                                <input type="hidden" name="category_id" value="{{ $book->category_id }}">
                                <input type="hidden" name="status" value="read">
                                <button type="submit" class="btn btn-success btn-sm w-100">
                                    <i class="bi bi-check me-1"></i>
                                    Marcar como Lido
                                </button>
                            </form>
                        </div>
                    @endif
                    
                    <div class="col-md-4">
                        <form action="{{ route('books.destroy', $book) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="btn btn-danger btn-sm w-100"
                                    onclick="return confirm('Tem certeza que deseja excluir este livro?')">
                                <i class="bi bi-trash me-1"></i>
                                Excluir Livro
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

