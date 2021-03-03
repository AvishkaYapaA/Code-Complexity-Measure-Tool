<?php include 'include/Header.php'; ?>
<?php include 'include/Sidebar.php'; ?>
<?php

if (!isset($_GET['reload'])) {
    echo '<meta http-equiv=Refresh content="0;url=size.php?reload=1">';
}

?>

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
                                    <h3 style="font-family: 'Arial'; color: black" >Complexity Values Serived for the Size = </h3>&nbsp;
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
                                <table style="font-family: 'Arial'; text-align: center" class="table table-bordered table-dark" id="sizetable">
                                    <thead>
                                    <tr  style="font-family: 'Arial'">
                                        <th>Line No</th>
                                        <th>Program Statements</th>
                                        <th>Identified Tokens</th>
                                        <th>Nkw</th>
                                        <th>Nid</th>
                                        <th>Nop</th>
                                        <th>Nnv</th>
                                        <th>Nsl</th>
                                        <th>Cs</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    $i = 0;
                                    $total_cs = 0;

                                    $Nkw = 0;
                                    $Nid = 0;
                                    $Nop = 0;
                                    $Nnv = 0;
                                    $Nsl = 0;
                                    $Cs = 0;
                                    $count = 0;

                                    $lastRow = "SELECT * FROM sizevalues ORDER BY sid DESC LIMIT 1";
                                    $run_query_last = mysqli_query($con, $lastRow);

                                    while ($lastrow = mysqli_fetch_assoc($run_query_last)) {
                                    $SizeID_last = $lastrow['Sid'];
                                    $Keyword_last = $lastrow['Keyword'];
                                    $Identifier_last = $lastrow['Identifier'];
                                    $Operator_last = $lastrow['Operator'];
                                    $NumericalValue_last = $lastrow['NumericalValue'];
                                    $StringLiteral_last = $lastrow['StringLiteral'];


                                    $keyword_value = $Keyword_last;
                                    $identifier_value = $Identifier_last;
                                    $operator_value = $Operator_last;
                                    $numerical_value = $NumericalValue_last;
                                    $string_value = $StringLiteral_last;


                                    if (!empty($split)){

                                    foreach($split AS $val) {

                                    $val;

                                    $keywords = ['abstract', 'assert', 'break', 'catch', 'class', 'const', 'continue', 'default', 'do', 'else', 'enum', 'extends', 'final', 'finally', 'goto', 'implements', 'instanceof', 'interface', 'native', 'new', 'package', 'private', 'protected', 'public', 'return', 'static', 'strictfp', 'super', 'synchronized', 'this', 'throw', 'throws', 'transient', 'try', 'void', 'volatile'];


                                    $tokenkw = "";
                                    $tokenOp = "";
                                    $tokenClass = "";
                                    $tokenNumber = "";
                                    $tokenString = "";

                                    foreach ($keywords as $word) {


                                        if (preg_match('/\babstract\b/', $val) !== false) {

                                            $abstract_count = preg_match_all('/\babstract\b/', $val, $counter);

                                        }

                                        if (preg_match('/\bassert\b/', $val) !== false) {

                                            $assert_count = preg_match_all('/\bassert\b/', $val, $counter);

                                        }

                                        if (preg_match('/\bbreak\b/', $val) !== false) {

                                            $break_count = preg_match_all('/\bbreak\b/', $val, $counter);

                                        }

                                        if (preg_match('/\bcatch\b/', $val) !== false) {

                                            $catch_count = preg_match_all('/\bcatch\b/', $val, $counter);

                                        }

                                        if (preg_match('/\bclass\b/', $val) !== false) {

                                            $class_count = preg_match_all('/\bclass\b/', $val, $counter);

                                        }

                                        if (preg_match('/\bconst\b/', $val) !== false) {

                                            $const_count = preg_match_all('/\bconst\b/', $val, $counter);

                                        }

                                        if (preg_match('/\bcontinue\b/', $val) !== false) {

                                            $continue_count = preg_match_all('/\bcontinue\b/', $val, $counter);

                                        }

                                        if (preg_match('/\bdefault\b/', $val) !== false) {

                                            $default_count = preg_match_all('/\bdefault\b/', $val, $counter);

                                        }

                                        if (preg_match('/\bdo\b/', $val) !== false) {

                                            $do_count = preg_match_all('/\bdo\b/', $val, $counter);

                                        }

                                        if (preg_match('/\belse\b/', $val) !== false) {

                                            $else_count = preg_match_all('/\belse\b/', $val, $counter);

                                        }

                                        if (preg_match('/\benum\b/', $val) !== false) {

                                            $enum_count = preg_match_all('/\benum\b/', $val, $counter);

                                        }

                                        if (preg_match('/\bextends\b/', $val) !== false) {

                                            $extends_count = preg_match_all('/\bextends\b/', $val, $counter);

                                        }

                                        if (preg_match('/\bfinal\b/', $val) !== false) {

                                            $final_count = preg_match_all('/\bfinal\b/', $val, $counter);

                                        }

                                        if (preg_match('/\bfinally\b/', $val) !== false) {

                                            $finally_count = preg_match_all('/\bfinally\b/', $val, $counter);

                                        }

                                        if (preg_match('/\bgoto\b/', $val) !== false) {

                                            $goto_count = preg_match_all('/\bgoto\b/', $val, $counter);

                                        }

                                        if (preg_match('/\bimplements\b/', $val) !== false) {

                                            $implements_count = preg_match_all('/\bimplements\b/', $val, $counter);

                                        }


                                        if (preg_match('/\binstanceof\b/', $val) !== false) {

                                            $instanceof_count = preg_match_all('/\binstanceof\b/', $val, $counter);

                                        }

                                        if (preg_match('/\binterface\b/', $val) !== false) {

                                            $interface_count = preg_match_all('/\binterface\b/', $val, $counter);

                                        }

                                        if (preg_match('/\bnative\b/', $val) !== false) {

                                            $native_count = preg_match_all('/\bnative\b/', $val, $counter);

                                        }

                                        if (preg_match('/\bnew\b/', $val) !== false) {

                                            $new_count = preg_match_all('/\bnew\b/', $val, $counter);

                                        }

                                        if (preg_match('/\bpackage\b/', $val) !== false) {

                                            $package_count = preg_match_all('/\bpackage\b/', $val, $counter);

                                        }

                                        if (preg_match('/\bprivate\b/', $val) !== false) {

                                            $private_count = preg_match_all('/\bprivate\b/', $val, $counter);

                                        }

                                        if (preg_match('/\bprotected\b/', $val) !== false) {

                                            $protected_count = preg_match_all('/\bprotected\b/', $val, $counter);

                                        }

                                        if (preg_match('/\bpublic\b/', $val) !== false) {

                                            $public_count = preg_match_all('/\bpublic\b/', $val, $counter);

                                        }

                                        if (preg_match('/\breturn\b/', $val) !== false) {

                                            $return_count = preg_match_all('/\breturn\b/', $val, $counter);

                                        }

                                        if (preg_match('/\bstatic\b/', $val) !== false) {

                                            $static_count = preg_match_all('/\bstatic\b/', $val, $counter);

                                        }

                                        if (preg_match('/\bstrictfp\b/', $val) !== false) {

                                            $strictfp_count = preg_match_all('/\bstrictfp\b/', $val, $counter);

                                        }

                                        if (preg_match('/\bsuper\b/', $val) !== false) {

                                            $super_count = preg_match_all('/\bsuper\b/', $val, $counter);

                                        }

                                        if (preg_match('/\bsynchronized\b/', $val) !== false) {

                                            $synchronized_count = preg_match_all('/\bsynchronized\b/', $val, $counter);

                                        }

                                        if (preg_match('/\bthis\b/', $val) !== false) {

                                            $this_count = preg_match_all('/\bthis\b/', $val, $counter);

                                        }

                                        if (preg_match('/\bthrow\b/', $val) !== false) {

                                            $throw_count = preg_match_all('/\bthrow\b/', $val, $counter);

                                        }

                                        if (preg_match('/\bthrows\b/', $val) !== false) {

                                            $throws_count = preg_match_all('/\bthrows\b/', $val, $counter);

                                        }

                                        if (preg_match('/\btransient\b/', $val) !== false) {

                                            $transient_count = preg_match_all('/\btransient\b/', $val, $counter);

                                        }

                                        if (preg_match('/\btry\b/', $val) !== false) {

                                            $try_count = preg_match_all('/\btry\b/', $val, $counter);

                                        }

                                        if (preg_match('/\bvoid\b/', $val) !== false) {

                                            $void_count = preg_match_all('/\bvoid\b/', $val, $counter);

                                        }

                                        if (preg_match('/\bvolatile\b/', $val) !== false) {

                                            $volatile_count = preg_match_all('/\bvolatile\b/', $val, $counter);

                                        }

                                    }

                                    $Nkw = ($abstract_count + $assert_count + $break_count + $catch_count + $class_count + $const_count + $continue_count + $default_count + $do_count + $else_count + $enum_count + $extends_count + $final_count + $finally_count + $goto_count + $implements_count + $instanceof_count + $interface_count + $native_count + $new_count + $package_count + $private_count + $protected_count + $public_count + $return_count + $static_count + $strictfp_count + $super_count + $synchronized_count + $this_count + $throw_count + $throws_count + $transient_count + $try_count + $void_count + $volatile_count) * $keyword_value;


                                    $identifiers_count_total = 0;
                                    $row_count = 0;

                                    for ($x = 0; $x <= $row_count; $x++) {

                                        if (preg_match('/implements\s*(\w+)/', $val) !== false) {

                                            $implement = preg_match_all('/implements\s*(\w+)/', $val, $counter);

                                        }


                                        if (preg_match('/()\s*(\w+)/', $val) !== false) {

                                            $methods = preg_match_all('/()\s*(\w+)/', $val, $counter);

                                        }
                                        if (preg_match('/class[\s\n]+([a-zA-Z0-9_]+)[\s\na-zA-Z0-9_]+\{/', $val) !== false) {

                                            $classname = preg_match_all('/class\s*(\w+)/', $val, $counter);

                                        }


                                        if (preg_match('/(?:(?:public|private|protected|static|final|native|synchronized|abstract|transient)+\s+)+[$_\w<>\[\]\s]*\s+[\$_\w]+\([^\)]*\)?\s*\{?[^\}]*\}?/', $val) !== false) {

                                            $count_methods = preg_match_all('/(?:(?:public|private|protected|static|final|native|synchronized|abstract|transient)+\s+)+[$_\w<>\[\]\s]*\s+[\$_\w]+\([^\)]*\)?\s*\{?[^\}]*\}?/', $val, $counter);

                                        }

                                        if (preg_match('/= new (.*?)\((.*?)\);|=new (.*?)\((.*?)\);/', $val) !== false) {

                                            $count_objects = preg_match_all('/= new (.*?)\((.*?)\);|=new (.*?)\((.*?)\);/', $val, $counter);

                                        }

                                        if (preg_match('/= new|=new/', $val) !== false) {

                                            $count_variables = preg_match_all('/= new|=new/', $val, $counter);

                                        }

                                        if (preg_match('/= new|=new/', $val) !== false) {

                                            $count_arguments = preg_match_all('/= new|=new/', $val, $counter);

                                        }


                                        if (preg_match('/= new|=new/', $val) !== false) {

                                            $count_data_structures = preg_match_all('/= new|=new/', $val, $counter);

                                        }


                                        $identifiers_count_total = $implement + $count_objects + $count_methods + $classname;

                                        $Nid = $identifiers_count_total * $identifier_value;

                                    }


                                    $operators = array('+', '-', '*', '/', '%', '=', '>', '<', '&&', '!', '|', '^', '~', ',', '.', '::');

                                    foreach ($operators as $word) {

                                        if (preg_match('/(\<\=)+|(\=\>)+|(\=\<)+|(\>\=)+|(\+)+|(\-)+|(\=)+|(\*)+|(\/)+|(\%)+|(\>)+|(\>)+|(\<)+|(\&\&)+|(\!)+|(\|)+|(\^)+|(\~)+|(\,)+|(\.)+|(\:\:)+/', $val) !== false) {

                                            $op_count = preg_match_all('/(\<\=)+|(\=\>)+|(\=\<)+|(\>\=)+|(\+)+|(\-)+|(\=)+|(\*)+|(\/)+|(\%)+|(\>)+|(\>)+|(\<)+|(\&\&)+|(\!)+|(\|)+|(\^)+|(\~)+|(\,)+|(\.)+|(\:\:)+/', $val, $counter);


                                        }

                                        $Nop = $op_count * $operator_value;

                                    }


                                    $numbers = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
                                    $numbers_count_total = 0;

                                    foreach ($numbers as $word) {

                                        if (preg_match('/(\d)+/', $val) !== false) {

                                            $numbers_count_total = preg_match_all('/(\d)+/', $val, $counter);

                                        }

                                        $Nnv = $numbers_count_total * $numerical_value;

                                    }


                                    $strings_count_total = 0;

                                    for ($x = 0; $x <= $row_count; $x++) {

                                        if (preg_match('/"(.*?)"/', $val) !== false) {

                                            $strings_count_total = preg_match_all('/"(.*?)"/', $val, $counter);

                                        }

                                        $Nsl = $strings_count_total * $string_value;

                                    }


                                    foreach ($keywords as $word) {
                                        if ($Nkw > 0 && strpos($val, $word)) {
                                            $tokenkw = $word;
                                        }
                                    }

                                    foreach ($operators as $op) {
                                        if (strpos($val, $op)) {
                                            $tokenOp = $op;
                                        }
                                    }

                                    foreach ($numbers as $number) {
                                        if (strpos($val, $number)) {
                                            $tokenNumber = $number;
                                        }
                                    }

                                    if ($Nkw == 0 && preg_match_all('/import /', $val, $counter)) {
                                        $Nkw = null;
                                        $Nid = null;
                                        $Nop = null;
                                        $Nnv = null;
                                        $Nsl = null;
                                        $tokenOp = null;
                                    }
                                    if ($Nkw == 0 && preg_match_all('/#include /', $val, $counter)) {
                                        $Nkw = null;
                                        $Nid = null;
                                        $Nop = null;
                                        $Nnv = null;
                                        $Nsl = null;
                                        $tokenOp = null;
                                    }

                                    if ($Nkw == 0 && preg_match_all('/using /', $val, $counter)) {
                                        $Nkw = null;
                                        $Nid = null;
                                        $Nop = null;
                                        $Nnv = null;
                                        $Nsl = null;
                                        $tokenOp = null;
                                    }

                                    for ($x = 0; $x <= $row_count; $x++) {
                                        //Matching Classes
                                        $classes = (getContentsBetween($val, 'class ', '{'));
                                        foreach ($classes as $class) {
                                            if (strpos($val, $class)) {
                                                $tokenClass = $class;

                                            }
                                        }

                                    }

                                    for ($x = 0; $x <= $row_count; $x++) {
                                        //Matching Strings
                                        $strings_count = preg_match_all('/"(.*?)"/', $val, $counter);

                                        foreach ($counter as $string) {
                                            foreach ($string as $str) {


                                                if (strpos($val, $str)) {
                                                    $tokenString = $str;

                                                }

                                            }

                                        }

                                    }


                                    $Cs = $Nkw + $Nid + $Nop + $Nnv + $Nsl;

                                    $total_cs += $Cs;

                                    ?>

                                    <tr>
                                        <td><?php echo ++$count; ?></td>
                                        <td style="text-align: left"><?php echo $val; ?></td>
                                        <td <?php if ($val != ""){ ?>style="color: yellow; text-align: left; font-weight: bold;"<?php } ?>><?php echo $tokenkw; ?><?php echo $tokenOp; ?><?php echo $tokenClass; ?><?php echo $tokenNumber; ?><?php echo $tokenString; ?></td>
                                        <td <?php if ($Nkw > 0){ ?>style="color: red; font-weight: bold;"<?php } ?>><?php echo $Nkw; ?></td>
                                        <td <?php if ($Nid > 0){ ?>style="color: red; font-weight: bold; "<?php } ?>><?php echo $Nid; ?></td>
                                        <td <?php if ($Nop > 0){ ?>style="color: red; font-weight: bold; "<?php } ?>><?php echo $Nop; ?></td>
                                        <td <?php if ($Nnv > 0){ ?>style="color: red; font-weight: bold;"<?php } ?>><?php echo $Nnv; ?></td>
                                        <td <?php if ($Nsl > 0){ ?>style="color:red; font-weight: bold;"<?php } ?>><?php echo $Nsl; ?></td>
                                        <td <?php if ($Cs > 0){ ?>style="color: red; font-weight: bold;"<?php } ?>><?php echo $Cs; ?></td>
                                        <?php


                                        $i++;
                                        }
                                        $_SESSION['total_cs'] = $total_cs;

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

        <div>

            <div class="row">

                <div  class="col-lg-12">
                    <div >
                        <div >
                            <div >

                                <div class="col-lg-12">
                                    <div >

                                        <center><h1 style="font-family: 'Arial'; margin-left: 1130px; color: green">Cs = <?php
                                                if( isset($_SESSION['total_cs'])   ){

                                                    echo $total_cs = $_SESSION['total_cs'];

                                                    //On page 1
                                                    $_SESSION['total_cs'] = $total_cs;


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
