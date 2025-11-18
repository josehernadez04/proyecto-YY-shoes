@extends('Templates.Dashboard')
@section('content')
    <section class="content">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Editar TipoDocumentos</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item">typedocument</li>
                            <li class="breadcrumb-item">Edit</li>
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
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                            </ul>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('TypeDocuments.Update', $typedocument->id) }}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="form-group c_form_group">
                                    <label for="Code">code</label>
                                    <input type="text" class="form-control" id="code" name="code"
                                        placeholder="code" value="{{ old('description') }}">
                                </div>
                                <div class="form-group c_form_group">
                                    <label for="description">Descripcion</label>
                                    <input type="description" class="form-control" id="description" name="description"
                                        placeholder="Descripcion" value="{{ old('description') }}">
                                </div>
                                <a href="{{ route('TypeDocuments.Index') }}">regresar</a>
                                <input type="submit" class="btn btn-primary" value="Guardar" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
@endsection
