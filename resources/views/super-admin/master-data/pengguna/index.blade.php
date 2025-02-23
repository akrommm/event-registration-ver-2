<x-module.super-admin>
    <h5 class="m-0 font-weight-bold text-dark" style="text-align:center; font-size: 25px">Data Pengguna</h5>
    <hr>
    <div class="card shadow-lg" style="margin: auto; border-radius: 10px;">
        <div class="card-body">
            <div class="table-responsive">
                <a href="" data-toggle="modal" data-target="#tambah-pengguna" class="float-right btn btn-dark ml-2"><i class="fas fa-plus"></i> Tambah Data</a>
                <table id="data-table" class="table table-datatable table-bordered">
                    <thead class="bg-dark">
                        <th style="color: white;" width=" 10px" class="text-center">No.</th>
                        <th style="color: white;" width=" 90px" class="text-center">Aksi</th>
                        <th style="color: white;" class="text-center">Nama Pengguna</th>
                    </thead>
                    <tbody>
                        @foreach ($list_user->sortByDesc('created_at')->values() as $user)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <x-template.button.info-button url="super-admin/pengguna" id="{{ $user->id }}" />
                                    <a href="#edit{{ $user->id }}" data-toggle="modal" class="btn btn-warning btn-interactive">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#hapus{{ $user->id }}" data-toggle="modal" class="btn btn-danger btn-interactive">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                            <td class="text-center">{{ $user->nama }}</td>
                        </tr>

                        <x-template.modal.modal-delete id="hapus{{ $user->id }}"
                            action="{{ url('super-admin/pengguna', $user->id) }}" />

                        <x-template.modal.modaledit id="edit{{ $user->id }}"
                            action="{{ url('super-admin/pengguna', $user->id) }}">

                            <div class="modal-content modal-lg">
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit Data Pengguna</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="" class="control-label">Nama Lengkap</label>
                                                @if ($errors->has('nama'))
                                                <label for="" class="label text-danger">{{ $errors->get('nama')[0] }}</label>
                                                @endif
                                                <input type="text" name="nama" class="form-control" value="{{ $user->nama }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="control-label">Username</label>
                                                @if ($errors->has('username'))
                                                <label for="" class="label text-danger">{{ $errors->get('username')[0] }}</label>
                                                @endif
                                                <input type="text" name="username" class="form-control" value="{{ $user->username }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="control-label">Email</label>
                                                @if ($errors->has('email'))
                                                <label for="" class="label text-danger">{{ $errors->get('email')[0] }}</label>
                                                @endif
                                                <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="control-label">Nomor HP</label>
                                                @if ($errors->has('no_hp'))
                                                <label for="" class="label text-danger">{{ $errors->get('no_hp')[0] }}</label>
                                                @endif
                                                <input type="number" name="no_hp" class="form-control" value="{{ $user->no_hp }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="control-label">Alamat</label>
                                                @if ($errors->has('alamat'))
                                                <label for="" class="label text-danger">{{ $errors->get('alamat')[0] }}</label>
                                                @endif
                                                <input type="text" name="alamat" class="form-control" value="{{ $user->alamat }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="" class="control-label">Foto</label>
                                            @if ($errors->has('foto'))
                                            <label for="" class="label text-danger">{{ $errors->get('foto')[0] }}</label>
                                            @endif
                                            <input type="file" name="foto" accept=".jpg, .png, .jpeg" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="" class="control-label">Password</label>
                                                @if ($errors->has('password'))
                                                <label for="" class="label text-danger">{{ $errors->get('password')[0] }}</label>
                                                @endif
                                                <input type="password" name="password" class="form-control">
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

    <!-- Modal Tambah Pengguna -->
    <div class="modal fade" id="tambah-pengguna">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Pengguna</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ url('super-admin/pengguna') }}" method="post" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="control-label">Nama Lengkap</label>
                                    @if ($errors->has('nama'))
                                    <label for="" class="label text-danger">{{ $errors->get('nama')[0] }}</label>
                                    @endif
                                    <input type="text" name="nama" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Username</label>
                                    @if ($errors->has('username'))
                                    <label for="" class="label text-danger">{{ $errors->get('username')[0] }}</label>
                                    @endif
                                    <input type="text" name="username" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Email</label>
                                    @if ($errors->has('email'))
                                    <label for="" class="label text-danger">{{ $errors->get('email')[0] }}</label>
                                    @endif
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Nomor HP</label>
                                    @if ($errors->has('no_hp'))
                                    <label for="" class="label text-danger">{{ $errors->get('no_hp')[0] }}</label>
                                    @endif
                                    <input type="number" name="no_hp" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Alamat</label>
                                    @if ($errors->has('alamat'))
                                    <label for="" class="label text-danger">{{ $errors->get('alamat')[0] }}</label>
                                    @endif
                                    <input type="text" name="alamat" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="" class="control-label">Foto</label>
                                @if ($errors->has('foto'))
                                <label for="" class="label text-danger">{{ $errors->get('foto')[0] }}</label>
                                @endif
                                <input type="file" name="foto" accept=".jpg, .png, .jpeg" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label">Password</label>
                                    @if ($errors->has('password'))
                                    <label for="" class="label text-danger">{{ $errors->get('password')[0] }}</label>
                                    @endif
                                    <input type="password" name="password" class="form-control" required>
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
    <!-- End Modal Tambah Pengguna -->
</x-module.super-admin>