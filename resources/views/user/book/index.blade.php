<x-admin-layout>
        <x-alerts/>
        <div class="w-100 d-flex align-items-center mb-3">
            <h2>Books</h2>
            <div class="ms-auto">
                <a href="{{ route('admin.book.create') }}" class="btn btn-primary">Add book</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Cover</th>
                                <th>Name</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>PDF</th>
                                <th>Publisher</th>
                                <th>Status</th>
                                <th>Featured</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr> 
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ $book->s3_cover_url }}" style="height: 150;width:80px; object-fit:cover;" alt="{{ $book->name }}" width="100">
                                    </td>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->category->name }}</td>
                                    <td>
                                        <a href="{{ $book->s3_pdf_url }}" target="_blank">View</a>
                                    </td>
                                    <td>{{ $book->publisher }}</td>
                                    <td>{{ $book->status }}</td>
                                    <td>{{ $book->featured ? 'Yes' : 'No' }}</td>
                                    <td>{{ $book->created_at }}</td>
                                    <td>{{ $book->updated_at }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('admin.book.edit', $book->id) }}" class="btn btn-outline-primary btn-sm">View</a>
                                            <a href="{{ route('admin.book.edit', $book->id) }}" class="btn btn-primary btn-sm ms-2">Edit</a>
                                            <form action="{{ route('admin.book.destroy', $book->id) }}" method="POST" class="d-inline ms-2">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this?')">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr> 
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
                <div class="w-100 d-flex justify-content-end mt-3">
                    {{ $books->links('vendor.pagination.bootstrap')  }}
                </div>
            </div>
        </div>
    </x-admin-layout>