<?php

if (!isset($_GET['reload'])) {
    echo '<meta http-equiv=Refresh content="0;url=total_weight.php?reload=1">';
}

?>

<?php include 'include/Header.php'; ?>
<?php include 'include/Sidebar.php'; ?>

<?php
if( isset($_FILES['file'])  ){
    $ds = DIRECTORY_SEPARATOR;
    $storeFolder = 'uploads';
    $tempFile = $_FILES['file']['tmp_name'];
    $targetPath = __DIR__ . $ds. $storeFolder . $ds;
    $newFileName = $_FILES['file']['name'];
    $targetFile =  $targetPath.$newFileName;
    move_uploaded_file($tempFile,$targetFile);
    require 'Extractor.class.php';
    $extractor = new Extractor;


     $archivePath = $targetFile;


     $destPath = $storeFolder;


      $extract = $extractor->extract($archivePath, $storeFolder);

    $dir_name = $storeFolder;
    $ext = 'zip';

    if($extract){
        echo $GLOBALS['status']['success'];
        unlink_recursive($dir_name, $ext);

    }else{
        echo $GLOBALS['status']['error'];
    }
    if ($handle = opendir('uploads')) {
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                $content = file_get_contents('uploads/'.$entry);
                 $single = preg_replace('![ \t]*//.*[ \t]*[\r\n]!', '', $content);
                $multiple = preg_replace('#/\*[^*]*\*+([^/][^*]*\*+)*/#', '', $single);
                $excess = preg_replace('/\s+/', ' ', $multiple);
                $trim = trim($excess," ");
                $for_semicolon = preg_replace('/;(?=((?!\().)*?\))/', ';', $trim);
                $split = preg_split('/(?<=[;{}])/', $for_semicolon, 0, PREG_SPLIT_NO_EMPTY);






                $_SESSION['split_code'] = $split;
                $_SESSION['files'] = $entry;
                $_SESSION['trimmed'] = $trim;

                $_SESSION['filename'] = $entry;
           }
        }
        closedir($handle);
    }
}

?>


<?php if (isset($_POST['submit_content'])){

    $paste_contents = $_POST['paste_contents'];


    $single = preg_replace('![ \t]*//.*[ \t]*[\r\n]!', '', $paste_contents);

    $multiple = preg_replace('#/\*[^*]*\*+([^/][^*]*\*+)*/#', '', $single);
    $excess = preg_replace('/\s+/', ' ', $multiple);
    $trim = trim($excess," ");
    $for_semicolon = preg_replace('/;(?=((?!\().)*?\))/', ';', $trim);
    $split = preg_split('/(?<=[;{}])/', $for_semicolon, 0, PREG_SPLIT_NO_EMPTY);

    $_SESSION['split_code'] = $split;
    $_SESSION['files'] = $entry;
    $_SESSION['trimmed'] = $trim;
}
?>
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
      <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
          <div class="row">
                <div style="width: 100%" class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <div class="row">
                            <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                                <div class="kt-portlet kt-portlet--mobile">
                                    <div class="kt-portlet__head kt-portlet__head--lg">
                                        <div class="kt-portlet__head-label">
                                            <h3 style="font-family: 'Arial'; color: black">
                                                Total Complexity of the Program by Statement : </h3>&nbsp;
                                            <h3 style="font-family: 'Arial'; color: green"><?php


                                                if(isset($_SESSION['filename'])){
                                                    $file = $_SESSION['filename'];
                                                    echo $file;
                                                }

                                                ?>
                                            </h3>
                                        </div>

                                    </div>

                                    <div class="kt-portlet__body kt-font-dark">

                                        <table style="font-family: 'Arial'; text-align: center" class="table table-bordered table-dark" id="totalweighttable">
                                            <thead>
                                            <tr style="font-family: 'Arial'">
                                                <th>Line No</th>
                                                <th>Program Statements</th>
                                                <th>Cs</th>
                                                <th>Cv</th>
                                                <th>Cm</th>
                                                <th>Ci</th>
                                                <th>Ccp</th>
                                                <th>Ccs</th>
                                                <th style="color: white" class="kt-label-bg-color-2">TCps</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php

                                            if( isset($_SESSION['split_code']) ||  isset($_SESSION['trimmed'])  ||  isset($_SESSION['row_count'])    ){

                                            $split = $_SESSION['split_code'];
                                            $trim = $_SESSION['trimmed'];
                                            $i = 0;
                                            $count = 0;
                                            if (!$split==""){
                                            foreach($split AS $val) {
                                                $val;
                                            }




                                            ?>
                                            <tr>
                                                <td><?php echo $count=$count+1; ?></td>
                                                <td style="text-align: left"><?php echo $val; ?></td>

                                                <td><a href="size.php?total_cs=<?php echo $total_cs ?>"</a></td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td>0</td>
                                                <td style="color: white" class="kt-label-bg-color-1">2</td>
                                                <?php $i++; }}?>
                                            </tr>




                                            <?php
                                            if(isset($_SESSION['row_count'])){
                                                $_SESSION['row_count'] = $i;
                                            }

                                            ?>

                                            </tbody>
                                            <tfoot>
                                            <tr class="kt-label-bg-color-1" style="font-family: 'Arial'">

                                                <th colspan="2">Total</th>
                                                <th>38</th>
                                                <th>1</th>
                                                <th>2</th>
                                                <th>0</th>
                                                <th>0</th>
                                                <th>9</th>
                                                <th style="color: white" class="kt-label-bg-color-2">50</th>
                                            </tr>
                                            </tfoot>
                                        </table>



                                    </div>
                                </div>
                            </div>

                        </div></div></div>


                <div class="kt-portlet__body kt-font-brand">
                    <div>
                        <div class="col-lg-12">
                            <div>
                                <div >
                                    <div>
                                        <div>
                                        <div class="col-lg-12">
                                            <div>

                                                <center><h1 style="font-family: 'Arial'; margin-left: 1130px; color: green"">Cpr : 50</h1></center>


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

function unlink_recursive($dir_name, $ext) {


    if (!file_exists($dir_name)) {
        return false;
    }


    $dir_handle = dir($dir_name);


    while (false !== ($entry = $dir_handle->read())) {

        if ($entry == '.' || $entry == '..') {
            continue;
        }

        $abs_name = "$dir_name/$entry";

        if (is_file($abs_name) && preg_match("/^.+\.$ext$/", $entry)) {
            if (unlink($abs_name)) {
                continue;
            }
            return false;
        }


        if (is_dir($abs_name) || is_link($abs_name)) {
            unlink_recursive($abs_name, $ext);
        }

    }

    $dir_handle->close();
    return true;

}

?>
<?php include 'include/Footer.php'; ?>
