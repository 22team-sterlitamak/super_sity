type = ['','info','success','warning','danger'];


demo = {
    initPickColor: function(){
        $('.pick-class-label').click(function(){
            var new_class = $(this).attr('new-class');
            var old_class = $('#display-buttons').attr('data-class');
            var display_div = $('#display-buttons');
            if(display_div.length) {
            var display_buttons = display_div.find('.btn');
            display_buttons.removeClass(old_class);
            display_buttons.addClass(new_class);
            display_div.attr('data-class', new_class);
            }
        });
    },

    checkScrollForTransparentNavbar: debounce(function() {
            $navbar = $('.navbar[color-on-scroll]');
            scroll_distance = $navbar.attr('color-on-scroll') || 500;

            if($(document).scrollTop() > scroll_distance ) {
                if(transparent) {
                    transparent = false;
                    $('.navbar[color-on-scroll]').removeClass('navbar-transparent');
                    $('.navbar[color-on-scroll]').addClass('navbar-default');
                }
            } else {
                if( !transparent ) {
                    transparent = true;
                    $('.navbar[color-on-scroll]').addClass('navbar-transparent');
                    $('.navbar[color-on-scroll]').removeClass('navbar-default');
                }
            }
    }, 17),

    initChartist: function(){

        var dataPreferences = {
            series: [
                []
            ]
        };

        var optionsPreferences = {
            donut: true,
            donutWidth: 40,
            startAngle: 0,
            total: 100,
            showLabel: false,
            axisX: {
                showGrid: false
            }
        };

        Chartist.Pie('#chartPreferences', dataPreferences, optionsPreferences);

        Chartist.Pie('#chartPreferences', varStatusGosuslugiJS);

        var dataPreferences = {
            series: [
                []
            ]
        };

        var optionsPreferences = {
            donut: true,
            donutWidth: 40,
            startAngle: 0,
            total: 100,
            showLabel: false,
            axisX: {
                showGrid: false
            }
        };

        Chartist.Pie('#chartPreferencesLaw', dataPreferences, optionsPreferences);

        Chartist.Pie('#chartPreferencesLaw', varLawGosuslugiJS);

        var data = varPriceGosuslugiJS;

        var options = {
            seriesBarDistance: 10,
            axisX: {
                showGrid: false
            },
            height: "245px"
        };

        var responsiveOptions = [
            ['screen and (max-width: 640px)', {
                seriesBarDistance: 5,
                axisX: {
                    labelInterpolationFnc: function (value) {
                        return value[0];
                    }
                }
            }]
        ];

        Chartist.Bar('#chartPriceGosuslugi', data, options, responsiveOptions);

        var data = varPriceFullStatusGosuslugiJS;

        var options = {
            seriesBarDistance: 10,
            axisX: {
                showGrid: false
            },
            height: "245px"
        };

        var responsiveOptions = [
            ['screen and (max-width: 640px)', {
                seriesBarDistance: 5,
                axisX: {
                    labelInterpolationFnc: function (value) {
                        return value[0];
                    }
                }
            }]
        ];

        Chartist.Bar('#chartPriceFullStatusGosuslugi', data, options, responsiveOptions);

        var data = varPriceFullLawGosuslugiJS;

        var options = {
            seriesBarDistance: 10,
            axisX: {
                showGrid: false
            },
            height: "245px"
        };

        var responsiveOptions = [
            ['screen and (max-width: 640px)', {
                seriesBarDistance: 5,
                axisX: {
                    labelInterpolationFnc: function (value) {
                        return value[0];
                    }
                }
            }]
        ];

        Chartist.Bar('#chartPriceFullLawGosuslugi', data, options, responsiveOptions);

        var data = varKiportalProtocol;

        var options = {
            seriesBarDistance: 10,
            axisX: {
                showGrid: false
            },
            height: "245px"
        };

        var responsiveOptions = [
            ['screen and (max-width: 640px)', {
                seriesBarDistance: 5,
                axisX: {
                    labelInterpolationFnc: function (value) {
                        return value[0];
                    }
                }
            }]
        ];

        Chartist.Bar('#KiportalProtocol', data, options, responsiveOptions);

        var data = varKiportalProtocolDate;

        var options = {
            seriesBarDistance: 10,
            axisX: {
                showGrid: false
            },
            height: "245px"
        };

        var responsiveOptions = [
            ['screen and (max-width: 640px)', {
                seriesBarDistance: 5,
                axisX: {
                    labelInterpolationFnc: function (value) {
                        return value[0];
                    }
                }
            }]
        ];

        Chartist.Bar('#KiportalProtocolDate', data, options, responsiveOptions);

        var data = varKiportalDate;

        var options = {
            seriesBarDistance: 10,
            axisX: {
                showGrid: false
            },
            height: "245px"
        };

        var responsiveOptions = [
            ['screen and (max-width: 640px)', {
                seriesBarDistance: 5,
                axisX: {
                    labelInterpolationFnc: function (value) {
                        return value[0];
                    }
                }
            }]
        ];

        Chartist.Bar('#KiportalDate', data, options, responsiveOptions);

        var data = varKiportalSummaSave;

        var options = {
            seriesBarDistance: 10,
            axisX: {
                showGrid: false
            },
            height: "245px"
        };

        var responsiveOptions = [
            ['screen and (max-width: 640px)', {
                seriesBarDistance: 5,
                axisX: {
                    labelInterpolationFnc: function (value) {
                        return value[0];
                    }
                }
            }]
        ];

        Chartist.Bar('#KiportalSummaSave', data, options, responsiveOptions);

    },

	showNotification: function(from, align){
    	//color = Math.floor((Math.random() * 4) + 1);

    	$.notify({
        	icon: "pe-7s-gift",
        	message: "добро пожаловать на сайт"

        },{
            type: type[color],
            timer: 4000,
            placement: {
                from: from,
                align: align
            }
        });
	}


}

function show_selected(n, dur = 0, dur2 = 0) {
    count = $('#tabsnav > div').length;
    for (i = 0; i < count; i++) {
        if (i == n || n < 0) {
            $('#tabsnav > div:eq(' + i + ')').show(dur);
        } else {
            $('#tabsnav > div:eq(' + i + ')').hide(dur2);
        }
    }
}


