<?php

if (!isset($_GET['reload'])) {
    echo '<meta http-equiv=Refresh content="0;url=coupling.php?reload=1">';
}

?>

<!-- Add hedder and sidebar -->
<?php include 'include/Header.php'; ?>
<?php include 'include/Sidebar.php'; ?>

<!-- load file -->
<?php
if( isset($_SESSION['split_code']) ||  isset($_SESSION['trimmed'])  ||  isset($_SESSION['row_count'])    ){
    $split = $_SESSION['split_code'];
}

?>

<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
						<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
<div class="row">

        <div style="width: 100%" class="kt-portlet__foot">
            <div class="kt-form__actions">
                <div class="row">
                    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                        <div class="kt-portlet kt-portlet--mobile" >
                            <div class="kt-portlet__head kt-portlet__head--lg">
                                <div class="kt-portlet__head-label">
                                    <h3 style="font-family: 'Arial'; color: black">Complexity Values Serived for the Coupling = </h3>&nbsp;
                                    <!-- display uploaded file name -->
                                    <h3 style="font-family: 'Arial'; color: green"><?php

                                        if(isset($_SESSION['filename'])){
                                            $file = $_SESSION['filename'];
                                            echo $file;
                                        }
                                        ?>
                                    </h3>
                                </div>

                            </div>

                            <div class="kt-portlet__body kt-font-dark" style="width: 100%">

                                <!-- bigining code -->
                                    <?php
                                    $read_lines = array();
                                    //define keywords
                                    $keyword = array('public','protected', 'private', 'static');
                                    //get uploaded file
                                    $directry = "uploads";
                                    $files = scandir($directry);
                                    //open uploaded file
                                    foreach($files as $file){
                                        $tempLines = array();
                                        if($file === '.' or $file === '..') continue;
                                        $handle = fopen("uploads/".$file, "r");
                                        if ($handle) {
                                            while (($line = fgets($handle)) !== false) {
                                                array_push($tempLines, $line);
                                            }

                                            fclose($handle);
                                        } else {
                                        }

                                        array_push($read_lines,$tempLines);

                                    }
                                    //define variable in array to handle multiple file
                                    $global = array();
                                    $regularMethod = array();
                                    $recursiveMethod = array();

                                    //read lines to handle single file
                                    foreach($read_lines as $file){
                                        $methods_data = array();
                                        $global_variable_data = array();
                                        $recursive_data = array();
                                        $regular_data = array();
                                        //read line
                                        foreach($file as $line){

                                            foreach ($methods_data as $method){

                                                if(strpos($line, $method)){

                                                    if ($methods_data[0] == $method){

                                                        array_shift($regular_data);
                                                        array_push($recursive_data, $method);
                                                        $recursive_data = array_reverse($recursive_data);

                                                    }
                                                }
                                            }

                                            //code
                                            preg_match('/"[^"]*"|((?=_[a-z_0-9]|[a-z])[a-z_0-9]+(?=\s*=))/', $line, $var);

                                            if(isset($var[0]) && empty($methods_data)){

                                                array_push($global_variable_data, $var[0]);
                                            }

                                            preg_match('/(public|protected|private|static|\s) +[\w\<\>\[\]]+\s+(\w+) *\([^\)]*\) *(\{?|[^;])/', $line, $match);

                                            if (isset($match[1])){
                                                if(in_array($match[1], $keyword)){

                                                    //store array
                                                    array_push($methods_data, $match[2]);
                                                    array_push($regular_data, $match[2]);
                                                    array_push($regular_data);
                                                    $methods_data = array_reverse($methods_data);

                                                }
                                            }
                                        }
                                        //store array
                                        array_push($regularMethod, $regular_data);
                                        array_push($recursiveMethod, $recursive_data);
                                        array_push($global, $global_variable_data);
                                    }

                                    for ($i=0; $i < count($read_lines); $i++) {
                                    $ccp_data = 0;
                                    $regular_methods_data = array();
                                    $recursive_methods_data = array();
                                    $method_data = array();
                                    $global_Variable_data = array();


                                    ?>
                                <!-- create table -->
                                <table style="font-family: 'Arial'; text-align: center; width: 100%" class="table table-bordered table-dark" id="couplingtable">
                                    <thead>
                                    <tr style="font-family: 'Arial'">
                                        <th>Line No</th>
                                        <th>Program Statements</th>
                                        <th>Nr</th>
                                        <th>Nmcms</th>
                                        <th>Nmcmd</th>
                                        <th>Nmcrms</th>
                                        <th>Nmcrmd</th>
                                        <th>Nrmcrms</th>
                                        <th>Nrmcrmd</th>
                                        <th>Nrmcms</th>
                                        <th>Nrmcmd</th>
                                        <th>Nmrgvs</th>
                                        <th>Nmrgvd</th>
                                        <th>Nrmrgvs</th>
                                        <th>Nrmrgvd</th>

                                    </tr>
                                    </thead>

                                    <?php
                                    //define variable
                                    $count_nr = 0;
                                    $count_nmcms = 0;
                                    $count_nmcrms = 0;
                                    $count_nrmcrms = 0;
                                    $count_nrmcms = 0;
                                    $count_nmrgvs = 0;
                                    $count_nrmrgvs = 0;
                                    $count_nmcmd = 0;
                                    $count_nrmcmd = 0;
                                    $count_nmcrmd = 0;
                                    $count_nrmcrmd = 0;
                                    $count_nmrgvd = 0;
                                    $count_nrmrgvd = 0;
                                    $count1 = 0;

                                    foreach($read_lines[$i] as $line){
                                    //define variable
                                    $count_line_nr = 0;
                                    $count_line_nmcms = 0;
                                    $count_line_nmcrms = 0;
                                    $count_line_nrmcrms = 0;
                                    $count_line_nrmcms = 0;
                                    $count_line_nmrgvs = 0;
                                    $count_line_nrmrgvs = 0;
                                    $count_line_nmcmd = 0;
                                    $count_line_nrmcmd = 0;
                                    $count_line_nmcrmd =0;
                                    $count_line_nrmcrmd = 0;
                                    $count_line_nmrgvd = 0;
                                    $count_line_nrmrgvd =0;

                                    //code : find copling data
                                    foreach ($method_data as $method){

                                        if(strpos($line, $method)){

                                            if ($method_data[0] == $method){

                                                array_push($recursive_methods_data, $method);
                                                $currentMethodType = 'recursive';
                                                $count_nr = $count_nr+1;
                                                $count_line_nr = $count_line_nr +1;

                                            }elseif (in_array($method, $recursive_methods_data) && $currentMethodType == 'regular') {
                                                $count_nmcrms = $count_nmcrms +1;
                                                $count_line_nmcrms = $count_line_nmcrms+1;

                                            }elseif (in_array($method, $recursive_methods_data) && $currentMethodType == 'recursive') {
                                                $count_line_nrmcrms = $count_line_nrmcrms +1;
                                                $count_nrmcrms = $count_nrmcrms+1;

                                            }elseif ($currentMethodType == 'recursive') {
                                                $count_nrmcms = $count_nrmcms +1;
                                                $count_line_nrmcms = $count_line_nrmcms+1;

                                            }elseif ($currentMethodType == 'recursive') {
                                                $count_nmcms = $count_nmcms+1;
                                                $count_line_nmcms = $count_line_nmcms+1;

                                            }
                                        }
                                    }

                                    for ($j=0; $j < count($regularMethod) ; $j++) {
                                        if($i == $j) continue;
                                        foreach($regularMethod[$j] as $method){
                                            if(strpos($line, $method)){
                                                if($currentMethodType == 'regular'){

                                                    $count_line_nmcmd = $count_line_nmcmd+1;
                                                    $count_nmcmd = $count_nmcmd+1;
                                                }else{

                                                    $count_nrmcmd = $count_nrmcmd+1;
                                                    $count_line_nrmcmd = $count_line_nrmcmd+1;
                                                }
                                            }
                                        }
                                    }

                                    for ($j=0; $j < count($recursiveMethod) ; $j++) {
                                        if($i == $j) continue;
                                        foreach($recursiveMethod[$j] as $method){
                                            if(strpos($line, $method)){
                                                if($currentMethodType == 'regular'){

                                                    $count_nmcrmd = $count_nmcrmd+1;
                                                    $count_line_nmcrmd = $count_line_nmcrmd+1;
                                                }else{

                                                    $count_nrmcrmd = $count_nrmcrmd +1;
                                                    $count_line_nrmcrmd = $count_line_nrmcrmd +1;
                                                }
                                            }
                                        }
                                    }

                                    $space_split_array = explode(" ", $line);
                                    $character_split_array = preg_split('/[^[:alnum:]]/', $line);

                                    for ($j=0; $j < count($global) ; $j++) {
                                        if($i == $j) continue;

                                        foreach($global[$j] as $var){
                                            if (in_array($var, $space_split_array) || in_array($var, $character_split_array)) {
                                                if ($currentMethodType == 'regular') {
                                                    $count_nmrgvd = $count_nmrgvd +1;
                                                    $count_line_nmrgvd = $count_line_nmrgvd+1;

                                                }else {
                                                    $count_line_nrmrgvd = $count_line_nrmrgvd+1;
                                                    $count_nrmrgvd = $count_nrmrgvd+1;

                                                }
                                            }
                                        }
                                    }

                                    if (!empty($method_data)) {
                                        $space_split_array = explode(" ", $line);
                                        $character_split_array = preg_split('/[^[:alnum:]]/', $line);

                                        foreach($global_Variable_data as $var){

                                            if (in_array($var, $space_split_array) || in_array($var, $character_split_array)) {
                                                if ($currentMethodType == 'regular') {
                                                    $count_nmrgvs = $count_nmrgvs +1;
                                                    $count_line_nmrgvs = $count_line_nmrgvs+1;

                                                }else {
                                                    $count_line_nmrgvs = $count_line_nmrgvs+1;
                                                    $count_nmrgvs = $count_nmrgvs+1;

                                                }
                                            }
                                        }


                                    }

                                    preg_match('/"[^"]*"|((?=_[a-z_0-9]|[a-z])[a-z_0-9]+(?=\s*=))/', $line, $var);

                                    if(isset($var[0]) && empty($method_data)){

                                        array_push($global_Variable_data, $var[0]);

                                    }


                                    preg_match('/(public|protected|private|static|\s) +[\w\<\>\[\]]+\s+(\w+) *\([^\)]*\) *(\{?|[^;])/', $line, $match);

                                    if (isset($match[1])){
                                        if(in_array($match[1], $keyword)){

                                            $currentMethodType = 'regular';
                                            array_push($method_data, $match[2]);
                                            $method_data = array_reverse($method_data);

                                        }

                                    }
                                    ?>
                                        <!-- display data in created table -->
                                        <tbody>
                                    <tr>
                                        <td><?php echo $count1 = $count1 + 1; ?></td>
                                        <td style="text-align: left; word-wrap: break-word; max-width: 200px; "><?php echo($line) ?></td>
                                        <td <?php if ($count_line_nr > 0){ ?>style="color: red; font-weight: bold;"<?php } ?>><?php echo $count_line_nr; ?></td>
                                        <td <?php if ($count_line_nmcms > 0){ ?>style="color: red; font-weight: bold;"<?php } ?>><?php echo $count_line_nmcms; ?></td>
                                        <td <?php if ($count_line_nmcmd > 0){ ?>style="color: red; font-weight: bold;"<?php } ?>><?php echo $count_line_nmcmd; ?></td>
                                        <td <?php if ($count_line_nmcrms > 0){ ?>style="color: red; font-weight: bold;"<?php } ?>><?php echo $count_line_nmcrms; ?></td>
                                        <td <?php if ($count_line_nmcrmd > 0){ ?>style="color: red; font-weight: bold;"<?php } ?>><?php echo $count_line_nmcrmd; ?></td>
                                        <td <?php if ($count_line_nrmcrms > 0){ ?>style="color: red; font-weight: bold;"<?php } ?>><?php echo $count_line_nrmcrms; ?></td>
                                        <td <?php if ($count_line_nrmcrmd > 0){ ?>style="color: red; font-weight: bold;"<?php } ?>><?php echo $count_line_nrmcrmd; ?></td>
                                        <td <?php if ($count_line_nrmcms > 0){ ?>style="color: red; font-weight: bold;"<?php } ?>><?php echo $count_line_nrmcms; ?></td>
                                        <td <?php if ($count_line_nrmcmd > 0){ ?>style="color: red; font-weight: bold;"<?php } ?>><?php echo $count_line_nrmcmd; ?></td>
                                        <td <?php if ($count_line_nmrgvs > 0){ ?>style="color: red; font-weight: bold;"<?php } ?>><?php echo $count_line_nmrgvs; ?></td>
                                        <td <?php if ($count_line_nmrgvd > 0){ ?>style="color: red; font-weight: bold;"<?php } ?>><?php echo $count_line_nmrgvd; ?></td>
                                        <td <?php if ($count_line_nrmrgvs > 0){ ?>style="color: red; font-weight: bold;"<?php } ?>><?php echo $count_line_nrmrgvs; ?></td>
                                        <td <?php if ($count_line_nrmrgvd > 0){ ?>style="color: red; font-weight: bold;"<?php } ?>><?php echo $count_line_nrmrgvd; ?></td>



                                    </tr>

                                    </tbody>

                                    <?php

                                    }
                                    // genarate total ccp
                                    $ccp_data = $count_nr*2 + $count_nmcms*2 + $count_nmcrms*3 + $count_nrmcrms*4 + $count_nrmcms*3 + $count_nmrgvs*1 + $count_nrmrgvs*2 + $count_nmcmd*3 + $count_nrmcmd*4 + $count_nmcrmd*4 + $count_nrmcrmd*5 +$count_nmrgvd*2 + $count_nrmrgvd*2;
                                    $_SESSION['total_ccp'] = $ccp_data;

                                    ?>

                                </table>

                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>

                </div></div></div>

        <div>


            <div class="row">

                <div class="col-lg-12">
                    <div>
                        <div>
                            <div>
                                <div>
                                    <div class="col-lg-12">
                                        <div>
                                            <!-- display total coupling -->
                                            <center><h1 style="font-family: 'Arial'; margin-left: 1130px; color: green">Cs = <?php
                                                    if( isset($_SESSION['total_ccp'])   ){

                                                        echo $total_cs = $_SESSION['total_ccp'];
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

<!-- add footer -->
<?php include 'include/Footer.php'; ?>
