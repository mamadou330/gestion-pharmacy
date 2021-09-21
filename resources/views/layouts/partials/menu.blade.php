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
                <i class="nav-icon"></i>
                <p>Dashboard v1</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-ship"></i>
        <p>Commandes<i class="right fas fa-angle-left"></i></p>
    </a>

    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('achat.index') }}" class="nav-link">
                <i class="nav-icon"></i>
                <p>Nouvelle Commande</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon"></i>
                <p>Toutes les commandes</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item">
    <a href="#" class="nav-link ">
        <i class="nav-icon fas fa-tachometer-alt  text-success"></i>
        <span style="color: #fff; font-weight: bold;min-width: 10px;padding: 3px 7px;
            font-size: 14px;line-height: 1;text-align: center;white-space: 
            nowrap;vertical-align: middle;background-color: #3498DB ;border-radius: 10px;">
            <p>Gestion des produits</p>
        </span><i class="right fas fa-angle-left"></i>
    </a>

    <ul class="nav nav-treeview">
        {{-- <li class="nav-item">
                    <a href="{{ route('produit.index') }}" class="nav-link">
                <i class="nav-icon"></i>
                <ion-icon name="archive-outline"></ion-icon>
                <p>Unité</p>
                </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('produit.index') }}" class="nav-link">
                <i class="nav-icon"></i>
                <ion-icon name="archive-outline"></ion-icon>
                <p>Catégories</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('produit.index') }}" class="nav-link">
                <i class="nav-icon"></i>
                <ion-icon name="archive-outline"></ion-icon>
                <p>Familles</p>
            </a>
        </li> --}}
<<<<<<< HEAD
        {{-- <li class="nav-item">
            <a href="{{ route('produit.index') }}" class="nav-link">

=======
        <li class="nav-item">
            <a href="@route('produit.index')" class="nav-link">
>>>>>>> dev
                <i class="nav-icon"></i>
                <ion-icon name="archive-outline"></ion-icon>
                <p>Produit</p>
            </a>
        </li> --}}
        <li class="nav-item">
            <a href="{{route('produit.create')}}"  class="nav-link" data-toggle="tooltip" data-placement="bottom" title="En developpement...">
                <i class="nav-icon fas fa-tags"></i><span class="mx-2">Modification</span></a>
        </li>
        <li class="nav-item">
            <a href="{{route('produit.index')}}" class="nav-link"><i class="nav-icon fas fa-folder-open"></i>
                <span>Tous les produits</span>
            </a>
        </li>

    </ul>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-users text-success"></i>
        <p>Fournisseurs<i class="right fas fa-angle-left"></i></p>
    </a>

    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('fournisseur.index')}}" class="nav-link active">
                <i class="fas fa-fw fa-user nav-icon"></i>
                <p>Nouveau fournisseur</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="fas fa-users nav-icon"></i>
                <p>Tous les fournisseurs</p>
            </a>
        </li>
    </ul>
</li>
