<x-module.super-admin>
    <h5 class="m-0 font-weight-bold text-dark" style="text-align:center; font-size: 25px"> Data Module</h5>
    <hr>
    <div class="card shadow-lg" style="margin: auto; border-radius: 10px;">
        <div class="card-body">
            <div class="table-responsive">
                <a href="" data-toggle="modal" data-target="#tambah-module" class="float-right btn btn-dark ml-2"><i class="fas fa-plus"></i> Tambah Module</a>
                <table id="data-table" class="table table-datatable table-bordered">
                    <thead class="bg-dark">
                        <th style="color: white;" width="10px" class="text-center">No.</th>
                        <th style="color: white;" width="90px" class="text-center">Aksi</th>
                        <th style="color: white;" class="text-center">Nama Module</th>
                        <th style="color: white;" class="text-center">Tag</th>
                        <th style="color: white;" class="text-center">Jumlah Pengguna</th>
                    </thead>
                    <tbody>
                        @foreach ($list_module->sortByDesc('created_at')->values() as $module)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>
                                <div class="btn-group">
                                    <x-template.button.info-button url="super-admin/module" id="{{ $module->id }}" />
                                    <a href="#edit{{ $module->id }}" data-toggle="modal" class="btn btn-warning btn-interactive">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#hapus{{ $module->id }}" data-toggle="modal" class="btn btn-danger btn-interactive">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                            <td class="text-center">{{ $module->name }}</td>
                            <td class="text-center">{{ $module->tag }}</td>
                            <td class="text-center">{{ $module->role_count }}</td>
                        </tr>

                        <x-template.modal.modal-delete id="hapus{{ $module->id }}"
                            action="{{ url('super-admin/module', $module->id) }}" />

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
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Module -->
    <div class="modal fade" id="tambah-module">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Module</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ url('super-admin/module') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">APP</label>
                                    @if ($errors->has('app'))
                                    <label for="" class="label text-danger">{{ $errors->get('app')[0] }}</label>
                                    @endif
                                    <input type="text" name="app" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Name</label>
                                    @if ($errors->has('name'))
                                    <label for="" class="label text-danger">{{ $errors->get('name')[0] }}</label>
                                    @endif
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Title</label>
                                    @if ($errors->has('title'))
                                    <label for="" class="label text-danger">{{ $errors->get('title')[0] }}</label>
                                    @endif
                                    <input type="text" name="title" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Sub Title</label>
                                    @if ($errors->has('subtitle'))
                                    <label for="" class="label text-danger">{{ $errors->get('subtitle')[0] }}</label>
                                    @endif
                                    <input type="text" name="subtitle" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">URL</label>
                                    @if ($errors->has('url'))
                                    <label for="" class="label text-danger">{{ $errors->get('url')[0] }}</label>
                                    @endif
                                    <input type="text" name="url" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Color</label>
                                    @if ($errors->has('color'))
                                    <label for="" class="label text-danger">{{ $errors->get('color')[0] }}</label>
                                    @endif
                                    <input type="text" name="color" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Tag</label>
                                    @if ($errors->has('tag'))
                                    <label for="" class="label text-danger">{{ $errors->get('tag')[0] }}</label>
                                    @endif
                                    <input type="text" name="tag" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Menu</label>
                                    @if ($errors->has('menu'))
                                    <label for="" class="label text-danger">{{ $errors->get('menu')[0] }}</label>
                                    @endif
                                    <input type="text" name="menu" class="form-control">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-dark float-right btn-interactive">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Tambah Module -->
</x-module.super-admin>