@extends('master')

@section('Title')
Sensor-Data
@endsection

@section('Style')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('plugins')}}/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('plugins')}}/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('plugins')}}/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('Content')
<div class="content">
    <div class="container-fluid">
        {{-- Client side render --}}
        <div class="row">
            <div class=" col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title"><strong>SENSOR DATA</strong></h5>
                        <div class="float-sm-right ml-1">
                            <button type="button" class="btn btn-block btn-default">
                                <a href="#">
                                    <p style="margin: 0; padding: 0">
                                        New Item
                                    </p>
                                </a>
                            </button>
                        </div>
                        <div class="float-sm-right ml-1">
                            <button type="button" class="btn btn-block btn-default">Sample</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="thingspeak" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Voltage (V)</th>
                                    <th>Current (Amp)</th>
                                    <th>Power (KWh)</th>
                                    <th>Date-Time</th>
                                </tr>
                            </thead>
                            <tbody id="employee">
                                @foreach ($response as $data)
                                <tr>
                                    <td>{{ $data['entry_id'] }}</td>
                                    <td>{{ $data['field1'] }}</td>
                                    <td>{{ $data['field2'] }}</td>
                                    <td>{{ $data['field3'] }}</td>
                                    <td>{{ date('F j, Y, g:i A', strtotime($data['created_at'])) }}</td>
                                </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Voltage (V)</th>
                                    <th>Current (Amp)</th>
                                    <th>Power (KWh)</th>
                                    <th>Date-Time</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('Script')
@include('include.data_table_script')

<script>
    $(function () {
        $("#thingspeak").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print"],
            "order": [[0, 'desc']],
            "columnDefs": [
                {
                width: '25%',
                targets: 4,
                },
            ],
        }).buttons().container().appendTo('#thingspeak_wrapper .col-md-6:eq(0)');
    });
</script>

@endsection