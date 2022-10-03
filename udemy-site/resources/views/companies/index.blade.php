@extends('layouts.main')

@section('title', 'Contact App | All Companies')

@section('content')

    <!-- content -->
    <main class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-title">
                            <div class="d-flex align-items-center">
                                <h2 class="mb-0">All Companes</h2>
                                <div class="ml-auto">
                                    <a href="{{ route('companies.create') }}" class="btn btn-success"><i
                                            class="fa fa-plus-circle"></i> Add New</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            {{-- filter --}}
                            @include('companies._filter')
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Website</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Contacts</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($message = session('message'))
                                        <div class="alert alert-success" role="alert">
                                            {{ $message }}
                                        </div>
                                    @endif
                                    @if ($companies->count())
                                        @foreach ($companies as $index => $company)
                                            <tr>
                                                <th scope="row">{{ $index + $companies->firstItem() }}</th>
                                                <td>{{ $company->name }}</td>
                                                <td>{{ $company->address }}</td>
                                                <td>{{ $company->website }}</td>
                                                <td>{{ $company->email }}</td>
                                                <td>{{ $company->contacts_count }}</td>
                                                {{-- <td>
                                                    @if (isset($company->company->name))
                                                        {{ $company->company->name }}
                                                    @else
                                                        @dd($company)
                                                    @endif
                                                </td> --}}
                                                <td width="150">
                                                    <a href="{{ route('companies.show', $company->id) }}"
                                                        class="btn btn-sm btn-circle btn-outline-info" title="Show"><i
                                                            class="fa fa-eye"></i></a>
                                                    <a href="{{ route('companies.edit', $company->id) }}"
                                                        class="btn btn-sm btn-circle btn-outline-secondary"
                                                        title="Edit"><i class="fa fa-edit"></i></a>
                                                    <a href="{{ route('companies.destroy', $company->id) }}"
                                                        class="btn btn-sm btn-circle btn-outline-danger btn-delete" title="Delete"
                                                        ><i class="fa fa-times"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <form id="form-delete" action="" method="POST" style="display: none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    @endif
                                </tbody>
                            </table>
                            <div class="pagination justify-content-center">
                                {{ $companies->appends(request()->only('company_id'))->links() }}
                            </div>
                            {{-- {!! $companies->links() !!} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
