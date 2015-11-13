<div class="col-lg-12">
    <ol class="breadcrumb">
        <li>
            <a href="<?php echo base_url('trang_chu'); ?>"><i class="fa fa-home"></i> Trang chủ</a>
        </li>
        <li>
            <a href="<?php echo base_url('tu_phap'); ?>"><i class="fa fa-files-o"></i> Hành chính tư pháp</a>
        </li>
        <li>
            <?php
            $dataname=array('Chứng thực','Khai sinh','Khai tử','Kết hôn','Giám hộ','Hộ tịch','Các thủ tục còn lại','Search');
            if (($aname<1)||($aname>8))$aname=7;
            echo '
            <a href="'.base_url('phan_muc/'.$aname.'').'">
                <i class="fa fa-file-o"></i> '.$dataname[$aname-1].'
            </a>
            ';?>
        </li>
        <li class="active">
            <i class="fa fa-file-o"></i> <?php echo html_escape($node_map->node_name); ?>
        </li>
    </ol>
    <h3 class="page-header marTop"><i class="fa fa-file-o"></i> <?php echo html_escape($node_map->node_name); ?></h3>

    <?php
    $today_1 =  date("Ymd");
    
    $thanh_phan_data = str_replace('<br>','', $thanh_phan_data);
    $arrayThutuc = explode("+", $thanh_phan_data);
    if(isset($message)){

        echo '<script type="text/javascript">alert("Thông tin đã được nhập"); window.location = "'.base_url().'admin/Admin_tiep_nhan";</script>';

    }
    ?>
        <div class="panel-body">
            <h4 class="page-header marTop">Thông tin của người làm hồ sơ</h4>
            <div class="panel-body">

                    
            <?php               
            $attributes = array('class'=>'form-horizontal');
            echo form_open(''.base_url().'Trang_chi_tiet', $attributes);?>
                        <!--Name Field-->
                <div class="form-group">
                    <label class="col-sm-2 control-label">Họ và tên  </label>
                    <div class="col-sm-6">
                    <input class="form-control" id="dname" type="text" name="dname"> <br >

                    </div>
                    <div class="error">* <?php echo form_error('dname'); ?><br ></div>

                    </div>

                        <!--Id field-->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Số CMND </label>
                            <div class="col-sm-6">
                                <input  class="form-control" id="inputCMND" type="text" name="dcmnd" >

                            </div>
                            <div class="error">* <?php echo form_error('dcmnd'); ?></div>

                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Số điện thoại </label>
                            <div class="col-sm-6">
                                <input class="form-control" id="inputPhone" type="text" name="dmobile" >

                            </div>
                            <div class="error">* <?php echo form_error('dmobile'); ?></div>

                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Địa chỉ  </label>
                            <div class="col-sm-6">
                                <input class="form-control"  type="text" name="diachi" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Số ngày giải quyết </label>
                            <div class="col-sm-2">
                                <input class="form-control" id="songay" onBlur="doMacBook();" type="lable" name="songay" >

                            </div>
                            <div class="error"><span class="error">* <?php echo form_error('songay'); ?></span></div>

                        </div>
                        <!-- For saving purpose-->
                        <input type="text" id="ma_Ho_So" name="ma_Ho_So"   style="visibility: hidden" >

                        <!--Tài liệu kèm theo đơn -->
                        <fieldset>
                            <legend><h4>Giấy tờ kèm theo</h4></legend>
                            <b style="color:Red;">Số lượng:</b>

                            <?php for ($i = 1; $i <= count($arrayThutuc); $i+=1) { 
                                 if ($i < count($arrayThutuc)) {
                                    $checkBox = "chk".$i;
                                    $form = "myDiv".$i;
                                    $number = "myNumber".$i;
                                    echo'
                                   <ul class="container-fluid">
                                        <li class="row" >
                                            <p class="col-sm-2 col-md-2 col-xs-2 "  id ="'.$form.'" >
                                            <input  id = "'.$number.'"  type="number" min="1" max="30" step="1" value="1" size="1">
                                            </p>
                                            <input class="col-sm-1 col-md-1 col-xs-1"  type="checkbox"  name="chk_group" id= "'. $checkBox.'" onclick="display('.$i.')" value="'.$arrayThutuc[$i].'">
                                            <div class="col-sm-9 col-md-9 col-xs-9"  > '.$arrayThutuc[$i].'</div>

                                        </li>
                                   </ul>';
                                 } 
                             } ?>
                        </fieldset>
                        <fieldset>
                            <legend><h4>Ghi chú đính kèm</h4></legend>
                            <input class="form-control"  type="text" name="note" ><br>
                        </fieldset>
                        <fieldset class="form-horizontal">
                            <legend><h4>Lệ phí</h4></legend>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Lệ phí một bản:  </label>
                                <div class="col-sm-3">
                                   
                                <input  onBlur="checkLePhi();" onfocus="if(this.value=='400.000') this.value='';" class="form-control" value="<?php echo $le_phi; ?>" id="lephi" type="text"  readonly <br />
                                
                                </div>
                                <div class="error"> <label class="col-sm-2 control-label">Số bản:  </label><span class="error">
                                    <div class="col-sm-3">
                                        <input  class="form-control" id="sobang" name="sobang" onBlur="doMath();" type="text"  placeholder="Nhập số bản  " <br />

                                    </div>
                                             <div class="error"><span class="error">* <?php echo form_error('sobang'); ?><br /</span></div>

                                            <br /</span></div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Thành tiền :  </label>
                                <div class="col-sm-3">
                                    <input  class="form-control" id="tongcong" name ="tong_cong" type="text"  readonly <br />

                                </div>
                                <div ><i><b>đồng</b></i>
                                    <!--List of temporary textboxs-->
                                    <input type="text" id="ying_ho_so_da_nhan" name = "dying" style="visibility: hidden" >
                                    <!--YingLo-->
                                    <input type="hidden" id="today_1"  value="<?php echo date("His",time()+1) ; ?>"  >
                                    <input type="hidden" id="today_2" value="<?php echo date("dmy"); ?>" >
                                    <input type="hidden" id="so_ngay" value="<?php echo $so_ngay; ?>"  >
                                    <input type="hidden" id="node_id" value="<?php echo $node_map->node_id; ?>"  >

                                </div>
                            </div>

                        </fieldset>

                        <!-- <input type="checkbox" onclick="myCheckboxFunction();"> -->


                        <input type="submit"  onclick="compileInputs();" class="btn btn-success btn-lg btn-block" id = 'submit'name="submit" value="Nhập hồ sơ">

                    </form><!-- End form -->

                </div><!--Panel body-->
        </div><!--End body-->
<script type="text/javascript">
    //Prevent user from entering characters
    $("#inputCMND,#inputPhone,#sobang,#lephi,#songay,p").keypress(function(e) {
        var key_codes = [48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 0, 8];

        if (!($.inArray(e.which, key_codes) >= 0)) {
            e.preventDefault();
        }
    }); //
    function compileInputs() {
        var inputsThanhPhan = new Array();
        var inputsSoLuong = new Array();
        $(':checkbox').each(function () {
            if ($(this).is(':checked')) {
                var thenum = this.id.match(/\d+/)[0];
                var soLuong = document.getElementById("myNumber" + thenum);
                inputsSoLuong.push(soLuong);
                inputsThanhPhan.push( $(this).val());
            }
        });

        for (i = 0; i < inputsSoLuong.length; i++) {
            inputsThanhPhan[i] = inputsThanhPhan[i]+"+"+"<b>"+inputsSoLuong[i].value+"</b>"+"+";
        }
        document.getElementById("ying_ho_so_da_nhan").value = inputsThanhPhan;
    }

    function checkLePhi(){
        var myYing = document.getElementById('ma_Ho_So').value;
        if(myYing.substr(16,2)=="20"){

            var lephiNew = parseInt(document.getElementById('lephi').value);
            if(lephiNew != 400 && lephiNew != 0){
                alert("Kiểm tra lại tiền lệ phí!");
                document.getElementById('lephi').value = "400.000";
                document.getElementById('sobang').value = "";
                document.getElementById('tongcong').value = "0";

            }
        }
    }

    function doMath() {
        var lephi = parseInt(document.getElementById('lephi').value);
        var sobang = parseInt(document.getElementById('sobang').value);
        var total = 0;
        var myVarPro = 1;//
        var myYing = document.getElementById('ma_Ho_So').value;

        if( myYing.substr(16,2) =="01" ){

            if(sobang >= 2){
               total = 2*2+(sobang-2)*1;
            }else{
                total =lephi * sobang;
            }
            if(total > 100) {
                total = 100;
            }
        }
        else{
            total =lephi * sobang;
        }
        document.getElementById('tongcong').value = total+"000";

    }
    var string_1 = "TP";
    var myDayVar = document.getElementById("so_ngay").value;
    var theLifeOfWolf = 0;
    var theLifeOfYing = 0;
    document.getElementById("songay").value = myDayVar;
    var node_id = parseInt(document.getElementById('node_id').value);

    if(node_id >1){
        theLifeOfWolf = node_id -1;
        if(theLifeOfWolf < 10){
            theLifeOfYing = "0"+theLifeOfWolf;
        }else{
            theLifeOfYing = theLifeOfWolf;
        }
    }
    var theString = document.getElementById("today_1").value + "-" + document.getElementById("today_2").value + "-" + string_1 + theLifeOfYing + "-" ;
    var addCode = 2015;
    if( myDayVar == 0){
        addCode = "00";
    }else{
        addCode = document.getElementById("songay").value;
    }
    theString = theString + addCode;
    document.getElementById("ma_Ho_So").value = theString;
    //OK
    var myProcess = document.getElementById('ma_Ho_So').value;
    if( myProcess.substr(16,2) =="20" ){
        document.getElementById('lephi').readOnly = false;
    }
    function doMacBook(){
        var myDayVar = document.getElementById("songay").value;

        var string_1 = "TP";
        var theLifeOfWolf = 0;
        var theLifeOfYing = 0;
        document.getElementById("songay").value = myDayVar;
        var node_id = parseInt(document.getElementById('node_id').value);

        if(node_id >1){
            theLifeOfWolf = node_id -1;
            if(theLifeOfWolf < 10){
                theLifeOfYing = "0"+theLifeOfWolf;
            }else{
                theLifeOfYing = theLifeOfWolf;
            }
        }
        var theString = document.getElementById("today_1").value + "-" + document.getElementById("today_2").value + "-" + string_1 + theLifeOfYing + "-" ;

        var addCode = 2015;


        if( myDayVar == 0){
            addCode = "00";
        }else{
            addCode = document.getElementById('songay').value;
        }
        theString = theString + addCode;
        document.getElementById("ma_Ho_So").value = theString;
    }
    //OK-
</script>
