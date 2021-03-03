<?php include 'include/Header.php'; ?>
<?php include 'include/Sidebar.php'; ?>



<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
<div class="row">

    <div class="col-lg-12">
    <div class="kt-portlet kt-portlet--tabs">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-toolbar">
                <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-brand nav-tabs-line-2x nav-tabs-line-right nav-tabs-bold" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" style="color: green" data-toggle="tab" href="#kt_portlet_base_demo_3_3_tab_content" role="tab">
                            <i style="color: green" class="flaticon2-arrow-1" aria-hidden="true"></i>Size
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"   style="color: green" data-toggle="tab" href="#kt_portlet_base_demo_3_4_tab_content" role="tab">
                            <i  style="color: green"  class="flaticon2-graphic-1" aria-hidden="true"></i>Variables
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  style="color: green"  data-toggle="tab" href="#kt_portlet_base_demo_3_5_tab_content" role="tab">
                            <i   style="color: green" class="flaticon2-menu" aria-hidden="true"></i>Methods
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  style="color: green"  data-toggle="tab" href="#kt_portlet_base_demo_3_6_tab_content" role="tab">
                            <i  style="color: green"  class="flaticon2-group" aria-hidden="true"></i>Inheritance
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  style="color: green"  data-toggle="tab" href="#kt_portlet_base_demo_3_7_tab_content" role="tab">
                            <i  style="color: green"  class="flaticon2-graphic-design" aria-hidden="true"></i>Coupling
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  style="color: green"  data-toggle="tab" href="#kt_portlet_base_demo_3_8_tab_content" role="tab">
                            <i  style="color: green"  class="flaticon2-pie-chart-2" aria-hidden="true"></i>Control Structures
                        </a>
                    </li>
                </ul>
            </div>

        </div>
        <div style="width:100%" class="kt-portlet__body">
            <div class="tab-content">
                <div class="tab-pane active" id="kt_portlet_base_demo_3_3_tab_content" role="size">
                    <!-- Start of Size -->

                    <?php

                    $Final = "SELECT * FROM sizevalues ORDER BY Sid DESC LIMIT 1";
                    $run_query_last = mysqli_query($con,$Final);

                    while ($lastrow = mysqli_fetch_assoc($run_query_last)) {
                    $SizeID_last = $lastrow['Sid'];
                    $Keyword_last = $lastrow['Keyword'];
                    $Identifier_last = $lastrow['Identifier'];
                    $Operator_last = $lastrow['Operator'];
                    $NumericalValue_last = $lastrow['NumericalValue'];
                    $StringLiteral_last = $lastrow['StringLiteral'];

                    ?>


                    <h5 class="kt-font-brand">Change Size weights</h5>
                    <hr>

                    <div class="col-lg-10">
                    <div class="kt-section__content">
                        <form action="" method="post" class="kt-form">
                        <table style="text-align: center;" class="table table-bordered table-dark">
                            <thead  >
                            <tr >
                                <th>Program Component</th>
                                <th>Weight</th>

                            </tr>
                            </thead>
                            <tbody>

                            <?php


                            ?>

                            <tr>
                                <td class="kt-font-bold"><label style="margin-top: 7%;">Keyword</label></td>
                                <td align="center"> <input value="<?php echo $Keyword_last; ?>" style="text-align: center" id="Keyword" name="Keyword" type="number" class="form-control"></td>

                            </tr>
                            <tr>
                                <td class="kt-font-bold"><label style="margin-top: 7%;">Identifier</label></td>
                                <td align="center"> <input value="<?php echo $Identifier_last; ?>" style="text-align: center" id="Identifier" name="Identifier" type="number" class="form-control"></td>

                            </tr>
                            <tr>
                                <td class="kt-font-bold"><label style="margin-top: 7%;">Operator</label></td>
                                <td align="center">  <input value="<?php echo $Operator_last; ?>" style="text-align: center" id="Operator" name="Operator" type="number" class="form-control"></td>

                            </tr>
                            <tr>
                                <td class="kt-font-bold"><label style="margin-top: 7%;">Numerical Value</label></td>
                                <td align="center"> <input value="<?php echo $NumericalValue_last; ?>" style="text-align: center" id="NumericalValue" name="NumericalValue" type="number" class="form-control"></td>


                            </tr>
                            <tr>
                                <td class="kt-font-bold"><label style="margin-top: 7%;">String literal</label></td>
                                <td align="center"> <input value="<?php echo $StringLiteral_last; ?>" style="text-align: center" id="StringLiteral" name="StringLiteral" type="number" class="form-control"></td>

                            </tr>

                            </tbody>
                        </table>
                    </div>
                    </div>

                    <br><hr>
                               <center> <button type="submit" name="submitSize" id="submitSize"  class="btn btn-success">Save</button>
                                <button type="submit" name="resetSize" id="resetSize" class="btn btn-danger">Reset </button></center>



                </div>
                </form>
                <?php } ?>
                <?php
                if(isset($_POST['resetSize'])){

                $resetWeights= "DELETE FROM sizevalues WHERE Sid NOT IN ( SELECT * FROM ( SELECT Sid FROM sizevalues ORDER BY Sid LIMIT 1) s)";
                mysqli_query($con,$resetWeights);
                echo '<meta http-equiv=Refresh content="0;url=Default_weight.php?reload=1">';

                } ?>

                <?php

                if(isset($_POST['submitSize'])){


                    $Keyword_Weight=$_POST['Keyword'];
                    $Identifier_Weight=$_POST['Identifier'];
                    $Operator_Weight=$_POST['Operator'];
                    $NumericalValue=$_POST['NumericalValue'];
                    $StringLiteral=$_POST['StringLiteral'];

                    $query = "INSERT INTO sizevalues(Keyword,Identifier,Operator,NumericalValue,StringLiteral) VALUES('$Keyword_Weight','$Identifier_Weight','$Operator_Weight','$NumericalValue','$StringLiteral')";

                    $create_query = mysqli_query($con, $query);

                    if ( $create_query ) {
                        echo " <div class='alert alert-solid-success alert-bold' role='alert'>";
                        echo " <div class='alert-text'>Successfully Saved.</div>";
                        echo " </div>";
                        echo '<meta http-equiv=Refresh content="0;url=Default_weight.php?reload=1">';

                    }else{
                        echo " <div class='alert alert-solid-danger alert-bold' role='alert'>";
                        echo " <div class='alert-text'>Something went wrong.</div>";
                        echo " </div>";
                    }



                }


                ?>
                <!--  Size -->


                <div class="tab-pane" id="kt_portlet_base_demo_3_4_tab_content" role="variable">

                    <?php

                    $lastRow = "SELECT * FROM variablesvalues ORDER BY vid DESC LIMIT 1";
                    $run_query_last = mysqli_query($con,$lastRow);

                    while ($lastrow = mysqli_fetch_assoc($run_query_last)) {
                    $VariableID_last = $lastrow['vid'];
                    $GlobalVariable_last = $lastrow['GlobalVariable'];
                    $LocalVariable_last = $lastrow['LocalVariable'];
                    $PrimitiveVariable_last = $lastrow['PrimitiveVariable'];
                    $CompositeVariable_last = $lastrow['CompositeVariable'];


                    ?>


                    <h5 class="kt-font-brand">Change Variable weights</h5>
                    <hr>

                    <div class="col-lg-10">
                        <div class="kt-section__content">
                            <form action="" method="post" class="kt-form">
                            <table style="text-align: center;" class="table table-bordered table-dark">
                                <thead>
                                <tr>
                                    <th>Program Component</th>
                                    <th>Weight</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="kt-font-bold"><label style="margin-top: 7%;">Global variable</label></td>
                                    <td align="center"> <input value="<?php echo $GlobalVariable_last; ?>" style="text-align: center" id="GlobalVariable" name="GlobalVariable" type="number" class="form-control"></td>

                                </tr>
                                <tr>
                                    <td class="kt-font-bold"><label style="margin-top: 7%;">Local variable</label></td>
                                    <td align="center"> <input value="<?php echo $LocalVariable_last; ?>" style="text-align: center" id="LocalVariable" name="LocalVariable" type="number" class="form-control"></td>

                                </tr>
                                <tr>
                                    <td class="kt-font-bold"><label style="margin-top: 7%;">Primitive data type variable</label></td>
                                    <td align="center"> <input value="<?php echo $PrimitiveVariable_last; ?>" style="text-align: center" id="PrimitiveVariable" name="PrimitiveVariable" type="number" class="form-control"></td>

                                </tr>
                                <tr>
                                    <td class="kt-font-bold"><label style="margin-top: 7%;">Composite data type variable</label></td>
                                    <td align="center"> <input value="<?php echo $CompositeVariable_last; ?>" style="text-align: center" id="CompositeVariable" name="CompositeVariable" type="number" class="form-control"></td>

                                </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>

                    <br><hr>
                    <center> <button type="submit" name="submitVariable" id="submitVariable"  class="btn btn-success">Save</button>
                        <button type="submit" name="resetVariable" id="resetVariable" class="btn btn-danger">Reset </button></center>
                </div>
                </form>
            <?php } ?>
                <?php
                if(isset($_POST['resetVariable'])){

                    $resetWeights= "DELETE FROM variablesvalues WHERE vid NOT IN ( SELECT * FROM ( SELECT vid FROM variablesvalues ORDER BY vid LIMIT 1) s)";
                    mysqli_query($con,$resetWeights);
                    echo '<meta http-equiv=Refresh content="0;url=Default_weight.php?reload=1">';

                } ?>

                <?php

                if(isset($_POST['submitVariable'])){


                    $GlobalVariable=$_POST['GlobalVariable'];
                    $LocalVariable=$_POST['LocalVariable'];
                    $PrimitiveVariable=$_POST['PrimitiveVariable'];
                    $CompositeVariable=$_POST['CompositeVariable'];

                    $query = "INSERT INTO variablesvalues(GlobalVariable,LocalVariable,PrimitiveVariable,CompositeVariable) VALUES('$GlobalVariable','$LocalVariable','$PrimitiveVariable','$CompositeVariable')";

                    $create_query = mysqli_query($con, $query);

                    if ( $create_query ) {
                        echo " <div class='alert alert-solid-success alert-bold' role='alert'>";
                        echo " <div class='alert-text'>Successfully Saved.</div>";
                        echo " </div>";
                        echo '<meta http-equiv=Refresh content="0;url=Default_weight.php?reload=1">';

                    }else{
                        echo " <div class='alert alert-solid-danger alert-bold' role='alert'>";
                        echo " <div class='alert-text'>Something went wrong.</div>";
                        echo " </div>";
                    }


                }


                ?>
                <!-- Variables -->


                <div class="tab-pane" id="kt_portlet_base_demo_3_5_tab_content" role="methods">

                    <?php

                    $lastRow = "SELECT * FROM methodsvalue ORDER BY mid DESC LIMIT 1";
                    $run_query_last = mysqli_query($con,$lastRow);

                    while ($lastrow = mysqli_fetch_assoc($run_query_last)) {
                    $MethodID_last = $lastrow['mid'];
                    $PrimitiveReturnType_last = $lastrow['PrimitiveReturnType'];
                    $CompositeReturnType_last = $lastrow['CompositeReturnType'];
                    $VoidReturnType_last = $lastrow['VoidReturnType'];
                    $PrimitiveParameter_last = $lastrow['PrimitiveParameter'];
                    $CompositeParameter_last = $lastrow['CompositeParameter'];

                    ?>

                    <h5 class="kt-font-brand">Change Method weights </h5>
                    <hr>

                    <div class="col-lg-10">
                        <div class="kt-section__content">
                            <form action="" method="post" class="kt-form">
                            <table style="text-align: center;" class="table table-bordered table-dark">
                                <thead >
                                <tr>
                                    <th>Program Component</th>
                                    <th>Weight</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="kt-font-bold"><label style="margin-top: 7%;">Method with a primitive return type</label></td>
                                    <td align="center"> <input value="<?php echo $PrimitiveReturnType_last; ?>" style="text-align: center" id="PrimitiveReturnType" name="PrimitiveReturnType" type="number" class="form-control"></td>

                                </tr>
                                <tr>
                                    <td class="kt-font-bold"><label style="margin-top: 7%;">Method with a composite return type </label></td>
                                    <td align="center"> <input value="<?php echo $CompositeReturnType_last; ?>" style="text-align: center" id="CompositeReturnType" name="CompositeReturnType" type="number" class="form-control"></td>

                                </tr>
                                <tr>
                                    <td class="kt-font-bold"><label style="margin-top: 7%;">Method with a void return type </label></td>
                                    <td align="center"> <input value="<?php echo $VoidReturnType_last; ?>" style="text-align: center" id="VoidReturnType" name="VoidReturnType" type="number" class="form-control"></td>

                                </tr>
                                <tr>
                                    <td class="kt-font-bold"><label style="margin-top: 7%;">Primitive data type parameter</label></td>
                                    <td align="center"> <input value="<?php echo $PrimitiveParameter_last; ?>" style="text-align: center" id="PrimitiveParameter" name="PrimitiveParameter" type="number" class="form-control"></td>

                                </tr>
                                <tr>
                                    <td class="kt-font-bold"><label style="margin-top: 7%;">Composite data type parameter</label></td>
                                    <td align="center"> <input value="<?php echo $CompositeParameter_last; ?>" style="text-align: center" id="CompositeParameter" name="CompositeParameter" type="number" class="form-control"></td>

                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <br><hr>
                    <center> <button type="submit" name="submitMethods" id="submitMethods"  class="btn btn-success">Save</button>
                        <button type="submit" name="resetMethods" id="resetMethods" class="btn btn-danger">Reset </button></center>
                </div>
                </form>
            <?php } ?>
                <?php
                if(isset($_POST['resetMethods'])){

                    $resetWeights= "DELETE FROM  methodsvalue WHERE mid NOT IN ( SELECT * FROM ( SELECT mid FROM methodsvalue ORDER BY mid LIMIT 1) s)";
                    mysqli_query($con,$resetWeights);
                    echo '<meta http-equiv=Refresh content="0;url=Default_weight.php?reload=1">';

                } ?>

                <?php

                if(isset($_POST['submitMethods'])){

                    $PrimitiveReturnType=$_POST['PrimitiveReturnType'];
                    $CompositeReturnType=$_POST['CompositeReturnType'];
                    $VoidReturnType=$_POST['VoidReturnType'];
                    $PrimitiveParameter=$_POST['PrimitiveParameter'];
                    $CompositeParameter=$_POST['CompositeParameter'];

                    $query = "INSERT INTO methodsvalue(PrimitiveReturnType,CompositeReturnType,VoidReturnType,PrimitiveParameter,CompositeParameter) VALUES('$PrimitiveReturnType','$CompositeReturnType','$VoidReturnType','$PrimitiveParameter','$CompositeParameter')";

                    $create_query = mysqli_query($con, $query);

                    if ( $create_query ) {
                        echo " <div class='alert alert-solid-success alert-bold' role='alert'>";
                        echo " <div class='alert-text'>Successfully Saved.</div>";
                        echo " </div>";
                        echo '<meta http-equiv=Refresh content="0;url=Default_weight.php?reload=1">';

                    }else{
                        echo " <div class='alert alert-solid-danger alert-bold' role='alert'>";
                        echo " <div class='alert-text'>Something went wrong.</div>";
                        echo " </div>";
                    }


                }


                ?>
                <!-- Methods -->






                <div class="tab-pane" id="kt_portlet_base_demo_3_6_tab_content" role="tabpanel">
                    <h5 class="kt-font-brand">Change Inheritance weights </h5>
                    <hr>

                    <div class="col-lg-12">
                        <div class="kt-section__content">
                            <table style="text-align: center;" class="table table-bordered table-dark">
                                <thead >
                                <tr>
                                    <th>Program Component</th>
                                    <th>Weight</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="kt-font-bold"><label>A class with no Inheritance (direct or indirect) </label></td>
                                    <td align="center"><input type="number" class="col-lg-5 form-control" placeholder="0"></td>

                                </tr>
                                <tr>
                                    <td class="kt-font-bold"><label>A class inheriting (directly or indirectly) from one user-defined class </label></td>
                                    <td align="center"><input type="number" class="col-lg-5 form-control" placeholder="1"></td>

                                </tr>
                                <tr>
                                    <td class="kt-font-bold"><label>A class inheriting (directly or indirectly) from two user-defined classes              </label></td>
                                    <td align="center"><input type="number" class="col-lg-5 form-control" placeholder="2"></td>

                                </tr>
                                <tr>
                                    <td class="kt-font-bold"><label>A class inheriting (directly or indirectly) from three user-defined classes</label></td>
                                    <td align="center"><input type="number" class="col-lg-5 form-control" placeholder="3"></td>

                                </tr>
                                <tr>
                                    <td class="kt-font-bold"><label>A class inheriting  (directly or indirectly) from more than three user-defined classes </label></td>
                                    <td align="center"><input type="number" class="col-lg-5 form-control" placeholder="4"></td>

                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <br><hr>
                    <center> <button type="submit" class="btn btn-success">Save</button>
                        <button type="submit" class="btn btn-danger">Reset</button></center>
                </div>











                <div class="tab-pane" id="kt_portlet_base_demo_3_7_tab_content" role="tabpanel">
                    <h5 class="kt-font-brand">Change Coupling weights </h5>
                    <hr>

                    <div class="col-lg-12">
                        <div class="kt-section__content">
                            <table style="text-align: center;" class="table table-bordered table-dark">
                                <thead >
                                <tr>
                                    <th>Program Component</th>
                                    <th>Weight</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="kt-font-bold"><label>A recursive call</label></td>
                                    <td align="center"><input type="number" class="col-lg-5 form-control" placeholder="2"></td>

                                </tr>
                                <tr>
                                    <td class="kt-font-bold"><label>A regular method calling another Regular method in the same file </label></td>
                                    <td align="center"><input type="number" class="col-lg-5 form-control" placeholder="2"></td>

                                </tr>
                                <tr>
                                    <td class="kt-font-bold"><label>A regular method calling another Regular method in a different file </label></td>
                                    <td align="center"><input type="number" class="col-lg-5 form-control" placeholder="3"></td>

                                </tr>
                                <tr>
                                    <td class="kt-font-bold"><label>A regular method calling a Recursive method in the same file</label></td>
                                    <td align="center"><input type="number" class="col-lg-5 form-control" placeholder="3"></td>

                                </tr>
                                <tr>
                                    <td class="kt-font-bold"><label>A regular method calling a Recursive method in a different file</label></td>
                                    <td align="center"><input type="number" class="col-lg-5 form-control" placeholder="4"></td>

                                </tr>

                                <tr>
                                    <td class="kt-font-bold"><label>A recursive method calling another Recursive method in the same file </label></td>
                                    <td align="center"><input type="number" class="col-lg-5 form-control" placeholder="4"></td>

                                </tr>

                                <tr>
                                    <td class="kt-font-bold"><label>A recursive method calling another Recursive method in a different file </label></td>
                                    <td align="center"><input type="number" class="col-lg-5 form-control" placeholder="5"></td>

                                </tr>

                                <tr>
                                    <td class="kt-font-bold"><label>A recursive method calling a  Regular method in the same file </label></td>
                                    <td align="center"><input type="number" class="col-lg-5 form-control" placeholder="3"></td>

                                </tr>

                                <tr>
                                    <td class="kt-font-bold"><label>A recursive method calling a  Regular method in a different file</label></td>
                                    <td align="center"><input type="number" class="col-lg-5 form-control" placeholder="4"></td>

                                </tr>

                                <tr>
                                    <td class="kt-font-bold"><label>A  regular method referencing a Global Variable in the same file </label></td>
                                    <td align="center"><input type="number" class="col-lg-5 form-control" placeholder="1"></td>

                                </tr>

                                <tr>
                                    <td class="kt-font-bold"><label>A  regular method referencing a Global Variable in a different file </label></td>
                                    <td align="center"><input type="number" class="col-lg-5 form-control" placeholder="2"></td>

                                </tr>

                                <tr>
                                    <td class="kt-font-bold"><label>A recursive method referencing a Global Variable in the same file </label></td>
                                    <td align="center"><input type="number" class="col-lg-5 form-control" placeholder="1"></td>

                                </tr>

                                <tr>
                                    <td class="kt-font-bold"><label>A recursive method referencing a Global Variable in a different file </label></td>
                                    <td align="center"><input type="number" class="col-lg-5 form-control" placeholder="2"></td>

                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <br><hr>
                    <center> <button type="submit" class="btn btn-success">Save</button>
                        <button type="submit" class="btn btn-danger">Reset</button></center>
                </div>






                <--Start of CONTROL STRUCTURES-->
                <div class="tab-pane" id="kt_portlet_base_demo_3_8_tab_content" role="tabpanel">

                    <?php

                    $Final = "SELECT * FROM controlstructurevalues ORDER BY ID DESC LIMIT 1";
                    $run_query_last = mysqli_query($con,$Final);

                    while ($lastrow = mysqli_fetch_assoc($run_query_last)) {
                    $ID_last = $lastrow['ID'];
                    $valueIf_last = $lastrow['valueIf'];
                    $valueFor_last = $lastrow['valueFor'];
                    $valueSwitch_last = $lastrow['valueSwitch'];
                    $valueCase_last = $lastrow['valueCase'];

                    ?>

                    <h5 class="kt-font-brand">Change  Control Structure  weights</h5>
                    <hr>

                    <div class="col-lg-10">
                        <div class="kt-section__content">
                            <form action="" method="post" class="kt-form">
                                <table style="text-align: center;" class="table table-bordered table-dark">
                                    <thead >
                                    <tr>
                                        <th>Program Component</th>
                                        <th>Weight</th>

                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php


                                    ?>
                                    <tr>
                                        <td class="kt-font-bold"><label>‘if’ or ‘else-if’</label></td>
                                        <td align="center"><input value="<?php echo $valueIf_last; ?>" style="text-align: center" id="valueIf" name="valueIf" type="number" class="form-control"></td>

                                    </tr>
                                    <tr>
                                        <td class="kt-font-bold"><label>‘for’, ‘while’, or ‘do-while’</label></td>
                                        <td align="center"><input value="<?php echo $valueFor_last; ?>" style="text-align: center" id="valueFor" name="valueFor" type="number" class="form-control"></td>

                                    </tr>
                                    <tr>
                                        <td class="kt-font-bold"><label>‘switch’ statement in a ‘switch-case’</label></td>
                                        <td align="center"><input value="<?php echo $valueSwitch_last; ?>" style="text-align: center" id="valueSwitch" name="valueSwitch" type="number" class="form-control"></td>

                                    </tr>
                                    <tr>
                                        <td class="kt-font-bold"><label>‘case’ statement in a ‘switch-case’</label></td>
                                        <td align="center"><input value="<?php echo $valueCase_last; ?>" style="text-align: center" id="valueCase" name="valueCase" type="number" class="form-control"></td>

                                    </tr>


                                    </tbody>
                                </table>
                        </div>
                    </div>

                    <br><hr>
                    <center> <button type="submit" name="submitControlStructure" id="submitControlStructure"  class="btn btn-success">Save</button>
                        <button type="submit" name="resetControlStructure" id="resetControlStructure" class="btn btn-danger">Reset </button></center>

                </div>
                </form>
            <?php } ?>
                <?php
                if(isset($_POST['resetControlStructure'])){

                    $resetWeights= "DELETE FROM controlstructurevalues WHERE ID NOT IN ( SELECT * FROM ( SELECT ID FROM controlstructurevalues ORDER BY ID LIMIT 1) s)";
                    mysqli_query($con,$resetWeights);
                    echo '<meta http-equiv=Refresh content="0;url=change_weight.php?reload=1">';

                } ?>

                <?php

                if(isset($_POST['submitControlStructure'])){

                    $valueIf=$_POST['valueIf'];
                    $valueFor=$_POST['valueFor'];
                    $valueSwitch=$_POST['valueSwitch'];
                    $valueCase=$_POST['valueCase'];

                    $query = "INSERT INTO controlstructurevalues(valueIf,valueFor,valueSwitch,valueCase) VALUES('$valueIf','$valueFor','$valueSwitch','$valueCase')";

                    $create_query = mysqli_query($con, $query);

                    if ( $create_query ) {
                        echo " <div class='alert alert-solid-success alert-bold' role='alert'>";
                        echo " <div class='alert-text'>Successfully Saved.</div>";
                        echo " </div>";
                        echo '<meta http-equiv=Refresh content="0;url=Default_weight.php?reload=1">';
                    }else{
                        echo " <div class='alert alert-solid-danger alert-bold' role='alert'>";
                        echo " <div class='alert-text'>Something went wrong.</div>";
                        echo " </div>";
                    }
                }
                ?>




            </div>
        </div>

    </div>
    </div>



</div>

						</div>
					</div>

<?php include 'include/Footer.php'; ?>
