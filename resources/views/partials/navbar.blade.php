<nav class="navbar navbar-expand-lg navbar-light bg-transparent">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <i class="bi bi-book-half me-2"></i>
            BookSpace
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active fw-bold' : '' }}" 
                       href="{{ route('dashboard') }}">
                        <i class="bi bi-house me-1"></i>
                        Início
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('books.*') ? 'active fw-bold' : '' }}" 
                       href="{{ route('books.index') }}">
                        <i class="bi bi-book me-1"></i>
                        Livros
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('categories.*') ? 'active fw-bold' : '' }}" 
                       href="{{ route('categories.index') }}">
                        <i class="bi bi-tags me-1"></i>
                        Categorias
                    </a>
                </li>
            </ul>
            
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="bi bi-plus-circle me-1"></i>
                        Adicionar
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{ route('books.create') }}">
                                <i class="bi bi-book-half me-2"></i>
                                Novo Livro
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('categories.create') }}">
                                <i class="bi bi-tag me-2"></i>
                                Nova Categoria
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

