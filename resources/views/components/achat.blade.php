@extends('layouts.app')
@push('page_css')
    <link type="text/css" rel="stylesheet" href="{{asset('css/invoice.css')}}">
    <!-- Select2 -->
    <link type="text/css" rel="stylesheet" href="{{asset('plugins/select2/css/select2.css')}}"> 
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
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
        
        <div class="row">
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
            </table>
        </div>

        {{-- Produit Modal  --}}
        <div class="col-6 col-md-3">
            <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="produitLabel" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <form action="{{ route('produit.store')}}" method="POST">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="produitLabel"><i class="ml-2 fas fa-cart-plus"></i><span class="badge badge-info bg-indigo  offset-md-3 mx-5 text-lg p-2">Ajouter un Produit </span></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend"> 
                                        <span class="input-group-text"><i class="fas fa-cart-plus"></i></span>
                                    </div>
                                    <input type="text" name="produit" class="form-control @error('produit') is-invalid @enderror"  value="{{ old('produit')}}" placeholder="Ex: Paracetamol" required autofocus autocomplete>
                                    @error('produit')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row mt-3">
                                    <div class="form-group col-3">
                                        <label><i class="fas fa-gift text-indigo mx-2"></i>Unité <i class="text-danger">*</i></label>
                                        <select class="form-control select2 @error('unite') is-invalid @enderror" style="width: 100%;" name="unite">
                                            @foreach($unites as $unite)
                                                <option value="{{  $unite->id }}">{{ $unite->name}}</option>
                                            @endforeach
                                            @error('unite')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </select>
                                    </div>
                                    <div class="form-group col-4">
                                        <label><i class="fas fa-folder-plus text-indigo mx-2"></i>Catégorie <i class="text-danger">*</i></label>                                       
                                        <select class="form-control select2 @error('categorie') is-invalid @enderror" style="width: 100%;" name="categorie">
                                            @foreach($categories as $categorie)
                                                <option value="{{  $categorie->id}}">{{  $categorie->categorieName}}</option>
                                            @endforeach
                                            @error('categorie')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </select>
                                    </div>
                                    <div class="form-group col-5">
                                        <label><i class="fas fa-archive text-indigo mx-2"></i>Famille <i class="text-danger">*</i></label>
                                        <select class="form-control @error('famille') is-invalid @enderror select2" style="width: 100%;" name="famille">
                                            @foreach($familles as $famille)
                                                <option value="{{  $famille->id}}">{{  $famille->familleName}}</option>
                                            @endforeach
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
                                                <input type="text" name="date_production" class="form-control datetimepicker-input @error('date_production') is-invalid @enderror" value="{{ old('date_production')}}" data-target="#date_production"/>
                                                <div class="input-group-append" data-target="#date_production" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                                @error('date_production')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Date d'éxpiration</label>
                                            <div class="input-group date" id="date_peremption" data-target-input="nearest">
                                                <input type="text" name="date_peremption" class="form-control datetimepicker-input @error('date_peremption') is-invalid @enderror" value="{{ old('date_peremption')}}" data-target="#date_peremption"/>
                                                <div class="input-group-append" data-target="#date_peremption" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                                @error('date_peremption')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description" class="col-form-label">Description</label>
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror"  id="description" autofocus autocomplete>{{old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
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
        </div>
        {{-- /.Produit Modal --}}

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
        {{-- /.Fournisseur Modal --}}
    </div>
    
@endsection
@push('page_scripts')
    <!-- Select2 -->
    {{-- <script src="{{asset('plugins/select2/js/select2.min.js')}}"></script> --}}
    {{-- <script src="{{asset('plugins/select2/js/i18n/fr.js')}}"></script> --}}
    <!-- InputMask -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <!-- date-range-picker -->
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

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

@endpush
