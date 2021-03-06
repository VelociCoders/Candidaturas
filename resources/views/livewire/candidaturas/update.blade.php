<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Actualizar candidatura</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input wire:model="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre">@error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Apellidos</label>
                        <input wire:model="apellidos" type="text" class="form-control" id="apellidos" placeholder="Apellidos">@error('apellidos') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_de_nacimiento">Fecha de nacimiento</label>
                        <input wire:model="fecha_de_nacimiento" type="text" class="form-control" id="fecha_de_nacimiento" placeholder="Fecha de nacimiento">@error('fecha_de_nacimiento') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="nacionalidad">Nacionalidad</label>
                        <input wire:model="nacionalidad" type="text" class="form-control" id="nacionalidad" placeholder="Nacionalidad">@error('nacionalidad') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input wire:model="email" type="text" class="form-control" id="email" placeholder="Email">@error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="teléfono">Teléfono</label>
                        <input wire:model="teléfono" type="text" class="form-control" id="teléfono" placeholder="Teléfono">@error('teléfono') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="cuenta_usuario">Cuenta de usuario</label>
                        <input wire:model="cuenta_usuario" type="text" class="form-control" id="cuenta_usuario" placeholder="Cuenta de usuario">@error('cuenta_usuario') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="puntos"></label>
                        <input wire:model="puntos" type="text" class="form-control" id="puntos" placeholder="Puntos">@error('puntos') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="descripción">Descripción</label>
                        <input wire:model="descripción" type="text" class="form-control" id="descripción" placeholder="Descripción">@error('descripción') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_de_registro">Fecha de registro</label>
                        <input wire:model="fecha_de_registro" type="text" class="form-control" id="fecha_de_registro" placeholder="Fecha de registro">@error('fecha_de_registro') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="promo_id"></label>
                        <input wire:model="promo_id" type="text" class="form-control" id="promo_id" placeholder="Promo Id">@error('promo_id') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>  
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Guardar</button>
            </div>
       </div>
    </div>
</div>
