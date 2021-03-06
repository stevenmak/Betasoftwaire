@extends('layouts.app')

@section('title', 'creerDepenses')
@section('module')
GESTION COMPTABILITE ET FINANCE
@endsection
@section('description')
    Module de Gestion des depenses
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Effectuer une depense</strong>
            </div>
            @if (count($errors) > 0)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <div class="d-flex">
                        <strong>Whoops!</strong>Veillez verifier les données saisies<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                </div>
            @endif
            <div class="card-body">
                {!! Form::model($depenses, ['method' => 'PATCH','route' => ['depenses.update', $depenses->id]]) !!}
                <div class="row row-sm">
                    <div class="form-group col-6">
                        <label>Reference Depense</label>
                        {!! Form::text('reference', null, array('placeholder' => 'refernce devis','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Reference devis</label>
                        {!! Form::select('devis_id', App\Devis::pluck('reference','id') , null, array('class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Date depense</label>
                        {!! Form::text('datedepense', null, array('class' => 'form-control','type'=>'datetime-local','id'=>'example-datetime-local-input'))  !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Nom Projet</label>
                        {!! Form::select('projet_id', App\Projets::pluck('nomProjet','id') , null, array('class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Etape projet</label>
                        {!! Form::select('etape_id', App\Etapes::pluck('nomEtape','id') , null, array('class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Tache</label>
                        {!! Form::select('tache_id', App\Taches::pluck('designation','id') , null, array('class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Service</label>
                        {!! Form::select('service_id', App\Services::pluck('designation','id') , null, array('placeholder' => '','class' => 'form-control')) !!}
                    </div>

                    <div class="form-group col-6">
                        <label>Montant depensés</label>
                        {!! Form::text('montant', null, array('placeholder' => 'Montant','class' => 'form-control','step' => '0.00')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Libelle</label>
                        {!! Form::text('libelle', null, array('placeholder' => 'Libelle depense','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label>Description</label>
                        {!! Form::text('description', null, array('placeholder' => 'Descritipon','class' => 'form-control')) !!}
                    </div>
                    <div class="form-group col-6">
                        <label></label>
                        <input type="hidden" class="form-control"  name="users_id" required value="{{ auth()->user()->id }}">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Envoyez</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
