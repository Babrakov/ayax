@extends('layouts.master')

@section('content')

@if ($places->count())
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">{{ trans('templates.templates-view_index-list') }}</div>
        </div>
        <div class="portlet-body">
            
            <div id="external_filter_container_wrapper">
                    <div>
                        <div>
                            <select multiple="multiple" id="place_select" class="place">
                                @foreach ($places as $place)
                                    <option value="{{ $place->name }}">{{ $place->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <select multiple="multiple" id="district_select" class="district">
                                @foreach ($districts as $district)
                                    <option value="{{ $district->name }}">{{ $district->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>   
            </div>
            
            <table class="table table-striped table-hover table-responsive datatable" id="hometable">
                <thead>
                    <tr>                        
                        <th>Населенный пункт</th>
                        <th>Район</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($places as $row)
                        @foreach ($row->districts as $district)
                            <tr>
                        
                                <td>{{ $row->name }}</td>
                                <td>{{ $district->name }}</td>                            
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@else
    {{ trans('templates.templates-view_index-no_entries_found') }}
@endif

@endsection

@section('javascript')
    <script>
        $(document).ready(function () {
            var oTable = $('#hometable').DataTable({
                "language": {
                    "url": "/js/Russian.json"
                },
//                retrieve: true,
                "iDisplayLength": 10,
                "aaSorting": [[0, 'asc']],
            });
                        
            $('select[multiple].place').multiselect({                
                columns: 2,
                placeholder: 'Населённый пункт',
                search: true,
                onOptionClick: function () {
                    var searchArr = [];                        
                    $('#place_select option:selected').each(function(){
                        searchArr[searchArr.length] = $(this).attr("value");                                    
                    });                        
                    var searchStr = searchArr.join('|');                    
                    oTable
                        .column(0)
                        .search( searchStr, true )
                        .draw();
                },
                
            });            
            $('select[multiple].district').multiselect({                
                columns: 2,
                placeholder: 'Район',
                search: true,
                onOptionClick: function () {
                    var searchArr = [];                        
                    $('#district_select option:selected').each(function(){
                        searchArr[searchArr.length] = $(this).attr("value");                                    
                    });                        
                    var searchStr = searchArr.join('|');                    
                    oTable
                        .column(1)
                        .search( searchStr, true )
                        .draw();
                },
                
            }); 
            
            $('.ms-options').css({'min-height': '0'});
            
        });
        
    </script>
@stop