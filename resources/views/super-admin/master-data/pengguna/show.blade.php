<x-module.super-admin>
    <h5 class="m-0 font-weight-bold text-dark" style="text-align:center; font-size: 25px"> Detail Pengguna
    </h5>
    <hr>
    <x-template.button.back-button url="super-admin/pengguna" />
    <div class="row">
        <div class="col-md-3 mb-2">
            <div class="card shadow-lg" style="margin: auto; border-radius: 10px;">
                <div class="card-body">
                    @if ($user->foto)
                    <img src="{{ url($user->foto) }}" class="img-fluid" alt="">
                    @else
                    <img src="{{url('/')}}/assets/images/logo/profile.jpg" class="img-fluid" alt="">
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card shadow-lg" style="margin: auto; border-radius: 10px;">
                <div class="card-header">
                    <a href="#edit{{ $user->id }}" data-toggle="modal" class="btn btn-warning btn-interactive btn-tone btn-sm float-right mt-3"><i class="fas fa-edit"></i> Edit</a>
                    <div class="card-title">
                        Detail Pengguna
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-md-4">Nama Lengkap</dt>
                                <dd class="col-md-8">: {{ $user->nama }}</dd>
                                <dt class="col-md-4">No Handphone</dt>
                                <dd class="col-md-8">: {{ $user->no_hp }}</dd>
                                <dt class="col-md-4">Alamat</dt>
                                <dd class="col-md-8">: {{ $user->alamat }}</dd>
                            </dl>
                        </div>
                        <div class="col-md-6">
                            <dl class="row">
                                <dt class="col-md-4">Username</dt>
                                <dd class="col-md-8">: {{ $user->username }}</dd>
                                <dt class="col-md-4">Email</dt>
                                <dd class="col-md-8">: {{ $user->email }}</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bagian Modal Edit Pengguna -->
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
    <!-- End Bagian Modal Edit Pengguna -->
</x-module.super-admin>