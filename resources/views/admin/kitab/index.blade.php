@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('admin.kitab.create')}}" class="btn btn-success" >Add New Book</a>  
                    @if (session('status'))
                        <div class="alert alert-primary">{{ session('status') }}</div>
                    @endif
                    <div class="card">

                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Book Table</h4>
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
                                            Book Title
                                        </th>
                                        <th>
                                            Image
                                        </th>
                                        <th>
                                            Bio
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
                                                        @if ($value['image']!=null)
                                                        <img src="{{ asset('images/'.$value['image']) }}"  style="width: 150;height:100px" alt="" srcset="">
                                                            
                                                        @else
                                                            <img src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_1280.png" alt="" srcset="">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $value['bio'] }}
                                                    </td>
                                                    <td>
                                                        <div style="display:flex;justify-content:center;width:300px"
                                                            class="alert alert-success">
                                                            <a href="{{ route('admin.kitab.edit', ['id' => $value['id']]) }}">
                                                                Edit

                                                            </a>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div style="display:flex;justify-content:center;width:300px"
                                                            class="alert alert-danger">
                                                            <a href="{{route('admin.kitab.delete',['id'=>$value['id']])}}">
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
                                                href="{{ route('admin.kitab.create') }}">Ekle</a></button>

                                    </div>
                                </div> --}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
