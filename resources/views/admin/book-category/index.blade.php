<x-admin-layout>
    <x-alerts/>
    <div class="w-100 d-flex align-items-center mb-3">
        <h2>Book categories</h2>
        <div class="ms-auto">
            <a href="{{ route('admin.book-category.create') }}" class="btn btn-primary">Add new</a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Thumbnail</th>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Books</th>
                        <th>Featured</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr> 
                </thead>
                <tbody>
                    @foreach ($bookCategories as $bookCategory)
                        <tr>
                            <td>
                                <img src="{{ $bookCategory->thumbnail_url }}" style="height: 150;width:80px; object-fit:cover;" alt="{{ $bookCategory->name }}" width="100">
                            </td>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $bookCategory->name }}</td>
                            <td>{{ $bookCategory->slug }}</td>
                            <td>{{ $bookCategory->books->count() }}</td>
                            <td>{{ $bookCategory->featured ? 'Yes' : 'No' }}</td>
                            <td>{{ $bookCategory->created_at }}</td>
                            <td>{{ $bookCategory->updated_at }}</td>
                            <td>
                                <a href="{{ route('admin.book-category.edit', $bookCategory->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('admin.book-category.destroy', $bookCategory->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this?')">Delete</button>
                                </form>
                            </td>
                        </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>