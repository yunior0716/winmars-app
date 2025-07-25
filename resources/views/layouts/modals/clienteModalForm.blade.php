
    <div class="mb-3">
        <label for="nomcli">Nombre</label>
        <input type="text" class="form-control" name="nomcli" value="{{ old('mnomcli') }}" id="mnomcli" placeholder="Ingrese el nombre...">
        @error('nomcli')
            @include('layouts.partials.messages')
        @enderror
    </div>

    <div class="mb-3">
        <label for="apecli">Apellido</label>
        <input type="text" class="form-control" name="apecli" value="{{ old('mapecli') }}" id="mapecli" placeholder="Ingrese el apellido...">
        @error('apecli')
        @include('layouts.partials.messages')
    @enderror
    </div>

    <div class="mb-3">
        <label for="tecli1">Teléfono 1</label>
        <input type="tel" class="form-control" name="tecli1" id="mtecli1" value="{{ old('mtecli1') }}" placeholder="Ingrese el teléfono 1...">
        @error('tecli1')
        @include('layouts.partials.messages')
    @enderror
    </div>

    <div class="mb-3">
        <label for="tecli2">Teléfono 2</label>
        <input type="tel" class="form-control" name="tecli2" id="mtecli2" value="{{ old('mtecli2') }}" placeholder="Ingrese el teléfono 2...">
        @error('tecli2')
        @include('layouts.partials.messages')
    @enderror
    </div>

    <div class="mb-3">
        <label for="dircli">Dirección</label>
        <input type="text" class="form-control" name="dircli" id="mdircli" value="{{ old('mdirccli') }}" placeholder="Ingrese la dirección...">
        @error('dircli')
        @include('layouts.partials.messages')
    @enderror
    </div>

    <div class="mb-3">
        <label for="corcli">Correo Electrónico</label>
        <input type="text" class="form-control" name="corcli" id="mcorcli" value="{{ old('mcorcli') }}" placeholder="Ingrese el correo electrónico...">
        @error('corcli')
        @include('layouts.partials.messages')
    @enderror
    </div>

    <div class="mb-3">
        <label for="cedrnc">Cédula/RNC</label>
        <input type="text" class="form-control" name="cedrnc" id="mcedrnc" value="{{ old('mcedrnc') }}" placeholder="Ingrese la cédula/RNC...">
        @error('cedrnc')
        @include('layouts.partials.messages')
    @enderror
    </div>

    <input type="hidden" class="form-control" name="codtpcli" id="mcodtpcli" value="1">

    <input type="hidden" class="form-control" name="estcli" id="mestcli" value="activo">

    <div class="button-group">
        <button type="reset" class="btn btn-primary"><i class="fa-solid fa-arrow-rotate-left"></i> Reset</button>
        <button class="btn btn-primary" id="enviarCliente"><i class="fa-solid fa-floppy-disk"></i> Save</button>
    </div>
    