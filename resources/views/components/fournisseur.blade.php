@extends('layouts.app')
@push('page_css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    {{-- PARSLEY CSS --}}
    {{-- <link rel="stylesheet" href="{{ asset('libraries/parsley/main.css') }}"> --}}
@endpush
@section('content')
    @php
        $fournisseur = session('fournisseur');
    @endphp
    <section class="content">
        <div class="container-fluid">
            <button type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#fournisseurModal"  data-whatever="@fat"><i class="fas fa-users mx-1"></i> Fournisseurs</button>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tous les fournisseurs</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="fournisseurTable" class="table table-hover table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Nom</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Téléphone</th>
                                            <th scope="col">Adresse</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="row">
                                        @foreach ($fournisseurs as $fournisseur)
                                            <tr id="fid{{ $fournisseur->id }}">
                                                <th scope="row">{{ $fournisseur->id }}</th>
                                                <td>{{ $fournisseur->name }}</td>
                                                <td>{{ $fournisseur->email }}</td>
                                                <td>{{ $fournisseur->phone }}</td>
                                                <td>{{ $fournisseur->address }}</td>
                                                <td class="text-right py-0 align-middle action">
                                                    <div class="btn-group btn-group-sm">
                                                        <a href="javascript:void(0)" role="button"
                                                            class="btn btn-primary btn-xs showFournisseur"
                                                            data-toggle="modal"
                                                            data-target=".bs-show-modal-lg"><i class="fa fa-folder-open"
                                                            data-toggle="tooltip" data-placement="top" title="Voir"></i></a>
                                                        <a href="javascript:void(0)" role="button"
                                                            class="btn btn-info btn-xs editFournisseur" data-bs-toggle="modal"
                                                            data-bs-target="#fournisseurEditModal" data-bs-whatever="@fat"
                                                            onclick="editFournisseur({{ $fournisseur->id }})"
                                                            data-backdrop="static" data-keyboard="false">
                                                            <i class="fas fa-pen" data-toggle="tooltip" data-placement="top"
                                                            title="Modifier"></i>
                                                        </a>
                                                        <a href="javascript:void(0)" role="button" class="btn btn-danger btn-xs deleteFournisseur"
                                                            data-method="DELETE" data-confirm="Etes-vous sûr"
                                                            onclick="deleteFournisseur({{ $fournisseur->id }})"><i
                                                            class="fas fa-trash" data-toggle="tooltip" data-placement="left"
                                                            title="Supprimer"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>
                            </div>
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

    <!-- Small modal -->

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
                                placeholder="Nom fournisseur" required data-parsley-minlength="3">
                            <span id="nameError" class="text-danger"></span>

                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            </div>
                            <input type="text"name="phone"id="phone" class="form-control" required data-parsley-minlength="8">
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

    {{-- BEGIN EDIT FOURNISSEUR MODAL --}}
    <div class="modal fade" id="fournisseurEditModal" tabindex="-1" aria-labelledby="fournisseurEditModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            @if($fournisseur)
                <form id="fournisseurEditForm" action="@route('fournisseur.update', $fournisseur)" method="POST">
            @else
                <form id="fournisseurEditForm" method="POST">
            @endif
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="fournisseurEditModalLabel">
                                <span class="badge badge-pill badge-info bg-indigo text-center p-2">Modification du
                                    fournisseur</span>
                            </h5>
                            <button type="button" class="close"  data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input type="text" name="nameEdit" id="nameEdit"  class="form-control @error('nameEdit') is-invalid @enderror">
                                <span id="nameEditError"  class="text-danger"></span>
                                @error('nameEdit')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" name="phoneEdit" id="phoneEdit" class="form-control">
                                <span id="phoneEditError" class="text-danger"></span>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-globe"></i></span>
                                </div>
                                <input type="text" name="addressEdit" class="form-control" id="addressEdit">
                                <span id="addressEditError"   class="text-danger"></span>

                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="email" name="emailEdit" id="emailEdit" class="form-control">
                                <span id="emailEditError"  class="text-danger"></span>

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
    {{-- END EDIT FOURNISSEUR MODAL --}}
@endsection

@push('page_scripts')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    {{-- <script src="{{ asset('libraries/parsley/parsley.min.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('libraries/parsley/langue/fr.js') }}"  type="text/javascript"></script>
    <script>
        window.ParsleyValidator.setLocale('fr');
    </script> --}}
    <script>
        $(function() {
            $('#fournisseurTable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,       
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
            $('#nameError').html('');
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
                        getAllFournisseur();
                    }
                },
                error: function(error) {
                    $('#nameError').text(error.responseJSON.errors.name);
                    $('#phoneError').text(error.responseJSON.errors.phone);
                    $('#addressError').text(error.responseJSON.errors.address);
                    $('#emailError').text(error.responseJSON.errors.email);

                }
            });
        });

        function editFournisseur(id) {
            $.get("@route('fournisseur.index')/" + id + '/edit', function(fournisseur) {
                $('#id').val(fournisseur.id);
                $('#nameEdit').val(fournisseur.name);
                $('#emailEdit').val(fournisseur.email);
                $('#phoneEdit').val(fournisseur.phone);
                $('#addressEdit').val(fournisseur.address);

                $('#nameEditError').html('');
                $('#phoneEditError').html('');
                $('#addressEditError').html('');
                $('#emailEditError').html('');

                $('#fournisseurEditModal').modal('toggle');
            });
        }

        $('#fournisseurEditForm').submit(function(e) {
            e.preventDefault();

            let id = $('#id').val();
            let name = $('#nameEdit').val();
            let email = $('#emailEdit').val();
            let phone = $('#phoneEdit').val();
            let address = $('#addressEdit').val();

            $.ajax({
                type: "PUT",
                dataType: "json",
                url: "@route('fournisseur.index')/" + id,
                data: {
                    _token: "{{ Session::token() }}",
                    id: id,
                    name: name,
                    email: email,
                    phone: phone,
                    address: address,
                },
                success: function(response) {
                    $('#fid' + response.id + 'td:nth-child(1)').text(response.name);
                    $('#fid' + response.id + 'td:nth-child(2)').text(response.email);
                    $('#fid' + response.id + 'td:nth-child(3)').text(response.phone);
                    $('#fid' + response.id + 'td:nth-child(4)').text(response.address);

                    $('#fournisseurEditForm')[0].reset();
                    $('#nameEditError').html('');
                    $('#phoneEditError').html('');
                    $('#addressEditError').html('');
                    $('#emailEditError').html('');
                    $('#fournisseurEditModal').modal('toggle');
                    getAllFournisseur();
                },
                error: function(error) {
                    $('#nameEditError').text(error.responseJSON.errors.name);
                    $('#phoneEditError').text(error.responseJSON.errors.phone);
                    $('#emailEditError').text(error.responseJSON.errors.email);
                    $('#addressEditError').text(error.responseJSON.errors.address);
                }

            });
        })

        function deleteFournisseur(id) {
            if (confirm("Etes-vous sur de supprimer ce fournisseur")) {
                $.ajax({
                    type: "DELETE",
                    url: "@route('fournisseur.index')/" + id,
                    data: {
                        _token: "{{ Session::token() }}"
                    },
                    success: function() {
                        $('#fid').remove();
                        getAllFournisseur();

                    }
                });
            }
        }
    </script>
@endpush
