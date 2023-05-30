<x-admin-layout>
    {{-- layout for create book category using bootstrap dashboard card  without any slot--}}
    <div class=" d-flex">
        <div class="card mx-auto" style="min-width: 600px"> 
            <div class="card-header">
                <h2 >Add New Book</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.book.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Book name</label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter book name" value="{{ old('title') }}">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                     {{-- book category --}}
                     <div class="mb-3">
                        <label for="book_category_id" class="form-label">Category</label>
                        <select name="book_category_id" id="book_category_id" class="form-control @error('book_category_id') is-invalid @enderror">
                            @foreach ($categories as $ct)
                            <option value="{{ $ct->id }}">{{ $ct->name }}</option>
                            @endforeach
                        </select>
                        @error('featured')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="author" class="form-label">Author</label>
                        <input type="text" name="author" id="author" class="form-control @error('author') is-invalid @enderror" placeholder="Enter book author" value="{{ old('author') }}">
                        @error('author')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="file" class="form-label">PDF</label>
                        <input type="file" accept="application/pdf" name="file" id="file" class="form-control @error('file') is-invalid @enderror" placeholder="Enter book file" value="{{ old('file') }}">
                        @error('file')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="cover" class="form-label">Cover (Image : png, jpg)</label>
                        <input type="file" accept="image/png,image/jpg,image/jpeg" name="cover" id="cover" class="form-control @error('file') is-invalid @enderror" placeholder="Enter book cover" value="{{ old('cover') }}">
                        @error('cover')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    



                    <div class="mb-3">
                        <label for="publisher" class="form-label">Publisher</label>
                        <input type="text" name="publisher" id="publisher" class="form-control @error('publisher') is-invalid @enderror" placeholder="Enter book publisher" value="{{ old('publisher') }}">
                        @error('publisher')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    

                     {{-- featured --}}
                     <div class="mb-3">
                        <label for="featured" class="form-label">Featured</label>
                        <select name="featured" id="featured" class="form-control @error('featured') is-invalid @enderror">
                            <option value="1" {{ old('featured') == 1 ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ old('featured') == 0 ? 'selected' : '' }}>No</option>
                        </select>
                        @error('featured')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    {{-- Description --}}
                    <div class="mb-3">
                        <label for="description" class="form-label">Book description</label>
                        <textarea name="description" id="description" cols="30" rows="5" class="form-control @error('description') is-invalid @enderror" placeholder="Enter book category description">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                   
                    <button type="submit" class="btn btn-primary px-4">Add</button>
                </form>

            </div>
        </div>
    </div>


</x-admin-layout>