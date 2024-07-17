@extends('layout.main')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-3">
    <div>
        <h1 class="h3 text-gray-800">Movie + Language</h1>
        <p class="mb-4">
            Luồng phim + ngôn ngữ
            <a target="_blank" href="https://datatables.net">KBK Movie</a>.
        </p>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('admin/edit-movLan/' . $movLan->id) }}" method="POST" class="m-3">
            <div class="form-group">
                <label for="nameMovie">Tên phim:</label>
                <select class="form-control" id="nameMovie" name="movie_id">
                    @foreach($movies as $movs)
                        <option value="{{ $movs->id }}" {{ $movs->id == $movLan->movie_id ? 'selected' : '' }}>
                            {{ $movs->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="nameLanguage">Thể loại phim:</label>
                <select class="form-control" id="nameLanguage" name="language_id">
                    @foreach($languages as $lans)
                        <option value="{{ $lans->id }}" {{ $lans->id == $movLan->language_id ? 'selected' : '' }}>
                            {{ $lans->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <br>
            <input class="btn btn-outline-success mr-2" type="submit" name="edit" value="SỬA">
            <a href="{{ route('admin/list-movLan') }}"><button type="button" class="btn btn-info">Danh sách</button></a>
        </form>
    </div>
</div>
@endsection