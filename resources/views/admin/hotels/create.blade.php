@extends('admin.layouts.app')

@section('title', 'Create New Hotel')

@section('content')
<div class="container">
    <h1 class="mb-4">Create New Hotel</h1>
    <form action="{{ route('admin.hotels.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="row">
            <div class="col-md-6">
                <h2 class="mt-4 mb-4">Hotel Details</h2>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="location_id">Location</label>
                    <select class="form-control" id="location_id" name="location_id">
                        <option value="">Select a location</option>
                        @foreach($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="amenities">Amenities</label>
                    <textarea class="form-control" id="amenities" name="amenities" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="policies">Policies</label>
                    <textarea class="form-control" id="policies" name="policies" rows="3"></textarea>
                </div>

                <h2 class="mt-4">Images</h2>
                <div class="row mb-3">
                    @for ($i = 1; $i <= 4; $i++)
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image{{ $i }}">Image {{ $i }}</label>
                                <input type="file" class="form-control-file" id="image{{ $i }}" name="image{{ $i }}">
                            </div>
                        </div>
                    @endfor
                </div>
            </div>

            <div class="col-md-6">
                <h2 class="mt-4 mb-4">Room Types</h2>
                <div id="room-types">
                    <div class="room-type">
                        <h3>Room Type 1</h3>
                        <div class="form-group">
                            <label for="room_types[0][name]">Name</label>
                            <input type="text" class="form-control" name="room_types[0][name]" required>
                        </div>
                        <div class="form-group">
                            <label for="room_types[0][description]">Description</label>
                            <textarea class="form-control" name="room_types[0][description]" rows="2"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="room_types[0][capacity]">Capacity</label>
                            <input type="number" class="form-control" name="room_types[0][capacity]" required>
                        </div>
                        <div class="form-group">
                            <label for="room_types[0][price]">Price</label>
                            <input type="number" step="0.01" class="form-control" name="room_types[0][price]" required>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary" id="add-room-type">Add Another Room Type</button>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Create Hotel</button>
    </form>
</div>

<script>
    let roomTypeCount = 1;
    document.getElementById('add-room-type').addEventListener('click', function() {
        const roomTypes = document.getElementById('room-types');
        const newRoomType = document.createElement('div');
        newRoomType.className = 'room-type mt-3';
        newRoomType.innerHTML = `
            <h3>Room Type ${roomTypeCount + 1}</h3>
            <div class="form-group">
                <label for="room_types[${roomTypeCount}][name]">Name</label>
                <input type="text" class="form-control" name="room_types[${roomTypeCount}][name]" required>
            </div>
            <div class="form-group">
                <label for="room_types[${roomTypeCount}][description]">Description</label>
                <textarea class="form-control" name="room_types[${roomTypeCount}][description]" rows="2"></textarea>
            </div>
            <div class="form-group">
                <label for="room_types[${roomTypeCount}][capacity]">Capacity</label>
                <input type="number" class="form-control" name="room_types[${roomTypeCount}][capacity]" required>
            </div>
            <div class="form-group">
                <label for="room_types[${roomTypeCount}][price]">Price</label>
                <input type="number" step="0.01" class="form-control" name="room_types[${roomTypeCount}][price]" required>
            </div>
        `;
        roomTypes.appendChild(newRoomType);
        roomTypeCount++;
    });
</script>
@endsection
