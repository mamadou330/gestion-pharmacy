@extends('layouts.app')
@push('page_css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
@endpush
@section('content')
    <div class="row m-4">
        {{-- Option Unité modal  --}}
        <div class="col-6 col-md-3">
            <button type="button" class="bg-indigo border border-indigo-600 p-3 rounded-lg" data-toggle="modal" data-target="#unite" data-whatever="@fat"><i class="fas fa-gift mx-1"></i> Ajouter une Unité</button>
            <div class="modal fade" id="unite" tabindex="-1" aria-labelledby="uniteLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <form action="{{ route('option.store')}}" method="POST">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title justify-content-beetween" id="uniteLabel"><i class="fas fa-gift"></i><span class="badge badge-info bg-indigo text-center mx-4 p-2">Ajouter une Unité </span></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend"> 
                                        <span class="input-group-text"><i class="fas fa-gift"></i></span>
                                    </div>
                                    <input type="text" name="unite" class="form-control @error('unite') is-invalid @enderror" placeholder="Ex: Pcs" required autofocus autocomplete>
                                    @error('unite')
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

        {{-- Categorie modal  --}}
        <div class="col-6 col-md-3">
            <button type="button" class="bg-indigo border border-indigo-600 p-3 rounded-lg" data-toggle="modal" data-target="#categorie" data-whatever="@fat"><i class="fas fa-folder-plus mx-1"></i> Ajouter une Catégorie</button>
            <div class="modal fade" id="categorie" tabindex="-1" aria-labelledby="categorieLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <form action="{{ route('categorie.store')}}" method="POST">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title justify-content-beetween block" id="categorieLabel"><i class="ml-2 fas fa-folder-plus"></i><span class="badge badge-info bg-indigo text-center mx-2 p-2">Ajouter une Catégorie </span></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend"> 
                                        <span class="input-group-text"><i class="fas fa-folder-plus"></i></span>
                                    </div>
                                    <input type="text" name="categorie" class="form-control @error('categorie') is-invalid @enderror" placeholder="Ex: Antibiotique" required autofocus autocomplete>
                                    @error('categorie')
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

        {{-- Famille modal  --}}
        <div class="col-6 col-md-3">
            <button type="button" class="bg-indigo border border-indigo-600 p-3 rounded-lg" data-toggle="modal" data-target="#famille" data-whatever="@fat"><i class="fas fa-archive mx-1"></i> Ajouter une Famille</button>
            <div class="modal fade" id="famille" tabindex="-1" aria-labelledby="familleLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <form action="{{ route('famille.store')}}" method="POST">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title justify-content-beetween" id="familleLabel"><i class="ml-2 fas fa-archive"></i><span class="badge badge-info bg-indigo text-center mx-4 p-2">Ajouter une Famille </span></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend"> 
                                        <span class="input-group-text"><i class="fas fa-archive"></i></span>
                                    </div>
                                    <input type="text" name="famille" class="form-control @error('famille') is-invalid @enderror" placeholder="Ex: Sirop" required autofocus autocomplete>
                                    @error('famille')
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

        {{-- Produit modal  --}}
        <div class="col-6 col-md-3">
            <button type="button" class="bg-indigo border border-indigo-600 p-3 rounded-lg" data-toggle="modal" data-target="#productModal" data-whatever="@fat"><i class="fas fa-cart-plus mx-1"></i> Ajouter un Produit</button>
            <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="produitLabel" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <form action="{{ route('produit.store')}}" method="POST">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title justify-content-beetween text-center" id="produitLabel"><i class="ml-2 fas fa-cart-plus"></i><span class="badge badge-info bg-indigo text-center mx-4 p-2">Ajouter un Produit </span></h5>
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
                                            @foreach($unites as $unite )
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
                                            @foreach($categories as $categorie )
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
                                            @foreach($familles as $famille )
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
                                            <label>Date de d'éxpiration</label>
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
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 rounded">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title text-success font-weight-bold"> <i class="fas fa-ship"></i> Tous les produits</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="produit" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Désignation</th>
                                        <th>Unité</th>
                                        <th>Catégorie</th>
                                        <th>Famille</th>
                                        <th>Date Production</th>
                                        <th>Date d'expiration</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product )
                                        <tr>
                                            <td>{{  $product->id}}</td>
                                            <td>{{  $product->name}}</td>
                                            <td>{{  get_unite($product->name)}}</td>
                                            <td>{{  $product->categorie->categorieName}}</td>
                                            <td>{{  $product->famille->familleName}}</td>
                                            <td>{{  $product->date_production->translatedFormat('d-F-Y')}}</td>
                                            <td>{{  $product->date_peremption->translatedFormat('d-F-Y')}}</td>
                                            <td class="text-right py-0 align-middle">
                                                {{-- <div class="btn-group btn-group-sm"> --}}
                                                    <button type="submit" class="btn btn-primary btn-xs viewOrder" data-toggle="modal" data-target=".bs-show-modal-lg"><i class="fa fa-folder-open" data-toggle="tooltip" data-placement="top" title="Voir"></i></button>
                                                    <button type="submit" class="btn btn-info btn-xs editOrder" data-toggle="modal" data-target=".bs-editorder-modal-lg" data-backdrop="static" data-keyboard="false"><i class="fas fa-pen" data-toggle="tooltip" data-placement="top" title="Modifier"></i></button>
                                                    <button type="submit" class="btn btn-danger btn-xs deleteOrder"  data-method="DELETE" data-confirm="Etes-vous sûr"><i class="fas fa-trash" data-toggle="tooltip" data-placement="left" title="Supprimer"></i></button>
                                                    {{-- <td class="text-right py-0 align-middle">
                                                        <div class="btn-group btn-group-sm">
                                                            <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                                            <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                        </div>
                                                    </td> --}}
                                                {{-- </div> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                   
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@push('page_scripts')

    <!-- InputMask -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <!-- date-range-picker -->
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}" type="text/javascript"></script>

    <script>
        $(function () {
            $("#produit").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#produit_wrapper .col-md-6:eq(0)');

            //Date production
            $('#date_production').datetimepicker({
                format: 'L'
            });

            //Date d'expiration
            $('#date_peremption').datetimepicker({
                format: 'L'
            });
                
        });
  </script>
@endpush 

