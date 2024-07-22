$(function() {
    
    $(".btn-cancel").on("click", function (e) {
        e.preventDefault();
        var dataUrl = $(this).data("url");
        window.location = dataUrl;

    });


    var formElements = function(){
        // Bootstrap datepicker
        var feDatepicker = function(){
            if($(".datepicker").length > 0){
                $(".datepicker").datepicker({format: 'yyyy-mm-dd'});
                $("#dp-2,#dp-3,#dp-4").datepicker(); // Sample
            }

        }// END Bootstrap datepicker

       //Bootstrap timepicker

    var feTimepicker = function(){
        // Default timepicker

        if($(".timepicker").length > 0)
        $('.timepicker').timepicker();
        // 24 hours mode timepicker
        if($(".timepicker24").length > 0)
        $(".timepicker24").timepicker({minuteStep: 5,showMeridian: false});
        }// END Bootstrap timepicker

        //Daterangepicker
        var feDaterangepicker = function(){
            if($(".daterange").length > 0)
               $(".daterange").daterangepicker({format: 'YYYY-MM-DD',startDate: '2013-01-01',endDate: '2013-12-31'});
        }
        // END Daterangepicker

        //Bootstrap colopicker
        var feColorpicker = function(){
            // Default colorpicker hex
            if($(".colorpicker").length > 0)
                $(".colorpicker").colorpicker({format: 'hex'});

            // RGBA mode
            if($(".colorpicker_rgba").length > 0)
                $(".colorpicker_rgba").colorpicker({format: 'rgba'});

            // Sample
            if($("#colorpicker").length > 0)
                $("#colorpicker").colorpicker();

        }// END Bootstrap colorpicker

        //Bootstrap select
        var feSelect = function(){
            if($(".select").length > 0){
                $(".select").selectpicker();

                $(".select").on("change", function(){
                    if($(this).val() == "" || null === $(this).val()){
                        if(!$(this).attr("multiple"))
                            $(this).val("").find("option").removeAttr("selected").prop("selected",false);
                    }else{
                        $(this).find("option[value="+$(this).val()+"]").attr("selected",true);
                    }
                });
            }
        }//END Bootstrap select


        //Validation Engine
        var feValidation = function(){
            if($("form[id^='validate']").length > 0){

                // Validation prefix for custom form elements
                var prefix = "valPref_";

                //Add prefix to Bootstrap select plugin
                $("form[id^='validate'] .select").each(function(){
                   $(this).next("div.bootstrap-select").attr("id", prefix + $(this).attr("id")).removeClass("validate[required]");
                });

                // Validation Engine init
                $("form[id^='validate']").validationEngine('attach', {promptPosition : "bottomLeft", scroll: false,
                                                                        onValidationComplete: function(form, status){
                                                                            form.validationEngine("updatePromptsPosition");
                                                                        },
                                                                        prettySelect : true,
                                                                        usePrefix: prefix
                                                                     });
            }
        }//END Validation Engine

        //Masked Inputs
        var feMasked = function(){
            if($("input[class^='mask_']").length > 0){
                $("input.mask_tin").mask('99-9999999');
                $("input.mask_ssn").mask('999-99-9999');
                $("input.mask_date").mask('9999-99-99');
                $("input.mask_product").mask('a*-999-a999');
                $("input.mask_phone").mask('99 (999) 999-99-99');
                $("input.mask_phone_ext").mask('99 (999) 999-9999? x99999');
                $("input.mask_credit").mask('9999-9999-9999-9999');
                $("input.mask_percent").mask('99%');
            }
        }//END Masked Inputs

        //Bootstrap tooltip
        var feTooltips = function(){
            $("body").tooltip({selector:'[data-toggle="tooltip"]',container:"body"});
        }//END Bootstrap tooltip

        //Bootstrap Popover
        var fePopover = function(){
            $("[data-toggle=popover]").popover();
            $(".popover-dismiss").popover({trigger: 'focus'});
        }//END Bootstrap Popover

        //Tagsinput
        var feTagsinput = function(){
            if($(".tagsinput").length > 0){

                $(".tagsinput").each(function(){

                    if($(this).data("placeholder") != ''){
                        var dt = $(this).data("placeholder");
                    }else
                        var dt = 'add a tag';

                    $(this).tagsInput({width: '100%',height:'auto',defaultText: dt});
                });

            }
        }// END Tagsinput

        //iCheckbox and iRadion - custom elements
        var feiCheckbox = function(){
            if($(".icheckbox").length > 0){
                 $(".icheckbox,.iradio").iCheck({checkboxClass: 'icheckbox_minimal-grey',radioClass: 'iradio_minimal-grey'});
            }
        }
        // END iCheckbox

        //Bootstrap file input
        var feBsFileInput = function(){

            if($("input.fileinput").length > 0)
                $("input.fileinput").bootstrapFileInput();

        }
        //END Bootstrap file input

        return {// Init all form element features
        init: function(){
                    feDatepicker();
                    feTimepicker();
                    feColorpicker();
                    feSelect();
                    feValidation();
                    feMasked();
                    feTooltips();
                    fePopover();
                    feTagsinput();
                    feiCheckbox();
                    feBsFileInput();
                    feDaterangepicker();
                }
        }
    }();

    var uiElements = function(){
        var dyntable;

        var loadAJAXDataTable = function (selector) {
            dyntable = $(selector).dataTable({
                order: [[0, 'asc']],
                aLengthMenu: [
                [15, 30, 50, 100, -1],
                [15, 30, 50, 100, "All"]
                ],
                'fnDrawCallback': function () {
                    $(document).trigger("bindMessageBox");
                }
            });
            
            $(selector).on('page.dt',function () {
                onresize(100);
            });
            
            $(".dataTables_wrapper input[type='search']").attr("placeholder", "Search...");
        }
        
        //Datatables
        var uiDatatable = function(){
            /* reportrange */
            if($("#reportrange").length > 0){
                $("#reportrange").daterangepicker({
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(7, 'days'), moment().subtract(1, 'days')],
                        'Last 30 Days': [moment().subtract(30, 'days'), moment().subtract(1, 'days')],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    opens: 'left',
                    buttonClasses: ['btn btn-default'],
                    applyClass: 'btn-small btn-primary',
                    cancelClass: 'btn-small',
                    format: 'MM.DD.YYYY',
                    separator: ' to ',
                    startDate: moment().subtract(30, 'days'),
                    endDate: moment().subtract(1, 'days')
                },function(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                    $("input.txt-startdate").val(start.format('YYYY-MM-DD'));
                    $("input.txt-enddate").val(end.format('YYYY-MM-DD'));
                    
                    if($("input.txt-reportname").length) {
                        if($.fn.dataTable.isDataTable('.reports-table')) {
                            dyntable.fnDestroy();
                        }
                        getOrdersReport();
                    }
                });
                
                $(".range_inputs input[type='text']").prop('readonly', 'readonly');
                $("#reportrange span").html(moment().subtract(30, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
                
                $("select.txt-status").on("change", function(e){
                    $(".hidden-status").val($(this).val());
                    
                    if($("input.txt-reportname").length) {
                        if($.fn.dataTable.isDataTable('.reports-table')) {
                            dyntable.fnDestroy();
                        }
                        getOrdersReport();
                    }
                });
                
            }
            /* end reportrange */

            if($("#grouprange").length > 0){

                $("select.txt-gender").on("change", function(e){

                    $(".hidden-gender").val($(this).val());
                    if($("input.txt-reportname").length) {
                        if($.fn.dataTable.isDataTable('.reports-table')) {
                            dyntable.fnDestroy();
                        }
                        getOrdersReport();
                    }
                });
                $("select.txt-age").on("change", function(e){
                    
                    $(".hidden-age").val($(this).val());
                    if($("input.txt-reportname").length) {
                        if($.fn.dataTable.isDataTable('.reports-table')) {
                            dyntable.fnDestroy();
                        }
                        getOrdersReport();
                    }
                });
                $("select.txt-profession").on("change", function(e){

                    $(".hidden-profession").val($(this).val());
                    if($("input.txt-reportname").length) {
                        if($.fn.dataTable.isDataTable('.reports-table')) {
                            dyntable.fnDestroy();
                        }
                        getOrdersReport();
                    }
                });
                $("select.txt-community").on("change", function(e){

                    $(".hidden-community").val($(this).val());
                    if($("input.txt-reportname").length) {
                        if($.fn.dataTable.isDataTable('.reports-table')) {
                            dyntable.fnDestroy();
                        }
                        getOrdersReport();
                    }
                });
                $("select.txt-location").on("change", function(e){

                    $(".hidden-location").val($(this).val());
                    if($("input.txt-reportname").length) {
                        if($.fn.dataTable.isDataTable('.reports-table')) {
                            dyntable.fnDestroy();
                        }
                        getOrdersReport();
                    }
                });
            }
            
            if($(".datatable").length > 0){
                loadAJAXDataTable(".datatable");
            }

            if($(".restaurant-datatable").length > 0){
                $(".restaurant-datatable").dataTable({
                    order: [[1, "asc"]],
                    'fnDrawCallback': function () {
                        $(document).trigger("bindMessageBox");
                    }
                });
            }
            if($(".datatable_simple").length > 0){
                $(".datatable_simple").dataTable({"ordering": false, "info": false, "lengthChange": false,"searching": false});
                $(".datatable_simple").on('page.dt',function () {
                    onresize(100);
                });
            }
            
            //GET Data from AJAX query then load datatable plugin
            if($(".ajax-datatable").length > 0) {
                // alert('hiiii');
                var page = $(".ajax-datatable").data("page") || 1;
                    
                        $.ajax ({
                            type: "POST",
                            url: "load_users_data.php",
                            data: "page="+page,
                            success: function(msg) 
                            {
                               // alert(msg);
                                msg = JSON.parse(msg);
                                if(msg !== null && msg.length > 0) 
                                {
                                    var msgLen = msg.length,
                                    rows = '';
                                    for(var i=0; i<msgLen; i++)
                                    {
                                            rows += "<tr>";
                                            rows += "<td>"+(i+1)+"</td>";
                                            rows += "<td>"+ msg[i].name +"</td>";
                                            rows += "<td>"+ msg[i].gender +"</td>";
                                            rows += "<td>"+ msg[i].age +"</td>";
                                            rows += "<td>"+ msg[i].profession +"</td>";
											 rows += "<td>"+ msg[i].usertype +"</td>";
                                            // rows += '<td class="center"><a href="edit-users.php?userId='+ msg[i].userid +'" data-toggle="tooltip" data-placement="top" title="Edit"><span class="fa fa-pencil"></span></a><a href="#" class="mb-control" data-box="#item-delete" data-item="userId" data-item-number="'+ msg[i].userid +'" data-toggle="tooltip" data-placement="top" title="Delete"><span class="fa fa-trash-o"></span></a></td>';
                                            rows += "</tr>";
                                    }
                                    $("#userdata tbody").html(rows);
                                }
                                else 
                                {
                                    rows += "<tr><td colspan='4'>No Record Found</td></tr>";
                                    $("#userdata tbody").html(rows);
                                    // $("#userdata tfoot").html('');
                                }
                            }
                        }).done(function(){
                            
                            loadAJAXDataTable(".ajax-datatable");
                    });
        }
            //GET Data from AJAX query then load datatable plugin

            function getOrdersReport() {

                var sDate = $("input.txt-startdate").val();
                var eDate = $("input.txt-enddate").val();
                var gender = $("input.hidden-gender").val();
                var age = $("input.hidden-age").val();
                var profession = $("input.hidden-profession").val();
                var community = $("input.hidden-community").val();
                var location = $("input.hidden-location").val();
				var input_hidden_field = $("input.input_hidden_field").val();
                var page = page || 1;

                var ajaxRequest, displayReport = $("input.txt-reportname").val();
        		//alert(displayReport);
                if(displayReport === 'creategroup') {
                    // alert('heyy');
                    $(".reports-table tbody").html('<tr class="spinner"><td colspan="5"><i class="fa fa-spinner fa-spin"></i></td></tr>');
                   
                    ajaxRequest = $.ajax({

                        type: "POST",
                        url: "load_creategroup_data.php",
                        data: "page="+ page +"&gender="+ gender +"&age="+ age +"&profession="+ profession +"&community="+ community+"&location="+location,
                        success: function(data) {
                             // alert(data);
                             // console.log(data);
                            var msg = jQuery.parseJSON(data);
                            if(msg !== null && msg.length > 0) {
                                var msgLen = msg.length,
                                rows = '';
                                // alert(msgLen);
                                for(var i=0; i<msgLen; i++){
                                    rows += "<tr>";
                                    rows += "<form id='checkbox-form'><td><input type='checkbox' class='myCheckBoxGroup' id='check-user_"+msg[i].userId+"' name='check-user' onclick='checkTotalCheckedBoxes("+msg[i].userId+")' value='"+msg[i].userId+"' data-id='"+msg[i].gender+"'></td></form>";
                                    rows += "<td>"+msg[i].name +"</td>";
                                    rows += "<td>"+ msg[i].gender +"</td>";
                                    rows += "<td>"+ msg[i].age +"</td>";
                                    rows += "<td>"+msg[i].profession +"</td>";
                                    rows += "<td>"+msg[i].community +"</td>";
                                    if(msg[i].location == null)
                                    {
                                        rows += "<td> </td>";
                                    }
                                    else
                                    {
                                        rows += "<td>"+msg[i].location +"</td>";
                                    }
                                    rows += "</tr>";
                                }
                                $(".reports-table tbody").html(rows);
                            } else {
                                rows += "<tr><td colspan='5'>No Record Found</td></tr>";
                                $(".reports-table tbody").html(rows);
                            }
                        }
                    });
                }
			
				/*------------------------Edit group--------------------------*/
					
				if(displayReport === 'editgroup') {
                   
                    $(".reports-table tbody").html('<tr class="spinner"><td colspan="5"><i class="fa fa-spinner fa-spin"></i></td></tr>');
                   
                    ajaxRequest = $.ajax({

                        type: "POST",
                        url: "load_editgroup_data.php",
                        data: "page="+ page +"&gender="+ gender +"&age="+ age +"&profession="+ profession +"&community="+ community+"&location="+location+"&input_hidden_field="+input_hidden_field,
                        success: function(data) {
                           //alert(data);
                           //console.log(data);
                            var msg = jQuery.parseJSON(data);
                            if(msg !== null && msg.length > 0) {
                                var msgLen = msg.length,
                                rows = '';
                                // alert(msgLen);
                                for(var i=0; i<msgLen; i++){
                                    rows += "<tr>";
                                    rows += "<form id='checkbox-form'><td><input type='checkbox' class='myCheckBoxGroup' id='check-user_"+msg[i].userId+"' name='check-user' onclick='checkTotalChecked_edit("+msg[i].userId+")' value='"+msg[i].userId+"' data-id='"+msg[i].gender+"' "+msg[i].checked+"></td></form>";
                                    rows += "<td>"+msg[i].name +"</td>";
                                    rows += "<td>"+ msg[i].gender +"</td>";
                                    rows += "<td>"+ msg[i].age +"</td>";
                                    rows += "<td>"+msg[i].profession +"</td>";
                                    rows += "<td>"+msg[i].community +"</td>";
                                    if(msg[i].location == null)
                                    {
                                        rows += "<td> </td>";
                                    }
                                    else
                                    {
                                        rows += "<td>"+msg[i].location +"</td>";
                                    }
                                    rows += "</tr>";
                                }
                                $(".reports-table tbody").html(rows);
                            } else {
                                rows += "<tr><td colspan='5'>No Record Found</td></tr>";
                                $(".reports-table tbody").html(rows);
                            }
                        }
                    });
                }

                if(displayReport === 'groupPairVotingReport') {
                    // alert('heyy');
                    $(".reports-table tbody").html('<tr class="spinner"><td colspan="6"><i class="fa fa-spinner fa-spin"></i></td></tr>');
                   
                    ajaxRequest = $.ajax({

                        type: "POST",
                        url: "load_group_pair_voting_data.php",
                        data: "page="+ page +"&startdate="+ sDate +"&enddate="+ eDate,
                        success: function(data) {
                            // alert(data);
                            // console.log(data);
                            var msg = jQuery.parseJSON(data);
                            if(msg !== null && msg.length > 0) {
                                var msgLen = msg.length,
                                rows = '';
                                 // alert(msgLen);
                                for(var i=0; i<msgLen; i++){
                                    rows += "<tr>";
                                    rows += "<td>"+ (i+1) +"</td>";
                                    rows += "<td>"+msg[i].createdDatetime +"</td>";
                                    rows += "<td>"+ msg[i].group_name +"</td>";
                                    rows += "<td>"+ msg[i].isview_for_voting +"</td>";
                                    rows += "<td> <a href='group_pair_voting_report_details.php?id="+ msg[i].groupId + "'><span class='fa fa-eye'></span></a></td>";
                                    // rows += "<td>"+ msg[i].uploded_video +"</td>";
                                    if(msg[i].uploded_video == null)
                                    {
                                        rows += "<td></td>";
                                    }
                                    else
                                    {
                                        rows += "<td><a href='group_pair_video_report_details.php?id="+ msg[i].groupId + "'><span class='fa fa-video-camera'></span></a></td>";
                                    }
                                    
                                }
                                $(".reports-table tbody").html(rows);
                            } else {
                                rows += "<tr><td colspan='6'>No Record Found</td></tr>";
                                $(".reports-table tbody").html(rows);
                            }
                        }
                    });
                }

                ajaxRequest.done(function(data){
                    
                    if($.trim(data) !== "null")
                    loadAJAXDataTable(".reports-table");
                });
            }
            
            if($(".reports-table").length > 0) {
                getOrdersReport();
            }
        }//END Datatable
        //RangeSlider // This function can be removed or cleared.
        
        var uiRangeSlider = function(){
            //Default Slider with start value
            if($(".defaultSlider").length > 0){
                $(".defaultSlider").each(function(){
                    var rsMin = $(this).data("min");
                    var rsMax = $(this).data("max");
                    $(this).rangeSlider({
                        bounds: {min: 1, max: 200},
                        defaultValues: {min: rsMin, max: rsMax}
                    });
                });
            }//End Default
            
            //Date range slider
            
            if($(".dateSlider").length > 0){
                $(".dateSlider").each(function(){
                    $(this).dateRangeSlider({
                        bounds: {min: new Date(2012, 1, 1), max: new Date(2015, 12, 31)},
                        defaultValues:{min: new Date(2012, 10, 15),max: new Date(2014, 12, 15)}
                    });
                });
            }//End date range slider
            
            //Range slider with predefinde range
            if($(".rangeSlider").length > 0){
                 $(".rangeSlider").each(function(){
                     var rsMin = $(this).data("min");
                     var rsMax = $(this).data("max");
                     $(this).rangeSlider({
                          bounds: {min: 1, max: 200},
                          range: {min: 20, max: 40},
                          defaultValues: {min: rsMin, max: rsMax}
                    });
                });
            }//End
            
            //Range Slider with custom step
            
            if($(".stepSlider").length > 0){
                $(".stepSlider").each(function(){
                    var rsMin = $(this).data("min");
                    var rsMax = $(this).data("max");
                    $(this).rangeSlider({
                        bounds: {min: 1, max: 200},
                        defaultValues: {min: rsMin, max: rsMax},
                        step: 10
                    });
                });
            }//End
        }//END RangeSlider
        
        //Start Knob Plugin
        
        var uiKnob = function(){
            if($(".knob").length > 0){
                $(".knob").knob();
            }
        }//End Knob
        
         // Start Smart Wizard
         
         var uiSmartWizard = function(){
             if($(".wizard").length > 0){
                 //Check count of steps in each wizard
                 $(".wizard > ul").each(function(){
                     $(this).addClass("steps_"+$(this).children("li").length);
                });//end
                
                // This par of code used for example
                if($("#wizard-validation").length > 0){
                    var validator = $("#wizard-validation").validate({
                        rules: {
                            login: {
                                required: true,
                                minlength: 2,
                                maxlength: 8
                            },
                            password: {
                                required: true,
                                minlength: 5,
                                maxlength: 10
                            },
                            repassword: {
                                required: true,
                                minlength: 5,
                                maxlength: 10,
                                equalTo: "#password"
                            },
                            email: {
                                required: true,
                                email: true
                            },
                            name: {
                                required: true,
                                maxlength: 10
                            },
                            adress: {
                                required: true
                            }
                        }
                    });
                }// End of example
                $(".wizard").smartWizard({
                     // This part of code can be removed FROM
                     onLeaveStep: function(obj){
                         var wizard = obj.parents(".wizard");
                         if(wizard.hasClass("wizard-validation")){
                             var valid = true;
                             $('input,textarea',$(obj.attr("href"))).each(function(i,v){
                                 valid = validator.element(v) && valid;
                            });
                            if(!valid){
                                wizard.find(".stepContainer").removeAttr("style");
                                validator.focusInvalid();
                                return false;
                            }
                        }
                        return true;
                    },// <-- TO
                    //This is important part of wizard init
                    onShowStep: function(obj){
                        var wizard = obj.parents(".wizard");
                        if(wizard.hasClass("show-submit")){
                            var step_num = obj.attr('rel');
                            var step_max = obj.parents(".anchor").find("li").length;
                            if(step_num == step_max){
                                obj.parents(".wizard").find(".actionBar .btn-primary").css("display","block");
                            }
                        }
                    return true;
                }//End
            });
        }
    }// End Smart Wizard
    //OWL Carousel
    var uiOwlCarousel = function(){
        if($(".owl-carousel").length > 0){
            $(".owl-carousel").owlCarousel({mouseDrag: false, touchDrag: true, slideSpeed: 300, paginationSpeed: 400, singleItem: true, navigation: false,autoPlay: true});
        }
    }//End OWL Carousel
    // Summernote
    
    var uiSummernote = function(){
        /* Extended summernote editor */
        if($(".summernote").length > 0){
            $(".summernote").summernote({height: 250,
            codemirror: {
                 mode: 'text/html',
                 htmlMode: true,
                 lineNumbers: true,
                 theme: 'default'
            }
        });
    }
    /* END Extended summernote editor */
    /* Lite summernote editor */
    if($(".summernote_lite").length > 0){
        $(".summernote_lite").on("focus",function(){
            $(".summernote_lite").summernote({height: 100, focus: true,
            toolbar: [
            ["style", ["bold", "italic", "underline", "clear"]],
            ["insert",["link","picture","video"]]
            ]
            });
        });
    }
    /* END Lite summernote editor */
    /* Email summernote editor */
    if($(".summernote_email").length > 0){
        $(".summernote_email").summernote({height: 400, focus: true,
        toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']]
        ]
        });
    }
    /* END Email summernote editor */
}// END Summernote
 // Custom Content Scroller
 var uiScroller = function(){
     if($(".scroll").length > 0){
         $(".scroll").mCustomScrollbar({axis:"y", autoHideScrollbar: true, scrollInertia: 20, advanced: {autoScrollOnFocus: false}});
        }
    }// END Custom Content Scroller
    // Sparkline
    var uiSparkline = function(){
        if($(".sparkline").length > 0)
        $(".sparkline").sparkline('html', { enableTagOptions: true,disableHiddenCheck: true});
    }// End sparkline
    
    $(window).resize(function(){
        if($(".owl-carousel").length > 0){
            $(".owl-carousel").data('owlCarousel').destroy();
            uiOwlCarousel();
        }
    });
    return {
        init: function(){
            uiDatatable();
            uiRangeSlider();
            uiKnob();
            uiSmartWizard();
            uiOwlCarousel();
            uiSummernote();
            uiScroller();
            uiSparkline();
        }
    }
}();
var templatePlugins = function(){
    var tp_clock = function(){
        function tp_clock_time(){
            var now     = new Date();
            var hour    = now.getHours();
            var minutes = now.getMinutes();
            
            hour = hour < 10 ? '0'+hour : hour;
                minutes = minutes < 10 ? '0'+minutes : minutes;
                $(".plugin-clock").html(hour+"<span>:</span>"+minutes);
            }
            if($(".plugin-clock").length > 0){
                tp_clock_time();
                window.setInterval(function(){
                    tp_clock_time();
                },10000);
            }
        }
        var tp_date = function(){
            if($(".plugin-date").length > 0){

                var days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
                var months = ['January','February','March','April','May','June','July','August','September','October','November','December'];

                var now     = new Date();
                var day     = days[now.getDay()];
                var date    = now.getDate();
                var month   = months[now.getMonth()];
                var year    = now.getFullYear();

                $(".plugin-date").html(day+", "+month+" "+date+", "+year);
            }

        }

        return {
            init: function(){
                tp_clock();
                tp_date();
            }
        }
    }();

    var fullCalendar = function(){

        var calendar = function(){

            if($("#calendar").length > 0){

                function prepare_external_list(){

                    $('#external-events .external-event').each(function() {
                            var eventObject = {title: $.trim($(this).text())};

                            $(this).data('eventObject', eventObject);
                            $(this).draggable({
                                    zIndex: 999,
                                    revert: true,
                                    revertDuration: 0
                            });
                    });

                }


                var date = new Date();
                var d = date.getDate();
                var m = date.getMonth();
                var y = date.getFullYear();

                prepare_external_list();

                var calendar = $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    editable: true,
                    eventSources: {url: "assets/ajax_fullcalendar.php"},
                    droppable: true,
                    selectable: true,
                    selectHelper: true,
                    select: function(start, end, allDay) {
                        var title = prompt('Event Title:');
                        if (title) {
                            calendar.fullCalendar('renderEvent',
                            {
                                title: title,
                                start: start,
                                end: end,
                                allDay: allDay
                            },
                            true
                            );
                        }
                        calendar.fullCalendar('unselect');
                    },
                    drop: function(date, allDay) {

                        var originalEventObject = $(this).data('eventObject');

                        var copiedEventObject = $.extend({}, originalEventObject);

                        copiedEventObject.start = date;
                        copiedEventObject.allDay = allDay;

                        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);


                        if ($('#drop-remove').is(':checked')) {
                            $(this).remove();
                        }

                    }
                });

                $("#new-event").on("click",function(){
                    var et = $("#new-event-text").val();
                    if(et != ''){
                        $("#external-events").prepend('<a class="list-group-item external-event">'+et+'</a>');
                        prepare_external_list();
                    }
                });

            }
        }

        return {
            init: function(){
                calendar();
            }
        }
    }();

    formElements.init();
    uiElements.init();
    templatePlugins.init();

    fullCalendar.init();

    /* My Custom Progressbar */
    $.mpb = function(action,options){

        var settings = $.extend({
            state: '',
            value: [0,0],
            position: '',
            speed: 20,
            complete: null
        },options);

        if(action == 'show' || action == 'update'){

            if(action == 'show'){
                $(".mpb").remove();
                var mpb = '<div class="mpb '+settings.position+'">\n\
                               <div class="mpb-progress'+(settings.state != '' ? ' mpb-'+settings.state: '')+'" style="width:'+settings.value[0]+'%;"></div>\n\
                           </div>';
                $('body').append(mpb);
            }

            var i  = $.isArray(settings.value) ? settings.value[0] : $(".mpb .mpb-progress").width();
            var to = $.isArray(settings.value) ? settings.value[1] : settings.value;

            var timer = setInterval(function(){
                $(".mpb .mpb-progress").css('width',i+'%'); i++;

                if(i > to){
                    clearInterval(timer);
                    if($.isFunction(settings.complete)){
                        settings.complete.call(this);
                    }
                }
            }, settings.speed);

        }

        if(action == 'destroy'){
            $(".mpb").remove();
        }

    }
    /* Eof My Custom Progressbar */

    // New selector case insensivity
     $.expr[':'].containsi = function(a, i, m) {
         return jQuery(a).text().toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
     };
});

Object.size = function(obj) {
    var size = 0, key;
    for (key in obj) {
        if (obj.hasOwnProperty(key)) size++;
    }
    return size;
};