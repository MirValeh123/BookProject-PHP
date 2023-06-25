@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <a href="{{ route('admin.kateqori.create') }}" class="btn btn-success">Yeni Kateqori Ekle</a>

                    @if (session('status'))
                        <div class="alert alert-primary">{{ session('status') }}</div>
                    @endif
                    <div class="card">

                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Kateqori tablosu</h4>
                            {{-- <p class="card-category"> Here is a subtitle for this table</p> --}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <th>
                                            N0
                                        </th>
                                        <th>
                                            Name
                                        </th>

                                        <th>
                                            Edit
                                        </th>
                                        <th>
                                            Delete
                                        </th>

                                    </thead>
                                    @if ($data)
                                        @foreach ($data as $value)
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        {{ $value['id'] }}
                                                    </td>
                                                    </td>
                                                    <td>
                                                        {{ $value['name'] }}
                                                    </td>

                                                    <td>
                                                        <div style="display:flex;justify-content:center;width:300px"
                                                        class="alert alert-success">
                                                        <a
                                                            href="{{ route('admin.kateqori.edit', ['id' => $value['id']]) }}">
                                                            Edit

                                                        </a>
                                                    </div>
                                                    </td>
                                                    </td>

                                                    <td>
                                                        <div style="display:flex;justify-content:center;width:300px"
                                                            class="alert alert-danger">
                                                            <a
                                                                href="{{ route('admin.kateqori.delete', ['id' => $value['id']]) }}">
                                                                Delete

                                                            </a>
                                                        </div>
                                                    </td>

                                                </tr>

                                            </tbody>
                                        @endforeach
                                    @else
                                        <div class="alert alert-danger">Data not found!</div>
                                    @endif
                                </table>
                                {{-- <table id="userDataList" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>First name</th>
                                            <th>Last name</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Country</th>
                                            <th>Created</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>First name</th>
                                            <th>Last name</th>
                                            <th>Email</th>
                                            <th>Gender</th>
                                            <th>Country</th>
                                            <th>Created</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div> --}}
                            <div class="col-12" style="display: flex;justify-content:flex-end">
                                <div class="btn btn-primary col-3">
                                    <button style="    border: none;
                                    background: none;"
                                        type="submit"><a
                                            style="color: white;
                                        font-size: 16px;"
                                            href="{{ route('admin.kateqori.create') }}">Add</a></button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#userDataList').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "PhpProject\fetchData.php"
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
@endsection
