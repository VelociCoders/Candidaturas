<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Coder</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="nombre">Nombre<span class="required">*</span></label>
                        <input wire:model="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre">@error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="apellidos">Apellidos<span class="required">*</span></label>
                        <input wire:model="apellidos" type="text" class="form-control" id="apellidos" placeholder="Apellidos">@error('apellidos') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email<span class="required">*</span></label>
                        <input wire:model="email" type="text" class="form-control" id="email" placeholder="Email">@error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="teléfono">Teléfono<span class="required">*</span></label>
                        <input wire:model="teléfono" type="text" class="form-control" id="teléfono" placeholder="Teléfono">@error('teléfono') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_de_nacimiento">Fecha de nacimiento<span class="required">*</span></label>
                        <input wire:model="fecha_de_nacimiento" type="text" class="form-control" id="fecha_de_nacimiento" placeholder="Fecha De Nacimiento">@error('fecha_de_nacimiento') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="github">GitHub</label>
                        <input wire:model="github" type="text" class="form-control" id="github" placeholder="Github">@error('github') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Save</button>
            </div>
        </div>
    </div>
</div>
