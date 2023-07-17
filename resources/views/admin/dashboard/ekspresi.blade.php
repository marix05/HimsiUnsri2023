@extends('layouts.admin.index')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 font-weight-bold text-dark">Ekspresi</h1>
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
                            <th>Title</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach($posts as &$post)
                            <tr>
                                <td><?= $no; ?></td>
                                <td><a href="{{ $post['link'] }}" target="_blank">{{ ucwords($post['title']) }}</a></td>
                                <td>{{ $post['category'] }}</td>
                                <td>
                                    <button class="btn btn-warning" data-toggle="modal" data-target="#editPost{{ $post['postID'] }}" <i class="fa fa-pen"></i> Edit</button>
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#deletePost{{ $post['postID'] }}" <i class="fa fa-trash"></i> Delete</button>
                                </td>
                            </tr>

                            <!-- Edit Modal -->
                            <div class="modal" id="editPost{{ $post["postID"] }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit Data Ekspresi</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <form action="{{ route('update-ekspresi') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <input type="hidden" class="form-control" value="{{ $post["postID"] }}" name="postID" id="postID" required>
                                                <div class="form-group">
                                                    <label for="title">Title</label>
                                                    <input type="text" name="title" class="form-control" value="{{ $post["title"] }}" id="title" required>
                                                    @error('title')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="category">Category</label>
                                                    <select class="form-control" name="category" id="category" required>
                                                        <option value="" disabled></option>
                                                        <option value="Original Series" {{ $post['category'] == 'Original Series' ? 'selected' : '' }}>Original Series</option>
                                                        <option value="SI FEST Series" {{ $post['category'] == 'SI FEST Series' ? 'selected' : '' }}>SI FEST Series</option>
                                                        <option value="Special Series" {{ $post['category'] == 'Special Series' ? 'selected' : '' }}>Special Series</option>
                                                    </select>
                                                    @error('category')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="link">Link</label>
                                                    <input type="text" name="link" class="form-control" value="{{ $post["link"] }}" id="link" required>
                                                    @error('link')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="thumbail">Thumbnail</label> <br>
                                                    <img src="{{ asset('assets/img/uploads/'.$post['thumbnail']) }}" class="img-thumbnail img-preview" alt="...." style="max-width: 400px; width: 100%">
                                                    <div class="custom-file">
                                                        <input type="file" name="thumbnail" class="custom-file-input" accept="image/*" id="thumbnail" onchange="previewImg();">
                                                        <label class="custom-file-label" for="thumbnail">{{ $post['thumbnail'] }}</label>
                                                    </div>
                                                    @error('thumbnail')
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
                            <div class="modal" id="deletePost{{ $post["postID"] }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Delete Data Ekspresi</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            Apakah anda yakin ingin menghapus post {{ $post['title'] }}?
                                        </div>

                                        <form action="{{ route('delete-ekspresi') }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" name="postID" value="{{ $post['postID'] }}"><br>
                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button type="submit" name="hapus" class="btn btn-danger">Delete</button>
                                            </div>
                                        </form>
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
                <h4 class="modal-title">Insert Data Ekspresi</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <form action="{{ route('insert-ekspresi') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old("title") }}" id="title" required>
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" name="category" id="category" required>
                            <option value="" disabled selected></option>
                            <option value="Original Series" {{ old('category') == 'Original Series' ? 'selected' : '' }}>Original Series</option>
                            <option value="SI FEST Series" {{ old('category') == 'SI FEST Series' ? 'selected' : '' }}>SI FEST Series</option>
                            <option value="Special Series" {{ old('category') == 'Special Series' ? 'selected' : '' }}>Special Series</option>
                        </select>
                        @error('category')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="link">Link</label>
                        <input type="text" name="link" class="form-control" value="{{ old("link") }}" id="link" required>
                        @error('link')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="thumbail">Thumbnail</label> <br>
                        <div class="custom-file">
                            <input type="file" name="thumbnail" class="custom-file-input" accept="image/*" id="thumbnail">
                            <label class="custom-file-label" for="thumbnail">Choose file</label>
                        </div>
                        @error('thumbnail')
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
