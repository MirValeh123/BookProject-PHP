@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <a href="{{route('admin.slider.create')}}" class="btn btn-success" >Add New Slider</a>

                    @if (session('status'))
                        <div class="alert alert-primary">{{ session('status') }}</div>
                    @endif
                    <div class="card">

                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Slider Table</h4>
                            {{-- <p class="card-category"> Here is a subtitle for this table</p> --}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        
                                        <th>
                                            Image
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
                                                    
                                                    </td>
                                                    <td>
                                                        <img src="{{ asset('images/'.$value['image']) }}"  style="height:100px;width:300px" alt="" srcset="">
                                                    </td>

                                                    <td>
                                                        <div style="display:flex;justify-content:center;width:300px"
                                                        class="alert alert-success">
                                                        <a
                                                            href="{{ route('admin.slider.edit', ['id' => $value['id']]) }}">
                                                            Edit

                                                        </a>
                                                    </div>
                                                    </td>
                                                    </td>

                                                    <td>
                                                        <div style="display:flex;justify-content:center;width:300px"
                                                            class="alert alert-danger">
                                                            <a
                                                                href="{{ route('admin.slider.delete', ['id' => $value['id']]) }}">
                                                                Delete

                                                            </a>
                                                        </div>
                                                    </td>

                                                </tr>

                                            </tbody>
                                        @endforeach
                                    @else
                                        <div class="alert alert-danger">Data Not Found!</div>
                                    @endif
                                </table>
                            </div>
                            {{-- <div class="col-12" style="display: flex;justify-content:flex-end">
                                <div class="btn btn-primary col-3">
                                    <button style="    border: none;
                                    background: none;"
                                        type="submit"><a
                                            style="color: white;
                                        font-size: 16px;"
                                            href="{{ route('admin.kateqori.create') }}">Ekle</a></button>

                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
