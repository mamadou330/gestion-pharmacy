<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ page_active('home')}}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('welcome')}}" class="nav-link {{ page_active('welcome')}}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Tableau de bord<i class="right fas fa-angle-left"></i></p>
    </a>

    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v1</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Commande<i class="right fas fa-angle-left"></i></p>
    </a>

    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Nouvelle Commande</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Toutes les commandes</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item">
    <a href="#" class="nav-link ">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Produits<i class="right fas fa-angle-left"></i></p>
    </a>

    <ul class="nav nav-treeview ">
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Ajouter un produit</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Stocks</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Fournisseurs<i class="right fas fa-angle-left"></i></p>
    </a>

    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="#" class="nav-link active">
                <i class="fas fa-fw fa-user nav-icon"></i>
                <p>Nouveau fournisseur</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Tous les fournisseurs</p>
            </a>
        </li>
    </ul>
</li>


    