@extends('layout.main')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin/post-seat') }}" method="POST" class="m-3">
                <div class="form-group">
                    <label for="room_id">Phòng:</label>
                    <select class="form-control" name="room_id" id="">
                        <option value="">Select...</option>
                        @foreach ($room as $index => $rom)
                            <option value="{{ $rom->id }}">{{ $rom->room_number }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="seat_type_id">Loại ghế:</label>
                    <select class="form-control" name="seat_type_id" id="">
                        <option value="">Select...</option>
                        @foreach ($seatTypes as $index => $seatTy)
                            <option value="{{ $seatTy->id }}">{{ $seatTy->type_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="seat_number">Số của ghế:</label>
                    <input type="number" class="form-control" id="seat_number" name="seat_number">
                </div>
                
                <input class="btn btn-outline-success mr-2" type="submit" name="add" value="THÊM">

                <a href="{{ route('admin/list-seat') }}"><button type="button" class="btn btn-info">Danh sách</button></a>
            </form>
        </div>
    </div>
@endsection
