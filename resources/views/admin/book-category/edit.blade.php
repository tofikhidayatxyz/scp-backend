<x-admin-layout>
    {{-- Edit bok category --}}
    <div class=" d-flex">
        <div class="card mx-auto" style="min-width: 600px"> 
            <div class="card-header">
                <h2 >Edit Book Category</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.book-category.update', $bookCategory->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Book Category Name</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter book category name" value="{{ old('name', $bookCategory->name) }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                     {{-- featured --}}
                     <div class="mb-3">
                        <label for="featured" class="form-label">Featured</label>
                        <select name="featured" id="featured" class="form-control @error('featured') is-invalid @enderror">
                            <option value="1" {{ old('featured', $bookCategory->featured) == 1 ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ old('featured', $bookCategory->featured) == 0 ? 'selected' : '' }}>No</option>
                        </select>
                        @error('featured')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    {{-- Description --}}
                    <div class="mb-3">
                        <label for="description" class="form-label">Book Category Description</label>
                        <textarea name="description" id="description" cols="30" rows="5" class="form-control @error('description') is-invalid @enderror" placeholder="Enter book category description">{{ old('description', $bookCategory->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

            </div>
        </div>
</x-admin-layout>