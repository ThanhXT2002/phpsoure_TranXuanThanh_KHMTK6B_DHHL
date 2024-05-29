 // Hàm hiển thị toast khi đăng nhập thành công
function showSuccessToast(message) {
    toastr.success(message, 'Success');
}
    
if (window.history.replaceState) {
  window.history.replaceState(null, null, window.location.href);
}
$(function () {
    var i = -1;
    var toastCount = 0;
    var $toastlast;
    var getMessage = function () {
        var msg = 'Hi, welcome to Inspinia. This is example of Toastr notification box.';
        return msg;
    };

     // Thêm toast khi đăng nhập thành công
    $('#showsimple').click(function () {
            // Display a success toast, with a title
            showSuccessToast('Without any options');
        });

    $('#showsimple').click(function (){
        // Display a success toast, with a title
        toastr.success('Without any options','Simple notification!')
    });
    $('#showtoast').click(function () {
        var shortCutFunction = $("#toastTypeGroup input:radio:checked").val();
        var msg = $('#message').val();
        var title = $('#title').val() || '';
        var $showDuration = $('#showDuration');
        var $hideDuration = $('#hideDuration');
        var $timeOut = $('#timeOut');
        var $extendedTimeOut = $('#extendedTimeOut');
        var $showEasing = $('#showEasing');
        var $hideEasing = $('#hideEasing');
        var $showMethod = $('#showMethod');
        var $hideMethod = $('#hideMethod');
        var toastIndex = toastCount++;
        toastr.options = {
            closeButton: $('#closeButton').prop('checked'),
            debug: $('#debugInfo').prop('checked'),
            progressBar: $('#progressBar').prop('checked'),
            preventDuplicates: $('#preventDuplicates').prop('checked'),
            positionClass: $('#positionGroup input:radio:checked').val() || 'toast-top-right',
            onclick: null
        };
        if ($('#addBehaviorOnToastClick').prop('checked')) {
            toastr.options.onclick = function () {
                alert('You can perform some custom action after a toast goes away');
            };
        }
        if ($showDuration.val().length) {
            toastr.options.showDuration = $showDuration.val();
        }
        if ($hideDuration.val().length) {
            toastr.options.hideDuration = $hideDuration.val();
        }
        if ($timeOut.val().length) {
            toastr.options.timeOut = $timeOut.val();
        }
        if ($extendedTimeOut.val().length) {
            toastr.options.extendedTimeOut = $extendedTimeOut.val();
        }
        if ($showEasing.val().length) {
            toastr.options.showEasing = $showEasing.val();
        }
        if ($hideEasing.val().length) {
            toastr.options.hideEasing = $hideEasing.val();
        }
        if ($showMethod.val().length) {
            toastr.options.showMethod = $showMethod.val();
        }
        if ($hideMethod.val().length) {
            toastr.options.hideMethod = $hideMethod.val();
        }
        if (!msg) {
            msg = getMessage();
        }
        $("#toastrOptions").text("Command: toastr["
                + shortCutFunction
                + "](\""
                + msg
                + (title ? "\", \"" + title : '')
                + "\")\n\ntoastr.options = "
                + JSON.stringify(toastr.options, null, 2)
        );
        var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
        $toastlast = $toast;
        if ($toast.find('#okBtn').length) {
            $toast.delegate('#okBtn', 'click', function () {
                alert('you clicked me. i was toast #' + toastIndex + '. goodbye!');
                $toast.remove();
            });
        }
        if ($toast.find('#surpriseBtn').length) {
            $toast.delegate('#surpriseBtn', 'click', function () {
                alert('Surprise! you clicked me. i was toast #' + toastIndex + '. You could perform an action here.');
            });
        }
    });
    function getLastToast(){
        return $toastlast;
    }
    $('#clearlasttoast').click(function () {
        toastr.clear(getLastToast());
    });
    $('#cleartoasts').click(function () {
        toastr.clear();
    });
})

function showCustomToast(title, message, type) {
    var toastOptions = {
        closeButton: true,
        progressBar: true,
        showMethod: 'slideDown',
        timeOut: 4000
    };

    var toastrMessage = '<div class="custom-toast ' + type + '">' +
                            '<div class="toast-title">' + title + '</div>' +
                            '<div class="toast-message">' + message + '</div>' +
                        '</div>';

    toastr.options = toastOptions;
    toastr[type](toastrMessage, '', toastOptions);
}

$(document).ready(function() {

        $(".select2fillter").select2();
        $(".select2_demo_1").select2();
        $(".select2_demo_3").select2({
            placeholder: "Select a state",
            allowClear: true
        });

        $('.clockpicker').clockpicker();

        // Khởi tạo Select2 cho cả hai dropdown
        $('#select1, #select2').select2();

        // Sự kiện thay đổi của cả hai dropdown
        $('#select1, #select2').change(function () {
            var selectedValue = $(this).val();
            
            // Cập nhật giá trị của cả hai dropdown khác
            $('#select1, #select2').not(this).val(selectedValue).trigger('change.select2');
        });

  $('.dataTables-example').DataTable({
    pageLength: 10,
    responsive: true,
    ordering: false,
    dom: '<"html5buttons"B>lTfgitp',
    buttons: [
        { extend: 'copy'},
        {extend: 'csv'},
        {extend: 'excel', title: 'ExampleFile'},
        {extend: 'pdf', title: 'ExampleFile'},

        {extend: 'print',
         customize: function (win){
                $(win.document.body).addClass('white-bg');
                $(win.document.body).css('font-size', '10px');

                $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
        }
        }
    ]

});

    $(".chart").easyPieChart({
        barColor: "#f8ac59",
        //                scaleColor: false,
        scaleLength: 5,
        lineWidth: 4,
        size: 80,
      });
  
      $(".chart2").easyPieChart({
        barColor: "#1c84c6",
        //                scaleColor: false,
        scaleLength: 5,
        lineWidth: 4,
        size: 80,
      });
  
      var data2 = [
        [gd(2012, 1, 1), 7],
        [gd(2012, 1, 2), 6],
        [gd(2012, 1, 3), 4],
        [gd(2012, 1, 4), 8],
        [gd(2012, 1, 5), 9],
        [gd(2012, 1, 6), 7],
        [gd(2012, 1, 7), 5],
        [gd(2012, 1, 8), 4],
        [gd(2012, 1, 9), 7],
        [gd(2012, 1, 10), 8],
        [gd(2012, 1, 11), 9],
        [gd(2012, 1, 12), 6],
        [gd(2012, 1, 13), 4],
        [gd(2012, 1, 14), 5],
        [gd(2012, 1, 15), 11],
        [gd(2012, 1, 16), 8],
        [gd(2012, 1, 17), 8],
        [gd(2012, 1, 18), 11],
        [gd(2012, 1, 19), 11],
        [gd(2012, 1, 20), 6],
        [gd(2012, 1, 21), 6],
        [gd(2012, 1, 22), 8],
        [gd(2012, 1, 23), 11],
        [gd(2012, 1, 24), 13],
        [gd(2012, 1, 25), 7],
        [gd(2012, 1, 26), 9],
        [gd(2012, 1, 27), 9],
        [gd(2012, 1, 28), 8],
        [gd(2012, 1, 29), 5],
        [gd(2012, 1, 30), 8],
        [gd(2012, 1, 31), 25],
      ];
  
      var data3 = [
        [gd(2012, 1, 1), 800],
        [gd(2012, 1, 2), 500],
        [gd(2012, 1, 3), 600],
        [gd(2012, 1, 4), 700],
        [gd(2012, 1, 5), 500],
        [gd(2012, 1, 6), 456],
        [gd(2012, 1, 7), 800],
        [gd(2012, 1, 8), 589],
        [gd(2012, 1, 9), 467],
        [gd(2012, 1, 10), 876],
        [gd(2012, 1, 11), 689],
        [gd(2012, 1, 12), 700],
        [gd(2012, 1, 13), 500],
        [gd(2012, 1, 14), 600],
        [gd(2012, 1, 15), 700],
        [gd(2012, 1, 16), 786],
        [gd(2012, 1, 17), 345],
        [gd(2012, 1, 18), 888],
        [gd(2012, 1, 19), 888],
        [gd(2012, 1, 20), 888],
        [gd(2012, 1, 21), 987],
        [gd(2012, 1, 22), 444],
        [gd(2012, 1, 23), 999],
        [gd(2012, 1, 24), 567],
        [gd(2012, 1, 25), 786],
        [gd(2012, 1, 26), 666],
        [gd(2012, 1, 27), 888],
        [gd(2012, 1, 28), 900],
        [gd(2012, 1, 29), 178],
        [gd(2012, 1, 30), 555],
        [gd(2012, 1, 31), 993],
      ];
  
      var dataset = [
        {
          label: "Number of orders",
          data: data3,
          color: "#1ab394",
          bars: {
            show: true,
            align: "center",
            barWidth: 24 * 60 * 60 * 600,
            lineWidth: 0,
          },
        },
        {
          label: "Payments",
          data: data2,
          yaxis: 2,
          color: "#1C84C6",
          lines: {
            lineWidth: 1,
            show: true,
            fill: true,
            fillColor: {
              colors: [
                {
                  opacity: 0.2,
                },
                {
                  opacity: 0.4,
                },
              ],
            },
          },
          splines: {
            show: false,
            tension: 0.6,
            lineWidth: 1,
            fill: 0.1,
          },
        },
      ];
  
      var options = {
        xaxis: {
          mode: "time",
          tickSize: [3, "day"],
          tickLength: 0,
          axisLabel: "Date",
          axisLabelUseCanvas: true,
          axisLabelFontSizePixels: 12,
          axisLabelFontFamily: "Arial",
          axisLabelPadding: 10,
          color: "#d5d5d5",
        },
        yaxes: [
          {
            position: "left",
            max: 1070,
            color: "#d5d5d5",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: "Arial",
            axisLabelPadding: 3,
          },
          {
            position: "right",
            clolor: "#d5d5d5",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: " Arial",
            axisLabelPadding: 67,
          },
        ],
        legend: {
          noColumns: 1,
          labelBoxBorderColor: "#000000",
          position: "nw",
        },
        grid: {
          hoverable: false,
          borderWidth: 0,
        },
      };
  
      function gd(year, month, day) {
        return new Date(year, month - 1, day).getTime();
      }
  
      var previousPoint = null,
        previousLabel = null;
  
      $.plot($("#flot-dashboard-chart"), dataset, options);
  
      var mapData = {
        US: 298,
        SA: 200,
        DE: 220,
        FR: 540,
        CN: 120,
        AU: 760,
        BR: 550,
        IN: 200,
        GB: 120,
      };
  
      $("#world-map").vectorMap({
        map: "world_mill_en",
        backgroundColor: "transparent",
        regionStyle: {
          initial: {
            fill: "#e4e4e4",
            "fill-opacity": 0.9,
            stroke: "none",
            "stroke-width": 0,
            "stroke-opacity": 0,
          },
        },
  
        series: {
          regions: [
            {
              values: mapData,
              scale: ["#1ab394", "#22d6b1"],
              normalizeFunction: "polynomial",
            },
          ],
        },
      });
    


    var d1 = [[1262304000000, 6], [1264982400000, 3057], [1267401600000, 20434], [1270080000000, 31982], [1272672000000, 26602], [1275350400000, 27826], [1277942400000, 24302], [1280620800000, 24237], [1283299200000, 21004], [1285891200000, 12144], [1288569600000, 10577], [1291161600000, 10295]];
    var d2 = [[1262304000000, 5], [1264982400000, 200], [1267401600000, 1605], [1270080000000, 6129], [1272672000000, 11643], [1275350400000, 19055], [1277942400000, 30062], [1280620800000, 39197], [1283299200000, 37000], [1285891200000, 27000], [1288569600000, 21000], [1291161600000, 17000]];

    var data1 = [
        { label: "Data 1", data: d1, color: '#17a084'},
        { label: "Data 2", data: d2, color: '#127e68' }
    ];
    $.plot($("#flot-chart1"), data1, {
        xaxis: {
            tickDecimals: 0
        },
        series: {
            lines: {
                show: true,
                fill: true,
                fillColor: {
                    colors: [{
                        opacity: 1
                    }, {
                        opacity: 1
                    }]
                },
            },
            points: {
                width: 0.1,
                show: false
            },
        },
        grid: {
            show: false,
            borderWidth: 0
        },
        legend: {
            show: false,
        }
    });

    var lineData = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [
            {
                label: "Example dataset",
                backgroundColor: "rgba(26,179,148,0.5)",
                borderColor: "rgba(26,179,148,0.7)",
                pointBackgroundColor: "rgba(26,179,148,1)",
                pointBorderColor: "#fff",
                data: [48, 48, 60, 39, 56, 37, 30]
            },
            {
                label: "Example dataset",
                backgroundColor: "rgba(220,220,220,0.5)",
                borderColor: "rgba(220,220,220,1)",
                pointBackgroundColor: "rgba(220,220,220,1)",
                pointBorderColor: "#fff",
                data: [65, 59, 40, 51, 36, 25, 40]
            }
        ]
    };

    var lineOptions = {
        responsive: true
    };


    var ctx = document.getElementById("lineChart").getContext("2d");
    new Chart(ctx, {type: 'line', data: lineData, options:lineOptions});

    $(".select2_demo_1").select2();
    $(".select2_demo_2").select2();
    $(".select2_demo_3").select2({
        placeholder: "Select a state",
        allowClear: true
    });

    


});


