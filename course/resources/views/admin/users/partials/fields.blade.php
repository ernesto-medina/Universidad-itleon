    <div class="form-group">
        {!! Form::label('first_name', 'Nombre') !!}
        {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('last_name', 'Apellido') !!}
        {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'Correo Electronico') !!}
        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Por favor inserta tu Email']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password', 'Contraseña') !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('type', 'Tipo de Usuario') !!}
        {!! Form::select('type', ['' => 'Seleccione el tipo', 'user' => 'Usuario', 'admin' => 'Administrador'], null, ['class' => 'form-control']) !!}
    </div>