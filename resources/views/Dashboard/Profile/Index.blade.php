@extends('Templates.Dashboard')
@section('content')
    <section class="content">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Perfil</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item">Profile</li>
                            <li class="breadcrumb-item">Index</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </section>

    @include('Dashboard.Alerts.Success')
    @include('Dashboard.Alerts.Info')
    @include('Dashboard.Alerts.Question')
    @include('Dashboard.Alerts.Warning')
    @include('Dashboard.Alerts.Danger')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="account">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="card card-dark">
                                                <div class="card-header">
                                                    <h5 class="card-title">Foto de perfil</h5>
                                                </div>

                                                <div class="card-body text-center">
                                                    <img src="{{ auth()->user()->profilePhoto ? auth()->user()->profilePhoto->url : asset('images/logo.png') }}"
                                                        alt="foto de perfil" class="img-fluid rounded-circle mb-3"
                                                        style="width: 250px; height: 250px; object-fit: cover;">


                                                    <form action="{{ route('Profile.UpdateImage') }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')

                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" name="profile_img"
                                                                    class="custom-file-input" id="profile_img" required>
                                                                <label class="custom-file-label"
                                                                    for="profile_img">Seleccione un archivo</label>
                                                            </div>
                                                        </div>

                                                        <button class="btn btn-dark btn-block mt-3">
                                                            <i class="fas fa-upload"></i> Actualizar Foto
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- ACCOUNT DETAILS -->
                                        <div class="col-md-8">
                                            <div class="card card-dark">
                                                <div class="card-header">
                                                    <h5 class="card-title">Detalles del Perfil</h5>
                                                </div>

                                                <div class="card-body">
                                                    <form>
                                                        <div class="form-group">
                                                            <label for="name">Nombre del usuario</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ auth()->user()->name }}" disabled>
                                                        </div>

                                                        <div class="row mt-3">
                                                            {{-- <div class="col-md-6">
                                                                <label for="position">Cargo</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ auth()->user()->position }}" disabled>
                                                            </div> --}}

                                                            <div class="col-md-6">
                                                                <label for="phone">Teléfono</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ auth()->user()->phone }}" disabled>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="birthday">Fecha de nacimiento</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ auth()->user()->birthdate }}" disabled>
                                                            </div>


                                                        </div>

                                                        <div class="row mt-3">
                                                            <div class="col-md-6">
                                                                <label for="email">Correo electrónico</label>
                                                                <input type="email" class="form-control"
                                                                    value="{{ auth()->user()->email }}" disabled>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label for="address">Dirección</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ auth()->user()->address }}" disabled>
                                                            </div>
                                                        </div>                                                        
                                                    </form>

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <!-- TAB COMMENTS -->
                                <div class="tab-pane" id="comments">
                                    <p>No comments yet...</p>
                                </div>

                                <!-- TAB SECURITY -->
                                <div class="tab-pane" id="security">
                                    <p>Security settings coming soon...</p>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    document.getElementById('profile_img').addEventListener('change', function(e) {
    let file = e.target.files[0];
    if (!file) return;
    e.target.nextElementSibling.innerHTML = file.name;
    let maxSize = 5 * 1024 * 1024;
    if (file.size > maxSize) {
    toastr.error("El archivo supera los 5 MB", "Archivo demasiado grande");
    e.target.value = "";
    e.target.nextElementSibling.innerHTML = "Seleccione un archivo";
    }
    });
@endsection
