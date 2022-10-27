<div class="modal fade" id="modal-create" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form novalidate id="form-create">
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Contraseña" name="password"
                            id="password">
                    </div>
                    <div class="form-group">
                        <label>Repita contraseña</label>
                        <input type="password" class="form-control" placeholder="Repita contraseña" name="password2">
                    </div>
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" placeholder="Nombre" name="name">
                    </div>
                    <div class="form-group">
                        <label>Numero de celular</label>
                        <input type="text" class="form-control" placeholder="Numero de celular" name="cellphone">
                    </div>
                    <div class="form-group">
                        <label>Cedula</label>
                        <input type="text" class="form-control" placeholder="Cedula" name="cedula">
                    </div>
                    <div class="form-group">
                        <label>Fecha de nacimiento</label>
                        <input type="date" class="form-control" placeholder="Password" name="birthday">
                    </div>
                    <div class="form-group">
                        <label>Pais</label>
                        <select class="custom-select" onchange="getStates($(this).val())" name="country">
                            <option selected>Seleccione</option>
                            @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Estado</label>
                        <select class="custom-select" id="state" name="state" onchange="getCities($(this).val())">


                        </select>
                    </div>
                    <div class="form-group">
                        <label>Ciudad</label>
                        <select class="custom-select" id="city" name="city">

                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="$('#form-create').submit()">Guardar</button>
            </div>
        </div>
    </div>
</div>