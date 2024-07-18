let labelColor = KTUtil.getCssVariableValue('--bs-gray-500');
let borderColor = KTUtil.getCssVariableValue('--bs-gray-200');
let baseColor = KTUtil.getCssVariableValue('--bs-primary');
let secondaryColor = KTUtil.getCssVariableValue('--bs-gray-300');

const setGrafikTahunan = (data, title) => {
    let elementBar = document.getElementById('chartBar');
    let heightBar  = parseInt(KTUtil.css(elementBar, 'height'));
    let arrTahun      = [];
    let arrBelumBayar = [];
    let arrSudahBayar = [];

    // destroy chart
    elementBar.innerHTML = '';

    Object.values(data).map((item) => {
        arrBelumBayar.push(item.belumBayar), arrTahun.push(item.tahun), arrSudahBayar.push(item.sudahBayar)
    });

    const optionsBar = {
        series: [
            {
                name: 'Sudah Bayar',
                data: arrSudahBayar
            },
            {
                name: 'Belum Bayar',
                data: arrBelumBayar
            },
        ],
        title: {
            text: title,
            align: 'center',
            margin: 20,
            offsetX: 0,
            offsetY: -10,
            floating: false,
            style: {
                fontSize:  '20px',
                fontWeight:  'bold',
                fontFamily:  'Poppins,Helvetica,sans-serif',
                color:  '#000'
            },
        },
        chart: {
            type: 'bar',
            height: heightBar,
            stacked: true,
            stackType: '100%',
        },
        responsive: [{
            breakpoint: 480,
            options: {
                legend: {
                    position: 'bottom',
                    offsetX: -10,
                    offsetY: 0,
                },
            },
        }, ],
        xaxis: {
            categories: arrTahun,
        },
        yaxis: {
            axisBorder: {
              show: false
            },
            axisTicks: {
              show: false,
            },
            labels: {
              show: true,
              formatter: function (val) {
                return val + "%";
              }
            }
        },
        colors: ['#00E396', '#FF4560'],
        fill: {
            opacity: 1,
        },
        legend: {
            show: true,
            position: 'right',
            offsetX: 0,
            offsetY: 50,
        },
        tooltip: {
            custom: ({ series, seriesIndex, dataPointIndex, w }) => {
                const idr        = formatRupiah(series[seriesIndex][dataPointIndex]);
                const tahun      = arrTahun[dataPointIndex];
                const keterangan = seriesIndex === 1 ? 'Belum Bayar : ' : 'Sudah Bayar : '

                return `
                <div class="card p-2 shadow-lg">
                    <span class="text-muted text-center">Tahun ${tahun}</span>
                    <div class="separator my-2"></div>
                    <span class="fw-bolder">${keterangan}Rp ${idr}</span>
                </div>
                `;
            },
        },
    };

    var chartBar = new ApexCharts(elementBar, optionsBar);
    chartBar.render();
}

// Chart bar sebaran kecamatan berdasarkan data belum bayar
const setGrafikKecamatanBelumBayar = (data, title) => {
    let elementBar    = document.getElementById('chartPersentaseBelumBayar');
    let heightBar     = parseInt(KTUtil.css(elementBar, 'height'));
    let arrBelumBayar = [];
    let arrKecamatan = [];

    // destroy chart
    elementBar.innerHTML = '';

    Object.values(data).map((item) => {
        arrBelumBayar.push(item.belumBayar), arrKecamatan.push(item.namaKecamatan)
    });
    let color = ["#AB0000","#AD0404","#B00808","#B20C0C","#B41010","#B61414","#B91818","#BB1C1C","#BD2020","#BF2424","#C22828","#C42C2C","#C63030","#C93434","#CB3838","#CD3C3C","#CF4040","#D24444","#D44848","#D64C4C","#D95050","#DB5454","#DD5858","#DF5C5C","#E26060","#E46464","#E66868","#E86C6C","#EB7070","#ED7474"];

    var optionsBar = {
        series: [{
            name: 'Persentase Belum Bayar',
            data: arrBelumBayar
        }],
        colors: color,
        chart: {
            height: heightBar,
            type: 'bar',
            events: {
                click: function(chart, w, e) {
                }
            },
            toolbar:{
                tools: {
                    download: true
                },
            },
        },
        title: {
            text: title,
            align: 'center',
            margin: 20,
            offsetX: 0,
            offsetY: -10,
            floating: false,
            style: {
                fontSize:  '20px',
                fontWeight:  'bold',
                fontFamily:  'Poppins,Helvetica,sans-serif',
                color:  '#FF4560'
            },
        },
        plotOptions: {
            bar: {
            columnWidth: '80%',
            distributed: true,
            dataLabels: {
                position: 'top', // top, center, bottom
              },
            }
        },
        legend: {
            show: true
        },
        dataLabels: {
            enabled: true,
            formatter: function (val) {
                return `${val}%`;
            },
            textAnchor: 'middle',
            distributed: false,
            offsetY: -20,
            style: {
                fontSize: '9px',
                colors: ["#000"]
            }
        },
                   
        xaxis: {
            categories: arrKecamatan,
            labels: {
            style: {
                fontSize: '12px'
            }
            }
        },
        yaxis: {
            axisBorder: {
              show: false
            },
            axisTicks: {
              show: false,
            },
            labels: {
              show: true,
              formatter: function (val) {
                return val + "%";
              }
            }
          
        },
    };

    var chartBar = new ApexCharts(elementBar, optionsBar);
    chartBar.render();
}

// Chart bar sebaran kecamatan berdasarkan data sudah bayar
const setGrafikKecamatanSudahBayar = (data, title) => {
    let elementBar    = document.getElementById('chartPersentaseSudahBayar');
    let heightBar     = parseInt(KTUtil.css(elementBar, 'height'));
    let arrSudahBayar = [];
    let arrKecamatan = [];

    // destroy chart
    elementBar.innerHTML = '';

    Object.values(data).map((item) => {
        arrSudahBayar.push(item.sudahBayar), arrKecamatan.push(item.namaKecamatan)
    });
    let color = ["#028B5E","#068F60","#0A9262","#0D9665","#119967","#159D69","#19A16B","#1DA46D","#21A86F","#24AB72","#28AF74","#2CB276","#30B678","#34BA7A","#38BD7C","#3BC17F","#3FC481","#43C883","#47CC85","#4BCF87","#4FD389","#52D68C","#56DA8E","#5ADD90","#5EE192","#62E594","#66E896","#69EC99","#6DEF9B","#71F39D"];

    var optionsBar = {
        series: [{
            name: 'Persentase Sudah Bayar',
            data: arrSudahBayar
        }],
        colors: color,
        chart: {
            height: heightBar,
            type: 'bar',
            events: {
                click: function(chart, w, e) {
                }
            },
            toolbar:{
                tools: {
                    download: true
                },
            },
        },
        title: {
            text: title,
            align: 'center',
            margin: 20,
            offsetX: 0,
            offsetY: -10,
            floating: false,
            style: {
                fontSize:  '20px',
                fontWeight:  'bold',
                fontFamily:  'Poppins,Helvetica,sans-serif',
                color:  '#00E396'
            },
        },
       
        plotOptions: {
            bar: {
            columnWidth: '80%',
            distributed: true,
            dataLabels: {
                position: 'top', // top, center, bottom
              },
            }
        },
        legend: {
            show: true
        },
        dataLabels: {
            enabled: true,
            formatter: function (val) {
                return `${val}%`;
            },
            textAnchor: 'middle',
            distributed: false,
            offsetY: -20,
            style: {
                fontSize: '9px',
                colors: ["#000"]
            }
        },
        xaxis: {
            categories: arrKecamatan,
            labels: {
            style: {
                fontSize: '12px'
            }
            }
        },
        yaxis: {
            axisBorder: {
              show: false
            },
            axisTicks: {
              show: false,
            },
            labels: {
              show: true,
              formatter: function (val) {
                return val + "%";
              }
            }
          
        },
    };

    var chartBar = new ApexCharts(elementBar, optionsBar);
    chartBar.render();
}

const setProgressBar = (data) => {
    document.querySelector("#chart").innerHTML = ''
    let options = {
        series: [
            {
                name: 'Sudah Bayar',
                data: [data.sudahBayar],
                color: '#00E396'
            },
            {
                name: 'Belum Bayar',
                data: [data.belumBayar],
                color: '#FF4560'
            }, 
        ],
        chart: {
            type: 'bar',
            height: 150,
            stacked: true,
            stackType: '100%',
            toolbar:{
                tools: {
                    download: false
                },
            },
        },
        plotOptions: {
            bar: {
                horizontal: true,
            },
        },
        stroke: {
            width: 0,
            colors: ['#fff']
        },
    
        xaxis: {
            categories: [data.tahun],
            labels: {
                show: false,
            }
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return `${formatRupiah(val)} NOP`
                }
            }
        },
        yaxis: {
            show: false,
        },
        fill: {
            opacity: 1
        },
        legend: {
            position: 'top',
            horizontalAlign: 'left',
            offsetX: 0
        }
    };
    
    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
}

const getRekapDesa  = (id, loop) => {
    $('#tombolDetail' + loop).attr("data-kt-indicator", "on");
    $('#tombolDetail' + loop).prop("disabled", true);
    showLoading()
    let data = {
        _token: $('meta[name="csrf-token"]').attr('content'),
        id: id
    }
    $.post(URL_REKAP, data)
        .done(function(response){
            $('#tombolDetail' + loop).removeAttr("data-kt-indicator");
            $('#tombolDetail' + loop).prop("disabled", false);
            $('#wrapper_desa').html(response);
            $('#wrapper_desa').show('slow');
            $('html, body, #kt_content_container').animate({ scrollTop: $('#wrapper_desa').offset().top - 55 }, 'slow');
            $.post(URL_GRAFIK, data)
                .done(function(result){
                    Swal.close();
                    const {status, data} = result;
                    $('#rekapJumlah').html(data.rekapJumlah)
                    $('#rekapSudahBayar').html(data.rekapSudahBayar)
                    $('#rekapBelumBayar').html(data.rekapBelumBayar)
                    $('#persenJumlahSudahBayar').css('width', data.persenJumlahSudahBayar + '%')
                    $('#persenJumlahSudahBayar').html(data.persenJumlahSudahBayar + '%')
                    $('#persenJumlahBelumBayar').css('width', data.persenJumlahBelumBayar + '%')
                    $('#persenJumlahBelumBayar').html(data.persenJumlahBelumBayar + '%')
                    $('#rekapTotal').html(data.rekapTotal)
                    $('#rekapTotalSudahBayar').html('Rp. ' + formatRupiah(data.rekapTotalSudahBayar))
                    $('#rekapTotalBelumBayar').html('Rp. ' + formatRupiah(data.rekapTotalBelumBayar))
                    $('#belumBayar').html(data.rekapTotalBelumBayar + `(${data.persenBelumBayar} %)`)
                    $('#belumBayar').css('width', data.persenBelumBayar + '%')
                    $('#rekapTotal2').html(data.rekapTotal)
                    $('#textDashboard').html(data.textDashboard)

                    // set grafik pie
                    let sudahBayarTotal = [];
                    let sudahBayarNama  = [];
                    let belumBayarTotal = [];
                    let belumBayarNama  = [];
                    Object.values(JSON.parse(data.chartSudahBayar)).map((item) => {
                        sudahBayarTotal.push(+item.rekap); 
                        sudahBayarNama.push(item.desa.desa_nama); 
                    })
                    Object.values(JSON.parse(data.chartBelumBayar)).map((item) => {
                        belumBayarTotal.push(+item.rekap); 
                        belumBayarNama.push(item.desa.desa_nama); 
                    })

                    let dataGrafikPie = {
                        sudahBayar : {
                            series: sudahBayarTotal,
                            label : sudahBayarNama,
                            title : '5 DESA TERTINGGI SUDAH BAYAR'
                        },
                        belumBayar : {
                            series: belumBayarTotal,
                            label : belumBayarNama,
                            title : '5 DESA TERTINGGI BELUM BAYAR'
                        },
                    }
                    setGrafik(dataGrafikPie)
                    // end of set grafik pie

                    // set grafik progress bar
                    let dataProgressBar = {
                        sudahBayar: +data.rekapTotalSudahBayar,
                        belumBayar: +data.rekapTotalBelumBayar,
                        tahun: +data.tahun
                    }
                    setProgressBar(dataProgressBar)
                    // end of set grafik progress bar

                    // set grafik total sudah bayar 
                    setGrafikTahunan(JSON.parse(data.chartBar, 'GRAFIK TOTAL PEMBAYARAN PER TAHUN'))
                    // end of set grafik total sudah bayar 

                })
                .fail(function(err){
                    console.log(err)
                })
        })
        .fail(function(err){
            alertError(err.message)
        })
}

function formatRupiah(angka, prefix){
    let bilangan = angka.toString();
    let number_string = bilangan.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    rupiah     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    return split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
}