@extends('layouts.app')

@section('title', 'Editar Livro - BookSpace')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-warning text-dark">
                <h4 class="mb-0">
                    <i class="bi bi-pencil me-2"></i>
                    Editar Livro: {{ $book->title }}
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ route('books.update', $book) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="title" class="form-label">Título do Livro *</label>
                                <input type="text" 
                                       class="form-control @error('title') is-invalid @enderror" 
                                       id="title" 
                                       name="title" 
                                       value="{{ old('title', $book->title) }}" 
                                       required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="author" class="form-label">Autor *</label>
                                <input type="text" 
                                       class="form-control @error('author') is-invalid @enderror" 
                                       id="author" 
                                       name="author" 
                                       value="{{ old('author', $book->author) }}" 
                                       required>
                                @error('author')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="category_id" class="form-label">Categoria *</label>
                                <select class="form-select @error('category_id') is-invalid @enderror" 
                                        id="category_id" 
                                        name="category_id" 
                                        required>
                                    <option value="">Selecione uma categoria</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" 
                                                {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="status" class="form-label">Status *</label>
                                <select class="form-select @error('status') is-invalid @enderror" 
                                        id="status" 
                                        name="status" 
                                        required>
                                    <option value="want_to_read" {{ old('status', $book->status) == 'want_to_read' ? 'selected' : '' }}>
                                        Quero Ler
                                    </option>
                                    <option value="reading" {{ old('status', $book->status) == 'reading' ? 'selected' : '' }}>
                                        Lendo
                                    </option>
                                    <option value="read" {{ old('status', $book->status) == 'read' ? 'selected' : '' }}>
                                        Lido
                                    </option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="cover_image_url" class="form-label">URL da Capa</label>
                        <input type="url" 
                               class="form-control @error('cover_image_url') is-invalid @enderror" 
                               id="cover_image_url" 
                               name="cover_image_url" 
                               value="{{ old('cover_image_url', $book->cover_image_url) }}" 
                               placeholder="https://exemplo.com/capa-do-livro.jpg">
                        @error('cover_image_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">
                            <i class="bi bi-info-circle me-1"></i>
                            Cole aqui o link da imagem da capa do livro (opcional)
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrição</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" 
                                  name="description" 
                                  rows="4" 
                                  placeholder="Descreva o livro, suas impressões, resumo...">{{ old('description', $book->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('books.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-2"></i>
                            Voltar
                        </a>
                        <button type="submit" class="btn btn-warning">
                            <i class="bi bi-check-circle me-2"></i>
                            Atualizar Livro
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

