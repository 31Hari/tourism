@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Edit Hotel</h1>
    <form action="{{ route('admin.hotels.update', $hotel->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <h2>Hotel Details</h2>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $hotel->name }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ $hotel->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ $hotel->address }}">
                </div>
                <div class="form-group">
                    <label for="location_id">Location</label>
                    <select class="form-control" id="location_id" name="location_id">
                        <option value="">Select a location</option>
                        @foreach($locations as $location)
                            <option value="{{ $location->id }}" {{ $hotel->location_id == $location->id ? 'selected' : '' }}>
                                {{ $location->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="amenities">Amenities</label>
                    <textarea class="form-control" id="amenities" name="amenities" rows="3">{{ $hotel->amenities }}</textarea>
                </div>
                <div class="form-group">
                    <label for="policies">Policies</label>
                    <textarea class="form-control" id="policies" name="policies" rows="3">{{ $hotel->policies }}</textarea>
                </div>
            </div>

            <div class="col-md-6">
                <h2>Room Types</h2>
                <div id="room-types">
                    @foreach($hotel->roomTypes as $index => $roomType)
                        <div class="room-type mb-3">
                            <h3>Room Type {{ $index + 1 }}</h3>
                            <div class="form-group">
                                <label for="room_types[{{ $index }}][name]">Name</label>
                                <input type="text" class="form-control" name="room_types[{{ $index }}][name]" value="{{ $roomType->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="room_types[{{ $index }}][description]">Description</label>
                                <textarea class="form-control" name="room_types[{{ $index }}][description]" rows="2">{{ $roomType->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="room_types[{{ $index }}][capacity]">Capacity</label>
                                <input type="number" class="form-control" name="room_types[{{ $index }}][capacity]" value="{{ $roomType->capacity }}" required>
                            </div>
                            <div class="form-group">
                                <label for="room_types[{{ $index }}][price]">Price</label>
                                <input type="number" step="0.01" class="form-control" name="room_types[{{ $index }}][price]" value="{{ $roomType->price }}" required>
                            </div>
                            <input type="hidden" name="room_types[{{ $index }}][id]" value="{{ $roomType->id }}">
                        </div>
                    @endforeach
                </div>
                <button type="button" class="btn btn-secondary" id="add-room-type">Add Another Room Type</button>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update Hotel</button>
    </form>
</div>

<script>
    let roomTypeCount = {{ $hotel->roomTypes->count() }};
    document.getElementById('add-room-type').addEventListener('click', function() {
        const roomTypes = document.getElementById('room-types');
        const newRoomType = document.createElement('div');
        newRoomType.className = 'room-type mb-3';
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
