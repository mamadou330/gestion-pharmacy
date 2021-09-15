@extends('layouts.app')
@push('page_css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush
@section('content')
<section class="content">

    <div class="container-fluid">
        <button type="button" class="btn btn-primary my-2" id="addFournisseur" data-toggle="modal"
            data-target="#fournisseurModal" data-whatever="@fat"><i class="fas fa-users mx-1"></i> Fournisseurs</button>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tous les fournisseurs</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="fournisseurTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Adresse</th>
                                    <th>Email</th>
                                    <th>Téléphone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="data">
                                @foreach ($fournisseurs as $fournisseur)
                                <tr>
                                    <td>{{ $fournisseur->id }}</td>
                                    <td>{{ $fournisseur->name }}</td>
                                    <td>{{ $fournisseur->address }}</td>
                                    <td>{{ $fournisseur->email }}</td>
                                    <td>{{ $fournisseur->phone }}</td>
                                    <td class="text-right py-0 align-middle action">
                                        <div class="btn-group btn-group-sm">
                                            <a href="javascript:void(0)" role="button"
                                                class="btn btn-primary btn-xs viewFournisseur" data-toggle="modal"
                                                data-target=".bs-show-modal-lg"><i class="fa fa-folder-open"
                                                    data-toggle="tooltip" data-placement="top" title="Voir"></i></a>
                                            <a href="javascript:void(0)" role="button"
                                                class="btn btn-info btn-xs editFournisseur" data-bs-toggle="modal"
                                                data-bs-target="#fournisseurEditModal" data-bs-whatever="@fat"
                                                onclick="editFournisseur({{ $fournisseur->id }})" data-backdrop="static"
                                                data-keyboard="false">
                                                <i class="fas fa-pen" data-toggle="tooltip" data-placement="top"
                                                    title="Modifier"></i>
                                            </a>
                                            <a href="javascript:void(0)" role="button"
                                                class="btn btn-danger btn-xs deleteFounisseur" data-method="DELETE"
                                                data-confirm="Etes-vous sûr"><i class="fas fa-trash"
                                                    data-toggle="tooltip" data-placement="left"
                                                    title="Supprimer"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>

                            </tfoot>
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

<!-- Small modal -->

{{-- BEGIN ADD FOUNISSEUR MODAL --}}
<div class="modal fade" id="fournisseurModal" tabindex="-1" aria-labelledby="fournisseurModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <form action="@route('fournisseur.store')" method="POST" id="founisseurForm">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title justify-content-beetween" id="fournisseurModalLabel"><i
                            class="ml-2 fas fa-users"></i><span
                            class="badge badge-pill badge-info text-center bg-indigo text-center mx-2 p-2">Ajouter un
                            fournisseur </span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">@</span>
                        </div>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" placeholder="Nom fournisseur">
                        <span id="nameError" class="text-danger"></span>

                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="+224 620-82-38-77">
                        <span id="phoneError" class="text-danger"></span>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-globe"></i></span>
                        </div>
                        <input type="text" name="address" class="form-control" id="address" placeholder="Adresse">
                        <span id="addressError" class="text-danger"></span>

                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                        <span id="emailError" class="text-danger"></span>

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
{{-- END ADD FOUNISSEUR MODAL --}}

{{-- BEGIN EDIT FOURNISSEUR MODAL --}}
<div class="modal fade" id="fournisseurEditModal" tabindex="-1" aria-labelledby="fournisseurEditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <form action="@route('fournisseur.update', $fournisseur)" method="POST" id="founisseurForm">
            @csrf
            <input type="hidden" name="id" id="id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title justify-content-beetween" id="fournisseurEditModalLabel"><i
                            class="ml-2 fas fa-users"></i><span
                            class="badge badge-pill badge-info text-center bg-indigo text-center mx-2 p-2">Modifier le fournisseur</span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">@</span>
                        </div>
                        <input type="text" name="nameEdit" id="nameEdit"
                            class="form-control @error('nameEdit') is-invalid @enderror">
                        <span id="nameEditError" class="text-danger"></span>

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
                        <span id="addressEditError" class="text-danger"></span>

                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" name="emailEdit" id="emailEdit" class="form-control"> 
                        <span id="emailEditError" class="text-danger"></span>

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
{{-- END EDIT FOURNISSEUR MODAL --}}
@endsection

@push('page_scripts')
<!-- DataTables  & Plugins -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<script>
    $(function () {
            $("#fournisseur").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#fournisseur_wrapper .col-md-6:eq(0)');

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

    $('#addFournisseur').click(function() {
        $('#nameError').html('');
        $('#phoneError').html('');
        $('#addressError').html('');
        $('#emailError').html('');
    });

    $('#founisseurForm').submit(function(e) {
        e.preventDefault();

        let form = this;
        let token = "{{ Session::token() }}"
        let name = $('#name').val();
        let phone = $('#phone').val();
        let address = $('#address').val();
        let email = $('#email').val();

        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            dataType: "json",
            // type: "POST",
            // data:{
            //     _token: token,
            //     name: name,
            //     phone: phone,
            //     address: address,
            //     email: email,
            // },
            data: new FormData(this),
            processData:false,
            contentType: false,
            success: function(response) 
            {
                if(response) 
                {
                    if(response.address === null) {
                        response.address = "Pas d'adresse"
                    } 
                    if(response.email === null) {
                        response.email = 'Fournisseur@gmail.com'
                    }

                    $('#fournisseurTable tbody').prepend(
                        '<tr><td>' 
                            + response.id + '</td><td>' 
                            + response.name + '</td><td>' 
                            + response.address + '</td><td>'
                            + response.email + '</td><td>'
                            + response.phone + '</td><td class="text-right py-0 align-middle action">'
                            +'<div class="btn-group btn-group-sm">'                         
                                +' <button type="submit" class="btn btn-primary btn-xs viewFournisseur" data-toggle="modal" data-target=".bs-show-modal-lg"><i class="fa fa-folder-open" data-toggle="tooltip" data-placement="top" title="Voir"></i></button>'
                                + '<button type="submit" class="btn btn-info btn-xs editFournisseur" data-toggle="modal" data-target=".bs-editorder-modal-lg" data-backdrop="static" data-keyboard="false"><i class="fas fa-pen" data-toggle="tooltip" data-placement="top" title="Modifier"></i></button>' 
                                + '<button type="submit" class="btn btn-danger btn-xs deleteFournisseur"  data-method="DELETE" data-confirm="Etes-vous sûr"><i class="fas fa-trash" data-toggle="tooltip" data-placement="left" title="Supprimer"></i></button>'
                            +'</div>'
                            + '</td></tr>'
                    );
                    $('#nameError').html('');
                    $('#phoneError').html();
                    $('#addressError').html();
                    $('#emailError').html();

                    $('#founisseurForm')[0].reset();
                    $('#founisseurForm').trigger('reset');
                    $('#fournisseurModal').modal('hide');
                    // window.location.reload();

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
    

</script>
@endpush