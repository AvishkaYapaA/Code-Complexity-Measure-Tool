<?php

if (!isset($_GET['reload'])) {
    echo '<meta http-equiv=Refresh content="0;url=variables.php?reload=1">';
}

?>

<?php include 'include/Header.php'; ?>
<?php include 'include/Sidebar.php'; ?>

<?php

if( isset($_SESSION['split_code']) ||  isset($_SESSION['trimmed'])  ||  isset($_SESSION['row_count'])    ){

    $split = $_SESSION['split_code'];
    $trim = $_SESSION['trimmed'];

}if(isset($_SESSION['row_count']) ){
    $row_count = $_SESSION['row_count'];
}else if(isset($_SESSION['filename']) ){
    $file = $_SESSION['filename'];
}

?>

<div class="kt-content kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="row">

            <div style="width:100%" class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <div class="row">

                        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                            <div class="kt-portlet kt-portlet--mobile">
                                <div class="kt-portlet__head kt-portlet__head--lg">
                                    <div class="kt-portlet__head-label">

                                        <h3 style="font-family: 'Arial'; color: black" >
                                            Complexity Values Serived for the Variables =</h3>&nbsp;
                                        <h3 style="font-family: 'Arial'; color: green" >
                                            <?php
                                            if(isset($_SESSION['filename'])){
                                                $file = $_SESSION['filename'];
                                                echo $file;
                                            }
                                            ?>
                                        </h3>
                                    </div>

                                </div>

                                <div class="kt-portlet__body kt-font-dark">
                                    <table style="font-family: 'Arial'; text-align: center" class="table table-bordered table-dark" id="variblestable">
                                        <thead>
                                        <tr  style="font-family: 'Arial'">
                                            <th>Line No</th>
                                            <th>Program Statements</th>
                                            <th>Wvs</th>
                                            <th>Npdtv</th>
                                            <th>Ncdtv</th>
                                            <th>Cv</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                        $lastRow = "SELECT * FROM variablesvalues ORDER BY vid DESC LIMIT 1";
                                        $run_query_last = mysqli_query($con,$lastRow);

                                        while ($lastrow = mysqli_fetch_assoc($run_query_last)) {
                                        $VariableID_last = $lastrow['vid'];
                                        $GlobalVariable_last = $lastrow['GlobalVariable'];
                                        $LocalVariable_last = $lastrow['LocalVariable'];
                                        $PrimitiveVariable_last = $lastrow['PrimitiveVariable'];
                                        $CompositeVariable_last = $lastrow['CompositeVariable'];

                                        $i = 0;
                                        $Totcount = 0;
                                        $Variables_total_Cv = 0;
                                        $Variables_Wvs = 0;
                                        $Variables_Npdtv = 0;
                                        $Variables_Ncdtv = 0;
                                        $Variables_Cv = 0;
                                        $Variables_beforeCv = 0;




                                        //Values
                                        $primitive_datatype_value = $GlobalVariable_last;
                                        $composite_datatype_value = $LocalVariable_last;
                                        $local_variable_value = $PrimitiveVariable_last;
                                        $global_variable_value = $CompositeVariable_last;


                                        $entireCode = str_replace(';', ';', $trim);
                                        $methods = (getContentsBetween($entireCode, ') {', '}'));
                                        $codeOutsideMethods = str_replace($methods, '', $entireCode);
                                        $splitAfterSemicolon = str_replace(';', ';', $split);


                                        if (!$splitAfterSemicolon == ""){
                                        foreach ($splitAfterSemicolon

                                        as $valAfterSemicolonReplace) {
                                        $val = str_replace(';', ';', $valAfterSemicolonReplace);
                                        $global_variable_count_total = 0;
                                        $local_variable_count_total = 0;
                                        $primitive_datatype_variable_count_total = 0;
                                        $composite_datatype_variable_count_total = 0;


                                        foreach ($methods as $method) {

                                            $method;


                                            $local_variable_count = preg_match_all('/byte \w+\;|short \w+\;|int \w+\;|long \w+\;|float \w+\;|double \w+\;|char \w+\;|String \w+\;|boolean \w+\;|\w+ \w+ \= \w+|\w+ \w+\, \w+\;|private \w+ \w+\;/', $method, $counter);
                                            $local_variables = $counter;
                                            $row_count = 0;


                                            foreach ($local_variables as $local) {

                                                if (!$local == "") {

                                                    foreach ($local as $local_variable) {


                                                        for ($x = 0; $x <= $row_count; $x++) {

                                                            $local_variables;
                                                            $splitAfterSemicolon;


                                                            if (strpos($val, $local_variable) !== false) {

                                                                $local_variable_count_total = substr_count($val, $local_variable);

                                                            }
                                                        }
                                                    }
                                                }
                                            }


                                            $global_variable_count = preg_match_all('/byte \w+\;|short \w+\;|int \w+\;|long \w+\;|float \w+\;|double \w+\;|char \w+\;|String \w+\;|boolean \w+\;|\w+ \w+ \= \w+|\w+ \w+\, \w+\;|private \w+ \w+\;/', $codeOutsideMethods, $counter);
                                            $global_variables = $counter;


                                            foreach ($global_variables as $global) {
                                                $result = array_filter($global);
                                                if (!$result == "") {
                                                    foreach ($result as $global_variable) {


                                                        for ($x = 0; $x <= $row_count; $x++) {


                                                            $global_variables;
                                                            $splitAfterSemicolon;

                                                            if (strpos($val, $global_variable) !== false) {

                                                                $global_variable_count_total = substr_count($val, $global_variable);

                                                            }

                                                        }

                                                    }

                                                }

                                            }


                                            $total_variable_count = preg_match_all('/byte.*?\;|short .*?\;|int .*?\;|long .*?\;|float .*?\;|double .*?\;|char .*?\;|String .*?\;|boolean .*?\;/', $entireCode, $counter);
                                            $all_prem_variables = $counter;


                                            foreach ($all_prem_variables as $vars) {
                                                $result = array_filter($vars);
                                                if (!$result == "") {
                                                    foreach ($result as $all_variable) {


                                                        for ($x = 0; $x <= $row_count; $x++) {


                                                            $all_prem_variables;
                                                            $splitAfterSemicolon;


                                                            if (strpos($val, $all_variable) !== false) {

                                                                $primitive_datatype_variable_count_total = substr_count($val, $all_variable);

                                                            }

                                                            if (preg_match('/private byte \w+,\w+\;|private:void \w+, \w+\;|private short \w+, \w+\;|private int \w+, \w+\;|private long \w+, \w+\;|private float \w+, \w+\;|private double \w+, \w+\;|private char \w+, \w+\;|private String \w+, \w+\;|private boolean \w+, \w+\;/', $val)) {

                                                                $primitive_datatype_variable_count_total = 2;

                                                            }

                                                            if ($Variables_Wvs > 0 && $Variables_Ncdtv > 0 && preg_match_all('/byte |short |int |long |float |double |char |String |boolean /', $val, $counter)) {

                                                                $primitive_datatype_variable_count_total = 1;

                                                            }

                                                        }

                                                    }

                                                }

                                            }

                                            for ($x = 0; $x <= $row_count; $x++) {


                                                if ($Variables_Wvs > 0 && $Variables_Npdtv < 1) {

                                                    $composite_datatype_variable_count_total = 1;

                                                } else {

                                                    $composite_datatype_variable_count_total = 0;

                                                }

                                                if ($Variables_Wvs > 0 && $Variables_Npdtv < 1 && preg_match_all('/\w+ \w+ \w+\, \w+\;/', $val, $counter)) {

                                                    $composite_datatype_variable_count_total = 2;

                                                }

                                            }

                                            $Variables_Wvs = ($global_variable_count_total * $global_variable_value) + ($local_variable_count_total * $local_variable_value);

                                            $Variables_Npdtv = $primitive_datatype_variable_count_total;

                                            $Variables_Ncdtv = $composite_datatype_variable_count_total;

                                        }


                                        if ($Variables_Wvs == 0) {

                                            $Variables_Wvs = null;
                                            $Variables_Npdtv = null;
                                            $Variables_Ncdtv = null;


                                        }

                                        $Variables_beforeCv = ($primitive_datatype_value * $Variables_Npdtv) + ($composite_datatype_value * $Variables_Ncdtv);

                                        $Variables_Cv = $Variables_Wvs * $Variables_beforeCv;

                                        $Variables_total_Cv += $Variables_Cv;

                                        ?>

                                        <tr>
                                            <td><?php echo $Totcount = $Totcount + 1; ?></td>
                                            <td style="text-align: left"><?php echo $val; ?></td>
                                            <td <?php if ($Variables_Wvs > 0){ ?>style="color: red; font-weight: bold; "<?php } ?>><?php echo $Variables_Wvs; ?></td>
                                            <td <?php if ($Variables_Npdtv > 0){ ?>style="color: red; font-weight: bold; "<?php } ?>><?php echo $Variables_Npdtv; ?></td>
                                            <td <?php if ($Variables_Ncdtv > 0){ ?>style="color: red; font-weight: bold; "<?php } ?>><?php echo $Variables_Ncdtv; ?></td>
                                            <td <?php if ($Variables_Cv > 0){ ?>style="color: red; font-weight: bold; "<?php } ?>><?php echo $Variables_Cv; ?></td>
                                            <?php

                                            $i++;

                                            }


                                            }
                                            $_SESSION['total_cv'] = $Variables_total_Cv;

                                            }
                                            ?>
                                        </tr>


                                        </tbody>

                                    </table>


                                </div>
                            </div>
                        </div>

                    </div></div></div>

            <div>

                <div class="row">

                    <div  class="col-lg-12">
                        <div >
                            <div >
                                <div >

                                    <div class="col-lg-12">
                                        <div >

                                            <center><h1 style="font-family: 'Arial'; margin-left:1150px; color: green">Cv = <?php
                                                    if( isset($_SESSION['total_cv'])   ){

                                                        echo $total_cs = $_SESSION['total_cv'];
                                                    }
                                                    ?>

                                                </h1></center>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>



        </div>

    </div>
</div>
<?php
function getContentsBetween($str, $startDelimiter, $endDelimiter)
{
    $contents = array();
    $startDelimiterLength = strlen($startDelimiter);
    $endDelimiterLength = strlen($endDelimiter);
    $startFrom = $contentStart = $contentEnd = 0;
    while (false !== ($contentStart = strpos($str, $startDelimiter, $startFrom))) {
        $contentStart += $startDelimiterLength;
        $contentEnd = strpos($str, $endDelimiter, $contentStart);
        if (false === $contentEnd) {
            break;
        }
        $contents[] = substr($str, $contentStart, $contentEnd - $contentStart);
        $startFrom = $contentEnd + $endDelimiterLength;
    }

    return $contents;

}

?>



<?php include 'include/Footer.php'; ?>
