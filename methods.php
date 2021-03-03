<?php

if (!isset($_GET['reload'])) {
    echo '<meta http-equiv=Refresh content="0;url=methods.php?reload=1">';
}
?>

<?php include 'include/Header.php'; ?>
<?php include 'include/Sidebar.php'; ?>

<?php
if( isset($_SESSION['split_code'])  ){
$split = $_SESSION['split_code'];
}
?>

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div style="width:100%" class="kt-portlet__foot">
            <div class="form__actions">
                <div class="row">
                    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                        <div class="kt-portlet kt-portlet--mobile">
                            <div class="kt-portlet__head kt-portlet__head--lg">
                                <div class="kt-portlet__head-label">

                                    <h3 style="font-family: 'Arial'; color: black" >Complexity Values Serived for the Methods =</h3>&nbsp;
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
                                <table style="font-family: 'Arial'; text-align: center" class="table table-bordered table-dark" id="methodstable">
                                    <thead>
                                    <tr  style="font-family: 'Arial'">
                                        <th>Line No</th>
                                        <th>Program Statements</th>
                                        <th>Wmrt</th>
                                        <th>Npdtp</th>
                                        <th>Ncdtp</th>
                                        <th >Cm</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php

                                    $i = 0;
                                    $count = 0;
                                    $total_Cm = 0;

                                    $lastRow = "SELECT * FROM methodsvalue ORDER BY mid DESC LIMIT 1";
                                    $run_query_last = mysqli_query($con,$lastRow);

                                    while ($lastrow = mysqli_fetch_assoc($run_query_last)) {
                                    $MethodID_last = $lastrow['mid'];
                                    $PrimitiveReturnType_last = $lastrow['PrimitiveReturnType'];
                                    $CompositeReturnType_last = $lastrow['CompositeReturnType'];
                                    $VoidReturnType_last = $lastrow['VoidReturnType'];
                                    $PrimitiveParameter_last = $lastrow['PrimitiveParameter'];
                                    $CompositeParameter_last = $lastrow['CompositeParameter'];


                                    $weight_primitive_retuntype = $PrimitiveReturnType_last;
                                    $weight_composite_returntype = $CompositeReturnType_last;
                                    $weight_void_returntype = $VoidReturnType_last;
                                    $weight_primitive_datatype_parameter = $PrimitiveParameter_last;
                                    $weight_composite_datatype_parameter = $CompositeParameter_last;

                                    if (!empty($split)){
                                    foreach ($split

                                    AS $val) {

                                    $val;

                                    $Wmrt = null;
                                    $Npdtp = null;
                                    $Ncdtp = null;
                                    $BeforeNpdtp = null;
                                    $BeforeNcdtp = null;
                                    $Cm = null;

                                    $row_count = 0;


                                    for ($x = 0; $x <= $row_count; $x++) {
                                        if (preg_match('/protected \w+ \w+\(.*?\) \{|private \w+ \w+\(.*?\) \{| public \w+ \w+\(.*?\) \{|public static void main\(String.*?\) {/', $val)) {

                                            if (preg_match('/protected void \w+\(.*?\) \{|private void \w+\(.*?\) \{| public void \w+\(.*?\) \{|public static void main\(String.*?\) {/', $val)) {

                                                $Wmrt = $weight_void_returntype;

                                            }
                                            if (preg_match('/public (byte|short|int|long|float|double|char|String|boolean) \w+\(.*?\) \{|private (byte|short|int|long|float|double|char|String|boolean) \w+\(.*?\) \{|protected (byte|short|int|long|float|double|char|String|boolean) \w+\(.*?\) \{/', $val)) {

                                                $Wmrt = $weight_primitive_retuntype;

                                            }

                                            if (preg_match_all('/byte |short |int |long |float |double |char |String |boolean |void/', $val, $counter) == 0) {

                                                $Wmrt = $weight_composite_returntype;

                                            }

                                            if (preg_match('/\bint main\b/', $val) !== false) {

                                                $int_count = preg_match_all('/\bint main\b/', $val, $counter);


                                            }


                                            $methodsCount = preg_match_all('/protected \w+ \w+\(.*?\) \{|private \w+ \w+\(.*?\) \{| public \w+ \w+\(.*?\) \{|public static void main\(String.*?\) {/', $val, $counter);
                                            $methods = $counter;

                                            if (!$methods == "") {
                                                foreach ($methods as $method) {
                                                    if (!$method == "") {
                                                        foreach ($method as $methodAfter) {

                                                            $methodAfter;

                                                            if (preg_match_all('/\(.*?\)/', $methodAfter, $counter)) {

                                                                if (preg_match_all('/byte |short |int |long |float |double |char |String |boolean /', $methodAfter, $counter)) {

                                                                    $BeforeNpdtp = preg_match_all('/byte |short |int |long |float |double |char |String |boolean /', $methodAfter, $counter);

                                                                }

                                                                if (preg_match_all('/byte |short |int |long |float |double |char |String |boolean /', $methodAfter, $counter) == 0) {

                                                                    $BeforeNcdtp = 1;

                                                                }

                                                                if (preg_match_all('/\(\)/', $methodAfter, $counter)) {

                                                                    $BeforeNpdtp = 0;
                                                                    $BeforeNcdtp = 0;

                                                                }

                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }

                                        if ($Wmrt >= 0 && $BeforeNpdtp > 0) {
                                            $BeforeNcdtp = 0;
                                        }
                                        if ($Wmrt >= 0 && $BeforeNcdtp > 0) {
                                            $BeforeNpdtp = 0;
                                        }

                                    }


                                    $Cm = $Wmrt + ($BeforeNpdtp * $weight_primitive_datatype_parameter) + ($Ncdtp * $weight_composite_datatype_parameter);

                                    $total_Cm += $Cm;
                                    if ($BeforeNcdtp == 1) {

                                        $Cm = $BeforeNcdtp * $weight_composite_datatype_parameter;
                                        $total_Cm += $Cm;
                                    }

                                    if (preg_match_all('/protected \w+ \w+\(.*?\) \{|private \w+ \w+\(.*?\) \{| public \w+ \w+\(.*?\) \{|public static void main\(String.*?\) {/', $val, $counter) == 0) {

                                        $Cm = null;

                                    }

                                    ?>

                                    <tr>
                                        <td><?php echo ++$count; ?></td>
                                        <td style="text-align: left"><?php echo $val; ?></td>
                                        <td><?php echo $Wmrt; ?></td>
                                        <td><?php echo $Npdtp; ?></td>
                                        <td><?php echo $Ncdtp; ?></td>
                                        <td><?php echo $Cm; ?></td>
                                        <?php

                                        $i++;

                                        $_SESSION['total_Cm'] = $total_Cm;

                                        }

                                        }
                                        }
                                        ?>
                                    </tr>
                                    </tbody>

                                </table>

                            </div>
                        </div>
                    </div>

                </div></div></div>


        <div >

            <div class="row">

                <div  class="col-lg-12">
                    <div >
                        <div >
                            <div >

                                <div class="col-lg-12">
                                    <div >

                                        <center><h1 style="font-family: 'Arial'; margin-left: 1150px; color: green">Cm = <?php

                                                if( isset($_SESSION['total_Cm'])   ){

                                                    echo $total_Cm = $_SESSION['total_Cm'];
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

<?php include 'include/Footer.php'; ?>
