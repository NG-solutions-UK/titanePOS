<div class="mb-3">
    <label>Name</label>

    <input type="text"
           name="name"
           class="form-control"
           value="{{ old('name', $location->name ?? '') }}">
</div>

<div class="mb-3">
    <label>Address</label>

    <input type="text"
           name="address"
           class="form-control"
           value="{{ old('address', $location->address ?? '') }}">
</div>

<div class="mb-3">
    <label>City</label>

    <input type="text"
           name="city"
           class="form-control"
           value="{{ old('city', $location->city ?? '') }}">
</div>

<div class="mb-3">
    <label>Country</label>

    <input type="text"
           name="country"
           class="form-control"
           value="{{ old('country', $location->country ?? '') }}">
</div>

<div class="mb-3">
    <label>Postcode</label>

    <input type="text"
           name="postcode"
           class="form-control"
           value="{{ old('postcode', $location->postcode ?? '') }}">
</div>

<div class="mb-3">
    <label>Latitude</label>

    <input type="text"
           name="latitude"
           class="form-control"
           value="{{ old('latitude', $location->latitude ?? '') }}">
</div>

<div class="mb-3">
    <label>Longitude</label>

    <input type="text"
           name="longitude"
           class="form-control"
           value="{{ old('longitude', $location->longitude ?? '') }}">
</div>