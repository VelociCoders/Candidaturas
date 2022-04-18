<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Crear nueva escuela</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
                    <div class="form-group">
                        <label for="name">Nombre<span class="required">*</span></label>
                        <input wire:model="name" type="text" class="form-control" id="name" placeholder="Nombre" required>@error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="province">Provincia<span class="required">*</span></label>
                        <input wire:model="province" type="text" class="form-control" id="province" placeholder="Provincia" required>@error('province') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Imagen<span class="required">*</span></label>
                        <input wire:model="image" type="file" class="form-control" id="image" name="image" placeholder="Imagen" required>@error('image') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                </form>
                <div>
                    <span class="required">* Campos requeridos</span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cancelar</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Guardar</button>
            </div>
        </div>
    </div>
</div>
