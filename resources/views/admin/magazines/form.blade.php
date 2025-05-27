<div class="mb-3">
    <label class="form-label">Naslov</label>
    <input type="text" name="title" value="{{ old('title', $magazine->title ?? '') }}" class="form-control" required>
</div>

<div class="mb-3">
    <label class="form-label">Kategorija</label>
    <select name="category_id" class="form-control" required>
        <option value="">-- Izaberi kategoriju --</option>
        @foreach($categories as $cat)
            <option value="{{ $cat->id }}"
                {{ old('category_id', $magazine->category_id ?? '') == $cat->id ? 'selected' : '' }}>
                {{ $cat->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Opis</label>
    <textarea class="form-control summernote" id="description" name="description">{{ old('description', $magazine->description ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label class="form-label">Cena (RSD)</label>
    <input type="number" step="0.01" name="price" value="{{ old('price', $magazine->price ?? '') }}"
        class="form-control" required>
</div>

<div class="mb-3">
    <label class="form-label">Datum izdanja</label>
    <input type="date" name="release_date"
        value="{{ old('release_date', isset($magazine) ? $magazine->release_date->format('Y-m-d') : '') }}"
        class="form-control" required>
</div>

<div class="mb-3">
    <label class="form-label">Slika naslovnice</label>
    <input type="file" name="cover" class="form-control" {{ isset($magazine) ? '' : 'required' }}>
    @if(isset($magazine))
        <img src="{{ asset('storage/' . $magazine->cover) }}" width="100" class="mt-2">
    @endif
</div>

<div class="form-check mb-3">
    <input type="checkbox" class="form-check-input" name="featured" {{ old('featured', $magazine->featured ?? false) ? 'checked' : '' }}>
    <label class="form-check-label">Istaknuto</label>
</div>

<button class="btn btn-success">Sačuvaj</button>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        $('#summernote').summernote({
            height: 200
        });
    });
</script>
