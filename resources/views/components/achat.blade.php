@extends('layouts.app')
@push('page_css')
    <link type="text/css" rel="stylesheet" href="{{asset('css/invoice.css')}}">
    <!-- Select2 -->
    <link type="text/css" rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}"> 
    <!-- daterange picker -->
  <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
@endpush
@section('content')
    <div class="container p-3 rounded-3" style="background-color: #ffffff">

        <div class="row mb-4">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <h5 class="col-md-12 text-center my-2 display-6 mb-5"> <b class="bg-indigo p-2 rounded m-2"><i class="fas fa-ship p-1"></i>Page de commande</b></h5>
                <button type="button" class="btn-sm bg-indigo float-left border border-indigo-600 p-2 rounded-lg" data-toggle="modal" data-target="#productModal" data-whatever="@fat"><i class="fas fa-cart-plus mx-1"></i>Nouveau Produit</button>
                <button type="button" class="btn-sm float-right bg-indigo border border-indigo-600 p-2 rounded-lg" data-toggle="modal" data-target="#fournisseurModal" data-whatever="@fat"><i class="fas fa-user mx-1"></i>Nouveau Fournisseur</button>
            </div>
        </div>
        <hr>
        
        {{-- <div class="row">
            <table data-editable data-editable-spy data-navigable-spy class="table table-hover">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th class="text-center">Designation</th>
                        <th>Quantité</th>
                        <th>Catégorie</th>
                        <th>Famille</th>
                        <th>Unité</th>
                        <th>Prix Achat</th>
                        <th>Prix Vente</th>
                        <th>Date de Production</th>
                        <th>Date de péremption</th>
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
                                        <option value="{{  $product->name}}">{{  $product->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </td>
                        <td><input type="number" name="qtt" value="0" placeholder="XXX"></td>
                        <td >
                            <select class="form-control select" style="width: 100%;" name="categorie" id="categorie">
                                @foreach($categories as $categorie)
                                    <option value="{{$categorie->categorieName}}">{{$categorie->categorieName}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="form-control select" style="width: 100%;" name="categorie" id="categorie">
                                @foreach($familles as $famille)
                                    <option value="{{$famille->familleName}}">{{$famille->familleName}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td><input type="text" name="pu" value="0" placeholder="XXX"></td>
                        <td><input type="text" name="pv" value="0" placeholder="XXX"></td>
                        <td class="col-md-2">                
                            <!-- Date -->
                            <div class="form-group">
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td></td>
                        <td><input type="text" name="mtt" value="0" placeholder="XXX"></td>
                    </tr>
            </table>

        </div> --}}

        <div class="row">
            <div class="col-md-12 px-2">
                <div class="card" style="background-color: ">
                    <div class="header">
                        <h4 class="title"> <i class="fa fa-ship text-success"> </i > <span class="label label-primary">  Nouvelle Commade</span></h4>
                    </div>
                    <div class="content">
                        <div class="row">
                            <div class="col-8 px-4">
                                <form action="" class="">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" style="width: 100%;">
                                                @foreach($products as $product )
                                                    <option value="{{  $product->name}}">{{  $product->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                         <div class="col-md-6">
                <div class="form-group">
                  <label>Minimal</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option selected="selected">Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                  </select>
                </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        
        
        {{-- Produit modal  --}}
        <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="produitLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <form action="{{ route('produit.store')}}" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title justify-content-beetween" id="produitLabel"><i class="ml-2 fas fa-cart-plus"></i><span class="badge badge-info bg-indigo text-center mx-4 p-2">Ajouter un Produit </span></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend"> 
                                    <span class="input-group-text"><i class="fas fa-cart-plus"></i></span>
                                </div>
                                <input type="text" name="produit" class="form-control @error('produit') is-invalid @enderror" placeholder="Ex: Paracetamol" required autofocus autocomplete>
                                @error('produit')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description" class="col-form-label">Description</label>
                                <textarea name="description" class="form-control"  id="description" autofocus autocomplete></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary bg-indigo"><i class="fas fa-save mx-1"></i>Enregistrer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- Fournisseur Modal --}}
        <div class="modal fade" id="fournisseurModal" tabindex="-1" aria-labelledby="fournisseurModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <form action="{{ route('fournisseur.store')}}" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title justify-content-beetween" id="fournisseurModalLabel"><i class="ml-2 fas fa-users"></i><span class="badge badge-pill badge-info bg-indigo text-center mx-2 p-2">Ajouter un fournisseur </span></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nom fournisseur">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-globe"></i></span>
                                </div>
                                <input type="text" name="address" class="form-control" placeholder="Adresse">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" name="phone" class="form-control" placeholder="+224 620-82-38-77">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="email" name="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save mx-1"></i>Enregistrer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
@endsection

@push('page_scripts')
    <!-- Select2 -->
    <script src="{{asset('plugins/select2/js/select2.min.js')}}"></script>
    <!-- date-range-picker -->
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    {{-- <script src="{{asset('plugins/select2/js/i18n/fr.js')}}"></script> --}}
    <script>
        $(function () { 
            //Initialize Select2 Elements
            $('.select2').select2()
        });
        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });

    </script>

@endpush
