@extends('layouts.app')
@push('page_css')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/invoice.css') }}">
    <!-- Select2 -->
    <link type="text/css" rel="stylesheet" href="{{ asset('plugins/select2/css/select2.css') }}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/demo.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/jsgrid/jsgrid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/jsgrid/jsgrid-theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/jquery-ui/jquery-ui.min.css') }}">
@endpush
@section('content')
    <div class="container p-3" style="background-color: #ffffff; border-radius: 25px">

        <div class="row mb-4">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h5 class="col-md-12 text-center my-2 display-6 mb-5"> <b class="bg-indigo p-2 rounded m-2"><i
                            class="fas fa-ship p-1"></i>Page de commande</b></h5>
                <button type="button" class="btn-sm bg-indigo float-left border border-indigo-600 p-2 rounded-lg"
                    data-toggle="modal" data-target="#addProductModal" onclick="buttonProductModal()" data-whatever="@fat"><i
                    class="fas fa-cart-plus mx-1"></i>Nouveau Produit
                </button>
                <button type="button" class="btn-sm float-right bg-indigo border border-indigo-600 p-2 rounded-lg"
                    data-toggle="modal" data-target="#fournisseurModal" data-whatever="@fat"><i
                        class="fas fa-user mx-1"></i>Nouveau Fournisseur</button>
            </div>
        </div>
        <hr>

        {{-- <div class="row">
            <table data-editable data-editable-spy data-navigable-spy class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th class="text-center">Désignation</th>
                        <th>Quantité</th>
                        <th>Prix Achat</th>
                        <th>Prix Vente</th>
                        <th>Montant</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="col-md-1">
                            <input value="" name="no" id="no">
                        </td>
                        <td class="col-3">
                            <div class="form-group">
                                <select class="form-control select2" style="width: 100%;">
                                    @foreach($products as $product )
                                        <option value="{{  $product->id}}">{{  $product->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </td>
                        <td><input type="number" name="qtt" value="0" placeholder="XXX"></td>
                        <td><input type="text" name="pu" value="0" placeholder="XXX"></td>
                        <td><input type="text" name="pv" value="0" placeholder="XXX"></td>
                        <td><input type="text" name="mtt" value="0" placeholder="XXX"></td>
                    </tr>
                </tbody>
            </table>
        </div> --}}
        <div class="row">
            <div class="col-12">
                <form action="{{ route('addProduct')}}" method="POST">
                    <div class="row form-row align-items-center">
                        @csrf
                        <div class="col-3">
                            <div class="form-group">
                                <label for="produit">Désignation</label>
                                <select class="form-control select2" name="produit_id" id="produit" style="width: 100%;">
                                    @foreach($products as $product )
                                        <option value="{{  $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="qtt">Quatité</label>
                                <input type="number" name="qtt" id="qtt" class="form-control">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="pa">Prix Achat</label>
                                <input type="number" name="pa" id="pa" class="form-control">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="pv">Prix Vente</label>
                                <input type="number" name="pv" id="pv" class="form-control">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="mtt">Montant</label>
                                <input type="number" name="mtt" id="mtt" class="form-control">
                            </div>
                        </div>
                        <div class="col-1">
                            <button type="submit" class="mt-2 btn btn-success" id="addProduct">Ajouter</button>
                        </div>
                    </div>
                </form>
            </div> 
        </div>
        <hr>
        <div class="row">
           <div class="col-12">
                <table id="table" class="table table-striped table-hover table-bordered" data-editable data-editable-spy data-navigable-spy>
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Désignation</th>
                            <th>Quantité</th>
                            <th>Prix Achat</th>
                            <th>Prix Vente</th>
                            <th>Montant</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @forelse ($produits as $key => $value) --}}
                            <tr class="addProduit">
                                <td class="col-1"><input type="text" name="produit" id="produit" value="0" placeholder="XXX"></td>
                                <td class="col-3"><input type="text" name="produit" id="produit" value="0" placeholder="XXX"></td>
                                <td class="col-2"><input type="number" name="qtt" id="qtt" value="0" placeholder="XXX"></td>
                                <td class="col-2"><input type="text" name="pu" id="pu" value="0" placeholder="XXX"></td>
                                <td class="col-2"><input type="text" name="pv" id="pv" value="0" placeholder="XXX"></td>
                                <td class="col-2"><input type="text" name="mtt" id="mtt" value="0" placeholder="XXX"></td>
                            </tr>
                        {{-- @empty
                        @endforelse --}}
                    </tbody>
                </table>
           </div>
        </div>

        <div class="row">
            <div id="jsGrid"></div>
        </div>
        {{-- Produit modal  --}}
        <div class="col-6 col-md-3">
            <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="produitLabel" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <form action="{{ route('produit.store')}}" method="POST" id="addProduitForm">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title justify-content-beetween text-center" id="produitLabel"><i
                                        class="ml-2 fas fa-cart-plus"></i><span
                                        class="badge badge-info bg-indigo text-center mx-4 p-2">Ajouter un Produit </span>
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-cart-plus"></i></span>
                                    </div>
                                    <input type="text" name="produit" id="produit" class="form-control @error('produit') is-invalid @enderror"
                                        value="{{ old('produit')}}" placeholder="Ex: Paracetamol" autofocus autocomplete>
                                    <span class="text-danger" id="nameErrorProduit"></span> 
                                    @error('produit')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-3">
                                        <label><i class="fas fa-gift text-indigo mx-2"></i>Unité <i class="text-danger">*</i></label>
                                        <select class="form-control select2 @error('unite') is-invalid @enderror" id="unity" style="width: 100%;" name="unite">
                                            @foreach($unites as $unite )
                                                <option value="{{  $unite->id }}">{{ $unite->name}}</option>
                                            @endforeach
                                            <span class="text-danger" id="uniteError"></span>
                                            @error('unite')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </select>
                                    </div>
                                    <div class="form-group col-4">
                                        <label><i class="fas fa-folder-plus text-indigo mx-2"></i>Catégorie <i class="text-danger">*</i></label>
                                        <select class="form-control select2 @error('categorie') is-invalid @enderror" id="category" style="width: 100%;" name="categorie">
                                            @foreach($categories as $categorie )
                                                <option value="{{  $categorie->id }}">{{ $categorie->categorieName }}</option>
                                            @endforeach
                                            <span class="text-danger" id="categorieError"></span>
                                            @error('categorie')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </select>
                                    </div>
                                    <div class="form-group col-5">
                                        <label><i class="fas fa-archive text-indigo mx-2"></i>Famille <i class="text-danger">*</i></label>
                                        <select class="form-control @error('famille') is-invalid @enderror select2" id="familly" style="width: 100%;" name="famille">
                                            @foreach($familles as $famille )
                                                <option value="{{  $famille->id }}">{{ $famille->familleName }}</option>
                                            @endforeach
                                            <span class="text-danger" id="familleError"></span>
                                            @error('famille')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Date de production</label>
                                            <div class="input-group date" id="date_production" data-target-input="nearest">
                                                <input type="text" name="date_production"
                                                    class="form-control datetimepicker-input @error('date_production') is-invalid @enderror"
                                                    value="{{ old('date_production')}}" data-target="#date_production" />
                                                <div class="input-group-append" data-target="#date_production"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                                <span class="text-danger" id="dateProdError"></span>
                                                @error('date_production')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Date de d'éxpiration</label>
                                            <div class="input-group date" id="date_peremption" data-target-input="nearest">
                                                <input type="text" name="date_peremption"
                                                    class="form-control datetimepicker-input @error('date_peremption') is-invalid @enderror"
                                                    value="{{ old('date_peremption')}}" data-target="#date_peremption" />
                                                <div class="input-group-append" data-target="#date_peremption"
                                                    data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                                <span class="text-danger" id="dateExpError"></span>
                                                @error('date_peremption')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description" class="col-form-label">Description</label>
                                    <textarea name="description"
                                        class="form-control @error('description') is-invalid @enderror" id="description"
                                        autofocus autocomplete>{{old('description') }}</textarea>
                                    <span class="text-danger" id="descripExpError"></span>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary bg-indigo"><i
                                    class="fas fa-save mx-1"></i>Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- /.Produit Modal --}}

        {{-- BEGIN ADD FOURNISSEUR MODAL --}}
        <div class="modal fade" id="fournisseurModal" tabindex="-1" aria-labelledby="fournisseurModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <form action="@route('fournisseur.store')" method="POST" id="fournisseurForm">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title justify-content-beetween"
                                id="fournisseurModalLabel"><i class="ml-2 fas fa-users"></i><span
                                    class="badge badge-pill badge-info text-center bg-indigo text-center mx-2 p-2">Ajouter un
                                    fournisseur </span></h5>
                            <button type="button"class="close" data-dismiss="modal"  aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input type="text" name="name"id="name"class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Nom fournisseur"  data-parsley-minlength="3">
                                <span id="nameErrorFournisseur" class="text-danger"></span>

                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text"name="phone"id="phone" class="form-control"  data-parsley-minlength="8">
                                <span id="phoneError" class="text-danger"></span>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-globe"></i></span>
                                </div>
                                <input type="text" name="address"  class="form-control"  id="address"  
                                    placeholder="Adresse" >
                                <span id="addressError" class="text-danger"></span>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="email"  name="email" id="email" class="form-control" placeholder="Email"
                                data-parsley-trigger="keypress">
                                <span id="emailError" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger"  data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary bg-indigo"><i class="fas fa-save mx-1"></i>Enregistrer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        {{-- END ADD FOURNISSEUR MODAL --}}
    </div>

@endsection
@push('page_scripts')
    <!-- Select2 -->
    {{-- <script src="{{asset('plugins/select2/js/select2.min.js') }}"></script> --}}
    {{-- <script src="{{asset('plugins/select2/js/i18n/fr.js') }}"></script> --}}
    <!-- InputMask -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <!-- date-range-picker -->
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.js') }}"></script>
    <script src="{{ asset('plugins/jquery-tabledit-1.2.3/jquery.tabledit.js') }}"></script>
    {{-- <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script>
        window.jQuery || document.write('<script src="/js/jquery-1.8.3.js"><\/script>')
    </script>
    <script src="{{ asset('plugins/jsgrid/jsgrid.js') }}"></script>
    <script src="{{ asset('plugins/jsgrid/i18n/jsgrid-fr.js') }}"></script>
    <script src="{{ asset('js/db.js') }}"></script> --}}


    <script>
        $(function () { 
            //Date production
            $('#date_production').datetimepicker({
                format: 'L'
            });

            //Date d'expiration
            $('#date_peremption').datetimepicker({
                format: 'L'
            });
            //Initialize Select2 Elements
            // $('.select2').select2();

        });
    </script>
<script>
    $('#uniteModal').click(function() {
        $('#UniteError').html('');
    });
    
    $('#categorieModal').click(function() {
        $('#categorieError').html('');
    });

    $('#familleModal').click(function() {
        $('#familleError').html('');
    });

   
    function getAllProducts() {
        $.ajax({
            type: "GET",
            dataType: 'json',
            url: "@route('product.all')",
            success: function(response) {
                let data = "";
                $.each(response, function(key, value) {
                    data = data + '<tr id="pid(' + value.id + ')">'
                        data = data + "<th scope='row'>" + value.id + "</>"
                        data = data + "<td>" + value.produit + "</td>"
                        data = data + "<td>" + value.option.name + "</td>"
                        data = data + "<td>" + value.categorie.categorieName + "</td>"
                        data = data + "<td>" + value.famille.familleName + "</td>"
                        data = data + "<td>" + value.date_production + "</td>"
                        data = data + "<td>" + value.date_peremption + "</td>"
                        data = data + '<td class="text-right py-0 px-2 align-middle action">'
                        // data = data + '<div class="btn-group btn-group-sm">'
                        data = data +
                            '<a href="javascript:void(0)" role="button" class="btn btn-primary btn-xs showProduct" data-toggle="modal" data-target=".bs-show-modal-lg"><i class="fa fa-folder-open"data-toggle="tooltip" data-placement="top" title="Voir"></i></a>'
                        data = data +
                            '<a href="javascript:void(0)" role="button" class="btn btn-info btn-xs editProduct" data-bs-toggle="modal" data-bs-target="#ProductEditModal" data-bs-whatever="@fat"onclick="editProduct(' +
                            value.id +
                            ')"><i class="fas fa-pen" data-toggle="tooltip" data-placement="top"title="Modifier"></i>'
                        data = data +
                            '<a href="javascript:void(0)" role="button" class="btn btn-danger btn-xs deleteProduct" data-method="DELETE"  data-confirm="Etes-vous sûr" onclick="deleteProduct(' +
                            value.id +
                            ')"><i class="fas fa-trash"  data-toggle="tooltip" data-placement="left" title="Supprimer"></i></a>'
                        // data = data + '</div>'
                        data = data + "</td>"
                    data = data + "</tr>"

                });
                $('table #row').html(data);
            }
        });
    }
    getAllProducts();


    
    function getAllCategories(){
        $.ajax({
            type: "GET",
            dataType: 'json',
            url: "@route('categorie.all')",
            success: function(response) {
                let data = "";
                $.each(response, function(key, value) {                 
                    data = data + '<select class="form-control select2"  id="category" style="width: 100%;" name="categorie">'
                        data = data + "<option value="+value.id+">" + value.categorieName + "</option>"
                    data = data + "</select>"
                });
                $('#category').html(data);
            }
        });
    
    }

    function getAllFamilles(){
        $.ajax({
            type: "GET",
            dataType: 'json',
            url: "@route('familles.all')",
            success: function(response) {
                let data = "";
                $.each(response, function(key, value) {                 
                    data = data + '<select class="form-control select2"  id="familly" style="width: 100%;" name="famille">'
                        data = data + "<option value="+value.id+">" + value.familleName + "</option>"
                    data = data + "</select>"
                });
                $('#familly').html(data);
            }
        });
    }

    function getAllUnites(){
        $.ajax({
            type: "GET",
            dataType: 'json',
            url: "@route('unite.all')",
            success: function(response) {
                let data = "";
                $.each(response, function(key, value) {                 
                    data = data + '<select class="form-control select2"  id="unity" style="width: 100%;" name="unite">'
                        data = data + "<option value="+value.id+">" + value.name + "</option>"
                    data = data + "</select>"
                });
                $('#unity').html(data);
            }
        });
    }


    
    $('#UniteForm').submit(function(e) {
        e.preventDefault();

        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: new FormData(this),
            dataType: "json",
            contentType: false,
            processData: false,
            success: function (response) {
                $('#UniteForm')[0].reset();
                $('#uniteModal').modal('hide');
                getAllProducts();
            },
            error: function(error) {
                $('#UniteError').text(error.responseJSON.errors.unite);
            }
        });
    });

   

    $('#categorieForm').submit(function(e) {
        e.preventDefault();

        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: new FormData(this),
            dataType: "json",
            contentType: false,
            processData: false,
            success: function (response) {
                $('#categorieForm')[0].reset();
                $('#categorieModal').modal('hide');
                getAllProducts();
            },
            error: function(error)  {
                $('#categorieError').text(error.responseJSON.errors.categorie);
            }
        });
    });


    $('#familleForm').submit(function(e) {
        e.preventDefault();

        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: new FormData(this),
            dataType: "json",
            contentType: false,
            processData: false,
            success: function (response) {
                $('#familleForm')[0].reset();
                $('#familleModal').modal('hide');
                getAllProducts();
            },
            error: function(error) {
                $('#familleError').text(error.responseJSON.errors.famille);
            }
        });
    });
   
    function buttonProductModal() {
        getAllUnites();
        getAllCategories();
        getAllFamilles();

    }

    $('#addProductModal').click(function() {
        $('#nameErrorProduit').html('');
        $('#uniteError').html('');
        $('#categorieError').html('');
        $('#familleError').html('');
        $('#dateProdError').html('');
        $('#dateExpError').html('');   
        $('#descripExpError').html('');
    });



    $('#addProduitForm').submit(function(e) {
        e.preventDefault();

        $.ajax({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: new FormData(this),
            dataType: "json",
            contentType: false,
            processData: false,
            success: function (response) {
                $('#addProduitForm')[0].reset();
                $('#addProductModal').modal('hide');
                // getAllProducts();            
            },
            error: function(error) {
                $('#nameErrorProduit').text(error.responseJSON.errors.produit);
                $('#uniteError').text(error.responseJSON.errors.unite);
                $('#categorieError').text(error.responseJSON.errors.categorie);
                $('#familleError').text(error.responseJSON.errors.famille);
                $('#dateProdError').text(error.responseJSON.errors.date_production);
                $('#dateExpError').text(error.responseJSON.errors.date_peremption);
                $('#descripExpError').text(error.responseJSON.errors.description);
                              
            }
        });
    });
</script>
<script>
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });

    $('#fournisseurModal').click(function() {
        $('#nameErrorFournisseur').html('');
        $('#phoneError').html('');
        $('#addressError').html('');
        $('#emailError').html('');
    });

    function getAllFournisseur() {
        $.ajax({
            type: "GET",
            dataType: 'json',
            url: "@route('fournisseur.all')",
            success: function(response) {
                let data = "";
                $.each(response, function(key, value) {
                    if (value.address === null) {
                        value.address = "Pas d'adresse"
                    }
                    if (value.email === null) {
                        value.email = 'Fournisseur@gmail.com'
                    }
                    data = data + '<tr id="fid(' + value.id + ')">'
                    data = data + "<th scope='row'>" + value.id + "</th>"
                    data = data + "<td>" + value.name + "</td>"
                    data = data + "<td>" + value.email + "</td>"
                    data = data + "<td>" + value.phone + "</td>"
                    data = data + "<td>" + value.address + "</td>"
                    data = data + '<td class="text-right py-0 align-middle action">'
                    data = data + '<div class="btn-group btn-group-sm">'
                    data = data +
                        '<a href="javascript:void(0)" role="button" class="btn btn-primary btn-xs showFournisseur" data-toggle="modal" data-target=".bs-show-modal-lg"><i class="fa fa-folder-open"data-toggle="tooltip" data-placement="top" title="Voir"></i></a>'
                    data = data +
                        '<a href="javascript:void(0)" role="button" class="btn btn-info btn-xs editFournisseur" data-bs-toggle="modal" data-bs-target="#fournisseurEditModal" data-bs-whatever="@fat"onclick="editFournisseur(' +
                        value.id +
                        ')"><i class="fas fa-pen" data-toggle="tooltip" data-placement="top"title="Modifier"></i>'
                    data = data +
                        '<a href="javascript:void(0)" role="button" class="btn btn-danger btn-xs deleteFournisseur" data-method="DELETE"  data-confirm="Etes-vous sûr" onclick="deleteFournisseur(' +
                        value.id +
                        ')"><i class="fas fa-trash"  data-toggle="tooltip" data-placement="left" title="Supprimer"></i></a>'
                    data = data + '</div>'
                    data = data + "</td>"
                    data = data + "</tr>"

                });
                $('#row').html(data);
            }
        });
    }

    getAllFournisseur();

    $('#fournisseurForm').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            dataType: "json",
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(response) {
                if (response) {
                    if (response.address === null) {
                        response.address = "Pas d'adresse"
                    }
                    if (response.email === null) {
                        response.email = 'Fournisseur@gmail.com'
                    }

                    $('#fournisseurForm')[0].reset();
                    $('#fournisseurModal').modal('hide');
                    // getAllFournisseur();
                }
            },
            error: function(error) {
                $('#nameErrorFournisseur').text(error.responseJSON.errors.name);
                $('#phoneError').text(error.responseJSON.errors.phone);
                $('#addressError').text(error.responseJSON.errors.address);
                $('#emailError').text(error.responseJSON.errors.email);

            }
        });
    });

    // function editFournisseur(id) {
    //     $.get("@route('fournisseur.index')/" + id + '/edit', function(fournisseur) {
    //         $('#id').val(fournisseur.id);
    //         $('#nameEdit').val(fournisseur.name);
    //         $('#emailEdit').val(fournisseur.email);
    //         $('#phoneEdit').val(fournisseur.phone);
    //         $('#addressEdit').val(fournisseur.address);

    //         $('#nameEditError').html('');
    //         $('#phoneEditError').html('');
    //         $('#addressEditError').html('');
    //         $('#emailEditError').html('');

    //         $('#fournisseurEditModal').modal('toggle');
    //     });
    // }

    // $('#fournisseurEditForm').submit(function(e) {
    //     e.preventDefault();

    //     let id = $('#id').val();
    //     let name = $('#nameEdit').val();
    //     let email = $('#emailEdit').val();
    //     let phone = $('#phoneEdit').val();
    //     let address = $('#addressEdit').val();

    //     $.ajax({
    //         type: "PUT",
    //         dataType: "json",
    //         url: "@route('fournisseur.index')/" + id,
    //         data: {
    //             _token: "{{ Session::token() }}",
    //             id: id,
    //             name: name,
    //             email: email,
    //             phone: phone,
    //             address: address,
    //         },
    //         success: function(response) {
    //             $('#fid' + response.id + 'td:nth-child(1)').text(response.name);
    //             $('#fid' + response.id + 'td:nth-child(2)').text(response.email);
    //             $('#fid' + response.id + 'td:nth-child(3)').text(response.phone);
    //             $('#fid' + response.id + 'td:nth-child(4)').text(response.address);

    //             $('#fournisseurEditForm')[0].reset();
    //             $('#nameEditError').html('');
    //             $('#phoneEditError').html('');
    //             $('#addressEditError').html('');
    //             $('#emailEditError').html('');
    //             $('#fournisseurEditModal').modal('toggle');
    //             getAllFournisseur();
    //         },
    //         error: function(error) {
    //             $('#nameEditError').text(error.responseJSON.errors.name);
    //             $('#phoneEditError').text(error.responseJSON.errors.phone);
    //             $('#emailEditError').text(error.responseJSON.errors.email);
    //             $('#addressEditError').text(error.responseJSON.errors.address);
    //         }

    //     });
    // })

    // function deleteFournisseur(id) {
    //     if (confirm("Etes-vous sur de supprimer ce fournisseur")) {
    //         $.ajax({
    //             type: "DELETE",
    //             url: "@route('fournisseur.index')/" + id,
    //             data: {
    //                 _token: "{{ Session::token() }}"
    //             },
    //             success: function() {
    //                 $('#fid').remove();
    //                 getAllFournisseur();

    //             }
    //         });
    //     }
    // }
</script>
@endpush