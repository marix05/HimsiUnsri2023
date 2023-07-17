@extends('layouts.admin.index')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 font-weight-bold text-dark">Staff HIMSI {{ date('Y') }}</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <small>{{ session('success') }}</small>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <small>{{ session('error') }}</small>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button class="btn btn-primary" data-toggle="modal" data-target="#insertStaff"><i class="fa fa-plus"></i> Insert Data</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Dinas</th>
                            <th>Jabatan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Dinas</th>
                            <th>Jabatan</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach($staffs as &$staff)
                            <?php $staff = get_object_vars($staff) ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td>{{ ucwords($staff['nama']) }}</td>
                                <td>{{ $staff['dinas'] }}</td>
                                <td>{{ $staff['jabatan'] }}</td>
                                <td>
                                    <button class="btn btn-warning" data-toggle="modal" data-target="#editStaff{{ $staff['staffID'] }}" <i class="fa fa-pen"></i> Edit</button>
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#deleteStaff{{ $staff['staffID'] }}" <i class="fa fa-trash"></i> Delete</button>
                                    <button class="btn btn-info" data-toggle="modal" data-target="#detailsStaff{{ $staff['staffID'] }}" <i class="fa fa-info"></i> Details</button>
                                </td>
                            </tr>

                            <!-- Edit Modal -->
                            <div class="modal" id="editStaff{{ $staff["staffID"] }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit Data Staff</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <form action="{{ route('update-staff') }}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <input type="hidden" class="form-control" value="{{ $staff["staffID"] }}" name="staffID" id="staffID">
                                                <div class="form-group">
                                                    <label for="nama">Nama</label>
                                                    <input type="text" name="nama" class="form-control" value="{{ $staff["nama"] }}" id="nama">
                                                    @error('nama')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="NIM">NIM</label>
                                                    <input type="text" name="NIM" class="form-control" value="{{ $staff["NIM"] }}" minlength="4" maxlength="14" id="NIM">
                                                    @error('NIM')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="dinasID">Dinas</label>
                                                    <select class="form-control" name="dinasID" id="dinasID">
                                                        <option value="" {{ $staff['dinasID'] === NULL ? 'selected' : '' }}></option>
                                                        @foreach ($dinass as $dinas)
                                                            <option value="{{ $dinas['dinasID'] }}" {{ $staff['dinasID'] === $dinas['dinasID'] ? 'selected' : '' }}>{{ $dinas['dinas'] }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('dinasID')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="divisiID">Divisi</label>
                                                    <select class="form-control" name="divisiID" id="divisiID">
                                                        <option value="" {{ $staff['divisiID'] === NULL ? 'selected' : '' }}></option>
                                                        @foreach ($divisis as $divisi)
                                                            <option value="{{ $divisi['divisiID'] }}" {{ $staff['divisiID'] === $divisi['divisiID'] ? 'selected' : '' }}>{{ $divisi['divisi'] }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('divisiID')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="tempat_lahir">Tempat Lahir</label>
                                                    <input type="text" name="tempat_lahir" class="form-control" value="{{ $staff["tempat_lahir"] }}" id="tempat_lahir">
                                                    @error('tempat_lahir')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                                    <input type="date" name="tanggal_lahir" class="form-control" value="{{ $staff["tanggal_lahir"] }}" id="tanggal_lahir">
                                                    @error('tanggal_lahir')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="gender">Jenis Kelamin</label>
                                                    <select class="form-control" name="gender" id="gender">
                                                        <option value="" disabled selected></option>
                                                        <option value="Laki-laki" {{ $staff['gender'] == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                                        <option value="Perempuan" {{ $staff['gender'] == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                                    </select>
                                                    @error('gender')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="angkatan">Angkatan</label>
                                                    <input type="text" name="angkatan" class="form-control" value="{{ $staff["angkatan"] }}" minlength="4" maxlength="4" id="angkatan">
                                                    @error('angkatan')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="jabatan">Jabatan</label>
                                                    <input type="text" name="jabatan" class="form-control" value="{{ $staff["jabatan"] }}" id="jabatan">
                                                    @error('jabatan')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="periode">Periode</label>
                                                    <input type="text" name="periode" class="form-control" value="{{ $staff["periode"] }}" minlength="4" maxlength="4" id="periode">
                                                    @error('periode')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" name="email" class="form-control" value="{{ $staff["email"] }}" id="email">
                                                    @error('email')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="instagram">Instagram</label>
                                                    <input type="text" name="instagram" class="form-control" value="{{ $staff["instagram"] }}" id="instagram">
                                                    @error('instagram')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="kesan_pesan">Kesan & Pesan</label>
                                                    <textarea name="kesan_pesan" id="kesan_pesan" class="form-control" cols="30" rows="5">{{ $staff["kesan_pesan"] }}</textarea>
                                                    @error('kesalan_pesan')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Edit Button -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Delete Modal -->
                            <div class="modal" id="deleteStaff{{ $staff["staffID"] }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Delete Data Staff</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            Apakah anda yakin ingin menghapus data {{ $staff['nama'] }}?
                                        </div>

                                        <form action="{{ route('delete-staff') }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" name="staffID" value="{{ $staff['staffID'] }}"><br>
                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button type="submit" name="hapus" class="btn btn-danger">Delete</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Details Modal -->
                            <div class="modal" id="detailsStaff{{ $staff["staffID"] }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <img src="{{ asset('assets/img/staffs/'.$staff['periode'].'/'.$staff['dinas'].'/'.$staff['foto']) }}" class="img-thumbnail text-center d-block" style="max-width: 300px; margin: auto; border:none" alt=""><br>
                                            <h5 class="font-weight-bold mt-2">{{ $staff['nama'] }}</h5>
                                            <h6 class="card-subtitle mb-2 text-muted">{{ $staff['dinas'] }} {{ $staff['divisi'] != NULL ? ' | '.$staff['divisi'].' | ' : ' | ' }} <?= $staff["jabatan"] ?> | <?= $staff["angkatan"] ?></h6>
                                            <ul class="list-group">
                                                <li class="list-group-item">Tempat Tanggal Lahir : {{ ucwords($staff['tempat_lahir']) . ", " . date('d F Y', strtotime($staff['tanggal_lahir'])) }}</li>
                                                <li class="list-group-item">Jenis Kelamin : {{ $staff['gender'] }}</li>
                                                <li class="list-group-item">Instagram : <a href="https://www.instagram.com/{{ $staff["instagram"] }}">{{ $staff["instagram"] }}</a></li>
                                                <li class="list-group-item">Email : <a href="mailto:{{ $staff["email"] }}">{{ $staff["email"] }}</a></li>
                                                <li class="list-group-item">
                                                    Kesan & Pesan :  <br>
                                                    {{ $staff["kesan_pesan"] }}
                                                </li>
                                            </ul>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <?php $no++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- Insert Modal -->
<div class="modal" id="insertStaff">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Data Staff</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <form action="{{ route('insert-staff') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" id="nama" required>
                        @error('nama')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="NIM">NIM</label>
                        <input type="text" name="NIM" class="form-control" value="{{ old('NIM') }}" minlength="14" maxlength="14" id="NIM">
                        @error('NIM')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="dinasID">Dinas</label>
                        <select class="form-control" name="dinasID" id="dinasID" required>
                            <option value=""></option>
                            @foreach ($dinass as $dinas)
                                <option value="{{ $dinas['dinasID'] }}" {{ old('dinasID') === $dinas['dinasID'] ? 'selected' : '' }}>{{ $dinas['dinas'] }}</option>
                            @endforeach
                        </select>
                        @error('dinasID')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="divisiID">Divisi</label>
                        <select class="form-control" name="divisiID" id="divisiID">
                            <option value=""></option>
                            @foreach ($divisis as $divisi)
                                <option value="{{ $divisi['divisiID'] }}" {{ old('divisiID') === $divisi['divisiID'] ? 'selected' : '' }}>{{ $divisi['divisi'] }}</option>
                            @endforeach
                        </select>
                        @error('divisiID')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir') }}" id="tempat_lahir" required>
                        @error('tempat_lahir')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir') }}" id="tanggal_lahir" required>
                        @error('tanggal_lahir')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="gender">Jenis Kelamin</label>
                        <select class="form-control" name="gender" id="gender">
                            <option value="" selected disabled></option>
                            <option value="Laki-laki" {{ old('gender') === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ old('gender') === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('gender')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="angkatan">Angkatan</label>
                        <input type="text" name="angkatan" class="form-control" value="{{ old('angkatan') }}" minlength="4" maxlength="4" id="angkatan" required>
                        @error('angkatan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" name="jabatan" class="form-control" value="{{ old('jabatan') }}" id="jabatan" required>
                        @error('jabatan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="periode">Periode</label>
                        <input type="text" name="periode" class="form-control" value="{{ old('periode') ?? date('Y') }}" minlength="4" maxlength="4" id="periode" required>
                        @error('periode')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" id="email" required>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="instagram">Instagram</label>
                        <input type="text" name="instagram" class="form-control" value="{{ old('instagram') }}" id="instagram" required>
                        @error('instagram')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Kesan & Pesan</label>
                        <textarea name="kesan_pesan" id="kesan_pesan" class="form-control" cols="30" rows="5">{{ old('kesan_pesan') }}</textarea>
                        @error('kesan_pesan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto">Profile Picture</label><br>
                        <div class="custom-file">
                            <input type="file" name="foto" class="custom-file-input" id="foto" accept="image/*" required>
                            <label class="custom-file-label" for="foto">Choose file</label>
                        </div>
                        @error('foto')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Edit Button -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="insert" class="btn btn-primary">Insert</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
