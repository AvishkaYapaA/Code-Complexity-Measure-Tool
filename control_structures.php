<?php
if (!isset($_GET['reload'])) {
    echo '<meta http-equiv=Refresh content="0;url=control_structures.php?reload=1">';
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
            <div class="kt-form__actions">
                <div class="row">
                    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                        <div class="kt-portlet kt-portlet--mobile">
                            <div class="kt-portlet__head kt-portlet__head--lg">
                                <div class="kt-portlet__head-label">

                                    <h3 style="font-family: 'Arial'; color: black" >
                                        Complexity Values Serived for the Control Structures = </h3>&nbsp;
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
                                <table style="font-family: 'Arial'; text-align: center" class="table table-bordered table-dark" id="controltable">
                                     <thead>
                                     <tr style="font-family: 'Arial'">
                                         <th>Line No</th>
                                         <th>Program Statements</th>
                                         <th>Wtcs</th>
                                         <th>NC</th>
                                         <th>Ccspps</th>
                                         <th >Ccs</th>
                                     </tr>
                                     </thead>
                                    <tbody>

                                    <?php

                                    $x = 0;
                                    $count = 0;
                                    $ccs_tot = 0;
                                    $Wtcs = 0;
                                    $NC = 0;
                                    $Ccspps = 0;
                                    $Ccs = 0;
//
//
//                                    $if_elseif_weightage = 2 ;
//                                    $for_while_dowhile_weightage = 3 ;
//                                    $switch_weightage = 2 ;
//                                    $case_weightage = 1 ;


                                    $lastRow = "SELECT * FROM controlstructurevalues ORDER BY ID DESC LIMIT 1";
                                    $run_query_last = mysqli_query($con, $lastRow);

                                    while ($lastrow = mysqli_fetch_assoc($run_query_last)) {
                                    $ID_last = $lastrow['ID'];
                                    $if_elseif_weightage = $lastrow['valueIf'];
                                    $for_while_dowhile_weightage = $lastrow['valueFor'];
                                    $switch_weightage = $lastrow['valueSwitch'];
                                    $case_weightage = $lastrow['valueCase'];

                                    //Default Weights
                                    $weight_if_elseif = $if_elseif_weightage;
                                    $weight_for_while_dowhile = $for_while_dowhile_weightage;
                                    $weight_switch = $switch_weightage;
                                    $weight_case = $case_weightage;

                                    if (!empty($split)){
                                    foreach($split AS $val) {

                                    $val;

                                            $words_conditioning = array('if', 'for', 'while', 'switch', 'case');

                                            foreach($words_conditioning as $word){

                                                if (preg_match('/if(.*?)+\((.*?)\)+(.*?){/', $val) !== false ){

                                                    $count_if = preg_match_all('/if(.*?)+\((.*?)\)+(.*?){/',$val,$counter);
                                                    $weight_if = $count_if * $if_elseif_weightage;

                                                }

                                                if (preg_match('/for(){/', $val) !== false){

                                                    $count_for = preg_match_all('/for(.*?)+\((.*?)\)+(.*?){/',$val,$counter);
                                                    $weight_for = $count_for * $for_while_dowhile_weightage ;

                                                }

                                                if (preg_match('/while(.*?)+\((.*?)\)+(.*?){/', $val) !== false){

                                                    $count_while = preg_match_all('/while(.*?)+\((.*?)\)+(.*?){/',$val,$counter);
                                                    $weight_while = $count_while * $for_while_dowhile_weightage ;

                                                }

                                                if (preg_match('/while(.*?)+\((.*?)\)+(.*?);/', $val) !== false){

                                                    $count_do_while = preg_match_all('/while(.*?)+\((.*?)\)+(.*?);/',$val,$counter);
                                                    $weight_do_while = $count_do_while * $for_while_dowhile_weightage ;

                                                }

                                                if (preg_match('/switch(.*?)+\((.*?)\)+(.*?){/', $val) !== false){

                                                    $count_switch = preg_match_all('/switch(.*?)+\((.*?)\)+(.*?){/',$val,$counter);
                                                    $weight_switch = $count_switch * $switch_weightage ;

                                                }

                                                if (preg_match('/case(.*?)+\:/', $val) !== false){

                                                    $count_case = preg_match_all('/case(.*?)+\:/',$val,$counter);
                                                    $weight_case = $count_case * $case_weightage ;

                                                }

                                            }

                                            $Wtcs = $weight_for + $weight_if + $weight_while + $weight_switch + $weight_case + $weight_do_while;

                                            $NC = $count_if + $count_for + $count_while + $count_switch + $count_case + $count_do_while;

                                            if ($NC == 0){
                                                $Ccspps = 0;
                                            }
                                            else
                                            {
                                                $Ccspps = $Ccs;
                                            }
                                            $Ccspps = $Wtcs * $NC ;
                                            $Ccs = ($Wtcs * $NC) + $Ccspps ;

                                            $ccs_tot += $Ccs;

                                            ?>

                                            <tr>
                                                <td><?php echo $count=$count+1; ?></td>
                                                <td style="text-align: left"><?php echo $val;?></td>
                                                <td <?php if ($Wtcs > 0){ ?>style="color: red; font-weight: bold; "<?php } ?>><?php echo $Wtcs; ?></td>
                                                <td <?php if ($NC > 0){ ?>style="color: red; font-weight: bold; "<?php } ?>><?php echo $NC; ?></td>
                                                <td <?php if ($Ccspps > 0){ ?>style="color: red; font-weight: bold; "<?php } ?>><?php echo $Ccspps; ?></td>
                                                <td <?php if ($Ccs > 0){ ?>style="color: red; font-weight: bold; "<?php } ?>><?php echo $Ccs; ?></td>

                                                <?php

//                                                $i++;
                                                $_SESSION['total_ccs'] = $ccs_tot;

                                                }}
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

                <div class="col-lg-12">
                    <div>
                        <div>
                            <div>

                                <div class="col-lg-12">
                                    <div>

                                        <center><h1 style="font-family: 'Arial'; margin-left: 1150px; color: green">Ccs : <?php

                                                if( isset($_SESSION['total_ccs'])   ){

                                                    echo $ccs_tot = $_SESSION['total_ccs'];
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

            <div >
                <div >
                    <div class="row">

                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>

</div>

<?php include 'include/footer.php'; ?>

