@extends ('layouts.app')

@section('content')

<div class="container">

    <div>
        <h1>Movimiento Nuevo</h1>
        {!! Form::model(
            $movement = new App\Movement([
                'money'=>0.00
            ]),
            [
                'route' => 'movements.store',
                'files' => 'true'
            ]
        ) !!}
    
            @include('movements.partials.form')
    
        {!! Form::close() !!}
    </div>

</div>

    
@endsection