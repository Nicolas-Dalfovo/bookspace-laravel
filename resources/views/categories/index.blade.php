@extends('layouts.app')

@section('title', 'Categorias - BookSpace')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="page-title">
        <i class="bi bi-tags me-2"></i>
        Categorias
    </h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle me-2"></i>
        Nova Categoria
    </a>
</div>

@if($categories->count() > 0)
    <div class="row">
        @foreach($categories as $category)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="bi bi-tag me-2 text-primary"></i>
                            {{ $category->name }}
                        </h5>
                        
                        @if($category->description)
                            <p class="card-text text-muted">{{ Str::limit($category->description, 100) }}</p>
                        @endif
                        
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <small class="text-muted">
                                <i class="bi bi-book me-1"></i>
                                {{ $category->books_count }} {{ $category->books_count == 1 ? 'livro' : 'livros' }}
                            </small>
                            
                            <div class="btn-group" role="group">
                                <a href="{{ route('categories.show', $category) }}" 
                                   class="btn btn-outline-primary btn-sm">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('categories.edit', $category) }}" 
                                   class="btn btn-outline-secondary btn-sm">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('categories.destroy', $category) }}" 
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm"
                                            onclick="return confirm('Tem certeza que deseja excluir esta categoria?')">
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
        {{ $categories->links() }}
    </div>
@else
    <div class="text-center py-5">
        <i class="bi bi-tags display-1 text-muted"></i>
        <h3 class="mt-3 text-muted">Nenhuma categoria encontrada</h3>
        <p class="text-muted">Comece criando sua primeira categoria de livros.</p>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>
            Criar Primeira Categoria
        </a>
    </div>
@endif
@endsection

