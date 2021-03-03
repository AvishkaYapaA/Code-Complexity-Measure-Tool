<?php
if (!isset($_GET['reload'])) {
    echo '<meta http-equiv=Refresh content="0;url=inheritance.php?reload=1">';
} ?>

<?php include 'include/Header.php'; ?>
<?php include 'include/Sidebar.php'; ?>

<?php
if( isset($_SESSION['split_code']) ||  isset($_SESSION['trimmed'])  ||  isset($_SESSION['row_count'])    ){
    $split = $_SESSION['split_code'];
}  ?>



<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="row">

            <div style="width: 100%"  class="kt-portlet__foot">
                <div class="kt-form__actions">
                    <div class="row">

                        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                            <div class="kt-portlet kt-portlet--mobile">
                                <div class="kt-portlet__head kt-portlet__head--lg">
                                    <div class="kt-portlet__head-label">

                                        <h3 style="font-family: 'Arial'; color: black" >
                                            Complexity Values Served for the Inheritance =</h3>&nbsp;
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

                                    <table style="font-family: 'Arial'; text-align: center" class="table table-bordered table-dark" id="inheritance_table">
                                        <thead>
                                        <tr style="font-family: 'Arial'">
                                            <th>Count</th>
                                            <th>Class Name</th>
                                            <th>No. of direct inheritances</th>
                                            <th>No. of indirect inheritances</th>
                                            <th>Total inheritances</th>
                                            <th>Ci</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                        $i = 0;
                                        $line_count = 0;
                                        $count = 0;
                                        $count2 = 0;
                                        $total_ci = 0;

                                        $weight_one_ud_class = 1;
                                        $weight_two_ud_class = 2;
                                        $weight_three_ud_class = 3;
                                        $weight_more_ud_class = 4;

                                        function getBetween($codeLine, $start, $end)
                                        {
                                            $codeLine = " " . $codeLine;
                                            $ini = strpos($codeLine, $start);
                                            if ($ini == 0)
                                                return " ";
                                            $ini += strlen($start);
                                            $len = strpos($codeLine, $end, $ini) - $ini;
                                            return substr($codeLine, $ini, $len);
                                        }

                                        if (!empty($split)){

                                        foreach ($split as $val) {

                                        $direct = 0;
                                        $indirect = 0;
                                        $tot_inheritance = 0;
                                        $ci = 0;

                                        $val;
                                        $arr = $val;

                                        $parsed = getBetween($arr, "class", "{");
                                        $parsed1 = getBetween($arr, "class", "extends");
                                        $parsed2 = getBetween($arr, "extends", "{");

                                        $word_1 = 'extends';
                                        $pos = strpos($arr, $word_1);

                                        $word_2 = "class";
                                        $pos1 = strpos($arr, $word_2);

                                        $pos2 = strpos($arr, $parsed2);

                                        if ($pos == true && $parsed1 == true) {

                                            $direct++;
                                            $pr = $parsed1;


                                        } elseif ($pos == true) {

                                            $direct++;
                                            $pr = $parsed1;


                                        } else {

                                            $pr = $parsed;
                                        }

                                        ++$count2;
                                        if ($count2 == '25') {
                                            ++$indirect;
                                        }


                                        $tot_inheritance = $direct + $indirect;

                                        $ci = $tot_inheritance;
                                        $total_ci += $ci;

                                        ?>



                                        <?php
                                        if ($pos == true || $pos1 == true){

                                        ?>

                                        <tr>
                                            <td><?php echo ++$count; ?></td>
                                            <td style="color: yellow;  text-align: left"><?php echo $pr; ?></td>
                                            <td <?php if ($direct > 0){ ?>style="color: red; font-weight: bold; "<?php } ?>><?php echo $direct; ?></td>
                                            <td <?php if ($indirect > 0){ ?>style="color: red; font-weight: bold; "<?php } ?>><?php echo $indirect; ?></td>
                                            <td <?php if ($tot_inheritance > 0){ ?>style="color: red; font-weight: bold; "<?php } ?>><?php echo $tot_inheritance; ?></td>
                                            <td <?php if ($ci > 0){ ?>style="color: red; font-weight: bold; "<?php } ?>><?php echo $ci; ?></td>

                                            <?php } ?>

                                            <?php
                                            $i++;
                                            $_SESSION['total_ci'] = $total_ci;
                                            }
                                            }
                                            ?>
                                        </tr>

                                        </tbody>

                                    </table>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div>


                <div class="row">

                    <div class="col-lg-12">

                            <div>
                                <div>
                                    <div>
                                    <div class="col-lg-12">
                                        <div>
                                            <center><h1 style="font-family: 'Arial'; margin-left: 1200px; color: green" >Ci : <?php

                                                    if( isset($_SESSION['total_ci'])   ){

                                                        echo $total_ci = $_SESSION['total_ci'];
                                                    }
                                                    ?></h1>
                                            </center>
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
