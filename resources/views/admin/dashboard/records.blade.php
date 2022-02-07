<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">{{ $title }}</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>

    <!-- /.box-header -->
    <div class="box-body">
        <table class="table table-striped table-responsive">
            <tr>
                <th>姓名</th>
                <th>項目</th>
                <th>紀錄時間</th>
            </tr>
            @foreach($records as $record)
                <tr>
                    <td>{{ $record->user->name ?? '已刪除' }}</td>
                    <td>{{ $record->program->name ?? '已刪除' }}</td>
                    <td>{{ $record->created_at }}</td>
                </tr>
            @endforeach
        </table>
        <!-- /.table-responsive -->
    </div>
    <!-- /.box-body -->
</div>
