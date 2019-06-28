<?php 

$string = "<!doctype html>
<html>
<div class=\"col-md-12\">
<div class=\"mt-4\">
    <a style=\"padding: 9px 15px; background: #81c784; color: #fff; cursor: pointer; border-radius:3px;\" onclick=\"goBack()\"><i class=\"fa fa-angle-left\"></i> Kembali</a>

    <script>
        function goBack() {
            window.history.back();
        }

    </script>
</div>

<div class=\"card\" style=\"margin-top: 30px;\">
    <div class=\"card-header\">
        <h3>".ucfirst($table_name)." List</h3>
    </div>

    <div class=\"card-body\">
        <div class=\"row\" style=\"margin-bottom: 10px\">
            <div class=\"col-md-4\">
            </div>
            <div class=\"col-md-4 text-center\">
                <div style=\"margin-top: 4px\" id=\"message\">
                    <?php echo \$this->session->userdata('message') <> '' ? \$this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class=\"col-md-4 text-right\">
                <?php echo anchor(base_url('".$c_url."/create'), '<i class=\"fa fa-plus\"></i> Create', 'class=\"btn btn-primary\"'); ?>";
                if ($export_excel == '1') {
                    $string .= "\n\t\t<?php echo anchor(base_url('".$c_url."/excel'), '<i class=\"fa fa-file-excel-o\" </i> Excel', 'class=\"btn btn-success\"'); ?>";
                }
                if ($export_word == '1') {
                    $string .= "\n\t\t<?php echo anchor(base_url('".$c_url."/word'), '<i class=\"fa fa-file-word-o\"></i> Word', 'class=\"btn btn-primary\"'); ?>";
                }
                if ($export_pdf == '1') {
                    $string .= "\n\t\t<?php echo anchor(base_url('".$c_url."/pdf'), '<i class=\"fa fa-file-pdf-o\"></i> PDF', 'class=\"btn btn-danger\"'); ?>";
                }

            $string.="
            </div>
        </div>

        <table style=\"width:100%;\" class=\"table table-bordered table-striped\" id=\"mytable\">
            <thead>
                <tr>
                    <th>No</th>";
                    foreach ($non_pk as $row) {
                        $string .= "\n\t\t    <th>" . label($row['column_name']) . "</th>";
                    }
                    $string .="\n\t\t  <th>Action</th>
                </tr>
            </thead>";
           
$column_non_pk = array();
foreach ($non_pk as $row) {
$column_non_pk[] .= "{\"data\": \"".$row['column_name']."\"}";
}
$col_non_pk = implode(',', $column_non_pk);
$string.="
        </table>
    </div>
</div>
</div>   
        <script>
            $(document).ready(function() {
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        \"iStart\": oSettings._iDisplayStart,
                        \"iEnd\": oSettings.fnDisplayEnd(),
                        \"iLength\": oSettings._iDisplayLength,
                        \"iTotal\": oSettings.fnRecordsTotal(),
                        \"iFilteredTotal\": oSettings.fnRecordsDisplay(),
                        \"iPage\": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        \"iTotalPages\": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $(\"#mytable\").dataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode == 13) {
                                        api.search(this.value).draw();
                            }
                        });
                    },
                    oLanguage: {
                        sProcessing: \"loading...\"
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {\"url\": \"".$c_url."/json\", \"type\": \"POST\"},
                    columns: [
                        {
                            \"data\": \"$pk\",
                            \"orderable\": false
                        },".$col_non_pk.",
                        {
                            \"data\" : \"action\",
                            \"orderable\": false,
                            \"className\" : \"text-center\"
                        }
                    ],
                    order: [[0, 'desc']],
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    }
                });
            });
        </script>
";


$hasil_view_list = createFile($string, $target."views/"  . $v_list_file);

?>