<x-module.super-admin>
    <h5 class="m-0 font-weight-bold text-dark" style="text-align:center; font-size: 25px"> Detail Module</h5>
    <hr>
    <x-template.button.back-button url="super-admin/module" />
    <div class="card shadow-lg" style="margin: auto; border-radius: 10px;">
        <div class="card-header">
            <a href="#edit{{ $module->id }}" data-toggle="modal" class="btn btn-warning btn-interactive btn-tone btn-sm mt-3 float-right"><i class="fas fa-edit"></i> Edit</a>
            <div class="card-title">
                Detail Module
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <dl class="row">
                        <dt class="col-4">NAMA APP</dt>
                        <dd class="col-8">{{ $module->app }}</dd>
                        <dt class="col-4">NAMA MODULE</dt>
                        <dd class="col-8">{{ $module->name }}</dd>
                        <dt class="col-4">TITLE</dt>
                        <dd class="col-8">{{ $module->title }}</dd>
                        <dt class="col-4">SUBTITLE</dt>
                        <dd class="col-8">{{ $module->subtitle }}</dd>
                    </dl>
                </div>
                <div class="col-md-5">
                    <dl class="row">
                        <dt class="col-4">TAG</dt>
                        <dd class="col-8">{{ $module->tag }}</dd>
                        <dt class="col-4">URL</dt>
                        <dd class="col-8">{{ $module->url }}</dd>
                        <dt class="col-4">BACKGROUND COLOR</dt>
                        <dd class="col-8">{{ $module->color }}</dd>
                        <dt class="col-4">MENU VIEW</dt>
                        <dd class="col-8">{{ $module->menu }}</dd>
                    </dl>
                </div>
                <div class="col-md-2">
                    <x-template.module-box url="{{ $module->url }}" color="{{ $module->color }}" title="{{ $module->title }}" subtitle="{{ $module->subtitle }}" />
                </div>
            </div>
        </div>
    </div>

    <br>

    <!-- Bagian Tambah Role Pengguna -->
    <div class="card shadow-lg" style="margin: auto; border-radius: 10px;">
        <div class="card-header">
            <div class="card-title">
                Pengguna
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ url('super-admin/module/add-role') }}" method="post">
                        @csrf
                        <input type="hidden" name="id_module" value="{{ $module->id }}">
                        <div class="form-group">
                            <select class="select2" name="id_user" style="width: 100%;">
                                <option selected="selected">Pilih Nama user</option>
                                @foreach ($list_user as $user)
                                <option value="{{ $user->id }}">{{ $user->nama }}</option>
                                @endforeach
                            </select>
                            <!-- <select name="id_user" class="form-control">
                                @foreach ($list_user as $user)
                                <option value="{{ $user->id }}">{{ $user->nama }}</option>
                                @endforeach
                            </select> -->
                        </div>
                        <div class="form-group">
                            <button class="btn btn-dark float-right">Simpan</button>
                        </div>
                    </form>
                </div>
                <div class="table-responsive">
                    <div class="col-md-12">
                        <br>
                        <table id="data-table" class="table table-datatable table-bordered">
                            <thead class="bg-dark">
                                <th style="color: white;" width="10px" class="text-center">No</th>
                                <th style="color: white;" width="100px" class="text-center">Aksi</th>
                                <th style="color: white;" class="text-center">Nama</th>
                            </thead>
                            <tbody>
                                @foreach ($module->role as $role)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('super-admin/module/delete-role', $role->id) }}" class="btn btn-danger btn-sm btn-interactive"><i class="fas fa-trash"></i></a>
                                    </td class="text-center">
                                    <td class="text-center">{{ $role->user->nama }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bagian Tambah Role Pengguna -->

    <!-- Bagian Modal Edit Module -->
    <x-template.modal.modaledit id="edit{{ $module->id }}"
        action="{{ url('super-admin/module', $module->id) }}">

        <div class="modal-content modal-lg">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data Module</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="control-label">APP</label>
                            <input type="text" name="app" value="{{ $module->app }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="control-label">Name</label>
                            <input type="text" name="name" value="{{ $module->name }}" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="control-label">Title</label>
                            <input type="text" name="title" value="{{ $module->title }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="control-label">Sub Title</label>
                            <input type="text" name="subtitle" value="{{ $module->subtitle }}" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="control-label">URL</label>
                            <input type="text" name="url" value="{{ $module->url }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="control-label">Color</label>
                            <input type="text" name="color" value="{{ $module->color }}" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="control-label">Tag</label>
                            <input type="text" name="tag" value="{{ $module->tag }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="control-label">Menu</label>
                            <input type="text" name="menu" value="{{ $module->menu }}" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger btn-interactive"
                    data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary btn-interactive">Simpan</button>
            </div>
        </div>
    </x-template.modal.modaledit>
    <!-- End Bagian Modal Edit Module -->
</x-module.super-admin>