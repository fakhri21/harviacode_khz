<?php 

$string = "
<div class=\"col-md-6 offset-md-3 col-sm-8 offset-sm-2 col-12\">
    <div class=\"card mt-5 mb-5\">
        <div class=\"card-body\">
           
           <div class=\"mt-2 mb-2\">
               <h3 class=\"text-center\">".ucfirst($table_name)." Read</h3>
           </div>
           
            <table border=\"0\" class=\"table\">";
            foreach ($non_pk as $row) {
                $string .= "\n\t    <tr><td>".label($row["column_name"])."</td><td><?php echo $".$row["column_name"]."; ?></td></tr>";
            }
$string.="  </table>
            
            <div class=\"text-center\">
                <a href=\"<?php echo base_url('".$c_url."') ?>\" class=\"btn btn-primary\"><i class=\"fa fa-angle-left\"></i> Kembali</a>
            </div>
            
        </div>
    </div>
</div>";



$hasil_view_read = createFile($string, $target."views/" . $v_read_file);

?>