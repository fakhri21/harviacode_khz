<?php 

$string = "
<div class=\"col-md-6 offset-md-3 col-sm-8 offset-sm-2 col-12\">
<div class=\"card mt-5 mb-5\">
    <div class=\"card-body\">
       
       <div class=\"mt-2 mb-2\">
           <h3 class=\"text-center\">".ucfirst($table_name)."</h3>
       </div>
       
    
        <form action=\"<?php echo \$action; ?>\" method=\"post\">";
foreach ($non_pk as $row) {
    if ($row["data_type"] == 'text')
    {
    $string .= "\n\t    <div class=\"form-group\">
            <label for=\"".$row["column_name"]."\">".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></label>
            <textarea class=\"form-control\" rows=\"3\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\"><?php echo $".$row["column_name"]."; ?></textarea>
        </div>";
    } else
    {
    $string .= "\n\t    <div class=\"form-group\">
            <label for=\"".$row["data_type"]."\">".label($row["column_name"])." <?php echo form_error('".$row["column_name"]."') ?></label>
            <input type=\"text\" class=\"form-control\" name=\"".$row["column_name"]."\" id=\"".$row["column_name"]."\" placeholder=\"".label($row["column_name"])."\" value=\"<?php echo $".$row["column_name"]."; ?>\" />
        </div>";
    }
}
$string .= "\n\t    <input type=\"hidden\" name=\"".$pk."\" value=\"<?php echo $".$pk."; ?>\" /> ";
$string .= "\n\t    <button type=\"submit\" class=\"btn btn-primary\"><i class=\"fa fa-save\"></i> <?php echo \$button ?></button> ";
$string .= "\n\t    <a href=\"<?php echo base_url('".$c_url."') ?>\" class=\"btn btn-warning\"><i class=\"fa fa-angle-left\"></i> Cancel</a>";
$string .= "\n\t</form>
    </div>
</div>
</div>";

$hasil_view_form = createFile($string, $target."views/"  . $v_form_file);

?>
