<div class="modal modal-right fade quick-view" id="quick-view">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="p-4" style="display: flex; flex-wrap: wrap; justify-content: space-between; gap: 10px;">
                @foreach (auth()->user()->role as $role)
                <x-template.module-box color="{{ $role->module->color }}" url="{{ $role->module->url }}" title="{{ $role->module->title }}" subtitle="{{ $role->module->subtitle }}" />
                @endforeach
            </div>
        </div>
    </div>
</div>