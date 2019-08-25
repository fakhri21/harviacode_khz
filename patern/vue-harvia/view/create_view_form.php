<?php 

$string = "
<div class=\"col-md-6 offset-md-3 col-sm-8 offset-sm-2 col-12\">
<div class=\"card mt-5 mb-5\">
    <div class=\"card-body\">
       
       <div class=\"mt-2 mb-2\">
           <h3 class=\"text-center\">".ucfirst($table_name)."</h3>
       </div>";
foreach ($non_pk as $row) {
    if ($row["data_type"] == 'text')
    {
    $string .= "\n\t    <b-form-group>
            <label for=\"".$row["column_name"]."\">".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></label>
            <b-form-textarea required v-model=\"".$row["column_name"]."\"  name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\"></b-form-textarea>
            </b-form-group>";
    } else
    {
    $string .= "\n\t    <b-form-group>
            <label for=\"".$row["data_type"]."\">".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></label>
            <b-form-input required v-model=\"".$row["column_name"]."\"  type=\"text\" class=\"form-control\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\" value=\"<?php echo $".$row["column_name"]."; ?>\" />
            </b-form-group>";
    }
}
$string .= "\n\t    <button @click=\"simpan\" class=\"btn btn-primary\"><i class=\"fa fa-save\"></i> <?php echo \$button ?></button> 

    </div>
</div>
</div>";

$hasil_view_form = createFile($string, $target."views/"  . $v_form_file);

?>
