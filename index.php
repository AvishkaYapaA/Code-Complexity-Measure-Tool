<?php include 'include/Header.php'; ?>
<?php include 'include/Sidebar.php'; ?>

<?php

unset ($_SESSION["split_code"]);
unset ($_SESSION["trimmed"]);
unset ($_SESSION["filename"]);
unset ($_SESSION["row_count"]);


$folder = 'uploads';


$files = glob($folder . '/*');


foreach($files as $file){

    if(is_file($file)){

        unlink($file);
    }
}
?>
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">


<div class="row">

    <div class="kt-portlet col-lg-6 ">
        <div class="kt-portlet__head ">
            <div class="kt-portlet__head-label">
            </div>


        <form action="total_weight.php" method="post" enctype="multipart/form-data" class="kt-form kt-form--label-right">
            <div class="kt-portlet__body col-lg-12">
                <div class="form-group row ">

                    <div class="col-lg-12 col-md-9 col-sm-12">
                        <div class="dropzone dropzone-default dropzone-success col-lg-12" id="kt_dropzone_3">
                            <div class="dropzone-msg dz-message needsclick">

                                <h3 class="dropzone-msg-title">Click here to Upload your files.</h3>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="kt-portlet__foot ">
                <div class="kt-form__actions">
                    <div class="row">
                        <div class="col-lg-8 ml-lg-auto">
                            <button type="submit" name="upload" id="upload" class="btn btn-brand">Upload</button>
                            <button onclick="location.href='index.php'" type="reset" id="reset" class="btn btn-secondary">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        </div>

    </div>


    <div class="kt-portlet col-lg-6 ">
        <div class="kt-portlet__head ">
            <div class="kt-portlet__head-label">
            </div>



            <form action="total_weight.php" method="post" class="kt-form kt-form--fit kt-form--label-right">
                <div class="kt-portlet__body col-lg-12">
                    <div class="form-group row is-valid">
                        <div class="col-lg-12 col-md-9 col-sm-12">
                            <textarea name="paste_contents" id="paste_contents" class="form-control" data-provide="markdown" rows="9"></textarea>

                        </div>
                    </div>

                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <div class="row">
                            <div class="col-lg-9 ml-lg-auto">
                                <input type="submit" name="submit_content" id="submit_content" class="btn btn-brand">
                                <input type="hidden" name="submit_content" value="1">
                                <button onclick="location.href='index.php'" type="reset" class="btn btn-secondary">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>


    </div>


							
</div>
						<!-- end:: Content -->
</div>

<?php include 'include/Footer.php'; ?>
